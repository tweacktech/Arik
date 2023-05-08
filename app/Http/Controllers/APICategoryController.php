<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class APICategoryController extends Controller
{

    public function category(){

    $data=DB::table('categories')->get();
    return response()->json(['data'=>$data]);
}
    public function subcategory(){

    $data=DB::table('sub_categories')->get();
    return response()->json(['data'=>$data]);
}
}