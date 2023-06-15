<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class AboutController extends Controller
{
    
   public function __construct()
    {
        $this->middleware('auth');
    }


public function About(){

  $data =About::all();

  return view('manage_About',compact('data'));
}

public function addAbout(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image',
            'aviationIndustries' => 'required|numeric',
            'aviationIndustries_text' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($req->file('image')=="") {
            
        }else{
        $file = $req->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('about/'), $file_name);
        // Create a new About with validated data
        $About = new About();
        $About->title = $req->input('title');
        $About->description = $req->input('description');
        $About->aviationIndustries = $req->input('aviationIndustries');
        $About->aviationIndustries_text = $req->input('aviationIndustries_text');
        $About->image = $file_name;
        $About->save();
  return redirect()->back();}
}

public function deleteAbout($id) {
    $About = About::find($id);
    $About->delete();
    
    return redirect()->back()->with('success', 'About deleted successfully.');
}




public function unhideAbout(Request $req, $id)
  {
    $update = DB::table('abouts')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a About was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideAbout(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('abouts')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a About was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editAbout(Request $req, $id)
  {
    
    $update =About::find( $id);

    
    return view('editAbout',compact('update'));
  }

public function updateAbout(Request $request, $id) {

if ($request->file('image')=="") {
     $About = About::find($id);
    $About->title = $request->input('title');
    $About->description = $request->input('description');
    $About->aviationIndustries = $request->input('aviationIndustries');
    $About->aviationIndustries_text = $request->input('aviationIndustries_text');
    $About->save();
    return redirect()->back()->with('success', 'About updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('about/'), $file_name);

    $About = About::find($id);
    $About->title = $request->input('title');
    $About->description = $request->input('description');
    $About->aviationIndustries = $request->input('aviationIndustries');
    $About->aviationIndustries_text = $request->input('aviationIndustries_text');
    $About->image = $file_name;
    $About->save();
    return redirect()->back()->with('success', 'About updated successfully.');
}
}
}
