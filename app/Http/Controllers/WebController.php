<?php

namespace App\Http\Controllers;

error_reporting(0);

use DB;
use Illuminate\Http\Request;
use Hash;
use Carbon\Carbon;
use Auth;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
 

  public function web_content()
  {
    $company = DB::table('company')
      ->first();

    return view('manage_web.web_content', compact('company'));
  }



  public function logo(){
    return view('manage_web.logo');
  }

  public function weblogo(Request $req)
  {
    //first image
    $file = $req->file('img');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('uploads/logo'), $file_name);

    $data = [
      'logo' => $file_name,

    ];

    $update = DB::table('web_logos')
      ->update($data);

    if ($update) {

      DB::table('activities')
        ->insert([
          'activity' => 'Slider Updated by ' . Auth::user()->name,
          'activity_type' => 'Upload Slider'
        ]);

      return redirect()->back()->with('message', 'Updated Successfully');
    } else {
      return redirect()->back()->with('message', 'Could not update Slider');
    }
  }


  public function update_web_content(Request $req)
  {
    $data = [
      'company_name' => $req->company_name,
      'company_email' => $req->company_email,
      'company_phone' => $req->company_phone,
      'address_1' => $req->address_1,
      'address_2' => $req->address_2,
      'address_3' => $req->address_3,
    ];

    $update = DB::table('company')
      ->update($data);

    if ($update) {
      $user = Auth::user()->name;

      DB::table('activities')
        ->insert([
          'activity' => "Company Profile Updated by $user",
          'activity_type' => 'edit'
        ]);

      return redirect()->back()->with('message', 'Updated Successfully');
    }
    return redirect()->back()->with('message', 'Already Updated');
  }
  public function web_offer()
  {

    //get company 
    $content = DB::table('offers')
      ->first();

    return view('manage_web.offer', compact('content'));
  }

  public function update_web_offer(Request $req)
  {
    $data = [
      'content' => $req->content
    ];
    $company = DB::table('offers')
      ->first();
    if ($company == '') {
      $insert = DB::table('offers')->insert($data);
    }

    $update = DB::table('offers')
      ->update($data);

    if ($update) {
      $user = Auth::user()->name;

      DB::table('activities')
        ->insert([
          'activity' => "Company Profile Updated by $user",
          'activity_type' => 'edit'
        ]);

      return redirect()->back()->with('message', 'Updated Successfully');
    }
    return redirect()->back()->with('message', 'Already Updated');
  }

  public function update_website(Request $req)
  {
    $data = [
      'about' => $req->about,
      'terms' => $req->terms,
      'policy' => $req->policy,
    ];

    $update = DB::table('website')
      ->update($data);

    if ($update) {

      DB::table('activities')
        ->insert([
          'activity' => 'Policy content edited by ' . Auth::user()->name,
          'activity_type' => 'Policy content'
        ]);

      echo "Updated Successfully";
    } else {
      echo "Could not update";
    }
  }


 public function update_faq(Request $req)
  {
    $data = [
      'faq' => $req->faq,
      
    ];

    $update = DB::table('faqs')
      ->update($data);

    if ($update) {

      DB::table('activities')
        ->insert([
          'activity' => 'FAQ edited by ' . Auth::user()->name,
          'activity_type' => 'FAQ'
        ]);

      echo "Updated Successfully";
    } else {
      echo "Could not update";
    }
  }



  public function slider2()
  {
    return view('manage_web.slider2');
  }

  public function slider()
  {
    return view('manage_web.slider');
  }

  public function update_slider(Request $req)
  {
    //first image
    $file = $req->file('img');
    $filel = $req->file('img_2');
    $filee = $req->file('img_3');
    $home=$req->input('homepage');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('uploads/slider'), $file_name);
    //second image
    
    $file_name2 = time() . $filel->getClientOriginalName();
    $filel->move(public_path('uploads/slider'), $file_name2);
    // third image
    
    $file_name3 = time() . $filee->getClientOriginalName();
    $filee->move(public_path('uploads/slider'), $file_name3);

    $slidercheck=DB::table('slider')->where('homepage',$req->input('homepage'))->first();

    if ($slidercheck!=0) {
      // code...
    

    $data = [
      'img' => $file_name,
      'img_2' => $file_name2,
      'img_3' => $file_name2,
    ];

    $update = DB::table('slider')
    ->where('homepage',$home)
      ->update($data);

    if ($update) {

      DB::table('activities')
        ->insert([
          'activity' => 'Slider Updated by ' . Auth::user()->name,
          'activity_type' => 'Upload Slider'
        ]);
      return redirect()->back()->with('message', 'Updated Successfully');
    } else {
      return redirect()->back()->with('message', 'Could not update Slider');
    }
  }else{

    $data = [
      'img' => $file_name,
      'img_2' => $file_name2,
      'img_3' => $file_name2,
      'homepage' => $home,

    ];

    $update = DB::table('slider')
      ->insert($data);

    if ($update) {

      DB::table('activities')
        ->insert([
          'activity' => 'Slider Added by ' . Auth::user()->name,
          'activity_type' => 'Added Slider'
        ]);
      return redirect()->back()->with('message', 'Updated Successfully');
    } else {
      return redirect()->back()->with('message', 'Could not update Slider');
    }

  }
  }

  public function update_slider2(Request $req)
  {
    //first image
    $file = $req->file('img');
    $file_name = time() . $file->getClientOriginalName();
    $file->move(public_path('uploads/slider'), $file_name);
    //second image
    $filel = $req->file('img_2');
    $file_name2 = time() . $filel->getClientOriginalName();
    $filel->move(public_path('uploads/slider'), $file_name2);
    // third image
    $filee = $req->file('img_3');
    $file_name3 = time() . $filee->getClientOriginalName();
    $filee->move(public_path('uploads/slider'), $file_name3);

    $data = [
      'img' => $file_name,
      'img_2' => $file_name2,
      'img_3' => $file_name2,
    ];

    $update = DB::table('slider2')
      ->update($data);

    if ($update) {

      DB::table('activities')
        ->insert([
          'activity' => 'Slider Updated by ' . Auth::user()->name,
          'activity_type' => 'Upload Slider'
        ]);

      return redirect()->back()->with('message', 'Updated Successfully');
    } else {
      return redirect()->back()->with('message', 'Could not update Slider');
    }
  }

  public function website()
  {

    $website = DB::table('website')
      ->first();

    return view('manage_web.website', compact('website'));
  }

  public function faq()
  {

    $website = DB::table('faqs')
      ->first();

    return view('manage_web.Faq', compact('website'));
  }

  public function about_us()
  {

    return view('aboutus');
  }

  


  public function view_client_details(Request $req, $id)
  {
    $clients = DB::table('clients')
      ->where(DB::raw('md5(id)'), '=', $id)
      ->first();


    return view('client.view_client_details', compact('clients'));
  }


  public function message_settings(Request $req)
  {

    $message = DB::table('message_settings')
      ->first();

    return view('messages.message_settings', compact('message'));
  }


  public function updateMessageSettings(Request $req)
  {
    $data = [
      'welcome' => $req->welcome,
      'confirmation' => $req->confirmation,
      'processing' => $req->processing,
    ];

    $update = DB::table('message_settings')
      ->update($data);

    if ($update) {

      DB::table('activities')
        ->insert([
          'activity' => 'Eamil Message Settings edited by ' . Auth::user()->name,
          'activity_type' => 'Message Settings'
        ]);

      echo "Updated Successfully";
    } else {
      echo "Could not update";
    }
  }




}
