<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeatCat;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
class SeatCatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


public function addSeatCat(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Create a new SeatCat with validated data
        $SeatCat = new SeatCat();
        $SeatCat->title = $req->input('title');
        $SeatCat->save();
 return redirect()->back()->with('success', 'SeatCat Added successfully.');
}

public function deleteSeatCat($id) {
    $SeatCat = SeatCat::find($id);
    $SeatCat->delete();
    
    return redirect()->back()->with('success', 'SeatCat deleted successfully.');
}
}
