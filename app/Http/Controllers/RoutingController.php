<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Routing;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class RoutingController extends Controller
{
public function __construct()
    {
        $this->middleware('auth');
    }


public function Routing(){


  $data =Routing::all();

  return view('manage_Routing',compact('data'));
}

public function addRouting(Request $req){


      $validator = Validator::make($req->all(), [
            'routing' => 'required|string|max:255',
            'business_class' => 'required|string|max:255',
            'economy' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Create a new Routing with validated data
        $Routing = new Routing();
        $Routing->routing = $req->input('routing');
        $Routing->business_class = $req->input('business_class');
        $Routing->economy = $req->input('economy');
        $Routing->save();
     return redirect()->back()->with('success', 'Routing Added successfully.');
   }

public function deleteRouting($id) {
    $Routing = Routing::find($id);
    $Routing->delete();
    
    return redirect()->back()->with('success', 'Routing deleted successfully.');
}




public function unhideRouting(Request $req, $id)
  {
    $update = DB::table('routings')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Routing was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideRouting(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('routings')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Routing was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editRouting(Request $req, $id)
  {
    
    $update =Routing::find( $id);

    
    return view('editRouting',compact('update'));
  }

public function updateRouting(Request $request, $id) {


     $Routing = Routing::find($id);
     $Routing->routing = $request->input('routing');
        $Routing->business_class = $request->input('business_class');
        $Routing->economy = $request->input('economy');
    $Routing->save();
    return redirect()->back()->with('success', 'Routing updated successfully.');
       
}

}
