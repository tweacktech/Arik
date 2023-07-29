@extends('layouts.app', ['title' => 'Baggage payments'])

@section('content')
    <div class="card mb-6 mb-xl-9">
        <div class="card-body pt-9 pb-0">
            <!--end::Details-->
            <div class="separator"></div>
            <!--begin::Nav wrapper-->
            <div class="d-flex overflow-auto h-55px">
                <!--begin::Nav links-->
                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap"
                    style="padding-left:40px">
                    <!--begin::Nav item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary me-6" href="">Overview</a>
                    </li>
                      <li class="nav-item">
                        <a class="nav-link text-active-primary me-6" href="javascript:history.back()">Back  </a>
                    </li>
            </ul>

            </div>
            <!--end::Nav wrapper-->
        </div>
    </div>
    
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<script>
    setTimeout(function() {
        $('.alert').alert('close');
    }, 5000);
</script>



    <div class="card card-flush m-6">
        <!--begin::Card header-->
        <div class="card-header mt-5">
           

            <div class="card-header">
                <div class="card-toolbar">
                   
                </div>
            </div>
            <!--begin::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table id="kt_profile_overview_table"
                    class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                    <!--begin::Head-->
                    <thead class="fs-7 text-gray-400 text-uppercase">
                        <tr>

                            <th class="min-w-150px">Payer Name</th>
                            <th class="min-w-150px">KG/Price</th>
                            <th class="min-w-250px">Contact</th>
                            <th class="min-w-30px">Status</th>
                            <th class="min-w-100px ">Action</th>
                        </tr>
                    </thead>
                    <!--end::Head-->
                    <!--begin::Body-->
                    <tbody class="fs-6">
                        @php $c=0; @endphp
                        @foreach ($data as $data)
                            <tr>

                                <td>
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Wrapper-->
                                        <div class="me-5 position-relative">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle">
                                                 @php $c+=1; @endphp
                                               {{ $c }}
                                            </div>
                                            <!--end::Avatar-->
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-column justify-content-center">
                                            <a href=""
                                                class="fs-6 text-gray-800 text-hover-primary">{{ $data->name }}</a>

                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->
                                </td>
                               
                                <td>
                                     {{$data->baggage_kg}}kg /
                                      ₦{{$data->amount}} 

                                </td> 

                                <td>
                                     {{$data->phone}} /
                                     {{$data->email}}

                                </td> 
                                <td>
                                     {{$data->ticketNumber}}

                                </td> 

                              
                                <td>
                                    @if ($data->status == 0)
                                        <span class="badge badge-light-info fw-bolder px-4 py-3">Inactive</span>
                                    @elseif($data->status == 1)
                                        <span class="badge badge-light-success fw-bolder px-4 py-3">Active</span>
                                    @endif
                                </td>

                               <td>
                                    
                                    <a href="{{ route('deleteCabin', ['id' => $data->id]) }}"
                                        class="btn btn-danger btn-sm">Delete</a>
                               </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <!--end::Body-->
                
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--end::Card body-->
    </div>


@endsection
