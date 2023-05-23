<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DealsOffer;
use App\Models\DealLabel;
use App\Models\DealIcon;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class APIDealsOfferController extends Controller
{
    public function Dealsicon(){

  $data =DealIcon::all();

  return response()->json(['data'=>$data]);
    }
     public function Dealslable(){

  $data =DealLabel::all();

  return response()->json(['data'=>$data]);
    }

public function DealsOffer(){

  $data =DealsOffer::all();

  return response()->json(['data'=>$data]);
    }

    public function showDealsOffer($id){
        $data=DealsOffer::find($id);
         return response()->json(['data'=>$data]);
    }

}
