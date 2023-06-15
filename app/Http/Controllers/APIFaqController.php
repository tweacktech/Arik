<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class APIFaqController extends Controller
{
      //
    public function Faq(){

  $data =Faq::all();

  return response()->json(['data'=>$data]);
    }

    public function showFaq($id){
        $data=Faq::find($id);
         return response()->json(['data'=>$data]);
    }
}
