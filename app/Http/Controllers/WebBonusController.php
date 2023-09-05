<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebBonus;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class WebBonusController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function WebBonus(){


  $data =WebBonus::all();

  return view('manage_WebBonus',compact('data'));
}

public function addWebBonus(Request $req){


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
    $file->move(public_path('WebBonus/'), $file_name);
        // Create a new WebBonus with validated data
        $WebBonus = new WebBonus();
        $WebBonus->title = $req->input('title');
        $WebBonus->description = $req->input('description');
        $WebBonus->image = $file_name;
        $WebBonus->save();
  return redirect()->back();}
}

public function deleteWebBonus($id) {
    $WebBonus = WebBonus::find($id);
    $WebBonus->delete();
    
    return redirect()->back()->with('success', 'WebBonus deleted successfully.');
}




public function unhideWebBonus(Request $req, $id)
  {
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a WebBonus was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideWebBonus(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a WebBonus was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editWebBonus(Request $req, $id)
  {
    
    $update =WebBonus::find( $id);

    
    return view('editWebBonus',compact('update'));
  }

public function updateWebBonus(Request $request, $id) {

if ($request->file('image')=="") {
     $WebBonus = WebBonus::find($id);
    $WebBonus->title = $request->input('title');
    $WebBonus->description = $request->input('description');
    $WebBonus->save();
    return redirect()->back()->with('success', 'WebBonus updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('WebBonus/'), $file_name);
    $WebBonus = WebBonus::find($id);
    $WebBonus->title = $request->input('title');
    $WebBonus->description = $request->input('description');
    $WebBonus->image = $file_name;
    $WebBonus->save();
    return redirect()->back()->with('success', 'WebBonus updated successfully.');
}
}
}
