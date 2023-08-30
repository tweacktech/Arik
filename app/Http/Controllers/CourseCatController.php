<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseCat;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class CourseCatController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function CourseCat(){


  $data =CourseCat::all();

  return view('manage_CourseCat',compact('data'));
}

public function addCourseCat(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

      
        // Create a new CourseCat with validated data
        $CourseCat = new CourseCat();
        $CourseCat->title = $req->input('title');
        $CourseCat->description = $req->input('description');
        $CourseCat->save();

  return redirect()->back();
}

public function deleteCourseCat($id) {
    $CourseCat = CourseCat::find($id);
    $CourseCat->delete();
    
    return redirect()->back()->with('success', 'CourseCat deleted successfully.');
}




public function unhideCourseCat(Request $req, $id)
  {
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a CourseCat was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideCourseCat(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a CourseCat was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editCourseCat(Request $req, $id)
  {
    
    $update =CourseCat::find( $id);

    
    return view('editCourseCat',compact('update'));
  }

public function updateCourseCat(Request $request, $id) {


     $CourseCat = CourseCat::find($id);
    $CourseCat->title = $request->input('title');
    $CourseCat->description = $request->input('description');
    $CourseCat->save();
    return redirect()->back()->with('success', 'CourseCat updated successfully.');
       
}
}
