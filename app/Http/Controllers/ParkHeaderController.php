<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParkHeader;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class ParkHeaderController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function ParkHeader(){


  $data =ParkHeader::all();

  return view('manage_ParkHeader',compact('data'));
}

public function addParkHeader(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($req->file('image')=="") {
            
        }else{
        $file = $req->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('ParkHeader/'), $file_name);
        // Create a new ParkHeader with validated data
        $ParkHeader = new ParkHeader();
        $ParkHeader->title = $req->input('title');
        $ParkHeader->description = $req->input('description');
        $ParkHeader->image = $file_name;
        $ParkHeader->save();
  return redirect()->back();}
}

public function deleteParkHeader($id) {
    $ParkHeader = ParkHeader::find($id);
    $ParkHeader->delete();
    
    return redirect()->back()->with('success', 'ParkHeader deleted successfully.');
}




public function unhideParkHeader(Request $req, $id)
  {
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a ParkHeader was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideParkHeader(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a ParkHeader was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editParkHeader(Request $req, $id)
  {
    
    $update =ParkHeader::find( $id);

    
    return view('editParkHeader',compact('update'));
  }

public function updateParkHeader(Request $request, $id) {

if ($request->file('image')=="") {
     $ParkHeader = ParkHeader::find($id);
    $ParkHeader->title = $request->input('title');
    $ParkHeader->description = $request->input('description');
    $ParkHeader->save();
    return redirect()->back()->with('success', 'ParkHeader updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('ParkHeader/'), $file_name);
    $ParkHeader = ParkHeader::find($id);
    $ParkHeader->title = $request->input('title');
    $ParkHeader->description = $request->input('description');
    $ParkHeader->image = $file_name;
    $ParkHeader->save();
    return redirect()->back()->with('success', 'ParkHeader updated successfully.');
}
}
}
