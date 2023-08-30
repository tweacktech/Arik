<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Special;
use App\Models\SpecialSlider;
use App\Models\SpecialForm;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class SpecialController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function index(){


  $data =SpecialForm::all();

  return view('assistform.manage',compact('data'));
}

public function viewform(Request $req, $id)
  {
    
    $data =SpecialForm::find($id);
    
    return view('assistform.viewdetail',compact('data'));
  }


public function Special(){


  $data =Special::all();

  return view('manage_Special',compact('data'));
}

public function addSpecial(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

      
     
        // Create a new Special with validated data
        $Special = new Special();
        $Special->title = $req->input('title');
        $Special->description = $req->input('description');      
        $Special->save();
  return redirect()->back();
}

public function deleteSpecial($id) {
    $Special = Special::find($id);
    $Special->delete();
    
    return redirect()->back()->with('success', 'Special deleted successfully.');
}




public function unhideSpecial(Request $req, $id)
  {
    $update = DB::table('cabins')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Special was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideSpecial(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('cabins')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Special was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editSpecial(Request $req, $id)
  {
    
    $update =Special::find( $id);

    
    return view('editSpecial',compact('update'));
  }

public function updateSpecial(Request $request, $id) {


     $Special = Special::find($id);
    $Special->title = $request->input('title');
    $Special->description = $request->input('description');
    $Special->save();
    return redirect()->back()->with('success', 'Special updated successfully.');
      
}


public function editSpecialSlider()
  {
    $id=1;
    $update =SpecialSlider::find( $id);

    
    return view('editSpecialSlider',compact('update'));
  }

public function updateSpecialSlider(Request $request, $id) {

if ($request->file('image')=="") {
     $SpecialSlider = SpecialSlider::find($id);
    $SpecialSlider->title = $request->input('title');
    $SpecialSlider->description = $request->input('description');
    $SpecialSlider->save();
    return redirect()->back()->with('success', 'SpecialSlider updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('SpecialSlider/'), $file_name);
    $SpecialSlider = SpecialSlider::find($id);
    $SpecialSlider->title = $request->input('title');
    $SpecialSlider->description = $request->input('description');
    $SpecialSlider->image = $file_name;
    $SpecialSlider->save();
    return redirect()->back()->with('success', 'SpecialSlider updated successfully.');
}
}
}
