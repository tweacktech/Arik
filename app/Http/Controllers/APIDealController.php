<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deal;
use DB;

class APIDealController extends Controller
{
      public function Deal(){

  $data =Deal::all();

  return response()->json(['data'=>$data]);
    }

    public function showDeal($id){
        $data=Deal::find($id);
         return response()->json(['data'=>$data]);
    }


}
