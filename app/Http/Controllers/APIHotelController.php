<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;


class APIHotelController extends Controller
{
    //
    public function Hotel(){

  $data =Hotel::all();

  return response()->json(['data'=>$data]);
    }

    public function showHotel($id){
        $data=Hotel::find($id);
         return response()->json(['data'=>$data]);
    }
}
