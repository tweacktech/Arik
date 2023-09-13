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
                    @if ($id != null)
                        Edit Job Opening
                    @else
                        Add New Opening
                    @endif
                </h1>

                <div id="formClass" class="shadow p-4 rounded-2 mb-5">

                    <form
                        @if ($id != null) action="/update-job-listings" 
                @else
                action="/add-job-listings" @endif
                        method="post">

                        @csrf


                        <div class="mb-3">
                            <label for="job_title">Title</label>
                            <input type="text" class="form-control" required
                                @if ($job != null) value="{{ $job->job_title }}" @endif
                                placeholder="enter position title" name="job_title">
                        </div>

                        @if ($id != null)
                            <input type="text" value="{{ $id }}" hidden name="job_id">
                        @endif
                        <div class="mb-3">
                            <label for="job_title">Description</label>
                            <textarea type="text" class="form-control" required placeholder="enter position description" name="job_description">
                        @if ($job != null)
{{ $job->job_description }}
@endif
</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="job_title">Role</label>
                            <input type="text" class="form-control"
                                @if ($job != null) value="{{ $job->job_role }}" @endif required
                                placeholder="enter position role" name="job_role">
                        </div>
                        <div class="mb-3">
                            <label for="job_department">Department</label>
                            <input type="text" class="form-control"
                                @if ($job != null) value="{{ $job->job_department }}" @endif required
                                placeholder="enter position department" name="job_department">
                        </div>
                        <div class="mb-3">
                            <label for="job_title">Qualifications Needed</label>
                            <textarea type="text" rows="10" class="form-control" required
                                placeholder="enter position minimum qualifications" name="job_qualifications"> 
                                @if ($job != null)
{!! $job->job_qualifications !!}
@endif
                            </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="job_title">Location</label>
                            <select type="text" class="form-control"
                                @if ($job != null) value="{{ $job->job_location }}" @endif required
                                placeholder="enter position location type" name="job_location">
                                <option selected value="Remote">Remote</option>
                                <option value="Hybrid">Hybrid</option>
                                <option value="state">Type Location</option>
                            </select>
                        </div>

                        {{-- <div class="mb-3 d-none">
                            <label for="job_locale">State</label>
                            <input type="text" class="form-control" required placeholder="enter position state"
                                name="job_location">
                        </div> --}}
                        <div class="mb-3">
                            <label for="job_type">Type</label>
                            <select type="text" class="form-control"
                                @if ($job != null) value="{{ $job->job_type }}" @endif required
                                placeholder="enter position type" name="job_type">
                                <option selected value="part_time">Part Time</option>
                                <option value="full_time">Full Time</option>
                            </select>
                        </div>
                        <button type="submit" class="p-3 btn btn-danger">
                            @if ($id != null)
                                Update Job
                            @else
                                Add Job
                            @endif
                        </button>

                    </form>
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
