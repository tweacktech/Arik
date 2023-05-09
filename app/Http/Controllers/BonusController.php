<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bonus;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class BonusController extends Controller
{
     

   public function __construct()
    {
        $this->middleware('auth');
    }


public function Bonus($id){
$id=$id;
  $data =Bonus::all();

  return view('manage_Bonus',compact('data','id'));
}

public function addBonus(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url_link' => 'required|string',
            'homepage_id' => 'required|numeric',
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($req->file('image')=="") {
            
        }else{
        $file = $req->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('Bonus/'), $file_name);
        // Create a new Bonus with validated data
        $Bonus = new Bonus();
        $Bonus->title = $req->input('title');
        $Bonus->description = $req->input('description');
        $Bonus->url_link = $req->input('url_link');
        $Bonus->homepage_id = $req->input('homepage_id');
        $Bonus->image = $file_name;
        $Bonus->save();
  return redirect()->back();}
}

public function deleteBonus($id) {
    $Bonus = Bonus::find($id);
    $Bonus->delete();
    
    return redirect()->back()->with('success', 'Bonus deleted successfully.');
}




public function unhideBonus(Request $req, $id)
  {
    $update = DB::table('Bonuses')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Bonus was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideBonus(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('Bonuses')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Bonus was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editBonus(Request $req, $id)
  {
    
    $update =Bonus::find( $id);

    
    return view('editBonus',compact('update'));
  }

public function updateBonus(Request $request, $id) {

if ($request->file('image')=="") {
     $Bonus = Bonus::find($id);
    $Bonus->title = $request->input('title');
    $Bonus->description = $request->input('description');
    $Bonus->url_link = $request->input('url_link');
    $Bonus->homepage_id = $request->input('homepage_id');
    $Bonus->save();
    return redirect()->back()->with('success', 'Bonus updated successfully.');
        }else{
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('Bonus/'), $file_name);

    $Bonus = Bonus::find($id);
    $Bonus->title = $request->input('title');
    $Bonus->description = $request->input('description');
    $Bonus->url_link = $request->input('url_link');
    $Bonus->homepage_id = $request->input('homepage_id');
    $Bonus->image = $file_name;
    $Bonus->save();
    return redirect()->back()->with('success', 'Bonus updated successfully.');
}
}



}
