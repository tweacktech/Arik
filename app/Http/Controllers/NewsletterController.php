<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
class NewsletterController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

public function newsletter($id){

$id=$id;
  $data =Newsletter::all();

  return view('manage_newsletter',compact('data','id'));
}

public function addnewsletter(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'homepage_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new newsletter with validated data
        $newsletter = new Newsletter();
        $newsletter->title = $req->input('title');
        $newsletter->description = $req->input('description');
        $newsletter->homepage_id = $req->input('homepage_id');
        $newsletter->link = $req->input('link');
        $newsletter->save();
  return redirect()->back();
}

public function deleteNewsletter($id) {
    $newsletter = Newsletter::find($id);
    $newsletter->delete();
    
    return redirect()->back()->with('success', 'Newsletter deleted successfully.');
}





public function unhideNews(Request $req, $id)
  {
    $update = DB::table('newsletters')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a newsletter was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideNews(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('newsletters')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a newsletter was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editnews(Request $req, $id)
  {
    
    $update =Newsletter::find( $id);

    
    return view('editnewsletter',compact('update'));
  }

public function updateNewsletter(Request $request, $id) {
    $newsletter = Newsletter::find($id);
    $newsletter->title = $request->input('title');
    $newsletter->description = $request->input('description');
    $newsletter->homepage_id = $request->input('homepage_id');
    $newsletter->link = $request->input('link');
    $newsletter->save();
    return redirect()->back()->with('success', 'Newsletter updated successfully.');
}



}
