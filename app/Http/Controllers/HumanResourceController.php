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
    public function applicant_information($id)
    {
        $applicant = DB::table('job_applicants')->where('id', $id)->first();

        return view('human_resource.applicant_info', compact('applicant'));
    }
    public function joblistings()
    {
        return view('home');
    }
    public function addlistings()
    {
        $id = null;
        $job = null;

        return view('human_resource.joblisting', compact('id', 'job'));
    }
    public function editlistings($id)
    {

        $job = DB::table('job_listing')->where('id', $id)->first();

        return view('human_resource.joblisting', compact('id', 'job'));
    }
    public function makeInactive($id)
    {
        $data = [
            'status' => 'inactive',
        ];
        $update = DB::table('job_listing')->where('id', $id)->update($data);
        if ($update) {
            return redirect()->back();
        }
    }
    public function makeactive($id)
    {
        $data = [
            'status' => 'active',
        ];
        $update = DB::table('job_listing')->where('id', $id)->update($data);
        if ($update) {
            return redirect()->back();
        }
    }
    public function deleteJobListings($id)
    {
        $delete = DB::table('job_listing')->where('id', $id)->delete();

        if ($delete) {
            return redirect()->back();
        }
    }

    public function addJobListings(Request $request)
    {
        $data = [
            "job_title" => $request->job_title,
            'opening_type' => $request->opening_type,
            "job_description" => $request->job_description,
            "job_role" => $request->job_role,
            "job_department" => $request->job_department,
            "job_qualifications" => $request->job_qualifications,
            "job_location" => $request->job_location,
            "job_type" => $request->job_type,
            "category" => $request->category,
            "sub_category" => $request->sub_category,
            "status" => 'active',
            'created_at' => now(),
            'end_date' => $request->end_date,
            'updated_at' => now(),
        ];

        $insert = DB::table('job_listing')->insert($data);
        if ($insert) {
            return redirect('/home');
        } else {
            return redirect('/home');
        }
    }

    public function updateJobListings(Request $request)
    {
        $data = [
            "status" => 'active',
            'updated_at' => now(),
        ];

        $fields = [
            "job_title",
            "opening_type",
            "job_description",
            "job_role",
            "job_department",
            "job_qualifications",
            "job_location",
            "job_type",
            "category",
            "sub_category",
            "end_date",
        ];

        foreach ($fields as $field) {
            if (isset($request->$field)) {
                $data[$field] = $request->$field;
            }
        }

        $update = DB::table('job_listing')->where('id', $request->job_id)->update($data);

        if ($update) {
            return redirect('/home');
        } else {
            return redirect('/home');
        }
    }
    public function allApplicants()
    {
        $applicants = DB::table('job_applications as ja')
            ->join('job_applicants as jas', 'jas.id', 'ja.applicant_id')
            ->join('job_listing as jl', 'jl.id', 'ja.job_id')
            ->select('*', 'ja.created_at as application_date', 'ja.id as  id', 'ja.status as status', 'ja.uploaded_resume as resume')
            ->get();

        $id = null;

        return view('human_resource.applicants', compact('applicants', 'id'));
    }
    public function job_applicants($id)
    {
        $applicants = DB::table('job_applications as ja')
            ->join('job_applicants as jas', 'jas.id', 'ja.applicant_id')
            ->join('job_listing as jl', 'jl.id', 'ja.job_id')
            ->where('ja.job_id', $id)
            ->select('*', 'ja.created_at as application_date', 'ja.id as  id', 'ja.status as status', 'ja.uploaded_resume as resume')
            ->get();

        return view('human_resource.applicants', compact('applicants', 'id'));
    }
    public function accepted_job($id)
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
    public function rejected_job($id)
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
