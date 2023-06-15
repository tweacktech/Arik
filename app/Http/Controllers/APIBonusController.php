<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bonus;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;


class APIBonusController extends Controller
{
      //
    public function Bonus(){

  $data =Bonus::all();

  return response()->json(['data'=>$data]);
    }

    public function showBonus($id){
        $data=Bonus::find($id);
         return response()->json(['data'=>$data]);
    }
}
