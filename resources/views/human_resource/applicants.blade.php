@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')
    <style>
        #formClass {
            /* font-size: 18px; */
        }
    </style>

    @php
        
        if ($id == null) {
            $job = null;
        } else {
            $job = DB::table('job_listing')
                ->where('id', '=', $id)
                ->first();
        }
    @endphp
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <!--begin::Row-->
            <div class="row g-5 g-xl-8">
                <!--begin::Col-->
                @include('human_resource.human_menu')
                <!-- menu display -->

                <!--end::Col-->
            </div>

            <div @if ($job != null) class="row justify-content-between" @endif>
                <div @if ($job != null) class="pt-4 col-4 order-2" @else class="pt-4 d-none" @endif>

                    @if ($job != null)
                        <div class="shadow p-4 job_item rounded-2 mb-5">
                            <div class="editbtns d-none">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <a class="pe-3" href="/edit-listings/{{ $job->id }}">Edit</a>
                                        <a href="/delete-job-listings/{{ $job->id }}">Delete</a>
                                    </div>
                                    <a
                                        @if ($job->status == 'active') class="btn btn-danger btn-sm text-white"
                            href="/makeinactive/{{ $job->id }}"
                        @else 
                        class="btn btn-success btn-sm text-white"
                        href="/makeactive/{{ $job->id }}" @endif>
                                        @if ($job->status == 'active')
                                            Stop
                                            Applications
                                        @else
                                            Resume
                                            Applications
                                        @endif
                                    </a>
                                </div>

                            </div>
                            <div class="d-flex
                        justify-content-between align-items-center my-3">
                                <a href="" style="text-decoration: none;" class="fw-bold text-black display-6">
                                    {{ $job->job_title }}</a>
                                <div>
                                    <h5 class="text-white p-2 rounded" style="background-color: #761a33;">
                                        <span style="font-weight:bold;">Date Posted:</span>
                                        {{ $job->created_at }}
                                    </h5>
                                </div>

                            </div>

                            <div>

                                <h4>Job Description</h4>

                                <p>{{ $job->job_description }}</p>
                            </div>

                            <div>
                                <h4>Job Role</h4>
                                <p>{{ $job->job_role }}</p>
                            </div>
                            <div>

                                <h4>Job Qualifications</h4>
                                <p>{{ $job->job_qualifications }}</p>
                            </div>
                            <div class="justify-content-between align-items-center">

                                <p style="font-size:18px;">
                                    <span style="font-weight:bold;">Location:</span>
                                    {{ $job->job_location }}
                                </p>
                                <p style="font-size:18px;">
                                    <span style="font-weight:bold;">Job Type:</span>
                                    @if ($job->job_type == 'full_time')
                                        Full Time
                                    @elseif($job->job_type == 'part_time')
                                        Part Time
                                    @endif
                                </p>
                                <p style="font-size:18px;">
                                    <span style="font-weight:bold;">Department:</span>
                                    {{ $job->job_department }}
                                </p>
                                <p style="font-size:18px;">
                                    <span style="font-weight:bold;">Job Location:</span>
                                    {{ $job->job_location }}
                                </p>
                            </div>

                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    @php
                                        $number = DB::table('job_applications')
                                            ->where('job_id', $job->id)
                                            ->count();
                                    @endphp
                                    <h5>
                                        {{ $number }} applicants
                                    </h5>
                                </div>
                                @if ($job->status == 'active')
                                    <h5 class="bg-success text-white p-2 rounded">
                                        Active
                                    </h5>
                                @else
                                    <h5 class="bg-danger text-white p-2 rounded">
                                        Closed
                                    </h5>
                                @endif


                            </div>
                        </div>
                    @endif


                </div>
                <div @if ($job != null) class="pt-4 col-8 order-1" @else class="pt-4" @endif>
                    <h1 class="mb-5">
                        All Applicants
                    </h1>
                    <div id="formClass" class="shadow p-4 rounded-2 mb-5">

                        <table class="table table-sm table-hover">
                            <thead style="font-weight: bold;">
                                <th>Name</th>
                                <th>Position Applied</th>
                                <th>Application Date</th>
                                <th>Resume</th>
                                <th>Action</th>
                            </thead>

                            <tbody>
                                @if (count($applicants) == 0)
                                    <tr>
                                        <td>
                                            No Applicant Yet for this Position
                                        </td>
                                    </tr>
                                @endif
                                @foreach ($applicants as $applicant)
                                    <tr>
                                        <td>
                                            {{ $applicant->first_name }} {{ $applicant->last_name }}
                                        </td>
                                        <td>
                                            {{ $applicant->job_title }}
                                        </td>
                                        <td>
                                            {{ $applicant->created_at }}
                                        </td>
                                        <td>
                                            <a
                                                href="/uploaded_resume/{{ $applicant->resume }}">{{ $applicant->resume }}</a>
                                        </td>
                                        <td>

                                            <a href="" class="btn btn-sm btn-warning">View</a>

                                            @if ($applicant->status == 'pending')
                                                <a href="/accepted_job/{{ $applicant->id }}"
                                                    class="btn btn-sm btn-success">Accepted</a>
                                                <a href="/rejected_job/{{ $applicant->id }}"
                                                    class="btn btn-sm btn-danger">Rejected</a>
                                            @elseif($applicant->status == 'accepted')
                                                <a class="btn btn-sm btn-success text-white">Accepted</a>
                                            @else
                                                <a class="btn btn-sm btn-danger text-white">Rejected</a>
                                            @endif


                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{-- <form action="/add-job-listings" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="job_title">Title</label>
                            <input type="text" class="form-control" placeholder="enter position title" name="job_title">
                        </div>
                        <div class="mb-3">
                            <label for="job_title">Description</label>
                            <textarea type="text" class="form-control" placeholder="enter position description" name="job_description"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="job_title">Role</label>
                            <input type="text" class="form-control" placeholder="enter position role" name="job_role">
                        </div>
                        <div class="mb-3">
                            <label for="job_department">Department</label>
                            <input type="text" class="form-control" placeholder="enter position department"
                                name="job_department">
                        </div>
                        <div class="mb-3">
                            <label for="job_title">Qualifications Needed</label>
                            <textarea type="text" rows="10" class="form-control" placeholder="enter position minimum qualifications"
                                name="job_qualifications"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="job_title">Location</label>
                            <select type="text" class="form-control" placeholder="enter position location type"
                                name="job_location">
                                <option value="Remote">Remote</option>
                                <option value="Hybrid">Hybrid</option>
                                <option value="state">Type Location</option>
                            </select>
                        </div>

                        <div class="mb-3 d-none">
                            <label for="job_locale">State</label>
                            <input type="text" class="form-control" placeholder="enter position state"
                                name="job_location">
                        </div>
                        <div class="mb-3">
                            <label for="job_type">Type</label>
                            <select type="text" class="form-control" placeholder="enter position type" name="job_type">
                                <option value="part_time">Part Time</option>
                                <option value="full_time">Full Time</option>
                            </select>
                        </div>


                        <button type="submit" class="p-3 btn btn-danger"> Add Job</button>

                    </form> --}}
                    </div>

                </div>
            </div>


        </div>
        <!--end::Container-->
    </div>
    <!--end::Content-->

    {{-- 
        Applications DB

        Applicant ID
        Job ID
        Cover Letter
        Resume Uploaded
        LinkedIn Profile 

        Applicant DB
        First Name
        Last Name
        Profile Photo
        State of Origin
        Local Government Area
        Date of Birth
        --}}
@endsection
