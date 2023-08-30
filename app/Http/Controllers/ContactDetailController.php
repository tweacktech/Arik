<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactDetail;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class ContactDetailController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function ContactDetail(){


  $data =ContactDetail::all();

  return view('manage_ContactDetail',compact('data'));
}

public function addContactDetail(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'nullable|string|max:255',
            'description' => 'required|string',
            'state' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

       
        // Create a new ContactDetail with validated data
        $ContactDetail = new ContactDetail();
        $ContactDetail->title = $req->input('title');
        $ContactDetail->description = $req->input('description');
        $ContactDetail->state = $req->input('state');
        $ContactDetail->save();
  return redirect()->back();
}

public function deleteContactDetail($id) {
    $ContactDetail = ContactDetail::find($id);
    $ContactDetail->delete();
    
    return redirect()->back()->with('success', 'ContactDetail deleted successfully.');
}




public function unhideContactDetail(Request $req, $id)
  {
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a ContactDetail was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideContactDetail(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a ContactDetail was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editContactDetail(Request $req, $id)
  {
    
    $update =ContactDetail::find( $id);

    
    return view('editContactDetail',compact('update'));
  }

public function updateContactDetail(Request $request, $id) {

     $ContactDetail = ContactDetail::find($id);
    $ContactDetail->title = $request->input('title');
    $ContactDetail->description = $request->input('description');
    $ContactDetail->state = $request->input('state');
    $ContactDetail->save();
    return redirect()->back()->with('success', 'ContactDetail updated successfully.');
     
}
}
