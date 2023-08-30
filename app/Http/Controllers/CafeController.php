<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cafe;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class CafeController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function Cafe(){


  $data =Cafe::all();

  return view('manage_Cafe',compact('data'));
}

public function addCafe(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'openhours' => 'required|string',
            'phone' => 'required',
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
    $file->move(public_path('Cafe/'), $file_name);
        // Create a new Cafe with validated data
        $Cafe = new Cafe();
        $Cafe->title = $req->input('title');
        $Cafe->description = $req->input('description');
        $Cafe->address = $req->input('address');
        $Cafe->openhours = $req->input('openhours');
        $Cafe->phone = $req->input('phone');
        $Cafe->location = $req->input('location');
        $Cafe->image = $file_name;
        $Cafe->save();
  return redirect()->back();}
}

public function deleteCafe($id) {
    $Cafe = Cafe::find($id);
    $Cafe->delete();
    
    return redirect()->back()->with('success', 'Cafe deleted successfully.');
}


public function unhideCafe(Request $req, $id)
  {
    $update = DB::table('cafes')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Cafe was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideCafe(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('cafes')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Cafe was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editCafe(Request $req, $id)
  {
    
    $update =Cafe::find( $id);

    
    return view('editCafe',compact('update'));
  }

public function updateCafe(Request $request, $id) {

if ($request->file('image')=="") {
     $Cafe = Cafe::find($id);
    $Cafe->title = $request->input('title');
    $Cafe->description = $request->input('description');
    $Cafe->address = $request->input('address');
    $Cafe->openhours = $request->input('openhours');
    $Cafe->phone = $request->input('phone');
    $Cafe->location = $request->input('location');
    $Cafe->save();
    return redirect()->back()->with('success', 'Cafe updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('Cafe/'), $file_name);
    $Cafe = Cafe::find($id);
    $Cafe->title = $request->input('title');
    $Cafe->description = $request->input('description');
    $Cafe->address = $request->input('address');
    $Cafe->openhours = $request->input('openhours');
    $Cafe->phone = $request->input('phone');
    $Cafe->location = $request->input('location');
    $Cafe->image = $file_name;
    $Cafe->save();
    return redirect()->back()->with('success', 'Cafe updated successfully.');
}
}
}
