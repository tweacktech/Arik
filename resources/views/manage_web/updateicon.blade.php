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
										<div class="mx-auto " novalidate="novalidate" id="kt_create_account_form" style="width:100%;" >
											<!--begin::Step 1-->
											<div class="current" data-kt-stepper-element="content">
												<!--begin::Wrapper-->

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
                                                                <form action="{{ route('update_dealicons') }}" method="POST" enctype="multipart/form-data">
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
                                                                                    <div class="col-md-4 mb-5">
                                                                                <label class="fs-6 form-label fw-bolder text-dark">Image 1</label>
                                                                                <input type="file" class="form-control form-control form-control-solid" value="@if($data->image1){{$data->image1}} @endif" name="image1" >
                                                                            </div>
            
                                                                            <div class="col-md-4 mb-5">
                                                                                <label class="fs-6 form-label fw-bolder text-dark">Image 2</label>
                                                                                <input type="file"  class="form-control form-control form-control-solid" value="{{$data->image2}}" name="image2" >
                                                                            </div>
                                                                            <div class="col-md-4 mb-5">
                                                                                <label class="fs-6 form-label fw-bolder text-dark">Image 3</label>
                                                                                <input type="file"  class="form-control form-control form-control-solid" value="{{$data->image3}}" name="image3" >
                                                                            </div>

                                                                             </div>

                                                                                <div class="row">
                                                                                    <div class="col-md-4 mb-5">
                                                                                <label class="fs-6 form-label fw-bolder text-dark">Image 4</label>
                                                                                <input type="file" class="form-control form-control form-control-solid" value="{{$data->image4}}" name="image4" >
                                                                            </div>
            
                                                                            <div class="col-md-4 mb-5">
                                                                                <label class="fs-6 form-label fw-bolder text-dark">Image 5</label>
                                                                                <input type="file"  class="form-control form-control form-control-solid" value="{{$data->image5}}" name="imgage5" >
                                                                            </div>
                                                                            <div class="col-md-4 mb-5">
                                                                                <label class="fs-6 form-label fw-bolder text-dark">Image 6</label>
                                                                                <input type="file"  class="form-control form-control form-control-solid" value="{{$data->image6}}" name="image6" >
                                                                            </div>

                                                                             </div>
                                                                             <input type="hidden" name="deal_id" value="{{$id}}">
            
                                                                            <div class="col-md-4 mb-5">
                                                                                <input type="submit" value="Update" class="btn btn-primary">
                                                                            </div>
                                                                            <!--end::Action-->
                                                                        </div>
                                                                        <!--end::Body-->
                                                                    </div>
                                                                    <!--end::Card-->
                                                                </form>
                                                            </div>


                                                            <div class="col-md-6" style="float: right">
                                                                @php
                                                                    $slider = DB::table('deal_icons')->where('deal_id', $id)
                                                                    ->first();

                                                                @endphp

                                                                @if($slider)
                                                               
                                                                <div class="col-md-4">
                                                                    <img style="margin:auto;width:250px; height:150px" src="/uploads/slider/{{$slider->image1}}" alt="Slider 1">
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <img style="margin:auto;width:250px; height:150px" src="/uploads/slider/{{$slider->image1}}" alt="Slider 2">
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <img style="margin:auto;width:250px; height:150px" src="/uploads/slider/{{$slider->image1}}" alt="Slider 3">
                                                                </div>

                                                                @endif
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