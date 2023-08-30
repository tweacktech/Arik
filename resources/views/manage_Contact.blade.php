@extends('layouts.app', ['title' => 'Manage Contact'])

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
                        <a class="nav-link text-active-primary me-6" href="{{route('ContactDetail')}}">Offices </a>
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
               @if($count ==0)
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
                        <!--end::Svg Icon-->New 
                    </a>
                </div>
                @else 
                 <div class="card-toolbar">
                    <a  href="{{ route('editContact', ['id' => $data->id]) }}" class="btn btn-flex btn-info" >
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2">
                           <i class="fa fa-pencil"></i>
                        </span>
                        <!--end::Svg Icon-->Edit 
                    </a>
                </div>
            @endif
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
            <div class="row">
                <label> <strong> Slider</strong></label><br>
                 <div class="jumbotron  mb-5 p-3">
                         <div class="col-md-12 symbol symbol-35px symbol-circle">
                       <img alt="Pic" src="{{ asset('public/Contact/'.$data->image) }}" />
                         </div>

                         <div class="col-md-12 mb-2"> {{ $data->slide_title }}</div>

                         <div class="col-md-12"> {{ $data->slide_description }}</div>
                </div>
                 <label> <strong> Content</strong></label><br>
                 <div class="jumbotron col-md-12  mb-5">
                      <div class="col-md-12 mb-2"> {{ $data->title }}</div>

                         <div class="col-md-12"> {{ $data->description }}</div>
                 </div>
                 <label> <strong>  contacts</strong></label><br>
                 <div class="jumbotron col-md-12  mb-5">

                        <div class="col-md-12 mb-2"> {{ $data->phone_number }}</div><br>

                         <div class="col-md-12"> {{ $data->whatsapp }}</div><br>
                         <div class="col-md-12"> {{ $data->emails }}</div>

                 </div> 

                 <label> <strong> Other Details</strong></label><br>
                 <div class="jumbotron col-md-12  mb-5">
                         <div class="col-md-12"> {{ $data->others }}</div>

                 </div>
             

             </div>
           
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
                    <h2>Create </h2>

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
                                enctype="multipart/form-data" action="{{ route('addContact') }}" method="POST">
                                @csrf
                                <!--begin::Step 1-->


                                <div class="row">
                                    <div class="w-100">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                                <span class="required">Slider Image</span>
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
                                                <span class="required">Slider Title</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify your unique app name"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                name="slide_title" placeholder=""require />
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
                                                <span class="required">Slider Description</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify your unique app name"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <textarea style="height: 150px;" type="text"
                                                        class="form-control form-control-lg form-control-solid"
                                                        name="slide_description"  placeholder="Enter"
                                                        > </textarea>
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
                                            <textarea style="height: 150px;" type="text"
                                                        class="form-control form-control-lg form-control-solid"
                                                        name="description"  placeholder="Enter"
                                                        > </textarea>
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
