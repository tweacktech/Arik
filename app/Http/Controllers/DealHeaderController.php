<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DealHeader;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class DealHeaderController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function DealHeader(){


  $data =DealHeader::all();

  return view('manage_DealHeader',compact('data'));
}

public function addDealHeader(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($req->file('image')=="") {
            
        }else{
        $file = $req->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('DealHeader/'), $file_name);
        // Create a new DealHeader with validated data
        $DealHeader = new DealHeader();
        $DealHeader->title = $req->input('title');
        $DealHeader->description = $req->input('description');
        $DealHeader->image = $file_name;
        $DealHeader->save();
  return redirect()->back();}
}

public function deleteDealHeader($id) {
    $DealHeader = DealHeader::find($id);
    $DealHeader->delete();
    
    return redirect()->back()->with('success', 'DealHeader deleted successfully.');
}




public function unhideDealHeader(Request $req, $id)
  {
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a DealHeader was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideDealHeader(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a DealHeader was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editDealHeader(Request $req, $id)
  {
    
    $update =DealHeader::find( $id);

    
    return view('editDealHeader',compact('update'));
  }

public function updateDealHeader(Request $request, $id) {

if ($request->file('image')=="") {
     $DealHeader = DealHeader::find($id);
    $DealHeader->title = $request->input('title');
    $DealHeader->description = $request->input('description');
    $DealHeader->save();
    return redirect()->back()->with('success', 'DealHeader updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('DealHeader/'), $file_name);
    $DealHeader = DealHeader::find($id);
    $DealHeader->title = $request->input('title');
    $DealHeader->description = $request->input('description');
    $DealHeader->image = $file_name;
    $DealHeader->save();
    return redirect()->back()->with('success', 'DealHeader updated successfully.');
}
}
}
