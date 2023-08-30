<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Course;
use App\Models\CourseCat;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class APITrainController extends Controller
{

     public function Training(){
        $id=1;
        $data=Training::where('id',$id)->first();
         return response()->json(['data'=>$data]);
    }   


public function CourseCat(){

  $data =CourseCat::all();

  return response()->json(['data'=>$data]);
    }

    public function showCourseCat($id){
        $data=Course::where('course_cats_id',$id)->get();
         return response()->json(['data'=>$data]);
    }

         public function Course(){

  $data =Course::all();

  return response()->json(['data'=>$data]);
    }

    public function showCourse($id){
        $data=Course::find($id);
         return response()->json(['data'=>$data]);
    }


}
