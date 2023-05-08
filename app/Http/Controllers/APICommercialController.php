<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commercial;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;


class APICommercialController extends Controller
{
    //
    public function Commercial(){

  $data =Commercial::all();

  return response()->json(['data'=>$data]);
    }

    public function showCommercial($id){
        $data=Commercial::find($id);
         return response()->json(['data'=>$data]);
    }
}
