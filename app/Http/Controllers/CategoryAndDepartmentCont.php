<?php

namespace App\Http\Controllers;

use App\Mail\Update;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class CategoryAndDepartmentCont extends Controller
{
    // $table->string('cat_title');


    public function upload_staff_details(Request $request)
    {

        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('excel_file');

        // Get the path to store the file
        $filePath = $file->storeAs('excel_imports', $file->getClientOriginalName(), 'public');

        // Use Laravel's Excel import method
        $data = Excel::toArray([], storage_path("app/public/{$filePath}"))[0];

        $failedImports = [];

        // Process and insert data into the database
        foreach ($data as $row) {
            try {
                $rand = 'Pa3s' . rand(1111, 9999) . 'xeaQ';
                $data = [
                    'email_address' => $row[0],
                    'first_name' => $row[1],
                    'last_name' => $row[2],
                    'country' => $row[3],
                    'state_of_origin' => $row[4],
                    'type' => 'internal',
                    'password' => Hash::make($rand),
                ];
                DB::table('job_applicants')->insert($data);
                $title = 'New Account Created';
                $body_of_message = "Here are your new account Details <br><br> Email Address: " . $row[0] . "<br><br> Names: " . $row[1] . " " . $row[2] . "<br><br> Country:" . $row[3] . "<br></br> Password:" . $rand . "<br>";
                Mail::to($row[0])->send(new Update($row[1], $title, $body_of_message));
            } catch (\Illuminate\Database\QueryException $e) {
                // Handle duplicate entry or other database errors
                // Log the error, for example:
                Log::error('Error importing data: ' . $e->getMessage());

                // Add the failed entry to the array
                $failedImports[] = $row[1]; // Assuming the first name is in the second column
            }
        }

        // Pass the array of failed first names back to the view
        return redirect()->back()->with('alert', 'Data imported successfully!')->with('failedImports', $failedImports);
    }



    // All users

    public function all_users()
    {
        $users = DB::table('job_applicants')->where('type', 'internal')->get();
        $external_users = DB::table('job_applicants')->where('type', '<>', 'internal')->orWhere('type', Null)->get();

        // dd($external_users);


        return view('human_resource.users', compact('users', 'external_users'));
    }



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
