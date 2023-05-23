<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;


class FooterController extends Controller
{
   

   public function __construct()
    {
        $this->middleware('auth');
    }


public function Footer($id){

$id=$id;
  $data =Footer::all()->where('homepage_id',$id);
  $count =Footer::all()->where('homepage_id',$id)->count();

  return view('manage_Footer',compact('data','id','count'));
}

public function addFooter(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'background_color' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'image' => 'required|image',
            'homepage_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($req->file('image')=="") {
            
        }else{
        $file = $req->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('footerlogo/'), $file_name);
        // Create a new Footer with validated data
        $Footer = new Footer();
        $Footer->title = $req->input('title');
        $Footer->color = $req->input('color');
        $Footer->background_color = $req->input('background_color');
        $Footer->homepage_id = $req->input('homepage_id');
        $Footer->image = $file_name;
        $Footer->save();
return redirect()->back()->with('success', 'successfully added');
}
  return redirect()->back()->with('error', 'Could not perform this action');
}

public function deleteFooter($id) {
    $Footer = Footer::find($id);
    $Footer->delete();
    
    return redirect()->back()->with('success', 'Footer deleted successfully.');
}




public function unhideFooter(Request $req, $id)
  {
    $update = DB::table('footers')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Footer was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back()->with('success', 'Footer unhide successfully.');
    }
  return redirect()->back()->with('error', 'Could not perform this action');
  }

  public function hideFooter(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('footers')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Footer was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
    return redirect()->back()->with('success', 'Footer hidden successfully.');
    }
   return redirect()->back()->with('error', 'Could not perform this action');
  }
public function editFooter(Request $req, $id)
  {
    
    $update =Footer::find( $id);

    
    return view('editFooter',compact('update'));
  }

public function updateFooter(Request $request, $id) {

if ($request->file('image')=="") {
     $Footer = Footer::find($id);
    $Footer->title = $request->input('title');
    $Footer->color = $request->input('color');
    $Footer->background_color = $request->input('background_color');
    $Footer->homepage_id = $request->input('homepage_id');
    $Footer->save();
    return redirect()->back()->with('success', 'Footer updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('footerlogo/'), $file_name);

    $Footer = Footer::find($id);
    $Footer->title = $request->input('title');
    $Footer->color = $request->input('color');
    $Footer->background_color = $request->input('background_color');
    $Footer->image = $file_name;
    $Footer->homepage_id = $request->input('homepage_id');
    $Footer->save();
    return redirect()->back()->with('success', 'Footer updated successfully.');
}
return redirect()->back()->with('error', 'Could not perform this action');
}
}
