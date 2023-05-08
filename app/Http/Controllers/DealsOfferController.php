<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\DealsOffer;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class DealsOfferController extends Controller
{
    
   public function __construct()
    {
        $this->middleware('auth');
    }


public function DealsOffer($id){

$id=$id;
  $data =DealsOffer::all()->where('homepage_id',$id);

  return view('manage_DealsOffer',compact('data','id'));
}

public function addDealsOffer(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image',
            'homepage_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($req->file('image')=="") {
            
        }else{
        $file = $req->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('deals/'), $file_name);
        // Create a new DealsOffer with validated data
        $DealsOffer = new DealsOffer();
        $DealsOffer->title = $req->input('title');
        $DealsOffer->type = $req->input('type');
        $DealsOffer->description = $req->input('description');
        $DealsOffer->homepage_id = $req->input('homepage_id');
        $DealsOffer->image = $file_name;
        $DealsOffer->save();
return redirect()->back()->with('success', 'successfully added');
}
  return redirect()->back()->with('error', 'Could not perform this action');
}

public function deleteDealsOffer($id) {
    $DealsOffer = DealsOffer::find($id);
    $DealsOffer->delete();
    
    return redirect()->back()->with('success', 'DealsOffer deleted successfully.');
}




public function unhideDealsOffer(Request $req, $id)
  {
    $update = DB::table('deals_offers')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a DealsOffer was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back()->with('success', 'DealsOffer unhide successfully.');
    }
  return redirect()->back()->with('error', 'Could not perform this action');
  }

  public function hideDealsOffer(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('deals_offers')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a DealsOffer was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
    return redirect()->back()->with('success', 'DealsOffer hidden successfully.');
    }
   return redirect()->back()->with('error', 'Could not perform this action');
  }
public function editDealsOffer(Request $req, $id)
  {
    
    $update =DealsOffer::find( $id);

    
    return view('editDealsOffer',compact('update'));
  }

public function updateDealsOffer(Request $request, $id) {

if ($request->file('image')=="") {
     $DealsOffer = DealsOffer::find($id);
    $DealsOffer->title = $request->input('title');
    $DealsOffer->type = $request->input('type');
    $DealsOffer->description = $request->input('description');
    $DealsOffer->homepage_id = $request->input('homepage_id');
    $DealsOffer->save();
    return redirect()->back()->with('success', 'DealsOffer updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('deals/'), $file_name);

    $DealsOffer = DealsOffer::find($id);
    $DealsOffer->title = $request->input('title');
    $DealsOffer->type = $request->input('type');
    $DealsOffer->description = $request->input('description');
    $DealsOffer->image = $file_name;
    $DealsOffer->homepage_id = $request->input('homepage_id');
    $DealsOffer->save();
    return redirect()->back()->with('success', 'DealsOffer updated successfully.');
}
return redirect()->back()->with('error', 'Could not perform this action');
}

}
