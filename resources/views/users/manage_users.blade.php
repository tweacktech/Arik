@extends('layouts.app', ['title' => 'User Accounts'])

@section('content')
        <div class="row">
							<div class="card" style="100%">
								<!--begin::Card body-->
								<div class="card-body" >
									<!--begin::Stepper-->
									<div class="stepper stepper-links d-flex flex-column " id="kt_create_account_stepper" >
                                       
										<!--begin::Nav-->
										  <div class="card-toolbar">
                    <a href="#" class="btn btn-flex btn-primary" data-bs-target="#create_category" data-bs-toggle="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        
                        <!--end::Svg Icon-->New  User
                    </a>
                </div>
										<!--end::Nav-->
										<!--begin::Form-->
										<div class="mx-auto " novalidate="novalidate" id="kt_create_account_form" style="width:80%;">
											<!--begin::Step 1-->
											<div class="current" data-kt-stepper-element="content">
												<!--begin::Wrapper-->
                                               
                                                <div class="row"> 
												<div class="w-100">
													<!--begin::Heading-->
													<div class="">
														<!--begin::Title-->
														<h2 class="fw-bolder d-flex align-items-center text-dark">Manage Users
														
													</div>
													<!--end::Heading-->
													<!--begin::Input group-->
													<div class="fv-row">
														
                                                        <!-- display msg if there is any -->
                                                        @if(Session::has('alert'))
                                                        <div class="col-lg-16" style="text-align:center; flex:1">
																
																<input type="radio" class="btn-check" name="account_type" value="personal" checked="checked" id="kt_create_account_form_account_type_personal" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="kt_create_account_form_account_type_personal">
																	
																	<!--begin::Info-->
																	<span class="d-block fw-bold text-start">
                                                                  
    	                                                             <span class="text-muted fw-bold fs-3 badge badge-light-info" ><p  style = "color:red; text-align:center; align-items: center;display:flex; flex:1;"> {{Session('alert')}}</p> </span>

                                                                     
																		
																	</span>
																	<!--end::Info-->
																</label>
																<!--end::Option-->
																<!-- endloop here -->
															</div>
                                                            @endif

                                                        <!-- end msg -->
                                                        
                                                        <table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                                                            <!--begin::Head-->
                                                            <thead class="fs-7 text-gray-400 text-uppercase">
                                                                <tr>
                                                                    <th>S/N</th>
                                                                    <th>User Name</th>
                                                                    <th>Verified</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                               
                                                            </thead>
                                                            <tbody class="fs-6">
                                                                @foreach($users as $user)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>
                                                                        <!--begin::User-->
                                                                        <div class="d-flex align-items-center">
                                                                            <!--begin::Wrapper-->
                                                                            <div class="me-5 position-relative">
                                                                                <!--begin::Avatar-->
                                                                                <div class="symbol symbol-35px symbol-circle">
                                                                                   
                                                                                </div>
                                                                                <!--end::Avatar-->
                                                                            </div>
                                                                            <!--end::Wrapper-->
                                                                            <!--begin::Info-->
                                                                            <div class="d-flex flex-column justify-content-center">
                                                                                <a href="" class="fs-6 text-gray-800 text-hover-primary">{{$user->name}}</a>
                                                                                <a href="" class="fs-6 text-gray-800 text-hover-primary">{{$user->email}}</a>
                                                                            </div>
                                                                            <!--end::Info-->
                                                                        </div>
                                                                        <!--end::User-->
                                                                    </td>
                                                                    <td><span class="badge badge-light-success fw-bolder px-4 py-3">Verified</span></td>
                                                                   
                                                                   
                                                                    <td class="text-end">
                                                                        <a href="{{ route('edit_user_page', ['id' => md5($user->id) ]) }}" class="btn btn-info btn-sm">Edit</a>
                                                                    </td>
                                                                    <td class="text-end">
                                                                        <a href="{{ route('user_role', ['id' => md5($user->id) ]) }}" class="btn btn-secondary btn-sm">User Role</a>
                                                                    </td>
                                                                    <td class="text-end">
                                                                        @if($user->status == '1')
                                                                        <a href="{{ route('suspend_user', ['id' => md5($user->id) ]) }}" class="btn btn-primary btn-sm">Suspend</a>
                                                                        @endif
                                                                        @if($user->status == '0')
                                                                        <a href="{{ route('unsuspend_user', ['id' => md5($user->id) ]) }}" class="btn btn-secondary btn-sm">Unuspend</a>
                                                                        @endif
                                                                    </td>
                                                                    <td class="text-end">
                                                                        <a href="{{ route('delete_user', ['id' => md5($user->id) ]) }}" class="btn btn-danger btn-sm">Delete</a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
													</div>
													<!--end::Input group-->
												</div>
                                            </div>
												<!--end::Wrapper-->
											</div>
											
										</div>
										<!--end::Form-->
									</div>
									<!--end::Stepper-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->
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
                             <form action=" {{ route('register_user') }} " method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <!--begin::Card-->
                                                        <div class="card">
                                                            <!--begin::Body-->
                                                            <div class="card-body">
                                                               Add User
                                                                <!--begin::Border-->
                                                                <div class="separator separator-dashed "></div>                                                                                                                          
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder text-dark">User Name</label>
                                                                    <input type="text" class="form-control form-control form-control-solid" name="name" />
                                                                </div>

                                                                @error('name')
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder " style="color:red" >{{ $message }}</label>
                                                                </div>
                                                                @enderror

                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder text-dark">User Email</label>
                                                                    <input type="text" class="form-control form-control form-control-solid" name="email" />
                                                                </div>

                                                                @error('email')
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder " style="color:red" >{{  $message }}</label>
                                                                </div>
                                                                @enderror

                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder text-dark">Account Type</label>
                                                                    <select class="form-control form-control form-control-solid" name="type" >
                                                                        <option value=""></option>
                                                                        <option value="Account">User</option>
                                                                        <option value="storemanager">Owner</option>
                                                                        <option value="wherehousemanager"> Supper</option>

                                                                    </select>
                                                                </div>

                                                                @error('type')
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder " style="color:red" >{{  $message }}</label>
                                                                </div>
                                                                @enderror

                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder text-dark">User Password</label>
                                                                    <input type="password" class="form-control form-control form-control-solid" name="password" />
                                                                </div>

                                                               

                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder text-dark">Confirm Password</label>
                                                                    <input type="password" class="form-control form-control form-control-solid" name="password_confirmation" />
                                                                </div>


                                                               
                                                                @error('password')
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder " style="color:red" >{{  $message }}</label>
                                                                </div>
                                                                @enderror
                                                                <!--begin::Action-->
                                                                <div class="d-flex align-items-center justify-content-end">
                                                                  
                                                                    <input type="submit" class="btn btn-primary" value='ADD NEW'>
                                                                </div>
                                                               
                                                                @if(Session::has('message'))
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder " style="color:red" >{{  Session('message') }}</label>
                                                                </div>
                                                                @endif
                                                                
                                                                <!--end::Action-->
                                                            </div>
                                                            <!--end::Body-->
                                                        </div>
                                                        <!--end::Card-->
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