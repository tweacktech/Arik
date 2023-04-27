<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class APIDestinationController extends Controller
{
    public function Destination(){

  $data =Destination::all()->where('status',1);

  return response()->json(['data'=>$data]);
    }

    public function showDestination($id){
        $data=Destination::find($id);
         return response()->json(['data'=>$data]);
    }

}
