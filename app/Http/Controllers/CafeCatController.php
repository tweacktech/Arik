<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CafeCat;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
class CafeCatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


public function addCafeCat(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Create a new CafeCat with validated data
        $CafeCat = new CafeCat();
        $CafeCat->title = $req->input('title');
        $CafeCat->save();
 return redirect()->back()->with('success', 'CafeCat Added successfully.');
}

public function deleteCafeCat($id) {
    $CafeCat = CafeCat::find($id);
    $CafeCat->delete();
    
    return redirect()->back()->with('success', 'CafeCat deleted successfully.');
}
}
