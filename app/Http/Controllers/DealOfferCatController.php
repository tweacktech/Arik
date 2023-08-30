<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DealOfferCat;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
class DealOfferCatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


public function addDealOfferCat(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Create a new DealOfferCat with validated data
        $DealOfferCat = new DealOfferCat();
        $DealOfferCat->title = $req->input('title');
        $DealOfferCat->save();
 return redirect()->back()->with('success', 'DealOfferCat Added successfully.');
}

public function deleteDealOfferCat($id) {
    $DealOfferCat = DealOfferCat::find($id);
    $DealOfferCat->delete();
    
    return redirect()->back()->with('success', 'DealOfferCat deleted successfully.');
}
}
