<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryAndDepartmentCont extends Controller
{
    // $table->string('cat_title');

    //Category Part
    public function all_job_department()
    {
        $department = DB::table('job_department')->get();

        return view('human_resource.department', compact('department'));
    }
    public function add_job_department(Request $request)
    {
        $data = [
            'job_department' => $request->title,
        ];
        $insert = DB::table('job_department')->insert($data);
        if ($insert) {
            return redirect()->back()->with('alert', 'Job Department Added');
        } else {
            return redirect()->back()->with('alert', 'Job Department Not Added');
        }
    }
    public function edit_job_department(Request $request)
    {
        // dd($request);
        $data = [
            'job_department' => $request->title,
        ];
        $insert = DB::table('job_department')->where('id', $request->id)->update($data);
        if ($insert) {
            return redirect()->back()->with('alert', 'Job Department Updated');
        } else {
            return redirect()->back()->with('alert', 'Job Deparment Not Updated');
        }
    }
    public function delete_job_department($id)
    {
        $delete = DB::table('job_department')->where('id', $id)->delete();
        if ($delete) {
            return redirect()->back()->with('alert', 'Job Department Deleted');
        } else {
            return redirect()->back()->with('alert', 'Job Department Not Deleted');
        }
    }






    // Sub Category Part

    public function get_sub($id)
    {
        $category = DB::table('job_sub_category')->where('cat_id', $id)->get();

        $options = "";

        foreach ($category as $cat) {
            $options .= '<option value="' . $cat->id . '">' . $cat->sub_cat_title . '</option>';
        }

        return response()->json(['data' => $options]);
    }
    public function all_sub_job_category($id)
    {
        $category = DB::table('job_sub_category')->where('cat_id', $id)->get();

        $view = 'sub_cat';
        return view('human_resource.category', compact('category', 'view'));
    }
    public function add_sub_job_category(Request $request)
    {
        $data = [
            'cat_id' => $request->cat_id,
            'sub_cat_title' => $request->title,
        ];
        $insert = DB::table('job_sub_category')->insert($data);
        if ($insert) {
            return redirect()->back()->with('alert', 'Sub Category Added');
        } else {
            return redirect()->back()->with('alert', 'Sub Category Not Added');
        }
    }
    public function edit_sub_job_category(Request $request)
    {
        // dd($request);
        $data = [
            'sub_cat_title' => $request->title,
        ];
        $insert = DB::table('job_sub_category')->where('id', $request->id)->update($data);
        if ($insert) {
            return redirect()->back()->with('alert', 'Sub Category Updated');
        } else {
            return redirect()->back()->with('alert', 'Sub Category Not Updated');
        }
    }
    public function delete_sub_job_category($id)
    {
        $delete = DB::table('job_sub_category')->where('id', $id)->delete();
        if ($delete) {
            return redirect()->back()->with('alert', 'Sub Category Deleted');
        } else {
            return redirect()->back()->with('alert', 'Sub Category Not Deleted');
        }
    }



    //Category Part
    public function all_job_category()
    {
        $category = DB::table('job_category')->get();

        $view = 'cat';
        return view('human_resource.category', compact('category', 'view'));
    }
    public function add_job_category(Request $request)
    {
        $data = [
            'cat_title' => $request->title,
        ];
        $insert = DB::table('job_category')->insert($data);
        if ($insert) {
            return redirect()->back()->with('alert', 'Job Category Added');
        } else {
            return redirect()->back()->with('alert', 'Job Category Not Added');
        }
    }
    public function edit_job_category(Request $request)
    {
        // dd($request);
        $data = [
            'cat_title' => $request->title,
        ];
        $insert = DB::table('job_category')->where('id', $request->id)->update($data);
        if ($insert) {
            return redirect()->back()->with('alert', 'Job Category Updated');
        } else {
            return redirect()->back()->with('alert', 'Job Category Not Updated');
        }
    }
    public function delete_job_category($id)
    {
        $delete = DB::table('job_category')->where('id', $id)->delete();
        if ($delete) {
            return redirect()->back()->with('alert', 'Job Category Deleted');
        } else {
            return redirect()->back()->with('alert', 'Job Category Not Deleted');
        }
    }
}
