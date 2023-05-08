<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DealsOffer;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class APIDealsOfferController extends Controller
{
    public function DealsOffer(){

  $data =DealsOffer::all();

  return response()->json(['data'=>$data]);
    }

    public function showDealsOffer($id){
        $data=DealsOffer::find($id);
         return response()->json(['data'=>$data]);
    }

}
