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
                        <div class="mb-3">
                            <label for="opening_type">Opening Type</label>
                            <select name="opening_type" id="opening" class="form-select"
                                @if ($job != null) value="{{ $job->opening_type }}" @endif>
                                <option value="internal">Internal Opening </option>
                                <option value="external">External Opening </option>
                            </select>
                            {{-- <input type="text" class="form-control" required
                                @if ($job != null) value="{{ $job->job_title }}" @endif
                                placeholder="enter  title" name="job_title"> --}}
                        </div>

                        @if ($id != null)
                            <input type="text" value="{{ $id }}" hidden name="job_id">
                        @endif
                        <div class="mb-3">
                            <label for="job_title">Description</label>
                            <textarea type="text" id="editor_ck3" class="form-control" required placeholder="enter position description"
                                name="job_description">
                        @if ($job != null)
{!! $job->job_description !!}
@endif
</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="job_title">Role</label>
                            <textarea type="text" id="editor_ck2" class="form-control" required placeholder="enter position role"
                                name="job_role">  @if ($job != null)
{!! $job->job_role !!}
@endif </textarea>
                        </div>

                        <div class="mb-3">
                            <label for="job_title">Category</label>
                            <select type="text" id="category" class="form-control main_category"
                                onchange="categoryselected()"
                                @if ($job != null) value={{ $job->category }} @endif required
                                name="category">
                                <option selected>-- Select Category --</option>
                                @php
                                    $category = DB::table('job_category')->get();
                                @endphp

                                @foreach ($category as $cat)
                                    <option value={{ $cat->id }}>{{ $cat->cat_title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="job_title">Sub Category</label>
                            <select type="text" id="sub_category" class="form-control"
                                @if ($job != null) value={{ $job->sub_category }} @endif required
                                name="sub_category">
                                <option selected value="0">-- Select Sub Category --</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="job_department">Department</label>
                            <select type="text" id="category" class="form-control main_category"
                                @if ($job != null) value={{ $job->job_department }} @endif required
                                name="job_department">
                                <option selected>-- Select Department --</option>
                                @php
                                    $department = DB::table('job_department')->get();
                                @endphp

                                @foreach ($department as $dept)
                                    <option value={{ $dept->id }}>{{ $dept->job_department }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="job_title">Qualifications Needed</label>
                            <textarea type="text" id="editor_ck1" rows="10" class="form-control" required
                                placeholder="enter position minimum qualifications" name="job_qualifications"> 
                                @if ($job != null)
{!! $job->job_qualifications !!}
@endif
                            </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="job_title">Location</label>
                            <select type="text" id="location_select" class="form-control" onchange="typeJobLocation()"
                                @if ($job != null) value="{{ $job->job_location }}" @endif required
                                placeholder="enter position location type" name="job_location">
                                <option selected value="Remote">Remote</option>
                                <option value="Hybrid">Hybrid</option>
                                <option value="state">Type Location</option>
                            </select>
                        </div>

                        <div class="mb-3 d-none location_type">
                            <label for="job_locale">Enter Prefered Location</label>
                            <input type="text" class="form-control" placeholder="please type job location"
                                name="job_location">
                        </div>
                        <div class="mb-3">
                            <label for="job_type">Type</label>
                            <select type="text" class="form-control"
                                @if ($job != null) value="{{ $job->job_type }}" @endif required
                                placeholder="enter position type" name="job_type">
                                <option selected value="part_time">Part Time</option>
                                <option value="full_time">Full Time</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="end_date">End Date</label>
                            <input type="date" class="form-control" required
                                @if ($job != null) value={{ $job->end_date }} @endif
                                placeholder="enter position title" name="end_date">
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
    <script>
        function typeJobLocation() {
            let val = $('#location_select').val();

            if (val === 'state') {
                $('.location_type').removeClass('d-none');
                $('#location_select').attr('name', '')
            } else {
                $('.location_type').addClass('d-none');
                $('.location_type').attr('name', '');
                $('#location_select').attr('name', 'job_location')
            }
            console.log(val)
        }

        function categoryselected() {

            let cat_id = $('.main_category').val();

            if (cat_id) {

                fetch(`/get_sub/${cat_id}`)
                    .then(response => {
                        if (response.ok) {
                            return response.json();
                        } else {
                            throw new Error('Failed to fetch sub-categories');
                        }
                    })
                    .then(data => {
                        $('#sub_category').empty();
                        let elements = $(data.data)
                        elements.appendTo('#sub_category')
                    })
                    .catch(error => console.error(error));
            } else {
                // Handle the case when no main category is selected
                console.error('No main category selected');
            }
        }
    </script>
@endsection
