<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seat;
use App\Models\SeatFooter;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class SeatController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function Seat(){


  $data =Seat::all();

  return view('manage_Seat',compact('data'));
}

public function addSeat(Request $req){


      $validator = Validator::make($req->all(), [
            'category' => 'required|string|max:255',
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
    $file->move(public_path('Seat/'), $file_name);

   $files = $req->file('icon');
    $file_names = time() . $files->getClientOriginalName();
    $files->move(public_path('Seat/'), $file_names);
        // Create a new Seat with validated data
        $Seat = new Seat();
        $Seat->category = $req->input('category');
        $Seat->title = $req->input('title');
        $Seat->description = $req->input('description');
        $Seat->image = $file_name;
        $Seat->icon = $file_names;
        $Seat->save();
  return redirect()->back();}
}


public function deleteSeat($id) {
    $Seat = Seat::find($id);
    $Seat->delete();
    
    return redirect()->back()->with('success', 'Seat deleted successfully.');
}




public function unhideSeat(Request $req, $id)
  {
    $update = DB::table('cafes')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Seat was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideSeat(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('cafes')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Seat was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editSeat(Request $req, $id)
  {
    
    $update =Seat::find( $id);

    
    return view('editSeat',compact('update'));
  }

public function updateSeat(Request $request, $id) {

  if ($request->file('image')!="" && $request->file('icon')!="") {
     $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('Seat/'), $file_name);

     $files = $request->file('icon');
    $file_names = time() . $files->getClientOriginalName();
    $files->move(public_path('Seat/'), $file_names);

    $Seat = Seat::find($id);
    $Seat->category = $request->input('category');
    $Seat->title = $request->input('title');
    $Seat->description = $request->input('description');
    $Seat->image = $file_name;
    $Seat->icon = $file_names;
    $Seat->save();
    return redirect()->back()->with('success', 'Seat updated successfully.');

  }elseif ($request->file('image')!="") {
    $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('Seat/'), $file_name);

    $Seat = Seat::find($id);
    $Seat->category = $request->input('category');
    $Seat->title = $request->input('title');
    $Seat->description = $request->input('description');
    $Seat->image = $file_name;
    $Seat->save();
    return redirect()->back()->with('success', 'Seat updated successfully.');

  }elseif($request->file('icon')!=""){

     $files = $request->file('icon');
    $file_names = time() . $files->getClientOriginalName();
    $files->move(public_path('Seat/'), $file_names);

    $Seat = Seat::find($id);
    $Seat->category = $request->input('category');
    $Seat->title = $request->input('title');
    $Seat->description = $request->input('description');
    $Seat->icon = $file_names;
    $Seat->save();
    return redirect()->back()->with('success', 'Seat updated successfully.');

  }else{

   $Seat = Seat::find($id);
    $Seat->category = $request->input('category');
    $Seat->title = $request->input('title');
    $Seat->description = $request->input('description');
    $Seat->save();
    return redirect()->back()->with('success', 'Seat updated successfully.');

  }

}






public function editSeatFooter()
  {
    $id=1;
    $update =SeatFooter::find( $id);

    
    return view('editSeatfooter',compact('update'));
  }

public function updateSeatFooter(Request $request, $id) {

if ($request->file('image')=="") {
     $SeatFooter = SeatFooter::find($id);
    $SeatFooter->title = $request->input('title');
    $SeatFooter->description = $request->input('description');
    $SeatFooter->save();
    return redirect()->back()->with('success', 'SeatFooter updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('SeatFooter/'), $file_name);
    $SeatFooter = SeatFooter::find($id);
    $SeatFooter->title = $request->input('title');
    $SeatFooter->description = $request->input('description');
    $SeatFooter->image = $file_name;
    $SeatFooter->save();
    return redirect()->back()->with('success', 'SeatFooter updated successfully.');
}
}
}
