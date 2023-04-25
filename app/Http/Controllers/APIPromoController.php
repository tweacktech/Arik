<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class APIPromoController extends Controller
{
    public function Promo(){

  $data =Promo::all();

  return response()->json(['data'=>$data]);
    }

    public function showPromo($id){
        $data=Promo::find($id);
         return response()->json(['data'=>$data]);
    }

}
