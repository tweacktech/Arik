<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Commercial;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class CommercialController extends Controller
{
    
      public function __construct()
    {
        $this->middleware('auth');
    }


public function Commercial($id){

$id=$id;
  $data =Commercial::all();

  return view('manage_Commercial',compact('data','id'));
}

public function addCommercial(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image',
             'title2' => 'required|string|max:255',
            'description2' => 'required|string',
            'homepage_id' => 'required|numeric',
            'image2' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($req->file('image')=="" && $req->file('image2')=="") {
            
        }else{
        $file = $req->file('image');
    $file_name = uniqid() . $file->getClientOriginalName();
    $file->move(public_path('Commercial/'), $file_name);

   $files = $req->file('image2');
    $file_names = time() . $files->getClientOriginalName();
    $files->move(public_path('Commercial/'), $file_names);

    $video = $req->file('video');
    if ($video=="") {
      $Commercial = new Commercial();
        $Commercial->title = $req->input('title');
        $Commercial->description = $req->input('description');
         $Commercial->title2 = $req->input('title2');
        $Commercial->description2 = $req->input('description2');
        $Commercial->homepage_id = $req->input('homepage_id');
        $Commercial->image = $file_name;
        $Commercial->image2 = $file_names;
        $Commercial->video = $req->input('video_url');
        $Commercial->save();
   return redirect()->back()->with('success', 'Commercial added successfully.');
    }else{
    $video_names = time() . $video->getClientOriginalName();
    $video->move(public_path('Commercial/video/'), $file_names);
        // Create a new Commercial with validated data
        $Commercial = new Commercial();
        $Commercial->title = $req->input('title');
        $Commercial->description = $req->input('description');
        $Commercial->title2 = $req->input('title2');
        $Commercial->description2 = $req->input('description2');
        $Commercial->homepage_id = $req->input('homepage_id');
        $Commercial->image = $file_name;
        $Commercial->image2 = $file_names;
        $Commercial->video = $video_names;
        $Commercial->save();
   return redirect()->back()->with('success', 'Commercial added successfully.');
 }
}
}

public function deleteCommercial($id) {
    $Commercial = Commercial::find($id);
    $Commercial->delete();

    return redirect()->back()->with('success', 'Commercial deleted successfully.');
}




public function unhideCommercial(Request $req, $id)
  {
    $update = DB::table('commercials')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Commercials was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideCommercial(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('commercials')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Commercials was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
        
      return redirect()->back();
    }
    return redirect()->back();
  }

public function editCommercial(Request $req, $id)
  {
    
    $update =Commercial::find( $id);

    
    return view('editCommercial',compact('update'));
  }

public function updateCommercial(Request $request, $id) {

if ($request->file('image')!="" && $request->file('image2')!="") {
  
        $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('Commercial/'), $file_name);

     $files = $request->file('image2');
    $file_names = time() . $files->getClientOriginalName();
    $files->move(public_path('Commercial/'), $file_names);
   
      $Commercial = Commercial::find($id);
        $Commercial->title = $request->input('title');
        $Commercial->description = $request->input('description');
         $Commercial->title2 = $request->input('title2');
         $Commercial->description2 = $request->input('description2');
        $Commercial->homepage_id = $request->input('homepage_id');
        $Commercial->image = $file_name;
        $Commercial->image2 = $file_names;
        $Commercial->video = $request->input('video_url');
        $Commercial->save();
   return redirect()->back()->with('success', 'Commercial added successfully.');

  }elseif ($request->file('image')!="") {
    

          $file = $request->file('image');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('Commercial/'), $file_name);
   
      $Commercial = Commercial::find($id);
        $Commercial->title = $request->input('title');
        $Commercial->description = $request->input('description');
         $Commercial->title2 = $request->input('title2');
         $Commercial->description2 = $request->input('description2');
        $Commercial->homepage_id = $request->input('homepage_id');
        $Commercial->image = $file_name;
        $Commercial->video = $request->input('video_url');
        $Commercial->save();
   return redirect()->back()->with('success', 'Commercial added successfully.');


  }elseif($request->file('image2')!=""){
    
     $files = $request->file('image2');
    $file_names = time() . $files->getClientOriginalName();
    $files->move(public_path('Commercial/'), $file_names);
   
      $Commercial = Commercial::find($id);
        $Commercial->title = $request->input('title');
        $Commercial->description = $request->input('description');
         $Commercial->title2 = $request->input('title2');
         $Commercial->description2 = $request->input('description2');
        $Commercial->homepage_id = $request->input('homepage_id');
        $Commercial->image2 = $file_names;
        $Commercial->video = $request->input('video_url');
        $Commercial->save();
   return redirect()->back()->with('success', 'Commercial added successfully.');

}else{

        $Commercial = Commercial::find($id);
        $Commercial->title = $request->input('title');
        $Commercial->description = $request->input('description');
         $Commercial->title2 = $request->input('title2');
         $Commercial->description2 = $request->input('description2');
        $Commercial->homepage_id = $request->input('homepage_id');
        $Commercial->video = $request->input('video_url');
        $Commercial->save();
         return redirect()->back()->with('success', 'Commercial added successfully.');
}


  return redirect()->back();

}
}
