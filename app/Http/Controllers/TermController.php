<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Term;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class TermController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function Term(){


  $data =Term::all();

  return view('manage_Term',compact('data'));
}

public function addTerm(Request $req){


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
    $file->move(public_path('Term/'), $file_name);
        // Create a new Term with validated data
        $Term = new Term();
        $Term->title = $req->input('title');
        $Term->description = $req->input('description');
        $Term->image = $file_name;
        $Term->save();
  return redirect()->back();}
}

public function deleteTerm($id) {
    $Term = Term::find($id);
    $Term->delete();
    
    return redirect()->back()->with('success', 'Term deleted successfully.');
}




public function unhideTerm(Request $req, $id)
  {
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Term was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideTerm(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Term was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editTerm(Request $req, $id)
  {
    
    $update =Term::find( $id);

    
    return view('editTerm',compact('update'));
  }

public function updateTerm(Request $request, $id) {

if ($request->file('image')=="") {
     $Term = Term::find($id);
    $Term->title = $request->input('title');
    $Term->description = $request->input('description');
    $Term->save();
    return redirect()->back()->with('success', 'Term updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('Term/'), $file_name);
    $Term = Term::find($id);
    $Term->title = $request->input('title');
    $Term->description = $request->input('description');
    $Term->image = $file_name;
    $Term->save();
    return redirect()->back()->with('success', 'Term updated successfully.');
}
}
}
