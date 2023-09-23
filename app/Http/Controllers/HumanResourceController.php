<?php

namespace App\Http\Controllers;

use App\Mail\Update;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HumanResourceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    function joblistings()
    {
        return view('home');
    }

    function addlistings()
    {
        $id = null;
        $job = null;

        return view('human_resource.joblisting', compact('id', 'job'));
    }

    function editlistings($id)
    {

        $job = DB::table('job_listing')->where('id', $id)->first();

        return view('human_resource.joblisting', compact('id', 'job'));
    }

    function makeInactive($id)
    {
        $data = [
            'status' => 'inactive',
        ];
        $update = DB::table('job_listing')->where('id', $id)->update($data);
        if ($update) {
            return redirect()->back();
        }
    }
    function makeactive($id)
    {
        $data = [
            'status' => 'active',
        ];
        $update = DB::table('job_listing')->where('id', $id)->update($data);
        if ($update) {
            return redirect()->back();
        }
    }
    function deleteJobListings($id)
    {
        $delete = DB::table('job_listing')->where('id', $id)->delete();

        if ($delete) {
            return redirect()->back();
        }
    }

    function addJobListings(Request $request)
    {
        $data = [
            "job_title" => $request->job_title,
            "job_description" => $request->job_description,
            "job_role" => $request->job_role,
            "job_department" => $request->job_department,
            "job_qualifications" => $request->job_qualifications,
            "job_location" => $request->job_location,
            "job_type" => $request->job_type,
            "status" => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $insert = DB::table('job_listing')->insert($data);
        if ($insert) {
            return redirect('/home');
        } else {
            return redirect('/home');
        }
    }

    function updateJobListings(Request $request)
    {
        $data = [
            "job_title" => $request->job_title,
            "job_description" => $request->job_description,
            "job_role" => $request->job_role,
            "job_department" => $request->job_department,
            "job_qualifications" => $request->job_qualifications,
            "job_location" => $request->job_location,
            "job_type" => $request->job_type,
            "status" => 'active',
            'updated_at' => now(),
        ];
        $update = DB::table('job_listing')->where('id', $request->job_id)->update($data);
        if ($update) {
            return redirect('/home');
        } else {
            return redirect('/home');
        }
    }
    function allApplicants()

    {
        $applicants = DB::table('job_applications as ja')
            ->join('job_applicants as jas', 'jas.id', 'ja.applicant_id')
            ->join('job_listing as jl', 'jl.id', 'ja.job_id')
            ->select('*', 'ja.created_at as application_date', 'ja.id as  id', 'ja.status as status', 'ja.uploaded_resume as resume')
            ->get();

        $id = null;

        return view('human_resource.applicants', compact('applicants', 'id'));
    }
    function job_applicants($id)
    {

        $applicants = DB::table('job_applications as ja')
            ->join('job_applicants as jas', 'jas.id', 'ja.applicant_id')
            ->join('job_listing as jl', 'jl.id', 'ja.job_id')
            ->where('ja.job_id', $id)
            ->select('*', 'ja.created_at as application_date', 'ja.id as  id', 'ja.status as status', 'ja.uploaded_resume as resume')
            ->get();

        return view('human_resource.applicants', compact('applicants', 'id'));
    }

    function accepted_job($id)
    {
        $applicants = DB::table('job_applications as ja')
            ->join('job_applicants as jas', 'jas.id', 'ja.applicant_id')
            ->join('job_listing as jl', 'jl.id', 'ja.job_id')
            ->where('ja.id', $id)
            ->select('*', 'ja.created_at as application_date', 'ja.id as  id', 'ja.status as status', 'ja.uploaded_resume as resume')
            ->first();

        $username = $applicants->first_name . ' ' . $applicants->last_name;
        $title = "Job Update";
        $body_of_message = "We received your application for the Job position of a " . $applicants->job_title . " We are very happy to inform you that you have made it to the next stage. Kindly check your portal for more information on what next to do.";

        Mail::to($applicants->email_address)->send(new Update($username, $title, $body_of_message));
        $update = DB::table('job_applications')->where('id', $id)->update([
            'status' => 'accepted',
        ]);

        if ($update) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
    function rejected_job($id)
    {
        $applicants = DB::table('job_applications as ja')
            ->join('job_applicants as jas', 'jas.id', 'ja.applicant_id')
            ->join('job_listing as jl', 'jl.id', 'ja.job_id')
            ->where('ja.id', $id)
            ->select('*', 'ja.created_at as application_date', 'ja.id as  id', 'ja.status as status', 'ja.uploaded_resume as resume')
            ->first();

        $username = $applicants->first_name . ' ' . $applicants->last_name;
        $title = "Job Update";
        $body_of_message = "We received your application for the Job position of a " . $applicants->job_title . " We are sorry we won't be moving on with your application at the moment.";

        Mail::to($applicants->email_address)->send(new Update($username, $title, $body_of_message));
        $update = DB::table('job_applications')->where('id', $id)->update([
            'status' => 'rejected',
        ]);

        if ($update) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
