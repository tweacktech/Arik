<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabin;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;


class APICabinController extends Controller
{
    //
    public function Cabin(){

  $data =Cabin::all();

  return response()->json(['data'=>$data]);
    }

    public function showCabin($id){
        $data=Cabin::find($id);
         return response()->json(['data'=>$data]);
    }
}
