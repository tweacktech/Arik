<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MissionVission;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class APIMissionVissionController extends Controller
{
      //
    public function MissionVission(){

  $data =MissionVission::all();

  return response()->json(['data'=>$data]);
    }

    public function showMissionVission($id){
        $data=MissionVission::find($id);
         return response()->json(['data'=>$data]);
    }
}
