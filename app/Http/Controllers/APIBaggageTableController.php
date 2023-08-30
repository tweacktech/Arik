<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaggageTable;
use DB;

class APIBaggageTableController extends Controller
{
      public function BaggageTable(){

  $data =BaggageTable::all();

  return response()->json(['data'=>$data]);
    }

    public function showBaggageTable($id){
        $data=BaggageTable::find($id);
         return response()->json(['data'=>$data]);
    }


}
