<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tourist;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class TouristController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function Tourist(){


  $data =Tourist::all();

  return view('manage_Tourist',compact('data'));
}

public function addTourist(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($req->file('image')=="") {
            
        }else{
        $file = $req->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('Tourist/'), $file_name);
        // Create a new Tourist with validated data
        $Tourist = new Tourist();
        $Tourist->title = $req->input('title');
        $Tourist->description = $req->input('description');
        $Tourist->location = $req->input('location');
        $Tourist->image = $file_name;
        $Tourist->save();
  return redirect()->back();}
}

public function deleteTourist($id) {
    $Tourist = Tourist::find($id);
    $Tourist->delete();
    
    return redirect()->back()->with('success', 'Tourist deleted successfully.');
}




public function unhideTourist(Request $req, $id)
  {
    $update = DB::table('cafes')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Tourist was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideTourist(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('cafes')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Tourist was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editTourist(Request $req, $id)
  {
    
    $update =Tourist::find( $id);

    
    return view('editTourist',compact('update'));
  }

public function updateTourist(Request $request, $id) {

if ($request->file('image')=="") {
     $Tourist = Tourist::find($id);
    $Tourist->title = $request->input('title');
    $Tourist->description = $request->input('description');
    $Tourist->location = $request->input('location');
    $Tourist->save();
    return redirect()->back()->with('success', 'Tourist updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('Tourist/'), $file_name);
    $Tourist = Tourist::find($id);
    $Tourist->title = $request->input('title');
    $Tourist->description = $request->input('description');
    $Tourist->location = $request->input('location');
    $Tourist->image = $file_name;
    $Tourist->save();
    return redirect()->back()->with('success', 'Tourist updated successfully.');
}
}
}
