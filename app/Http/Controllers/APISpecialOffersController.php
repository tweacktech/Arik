<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpecialOffers;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class APISpecialOffersController extends Controller
{
      public function SpecialOffers(){

  $data =SpecialOffers::all();

  return response()->json(['data'=>$data]);
    }

    public function showSpecialOffers($id){
        $data=SpecialOffers::find($id);
         return response()->json(['data'=>$data]);
    }

}
