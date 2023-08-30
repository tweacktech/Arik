<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CareHeader;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class CareHeaderController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function CareHeader(){


  $data =CareHeader::all();

  return view('manage_CareHeader',compact('data'));
}

public function addCareHeader(Request $req){


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
    $file->move(public_path('CareHeader/'), $file_name);
        // Create a new CareHeader with validated data
        $CareHeader = new CareHeader();
        $CareHeader->title = $req->input('title');
        $CareHeader->description = $req->input('description');
        $CareHeader->image = $file_name;
        $CareHeader->save();
  return redirect()->back();}
}

public function deleteCareHeader($id) {
    $CareHeader = CareHeader::find($id);
    $CareHeader->delete();
    
    return redirect()->back()->with('success', 'CareHeader deleted successfully.');
}




public function unhideCareHeader(Request $req, $id)
  {
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a CareHeader was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideCareHeader(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a CareHeader was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editCareHeader(Request $req, $id)
  {
    
    $update =CareHeader::find( $id);

    
    return view('editCareHeader',compact('update'));
  }

public function updateCareHeader(Request $request, $id) {

if ($request->file('image')=="") {
     $CareHeader = CareHeader::find($id);
    $CareHeader->title = $request->input('title');
    $CareHeader->description = $request->input('description');
    $CareHeader->save();
    return redirect()->back()->with('success', 'CareHeader updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('CareHeader/'), $file_name);
    $CareHeader = CareHeader::find($id);
    $CareHeader->title = $request->input('title');
    $CareHeader->description = $request->input('description');
    $CareHeader->image = $file_name;
    $CareHeader->save();
    return redirect()->back()->with('success', 'CareHeader updated successfully.');
}
}
}
