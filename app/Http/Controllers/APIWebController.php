<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class APIWebController extends Controller
{
    //

public function Logo(){

    $data=DB::table('web_logos')->get();

    return response()->json(['data'=>$data]);
}
public function history(){

    $data=DB::table('company_histories')->get();
   
    return response()->json(['data'=>$data]);
}
public function aboutus(){

    $data=DB::table('abouts')->get();

    return response()->json(['data'=>$data]);
}
public function aboutimage(){

    $data=DB::table('abouts')->select('image')->get();

    return response()->json(['data'=>$data]);
}
public function terms(){

    $data=DB::table('website')->select('terms')->get();
   

    return response()->json(['data'=>$data]);
}
public function policy(){

    $data=DB::table('policies')->get();

    return response()->json(['data'=>$data]);
}

public function policyimage(){

    $data=DB::table('policies')->select('image')->get();

    return response()->json(['data'=>$data]);
}

    public function baggage(){

    $data=DB::table('policies')->where('name','baggage')->get();

    return response()->json(['data'=>$data]);
}

public function baggageimage(){

    $data=DB::table('policies')->where('name','baggage')->select('image','content')->get();

    return response()->json(['data'=>$data]);
}

public function slider(){

    $data=DB::table('slider')->get();
    
    return response()->json(['data'=>$data]);
}

public function web(){

    $data=DB::table('manage_site')->get();
    
    return response()->json(['data'=>$data]);
}


}
