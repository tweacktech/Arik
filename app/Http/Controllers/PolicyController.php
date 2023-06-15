<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Policy;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;


class PolicyController extends Controller
{
     
   public function __construct()
    {
        $this->middleware('auth');
    }


public function Policy(){


  $data =Policy::all();

  return view('manage_Policy',compact('data'));
}


public function addPolicy(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
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
    $file->move(public_path('policy/'), $file_name);

   $files = $req->file('icon');
    $file_names = time() . $files->getClientOriginalName();
    $files->move(public_path('policy/'), $file_names);
        // Create a new Policy with validated data
        $Policy = new Policy();
        $Policy->title = $req->input('title');
        $Policy->description = $req->input('description');
          $Policy->name = $req->input('name');
         $Policy->content = $req->input('content');
        $Policy->image = $file_name;
        $Policy->icon = $file_names;
        $Policy->save();
  return redirect()->back();}
}

public function deletePolicy($id) {
    $Policy = Policy::find($id);
    $Policy->delete();
    
    return redirect()->back()->with('success', 'Policy deleted successfully.');
}




public function unhidePolicy(Request $req, $id)
  {
    $update = DB::table('policies')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Policy was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hidePolicy(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('policies')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Policy was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editPolicy(Request $req, $id)
  {
    
    $update =Policy::find( $id);

    
    return view('editPolicy',compact('update'));
  }

public function updatePolicy(Request $request, $id) {


  if ($request->file('image')!="" && $request->file('icon')!="") {
     $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('policy/'), $file_name);

     $files = $request->file('icon');
    $file_names = time() . $files->getClientOriginalName();
    $files->move(public_path('policy/'), $file_names);

    $Policy = Policy::find($id);
    $Policy->title = $request->input('title');
    $Policy->description = $request->input('description');
    $Policy->name = $request->input('name');
    $Policy->content = $request->input('content');
    $Policy->image = $file_name;
    $Policy->icon = $file_names;
    $Policy->save();
    return redirect()->back()->with('success', 'Policy updated successfully.');

  }elseif ($request->file('image')!="") {
    $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('policy/'), $file_name);

    $Policy = Policy::find($id);
    $Policy->title = $request->input('title');
    $Policy->description = $request->input('description');
      $Policy->name = $request->input('name');
    $Policy->content = $request->input('content');
    $Policy->image = $file_name;
    $Policy->save();
    return redirect()->back()->with('success', 'Policy updated successfully.');

  }elseif($request->file('icon')!=""){

     $files = $request->file('icon');
    $file_names = time() . $files->getClientOriginalName();
    $files->move(public_path('policy/'), $file_names);

    $Policy = Policy::find($id);
    $Policy->title = $request->input('title');
    $Policy->description = $request->input('description');
      $Policy->name = $request->input('name');
    $Policy->content = $request->input('content');
    $Policy->icon = $file_names;
    $Policy->save();
    return redirect()->back()->with('success', 'Policy updated successfully.');

  }else{

   $Policy = Policy::find($id);
    $Policy->title = $request->input('title');
    $Policy->description = $request->input('description');
      $Policy->name = $request->input('name');
    $Policy->content = $request->input('content');
    $Policy->save();
    return redirect()->back()->with('success', 'Policy updated successfully.');

  }

}

}

