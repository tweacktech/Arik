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


public function Promo(){

  $data =Promo::all();

  return view('manage_promo',compact('data'));
}

public function addPromo(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new Promo with validated data
        $Promo = new Promo();
        $Promo->title = $req->input('title');
        $Promo->description = $req->input('description');
        $Promo->price = $req->input('price');
        $Promo->save();
  return redirect()->back();
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
    $Promo = Promo::find($id);
    $Promo->title = $request->input('title');
    $Promo->description = $request->input('description');
    $Promo->price = $request->input('price');
    $Promo->save();
    return redirect()->back()->with('success', 'Promo updated successfully.');
}

}
