<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelSlider;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class HotelSliderController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function HotelSlider(){


  $data =HotelSlider::all();

  return view('manage_HotelSlider',compact('data'));
}

public function addHotelSlider(Request $req){


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
    $file->move(public_path('HotelSlider/'), $file_name);
        // Create a new HotelSlider with validated data
        $HotelSlider = new HotelSlider();
        $HotelSlider->title = $req->input('title');
        $HotelSlider->description = $req->input('description');
        $HotelSlider->image = $file_name;
        $HotelSlider->save();
  return redirect()->back();}
}

public function deleteHotelSlider($id) {
    $HotelSlider = HotelSlider::find($id);
    $HotelSlider->delete();
    
    return redirect()->back()->with('success', 'HotelSlider deleted successfully.');
}




public function unhideHotelSlider(Request $req, $id)
  {
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a HotelSlider was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideHotelSlider(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a HotelSlider was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editHotelSlider(Request $req, $id)
  {
    
    $update =HotelSlider::find( $id);

    
    return view('editHotelSlider',compact('update'));
  }

public function updateHotelSlider(Request $request, $id) {

if ($request->file('image')=="") {
     $HotelSlider = HotelSlider::find($id);
    $HotelSlider->title = $request->input('title');
    $HotelSlider->description = $request->input('description');
    $HotelSlider->save();
    return redirect()->back()->with('success', 'HotelSlider updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('HotelSlider/'), $file_name);
    $HotelSlider = HotelSlider::find($id);
    $HotelSlider->title = $request->input('title');
    $HotelSlider->description = $request->input('description');
    $HotelSlider->image = $file_name;
    $HotelSlider->save();
    return redirect()->back()->with('success', 'HotelSlider updated successfully.');
}
}
}
