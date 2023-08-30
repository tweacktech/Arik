<?php
namespace App\Http\Controllers;

use App\Models\ParkingSpot;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ParkingSpotController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = ParkingSpot::all();

        return view('parking-spots.index', compact('data'));
    }

    public function create()
    {
        return view('parking-spots.create');
    }

    public function store(Request $request)
    {   

      $spot_number = Str::random(8); // Generate a random alphanumeric string with length 8
while (ParkingSpot::where('spot_number', $spot_number)->exists()) {
    $spot_number = Str::random(8); // Generate a new random alphanumeric string
}
     // return $request->input('state');
      $data = $request->validate([
            // 'spot_number' => 'required|string',
            'state' => 'nullable|string',
            'amount' => 'required|numeric',
            // 'is_available' => 'required|boolean',
        ]);

    $data['spot_number'] = $spot_number;
        ParkingSpot::create($data);
        // Create a new parking spot
      
        return redirect()->route('Park')
                         ->with('success', 'Parking spot created successfully.');
    }

    public function editPark(ParkingSpot $parkingSpot)
    {
        return view('parking-spots.edit', compact('parkingSpot'));
    }

    public function updatePark(Request $request, ParkingSpot $parkingSpot)
    {
        // Validate the input
        $validatedData = $request->validate([
            'spot_number' => 'required|unique:parking_spots,spot_number,' . $parkingSpot->id,
        ]);

        // Update the parking spot
        $parkingSpot->update($validatedData);

        return redirect()->route('Park')
                         ->with('success', 'Parking spot updated successfully.');
    }

    public function deletePark($id)
    {
        $parkingSpot=ParkingSpot::findOrFail($id);
        $parkingSpot->delete();

        return redirect()->route('Park')
                         ->with('success', 'Parking spot deleted successfully.');
    }
}
