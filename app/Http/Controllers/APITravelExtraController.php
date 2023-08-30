<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelExtra;
use App\Models\TraExFooter;
use App\Models\TraExSlider;
use DB;

class APITravelExtraController extends Controller
{
      public function TravelExtra(){

  $data =TravelExtra::all();

  return response()->json(['data'=>$data]);
    }

    public function showTravelExtra($id){
        $data=TravelExtra::find($id);
         return response()->json(['data'=>$data]);
    }

     public function TravelExtraFooter(){
            $id=1;
        $data=TraExFooter::find($id);
         return response()->json(['data'=>$data]);
    }

     public function TravelExtraSlider(){
        $id=1;
        $data=TraExSlider::find($id);
         return response()->json(['data'=>$data]);
    }


}
