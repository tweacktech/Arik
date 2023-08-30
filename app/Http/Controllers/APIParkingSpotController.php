<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ParkingSpot;
use App\Models\ParkHeader;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;


class APIParkingSpotController extends Controller
{
  

    public function ParkingSpot(){

  $data =ParkingSpot::where('is_available',true)->get();

  return response()->json(['data'=>$data]);
    }

    public function showParkingSpot($id){
        $data=ParkingSpot::find($id);
         return response()->json(['data'=>$data]);
    }

    public function ParkHeader(){

  $data =ParkHeader::all();

  return response()->json(['data'=>$data]);
    }

    public function showParkHeader($id){
        $data=ParkHeader::find($id);
         return response()->json(['data'=>$data]);
    }


}
