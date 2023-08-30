<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Award;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class AwardController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function Award(){


  $data =Award::all();

  return view('manage_Award',compact('data'));
}

public function addAward(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'Award_year' => 'required',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

      
     
        // Create a new Award with validated data
        $Award = new Award();
        $Award->title = $req->input('title');
        $Award->Award_year = $req->input('Award_year');      
        $Award->description = $req->input('description');      
        $Award->save();
  return redirect()->back();
}

public function deleteAward($id) {
    $Award = Award::find($id);
    $Award->delete();
    
    return redirect()->back()->with('success', 'Award deleted successfully.');
}




public function unhideAward(Request $req, $id)
  {
    $update = DB::table('cabins')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Award was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideAward(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('cabins')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Award was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editAward(Request $req, $id)
  {
    
    $update =Award::find( $id);

    
    return view('editAward',compact('update'));
  }

public function updateAward(Request $request, $id) {


     $Award = Award::find($id);
    $Award->title = $request->input('title');
    $Award->Award_year = $request->input('Award_year');
    $Award->description = $request->input('description');
    $Award->save();
    return redirect()->back()->with('success', 'Award updated successfully.');
      
}

}
