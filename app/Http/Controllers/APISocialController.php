<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Social;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class APISocialController extends Controller
{
    public function Social(){

  $data =Social::all();

  return response()->json(['data'=>$data]);
    }

    public function showSocial($id){
        $data=Social::find($id);
         return response()->json(['data'=>$data]);
    }

}
