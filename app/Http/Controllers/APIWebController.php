<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class APIWebController extends Controller
{
    //

public function aboutus(){

    $data=DB::table('website')->select('about')->get();
   

    return response()->json(['data'=>$data]);
}
public function terms(){

    $data=DB::table('website')->select('terms')->get();
   

    return response()->json(['data'=>$data]);
}
public function policy(){

    $data=DB::table('website')->select('policy')->get();

    return response()->json(['data'=>$data]);
}

public function slider(){

    $data=DB::table('slider')->get();
    
    return response()->json(['data'=>$data]);
}

public function slider2(){

    $data=DB::table('slider2')->get();
    
    return response()->json(['data'=>$data]);
}


}
