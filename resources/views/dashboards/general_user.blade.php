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
            $jobs = DB::table('job_listing')
                ->orderBy('created_at', 'desc')
                ->get();
        @endphp


        <div class="p-4">
            <h1 class="mb-5">
                Job Openings
            </h1>

            @foreach ($jobs as $job)
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
                                $number = DB::table('job_applications')
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
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script>
    $('.job_item').on('mouseenter', function() {
        $(this).children('.editbtns').removeClass('d-none');
    })
    $('.job_item').on('mouseleave', function() {
        $(this).children('.editbtns').addClass('d-none');
    })
</script>
