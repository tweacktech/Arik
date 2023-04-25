@extends('layouts.app', ['title' => 'Manage FAQ'])

@section('content')
                  @include('layouts.webnav')
										
										<div class="mx-auto " novalidate="novalidate" id="kt_create_account_form" style="width:100%;">
											
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
                                                       <h4>Frequently Asked Questions</h4>
                                                        <!--begin::Border-->
                                                        <div class="separator separator-dashed my-8"></div>                                        
                                                        
                                                        <div class="col-md-8">
                                                            <div class="mb-5">
                                                                <label class="fs-6 form-label fw-bolder text-dark">Frequently Asked Questions</label>
                                                               
                                                                <div id="editor_1" name="faq" >
                                                                    <p>{!!$website->faq!!}</p>
                                                                    
                                                                  </div>
                                                            </div>
    
                                                            <div class="mb-5">
                                        
                                                                <input onclick="getData()" type="button" value="Update" class="btn btn-primary">
                                                            </div>
                                                            <!--end::Action-->
                                                        </div>
                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Card-->
                                           
                                        </div>
                                        <!--end::Input group-->       

												
										</div>	
									</div>
									<!--end::Stepper-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->
					
    
@endsection