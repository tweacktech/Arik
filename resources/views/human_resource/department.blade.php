@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')
    <style>
        #formClass {
            /* font-size: 18px; */
        }
    </style>

    {{-- @php
        
        if ($id == null) {
            $job = null;
        } else {
            $job = DB::table('job_listing')
                ->where('id', '=', $id)
                ->first();
        }
    @endphp --}}
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <!--begin::Row-->
            <div class="row g-5 g-xl-8">
                <!--begin::Col-->
                @include('human_resource.human_menu')
                <!-- menu display -->

                <div class="p-5">

                    <div class="row">

                        <div class="col-4">
                            <div>
                                @if (Session::has('alert'))
                                    <p class="fw-bold text-danger">{{ Session('alert') }}</p>
                                @endif
                            </div>
                            <div class="add_cat">
                                <h3>Add {{ 'Job' }} Department</h3>
                                <form action={{ '/add_job_department' }} method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="category_name">{{ 'Job' }} Department
                                            Name</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                    <button class="btn btn-success btn-sm">Add</button>
                                </form>
                            </div>
                            <div class="d-none edit_cat">
                                <div class="d-flex justify-content-between">
                                    <h3>Edit {{ 'Job' }} Department</h3>
                                    <button onclick="closeEdit()" class="btn  btn-danger btn-sm rounded-5 ">X</button>
                                </div>
                                <form action={{ '/edit_job_department' }} method="post">
                                    @csrf
                                    <input type="text" class="edit_id" hidden name="id" class="form-control">
                                    <div class="mb-3">
                                        <label for="category_name">{{ 'Job' }} Department
                                            Name</label>
                                        <input type="text" class="edit_category form-control" name="title">
                                    </div>
                                    <button class="btn btn-danger btn-sm">Update</button>
                                </form>
                            </div>

                        </div>

                        <div class="col-8 p-2">
                            <table class="table table-sm table-hover">
                                <thead>


                                    <td>#</td>
                                    <td>{{ 'Job Department' }} Title</td>
                                    <td>Actions</td>

                                </thead>
                                <tbody>
                                    @foreach ($department as $dept)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $dept->job_department }}
                                            </td>
                                            <td>
                                                <a onclick="editJob('{{ $dept->id }}', '{{ $dept->job_department }}')"
                                                    class="btn btn-warning btn-sm me-1">Edit</a>
                                                <a class="btn btn-danger btn-sm me-1"
                                                    href="/delete_job_department/{{ $dept->id }}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
                <!--end::Col-->
            </div>



        </div>
        <!--end::Container-->
    </div>
    <!--end::Content-->

    <script>
        function editJob(id, title) {
            // console.log(title)
            $('.add_cat').addClass('d-none');
            $('.edit_cat').removeClass('d-none');

            $('.edit_category').val(title)
            $('.edit_id').val(id)

        }

        function closeEdit() {
            $('.add_cat').removeClass('d-none');
            $('.edit_cat').addClass('d-none');
        }
    </script>
@endsection
