<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cafe;
use App\Models\CafeCat;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;


class APICafeController extends Controller
{
    //
    public function Cafe(){

  $data =Cafe::all();

  return response()->json(['data'=>$data]);
    }

    public function showCafe($id){
        $data=Cafe::find($id);
         return response()->json(['data'=>$data]);
    }


 public function CafeCat(){

  $data =CafeCat::all();

  return response()->json(['data'=>$data]);
    }

    public function showCafeCat($id){
        $data=CafeCat::find($id);
         $title= $data->title;
         $data=Cafe::where('location',$title)->get();
         return response()->json(['data'=>$data]);
    }
}
