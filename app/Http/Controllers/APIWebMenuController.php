<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class APIWebMenuController extends Controller
{
    //

    public function menu(){

    $data=DB::table('web_menus')->orderBy('orderby','ASC')->get();
    return response()->json(['data'=>$data]);
}
    public function submenu(){

    $data=DB::table('sub_menus')->get();
    return response()->json(['data'=>$data]);
}
    public function menus(){

    $data=DB::table('web_menus')->join('sub_menus','sub_menus.menu_id','web_menus.id')->select('web_menus.title as menu','web_menus.id as menu_id','sub_menus.title as submenu','sub_menus.id as sub_id')->get();
    return response()->json(['data'=>$data]);
}

}
