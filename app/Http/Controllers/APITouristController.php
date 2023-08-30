<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tourist;
use App\Models\TouristHeader;
use App\Models\TouristCat;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;


class APITouristController extends Controller
{
    //
    public function Tourist(){

  $data =Tourist::all();

  return response()->json(['data'=>$data]);
    }

    public function showTourist($id){
        $data=Tourist::find($id);
         return response()->json(['data'=>$data]);
    }
  public function TouristHeader(){

  $data =TouristHeader::all();

  return response()->json(['data'=>$data]);
    }

    public function showTouristHeader($id){
        $data=TouristHeader::find($id);
         return response()->json(['data'=>$data]);
    }


 public function TouristCat(){

  $data =TouristCat::all();

  return response()->json(['data'=>$data]);
    }

    public function showTouristCat($id){
        $data=TouristCat::find($id);
         $title= $data->title;
         $data=Tourist::where('location',$title)->get();
         return response()->json(['data'=>$data]);
    }
}
