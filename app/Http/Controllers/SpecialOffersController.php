<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpecialOffers;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class SpecialOffersController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function SpecialOffers(){


  $data =SpecialOffers::all();

  return view('manage_SpecialOffers',compact('data'));
}

public function addSpecialOffers(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'event_date' => 'required|string|max:255',
            'price' => 'required|string|max:255',
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
    $file->move(public_path('SpecialOffers/'), $file_name);
        // Create a new SpecialOffers with validated data
        $SpecialOffers = new SpecialOffers();
        $SpecialOffers->title = $req->input('title');
        $SpecialOffers->event_date = $req->input('event_date');
        $SpecialOffers->price = $req->input('price');
        $SpecialOffers->description = $req->input('description');
        $SpecialOffers->image = $file_name;
        $SpecialOffers->save();
  return redirect()->back();}
}

public function deleteSpecialOffers($id) {
    $SpecialOffers = SpecialOffers::find($id);
    $SpecialOffers->delete();
    
    return redirect()->back()->with('success', 'SpecialOffers deleted successfully.');
}




public function unhideSpecialOffers(Request $req, $id)
  {
    $update = DB::table('cabins')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a SpecialOffers was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideSpecialOffers(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('cabins')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a SpecialOffers was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editSpecialOffers(Request $req, $id)
  {
    
    $update =SpecialOffers::find( $id);

    
    return view('editSpecialOffers',compact('update'));
  }

public function updateSpecialOffers(Request $request, $id) {

if ($request->file('image')=="") {
     $SpecialOffers = SpecialOffers::find($id);
    $SpecialOffers->title = $request->input('title');
    $SpecialOffers->event_date = $request->input('event_date');
    $SpecialOffers->price = $request->input('price');
    $SpecialOffers->description = $request->input('description');
    $SpecialOffers->save();
    return redirect()->back()->with('success', 'SpecialOffers updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('SpecialOffers/'), $file_name);
    $SpecialOffers = SpecialOffers::find($id);
    $SpecialOffers->title = $request->input('title');
    $SpecialOffers->event_date = $request->input('event_date');
    $SpecialOffers->price = $request->input('price');
    $SpecialOffers->description = $request->input('description');
    $SpecialOffers->image = $file_name;
    $SpecialOffers->save();
    return redirect()->back()->with('success', 'SpecialOffers updated successfully.');
}
}

}
