<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seat;
use App\Models\SeatHeader;
use App\Models\SeatFooter;
use App\Models\SeatCat;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;


class APISeatController extends Controller
{
    //
    public function Seat(){

  $data =Seat::all();

  return response()->json(['data'=>$data]);
    }

    public function showSeat($id){
        $data=Seat::find($id);
         return response()->json(['data'=>$data]);
    }
  public function SeatHeader(){

  $data =SeatHeader::all();

  return response()->json(['data'=>$data]);
    }

    public function showSeatHeader($id){
        $data=SeatHeader::find($id);
         return response()->json(['data'=>$data]);
    }

       public function SeatFooter(){
        $id=1;
        $data=SeatFooter::find($id);
         return response()->json(['data'=>$data]);
    }


 public function SeatCat(){

  $data =SeatCat::all();

  return response()->json(['data'=>$data]);
    }

    public function showSeatCat($id){
        $data=SeatCat::find($id);
         $title= $data->title;
         $data=Seat::where('location',$title)->get();
         return response()->json(['data'=>$data]);
    }
}
