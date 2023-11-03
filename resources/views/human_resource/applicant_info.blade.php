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

                <div>

                    <center>
                        <div class="d-flex mb-3 shadow p-4 rounded-3 justify-content-between align-items-center">

                            <div class="col-2">

                                <svg fill="#000000" viewBox="0 0 512 512" id="_x30_1" version="1.1" xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M256,0C114.615,0,0,114.615,0,256s114.615,256,256,256s256-114.615,256-256S397.385,0,256,0z M256,90 c37.02,0,67.031,35.468,67.031,79.219S293.02,248.438,256,248.438s-67.031-35.468-67.031-79.219S218.98,90,256,90z M369.46,402 H142.54c-11.378,0-20.602-9.224-20.602-20.602C121.938,328.159,181.959,285,256,285s134.062,43.159,134.062,96.398 C390.062,392.776,380.839,402,369.46,402z">
                                        </path>
                                    </g>
                                </svg>


                            </div>
                            <div class="text-start">
                                <h5> <b>Names:</b> {{ $applicant->first_name . '  ' . $applicant->last_name }}</h5>
                                <h5><b>Email Address:</b> {{ $applicant->email_address }}</h5>
                                <h5><b>Phone Number:</b> {{ $applicant->phone_number }} </h5>
                                <h5><b>Gender:</b> {{ $applicant->gender }} </h5>

                            </div>
                        </div>

                        <div class="p-5 justify-content-between shadow-sm  text-start rounded-3 mt-5 d-flex">

                            <div>
                                <h5><b>Country:</b> {{ $applicant->country }}</h5>
                                <h5><b>State:</b> {{ $applicant->state_of_origin }}</h5>
                                <h5><b>Date of Birth:</b> {{ $applicant->date_of_birth }}</h5>
                            </div>

                            <div>
                                <h5><b>House Address:</b> {{ $applicant->house_address }}</h5>
                                <h5><b>Marital Status:</b> {{ $applicant->marital_status }}</h5>
                                {{-- <h5><b>Date of Birth:</b> {{ $applicant->date_of_birth }}</h5> --}}
                            </div>

                        </div>

                    </center>

                </div>

                <!--end::Col-->
            </div>



        </div>
        <!--end::Container-->
    </div>
    <!--end::Content-->

    {{-- 
    <script>
        let products = @json($applicants);

        const currentDate = new Date();
        const formattedDate = currentDate.toISOString().slice(0, 10); // Format as YYYY-MM-DD

        const fileName = `Applicants${formattedDate}.xlsx`;

        function exportToExcel(data, fileName, fields) {
            const filteredData = data.map(item => {
                const filteredItem = {};
                fields.forEach(field => {
                    if (item.hasOwnProperty(field)) {
                        filteredItem[field] = item[field];
                    }
                });
                return filteredItem;
            });

            const worksheet = XLSX.utils.json_to_sheet(filteredData);
            const workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, 'Sheet1');
            XLSX.writeFile(workbook, fileName + '.xlsx');
        }

        document.getElementById('exportButton').addEventListener('click', function() {
            // Replace this with your data retrieval logic
            const data = products;

            const selectedFields = ["first_name", "last_name", 'job_title', "status", "created_at"];

            exportToExcel(data, fileName, selectedFields); // Call the export function
        });

        // console.log(products);
    </script> --}}
@endsection
