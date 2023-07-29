<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CareRent;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;


class APICareRentController extends Controller
{
    //
    public function CareRent(){

  $data =CareRent::all();

  return response()->json(['data'=>$data]);
    }

    public function showCareRent($id){
        $data=CareRent::find($id);
         return response()->json(['data'=>$data]);
    }
}
