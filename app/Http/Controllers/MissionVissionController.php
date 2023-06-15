<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MissionVission;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;


class MissionVissionController extends Controller
{

public function __construct()
    {
        $this->middleware('auth');
    }


public function MissionVission(){


  $data =MissionVission::all();

  return view('manage_MissionVission',compact('data'));
}

public function addMissionVission(Request $req){


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
    $file->move(public_path('mission/'), $file_name);
        // Create a new MissionVission with validated data
        $MissionVission = new MissionVission();
        $MissionVission->title = $req->input('title');
        $MissionVission->description = $req->input('description');
        $MissionVission->image = $file_name;
        $MissionVission->save();
  return redirect()->back();}
}

public function deleteMissionVission($id) {
    $MissionVission = MissionVission::find($id);
    $MissionVission->delete();
    
    return redirect()->back()->with('success', 'MissionVission deleted successfully.');
}




public function unhideMissionVission(Request $req, $id)
  {
    $update = DB::table('mission_vissions')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a MissionVission was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideMissionVission(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('mission_vissions')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a MissionVission was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editMissionVission(Request $req, $id)
  {
    
    $update =MissionVission::find( $id);

    
    return view('editMissionVission',compact('update'));
  }

public function updateMissionVission(Request $request, $id) {

if ($request->file('image')=="") {
     $MissionVission = MissionVission::find($id);
    $MissionVission->title = $request->input('title');
    $MissionVission->description = $request->input('description');
    $MissionVission->save();
    return redirect()->back()->with('success', 'MissionVission updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('mission/'), $file_name);

    $MissionVission = MissionVission::find($id);
    $MissionVission->title = $request->input('title');
    $MissionVission->description = $request->input('description');
    $MissionVission->image = $file_name;
    $MissionVission->save();
    return redirect()->back()->with('success', 'MissionVission updated successfully.');
}
}


}
