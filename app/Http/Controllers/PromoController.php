<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class PromoController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }


public function Promo($id){

$id=$id;
  $data =Promo::all()->where('homepage_id',$id);

  return view('manage_promo',compact('data','id'));
}

public function addPromo(Request $req){

      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // 'url_link' => 'required|string',
            'price' => 'required|numeric',
            'homepage_id' => 'required|numeric',
            'color' => 'required',
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
         if ($req->file('image')=="") {
            
        }else{
        $file = $req->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('promo/'), $file_name);
        // Create a new Promo with validated data
        $Promo = new Promo();
        $Promo->title = $req->input('title');
        $Promo->homepage_id = $req->input('homepage_id');
        $Promo->description = $req->input('description');
        $Promo->price = $req->input('price');
        $Promo->color = $req->input('color');
        $Promo->image = $file_name;
        $Promo->save();
        return redirect()->back();
      }
}

public function deletePromo($id) {
    $Promo = Promo::find($id);
    $Promo->delete();
    
    return redirect()->back()->with('success', 'Promo deleted successfully.');
}


public function unhidePromo(Request $req, $id)
  {
    $update = DB::table('promos')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Promo was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hidePromo(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('promos')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Promo was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editPromo(Request $req, $id)
  {
    
    $update =Promo::find( $id);

    
    return view('editpromo',compact('update'));
  }

public function updatePromo(Request $request, $id) {
  if ($request->file('image')=="") {
    $Promo = Promo::find($id);
    $Promo->title = $request->input('title');
    $Promo->description = $request->input('description');
    $Promo->homepage_id = $request->input('homepage_id');
    $Promo->price = $request->input('price');
    $Promo->color = $request->input('color');
    $Promo->save();
    return redirect()->back()->with('success', 'Promo updated successfully.');
       }else{
         $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('promo/'), $file_name);
      $Promo = new Promo();
        $Promo->title = $request->input('title');
        $Promo->description = $request->input('description');
        $Promo->homepage_id = $request->input('homepage_id');
        $Promo->price = $request->input('price');
        $Promo->color = $request->input('color');
        $Promo->image = $file_name;
        $Promo->save();
        return redirect()->back()->with('success', 'Promo updated successfully.');

}

}

}
