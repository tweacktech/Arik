<style>
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

        @php
            $jobs = DB::table('job_listing as jl')
                ->leftjoin('job_department as jd', 'jd.id', 'jl.job_department')
                ->select('*', 'jl.id as id', 'jl.created_at as created_at')
                ->orderBy('jl.created_at', 'desc')
                ->get();
        @endphp


        <div class="p-4">
            <h1 class="mb-5">
                Job Openings
            </h1>
            @foreach ($jobs as $job)
                <div class="shadow p-4 job_item rounded-2 mb-5">
                    <div class="editbtns">
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
                            <h5 class="text-white p-2 rounded"
                                style="text-transform: capitalize; background-color:rgb(35, 49, 129)">
                                <span style="font-weight:bold;">Opening Type</span>
                                {{ $job->opening_type ?? 'none' }}
                            </h5>
                        </div>

                    </div>

                    <div>

                        <h4>Job Description</h4>

                        <p>{!! $job->job_description !!}</p>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">

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
                                $number = DB::table('job_applications as ja')
                                    ->join('job_applicants as jas', 'jas.id', 'ja.applicant_id')
                                    ->where('job_id', $job->id)
                                    ->count();
                            @endphp
                            <h5>
                                {{ $number }} applicant <a href="/job_applicants/{{ $job->id }}"
                                    class="btn btn-danger text-white  btn-sm">View</a>
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
            @endforeach

        </div>

    </div>
    <!--end::Container-->
</div>
<!--end::Content-->
