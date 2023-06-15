<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuickBox;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class QuickBoxController extends Controller
{
    
   public function __construct()
    {
        $this->middleware('auth');
    }


public function QuickBox($id){

  $id=$id;
  $data =QuickBox::all();

  return view('manage_QuickBox',compact('data','id'));
}

public function addQuickBox(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'homepage_id' => 'required|numeric',
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($req->file('image')=="") {
            
        }else{
        $file = $req->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('quick/'), $file_name);
        // Create a new QuickBox with validated data
        $QuickBox = new QuickBox();
        $QuickBox->title = $req->input('title');
        $QuickBox->description = $req->input('description');
        $QuickBox->homepage_id = $req->input('homepage_id');
        $QuickBox->image = $file_name;
        $QuickBox->save();
  return redirect()->back();}
}

public function deleteQuickBox($id) {
    $QuickBox = QuickBox::find($id);
    $QuickBox->delete();
    
    return redirect()->back()->with('success', 'QuickBox deleted successfully.');
}




public function unhideQuickBox(Request $req, $id)
  {
    $update = DB::table('quick_boxes')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a QuickBox was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideQuickBox(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('quick_boxes')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a QuickBox was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editQuickBox(Request $req, $id)
  {
    
    $update =QuickBox::find( $id);

    
    return view('editQuickBox',compact('update'));
  }

public function updateQuickBox(Request $request, $id) {

if ($request->file('image')=="") {
     $QuickBox = QuickBox::find($id);
    $QuickBox->title = $request->input('title');
    $QuickBox->description = $request->input('description');
    $QuickBox->homepage_id = $request->input('homepage_id');
    $QuickBox->save();
    return redirect()->back()->with('success', 'QuickBox updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('quick/'), $file_name);

    $QuickBox = QuickBox::find($id);
    $QuickBox->title = $request->input('title');
    $QuickBox->description = $request->input('description');
    $QuickBox->homepage_id = $request->input('homepage_id');
    $QuickBox->image = $file_name;
    $QuickBox->save();
    return redirect()->back()->with('success', 'QuickBox updated successfully.');
}
}

}
