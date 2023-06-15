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
						  <a href="#" class="nav-link text-active-primary me-6" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
						  Header content
						   </a>
						   <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                              <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                   <a href="{{url('manage-logo')}}" class="menu-link px-3">
                                   Logo
                               		</a>
                                   </div>
                               <!--end::Menu item-->  

                               <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                   <a href="{{url('Overall')}}" class="menu-link px-3">
                                   Menus
                                    </a>
                                   </div>
                               <!--end::Menu item--> 

                               <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                   <a href="{{route('AppStore')}}" class="menu-link px-3">
                                   App store
                                    </a>
                                   </div>
                               <!--end::Menu item-->                 
                              </div>
					       	</li>

                        <li class="nav-item">
                          <a href="#" class="nav-link text-active-primary me-6" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                          Footer content
                           </a>
                           <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                              <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                   <a href="{{url('manage-Footer',$user->id)}}" class="menu-link px-3">
                                   Footer
                                    </a>
                                   </div>
                               <!--end::Menu item--> 
                               <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                   <a href="{{url('manage-Social')}}" class="menu-link px-3">
                                   Socail Links
                                    </a>
                                   </div>
                               <!--end::Menu item-->      
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                   <a href="{{url('manage-Category')}}" class="menu-link px-3">
                                   Categories
                                    </a>
                                   </div>
                               <!--end::Menu item-->        

                               <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                   <a href="{{url('manage-AppStore')}}" class="menu-link px-3">
                                   Appstore Links
                                    </a>
                                   </div>
                               <!--end::Menu item-->                 
                              </div>
                        </li>

                    @if($user->id==3)
                     <li class="nav-item">
                        <a class="nav-link text-active-primary me-6" href="{{url('manage-Bonus',$user->id)}}">Bonus</a>
                    </li>   
                    @endif
            </ul>

            </div>
            <!--end::Nav wrapper-->
        </div>
    </div>