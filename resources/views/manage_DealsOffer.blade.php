@extends('layouts.app', ['title' => 'Manage Deals and Offers'])

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
                        <a class="nav-link text-active-primary me-6" href="{{ route('home_role', ['id' => md5($id) ]) }}">Back  </a>
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

  <div class="modal fade" id="category" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered ">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Create Category</h2>
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-lg-10 px-lg-10">
                    <form method="POST" action="{{route('addDealCat')}}" >
                         @csrf
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
                                                name="title" placeholder="Add category" require />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" name="">
                        
                    </form>

                    <table>
                        <thead>
                         <th class="min-w-250px">Title</th>
                            <th class="min-w-250px">Action</th>
                    </thead>
                    <tbody>
                        @php $tata=DB::table('deal_cats')->get(); @endphp
                        @foreach($tata as $da)
                        <tr>
                            <td>{{$da->title}}</td>
                            <td> <a href="{{ route('deleteDealCat', ['id' => $da->id]) }}"
                                        class="btn btn-danger btn-sm">Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
    
                <div class="card-toolbar">
                    <a href="#" class="btn btn-flex btn-primary" data-bs-target="#category" data-bs-toggle="modal">
                        Deal Category
                    </a>
                </div>


    <div class="card card-flush m-6">
        <!--begin::Card header-->
        <div class="card-header mt-5">
            <div class="card-header">
                <div class="card-toolbar">
                    <a href="#" class="btn btn-flex btn-primary me-3" data-bs-target="#create_category" data-bs-toggle="modal">
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
                        <!--end::Svg Icon-->New Deal/Offer
                    </a>
                     <a href="{{route('DealLabel')}}" class="btn btn-flex btn-info" >
                        Add/Edit Label
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

                            <th class="min-w-100px">Image/Title</th>
                            <th class="min-w-30px">Type</th>
                            <th class="min-w-250px">Description</th>
                            <th class="min-w-40px">ManageIcons</th>
                            <th class="min-w-40px">Status</th>
                            <th class="min-w-200px text">Action</th>
                        </tr>
                    </thead>
                    <!--end::Head-->
                    <!--begin::Body-->
                    <tbody class="fs-6">
                        
                        @foreach ($data as $data)
                            <tr>

                                <td>
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Wrapper-->
                                        <div class="me-5 position-relative">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="Pic" 
                                                src="{{ asset('public/deals/'.$data->image) }}" 
                                                />
                                            </div>
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
                                     {{$data->type}}

                                </td> 
                                <td>
                                     {!!$data->description!!}

                                </td> 

                                <td>
                                   <a href="{{ route('editDealIcons', ['id' => $data->id]) }}"
                                        class="btn btn-success btn-sm">Icons</a>

                                </td> 
                              

                                <td>
                                    @if ($data->status == 0)
                                        <span class="badge badge-light-info fw-bolder px-4 py-3">Inactive</span>
                                    @elseif($data->status == 1)
                                        <span class="badge badge-light-success fw-bolder px-4 py-3">Active</span>
                                    @endif
                                </td>

                               <td>
                                         <a href="{{ route('editDealsOffer', ['id' => $data->id]) }}"
                                        class="btn btn-info btn-sm">Edit</a>

                                    @if ($data->status == 1)
                                        <a href="{{ route('hideDealsOffer', ['id' => $data->id]) }}"
                                            class="btn btn-danger btn-sm">Hide</a>
                                    @elseif($data->status == 0)
                                        <a href="{{ route('unhideDealsOffer', ['id' => $data->id]) }}"
                                            class="btn btn-light btn-sm">Unhide</a>
                                    @endif
                                    <a href="{{ route('deleteDealsOffer', ['id' => $data->id]) }}"
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
                    <h2>Create DealsOffer</h2>

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
                                enctype="multipart/form-data" action="{{ route('addDealsOffer') }}" method="POST">
                                @csrf
                                <!--begin::Step 1-->
                                  <input type="hidden" name="homepage_id" value="{{$id}}">
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
                                                <span class="required">Image</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify your unique app name"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="file" min="100" class="form-control form-control-lg form-control-solid"
                                                name="image" placeholder="Enter" required />
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
                                                <span class="required">Type</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify your unique app name"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select type="text" class="form-control form-control-lg form-control-solid"
                                                name="type" placeholder=""require />
         @php $categories=DB::table('deal_cats')->get(); @endphp
        @foreach($categories as $category)
            <option value="{{ $category->title }}">{{ $category->title }}</option>
        @endforeach
                                            </select>
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
                                             <textarea id="editors" style="height:80px;" class="form-control form-control-lg form-control-solid" name="description"></textarea>
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
                                                        <span class="required">Kid</span>
                                                        <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                            data-bs-toggle="tooltip"
                                                            title="Specify your unique app name"></i>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text"
                                                        class="form-control form-control-lg form-control-solid"
                                                        name="kid" placeholder="" />
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
                                                        <span class="required">Kid Title</span>
                                                        <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                            data-bs-toggle="tooltip"
                                                            title="Specify your unique app name"></i>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text"
                                                        class="form-control form-control-lg form-control-solid"
                                                        name="kid_title" placeholder="" />
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
                                                       
                                                        <span class="required">kid_image</span>
                                                        <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                            data-bs-toggle="tooltip"
                                                            title="Specify your unique app name"> 
                                                        </i>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="file"
                                                        class="form-control form-control-lg form-control-solid" min="100" name="kid_image"  />
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
                                                <span class="required">Background Color</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify your unique app name"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="color"class="form-control form-control-lg form-control-solid"
                                                name="background_color" placeholder="Enter" required />
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
