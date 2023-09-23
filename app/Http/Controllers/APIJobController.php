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

            $user  = DB::table('job_applicants')->where('email_address', $request->email_address)->first();
            return response()->json(['status' => 'success', 'message' => 'registration successful', 'user' => $user]);
        } else {
            return response()->json(['status' => 'success', 'message' => 'registration failed']);
        }
    }
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $check  = DB::table('job_applicants')->where('email_address', $email)->first();

        if ($check) {
            $verify = Hash::check($password, $check->password);
            if ($verify) {
                return response()->json(['status' => 'success', 'message' => 'Login Successful', 'user' => $check], 200);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Wrong email or Password ']);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Wrong email or Password']);
        }
    }
    public function joblists()
    {
        $data = DB::table('job_listing')->where('status', 'active')->get();

        if ($data) {
            return response()->json(['status' => 'success', 'data' => $data]);
        } else {
            return response()->json(['status' => 'error', 'data' => $data]);
        }
    }
    public function jobdetails($id)
    {
        $data = DB::table('job_listing')->where('id', $id)->first();
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    public function jobschedules($id)
    {
        $data = DB::table('job_listing')->where('job_type', $id)->get();
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    public function myapplications($id)
    {
        // $data = DB::table('job_applications')->where('applicant_id', $id)->get();
        $data = DB::table('job_applications as sj')->where('applicant_id', $id)
            ->leftjoin('job_listing as jl', 'jl.id', 'sj.job_id')
            ->select('*', 'sj.status as status')
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
        $data = DB::table('saved_jobs as sj')->where('applicant_id', $id)
            ->leftjoin('job_listing as jl', 'jl.id', 'sj.job_id')
            ->select('*', 'sj.id as id')
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
        $data = DB::table('job_listing')->where('job_title', 'LIKE', "%" . $query . "%")
            ->orwhere('job_department', 'LIKE', "%" . $query . "%")
            ->orwhere('job_role', 'LIKE', "%" . $query . "%")
            ->where('status', 'active')->get();
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

        if ($request->hasFile('uploaded_resume')) {
            $file = $request->file('uploaded_resume');
            $fileName = $file->getClientOriginalName();
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
