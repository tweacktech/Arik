@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')
    <style>
        #formClass {
            /* font-size: 18px; */
        }
    </style>
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
            <!--end::Row-->

            <div class="p-4">
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
                                        <a href="/{{ $applicant->resume }}">{{ $applicant->resume }}</a>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-success">View</a>
                                        {{-- <a href="" class="btn btn-sm btn-danger">Delete</a> --}}
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
