<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class FeatureController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }


public function Feature($id){

$id=$id;
  $data =Feature::all()->where('homepage_id',$id);

  return view('manage_Feature',compact('data','id'));
}

public function addFeature(Request $req){


      $validator = Validator::make($req->all(), [
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'homepage_id' => 'required|numeric',
            'image' => 'required|image',
            'icon' => 'required|image'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($req->file('image')=="" && $req->file('icon')=="") {
            
        }else{
        $file = $req->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('feature/'), $file_name);

   $files = $req->file('icon');
    $file_names = time() . $files->getClientOriginalName();
    $files->move(public_path('feature/'), $file_names);
        // Create a new Feature with validated data
        $Feature = new Feature();
        $Feature->name = $req->input('name');
        $Feature->title = $req->input('title');
        $Feature->description = $req->input('description');
        $Feature->homepage_id = $req->input('homepage_id');
        $Feature->image = $file_name;
        $Feature->icon = $file_names;
        $Feature->save();
  return redirect()->back();}
}

public function deleteFeature($id) {
    $Feature = Feature::find($id);
    $Feature->delete();
    
    return redirect()->back()->with('success', 'Feature deleted successfully.');
}




public function unhideFeature(Request $req, $id)
  {
    $update = DB::table('features')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a features was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideFeature(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('features')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a features was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }

public function editFeature(Request $req, $id)
  {
    
    $update =Feature::find( $id);

    
    return view('editFeature',compact('update'));
  }

public function updateFeature(Request $request, $id) {

if ($request->file('image')=="") {
    $Feature = Feature::find($id);
    $Feature->name = $request->input('name');
    $Feature->title = $request->input('title');
    $Feature->description = $request->input('description');
    $Feature->homepage_id = $request->input('homepage_id');
    $Feature->save();
    return redirect()->back()->with('success', 'Feature updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('feature/'), $file_name);

     $files = $request->file('icon');
    $file_names = time() . $files->getClientOriginalName();
    $files->move(public_path('feature/'), $file_names);

    $Feature = Feature::find($id);
    $Feature->name = $request->input('name');
    $Feature->title = $request->input('title');
    $Feature->description = $request->input('description');
    $Feature->homepage_id = $request->input('homepage_id');
    $Feature->image = $file_name;
    $Feature->icon = $file_names;
    $Feature->save();
    return redirect()->back()->with('success', 'Feature updated successfully.');
}
}

}
