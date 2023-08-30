<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deal;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class DealController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function Deal(){


  $data =Deal::all();

  return view('manage_Deal',compact('data'));
}

public function addDeal(Request $req){


      $validator = Validator::make($req->all(), [
            'locations' => 'required|string|max:255',
            'promodays' => 'required|string|max:255',
            'promocode' => 'required|string|max:255',
            'promomonth' => 'required|string|max:255',
            'promoprice' => 'required|string|max:255',
            'category' => 'required',
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
    $file->move(public_path('Deal/'), $file_name);
        // Create a new Deal with validated data
        $Deal = new Deal();
        $Deal->locations = $req->input('locations');
        $Deal->promodays = $req->input('promodays');
        $Deal->promocode = $req->input('promocode');
        $Deal->promomonth = $req->input('promomonth');
        $Deal->promoprice = $req->input('promoprice');
        $Deal->category = $req->input('category'); 
        $Deal->description = $req->input('description'); 
        $Deal->image = $file_name;
        $Deal->save();
  return redirect()->back();}
}

public function deleteDeal($id) {
    $Deal = Deal::find($id);
    $Deal->delete();
    
    return redirect()->back()->with('success', 'Deal deleted successfully.');
}




public function unhideDeal(Request $req, $id)
  {
    $update = DB::table('deals')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Deal was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideDeal(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('deals')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Deal was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editDeal(Request $req, $id)
  {
    
    $update =Deal::find( $id);

    
    return view('editDeal',compact('update'));
  }

public function updateDeal(Request $request, $id) {

if ($request->file('image')=="") {
     $Deal = Deal::find($id);
    $Deal->locations = $request->input('locations');
    $Deal->promodays = $request->input('promodays');
    $Deal->promocode = $request->input('promocode');
    $Deal->promomonth = $request->input('promomonth');
    $Deal->promoprice = $request->input('promoprice');
    $Deal->category = $request->input('category');
    $Deal->description = $request->input('description');
    $Deal->save();
    return redirect()->back()->with('success', 'Deal updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('Deal/'), $file_name);
    $Deal = Deal::find($id);
    $Deal->locations = $request->input('locations');
    $Deal->promodays = $request->input('promodays');
    $Deal->promocode = $request->input('promocode');
    $Deal->promomonth = $request->input('promomonth');
    $Deal->promoprice = $request->input('promoprice');
    $Deal->category = $request->input('category');
    $Deal->description = $request->input('description');
    $Deal->image = $file_name;
    $Deal->save();
    return redirect()->back()->with('success', 'Deal updated successfully.');
}
}
}
