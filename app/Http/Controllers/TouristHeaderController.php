<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TouristHeader;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class TouristHeaderController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function TouristHeader(){


  $data =TouristHeader::all();

  return view('manage_TouristHeader',compact('data'));
}

public function addTouristHeader(Request $req){


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
    $file->move(public_path('TouristHeader/'), $file_name);
        // Create a new TouristHeader with validated data
        $TouristHeader = new TouristHeader();
        $TouristHeader->title = $req->input('title');
        $TouristHeader->description = $req->input('description');
        $TouristHeader->image = $file_name;
        $TouristHeader->save();
  return redirect()->back();}
}

public function deleteTouristHeader($id) {
    $TouristHeader = TouristHeader::find($id);
    $TouristHeader->delete();
    
    return redirect()->back()->with('success', 'TouristHeader deleted successfully.');
}




public function unhideTouristHeader(Request $req, $id)
  {
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a TouristHeader was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideTouristHeader(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a TouristHeader was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editTouristHeader(Request $req, $id)
  {
    
    $update =TouristHeader::find( $id);

    
    return view('editTouristHeader',compact('update'));
  }

public function updateTouristHeader(Request $request, $id) {

if ($request->file('image')=="") {
     $TouristHeader = TouristHeader::find($id);
    $TouristHeader->title = $request->input('title');
    $TouristHeader->description = $request->input('description');
    $TouristHeader->save();
    return redirect()->back()->with('success', 'TouristHeader updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('TouristHeader/'), $file_name);
    $TouristHeader = TouristHeader::find($id);
    $TouristHeader->title = $request->input('title');
    $TouristHeader->description = $request->input('description');
    $TouristHeader->image = $file_name;
    $TouristHeader->save();
    return redirect()->back()->with('success', 'TouristHeader updated successfully.');
}
}
}
