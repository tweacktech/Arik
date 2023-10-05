<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class APIJobController extends Controller
{
    public function sign_up(Request $request)
    {
        $data = [
            'email_address' => $request->email_address,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'country' => $request->country,
            'state_of_origin' => $request->state_of_origin,
            'lga' => $request->lga,
            'password' => Hash::make($request->password),
        ];

        $check  = DB::table('job_applicants')->where('email_address', $request->email_address)->exists();

        if ($check) {
            return response()->json(['status' => 'error', 'message' => 'Email Address Already Registered']);
        }
        $save  = DB::table('job_applicants')->insert($data);
        if ($save) {
            $username = $request->first_name . ' ' . $request->last_name;
            $token = rand(11111, 999999);

            Mail::to($request->email_address)->send(new Welcome($username, $token));
            $update  = DB::table('job_applicants')->where('email_address', $request->email_address)->update(['token' => $token]);

            $user  = DB::table('job_applicants')->where('email_address', $request->email_address)
                ->select('id', 'type', 'email_address', 'first_name', 'last_name', 'gender', 'marital_status', 'phone_number', 'country', 'state_of_origin', 'house_address', 'national_id_no', 'date_of_birth', 'email_verified_at', 'created_at', 'updated_at')
                ->first();
            return response()->json(['status' => 'success', 'message' => 'registration successful', 'user' => $user]);
        } else {
            return response()->json(['status' => 'success', 'message' => 'registration failed']);
        }
    }
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $check  = DB::table('job_applicants')->where('email_address', $email)
            ->first();

        if ($check) {
            $verify = Hash::check($password, $check->password);
            if ($verify) {
                $user  = DB::table('job_applicants')->where('email_address', $email)
                    ->select('id', 'type', 'email_address', 'first_name', 'last_name', 'gender', 'marital_status', 'phone_number', 'country', 'state_of_origin', 'house_address', 'national_id_no', 'date_of_birth', 'email_verified_at', 'created_at', 'updated_at')
                    ->first();
                return response()->json(['status' => 'success', 'message' => 'Login Successful', 'user' => $user], 200);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Wrong email or Password ']);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Wrong email or Password']);
        }
    }
    public function joblists()
    {
        $data = DB::table('job_listing as jl')
            ->leftjoin('job_category as jc', 'jc.id', 'jl.category')
            ->leftjoin('job_sub_category as jsc', 'jsc.id', 'jl.sub_category')
            ->leftjoin('job_department as jd', 'jd.id', 'jl.job_department')
            ->where('status', 'active')
            ->select('*', 'jl.created_at as created_at', 'jl.id as id', 'jd.job_department as department', 'jsc.sub_cat_title as sub_cat', 'jc.cat_title as cat')
            ->get();

        if ($data) {
            return response()->json(['status' => 'success', 'data' => $data]);
        } else {
            return response()->json(['status' => 'error', 'data' => $data]);
        }
    }
    public function jobdetails($id)
    {
        $data = DB::table('job_listing as jl')
            ->leftjoin('job_category as jc', 'jc.id', 'jl.category')
            ->leftjoin('job_sub_category as jsc', 'jsc.id', 'jl.sub_category')
            ->leftjoin('job_department as jd', 'jd.id', 'jl.job_department')
            ->where('jl.id', $id)
            ->select('*', 'jl.id as id', 'jl.created_at as created_at', 'jd.job_department as department', 'jsc.sub_cat_title as sub_cat', 'jc.cat_title as cat')
            ->first();
        // $data = DB::table('job_listing')->first();
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    public function jobschedules($id)
    {
        // $data = DB::table('job_listing')->get();
        $data = DB::table('job_listing as jl')
            ->leftjoin('job_category as jc', 'jc.id', 'jl.category')
            ->leftjoin('job_sub_category as jsc', 'jsc.id', 'jl.sub_category')
            ->leftjoin('job_department as jd', 'jd.id', 'jl.job_department')
            ->where('job_type', $id)
            ->select('*', 'jl.id as id', 'jd.job_department as department', 'jsc.sub_cat_title as sub_cat', 'jc.cat_title as cat')
            ->get();

        return response()->json(['status' => 'success', 'data' => $data]);
    }
    public function myapplications($id)
    {
        // $data = DB::table('job_applications')->where('applicant_id', $id)->get();
        $data = DB::table('job_applications as sj')->where('applicant_id', $id)
            ->leftjoin('job_listing as jl', 'jl.id', 'sj.job_id')
            ->leftjoin('job_category as jc', 'jc.id', 'jl.category')
            ->leftjoin('job_sub_category as jsc', 'jsc.id', 'jl.sub_category')
            ->leftjoin('job_department as jd', 'jd.id', 'jl.job_department')
            ->select('*', 'sj.status as status',  'jl.created_at as created_at', 'jl.created_at as created_at', 'jl.id as id', 'jd.job_department as department', 'jsc.sub_cat_title as sub_cat', 'jc.cat_title as cat')
            ->get();
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    public function addtosavedjobs(Request $request)
    {
        $job_id = $request->job_id;
        $applicant_id = $request->applicant_id;

        $data = [
            'job_id' => $job_id,
            'applicant_id' => $applicant_id,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $check = DB::table('saved_jobs')->where('job_id', $job_id)->where('applicant_id', $applicant_id)->exists();


        if ($check) {
            return response()->json(['status' => 'error', 'message' => 'Job Saved Already']);
        } else {
            $insert = DB::table('saved_jobs')->insert($data);
            if ($insert) {
                return response()->json(['status' => 'success']);
            } else {
                return response()->json(['status' => 'error', 'message' => 'job failed to save']);
            }
        }
    }
    public function view_saved_jobs($id)
    {
        $data = DB::table('saved_jobs as sj')
            ->where('sj.applicant_id', $id)
            ->leftjoin('job_listing as jl', 'jl.id', 'sj.job_id')
            ->leftjoin('job_category as jc', 'jc.id', 'jl.category')
            ->leftjoin('job_sub_category as jsc', 'jsc.id', 'jl.sub_category')
            ->leftjoin('job_department as jd', 'jd.id', 'jl.job_department')
            ->select('*',  'jl.created_at as created_at', 'jl.created_at as created_at', 'jl.id as id', 'jd.job_department as department', 'jsc.sub_cat_title as sub_cat', 'jc.cat_title as cat')
            // ->select('*', 'sj.id as id')
            ->get();
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    public function delete_saved_jobs($id)
    {
        $data = DB::table('saved_jobs')->where('id', $id)->delete();
        if ($data) {
            return response()->json(['status' => 'success', 'message' => 'Job deleted successfully']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Delete Failed']);
        }
    }
    public function searchJobs($id)
    {
        $query = $id;
        $data = DB::table('job_listing as jl')->where('job_title', 'LIKE', "%" . $query . "%")
            ->orwhere('jl.job_department', 'LIKE', "%" . $query . "%")
            ->orwhere('job_role', 'LIKE', "%" . $query . "%")
            ->orwhere('opening_type', 'LIKE', "%" . $query . "%")
            ->where('status', 'active')
            ->leftjoin('job_category as jc', 'jc.id', 'jl.category')
            ->leftjoin('job_sub_category as jsc', 'jsc.id', 'jl.sub_category')
            ->leftjoin('job_department as jd', 'jd.id', 'jl.job_department')
            ->where('status', 'active')
            ->select('*', 'jl.created_at as created_at', 'jl.id as id', 'jd.job_department as department', 'jsc.sub_cat_title as sub_cat', 'jc.cat_title as cat')
            ->get();
        if ($data) {
            return response()->json(['status' => 'success', 'data' => $data]);
        } else {
            return response()->json(['status' => 'error', 'data' => $data]);
        }
    }

    public function apply_for_jobs(Request $request)
    {
        $job_id = $request->input('job_id');
        $applicant_id = $request->input('applicant_id');
        $cover_letter = $request->input('cover_letter');
        $linkeding_url = $request->input('linkeding_url');
        $functional_area = $request->input('functional_area');
        $current_salary = $request->input('current_salary');
        $expected_salary = $request->input('expected_salary');

        if ($request->hasFile('uploaded_resume')) {
            $file = $request->file('uploaded_resume');
            $fileName =  time() . str_replace(' ', '', $file->getClientOriginalName());
            $destinationPath = public_path('/uploaded_resume');
            $file->move($destinationPath, $fileName);
        } else {
            return response()->json(['status' => 'error', 'message' => 'No Resume added']);
        }

        $checkIfApplied = DB::table('job_applications')->where('job_id', $job_id)->where('applicant_id', $applicant_id)->exists();

        if ($checkIfApplied) {
            return response()->json(['status' => 'error', 'message' => 'Already Applied for Job']);
        }

        $data = [
            'job_id' => $job_id,
            'applicant_id' => $applicant_id,
            'cover_letter' => $cover_letter,
            'uploaded_resume' => $fileName,
            "linkedin_url" => $linkeding_url,
            "functional_area" => $functional_area,
            "current_salary" => $current_salary,
            "expected_salary" => $expected_salary,
            "status" => 'pending',
            "created_at" => now(),
            "updated_at" => now(),
        ];

        $insert = DB::table('job_applications')->insert($data);
        if ($insert) {
            return response()->json(['status' => 'success', 'messsage' => 'Job Application Succesfull']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Job Application Not Successful']);
        }
    }
}
