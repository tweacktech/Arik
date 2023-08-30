<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deal;
use App\Models\DealOfferCat;
use App\Models\DealHeader;
use DB;

class APIDealController extends Controller
{
      public function Deal(){

  $data =Deal::all();

  return response()->json(['data'=>$data]);
    }

    public function showDeal($id){
        $data=Deal::find($id);
         return response()->json(['data'=>$data]);
    }

      public function DealOfferCat(){

  $data =DealOfferCat::all();

  return response()->json(['data'=>$data]);
    }

    public function showDealOfferCat($id){
        $data=Deal::where('category',$id)->get();
         return response()->json(['data'=>$data]);
    }

   public function DealHeader(){

  $data =DealHeader::all();

  return response()->json(['data'=>$data]);
    }

    public function showDealHeader($id){
        $data=DealHeader::find($id);
         return response()->json(['data'=>$data]);
    }


}
