<style>
</style>
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Row-->
        <div class="row g-5 g-xl-8">
             <!--begin::Col-->
             <div class="col-xl-4 ps-xl-6">
                <!--begin::Engage widget 1-->

                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column justify-content-center"
                        style="border-radius:15px; background-color:rgb(35, 49, 129)">
                        <div class="col-md-12" style="display: flex">

                            <div class="col-md-12 p-5">
                             <div class="container">
                                <h4 style="color:white;">Manage Site</h4>
                                <ul class="list-inline">

                                    <li>
                                        <div class="btn-group btn-toggle">
                                            @php
                                                $site = DB::table('manage_site')->get();
                                            @endphp
                                            @foreach ($site as $s)
                                                @if ($s->value == 1)
                                                    <a class="btn btn-xs btn-info" href="{{ route('onsite') }}">Turn
                                                        Site On</a>
                                                @else
                                                    <a class="btn btn-xs btn-success"
                                                        href="{{ route('onsite') }}">Turn Site On</a>
                                                @endif

                                                @if ($s->value == 1)
                                                    <a class="btn btn-xs btn-success"
                                                        href="{{ route('offsite') }}">Turn Site Off</a>
                                                @else
                                                    <a class="btn btn-xs btn-info" href="{{ route('offsite') }}">Turn
                                                        Site Off</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </li>
                                </ul>
                                <hr>

                            </div>
                            </div>
                        </div>
                        

                    </div>

                <!--end::Engage widget 1-->
                <!--begin::Row-->
              
                <!--end::Tables Widget 5-->
                <!--begin::Row-->

                <!--end::Row-->
            </div>
             <!-- menu display -->
             <div class="col-xl-4 ps-xl-6">
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
                                            <img src="public/menu/icon1.png" class="h-50 align-self-center" alt="" />
                                        </span>
                                    </div>
                                    <!--end:Image-->
                                    <!--begin:Title-->
                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                        <a href="{{route('WebMenu')}}" class="text-dark fw-bolder text-hover-primary fs-5">Menu (@php
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
             </div>
             <!-- sub menu display -->
             <div class="col-xl-4 ps-xl-6">
                 <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Heading-->
                            <div class="d-flex flex-stack">
                                <!--begin:Info-->
                                <div class="d-flex align-items-center">
                                    <!--begin:Image-->
                                    <div class="symbol symbol-60px me-1">
                                        <span class="symbol-label bg-danger-light btn-color-primary btn-active-light-primary">
                                            <img src="public/menu/icon2.png" class="h-50 align-self-center" alt="" />
                                        </span>
                                    </div>
                                    <!--end:Image-->
                                    <!--begin:Title-->
                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                        <a href="{{route('SubMenu')}}" class="text-dark fw-bolder text-hover-primary fs-5">SubMenu (@php
                                        echo DB::table('sub_menus')->count();
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
             </div>
            
            <!--end::Col-->
        </div>
        <!--end::Row-->

         <div class="row g-5 g-xl-8 pt-3">
                    <!--begin::Col-->@php
                                          $homepage = DB::table('home_pages')
                                                         ->get();

                                                 @endphp
                                          @foreach($homepage as $homepage)                     
                    <div class="col-xl-4">
                        <!--begin::Mixed Widget 8-->
                        <div class="card card-xl-stretch mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Heading-->
                                <div class="d-flex flex-stack">
                                    <!--begin:Info-->
                                    <div class="d-flex align-items-center">
                                        <!--begin:Image-->
                                        <div class="symbol symbol-50px me-2">
                                            <span class="symbol-label">
                                                     @if($homepage->status==1)          
                                                   <i class="btn bg-success"></i>
                                                    @else
                                                    <i class="btn bg-danger"></i>
                                                    @endif
                                              
                                        </span>
                                        </div>
                                        <!--end:Image-->
                                        <!--begin:Title-->
                                        
                                        <!--end:Title-->
                                    </div>
                                    <!--begin:Info-->
                                    <!--begin:Menu-->
                                    <div class="ms-1">
                                        
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg height="24px" viewBox="0 0 24 24" width="24px"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g fill-rule="evenodd" fill="none" stroke-width="1"
                                                        stroke="none">
                                                        <rect fill="#000000" height="5" rx="1"
                                                            width="5" x="5" y="5" />
                                                        <rect fill="#000000" height="5" opacity="0.3"
                                                            rx="1" width="5" x="14"
                                                            y="5" />
                                                        <rect fill="#000000" height="5" opacity="0.3"
                                                            rx="1" width="5" x="5"
                                                            y="14" />
                                                        <rect fill="#000000" height="5" opacity="0.3"
                                                            rx="1" width="5" x="14"
                                                            y="14" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            @if($homepage->status==0)          
                                                   <a href="{{url('active-homepage',$homepage->id)}}" class="btn ">Activate</a>
                                                    @else
                                                    
                                                    <a class="btn btn-color-primary btn-active-light-primary fs-5"
                                            href="{{ route('home_role', ['id' => md5($homepage->id) ]) }}">
                                                     Manage
                                        </a>

                                                    @endif

                                        <!--begin::Menu 2-->
                                        <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                            <i class="text-dark fw-bolder text-hover-primary fs-5"
                                                >{{$homepage->title}}</i>

                                        </div>

                                        <!--end::Menu 2-->
                                    </div>
                                    <!--end::Menu-->
                                </div>

                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Mixed Widget 8-->
                    </div>

                    @endforeach
                    <!--end::Col-->
                    <!--begin::Col-->
                   
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
                    <div class="card-body py-3 pt-5">
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
    </div>
    <!--end::Container-->
</div>
<!--end::Content-->

<script>
    $('.btn-toggle').click(function() {
        $(this).find('.btn').toggleClass('active');

        if ($(this).find('.btn-primary').length > 0) {
            $(this).find('.btn').toggleClass('btn-primary');
        }
        if ($(this).find('.btn-danger').length > 0) {
            $(this).find('.btn').toggleClass('btn-danger');
        }
        if ($(this).find('.btn-success').length > 0) {
            $(this).find('.btn').toggleClass('btn-success');
        }
        if ($(this).find('.btn-info').length > 0) {
            $(this).find('.btn').toggleClass('btn-info');
        }

        $(this).find('.btn').toggleClass('btn-default');

    });

    $('form').submit(function() {
        alert($(this["options"]).val());
        return false;
    });
</script>
