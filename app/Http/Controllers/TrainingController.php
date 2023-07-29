<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class TrainingController extends Controller
{
    


    public function editTraining()
  {
    $id=1;
    $update =Training::where('id',$id)->first();

    
    return view('editTraining',compact('update'));
  }

public function updateTraining(Request $request, $id) {

     $Training = Training::find($id);
    $Training->title = $request->input('title');
    $Training->description = $request->input('description');
    $Training->benefit = $request->input('benefit');
    $Training->complimentary = $request->input('complimentary');
    $Training->save();
    return redirect()->back()->with('success', 'Training updated successfully.');
       
}

}
