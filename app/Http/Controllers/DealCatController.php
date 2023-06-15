<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DealCat;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
class DealCatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


public function addDealCat(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Create a new DealCat with validated data
        $DealCat = new DealCat();
        $DealCat->title = $req->input('title');
        $DealCat->save();
 return redirect()->back()->with('success', 'DealCat Added successfully.');
}

public function deleteDealCat($id) {
    $DealCat = DealCat::find($id);
    $DealCat->delete();
    
    return redirect()->back()->with('success', 'DealCat deleted successfully.');
}
}
