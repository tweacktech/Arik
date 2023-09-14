<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class APIJobController extends Controller
{
    public function sign_up(Request $request)
    {
        $data = [
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'country' => $request->country,
            'state_of_origin' => $request->state_of_origin,
            'lga' => $request->lga,
            'password' => Hash::make($request->password),
        ];
        $save  = DB::table('job_applicants')->insert($data);
        if ($save) {
            return response()->json(['status' => 'success', 'message' => 'registration successful']);
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
                return response()->json(['status' => 'success', 'message' => 'login successful', 'user' => $check]);
            } else {
                return response()->json(['status' => 'success', 'message' => 'Wrong email or Password ']);
            }
        } else {
            return response()->json(['status' => 'success', 'message' => 'Wrong email or Password']);
        }
    }
    public function joblists()
    {
        $data = DB::table('job_listing')->where('status', 'active')->get();

        return response()->json(['status' => 'success', 'data' => $data]);
    }
    public function jobdetails($id)
    {
        $data = DB::table('job_listing')->where('id', $id)->get();
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    public function jobschedules($id)
    {
        $data = DB::table('job_listing')->where('job_type', $id)->get();
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    public function myapplications($id)
    {
        $data = DB::table('job_applications')->where('applicant_id', $id)->get();
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

        $insert = DB::table('saved_jobs')->insert($data);

        if ($insert) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'failed', 'message' => 'job failed to save']);
        }
    }
    public function view_saved_jobs($id)
    {
        $data = DB::table('saved_jobs')->where('applicant_id', $id)->get();
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    public function delete_saved_jobs($id)
    {
        $data = DB::table('saved_jobs')->where('applicant_id', $id)->delete();
        return response()->json(['status' => 'success']);
    }
    public function searchJobs($id)
    {
    }
}
