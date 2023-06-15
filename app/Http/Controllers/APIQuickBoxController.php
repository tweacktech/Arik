<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuickBox;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class APIQuickBoxController extends Controller
{

      public function QuickBox(){

  $data =QuickBox::all();

  return response()->json(['data'=>$data]);
    }

    public function showQuickBox($id){
        $data=QuickBox::find($id);
         return response()->json(['data'=>$data]);
    }
}
