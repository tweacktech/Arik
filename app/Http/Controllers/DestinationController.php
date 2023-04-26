<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;


class DestinationController extends Controller
{
    

   public function __construct()
    {
        $this->middleware('auth');
    }


public function Destination(){

  $data =Destination::all();

  return view('manage_Destination',compact('data'));
}

public function addDestination(Request $req){


      $validator = Validator::make($req->all(), [
            'name' => 'required|string|max:255',
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
    $file->move(public_path('destination/'), $file_name);
        // Create a new Destination with validated data
        $Destination = new Destination();
        $Destination->name = $req->input('name');
        $Destination->description = $req->input('description');
        $Destination->image = $file_name;
        $Destination->save();
  return redirect()->back();}
}

public function deleteDestination($id) {
    $Destination = Destination::find($id);
    $Destination->delete();
    
    return redirect()->back()->with('success', 'Destination deleted successfully.');
}




public function unhideDestination(Request $req, $id)
  {
    $update = DB::table('destinations')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Destination was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideDestination(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('destinations')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Destination was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editDestination(Request $req, $id)
  {
    
    $update =Destination::find( $id);

    
    return view('editDestination',compact('update'));
  }

public function updateDestination(Request $request, $id) {

if ($request->file('image')=="") {
     $Destination = Destination::find($id);
    $Destination->name = $request->input('name');
    $Destination->description = $request->input('description');
    $Destination->save();
    return redirect()->back()->with('success', 'Destination updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('destination/'), $file_name);

    $Destination = Destination::find($id);
    $Destination->name = $request->input('name');
    $Destination->description = $request->input('description');
    $Destination->image = $file_name;
    $Destination->save();
    return redirect()->back()->with('success', 'Destination updated successfully.');
}
}

}
