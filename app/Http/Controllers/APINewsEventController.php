<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsEvent;
use App\Models\NewsEventLabel;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class APINewsEventController extends Controller
{
    public function NewsEventLabel(){

     $data =NewsEventLabel::all();

    return response()->json(['data' => $data]);
}
public function NewsEvent(){

     $data =NewsEvent::all();

    return response()->json(['data' => $data]);
}

    public function showNewsEvent($id){
        $data =NewsEvent::find( $id);
        return response()->json(['data' => $data]);
    }
}
