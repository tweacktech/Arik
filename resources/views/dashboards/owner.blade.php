<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Row-->
        <div class="row g-5 g-xl-8">
            <!--begin::Col-->
            <div class="col-xl-4">
                <!--begin::Misc Widget 1-->
                  @php
                                                  $homepage = DB::table('home_pages')
                                                         ->get();

                                                 @endphp
                                          @foreach($homepage as $homepage) 

                <div class="row mb-5 mb-xl-8 g-5 g-xl-8">

                    <div class="col-12">
                        <div class="card card-stretch">
                            <a href="{{route('home')}}" class="btn btn-flex btn-text-gray-800 btn-icon-gray-400 btn-active-color-primary bg-body flex-column justfiy-content-start align-items-start text-start w-100 p-10">
                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                <span class="svg-icon svg-icon-3x mb-5">
                                  
                                           @if($homepage->status==1)          
                                                   <i class="btn bg-success"></i>
                                                    @else
                                                    <i class="btn bg-danger"></i>
                                                    @endif
                                                     <span class="fs-8 fw-bolder">{{$homepage->title}}</span>
                                                    <br>
@if($homepage->status==0)          
                                                   <a href="{{url('active-homepage',$homepage->id)}}" class="btn bg-info ">Activate</a>
                                                    @else
                                                    
                                                    <a class="btn bg-primary"
                                            href="{{ route('home_role', ['id' => md5($homepage->id) ]) }}">
                                                     Manage
                                        </a>

                                                    @endif
                                         
                                </span>
                                <!--end::Svg Icon-->                            
                        </div>
                    </div>                   
                </div> @endforeach
                <!--end::Misc Widget 1-->
                <!--begin::List Widget 5-->
            
                
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-8 ps-xl-12">
               
            <div class="row g-5 g-xl-8">
                <!--begin::Col-->
                <div class="col-xl-6">
                    <!--begin::Mixed Widget 8-->
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Heading-->
                            <div class="d-flex flex-stack">
                                <!--begin:Info-->
                                <div class="d-flex align-items-center">
                                    <!--begin:Image-->
                                    <div class="symbol symbol-60px me-5">
                                        <span class="symbol-label bg-danger-light">
                                            <img src="assets/media/svg/brand-logos/plurk.svg" class="h-50 align-self-center" alt="" />
                                        </span>
                                    </div>
                                    <!--end:Image-->
                                    <!--begin:Title-->
                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                        <a href="#" class="text-dark fw-bolder text-hover-primary fs-5">Menu (@php
                                        echo DB::table('web_menus')->count();
                                        @endphp)</a>

                                    </div>
                                    <!--end:Title-->
                                </div>
                                <!--begin:Info-->
                                <!--begin:Menu-->
                                <div class="ms-1">
                                    <a class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" href="{{route('home')}}">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        
                                    </a>
                                    <!--begin::Menu 2-->
                                    
                                    <!--end::Menu 2-->
                                </div>
                                <!--end::Menu-->
                            </div>
                            
                            
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 8-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-6">
                    <!--begin::Mixed Widget 8-->
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Heading-->
                            <div class="d-flex flex-stack">
                                <!--begin:Info-->
                                <div class="d-flex align-items-center">
                                    <!--begin:Image-->
                                    <div class="symbol symbol-60px me-5">
                                        <span class="symbol-label bg-primary-light">
                                            <img src="assets/media/svg/brand-logos/vimeo.svg" class="h-50 align-self-center" alt="" />
                                        </span>
                                    </div>
                                    <!--end:Image-->
                                    <!--begin:Title-->
                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                        <a href="#" class="text-dark fw-bolder text-hover-primary fs-5">Submenu
                                            (@php
                                        echo DB::table('sub_menus')->count();
                                        @endphp)</a>
                                        
                                    </div>
                                    <!--end:Title-->
                                </div>
                                <!--begin:Info-->
                                <!--begin:Menu-->
                                <div class="ms-1">
                                    <a href="{{ route('home') }}" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        
                                    </a>
                                    <!--begin::Menu 2-->
                            
                                </div>
                                <!--end::Menu-->
                            </div>
                            <!--end::Heading-->
                            
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 8-->
                </div>
                <!--end::Col-->
            </div>
                <div class="card mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">Activities</span>
                            
                        </h3>
                        
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <div class="tab-content">
                            <!--begin::Tap pane-->
                            <div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="border-0">
                                              
                                             
                                                <th class="p-0 min-w-140px">Action</th>
                                                <th class="p-0 min-w-110px">Action Type</th>
                                                <th class="p-0 min-w-50px">Date</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                             @php
                                   
                                            $activities = DB::table('activities')
                                           ->where('status', '1')
                                           ->orderby('date_time', 'desc')
                                           ->limit(5)
                                           ->latest()
                                            ->get();
                                          
   
                                       @endphp

                                       @foreach($activities as $activity)
                                       <tr>
                                               
                                        
                                        <td class="text-muted fw-bold">{{ $activity->activity}}</td>
                                        <td >
                                            {{ $activity->activity_type}}
                                        </td>
                                        <td >
                                            {{ $activity->date_time}}
                                        </td>
                                    </tr>
                                       @endforeach
                                           
                                      
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Tap pane-->
                            
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Tables Widget 5-->
                <!--begin::Row-->
                
                <!--end::Row-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::Content-->