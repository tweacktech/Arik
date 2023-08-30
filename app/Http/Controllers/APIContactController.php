<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactDetail;
use App\Models\ContactForm;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;


class APIContactController extends Controller
{
    //

    public function ContactForm (Request $request)
    {
           $validator = Validator::make($request->all(), [
        'firstname'=>'required|string', 
        'lastname'=>'required|string', 
        'email'=>'required|email',
        'phone_number'=>'required',
        'generalEnquiry'=>'required|string',
        'message'=>'required',
]);

// Check if validation fails
if ($validator->fails()) {
    // Handle validation errors
    return response()->json([
        'error' => $validator->errors(),
    ], 400);
}

$details = new ContactForm();
// Set the properties based on the validated input
$details->firstname = $request->input('firstname');
$details->lastname = $request->input('lastname');
$details->email = $request->input('email');
$details->phone_number = $request->input('phone_number');
$details->generalEnquiry = $request->input('generalEnquiry');
$details->message = $request->input('message');
$details->save();

if ($details) {
    return response()->json(['status'=>'success',
'date'=>$details]);
}

 return response()->json(['status'=>'error'],200);
    }



    public function Contact(){

  $data =Contact::all();

  return response()->json(['data'=>$data]);
    }

    public function showContact($id){
        $data=Contact::find($id);
         return response()->json(['data'=>$data]);
    }

      public function ContactDetail(){

  $data =DB::table('state')->get();

  return response()->json(['data'=>$data]);
    }

    public function showContactDetail($id){
        $data=ContactDetail::where('state',$id)->get();
         return response()->json(['data'=>$data]);
    }


}
