<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CafeHeader;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class CafeHeaderController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function CafeHeader(){


  $data =CafeHeader::all();

  return view('manage_CafeHeader',compact('data'));
}

public function addCafeHeader(Request $req){


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
    $file->move(public_path('CafeHeader/'), $file_name);
        // Create a new CafeHeader with validated data
        $CafeHeader = new CafeHeader();
        $CafeHeader->title = $req->input('title');
        $CafeHeader->description = $req->input('description');
        $CafeHeader->image = $file_name;
        $CafeHeader->save();
  return redirect()->back();}
}

public function deleteCafeHeader($id) {
    $CafeHeader = CafeHeader::find($id);
    $CafeHeader->delete();
    
    return redirect()->back()->with('success', 'CafeHeader deleted successfully.');
}




public function unhideCafeHeader(Request $req, $id)
  {
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a CafeHeader was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideCafeHeader(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a CafeHeader was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editCafeHeader(Request $req, $id)
  {
    
    $update =CafeHeader::find( $id);

    
    return view('editCafeHeader',compact('update'));
  }

public function updateCafeHeader(Request $request, $id) {

if ($request->file('image')=="") {
     $CafeHeader = CafeHeader::find($id);
    $CafeHeader->title = $request->input('title');
    $CafeHeader->description = $request->input('description');
    $CafeHeader->save();
    return redirect()->back()->with('success', 'CafeHeader updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('CafeHeader/'), $file_name);
    $CafeHeader = CafeHeader::find($id);
    $CafeHeader->title = $request->input('title');
    $CafeHeader->description = $request->input('description');
    $CafeHeader->image = $file_name;
    $CafeHeader->save();
    return redirect()->back()->with('success', 'CafeHeader updated successfully.');
}
}
}
