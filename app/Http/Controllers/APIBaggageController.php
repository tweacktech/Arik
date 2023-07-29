<?php

namespace App\Http\Controllers;

use App\Models\Baggage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class APIBaggageController extends Controller
{
    //


       public function Baggage(){

  $data =Baggage::where('id',1)->first();

  return response()->json(['data'=>$data]);
    }
}
