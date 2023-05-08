<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class APINewsletterController extends Controller
{
      public function newsletter(){

  $data =Newsletter::all();

  return response()->json(['data'=>$data]);
    }

    public function showNewsLetter($id){
        $data=Newsletter::find($id);
         return response()->json(['data'=>$data]);
    }

}
