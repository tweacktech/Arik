<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebBonus;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;


class APIWebBonusController extends Controller
{
      //
    public function WebBonus(){

  $data =WebBonus::all();

  return response()->json(['data'=>$data]);
    }

    public function showWebBonus($id){
        $data=WebBonus::find($id);
         return response()->json(['data'=>$data]);
    }
}
