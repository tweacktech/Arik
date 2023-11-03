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
                                <a class="btn btn-sm btn-success mb-3" href="/public/excelsample.xlsx">Download Sample</a>
                                <h3>Upload Staff Details</h3>
                                <form action={{ '/upload_staff_details' }} enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="upload_staff">Kindly Import Existing Staff Details</label>
                                        <input type="file" accept=".xlsx" name="excel_file" class="form-control">
                                    </div>
                                    <button class="btn btn-success btn-sm">Upload</button>
                                </form>
                            </div>
                            {{-- <div class="d-none edit_cat">
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
                            </div> --}}

                        </div>

                        <div class="col-8 p-2 table-responsive">

                            <div class="d-flex mb-3 justify-content-between align-item-center">
                                <button onclick="selectInternal()" class="btn btn-sm btn-success">Staff Users</button>
                                <button onclick="selectExternal()" class="btn btn-sm btn-success">External Users</button>
                            </div>
                            <table class="table table-sm table-hover">
                                <thead>
                                    <td>#</td>
                                    <td>First Name</td>
                                    <td>Last Name</td>
                                    <td>Email Address</td>
                                    <td>Country</td>
                                    <td>State</td>
                                </thead>
                                <tbody class="internal">
                                    @if (count($users) < 0)
                                        <tr>
                                            <td>No Staff Data Imported Yet</td>
                                        </tr>
                                    @else
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    {{ $user->first_name }}
                                                </td>
                                                <td>{{ $user->last_name }}</td>
                                                <td>{{ $user->email_address }}</td>

                                                <td>{{ $user->country }}</td>
                                                <td>{{ $user->state_of_origin }}</td>


                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>


                                <tbody class="d-none external_staff">
                                    @if (count($external_users) < 0)
                                        <tr>
                                            <td>No Staff Data Imported Yet</td>
                                        </tr>
                                    @else
                                        @foreach ($external_users as $user)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    {{ $user->first_name }}
                                                </td>
                                                <td>{{ $user->last_name }}</td>
                                                <td>{{ $user->email_address }}</td>

                                                <td>{{ $user->country }}</td>
                                                <td>{{ $user->state_of_origin }}</td>


                                            </tr>
                                        @endforeach
                                    @endif

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
        function selectExternal() {
            // console.log(title)
            $('.internal').addClass('d-none');
            $('.external_staff').removeClass('d-none');
        }

        function selectInternal() {
            $('.internal').removeClass('d-none');
            $('.external_staff').addClass('d-none');
        }
    </script>
@endsection
