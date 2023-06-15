<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class FaqController extends Controller
{
     
   public function __construct()
    {
        $this->middleware('auth');
    }


public function Faq(){


  $data =Faq::all();

  return view('manage_Faq',compact('data'));
}

public function addFaq(Request $req){


      $validator = Validator::make($req->all(), [
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
       
        // Create a new Faq with validated data
        $Faq = new Faq();
        $Faq->question = $req->input('question');
        $Faq->answer = $req->input('answer');
        $Faq->save();
  return redirect()->back();

}

public function deleteFaq($id) {
    $Faq = Faq::find($id);
    $Faq->delete();
    
    return redirect()->back()->with('success', 'Faq deleted successfully.');
}




public function unhideFaq(Request $req, $id)
  {
    $update = DB::table('faqs')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Faq was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideFaq(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('faqs')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Faq was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editFaq(Request $req, $id)
  {
    
    $update =Faq::find( $id);

    
    return view('editFaq',compact('update'));
  }

public function updateFaq(Request $request, $id) {

     $Faq = Faq::find($id);
    $Faq->question = $request->input('question');
    $Faq->answer = $request->input('answer');
    $Faq->save();
    return redirect()->back()->with('success', 'Faq updated successfully.');
      }

}
