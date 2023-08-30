<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeatHeader;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class SeatHeaderController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function SeatHeader(){


  $data =SeatHeader::all();

  return view('manage_SeatHeader',compact('data'));
}

public function addSeatHeader(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($req->file('image')=="") {
            
        }else{
        $file = $req->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('SeatHeader/'), $file_name);
        // Create a new SeatHeader with validated data
        $SeatHeader = new SeatHeader();
        $SeatHeader->title = $req->input('title');
        $SeatHeader->description = $req->input('description');
        $SeatHeader->image = $file_name;
        $SeatHeader->save();
  return redirect()->back();}
}

public function deleteSeatHeader($id) {
    $SeatHeader = SeatHeader::find($id);
    $SeatHeader->delete();
    
    return redirect()->back()->with('success', 'SeatHeader deleted successfully.');
}




public function unhideSeatHeader(Request $req, $id)
  {
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a SeatHeader was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideSeatHeader(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a SeatHeader was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editSeatHeader(Request $req, $id)
  {
    
    $update =SeatHeader::find( $id);

    
    return view('editSeatHeader',compact('update'));
  }

public function updateSeatHeader(Request $request, $id) {

if ($request->file('image')=="") {
     $SeatHeader = SeatHeader::find($id);
    $SeatHeader->title = $request->input('title');
    $SeatHeader->description = $request->input('description');
    $SeatHeader->save();
    return redirect()->back()->with('success', 'SeatHeader updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('SeatHeader/'), $file_name);
    $SeatHeader = SeatHeader::find($id);
    $SeatHeader->title = $request->input('title');
    $SeatHeader->description = $request->input('description');
    $SeatHeader->image = $file_name;
    $SeatHeader->save();
    return redirect()->back()->with('success', 'SeatHeader updated successfully.');
}
}
}
