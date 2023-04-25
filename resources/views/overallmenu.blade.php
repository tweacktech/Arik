@extends('layouts.app', ['title' => 'Manage menu/submenu'])

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">
							<!--begin::Navbar-->
							<div class="card mb-6 mb-xl-9">
								<div class="card-body pt-9 pb-0">
									<!--begin::Details-->
									<div class="d-flex flex-wrap flex-sm-nowrap mb-6">
										
										<div class="flex-grow-1">
											<!--begin::Head-->
											<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
												<!--begin::Details-->
												<div class="d-flex flex-column">
													<!--begin::Status-->
													<div class="d-flex align-items-center mb-1">
														<a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder me-3"> Dashboard</a>
														
													</div>
												
													<!--end::Description-->
												</div>
												<!--end::Details-->
												<!--begin::Actions-->
												
											</div>
											<!--end::Head-->
											<!--begin::Info-->
											<div class="d-flex flex-wrap justify-content-start">
												<!--begin::Stats-->
												<div class="d-flex flex-wrap">
													<!--begin::Stat-->
													<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
														<!--begin::Number-->
														<div class="d-flex align-items-center">
															<div class="fs-4 fw-bolder"><center>{{ $totalmenus }}</center></div>
														</div>
														<!--end::Number-->
														<!--begin::Label-->
														<div class="fw-bold fs-6 text-gray-400">Menu</div>
														<!--end::Label-->
													</div>

													<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
														<!--begin::Number-->
														<div class="d-flex align-items-center">
															<div class="fs-4 fw-bolder"><center>{{ $totalsubmenus }}</center></div>
														</div>
														<!--end::Number-->
														<!--begin::Label-->
														<div class="fw-bold fs-6 text-gray-400">Submenu</div>
														<!--end::Label-->
													</div>
													
												</div>
												<!--end::Stats-->
												<!--begin::Users-->
												<div class="symbol-group symbol-hover mb-3">
																	<!--begin::User-->
													<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="">
	
													</div>
													
													<!--end::User-->
													<!--begin::All users-->
		<a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
														<span class="symbol-label bg-dark text-inverse-dark fs-8 fw-bolder" data-bs-toggle="tooltip" data-bs-trigger="hover" title="View more users">+200</span>
													</a>
													<!--end::All users-->
												</div>
												<!--end::Users-->
											</div>
											<!--end::Info-->
										</div>
										<!--end::Wrapper-->
									</div>
									<!--end::Details-->
									<div class="separator"></div>
									<!--begin::Nav wrapper-->
									<div class="d-flex overflow-auto h-55px">
										<!--begin::Nav links-->
										<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
											<!--begin::Nav item-->
											<li class="nav-item">
												<a class="nav-link text-active-primary me-6 active" href="{{route('Overall')}}">Overview</a>
											</li>
											<!--end::Nav item-->
											<!--begin::Nav item-->
											<li class="nav-item">
												<a class="nav-link text-active-primary me-6" href="{{route('WebMenu')}}">Manage Menu</a>
											</li>
                                          


                                            <li class="nav-item">
												<a href="{{route('SubMenu')}}" class="nav-link text-active-primary me-6" >Manage Submenu</a>
											</li>
											
										</ul>
										
									</div>
									<!--end::Nav wrapper-->
								</div>
							</div>
							
							
							
							<div class="row g-6 g-xl-9">
                              
								
								<div class="col-lg-6">
									<!--begin::Card-->
									<div class="card card-flush h-lg-100">
										<!--begin::Card header-->
										<div class="card-header mt-6">
											<!--begin::Card title-->
											<div class="card-title flex-column">
												<h3 class="fw-bolder mb-1">Recent Menu Added</h3>

											</div>
											
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body p-9 pt-3">
											<!--begin::Files-->


											@foreach($menus as $menus)
											<div class="d-flex flex-column mb-9">
												<!--begin::File-->
												<div class="d-flex align-items-center mb-5">
													<!--begin::Icon-->
													
													<!--end::Icon-->
													<!--begin::Details-->
													<div class="fw-bold">
														<a class="fs-6 fw-bolder text-dark text-hover-primary" href="#">{{ $menus->title }}</a>  
														
														</div>
														<div class="text-gray-400">
													</div>
													
												</div>
												
											</div>

											@endforeach

											
											
										</div>
										<!--end::Card body -->
									</div>
									<!--end::Card-->
								</div>

							
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-lg-6">
									<!--begin::Tasks-->
									<div class="card card-flush h-lg-100">
										<!--begin::Card header-->
										<div class="card-header mt-6">
											<!--begin::Card title-->
											<div class="card-title flex-column">
												<h3 class="fw-bolder mb-1">Recent SubMenu Added</h3>
												
											</div>
										
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body d-flex flex-column mb-9 p-9 pt-3">
											<!--begin::Item-->
											@foreach($sub_menus as $sub_menus)
											<div class="d-flex align-items-center position-relative mb-7">
												<!--begin::Label-->
												<div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
												<!--end::Label-->
												<!--begin::Checkbox-->
												
												<!--end::Checkbox-->
												<!--begin::Details-->
												<div class="fw-bold">
													<a href="#" class="fs-6 fw-bolder text-gray-900 text-hover-primary">{{ $sub_menus->title}}</a>
													<!--begin::Info-->
													
													<!--end::Info-->
												</div>
											</div>
											@endforeach
											
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Tasks-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
						
							<!--end::Card-->
						</div>
						<!--end::Container-->
					</div>
@endsection