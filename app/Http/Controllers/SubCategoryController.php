<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;


class SubCategoryController extends Controller
{
    //


      public function __construct()
    {
        $this->middleware('auth');
    }

public function SubCategory(){

  $data =DB::table('sub_categories')
  ->join('categories','categories.id','sub_categories.category_id')
  ->select('sub_categories.*','categories.title as tite')
  ->latest()
  ->get();

  return view('manage_SubCategory',compact('data'));
}

public function addSubCategory(Request $req){


      $validator = Validator::make($req->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|numeric',
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
       $link ='/'.str_replace(' ', '', $req->input('title'));
        // Create a new SubCategory with validated data
        $SubCategory = new SubCategory();
        $SubCategory->title = $req->input('title');
        $SubCategory->category_id = $req->input('category_id');
        $SubCategory->link = $link;
        $SubCategory->save();
  return redirect()->back();
}

public function deleteSubCategory($id) {
    $SubCategory = SubCategory::find($id);
    $SubCategory->delete();
    
    return redirect()->back()->with('success', 'SubCategory deleted successfully.');
}





public function unhideSubCategory(Request $req, $id)
  {
    $update = DB::table('sub_categories')->where('id', $id)->update(['status' => '1']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a SubCategory was unhidden by' . Auth::user()->name,
          'activity_type' => 'unhide'
        ]);

      return redirect()->back();
    }
    return redirect()->back();
  }

  public function hideSubCategory(Request $req, $id)
  {
    //$data = ['status' => 0];
    $update = DB::table('sub_categories')->where('id', $id)->update(['status' => '0']);
    if ($update) {
      DB::table('activities')
        ->insert([
          'activity' => 'a SubCategory was hidden by' . Auth::user()->name,
          'activity_type' => 'hide'
        ]);
      return redirect()->back();
    }
    return redirect()->back();
  }
public function editSubCategory(Request $req, $id)
  {
    
    $update = $data =DB::table('sub_categories')
  ->join('categories','categories.id','sub_categories.category_id')
  ->select('sub_categories.*','categories.id as mid','categories.title as tite')
  ->where('sub_categories.id',$id)
  ->first();

    
    return view('editSubCategory',compact('update'));
  }

public function updateSubCategory(Request $request, $id) {
    $link ='/'.str_replace(' ', '', $request->input('title'));
    $SubCategory = SubCategory::find($id);
    $SubCategory->title = $request->input('title');
    $SubCategory->category_id = $request->input('category_id');
    $SubCategory->link = $link;
    $SubCategory->save();
    return redirect()->back()->with('success', 'SubCategory updated successfully.');
}

}
