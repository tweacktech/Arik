@extends('layouts.app', ['title' => 'Home Logo 2'])

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
										<!--begin::Form-->
										<div class="mx-auto " novalidate="novalidate" id="kt_create_account_form" style="width:100%; padding-left:2% ;" >
											<!--begin::Step 1-->
											<div class="current" data-kt-stepper-element="content">
												<!--begin::Wrapper-->
                                               

												<div class="w-100">
													<!--begin::Heading-->
													<div class="pb-10 pb-lg-8">
														<!--begin::Title-->
                                                        <h2 class="fw-bolder d-flex align-items-center text-dark">Web Logo</h2>

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
                                                        
                                                       <div class="col-md-12">
                                                            <div class="col-md-6" style="float: left">
                                                                <form action="{{ route('weblogo') }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('put')
                                                                    <!--begin::Card-->
                                                                    <div class="card">
                                                                        <!--begin::Body-->
                                                                        <div class="card-body">
                                                                           <h4>Update Web Logo</h4>
                                                                            <!--begin::Border-->
                                                                            <div class="separator separator-dashed my-8"></div>
                                                                   
                                                                            <div class="mb-5">
                                                                                <label class="fs-6 form-label fw-bolder text-dark">Image(Logo)</label>
                                                                                <input type="file" class="form-control form-control form-control-solid" name="img" required>
                                                                            </div>
            
            
                                                                            <div class="mb-5">
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
                                                                    $logo = DB::table('web_logos')
                                                                    ->first();

                                                                @endphp

                                                                @if($logo)
                                                               
                                                                <div class="col-md-4">
                                                                    <img style="margin:auto;width:250px; height:150px" src="{{ asset('public/logo/'.$logo->logo) }}" alt="logo">
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