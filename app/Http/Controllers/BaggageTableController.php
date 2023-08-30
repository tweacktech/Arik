<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaggageTable;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class BaggageTableController extends Controller
{
    
public function __construct()
    {
        $this->middleware('auth');
    }


public function BaggageTable(){


  $data =BaggageTable::all();

  return view('manage_BaggageTable',compact('data'));
}

public function addBaggageTable(Request $req){


      $validator = Validator::make($req->all(), [
            'Routing' => 'nullable|string|max:255',
            'Concept' => 'nullable|string|max:255',
            'Businessclass' => 'nullable|string|max:255',
            'Premiumclass' => 'nullable|string|max:255',
            'Economyclass' => 'nullable|string|max:255',
            'Allclasses' => 'nullable|string|max:255',
            'Infant' => 'nullable|string|max:255',
            'Rate' => 'nullable',
            'Factor' => 'nullable|string',
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

    
        // Create a new BaggageTable with validated data
        $BaggageTable = new BaggageTable();
        $BaggageTable->Routing = $req->input('Routing');
        $BaggageTable->Concept = $req->input('Concept');
        $BaggageTable->Businessclass = $req->input('Businessclass');
        $BaggageTable->Premiumclass = $req->input('Premiumclass');
        $BaggageTable->Economyclass = $req->input('Economyclass');
        $BaggageTable->Allclasses = $req->input('Allclasses');
        $BaggageTable->Infant = $req->input('Infant');
        $BaggageTable->Rate = $req->input('Rate');
        $BaggageTable->Factor = $req->input('Factor');
        $BaggageTable->save();
        return redirect()->back();
}

public function deleteBaggageTable($id) {
    $BaggageTable = BaggageTable::find($id);
    $BaggageTable->delete();
    
    return redirect()->back()->with('success', 'BaggageTable deleted successfully.');
}




public function unhideBaggageTable(Request $req, $id)
  {
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a BaggageTable was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideBaggageTable(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('hotels')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a BaggageTable was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editBaggageTable(Request $req, $id)
  {
    
    $update =BaggageTable::find( $id);
    
    return view('editBaggageTable',compact('update'));
  }

public function updateBaggageTable(Request $request, $id) {

        $BaggageTable = BaggageTable::find($id);
        $BaggageTable->Routing = $request->input('Routing');
        $BaggageTable->Concept = $request->input('Concept');
        $BaggageTable->Businessclass = $request->input('Businessclass');
        $BaggageTable->Premiumclass = $request->input('Premiumclass');
        $BaggageTable->Economyclass = $request->input('Economyclass');
        $BaggageTable->Allclasses = $request->input('Allclasses');
        $BaggageTable->Infant = $request->input('Infant');
        $BaggageTable->Rate = $request->input('Rate');
        $BaggageTable->Factor = $request->input('Factor');
        $BaggageTable->save();

    return redirect()->back()->with('success', 'BaggageTable updated successfully.');
       
}
}
