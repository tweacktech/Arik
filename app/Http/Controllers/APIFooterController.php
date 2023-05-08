<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class APIFooterController extends Controller
{
    public function footer(){

    $data=DB::table('footers')->get();
    return response()->json(['data'=>$data]);
}
}
