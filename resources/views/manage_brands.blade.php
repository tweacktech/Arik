@extends('layouts.app', ['title' => 'Manage Brands'])

@section('content')
<div class="card card-flush m-20">
	<div class="stepper stepper-links d-flex flex-column pt-15" id="kt_create_account_stepper" >
		@include('layouts.car_menu')
	  </div>
								<!--begin::Card header-->
								<div class="card-header mt-5">
									<div class="card-header">
										<div class="card-toolbar">
											<a href="#" class="btn btn-flex btn-primary" data-bs-target="#create_product" data-bs-toggle="modal">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
													<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->New Brand</a>
										</div>
									</div>
									<div class="card-toolbar my-1">
										
										<!--begin::Search-->
										<div class="d-flex align-items-center position-relative my-1">
											<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
											<span class="svg-icon svg-icon-3 position-absolute ms-3">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
													<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->
											<input type="text" id="kt_filter_search" class="form-control form-control-solid form-select-sm w-250px ps-9" placeholder="Search Brand" />
										</div>
										<!--end::Search-->
									</div>
									<!--begin::Card toolbar-->
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body pt-0">
									<!--begin::Table container-->
									
									<!--end::Table container-->
								</div>
								<!--end::Card body-->
							</div>



<!----- model for adding category---------->
<div class="modal fade" id="create_product" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-900px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header">
				<!--begin::Modal title-->
				<h2>Create Brand</h2>
				
			</div>
			<!--end::Modal header-->
			<!--begin::Modal body-->
			<div class="modal-body py-lg-10 px-lg-10">
				<!--begin::Stepper-->
				<div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="kt_modal_create_app_stepper">
					<!--begin::Content-->
					<div class="flex-row-fluid py-lg-5 px-lg-15">
						<!--begin::Form-->
						<form class="form" novalidate="novalidate" id="kt_modal_create_app_form" method="POST" action="{{ route('addbrand') }}" enctype="multipart/form-data">
							@csrf
							<!--begin::Step 1-->
							
							<div class="row" >
								<div class="w-100">
									<!--begin::Input group-->
									<div class="fv-row mb-10">
										<!--begin::Label-->
										<label class="d-flex align-items-center fs-5 fw-bold mb-2">
											<span class="required">Brand image</span>
											<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
										</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input type="file" class="form-control form-control-lg form-control-solid" name="brand_image" placeholder="" value="" required/>
										<!--end::Input-->
									</div>
									<!--end::Input group-->
									
								</div>
							</div>

							<div class="row" >
								<div class="w-100">
									<!--begin::Input group-->
									<div class="fv-row mb-10">
										<!--begin::Label-->
										<label class="d-flex align-items-center fs-5 fw-bold mb-2">
											<span class="required">Brand Name</span>
											<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
										</label>
										<!--end::Label-->
										<!--begin::Input-->
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="name" placeholder="" value="" required/>
										<!--end::Input-->
									</div>
									<!--end::Input group-->
									
								</div>
							</div>

                            <div class="row" >
								<div class="w-100">
									<!--begin::Input group-->
									<div class="fv-row mb-10">
										<!--begin::Label-->
										<label class="d-flex align-items-center fs-5 fw-bold mb-2">
											<span class="required">Brand Slug</span>
											<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify your unique app name"></i>
										</label>
										<!--end::Label-->
										<!--begin::Input-->
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="slug" placeholder="" value="" required/>
										<!--end::Input-->
									</div>
									<!--end::Input group-->
									
								</div>
							</div>

							

									<button type="submit" class="btn btn-lg btn-primary" >Add Brand
									<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
									<span class="svg-icon svg-icon-3 ms-1 me-0">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
											<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
										</svg>
									</span>
									<!--end::Svg Icon--></button>
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