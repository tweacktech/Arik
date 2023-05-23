<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsEvent;
use App\Models\NewsEventLabel;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class NewsEventController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }



public function NewsEventLabel(){

     $update=DB::table('news_event_labels')->where('id',1)->first();

        return view('newseventlabel', compact('update'));
}


public function NewsEventLabelstore(Request $request,$id)
    {
        
if ($request->file('image')=="") {
     $NewsEventLabel = NewsEventLabel::find($id);
    $NewsEventLabel->title = $request->input('title');
    $NewsEventLabel->description = $request->input('description');
    $NewsEventLabel->save();
    return redirect()->back()->with('success', 'NewsEventLabel updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('Event/'), $file_name);

    $NewsEventLabel = NewsEventLabel::find($id);
    $NewsEventLabel->title = $request->input('title');
    $NewsEventLabel->description = $request->input('description');
    $NewsEventLabel->image = $file_name;
    $NewsEventLabel->save();
    return redirect()->back()->with('success', 'DealsOffer updated successfully.');
}
return redirect()->back()->with('error', 'Could not perform this action');
}

public function NewsEvent($id){

  $id=$id;
  $data =NewsEvent::all()->where('homepage_id',$id);

  return view('manage_NewsEvent',compact('data','id'));
}

public function addNewsEvent(Request $req){

 $r=$req->all();
$categories = $r['categories'];


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'homepage_id' => 'required|numeric',
            'eventdate' => 'required',
            'location' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
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
        $NewsEvent->location = $req->input('location');
        $NewsEvent->homepage_id = $req->input('homepage_id');
        $NewsEvent->eventdate = $req->input('eventdate');
        $NewsEvent->start_time = $req->input('start_time');
        $NewsEvent->end_time = $req->input('end_time');
        $NewsEvent->image = $file_name;
        $NewsEvent->category_id =$req->input('categories[]');
        $NewsEvent->save();
        if ($NewsEvent==True) {
            return redirect()->back()->with('success','NewsEvent added successfully');
        }
  return redirect()->back()->with('success','An error');
}}


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
 
 // return $request->input('categories',[]);
if ($request->file('image')=="") {
     $NewsEvent = NewsEvent::find($id);
    $NewsEvent->title = $request->input('title');
    $NewsEvent->description = $request->input('description');
    $NewsEvent->location = $request->input('location');
    $NewsEvent->homepage_id = $request->input('homepage_id');
    $NewsEvent->eventdate = $request->input('eventdate');
    $NewsEvent->start_time = $request->input('start_time');
    $NewsEvent->end_time = $request->input('end_time');
     $NewsEvent->category_id =$request->input('categories[]');
    $NewsEvent->save();
    return redirect()->back()->with('success', 'NewsEvent updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('Event/'), $file_name);

    $NewsEvent = NewsEvent::find($id);
    $NewsEvent->title = $request->input('title');
    $NewsEvent->description = $request->input('description');
    $NewsEvent->location = $request->input('location');
    $NewsEvent->homepage_id = $request->input('homepage_id');
    $NewsEvent->start_time = $request->input('start_time');
    $NewsEvent->end_time = $request->input('end_time');
    $NewsEvent->eventdate = $request->input('eventdate');
    $NewsEvent->image = $file_name;
    $NewsEvent->category_id =$request->input('categories[]');
    $NewsEvent->save();
    return redirect()->back()->with('success', 'NewsEvent updated successfully.');
}
}

}
