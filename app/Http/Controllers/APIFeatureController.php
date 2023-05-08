<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class APIFeatureController extends Controller
{


      public function Feature(){

     $data =Feature::all();

    return response()->json(['data' => $data]);
}

    public function showFeature($id){
        $data =Feature::find( $id);
        return response()->json(['data' => $data]);
    }
    //
}
