<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Award;
use DB;

class APIAwardController extends Controller
{
      public function Award(){

  $data =Award::all();

  return response()->json(['data'=>$data]);
    }

    public function showAward($id){
        $data=Award::find($id);
         return response()->json(['data'=>$data]);
    }


}


