<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabin;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class CabinController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function Cabin(){


  $data =Cabin::all();

  return view('manage_Cabin',compact('data'));
}

public function addCabin(Request $req){


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
    $file->move(public_path('Cabin/'), $file_name);
        // Create a new Cabin with validated data
        $Cabin = new Cabin();
        $Cabin->title = $req->input('title');
        $Cabin->description = $req->input('description');
        $Cabin->image = $file_name;
        $Cabin->save();
  return redirect()->back();}
}

public function deleteCabin($id) {
    $Cabin = Cabin::find($id);
    $Cabin->delete();
    
    return redirect()->back()->with('success', 'Cabin deleted successfully.');
}




public function unhideCabin(Request $req, $id)
  {
    $update = DB::table('cabins')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Cabin was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideCabin(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('cabins')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Cabin was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editCabin(Request $req, $id)
  {
    
    $update =Cabin::find( $id);

    
    return view('editCabin',compact('update'));
  }

public function updateCabin(Request $request, $id) {

if ($request->file('image')=="") {
     $Cabin = Cabin::find($id);
    $Cabin->title = $request->input('title');
    $Cabin->description = $request->input('description');
    $Cabin->save();
    return redirect()->back()->with('success', 'Cabin updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('Cabin/'), $file_name);
    $Cabin = Cabin::find($id);
    $Cabin->title = $request->input('title');
    $Cabin->description = $request->input('description');
    $Cabin->image = $file_name;
    $Cabin->save();
    return redirect()->back()->with('success', 'Cabin updated successfully.');
}
}
}
