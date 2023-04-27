<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsEvent;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class APINewsEventController extends Controller
{
    public function NewsEvent(){

     $data =NewsEvent::all()->where('status',1);

    return response()->json(['data' => $data]);
}

    public function showNewsEvent($id){
        $data =NewsEvent::find( $id);
        return response()->json(['data' => $data]);
    }
}
