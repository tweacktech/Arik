<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class HotelController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function Hotel(){


  $data =Hotel::all();

  return view('manage_Hotel',compact('data'));
}

public function addHotel(Request $req){


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
    $file->move(public_path('Hotel/'), $file_name);
        // Create a new Hotel with validated data
        $Hotel = new Hotel();
        $Hotel->title = $req->input('title');
        $Hotel->description = $req->input('description');
        $Hotel->image = $file_name;
        $Hotel->save();
  return redirect()->back();}
}

public function deleteHotel($id) {
    $Hotel = Hotel::find($id);
    $Hotel->delete();
    
    return redirect()->back()->with('success', 'Hotel deleted successfully.');
}




public function unhideHotel(Request $req, $id)
  {
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Hotel was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideHotel(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Hotel was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editHotel(Request $req, $id)
  {
    
    $update =Hotel::find( $id);

    
    return view('editHotel',compact('update'));
  }

public function updateHotel(Request $request, $id) {

if ($request->file('image')=="") {
     $Hotel = Hotel::find($id);
    $Hotel->title = $request->input('title');
    $Hotel->description = $request->input('description');
    $Hotel->save();
    return redirect()->back()->with('success', 'Hotel updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('Hotel/'), $file_name);
    $Hotel = Hotel::find($id);
    $Hotel->title = $request->input('title');
    $Hotel->description = $request->input('description');
    $Hotel->image = $file_name;
    $Hotel->save();
    return redirect()->back()->with('success', 'Hotel updated successfully.');
}
}
}
