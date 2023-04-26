<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Social;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class SocialController extends Controller
{


   public function __construct()
    {
        $this->middleware('auth');
    }


public function Social(){

  $data =Social::all();

  return view('manage_social',compact('data'));
}

public function addSocial(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'url' => 'required',
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($req->file('image')=="") {
            
        }else{
        $file = $req->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('social/'), $file_name);
        // Create a new Social with validated data
        $Social = new Social();
        $Social->title = $req->input('title');
        $Social->url = $req->input('url');
        $Social->image = $file_name;
        $Social->save();
  return redirect()->back();}
}

public function deleteSocial($id) {
    $Social = Social::find($id);
    $Social->delete();
    
    return redirect()->back()->with('success', 'Social deleted successfully.');
}




public function unhideSocial(Request $req, $id)
  {
    $update = DB::table('socials')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Social was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideSocial(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('socials')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Social was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editSocial(Request $req, $id)
  {
    
    $update =Social::find( $id);

    
    return view('editSocial',compact('update'));
  }

public function updateSocial(Request $request, $id) {

if ($request->file('image')=="") {
     $Social = Social::find($id);
    $Social->title = $request->input('title');
    $Social->url = $request->input('url');
    $Social->save();
    return redirect()->back()->with('success', 'Social updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('social/'), $file_name);

    $Social = Social::find($id);
    $Social->title = $request->input('title');
    $Social->url = $request->input('url');
    $Social->image = $file_name;
    $Social->save();
    return redirect()->back()->with('success', 'Social updated successfully.');
}
}

}
