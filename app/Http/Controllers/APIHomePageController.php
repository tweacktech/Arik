<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class APIHomePageController extends Controller
{
    //

    public function homepage(){

    $data=DB::table('home_pages')->where('status',1)->get();
    return response()->json(['data'=>$data]);
}

}
