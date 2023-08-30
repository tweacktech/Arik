<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelExtra;
use App\Models\TraExFooter;
use App\Models\TraExSlider;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class TravelExtraController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function TravelExtra(){


  $data =TravelExtra::all();

  return view('manage_TravelExtra',compact('data'));
}

public function addTravelExtra(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($req->file('image')=="") {
            
        }else{
        $file = $req->file('image');
     $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('TravelExtra/'), $file_name);
        // Create a new TravelExtra with validated data
        $TravelExtra = new TravelExtra();
        $TravelExtra->title = $req->input('title');
        $TravelExtra->description = $req->input('description');
        $TravelExtra->image = $file_name;
        $TravelExtra->save();
  return redirect()->back();}
}

public function deleteTravelExtra($id) {
    $TravelExtra = TravelExtra::find($id);
    $TravelExtra->delete();
    
    return redirect()->back()->with('success', 'TravelExtra deleted successfully.');
}




public function unhideTravelExtra(Request $req, $id)
  {
    $update = DB::table('cabins')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a TravelExtra was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideTravelExtra(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('cabins')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a TravelExtra was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editTravelExtra(Request $req, $id)
  {
    
    $update =TravelExtra::find( $id);

    
    return view('editTravelExtra',compact('update'));
  }

public function updateTravelExtra(Request $request, $id) {

if ($request->file('image')=="") {
     $TravelExtra = TravelExtra::find($id);
    $TravelExtra->title = $request->input('title');
    $TravelExtra->description = $request->input('description');
    $TravelExtra->save();
    return redirect()->back()->with('success', 'TravelExtra updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('TravelExtra/'), $file_name);
    $TravelExtra = TravelExtra::find($id);
    $TravelExtra->title = $request->input('title');
    $TravelExtra->description = $request->input('description');
    $TravelExtra->image = $file_name;
    $TravelExtra->save();
    return redirect()->back()->with('success', 'TravelExtra updated successfully.');
}
}



public function editTravelExtraSlider()
  {
    $id=1;
    $update =TraExSlider::find( $id);

    
    return view('editTravelExtraSlider',compact('update'));
  }

public function updateTravelExtraSlider(Request $request, $id) {

if ($request->file('image')=="") {
     $TraExSlider = TraExSlider::find($id);
    $TraExSlider->title = $request->input('title');
    $TraExSlider->description = $request->input('description');
    $TraExSlider->save();
    return redirect()->back()->with('success', 'TraExSlider updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('TraExSlider/'), $file_name);
    $TraExSlider = TraExSlider::find($id);
    $TraExSlider->title = $request->input('title');
    $TraExSlider->description = $request->input('description');
    $TraExSlider->image = $file_name;
    $TraExSlider->save();
    return redirect()->back()->with('success', 'TraExSlider updated successfully.');
}
}


public function editTravelExtraFooter()
  {
    $id=1;
    $update =TraExFooter::find( $id);

    
    return view('editTravelExtraFooter',compact('update'));
  }

public function updateTravelExtraFooter(Request $request, $id) {

if ($request->file('image')=="") {
     $TraExFooter = TraExFooter::find($id);
    $TraExFooter->title = $request->input('title');
    $TraExFooter->description = $request->input('description');
    $TraExFooter->save();
    return redirect()->back()->with('success', 'TraExFooter updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('TraExFooter/'), $file_name);
    $TraExFooter = TraExFooter::find($id);
    $TraExFooter->title = $request->input('title');
    $TraExFooter->description = $request->input('description');
    $TraExFooter->image = $file_name;
    $TraExFooter->save();
    return redirect()->back()->with('success', 'TravelExtra updated successfully.');
}
}
}
