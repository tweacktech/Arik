<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppStore;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;


class AppStoreController extends Controller
{
    
   public function __construct()
    {
        $this->middleware('auth');
    }


public function AppStore(){


  $data =AppStore::all();

  return view('manage_AppStore',compact('data'));
}

public function addAppStore(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'image' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($req->file('image')=="") {
            
        }else{
        $file = $req->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('appstore/'), $file_name);
        // Create a new AppStore with validated data
        $AppStore = new AppStore();
        $AppStore->title = $req->input('title');
        $AppStore->link = $req->input('link');
        $AppStore->image = $file_name;
        $AppStore->save();
return redirect()->back()->with('success', 'successfully added');
}
  return redirect()->back()->with('error', 'Could not perform this action');
}

public function deleteAppStore($id) {
    $AppStore = AppStore::find($id);
    $AppStore->delete();
    
    return redirect()->back()->with('success', 'AppStore deleted successfully.');
}


public function unhideAppStore(Request $req, $id)
  {
    $update = DB::table('appstores')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a AppStore was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back()->with('success', 'AppStore unhide successfully.');
    }
  return redirect()->back()->with('error', 'Could not perform this action');
  }

  public function hideAppStore(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('appstores')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a AppStore was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
    return redirect()->back()->with('success', 'AppStore hidden successfully.');
    }
   return redirect()->back()->with('error', 'Could not perform this action');
  }
public function editAppStore(Request $req, $id)
  {
    
    $update =AppStore::find( $id);

    
    return view('editAppStore',compact('update'));
  }

public function updateAppStore(Request $request, $id) {

if ($request->file('image')=="") {
     $AppStore = AppStore::find($id);
    $AppStore->title = $request->input('title');
    $AppStore->link = $request->input('link');
    $AppStore->save();
    return redirect()->back()->with('success', 'AppStore updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('appstore/'), $file_name);

    $AppStore = AppStore::find($id);
    $AppStore->title = $request->input('title');
    $AppStore->link = $request->input('link');
    $AppStore->image = $file_name;
    $AppStore->save();
    return redirect()->back()->with('success', 'AppStore updated successfully.');
}
return redirect()->back()->with('error', 'Could not perform this action');
}
}
