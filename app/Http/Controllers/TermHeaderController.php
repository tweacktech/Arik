<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TermHeader;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class TermHeaderController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function TermHeader(){


  $data =TermHeader::all();

  return view('manage_TermHeader',compact('data'));
}

public function addTermHeader(Request $req){


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
    $file->move(public_path('TermHeader/'), $file_name);
        // Create a new TermHeader with validated data
        $TermHeader = new TermHeader();
        $TermHeader->title = $req->input('title');
        $TermHeader->description = $req->input('description');
        $TermHeader->image = $file_name;
        $TermHeader->save();
  return redirect()->back();}
}

public function deleteTermHeader($id) {
    $TermHeader = TermHeader::find($id);
    $TermHeader->delete();
    
    return redirect()->back()->with('success', 'TermHeader deleted successfully.');
}




public function unhideTermHeader(Request $req, $id)
  {
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a TermHeader was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideTermHeader(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a TermHeader was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editTermHeader(Request $req, $id)
  {
    
    $update =TermHeader::find( $id);

    
    return view('editTermHeader',compact('update'));
  }

public function updateTermHeader(Request $request, $id) {

if ($request->file('image')=="") {
     $TermHeader = TermHeader::find($id);
    $TermHeader->title = $request->input('title');
    $TermHeader->description = $request->input('description');
    $TermHeader->save();
    return redirect()->back()->with('success', 'TermHeader updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('TermHeader/'), $file_name);
    $TermHeader = TermHeader::find($id);
    $TermHeader->title = $request->input('title');
    $TermHeader->description = $request->input('description');
    $TermHeader->image = $file_name;
    $TermHeader->save();
    return redirect()->back()->with('success', 'TermHeader updated successfully.');
}
}
}
