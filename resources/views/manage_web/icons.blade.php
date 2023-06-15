@extends('layouts.app', ['title' => 'Deals Offer icons'])

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


    
										<!--begin::Form-->
										<div class="mx-auto me-15" novalidate="novalidate" id="kt_create_account_form" style="width:100%;" >
											<!--begin::Step 1-->
											<div class="current" data-kt-stepper-element="content">
												<!--begin::Wrapper-->

                                                <div class="card-toolbar ms-10 mb-2">
                    <a href="#" class="btn btn-flex btn-primary" data-bs-target="#category" data-bs-toggle="modal">
                        Add Icon
                    </a>
                </div>
												<div class="w-100">
													<!--begin::Input group-->
													<div class="fv-row">
														
                                                        <!-- display msg if there is any -->
                                                        @if(Session::has('message'))
                                                        <div class="col-lg-16" style="text-align:center; flex:1">
																
																<input type="radio" class="btn-check" name="account_type" value="personal" checked="checked" id="kt_create_account_form_account_type_personal" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="kt_create_account_form_account_type_personal">
																	
																	<!--begin::Info-->
																	<span class="d-block fw-bold text-start">
                                                                  
    	                                                             <span class="text-muted fw-bold fs-3 badge badge-light-info" ><p  style = "color:red; text-align:center; align-items: center;display:flex; flex:1;"> {{Session('message')}}</p> </span>

                                                                     
																		
																	</span>
																	<!--end::Info-->
																</label>
																<!--end::Option-->
																<!-- endloop here -->
															</div>
                                                            @endif

                                                        <!-- end msg -->
                                                        
                                                       <div class="col-md-12">
                                                            <div class="col-md-12">
                                                                <form enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('put')
                                                                    <!--begin::Card-->
                                                                    <div class="card">
                                                                        <!--begin::Body-->
                                                                        <div class="card-body">
                                                                           <!-- <h4>Update Company Slider</h4> -->
                                                                            <!--begin::Border-->
                                                                            <div class="separator separator-dashed ">
                                                                                

                                                                            </div>
                                                                            
                                                                 
                                                                            <div class="row">
                                                                                @foreach($data as $data)
                                                                                    <div class="col-md-4 mb-5">
                                                                                <label class="fs-6 form-label fw-bolder text-dark">{{$data->title}}</label>
                                                                                <div class="col-md-4 mb-5">
                                                                                <img src="{{ asset('public/dealsicon/'.$data->image) }}" style="height:30px; width: 30px;">
                                                                            </div>
                                                                            <a href="{{ route('deletedealsicon', ['id' => $data->id]) }}"
                                                                                 class="btn btn-danger btn-sm">Delete</a>
                                                                            </div>
                                                                              
                                                                            @endforeach
                                                                             </div>
            
                                                                          
                                                                            <!--end::Action-->
                                                                        </div>
                                                                        <!--end::Body-->
                                                                    </div>
                                                                    <!--end::Card-->
                                                                </form>
                                                            </div>


        <div class="modal fade" id="category" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered ">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Add Icons</h2>
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-lg-10 px-lg-10">
                    <form action="{{ route('update_dealicons') }}" method="POST" enctype="multipart/form-data" >
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


                                     <div class="w-100">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                                <span class="required">Icon</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify your unique app name"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="file" class="form-control form-control-lg form-control-solid"
                                                name="image" placeholder="Add category" require />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                    </div>
                                    <input type="hidden" name="deal_id" value="{{$id}}">
                                </div>
                                <input type="submit" class="btn btn-primary" name="">
                        
                    </form>

                </div>

            </div>
        </div>

    </div>
    
                                                       </div>
													</div>
													<!--end::Input group-->
												</div>
												<!--end::Wrapper-->
											</div>
											
									</div>
									<!--end::Stepper-->
							
					
    
@endsection