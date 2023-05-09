@extends('layouts.app', ['title' => 'Manage Web Menu'])

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
                        <a class="nav-link text-active-primary me-6" href="{{route('Overall')}}">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-active-primary me-6" href="{{route('WebMenu')}}">Mange Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-active-primary me-6" href="{{route('SubMenu')}}">SubMenu</a>
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
                    <a href="#" class="btn btn-flex btn-primary" data-bs-target="#create_category" data-bs-toggle="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                    rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->New Menu
                    </a>
                </div>
            </div>

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

                            <th class="min-w-250px">Title</th>
                            <th class="min-w-250px">Description</th>
                            <th class="min-w-90px"> 
                                <div class="symbol symbol-35px symbol-circle">
                                         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#videoModal">Order</button>
                                            </div>

                                    <!-- Video Modal -->
                                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="videoModalLabel">Video</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            <!-- Video Player -->
                                         

                                       <table>
    <thead>
        <tr>
            <th>Item Name</th>
            <th>Order</th>
        </tr>
    </thead>
    <tbody id="sortable">
        @foreach ($data as $item)
        <tr id="item-{{ $item->id }}">
            <td>{{ $item->title }}</td>
            <td>{{ $item->orderby }}</td>
            <td><i class="fa fa-bars"></i></td>
        </tr>
        @endforeach
    </tbody>
</table>

                                          </div>
                                        </div>
                                      </div>
                                    </div>

                            </th>
                            <th class="min-w-90px">Status</th>
                            <th class="min-w-50px text">Action</th>
                        </tr>
                    </thead>
                    <!--end::Head-->
                    <!--begin::Body-->
                    <tbody class="fs-6">
                        
                        @foreach ($data as $data)
                            <tr data-id="{{ $data->id }}" data-position="{{ $data->order }}">

                                <td>
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Wrapper-->
                                        <div class="me-5 position-relative">
                                            <!--begin::Avatar-->
                                            
                                            <!--end::Avatar-->
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-column justify-content-center">
                                            <a href=""
                                                class="fs-6 text-gray-800 text-hover-primary">{{ $data->title }}</a>

                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->
                                </td>
                               
                                <td>
                                     {{$data->description}}

                                </td> 
                                <td>
                                    <!-- <button class="btn-change-order" data-id="{{ $data->id }}">Change Order</button> -->
                                     {{$data->orderby}}

                                </td> 
                               
                                <td>
                                    @if ($data->status == 0)
                                        <span class="badge badge-light-info fw-bolder px-4 py-3">Inactive</span>
                                    @elseif($data->status == 1)
                                        <span class="badge badge-light-success fw-bolder px-4 py-3">Active</span>
                                    @endif
                                </td>

                               <td>
                                    <a href="{{ route('editWebMenu', ['id' => $data->id]) }}"
                                        class="btn btn-info btn-sm">Edit</a>

                                    @if ($data->status == 1)
                                        <a href="{{ route('hideWebMenu', ['id' => $data->id]) }}"
                                            class="btn btn-danger btn-sm">Hide</a>
                                    @elseif($data->status == 0)
                                        <a href="{{ route('unhideWebMenu', ['id' => $data->id]) }}"
                                            class="btn btn-light btn-sm">Unhide</a>
                                    @endif
                                    <a href="{{ route('deleteWebMenu', ['id' => $data->id]) }}"
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



    <!----- model for adding data---------->
    <div class="modal fade" id="create_category" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-900px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Create Menu</h2>

                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-lg-10 px-lg-10">
                    <!--begin::Stepper-->
                    <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid"
                        id="kt_modal_create_app_stepper">
                        <!--begin::Content-->
                        <div class="flex-row-fluid py-lg-5 px-lg-15">
                            <!--begin::Form-->
                            <form class="form" novalidate="novalidate" id="kt_modal_create_app_form"
                                enctype="multipart/form-data" action="{{ route('addWebMenu') }}" method="POST">
                                @csrf
                                <!--begin::Step 1-->
                                <div class="row">
                                    <div class="w-100">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                                <span class="required">Title</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify your unique app name"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                name="title" placeholder=""require />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="w-100">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                                <span class="required">Description</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify your unique app name"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                name="description" placeholder="Enter" required />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                    </div>
                                </div>                      

                                

                                <button type="submit" class="btn btn-lg btn-primary">Create 
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                    <span class="svg-icon svg-icon-3 ms-1 me-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="18" y="13" width="13"
                                                height="2" rx="1" transform="rotate(-180 18 13)"
                                                fill="black" />
                                            <path
                                                d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Stepper-->
        </div>
        <!--end::Modal body-->
    </div>
    <!--end::Modal content-->
@endsection
<script>
 $(function() {
    // Make the table rows sortable by drag and drop
    $('#sortable').sortable({
        update: function(event, ui) {
            // Get the new order of the items
            var newOrder = $(this).sortable('toArray');

            // Send an AJAX request to update the order of the items in the database
            $.ajax({
                url: '/items/update-order',
                type: 'POST',
                data: {
                    newOrder: newOrder
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }
    });
});

</script>
