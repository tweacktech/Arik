<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppStore;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;


class APIAppStoreController extends Controller
{
    //
    public function AppStore(){

  $data =AppStore::all();

  return response()->json(['data'=>$data]);
    }

    public function showAppStore($id){
        $data=AppStore::find($id);
         return response()->json(['data'=>$data]);
    }
}
