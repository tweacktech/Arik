<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class ContactController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function Contact(){


  $data =Contact::where('id','1')->first();
  $count =Contact::all()->count();

  return view('manage_Contact',compact('data','count'));
}

public function addContact(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image',
            'slide_title' => 'required|string|max:255',
            'slide_description' => 'required|string',
            'phone_number' => 'required|string',
            'whatsapp' => 'required|string',
            'emails' => 'required|string',
             'others' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($req->file('image')=="") {
            
        }else{
        $file = $req->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('Contact/'), $file_name);
        // Create a new Contact with validated data
        $Contact = new Contact();
        $Contact->title = $req->input('title');
        $Contact->description = $req->input('description');
        $Contact->slide_title = $req->input('slide_title');
        $Contact->slide_description = $req->input('slide_description');
        $Contact->phone_number = $req->input('phone_number');
        $Contact->whatsapp = $req->input('whatsapp');
        $Contact->emails = $req->input('emails');
        $Contact->others = $req->input('others');
        $Contact->image = $file_name;
        $Contact->save();
  return redirect()->back();}
}

public function deleteContact($id) {
    $Contact = Contact::find($id);
    $Contact->delete();
    
    return redirect()->back()->with('success', 'Contact deleted successfully.');
}




public function unhideContact(Request $req, $id)
  {
    $update = DB::table('contacts')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Contact was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideContact(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('contacts')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Contact was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editContact(Request $req, $id)
  {
    
    $update =Contact::find( $id);

    
    return view('editContact',compact('update'));
  }

public function updateContact(Request $request, $id) {

if ($request->file('image')=="") {
     $Contact = Contact::find($id);
    $Contact->title = $request->input('title');
    $Contact->description = $request->input('description');
    $Contact->slide_title = $request->input('slide_title');
    $Contact->slide_description = $request->input('slide_description');
    $Contact->phone_number = $request->input('phone_number');
    $Contact->whatsapp = $request->input('whatsapp');
    $Contact->emails = $request->input('emails');
    $Contact->others = $request->input('others');
    $Contact->save();
    return redirect()->back()->with('success', 'Contact updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('Contact/'), $file_name);
    $Contact = Contact::find($id);
    $Contact->title = $request->input('title');
    $Contact->description = $request->input('description');
    $Contact->slide_title = $request->input('slide_title');
    $Contact->slide_description = $request->input('slide_description');
    $Contact->phone_number = $request->input('phone_number');
    $Contact->whatsapp = $request->input('whatsapp');
    $Contact->emails = $request->input('emails');
    $Contact->others = $request->input('others');
    $Contact->image = $file_name;
    $Contact->save();
    return redirect()->back()->with('success', 'Contact updated successfully.');
}
}
}
