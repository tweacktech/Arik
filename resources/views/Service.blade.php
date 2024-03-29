@extends('layouts.app', ['title' => 'Web Services '])

@section('content')
							  @include('layouts.serviceNav')
										<!--end::Nav-->
										<!--begin::Form-->
										<div class="mx-auto " novalidate="novalidate" id="kt_create_account_form" style="width:100%;">
											<!--begin::Step 1-->
											<div class="current" data-kt-stepper-element="content">
												<!--begin::Wrapper-->
                                               

												<div class="w-100">
													<!--begin::Heading-->
													<div class="pb-10 pb-lg-15">
														<!--begin::Title-->
                                                        <h2 class="fw-bolder d-flex align-items-center text-dark">Services</h2>

                                                    </div>
													<!--end::Heading-->
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
                                                        
                                                        
                                                            <!--begin::Card-->
                                                            <div class="card">
                                                                <!--begin::Body-->
                                                                <div class="card-body">
                                                                   <h4></h4>
                                                                      <a href="#" class="btn btn-flex btn-primary" data-bs-target="#updateBaggage" data-bs-toggle="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2">
                            
                        </span>
                        <!--end::Svg Icon-->Update Babbage KG
                    </a>
                                                                    <!--begin::Border-->
                                                                    <div class="separator separator-dashed my-4"></div>
                                                                 
                                                                    
                                                                    
                                                                    <div class="mb-5">
                                                                       
                                                                    </div>

                                                                    
                                                                    <!--end::Action-->
                                                                </div>
                                                                <!--end::Body-->
                                                            </div>
                                                            <!--end::Card-->
                                                        
													</div>
													<!--end::Input group-->
												</div>
												<!--end::Wrapper-->
											</div>
											
									</div>
									<!--end::Stepper-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->
					
    
@endsection