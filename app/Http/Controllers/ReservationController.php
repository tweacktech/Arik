<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\ParkingSpot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class ReservationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'parking_spot_id' => 'required|exists:parking_spots,id',
            'reservation_datetime' => 'required|date',
            'email' => 'required',
            'amount' => 'required',
        ]);

        // Check if the parking spot is available
        $parkingSpot = ParkingSpot::findOrFail($validatedData['parking_spot_id']);
        if (!$parkingSpot->is_available) {
            return redirect()->back()->with('error', 'Parking spot is not available for the selected time.');
        }

        // Create a new reservation
        $user = auth()->user();
        $reservation = new Reservation([
            'user_id' => $user->id,
            'parking_spot_id' => $parkingSpot->id,
            'reservation_datetime' => $validatedData['reservation_datetime'],
        ]);
        $reservation->save();

        // Update parking spot availability
        $parkingSpot->update(['is_available' => false]);

        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully.');
    }

    public function index()
    {
        
        $data = Reservation::all();

        return view('parking-spots.managebook', compact('data'));
    }


    public function viewBook($id)
    {
        
        $data = Reservation::findOrFail($id);
        // $data=DB::table('reservations')->join('park_payments','reservations.parking_space_id','park_payments.parking_space_id')->where('reservations.id',$id)->select('reservations.*')->first();

        return view('parking-spots.viewbook', compact('data'));
    }

    public function cancel(Reservation $reservation)
    {
        $user = auth()->user();

        // Check if the user owns the reservation
        if ($user->id !== $reservation->user_id) {
            return redirect()->back()->with('error', 'You are not authorized to cancel this reservation.');
        }

        // Update parking spot availability
        $reservation->parkingSpot->update(['is_available' => true]);

        // Cancel the reservation
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Reservation canceled successfully.');
    }
}
