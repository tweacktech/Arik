<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Routing;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;


class APIRoutingController extends Controller
{
    //
    public function Routing(){

  $data =Routing::all();

  return response()->json(['data'=>$data]);
    }

    public function showRouting($id){
        $data=Routing::find($id);
         return response()->json(['data'=>$data]);
    }
}
