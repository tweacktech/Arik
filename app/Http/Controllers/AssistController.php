<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assist;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class AssistController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function Assist(){


  $data =Assist::all();

  return view('manage_Assist',compact('data'));
}

public function addAssist(Request $req){


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
    $file->move(public_path('Assist/'), $file_name);
        // Create a new Assist with validated data
        $Assist = new Assist();
        $Assist->title = $req->input('title');
        $Assist->description = $req->input('description');
        $Assist->image = $file_name;
        $Assist->save();
  return redirect()->back();}
}

public function deleteAssist($id) {
    $Assist = Assist::find($id);
    $Assist->delete();
    
    return redirect()->back()->with('success', 'Assist deleted successfully.');
}




public function unhideAssist(Request $req, $id)
  {
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Assist was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideAssist(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Assist was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editAssist(Request $req, $id)
  {
    
    $update =Assist::find( $id);

    
    return view('editAssist',compact('update'));
  }

public function updateAssist(Request $request, $id) {

if ($request->file('image')=="") {
     $Assist = Assist::find($id);
    $Assist->title = $request->input('title');
    $Assist->description = $request->input('description');
    $Assist->save();
    return redirect()->back()->with('success', 'Assist updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('Assist/'), $file_name);
    $Assist = Assist::find($id);
    $Assist->title = $request->input('title');
    $Assist->description = $request->input('description');
    $Assist->image = $file_name;
    $Assist->save();
    return redirect()->back()->with('success', 'Assist updated successfully.');
}
}
}
