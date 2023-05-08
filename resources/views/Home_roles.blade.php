@extends('layouts.app', ['title' => 'Homepage'])

@section('content')

							<div class="card" style="100%">
								<!--begin::Card body-->
								<div class="card-body" >
									<!--begin::Stepper-->
									<div class="stepper stepper-links d-flex flex-column pt-15" id="kt_create_account_stepper" >
                                       
										<!--begin::Nav-->
										
										<!--end::Nav-->
										<!--begin::Form-->
										<div class="mx-auto pt-15 pb-10" novalidate="novalidate" id="kt_create_account_form" style="width:80%;">
											<!--begin::Step 1-->
											<div class="current" data-kt-stepper-element="content">
												

												<div class="w-100">
													<!--begin::Heading-->
													<div class="pb-10 pb-lg-15">
														<!--begin::Title-->
                                                        <div  style="display:flex; flex:1; justify-content:space-between; align-items:center">
                                                            <h2 > Home Role</h2>
                                                            <a href="{{ url('/home') }}" class="btn btn-primary btn-sm">Back</a>
                                                        </div>
														
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
                                                                    <th>Menu Name</th>
                                                                   
                                                                    <th>Action</th>
                                                                    <th>Mange</th>
                                                                </tr>
                                                               
                                                            </thead>
                                                            <tbody class="fs-6">
                                                                @foreach($menus as $menu)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>
                                                                            <a href="" class="fs-6 text-gray-800 text-hover-primary">{{$menu->title}}</a>
                                                                    </td>
                                                                       @php 
     $dat = DB::table('home_roles')
        ->where('role_id', $menu->id)
        ->where('homepage_id', $user->id)
        ->first();
@endphp   
@if($dat)
    <td class="text-end">
        <a href="{{ route('remove_homepage', ['id' => $menu->id, 'user_id' => $user->id]) }}" class="btn btn-danger btn-sm">Remove</a>
    </td>
    <td> <a href="{{url($menu->link,$user->id)}}">Manage</a> </td>
@else
    <td class="text-end">
        <a href="{{ route('add_homepage', ['id' => $menu->id, 'user_id' => $user->id]) }}" class="btn btn-primary btn-sm">Add</a>
    </td>
@endif

                                                                
                                                                    
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
													</div>
													<!--end::Input group-->
												</div>
												<!--end::Wrapper-->
											</div>
											<!--end::Step 1-->
											
											
										</div>
										<!--end::Form-->
									</div>
									<!--end::Stepper-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->
					
    
@endsection