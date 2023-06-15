<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventCat;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class EventCatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


public function addEventCat(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Create a new EventCat with validated data
        $EventCat = new EventCat();
        $EventCat->title = $req->input('title');
        $EventCat->save();
 return redirect()->back()->with('success', 'EventCat Added successfully.');
}

public function deleteEventCat($id) {
    $EventCat = EventCat::find($id);
    $EventCat->delete();
    
    return redirect()->back()->with('success', 'EventCat deleted successfully.');
}


}
