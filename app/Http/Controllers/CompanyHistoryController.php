<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyHistory;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class CompanyHistoryController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function CompanyHistory(){


  $data =CompanyHistory::all();

  return view('manage_CompanyHistory',compact('data'));
}

public function addCompanyHistory(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'owner' => 'required|string',
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($req->file('image')=="") {
            
        }else{
        $file = $req->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('history/'), $file_name);
        // Create a new CompanyHistory with validated data
        $CompanyHistory = new CompanyHistory();
        $CompanyHistory->title = $req->input('title');
        $CompanyHistory->description = $req->input('description');
        $CompanyHistory->owner = $req->input('owner');
        $CompanyHistory->image = $file_name;
        $CompanyHistory->save();
  return redirect()->back();}
}

public function deleteCompanyHistory($id) {
    $CompanyHistory = CompanyHistory::find($id);
    $CompanyHistory->delete();
    
    return redirect()->back()->with('success', 'CompanyHistory deleted successfully.');
}




public function unhideCompanyHistory(Request $req, $id)
  {
    $update = DB::table('company_histories')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a CompanyHistory was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideCompanyHistory(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('company_histories')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a CompanyHistory was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editCompanyHistory(Request $req, $id)
  {
    
    $update =CompanyHistory::find( $id);

    
    return view('editCompanyHistory',compact('update'));
  }

public function updateCompanyHistory(Request $request, $id) {

if ($request->file('image')=="") {
     $CompanyHistory = CompanyHistory::find($id);
    $CompanyHistory->title = $request->input('title');
    $CompanyHistory->description = $request->input('description');
    $CompanyHistory->owner = $request->input('owner');
    $CompanyHistory->save();
    return redirect()->back()->with('success', 'CompanyHistory updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('history/'), $file_name);
    $CompanyHistory = CompanyHistory::find($id);
    $CompanyHistory->title = $request->input('title');
    $CompanyHistory->description = $request->input('description');
    $CompanyHistory->owner = $request->input('owner');
    $CompanyHistory->image = $file_name;
    $CompanyHistory->save();
    return redirect()->back()->with('success', 'CompanyHistory updated successfully.');
}
}
}
