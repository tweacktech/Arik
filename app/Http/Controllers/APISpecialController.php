<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Special;
use App\Models\Assist;
use App\Models\SpecialSlider;
use App\Models\SpecialForm;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class APISpecialController extends Controller
{
    public function Special(){

  $data =Special::all();

  return response()->json(['data'=>$data]);
    }

    public function showSpecial($id){
        $data=Special::find($id);
         return response()->json(['data'=>$data]);
    }

        public function Assist(){

  $data =Assist::all();

  return response()->json(['data'=>$data]);
    }

    public function showAssist($id){
        $data=Assist::find($id);
         return response()->json(['data'=>$data]);
    }

     public function SpecialSlider(){
        $id=1;
        $data=SpecialSlider::find($id);
         return response()->json(['data'=>$data]);
    }

     public function SpecialForm(Request $request){
       
         $validator = Validator::make($request->all(), [
        'fullname'=>'required', 
        'ticket'=>'required', 
        'phone'=>'required', 
        'email'=>'required', 
        'seat_type'=>'required',
        'assistance'=>'required',
        'wheelchair'=>'required',
        'disability_ass'=>'required',
]);

// Check if validation fails
if ($validator->fails()) {
    // Handle validation errors
    return response()->json([
        'error' => $validator->errors(),
    ], 400);
}
     
        $SpecialForm = new SpecialForm();
        $SpecialForm->fullname = $request->input('fullname');
        $SpecialForm->ticket = $request->input('ticket');
        $SpecialForm->phone = $request->input('phone');
        $SpecialForm->email = $request->input('email');
        $SpecialForm->seat_type = $request->input('seat_type');
        $SpecialForm->assistance = $request->input('assistance');
        $SpecialForm->wheelchair = $request->input('wheelchair');
        $SpecialForm->disability_ass = $request->input('disability_ass');
        $SpecialForm->save();   

             if ($SpecialForm) {
      
        return response()->json(['status' => 'successfully', 'data' => $SpecialForm]);
    }
    return response()->json(['error' => 'Error store status to Canceled.'], 400);
        


    }

}
