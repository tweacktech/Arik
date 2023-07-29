<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class APITrainController extends Controller
{

     public function Training(){
        $id=1;
        $data=Training::where('id',$id)->first();
         return response()->json(['data'=>$data]);
    }

}
