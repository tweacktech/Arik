<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\DealsOffer;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
use App\Models\DealLabel;
use App\Models\DealIcon;

class DealsOfferController extends Controller
{
    
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function editDealIcons($id){

        $data=Db::table('deal_icons')->where('deal_id',$id)->get();
        $id=$id;
        if ($data) {
           return view('manage_web.icons',compact('data', 'id')); 
        }
       return view('manage_web.icons',compact('data', 'id')); 
    }

      public function update_dealicons(Request $request)
  {

    if ($request->file('image1')=="") {

         $file = $request->file('image');
    $file_name1 = time() . $file->getClientOriginalName();
    $file->move(public_path('dealsicon'), $file_name1);

 $DealsOffer= new DealIcon();
 $DealsOffer->title = $request->input('title');
 $DealsOffer->deal_id = $request->input('deal_id');
    $DealsOffer->image = $file_name1;
    $DealsOffer->save();
    return redirect()->back()->with('success', 'DealsOffer updated successfully.');


    }

  }

    public function DealLabel(){

        $update=DB::table('deal_labels')->where('id',1)->first();

        return view('editDealLabel', compact('update'));
    }


    public function storeOrUpdate(Request $request,$id)
    {
        
if ($request->file('image')=="") {
     $DealLabel = DealLabel::find($id);
    $DealLabel->title = $request->input('title');
    $DealLabel->description = $request->input('description');
    $DealLabel->save();
    return redirect()->back()->with('success', 'DealLabel updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('dlabel/'), $file_name);

    $DealLabel = DealLabel::find($id);
    $DealLabel->title = $request->input('title');
    $DealLabel->description = $request->input('description');
    $DealLabel->image = $file_name;
    $DealLabel->save();
    return redirect()->back()->with('success', 'DealsOffer updated successfully.');
}
return redirect()->back()->with('error', 'Could not perform this action');
}



public function DealsOffer($id){

$id=$id;
  $data =DealsOffer::all();

  return view('manage_DealsOffer',compact('data','id'));
}

public function addDealsOffer(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
            'background_color' => 'required|string|max:255',
            'image' => 'required|image',
            'homepage_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($req->file('image')=="" && $req->file('image')=="") {
            
        }else{
        $file = $req->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('deals/'), $file_name);
        // Create a new DealsOffer with validated data
     $files = $req->file('kid_image');
    $file_names = time() . $files->getClientOriginalName();
    $files->move(public_path('deals/'), $file_names);

        $DealsOffer = new DealsOffer();
        $DealsOffer->title = $req->input('title');
        $DealsOffer->type = $req->input('type');
        $DealsOffer->description = $req->input('description');
        $DealsOffer->kid = $req->input('kid');
        $DealsOffer->kid_title = $req->input('kid_title');
        $DealsOffer->homepage_id = $req->input('homepage_id');
        $DealsOffer->background_color = $req->input('background_color');
        $DealsOffer->image = $file_name;
        $DealsOffer->kid_image = $file_names;
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

public function deletedealsicon($id) {
    $DealsOffer = DealIcon::find($id);
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

  if ($request->file('image')!="" && $request->file('kid_image')!="") {
     $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('deals/'), $file_name);

     $files = $request->file('kid_image');
    $file_names = time() . $files->getClientOriginalName();
    $files->move(public_path('deals/'), $file_names);

    $DealsOffer = DealsOffer::find($id);
    $DealsOffer->title = $request->input('title');
    $DealsOffer->description = $request->input('description');
    $DealsOffer->homepage_id = $request->input('homepage_id');
    $DealsOffer->type = $request->input('type');
    $DealsOffer->kid = $request->input('kid');
    $DealsOffer->kid_title = $request->input('kid_title');
    $DealsOffer->background_color = $request->input('background_color');
    $DealsOffer->image = $file_name;
    $DealsOffer->kid_image = $file_names;
    $DealsOffer->save();
    return redirect()->back()->with('success', 'DealsOffer updated successfully.');

  }elseif ($request->file('image')!="") {
    $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('deals/'), $file_name);

    $DealsOffer = DealsOffer::find($id);
    $DealsOffer->title = $request->input('title');
    $DealsOffer->description = $request->input('description');
    $DealsOffer->homepage_id = $request->input('homepage_id');
    $DealsOffer->type = $request->input('type');
    $DealsOffer->kid = $request->input('kid');
    $DealsOffer->kid_title = $request->input('kid_title');
    $DealsOffer->background_color = $request->input('background_color');
    $DealsOffer->image = $file_name;
    $DealsOffer->save();
    return redirect()->back()->with('success', 'DealsOffer updated successfully.');

  }elseif($request->file('kid_image')!=""){

     $files = $request->file('kid_image');
    $file_names = time() . $files->getClientOriginalName();
    $files->move(public_path('deals/'), $file_names);

    $DealsOffer = DealsOffer::find($id);
    $DealsOffer->title = $request->input('title');
    $DealsOffer->description = $request->input('description');
    $DealsOffer->homepage_id = $request->input('homepage_id');
    $DealsOffer->type = $request->input('type');
    $DealsOffer->kid = $request->input('kid');
    $DealsOffer->kid_title = $request->input('kid_title');
    $DealsOffer->background_color = $request->input('background_color');
    $DealsOffer->kid_image = $file_names;
    $DealsOffer->save();
    return redirect()->back()->with('success', 'DealsOffer updated successfully.');

  }else{

   $DealsOffer = DealsOffer::find($id);
    $DealsOffer->title = $request->input('title');
    $DealsOffer->description = $request->input('description');
    $DealsOffer->homepage_id = $request->input('homepage_id');
    $DealsOffer->type = $request->input('type');
    $DealsOffer->kid = $request->input('kid');
    $DealsOffer->kid_title = $request->input('kid_title');
    $DealsOffer->background_color = $request->input('background_color');
    $DealsOffer->save();
    return redirect()->back()->with('success', 'DealsOffer updated successfully.');

  }

}


}
