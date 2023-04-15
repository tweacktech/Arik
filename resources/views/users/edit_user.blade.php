@extends('layouts.app', ['title' => 'Edit User Page'])

@section('content')
<div class="card card-flush m-20">
								<!--begin::Card header-->
								<div class="card-header mt-5">
									
									
									<!--begin::Card toolbar-->
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body pt-0">
									<!--begin::Table container-->
									<div class="table-responsive">
                                    <div class="modal-dialog modal-dialog-centered mw-900px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header">
				<!--begin::Modal title-->
				<h2> Edit User</h2>
				
			</div>
			<!--end::Modal header-->
			<!--begin::Modal body-->
			<div class="modal-body py-lg-10 px-lg-10">
				<!--begin::Stepper-->
				<div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="kt_modal_create_app_stepper">
					<!--begin::Content-->
					<div class="flex-row-fluid py-lg-5 px-lg-15">
                    <form action=" {{ route('edit_user') }} " method="POST" enctype="multipart/form-data">
														@csrf
                                                        @method('put')
                                                        <!--begin::Card-->
                                                        <div class="card">
                                                            <!--begin::Body-->
                                                            <div class="card-body">
                                                              
                                                                <!--begin::Border-->
                                                                <div class="separator separator-dashed my-8"></div>
<!--                                                                
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder text-dark">Warehouse Code</label>
                                                                    <input type="text" class="form-control form-control form-control-solid" name="code" />
                                                                </div> -->

																

                                                                
																<div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder text-dark">User Name</label>
																	<input type="text" class="form-control form-control form-control-solid" name="name" value="{{ $user->name }}" />
                                                                </div>

                                                                @error('name')
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder " style="color:red" >{{ $message }}</label>
                                                                </div>
                                                                @enderror

                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder text-dark">User Email</label>
																	<input type="text" class="form-control form-control form-control-solid" name="email" value="{{ $user->email }}" />
                                                                </div>

                                                                @error('email')
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder " style="color:red" >{{  $message }}</label>
                                                                </div>
                                                                @enderror


                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder text-dark">Password</label>
																	<input type="password" class="form-control form-control form-control-solid" name="password" value="" />
                                                                </div>
                                                                @error('password')
                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder " style="color:red" >{{  $message }}</label>
                                                                </div>
                                                                @enderror

                                                                <div class="mb-5">
                                                                    <label class="fs-6 form-label fw-bolder text-dark">Confirm Password</label>
																	<input type="password" class="form-control form-control form-control-solid" name="password_confirmation" value="" />
                                                                </div>

                                                                
                                                                <!--begin::Action-->
                                                                <div class="d-flex align-items-center justify-content-end">
                                                                    <input type="hidden" value="{{ $user->id }}" name="id" class="btn btn-primary">
                                                                    <input type="submit" class="btn btn-primary" value='UPDATE'>
                                                                      <a href="{{ route('manage_user_account') }}" class="btn btn-secondary" >Back</a>

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
					</div>
					<!--end::Content-->
				</div>
				<!--end::Stepper-->
			</div>
			<!--end::Modal body-->
		
									</div>
									<!--end::Table container-->
								</div>
								<!--end::Card body-->
							</div>




	


@endsection









