<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubMenu;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;

class CategoryController extends Controller
{
    


      public function __construct()
    {
        $this->middleware('auth');
    }

// public function index(){

//   $totalmenus =Category::count();
//   $totalsubmenus =subMenu::count();
//   $menus =Category::all();
//   $sub_menus =SubMenu::all();

//   return view('overallmenu',compact('totalmenus','totalsubmenus','menus','sub_menus'));
// }

public function Category(){

  $data =Category::all();

  return view('manage_Category',compact('data'));
}
public function SubMenu(){

  $data =SubMenu::all();

  return view('manage_SubMenu',compact('data'));
}

public function addCategory(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
            $link ='/'.str_replace(' ', '', $req->input('title'));
        // Create a new Category with validated data
        $Category = new Category();
        $Category->title = $req->input('title');
        $Category->link = $link;
        $Category->save();
  return redirect()->back();
    }

public function deleteCategory($id) {
    $Category = Category::find($id);
    $sub_menus=SubCategory::where('menu_id',$id)->get();
    foreach ($sub_menus as $key) {
       $key->delete();
    }
    $Category->delete();
    return redirect()->back()->with('success', 'Category deleted successfully.');
}





public function unhideCategory(Request $req, $id)
  {
    $update = DB::table('categories')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Category was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideCategory(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('categories')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a Category was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editCategory(Request $req, $id)
  {
    
    $update =Category::find( $id);

    
    return view('editCategory',compact('update'));
  }

public function updateCategory(Request $request, $id) {
      $link ='/'.str_replace(' ', '', $request->input('title'));
    $Category = Category::find($id);
    $Category->title = $request->input('title');
    $Category->link = $link;
    $Category->save();
    return redirect()->back()->with('success', 'Category updated successfully.');
}


}
