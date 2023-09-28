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

                <center>
                    <div class="text-start mb-2">
                        <h2>Names: {{ $applicant->first_name . $applicant->last_name }}</h2>
                    </div>

                    <div class="text-start mb-2">
                        <h2>Email Address: {{ $applicant->email_address }}</h2>
                    </div>
                    <div class="text-start mb-2">
                        <h2>Phone Number: </h2>
                    </div>
                    <div class="text-start mb-2">
                        <h2>Country: {{ $applicant->country }}</h2>
                    </div>
                    <div class="text-start mb-2">
                        <h2>State: {{ $applicant->state_of_origin }}</h2>
                    </div>
                    <div class="text-start mb-2">
                        <h2>Date of Birth: {{ $applicant->date_of_birth }}</h2>
                    </div>

                </center>
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
