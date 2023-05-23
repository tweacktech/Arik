<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebMenu;
use App\Models\SubMenu;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class WebMenuController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }



public function updateO(Request $request)
{
    $posts = WebMenu::all();

    foreach ($posts as $post) {
        foreach ($request->order as $order) {
            if ($order['id'] == $post->id) {
                $post->update(['orderby' => $order['position']]);
            }
        }
    }
    
    return redirect()->back()->with('success', 'WebMenu deleted successfully.');
}


public function index(){

  $totalmenus =WebMenu::count();
  $totalsubmenus =subMenu::count();
  $menus =WebMenu::all();
  $sub_menus =SubMenu::all();

  return view('overallmenu',compact('totalmenus','totalsubmenus','menus','sub_menus'));
}

public function WebMenu(){

  $data =WebMenu::all();

  return view('manage_WebMenu',compact('data'));
}
public function SubMenu(){

  $data =SubMenu::all();

  return view('manage_SubMenu',compact('data'));
}

public function addWebMenu(Request $req){

$highestOrderValue = WebMenu::max('orderby');
$newOrderValue = $highestOrderValue + 1;


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
                        
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

       $link ='/'.str_replace(' ', '', $req->input('title'));
        // Create a new WebMenu with validated data
        $WebMenu = new WebMenu();
        $WebMenu->title = $req->input('title');
        $WebMenu->description = $req->input('description');
        $WebMenu->orderby = $newOrderValue ;
        $WebMenu->link = $link ;
        $WebMenu->save();
  return redirect()->back();
    }

public function deleteWebMenu($id) {
    $WebMenu = WebMenu::find($id);
    $sub_menus=SubMenu::where('menu_id',$id)->get();
    foreach ($sub_menus as $key) {
       $key->delete();
    }
    $WebMenu->delete();
    return redirect()->back()->with('success', 'WebMenu deleted successfully.');
}





public function unhideWebMenu(Request $req, $id)
  {
    $update = DB::table('web_menus')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a WebMenu was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideWebMenu(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('web_menus')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a WebMenu was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editWebMenu(Request $req, $id)
  {
    
    $update =WebMenu::find( $id);

    
    return view('editWebMenu',compact('update'));
  }

public function updateWebMenu(Request $request, $id) {
    $link ='/'.str_replace(' ', '', $request->input('title'));
    $WebMenu = WebMenu::find($id);
    $WebMenu->title = $request->input('title');
    $WebMenu->description = $request->input('description');
    $WebMenu->orderby = $request->input('orderby');
    $WebMenu->link = $link;
    $WebMenu->save();
    return redirect()->back()->with('success', 'WebMenu updated successfully.');
}



}
