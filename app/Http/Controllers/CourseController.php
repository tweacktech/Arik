<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class CourseController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function Course(){


  $data =Course::all();

  return view('manage_Course',compact('data'));
}

public function addCourse(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'course_cats_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

      
        // Create a new Course with validated data
        $Course = new Course();
        $Course->title = $req->input('title');
        $Course->description = $req->input('description');
        $Course->course_cats_id = $req->input('course_cats_id');
        $Course->save();

  return redirect()->back();
}

public function deleteCourse($id) {
    $Course = Course::find($id);
    $Course->delete();
    
    return redirect()->back()->with('success', 'Course deleted successfully.');
}




public function unhideCourse(Request $req, $id)
  {
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Course was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideCourse(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Course was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editCourse(Request $req, $id)
  {
    
    $update =Course::find( $id);

    
    return view('editCourse',compact('update'));
  }

public function updateCourse(Request $request, $id) {


     $Course = Course::find($id);
    $Course->title = $request->input('title');
    $Course->description = $request->input('description');
    $Course->course_cats_id = $request->input('course_cats_id');
    $Course->save();
    return redirect()->back()->with('success', 'Course updated successfully.');
       
}
}
