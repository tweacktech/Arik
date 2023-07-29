<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CareRent;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class CareRentController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function CareRent(){


  $data =CareRent::all();

  return view('manage_CareRent',compact('data'));
}

public function addCareRent(Request $req){


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
    $file->move(public_path('CareRent/'), $file_name);
        // Create a new CareRent with validated data
        $CareRent = new CareRent();
        $CareRent->title = $req->input('title');
        $CareRent->description = $req->input('description');
        $CareRent->image = $file_name;
        $CareRent->save();
  return redirect()->back();}
}

public function deleteCareRent($id) {
    $CareRent = CareRent::find($id);
    $CareRent->delete();
    
    return redirect()->back()->with('success', 'CareRent deleted successfully.');
}




public function unhideCareRent(Request $req, $id)
  {
    $update = DB::table('care_rents')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a CareRent was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideCareRent(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('care_rents')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a CareRent was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editCareRent(Request $req, $id)
  {
    
    $update =CareRent::find( $id);

    
    return view('editCareRent',compact('update'));
  }

public function updateCareRent(Request $request, $id) {

if ($request->file('image')=="") {
     $CareRent = CareRent::find($id);
    $CareRent->title = $request->input('title');
    $CareRent->description = $request->input('description');
    $CareRent->save();
    return redirect()->back()->with('success', 'CareRent updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('CareRent/'), $file_name);
    $CareRent = CareRent::find($id);
    $CareRent->title = $request->input('title');
    $CareRent->description = $request->input('description');
    $CareRent->image = $file_name;
    $CareRent->save();
    return redirect()->back()->with('success', 'CareRent updated successfully.');
}
}
}
