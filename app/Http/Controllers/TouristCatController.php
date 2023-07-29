<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TouristCat;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
class TouristCatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


public function addTouristCat(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Create a new TouristCat with validated data
        $TouristCat = new TouristCat();
        $TouristCat->title = $req->input('title');
        $TouristCat->save();
 return redirect()->back()->with('success', 'TouristCat Added successfully.');
}

public function deleteTouristCat($id) {
    $TouristCat = TouristCat::find($id);
    $TouristCat->delete();
    
    return redirect()->back()->with('success', 'TouristCat deleted successfully.');
}
}
