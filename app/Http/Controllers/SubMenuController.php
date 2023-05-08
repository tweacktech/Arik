<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubMenu;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;


class SubMenuController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

public function SubMenu(){

  $data =DB::table('sub_menus')
  ->join('web_menus','web_menus.id','sub_menus.menu_id')
  ->select('sub_menus.*','web_menus.title as tite')
  ->latest()
  ->get();

  return view('manage_SubMenu',compact('data'));
}

public function addSubMenu(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'menu_id' => 'required|numeric',
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new SubMenu with validated data
        $SubMenu = new SubMenu();
        $SubMenu->title = $req->input('title');
        $SubMenu->menu_id = $req->input('menu_id');
        $SubMenu->save();
  return redirect()->back();
}

public function deleteSubMenu($id) {
    $SubMenu = SubMenu::find($id);
    $SubMenu->delete();
    
    return redirect()->back()->with('success', 'SubMenu deleted successfully.');
}





public function unhideSubMenu(Request $req, $id)
  {
    $update = DB::table('sub_menus')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a SubMenu was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideSubMenu(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('sub_menus')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a SubMenu was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editSubMenu(Request $req, $id)
  {
    
    $update = $data =DB::table('sub_menus')
  ->join('web_menus','web_menus.id','sub_menus.menu_id')
  ->select('sub_menus.*','web_menus.id as mid','web_menus.title as tite')
  ->where('sub_menus.id',$id)
  ->first();

    
    return view('editSubMenu',compact('update'));
  }

public function updateSubMenu(Request $request, $id) {
    $SubMenu = SubMenu::find($id);
    $SubMenu->title = $request->input('title');
    $SubMenu->menu_id = $request->input('menu_id');
    $SubMenu->save();
    return redirect()->back()->with('success', 'SubMenu updated successfully.');
}



}
