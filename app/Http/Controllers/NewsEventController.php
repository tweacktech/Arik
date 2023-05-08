<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsEvent;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class NewsEventController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }


public function NewsEvent($id){

  $id=$id;
  $data =NewsEvent::all()->where('homepage_id',$id);

  return view('manage_NewsEvent',compact('data','id'));
}

public function addNewsEvent(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'homepage_id' => 'required|numeric',
            'eventdate' => 'required',
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($req->file('image')=="") {
            
        }else{
        $file = $req->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('Event/'), $file_name);
        // Create a new NewsEvent with validated data
        $NewsEvent = new NewsEvent();
        $NewsEvent->title = $req->input('title');
        $NewsEvent->description = $req->input('description');
        $NewsEvent->homepage_id = $req->input('homepage_id');
        $NewsEvent->eventdate = $req->input('eventdate');
        $NewsEvent->image = $file_name;
        $NewsEvent->save();
  return redirect()->back();}
}

public function deleteNewsEvent($id) {
    $NewsEvent = NewsEvent::find($id);
    $NewsEvent->delete();
    
    return redirect()->back()->with('success', 'NewsEvent deleted successfully.');
}




public function unhideNewsEvent(Request $req, $id)
  {
    $update = DB::table('news_events')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a NewsEvent was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideNewsEvent(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('news_events')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a NewsEvent was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editNewsEvent(Request $req, $id)
  {
    
    $update =NewsEvent::find( $id);

    
    return view('editNewsEvent',compact('update'));
  }

public function updateNewsEvent(Request $request, $id) {

if ($request->file('image')=="") {
     $NewsEvent = NewsEvent::find($id);
    $NewsEvent->title = $request->input('title');
    $NewsEvent->description = $request->input('description');
    $NewsEvent->homepage_id = $request->input('homepage_id');
    $NewsEvent->eventdate = $request->input('eventdate');
    $NewsEvent->save();
    return redirect()->back()->with('success', 'NewsEvent updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('Event/'), $file_name);

    $NewsEvent = NewsEvent::find($id);
    $NewsEvent->title = $request->input('title');
    $NewsEvent->description = $request->input('description');
    $NewsEvent->homepage_id = $request->input('homepage_id');
    $NewsEvent->eventdate = $request->input('eventdate');
    $NewsEvent->image = $file_name;
    $NewsEvent->save();
    return redirect()->back()->with('success', 'NewsEvent updated successfully.');
}
}

}
