<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta
        content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free."
        name="description" />
    <meta
        content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon"
        name="keywords" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta charset="utf-8" />
    <meta content="en_US" property="og:locale" />
    <meta content="article" property="og:type" />
    <meta content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme"
        property="og:title" />
    <meta content="https://keenthemes.com/metronic" property="og:url" />
    <meta content="Keenthemes | Metronic" property="og:site_name" />
    <link href="https://preview.keenthemes.com/metronic8" rel="canonical" />
    <meta content="{{ csrf_token() }}" name="csrf-token">
    <link href="https://gapaautoparts.com/gapalogo.png" rel="shortcut icon" />
    <!--begin::Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="https://stockmgt.gapaautoparts.com/public/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css"
        rel="stylesheet" type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="https://stockmgt.gapaautoparts.com/public/assets/plugins/global/plugins.bundle.css" rel="stylesheet"
        type="text/css" />
    <link href="https://stockmgt.gapaautoparts.com/public/assets/css/style.bundle.css" rel="stylesheet"
        type="text/css" />

    <link href="https://stockmgt.gapaautoparts.com/public/assets/plugins/custom/datatables/datatables.bundle.css"
        rel="stylesheet" type="text/css" />
    <!-- for drag and drop -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- this is for drop and drog in this arrange of wish order (need) -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/iconify/2.0.0/iconify.js"
        integrity="sha512-vX/u24VoVNEFnY4hejf35cn0a3id3sciX/7WHtSO0DjjeViFQI0OgpGdQykHTjW+IKpLRDN6jWwvnGX98QiRIA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/assets/plugins/custom/datatables/datatables.bundle.js"></script>

    <title>ARIK Management System</title>
    <!-- Main Quill library -->
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <!-- Theme included stylesheets -->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

    <!-- Core build with no theme, formatting, non-essential modules -->
    <link href="//cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet">
    <script src="//cdn.quilljs.com/1.3.6/quill.core.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Sales', 'Expenses'],
                ['2004', 1000, 400],
                ['2005', 1170, 460],
                ['2006', 660, 1120],
                ['2007', 1030, 540]
            ]);

            var options = {
                title: 'Company Performance',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tinymce@5.9.2/themes/silver/theme.min.css">

    <!-- Include TinyMCE JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/tinymce@5.9.2/tinymce.min.js"></script>

    <!-- Initialize TinyMCE -->
    <script>
        tinymce.init({
            selector: '#editors',
        });
    </script>
</head>

<body>

    <body class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled" id="kt_body">
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            @if (Auth::check())
                <div class="page d-flex flex-row flex-column-fluid">
                    <!--begin::Aside-->
                    <div class="aside" data-kt-drawer-activate="{default: true, lg: false}"
                        data-kt-drawer-direction="start" data-kt-drawer-name="aside" data-kt-drawer-overlay="true"
                        data-kt-drawer-toggle="#kt_aside_toggle" data-kt-drawer-width="auto" data-kt-drawer="true"
                        id="kt_aside">
                        <!--begin::Logo-->
                        <div class="aside-logo flex-column-auto pt-10 pt-lg-20" id="kt_aside_logo">
                            <a href="{{ route('home') }}">
                                <!-- <h3>ARIK</h3> -->
                                <img style="width: 100%;" id="logo" src="{{ asset('/public/logo.png') }}">
                            </a>
                        </div>
                        <!--end::Logo-->

                        <!--begin::Nav-->

                        <div class="aside-menu flex-column-fluid pt-5 pb-5 py-lg-5" id="kt_aside_menu">
                            <!--begin::Aside menu-->
                            <div class="w-100 hover-scroll-overlay-y scroll-ps d-flex"
                                data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
                                data-kt-scroll-height="auto" data-kt-scroll-offset="0"
                                data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll="true"
                                id="kt_aside_menu_wrapper">
                                <div class="menu menu-column menu-title-gray-600 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-icon-gray-400 menu-arrow-gray-400 fw-bold fs-6"
                                    data-kt-menu="true" id="kt_aside_menu">

                                    <div class="menu-item py-3" style="marging-top:40px;">
                                        <a class="menu-link" data-bs-dismiss="click" data-bs-placement="right"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" href="{{ route('home') }}"
                                            title="Dashboard">
                                            <span class="menu-icon"
                                                style="background-color:rgb(121, 0, 48); color:#fff">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo13/dist/../src/media/svg/icons/Home/Cupboard.svg--><svg
                                                        height="24px" version="1.1" viewBox="0 0 24 24"
                                                        width="24px" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g fill-rule="evenodd" fill="yellow" stroke-width="1"
                                                            stroke="none">
                                                            <rect height="24" width="24" x="0"
                                                                y="0" />
                                                            <path
                                                                d="M3.5,3 L9.5,3 C10.3284271,3 11,3.67157288 11,4.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L3.5,20 C2.67157288,20 2,19.3284271 2,18.5 L2,4.5 C2,3.67157288 2.67157288,3 3.5,3 Z M9,9 C8.44771525,9 8,9.44771525 8,10 L8,12 C8,12.5522847 8.44771525,13 9,13 C9.55228475,13 10,12.5522847 10,12 L10,10 C10,9.44771525 9.55228475,9 9,9 Z"
                                                                fill="#000000" opacity="0.3" />
                                                            <path
                                                                d="M14.5,3 L20.5,3 C21.3284271,3 22,3.67157288 22,4.5 L22,18.5 C22,19.3284271 21.3284271,20 20.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,4.5 C13,3.67157288 13.6715729,3 14.5,3 Z M20,9 C19.4477153,9 19,9.44771525 19,10 L19,12 C19,12.5522847 19.4477153,13 20,13 C20.5522847,13 21,12.5522847 21,12 L21,10 C21,9.44771525 20.5522847,9 20,9 Z"
                                                                fill="#000000"
                                                                transform="translate(17.500000, 11.500000) scale(-1, 1) translate(-17.500000, -11.500000) " />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </a>
                                    </div>

                                    @php
                                        $menu = DB::table('user_menu')
                                            ->join('menu', 'menu.id', 'user_menu.menu_id')
                                            ->where('user_menu.status', '1')
                                            ->where('menu.status', '1')
                                            ->where('user_menu.user_id', Auth::user()->id)
                                            ->orderBy('menu.id', 'asc') // Order the results by the 'id' column in ascending order
                                            ->get();
                                    @endphp


                                    @foreach ($menu as $m)
                                        <div class="menu-item py-2">
                                            <a class="menu-link" data-bs-dismiss="click" data-bs-placement="right"
                                                data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                href="{{ $m->link }}" title="{{ $m->title }}">
                                                <span class="menu-icon"
                                                    style="background-color:rgb(121, 0, 48); color:#fff">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                                    <span class="svg-icon svg-icon-2x">

                                                        {!! $m->icon !!}

                                                    </span>
                                                    <!--end::Svg Icon-->

                                                </span>
                                                <!--end::Svg Icon-->
                                                </span>
                                            </a>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <!--end::Aside menu-->
                        </div>
                        <!--end::Nav-->
                        <!--begin::Footer-->
                        <div class="aside-footer flex-column-auto pb-5 pb-lg-10" id="kt_aside_footer">
                            <!--begin::Menu-->
                            <div class="d-flex flex-center w-100 scroll-px" data-bs-dismiss="click"
                                data-bs-placement="right" data-bs-toggle="tooltip" title="Logout">
                                <a class="btn btn-custom" data-kt-menu-overflow="true"
                                    data-kt-menu-placement="top-start" data-kt-menu-trigger="click"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                    style="color:rgb(35, 49, 129);">

                                    <span class="svg-icon">
                                        <svg fill="none" height="24"
                                            style="background-color:rgb(121, 0, 48); color:#fff" viewBox="0 0 24 24"
                                            width="24" xmlns="http://www.w3.org/2000/svg">
                                            <rect fill="black" height="2" opacity="0.3" rx="1"
                                                transform="matrix(-1 0 0 1 15.5 11)" width="12" />
                                            <path
                                                d="M13.6313 11.6927L11.8756 10.2297C11.4054 9.83785 11.3732 9.12683 11.806 8.69401C12.1957 8.3043 12.8216 8.28591 13.2336 8.65206L16.1592 11.2526C16.6067 11.6504 16.6067 12.3496 16.1592 12.7474L13.2336 15.3479C12.8216 15.7141 12.1957 15.6957 11.806 15.306C11.3732 14.8732 11.4054 14.1621 11.8756 13.7703L13.6313 12.3073C13.8232 12.1474 13.8232 11.8526 13.6313 11.6927Z"
                                                fill="black" />
                                            <path
                                                d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z"
                                                fill="#C4C4C4" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->

                                </a>
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr076.svg-->

                                <form action="{{ route('logout') }}" class="d-none" id="logout-form" method="POST">
                                    @csrf
                                </form>

                                <!--end::Menu 2-->
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end::Aside-->
                    <!--begin::Wrapper-->
                    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                        <!--begin::Header tablet and mobile-->
                        <div class="header-mobile py-3">
                            <!--begin::Container-->
                            <div class="container d-flex flex-stack">
                                <!--begin::Mobile logo-->
                                <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                                    <a href="../../demo9/dist/index.html">
                                        <img alt="Logo" class="h-35px"
                                            src="https://www.pngitem.com/pimgs/m/80-800194_transparent-users-icon-png-flat-user-icon-png.png" />
                                    </a>
                                </div>
                                <!--end::Mobile logo-->
                                <!--begin::Aside toggle-->
                                <button class="btn btn-icon btn-active-color-primary" id="kt_aside_toggle">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                    <span class="svg-icon svg-icon-2x me-n1">
                                        <svg fill="none" height="24" viewBox="0 0 24 24" width="24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                                fill="black" />
                                            <path
                                                d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                                fill="black" opacity="0.3" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                                <!--end::Aside toggle-->
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Header tablet and mobile-->
            @endif

            @if (Auth::check())
                <!--begin::Header-->
                <div class="header py-6 py-lg-0" data-kt-sticky-name="header" data-kt-sticky-offset="{lg: '300px'}"
                    data-kt-sticky="true" id="kt_header" style="background-color:rgb(121, 0, 48);">
                    <!--begin::Container-->
                    <div class="header-container container-xxl">
                        <!--begin::Page title-->
                        <div
                            class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-20 py-3 py-lg-0 me-3">
                            <!--begin::Heading-->
                            <h1 class="d-flex flex-column text-dark fw-bolder my-1">
                                <span class="text-white fs-1">
                                    @isset($title)
                                        ARIK Admin | {{ $title }}
                                    @endisset
                                </span>
                            </h1>
                            <!--end::Heading-->
                        </div>
                        <!--end::Page title=-->
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-center flex-wrap">

                            <!--begin::Action-->
                            <div class="d-flex align-items-center py-3 py-lg-0">
                                <div class="me-3">
                                    <a class="btn btn-icon btn-custom btn-active-color-primary position-relative"
                                        data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end"
                                        data-kt-menu-trigger="click" href="#"
                                        style="background-color:rgb(35, 49, 129)">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen007.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-white">
                                            <svg fill="none" height="24" viewBox="0 0 24 24" width="24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 22C13.6569 22 15 20.6569 15 19C15 17.3431 13.6569 16 12 16C10.3431 16 9 17.3431 9 19C9 20.6569 10.3431 22 12 22Z"
                                                    fill="black" opacity="0.3" />
                                                <path
                                                    d="M19 15V18C19 18.6 18.6 19 18 19H6C5.4 19 5 18.6 5 18V15C6.1 15 7 14.1 7 13V10C7 7.6 8.7 5.6 11 5.1V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V5.1C15.3 5.6 17 7.6 17 10V13C17 14.1 17.9 15 19 15ZM11 10C11 9.4 11.4 9 12 9C12.6 9 13 8.6 13 8C13 7.4 12.6 7 12 7C10.3 7 9 8.3 9 10C9 10.6 9.4 11 10 11C10.6 11 11 10.6 11 10Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <span
                                            class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-100 animation-blink"></span>
                                    </a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px"
                                        data-kt-menu="true">
                                        <!--begin::Heading-->
                                        <div class="d-flex flex-column bgi-no-repeat rounded-top"
                                            style="background-image:url('assets/media/misc/pattern-1.jpg')">
                                            <!--begin::Title-->
                                            <h3 class="text-white fw-bold px-9 mt-10 mb-6">Notifications
                                                <span class="fs-8 opacity-75 ps-3">24 reports</span>
                                            </h3>
                                            <!--end::Title-->
                                            <!--begin::Tabs-->
                                            <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-bold px-9">
                                                <li class="nav-item">
                                                    <a class="nav-link text-white opacity-75 opacity-state-100 pb-4"
                                                        data-bs-toggle="tab"
                                                        href="#kt_topbar_notifications_1">Alerts</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 active"
                                                        data-bs-toggle="tab"
                                                        href="#kt_topbar_notifications_2">Updates</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-white opacity-75 opacity-state-100 pb-4"
                                                        data-bs-toggle="tab"
                                                        href="#kt_topbar_notifications_3">Logs</a>
                                                </li>
                                            </ul>
                                            <!--end::Tabs-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Tab content-->
                                        <div class="tab-content">
                                            <!--begin::Tab panel-->
                                            <div class="tab-pane fade" id="kt_topbar_notifications_1"
                                                role="tabpanel">
                                                <!--begin::Items-->
                                                <div class="scroll-y mh-325px my-5 px-8">
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack py-4">
                                                        <!--begin::Section-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-35px me-4">
                                                                <span class="symbol-label bg-light-primary">
                                                                    <!--begin::Svg Icon | path: icons/duotune/technology/teh008.svg-->
                                                                    <span class="svg-icon svg-icon-2 svg-icon-primary">
                                                                        <svg fill="none" height="24"
                                                                            viewBox="0 0 24 24" width="24"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M11 6.5C11 9 9 11 6.5 11C4 11 2 9 2 6.5C2 4 4 2 6.5 2C9 2 11 4 11 6.5ZM17.5 2C15 2 13 4 13 6.5C13 9 15 11 17.5 11C20 11 22 9 22 6.5C22 4 20 2 17.5 2ZM6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13ZM17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13Z"
                                                                                fill="black" opacity="0.3" />
                                                                            <path
                                                                                d="M17.5 16C17.5 16 17.4 16 17.5 16L16.7 15.3C16.1 14.7 15.7 13.9 15.6 13.1C15.5 12.4 15.5 11.6 15.6 10.8C15.7 9.99999 16.1 9.19998 16.7 8.59998L17.4 7.90002H17.5C18.3 7.90002 19 7.20002 19 6.40002C19 5.60002 18.3 4.90002 17.5 4.90002C16.7 4.90002 16 5.60002 16 6.40002V6.5L15.3 7.20001C14.7 7.80001 13.9 8.19999 13.1 8.29999C12.4 8.39999 11.6 8.39999 10.8 8.29999C9.99999 8.19999 9.20001 7.80001 8.60001 7.20001L7.89999 6.5V6.40002C7.89999 5.60002 7.19999 4.90002 6.39999 4.90002C5.59999 4.90002 4.89999 5.60002 4.89999 6.40002C4.89999 7.20002 5.59999 7.90002 6.39999 7.90002H6.5L7.20001 8.59998C7.80001 9.19998 8.19999 9.99999 8.29999 10.8C8.39999 11.5 8.39999 12.3 8.29999 13.1C8.19999 13.9 7.80001 14.7 7.20001 15.3L6.5 16H6.39999C5.59999 16 4.89999 16.7 4.89999 17.5C4.89999 18.3 5.59999 19 6.39999 19C7.19999 19 7.89999 18.3 7.89999 17.5V17.4L8.60001 16.7C9.20001 16.1 9.99999 15.7 10.8 15.6C11.5 15.5 12.3 15.5 13.1 15.6C13.9 15.7 14.7 16.1 15.3 16.7L16 17.4V17.5C16 18.3 16.7 19 17.5 19C18.3 19 19 18.3 19 17.5C19 16.7 18.3 16 17.5 16Z"
                                                                                fill="black" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </div>
                                                            <!--end::Symbol-->
                                                            <!--begin::Title-->
                                                            <div class="mb-0 me-2">
                                                                <a class="fs-6 text-gray-800 text-hover-primary fw-bolder"
                                                                    href="#">Project Alice</a>
                                                                <div class="text-gray-400 fs-7">Phase 1 development
                                                                </div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                        <!--end::Section-->
                                                        <!--begin::Label-->
                                                        <span class="badge badge-light fs-8">1 hr</span>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack py-4">
                                                        <!--begin::Section-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-35px me-4">
                                                                <span class="symbol-label bg-light-danger">
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                                                                    <span class="svg-icon svg-icon-2 svg-icon-danger">
                                                                        <svg fill="none" height="24"
                                                                            viewBox="0 0 24 24" width="24"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect fill="black" height="20"
                                                                                opacity="0.3" rx="10"
                                                                                width="20" x="2"
                                                                                y="2" />
                                                                            <rect fill="black" height="2"
                                                                                rx="1"
                                                                                transform="rotate(-90 11 14)"
                                                                                width="7" x="11"
                                                                                y="14" />
                                                                            <rect fill="black" height="2"
                                                                                rx="1"
                                                                                transform="rotate(-90 11 17)"
                                                                                width="2" x="11"
                                                                                y="17" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </div>
                                                            <!--end::Symbol-->
                                                            <!--begin::Title-->
                                                            <div class="mb-0 me-2">
                                                                <a class="fs-6 text-gray-800 text-hover-primary fw-bolder"
                                                                    href="#">HR Confidential</a>
                                                                <div class="text-gray-400 fs-7">Confidential staff
                                                                    documents</div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                        <!--end::Section-->
                                                        <!--begin::Label-->
                                                        <span class="badge badge-light fs-8">2 hrs</span>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack py-4">
                                                        <!--begin::Section-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-35px me-4">
                                                                <span class="symbol-label bg-light-warning">
                                                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                                                    <span class="svg-icon svg-icon-2 svg-icon-warning">
                                                                        <svg fill="none" height="24"
                                                                            viewBox="0 0 24 24" width="24"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
                                                                                fill="black" opacity="0.3" />
                                                                            <path
                                                                                d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
                                                                                fill="black" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </div>
                                                            <!--end::Symbol-->
                                                            <!--begin::Title-->
                                                            <div class="mb-0 me-2">
                                                                <a class="fs-6 text-gray-800 text-hover-primary fw-bolder"
                                                                    href="#">Company HR</a>
                                                                <div class="text-gray-400 fs-7">Corporeate staff
                                                                    profiles</div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                        <!--end::Section-->
                                                        <!--begin::Label-->
                                                        <span class="badge badge-light fs-8">5 hrs</span>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack py-4">
                                                        <!--begin::Section-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-35px me-4">
                                                                <span class="symbol-label bg-light-success">
                                                                    <!--begin::Svg Icon | path: icons/duotune/files/fil023.svg-->
                                                                    <span class="svg-icon svg-icon-2 svg-icon-success">
                                                                        <svg fill="none" height="24"
                                                                            viewBox="0 0 24 24" width="24"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M5 15C3.3 15 2 13.7 2 12C2 10.3 3.3 9 5 9H5.10001C5.00001 8.7 5 8.3 5 8C5 5.2 7.2 3 10 3C11.9 3 13.5 4 14.3 5.5C14.8 5.2 15.4 5 16 5C17.7 5 19 6.3 19 8C19 8.4 18.9 8.7 18.8 9C18.9 9 18.9 9 19 9C20.7 9 22 10.3 22 12C22 13.7 20.7 15 19 15H5ZM5 12.6H13L9.7 9.29999C9.3 8.89999 8.7 8.89999 8.3 9.29999L5 12.6Z"
                                                                                fill="black" opacity="0.3" />
                                                                            <path
                                                                                d="M17 17.4V12C17 11.4 16.6 11 16 11C15.4 11 15 11.4 15 12V17.4H17Z"
                                                                                fill="black" />
                                                                            <path
                                                                                d="M12 17.4H20L16.7 20.7C16.3 21.1 15.7 21.1 15.3 20.7L12 17.4Z"
                                                                                fill="black" opacity="0.3" />
                                                                            <path
                                                                                d="M8 12.6V18C8 18.6 8.4 19 9 19C9.6 19 10 18.6 10 18V12.6H8Z"
                                                                                fill="black" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </div>
                                                            <!--end::Symbol-->
                                                            <!--begin::Title-->
                                                            <div class="mb-0 me-2">
                                                                <a class="fs-6 text-gray-800 text-hover-primary fw-bolder"
                                                                    href="#">Project Redux</a>
                                                                <div class="text-gray-400 fs-7">New frontend admin
                                                                    theme</div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                        <!--end::Section-->
                                                        <!--begin::Label-->
                                                        <span class="badge badge-light fs-8">2 days</span>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack py-4">
                                                        <!--begin::Section-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-35px me-4">
                                                                <span class="symbol-label bg-light-primary">
                                                                    <!--begin::Svg Icon | path: icons/duotune/maps/map001.svg-->
                                                                    <span class="svg-icon svg-icon-2 svg-icon-primary">
                                                                        <svg fill="none" height="24"
                                                                            viewBox="0 0 24 24" width="24"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M6 22H4V3C4 2.4 4.4 2 5 2C5.6 2 6 2.4 6 3V22Z"
                                                                                fill="black" opacity="0.3" />
                                                                            <path
                                                                                d="M18 14H4V4H18C18.8 4 19.2 4.9 18.7 5.5L16 9L18.8 12.5C19.3 13.1 18.8 14 18 14Z"
                                                                                fill="black" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </div>
                                                            <!--end::Symbol-->
                                                            <!--begin::Title-->
                                                            <div class="mb-0 me-2">
                                                                <a class="fs-6 text-gray-800 text-hover-primary fw-bolder"
                                                                    href="#">Project Breafing</a>
                                                                <div class="text-gray-400 fs-7">Product launch status
                                                                    update</div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                        <!--end::Section-->
                                                        <!--begin::Label-->
                                                        <span class="badge badge-light fs-8">21 Jan</span>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack py-4">
                                                        <!--begin::Section-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-35px me-4">
                                                                <span class="symbol-label bg-light-info">
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen006.svg-->
                                                                    <span class="svg-icon svg-icon-2 svg-icon-info">
                                                                        <svg fill="none" height="24"
                                                                            viewBox="0 0 24 24" width="24"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M22 5V19C22 19.6 21.6 20 21 20H19.5L11.9 12.4C11.5 12 10.9 12 10.5 12.4L3 20C2.5 20 2 19.5 2 19V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5ZM7.5 7C6.7 7 6 7.7 6 8.5C6 9.3 6.7 10 7.5 10C8.3 10 9 9.3 9 8.5C9 7.7 8.3 7 7.5 7Z"
                                                                                fill="black" opacity="0.3" />
                                                                            <path
                                                                                d="M19.1 10C18.7 9.60001 18.1 9.60001 17.7 10L10.7 17H2V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V12.9L19.1 10Z"
                                                                                fill="black" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </div>
                                                            <!--end::Symbol-->
                                                            <!--begin::Title-->
                                                            <div class="mb-0 me-2">
                                                                <a class="fs-6 text-gray-800 text-hover-primary fw-bolder"
                                                                    href="#">Banner Assets</a>
                                                                <div class="text-gray-400 fs-7">Collection of banner
                                                                    images</div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                        <!--end::Section-->
                                                        <!--begin::Label-->
                                                        <span class="badge badge-light fs-8">21 Jan</span>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack py-4">
                                                        <!--begin::Section-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Symbol-->
                                                            <div class="symbol symbol-35px me-4">
                                                                <span class="symbol-label bg-light-warning">
                                                                    <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                                                                    <span class="svg-icon svg-icon-2 svg-icon-warning">
                                                                        <svg fill="none" height="25"
                                                                            viewBox="0 0 24 25" width="24"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M8.9 21L7.19999 22.6999C6.79999 23.0999 6.2 23.0999 5.8 22.6999L4.1 21H8.9ZM4 16.0999L2.3 17.8C1.9 18.2 1.9 18.7999 2.3 19.1999L4 20.9V16.0999ZM19.3 9.1999L15.8 5.6999C15.4 5.2999 14.8 5.2999 14.4 5.6999L9 11.0999V21L19.3 10.6999C19.7 10.2999 19.7 9.5999 19.3 9.1999Z"
                                                                                fill="black" opacity="0.3" />
                                                                            <path
                                                                                d="M21 15V20C21 20.6 20.6 21 20 21H11.8L18.8 14H20C20.6 14 21 14.4 21 15ZM10 21V4C10 3.4 9.6 3 9 3H4C3.4 3 3 3.4 3 4V21C3 21.6 3.4 22 4 22H9C9.6 22 10 21.6 10 21ZM7.5 18.5C7.5 19.1 7.1 19.5 6.5 19.5C5.9 19.5 5.5 19.1 5.5 18.5C5.5 17.9 5.9 17.5 6.5 17.5C7.1 17.5 7.5 17.9 7.5 18.5Z"
                                                                                fill="black" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </div>
                                                            <!--end::Symbol-->
                                                            <!--begin::Title-->
                                                            <div class="mb-0 me-2">
                                                                <a class="fs-6 text-gray-800 text-hover-primary fw-bolder"
                                                                    href="#">Icon Assets</a>
                                                                <div class="text-gray-400 fs-7">Collection of SVG icons
                                                                </div>
                                                            </div>
                                                            <!--end::Title-->
                                                        </div>
                                                        <!--end::Section-->
                                                        <!--begin::Label-->
                                                        <span class="badge badge-light fs-8">20 March</span>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Items-->
                                                <!--begin::View more-->
                                                <div class="py-3 text-center border-top">
                                                    <a class="btn btn-color-gray-600 btn-active-color-primary"
                                                        href="../../demo9/dist/pages/profile/activity.html">View All
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                        <span class="svg-icon svg-icon-5">
                                                            <svg fill="none" height="24" viewBox="0 0 24 24"
                                                                width="24" xmlns="http://www.w3.org/2000/svg">
                                                                <rect fill="black" height="2" opacity="0.5"
                                                                    rx="1" transform="rotate(-180 18 13)"
                                                                    width="13" x="18" y="13" />
                                                                <path
                                                                    d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                </div>
                                                <!--end::View more-->
                                            </div>
                                            <!--end::Tab panel-->
                                            <!--begin::Tab panel-->
                                            <div class="tab-pane fade show active" id="kt_topbar_notifications_2"
                                                role="tabpanel">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-column px-9">
                                                    <!--begin::Section-->
                                                    <div class="pt-10 pb-0">
                                                        <!--begin::Title-->
                                                        <h3 class="text-dark text-center fw-bolder">Notification</h3>
                                                        <!--end::Title-->
                                                        <!--begin::Text-->
                                                        <div class="text-center text-gray-600 fw-bold pt-1"></div>
                                                        <!--end::Text-->
                                                        <!--begin::Action-->
                                                        <div class="text-center mt-5 mb-9">
                                                            <a class="btn btn-sm btn-primary px-6"
                                                                data-bs-target="#kt_modal_upgrade_plan"
                                                                data-bs-toggle="modal" href="#">updates</a>
                                                        </div>
                                                        <!--end::Action-->
                                                    </div>
                                                    <!--end::Section-->

                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Tab panel-->

                                        </div>
                                        <!--end::Tab content-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <div class="me-3">
                                    <a class="btn btn-icon btn-custom btn-active-color-primary"
                                        data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end"
                                        data-kt-menu-trigger="click" href="#">
                                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-white">
                                            <svg fill="none" height="24" viewBox="0 0 24 24" width="24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"
                                                    fill="black" />
                                                <rect fill="black" height="8" opacity="0.3" rx="4"
                                                    width="8" x="8" y="3" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content d-flex align-items-center px-3">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-50px me-5">
                                                    <img alt="Logo" src="assets/media/avatars/150-26.jpg" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Username-->
                                                <div class="d-flex flex-column">
                                                    <div class="fw-bolder d-flex align-items-center fs-5">
                                                        {{ Auth::user()->name }}
                                                        <span
                                                            class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span>
                                                    </div>
                                                    <a class="fw-bold text-muted text-hover-primary fs-7"
                                                        href="{{ url('profile') }}"> {{ Auth::user()->email }}</a>
                                                </div>
                                                <!--end::Username-->
                                            </div>
                                        </div>

                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <div class="menu-content px-5">
                                                <div class="menu-item px-5">
                                                    <a class="menu-link px-5" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>

                                                    <form action="{{ route('logout') }}" class="d-none"
                                                        id="logout-form" method="POST">
                                                        @csrf
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--<a class="btn btn-primary" data-bs-target="#kt_modal_create_app" data-bs-toggle="modal" href="#">New Goal</a>-->
                            </div>
                            <!--end::Action-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Container-->
                    <div class="header-offset"></div>
                </div>
                <!--end::Header-->
            @endif
            @yield('content')
            <!--begin::Footer-->
            <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                <!--begin::Container-->
                <div class="container-xxl d-flex flex-column flex-md-row flex-stack">
                    <!--begin::Copyright-->
                    <div class="text-dark order-2 order-md-1">
                        <span class="text-gray-400 fw-bold me-1">Created by</span>
                        <a class="text-muted text-hover-primary fw-bold me-2 fs-6" href="https://silexsecure.com"
                            target="_blank">Silexsecure</a>
                    </div>
                    <!--end::Copyright-->
                    <!--begin::Menu-->

                    <!--end::Menu-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
        </div>
        <!--end::Page-->
        </div>
        <!--end::Root-->
        <!--begin::Drawers-->
        <!--begin::Activities drawer-->
        <div class="bg-body" data-kt-drawer-activate="true" data-kt-drawer-close="#kt_activities_close"
            data-kt-drawer-direction="end" data-kt-drawer-name="activities" data-kt-drawer-overlay="true"
            data-kt-drawer-toggle="#kt_activities_toggle" data-kt-drawer-width="{default:'300px', 'lg': '900px'}"
            data-kt-drawer="true" id="kt_activities">
            <div class="card shadow-none rounded-0">
                <!--begin::Header-->
                <div class="card-header" id="kt_activities_header">
                    <h3 class="card-title fw-bolder text-dark">Activity Logs</h3>
                    <div class="card-toolbar">
                        <button class="btn btn-sm btn-icon btn-active-light-primary me-n5" id="kt_activities_close"
                            type="button">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg fill="none" height="24" viewBox="0 0 24 24" width="24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect fill="black" height="2" opacity="0.5" rx="1"
                                        transform="rotate(-45 6 17.3137)" width="16" x="6"
                                        y="17.3137" />
                                    <rect fill="black" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" width="16" x="7.41422"
                                        y="6" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body position-relative" id="kt_activities_body">
                    <!--begin::Content-->
                    <div class="position-relative scroll-y me-n5 pe-5"
                        data-kt-scroll-dependencies="#kt_activities_header, #kt_activities_footer"
                        data-kt-scroll-height="auto" data-kt-scroll-offset="5px"
                        data-kt-scroll-wrappers="#kt_activities_body" data-kt-scroll="true"
                        id="kt_activities_scroll">
                        <!--begin::Timeline items-->
                        <div class="timeline">
                            <!--begin::Timeline item-->
                            <div class="timeline-item">
                                <!--begin::Timeline line-->
                                <div class="timeline-line w-40px"></div>
                                <!--end::Timeline line-->
                                <!--begin::Timeline icon-->
                                <div class="timeline-icon symbol symbol-circle symbol-40px me-4">
                                    <div class="symbol-label bg-light">
                                        <!--begin::Svg Icon | path: icons/duotune/communication/com003.svg-->
                                        <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                            <svg fill="none" height="24" viewBox="0 0 24 24" width="24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z"
                                                    fill="black" opacity="0.3" />
                                                <path
                                                    d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                </div>
                                <!--end::Timeline icon-->
                                <!--begin::Timeline content-->

                            </div>
                            <!--end::Timeline item-->
                            <!--begin::Timeline item-->
                            <div class="timeline-item">
                                <!--begin::Timeline line-->
                                <div class="timeline-line w-40px"></div>
                                <!--end::Timeline line-->
                                <!--begin::Timeline icon-->
                                <div class="timeline-icon symbol symbol-circle symbol-40px">
                                    <div class="symbol-label bg-light">
                                        <!--begin::Svg Icon | path: icons/duotune/communication/com009.svg-->
                                        <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                            <svg fill="none" height="24" viewBox="0 0 24 24" width="24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z"
                                                    fill="black" opacity="0.3" />
                                                <path
                                                    d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                </div>
                                <!--end::Timeline icon-->
                                <!--begin::Timeline content-->
                                <div class="timeline-content mb-10 mt-n2">
                                    <!--begin::Timeline heading-->
                                    <div class="overflow-auto pe-3">
                                        <!--begin::Title-->
                                        <div class="fs-5 fw-bold mb-2">Invitation for crafting engaging designs that
                                            speak human workshop</div>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center mt-1 fs-6">
                                            <!--begin::Info-->
                                            <div class="text-muted me-2 fs-7">Sent at 4:23 PM by</div>
                                            <!--end::Info-->
                                            <!--begin::User-->
                                            <div class="symbol symbol-circle symbol-25px" data-bs-boundary="window"
                                                data-bs-placement="top" data-bs-toggle="tooltip" title="Alan Nilson">
                                                <img alt="img" src="assets/media/avatars/150-2.jpg" />
                                            </div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Timeline heading-->
                                </div>
                                <!--end::Timeline content-->
                            </div>
                            <!--end::Timeline item-->
                            <!--begin::Timeline item-->
                            <div class="timeline-item">
                                <!--begin::Timeline line-->
                                <div class="timeline-line w-40px"></div>
                                <!--end::Timeline line-->
                                <!--begin::Timeline icon-->
                                <div class="timeline-icon symbol symbol-circle symbol-40px">
                                    <div class="symbol-label bg-light">
                                        <!--begin::Svg Icon | path: icons/duotune/coding/cod008.svg-->
                                        <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                            <svg fill="none" height="24" viewBox="0 0 24 24" width="24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.2166 8.50002L10.5166 7.80007C10.1166 7.40007 10.1166 6.80005 10.5166 6.40005L13.4166 3.50002C15.5166 1.40002 18.9166 1.50005 20.8166 3.90005C22.5166 5.90005 22.2166 8.90007 20.3166 10.8001L17.5166 13.6C17.1166 14 16.5166 14 16.1166 13.6L15.4166 12.9C15.0166 12.5 15.0166 11.9 15.4166 11.5L18.3166 8.6C19.2166 7.7 19.1166 6.30002 18.0166 5.50002C17.2166 4.90002 16.0166 5.10007 15.3166 5.80007L12.4166 8.69997C12.2166 8.89997 11.6166 8.90002 11.2166 8.50002ZM11.2166 15.6L8.51659 18.3001C7.81659 19.0001 6.71658 19.2 5.81658 18.6C4.81658 17.9 4.71659 16.4 5.51659 15.5L8.31658 12.7C8.71658 12.3 8.71658 11.7001 8.31658 11.3001L7.6166 10.6C7.2166 10.2 6.6166 10.2 6.2166 10.6L3.6166 13.2C1.7166 15.1 1.4166 18.1 3.1166 20.1C5.0166 22.4 8.51659 22.5 10.5166 20.5L13.3166 17.7C13.7166 17.3 13.7166 16.7001 13.3166 16.3001L12.6166 15.6C12.3166 15.2 11.6166 15.2 11.2166 15.6Z"
                                                    fill="black" />
                                                <path
                                                    d="M5.0166 9L2.81659 8.40002C2.31659 8.30002 2.0166 7.79995 2.1166 7.19995L2.31659 5.90002C2.41659 5.20002 3.21659 4.89995 3.81659 5.19995L6.0166 6.40002C6.4166 6.60002 6.6166 7.09998 6.5166 7.59998L6.31659 8.30005C6.11659 8.80005 5.5166 9.1 5.0166 9ZM8.41659 5.69995H8.6166C9.1166 5.69995 9.5166 5.30005 9.5166 4.80005L9.6166 3.09998C9.6166 2.49998 9.2166 2 8.5166 2H7.81659C7.21659 2 6.71659 2.59995 6.91659 3.19995L7.31659 4.90002C7.41659 5.40002 7.91659 5.69995 8.41659 5.69995ZM14.6166 18.2L15.1166 21.3C15.2166 21.8 15.7166 22.2 16.2166 22L17.6166 21.6C18.1166 21.4 18.4166 20.8 18.1166 20.3L16.7166 17.5C16.5166 17.1 16.1166 16.9 15.7166 17L15.2166 17.1C14.8166 17.3 14.5166 17.7 14.6166 18.2ZM18.4166 16.3L19.8166 17.2C20.2166 17.5 20.8166 17.3 21.0166 16.8L21.3166 15.9C21.5166 15.4 21.1166 14.8 20.5166 14.8H18.8166C18.0166 14.8 17.7166 15.9 18.4166 16.3Z"
                                                    fill="black" opacity="0.3" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                </div>
                                <!--end::Timeline icon-->
                                <!--begin::Timeline content-->
                                <div class="timeline-content mb-10 mt-n1">
                                    <!--begin::Timeline heading-->
                                    <div class="mb-5 pe-3">
                                        <!--begin::Title-->
                                        <a class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2" href="#">3
                                            New Incoming Project Files:</a>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center mt-1 fs-6">
                                            <!--begin::Info-->
                                            <div class="text-muted me-2 fs-7">Sent at 10:30 PM by</div>
                                            <!--end::Info-->
                                            <!--begin::User-->
                                            <div class="symbol symbol-circle symbol-25px" data-bs-boundary="window"
                                                data-bs-placement="top" data-bs-toggle="tooltip" title="Jan Hummer">
                                                <img alt="img" src="assets/media/avatars/150-6.jpg" />
                                            </div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Timeline heading-->
                                    <!--begin::Timeline details-->
                                    <div class="overflow-auto pb-5">
                                        <div
                                            class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-5">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                                                <!--begin::Icon-->
                                                <img alt="" class="w-30px me-3"
                                                    src="assets/media/svg/files/pdf.svg" />
                                                <!--end::Icon-->
                                                <!--begin::Info-->
                                                <div class="ms-1 fw-bold">
                                                    <!--begin::Desc-->
                                                    <a class="fs-6 text-hover-primary fw-bolder"
                                                        href="#">Finance KPI App Guidelines</a>
                                                    <!--end::Desc-->
                                                    <!--begin::Number-->
                                                    <div class="text-gray-400">1.9mb</div>
                                                    <!--end::Number-->
                                                </div>
                                                <!--begin::Info-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                                                <!--begin::Icon-->
                                                <img alt="" class="w-30px me-3"
                                                    src="assets/media/svg/files/doc.svg" />
                                                <!--end::Icon-->
                                                <!--begin::Info-->
                                                <div class="ms-1 fw-bold">
                                                    <!--begin::Desc-->
                                                    <a class="fs-6 text-hover-primary fw-bolder" href="#">Client
                                                        UAT Testing Results</a>
                                                    <!--end::Desc-->
                                                    <!--begin::Number-->
                                                    <div class="text-gray-400">18kb</div>
                                                    <!--end::Number-->
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex flex-aligns-center">
                                                <!--begin::Icon-->
                                                <img alt="" class="w-30px me-3"
                                                    src="assets/media/svg/files/css.svg" />
                                                <!--end::Icon-->
                                                <!--begin::Info-->
                                                <div class="ms-1 fw-bold">
                                                    <!--begin::Desc-->
                                                    <a class="fs-6 text-hover-primary fw-bolder"
                                                        href="#">Finance Reports</a>
                                                    <!--end::Desc-->
                                                    <!--begin::Number-->
                                                    <div class="text-gray-400">20mb</div>
                                                    <!--end::Number-->
                                                </div>
                                                <!--end::Icon-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                    </div>
                                    <!--end::Timeline details-->
                                </div>
                                <!--end::Timeline content-->
                            </div>
                            <!--end::Timeline item-->
                            <!--begin::Timeline item-->
                            <div class="timeline-item">
                                <!--begin::Timeline line-->
                                <div class="timeline-line w-40px"></div>
                                <!--end::Timeline line-->
                                <!--begin::Timeline icon-->
                                <div class="timeline-icon symbol symbol-circle symbol-40px">
                                    <div class="symbol-label bg-light">
                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                        <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                            <svg fill="none" height="24" viewBox="0 0 24 24" width="24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"
                                                    fill="black" opacity="0.3" />
                                                <path
                                                    d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                </div>
                                <!--end::Timeline icon-->
                                <!--begin::Timeline content-->
                                <div class="timeline-content mb-10 mt-n1">
                                    <!--begin::Timeline heading-->
                                    <div class="pe-3 mb-5">
                                        <!--begin::Title-->
                                        <div class="fs-5 fw-bold mb-2">Task
                                            <a class="text-primary fw-bolder me-1" href="#">#45890</a>merged
                                            with
                                            <a class="text-primary fw-bolder me-1" href="#">#45890</a>in “Ads
                                            Pro Admin Dashboard project:
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center mt-1 fs-6">
                                            <!--begin::Info-->
                                            <div class="text-muted me-2 fs-7">Initiated at 4:23 PM by</div>
                                            <!--end::Info-->
                                            <!--begin::User-->
                                            <div class="symbol symbol-circle symbol-25px" data-bs-boundary="window"
                                                data-bs-placement="top" data-bs-toggle="tooltip" title="Nina Nilson">
                                                <img alt="img" src="assets/media/avatars/150-11.jpg" />
                                            </div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Timeline heading-->
                                </div>
                                <!--end::Timeline content-->
                            </div>
                            <!--end::Timeline item-->
                            <!--begin::Timeline item-->
                            <div class="timeline-item">
                                <!--begin::Timeline line-->
                                <div class="timeline-line w-40px"></div>
                                <!--end::Timeline line-->
                                <!--begin::Timeline icon-->
                                <div class="timeline-icon symbol symbol-circle symbol-40px">
                                    <div class="symbol-label bg-light">
                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                        <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                            <svg fill="none" height="24" viewBox="0 0 24 24" width="24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                    fill="black" opacity="0.3" />
                                                <path
                                                    d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                </div>
                                <!--end::Timeline icon-->
                                <!--begin::Timeline content-->
                                <div class="timeline-content mb-10 mt-n1">
                                    <!--begin::Timeline heading-->
                                    <div class="pe-3 mb-5">
                                        <!--begin::Title-->
                                        <div class="fs-5 fw-bold mb-2">3 new application design concepts added:</div>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center mt-1 fs-6">
                                            <!--begin::Info-->
                                            <div class="text-muted me-2 fs-7">Created at 4:23 PM by</div>
                                            <!--end::Info-->
                                            <!--begin::User-->
                                            <div class="symbol symbol-circle symbol-25px" data-bs-boundary="window"
                                                data-bs-placement="top" data-bs-toggle="tooltip"
                                                title="Marcus Dotson">
                                                <img alt="img" src="assets/media/avatars/150-3.jpg" />
                                            </div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Timeline heading-->
                                    <!--begin::Timeline details-->
                                    <div class="overflow-auto pb-5">
                                        <div
                                            class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-7">
                                            <!--begin::Item-->
                                            <div class="overlay me-10">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper">
                                                    <img alt="img" class="rounded w-200px"
                                                        src="assets/media/demos/demo1.png" />
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Link-->
                                                <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                    <a class="btn btn-sm btn-primary btn-shadow"
                                                        href="#">Explore</a>
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="overlay me-10">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper">
                                                    <img alt="img" class="rounded w-200px"
                                                        src="assets/media/demos/demo2.png" />
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Link-->
                                                <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                    <a class="btn btn-sm btn-primary btn-shadow"
                                                        href="#">Explore</a>
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="overlay">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper">
                                                    <img alt="img" class="rounded w-200px"
                                                        src="assets/media/demos/demo3.png" />
                                                </div>
                                                <!--end::Image-->
                                                <!--begin::Link-->
                                                <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                    <a class="btn btn-sm btn-primary btn-shadow"
                                                        href="#">Explore</a>
                                                </div>
                                                <!--end::Link-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                    </div>
                                    <!--end::Timeline details-->
                                </div>
                                <!--end::Timeline content-->
                            </div>
                            <!--end::Timeline item-->
                            <!--begin::Timeline item-->
                            <div class="timeline-item">
                                <!--begin::Timeline line-->
                                <div class="timeline-line w-40px"></div>
                                <!--end::Timeline line-->
                                <!--begin::Timeline icon-->
                                <div class="timeline-icon symbol symbol-circle symbol-40px">
                                    <div class="symbol-label bg-light">
                                        <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                                        <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                            <svg fill="none" height="24" viewBox="0 0 24 24" width="24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z"
                                                    fill="black" />
                                                <path
                                                    d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z"
                                                    fill="black" opacity="0.3" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                </div>
                                <!--end::Timeline icon-->
                                <!--begin::Timeline content-->
                                <div class="timeline-content mb-10 mt-n1">
                                    <!--begin::Timeline heading-->
                                    <div class="pe-3 mb-5">
                                        <!--begin::Title-->
                                        <div class="fs-5 fw-bold mb-2">New case
                                            <a class="text-primary fw-bolder me-1" href="#">#67890</a>is
                                            assigned to you in Multi-platform Database Design project
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="overflow-auto pb-5">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex align-items-center mt-1 fs-6">
                                                <!--begin::Info-->
                                                <div class="text-muted me-2 fs-7">Added at 4:23 PM by</div>
                                                <!--end::Info-->
                                                <!--begin::User-->
                                                <a class="text-primary fw-bolder me-1" href="#">Alice Tan</a>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Timeline heading-->
                                </div>
                                <!--end::Timeline content-->
                            </div>
                            <!--end::Timeline item-->
                            <!--begin::Timeline item-->
                            <div class="timeline-item">
                                <!--begin::Timeline line-->
                                <div class="timeline-line w-40px"></div>
                                <!--end::Timeline line-->
                                <!--begin::Timeline icon-->
                                <div class="timeline-icon symbol symbol-circle symbol-40px">
                                    <div class="symbol-label bg-light">
                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                        <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                            <svg fill="none" height="24" viewBox="0 0 24 24" width="24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                    fill="black" opacity="0.3" />
                                                <path
                                                    d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                </div>
                                <!--end::Timeline icon-->
                                <!--begin::Timeline content-->
                                <div class="timeline-content mb-10 mt-n1">
                                    <!--begin::Timeline heading-->
                                    <div class="pe-3 mb-5">
                                        <!--begin::Title-->
                                        <div class="fs-5 fw-bold mb-2">You have received a new order:</div>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center mt-1 fs-6">
                                            <!--begin::Info-->
                                            <div class="text-muted me-2 fs-7">Placed at 5:05 AM by</div>
                                            <!--end::Info-->
                                            <!--begin::User-->
                                            <div class="symbol symbol-circle symbol-25px" data-bs-boundary="window"
                                                data-bs-placement="top" data-bs-toggle="tooltip" title="Robert Rich">
                                                <img alt="img" src="assets/media/avatars/150-14.jpg" />
                                            </div>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Timeline heading-->
                                    <!--begin::Timeline details-->
                                    <div class="overflow-auto pb-5">
                                        <!--begin::Notice-->
                                        <div
                                            class="notice d-flex bg-light-primary rounded border-primary border border-dashed min-w-lg-600px flex-shrink-0 p-6">
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/coding/cod004.svg-->
                                            <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                                <svg fill="none" height="24" viewBox="0 0 24 24"
                                                    width="24" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19.0687 17.9688H11.0687C10.4687 17.9688 10.0687 18.3687 10.0687 18.9688V19.9688C10.0687 20.5687 10.4687 20.9688 11.0687 20.9688H19.0687C19.6687 20.9688 20.0687 20.5687 20.0687 19.9688V18.9688C20.0687 18.3687 19.6687 17.9688 19.0687 17.9688Z"
                                                        fill="black" opacity="0.3" />
                                                    <path
                                                        d="M4.06875 17.9688C3.86875 17.9688 3.66874 17.8688 3.46874 17.7688C2.96874 17.4688 2.86875 16.8688 3.16875 16.3688L6.76874 10.9688L3.16875 5.56876C2.86875 5.06876 2.96874 4.46873 3.46874 4.16873C3.96874 3.86873 4.56875 3.96878 4.86875 4.46878L8.86875 10.4688C9.06875 10.7688 9.06875 11.2688 8.86875 11.5688L4.86875 17.5688C4.66875 17.7688 4.36875 17.9688 4.06875 17.9688Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                                <!--begin::Content-->
                                                <div class="mb-3 mb-md-0 fw-bold">
                                                    <h4 class="text-gray-900 fw-bolder">Database Backup Process
                                                        Completed!</h4>
                                                    <div class="fs-6 text-gray-700 pe-7">Login into Metronic Admin
                                                        Dashboard to make sure the data integrity is OK</div>
                                                </div>
                                                <!--end::Content-->
                                                <!--begin::Action-->
                                                <a class="btn btn-primary px-6 align-self-center text-nowrap"
                                                    href="#">Proceed</a>
                                                <!--end::Action-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Notice-->
                                    </div>
                                    <!--end::Timeline details-->
                                </div>
                                <!--end::Timeline content-->
                            </div>
                            <!--end::Timeline item-->
                            <!--begin::Timeline item-->
                            <div class="timeline-item">
                                <!--begin::Timeline line-->
                                <div class="timeline-line w-40px"></div>
                                <!--end::Timeline line-->
                                <!--begin::Timeline icon-->
                                <div class="timeline-icon symbol symbol-circle symbol-40px">
                                    <div class="symbol-label bg-light">
                                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                        <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                            <svg fill="none" height="24" viewBox="0 0 24 24" width="24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z"
                                                    fill="black" />
                                                <path
                                                    d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z"
                                                    fill="black" opacity="0.3" />
                                                <path
                                                    d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z"
                                                    fill="black" opacity="0.3" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                </div>
                                <!--end::Timeline icon-->
                                <!--begin::Timeline content-->
                                <div class="timeline-content mt-n1">
                                    <!--begin::Timeline heading-->
                                    <div class="pe-3 mb-5">
                                        <!--begin::Title-->
                                        <div class="fs-5 fw-bold mb-2">New order
                                            <a class="text-primary fw-bolder me-1" href="#">#67890</a>is placed
                                            for Workshow Planning &amp; Budget Estimation
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center mt-1 fs-6">
                                            <!--begin::Info-->
                                            <div class="text-muted me-2 fs-7">Placed at 4:23 PM by</div>
                                            <!--end::Info-->
                                            <!--begin::User-->
                                            <a class="text-primary fw-bolder me-1" href="#">Jimmy Bold</a>
                                            <!--end::User-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Timeline heading-->
                                </div>
                                <!--end::Timeline content-->
                            </div>
                            <!--end::Timeline item-->
                        </div>
                        <!--end::Timeline items-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <div class="card-footer py-5 text-center" id="kt_activities_footer">
                    <a class="btn btn-bg-body text-primary" href="../../demo9/dist/pages/profile/activity.html">View
                        All Activities
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                        <span class="svg-icon svg-icon-3 svg-icon-primary">
                            <svg fill="none" height="24" viewBox="0 0 24 24" width="24"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect fill="black" height="2" opacity="0.5" rx="1"
                                    transform="rotate(-180 18 13)" width="13" x="18" y="13" />
                                <path
                                    d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                </div>
                <!--end::Footer-->
            </div>
        </div>

        <!--begin::Exolore drawer-->
        <div class="bg-body" data-kt-drawer-activate="true" data-kt-drawer-close="#kt_explore_close"
            data-kt-drawer-direction="end" data-kt-drawer-name="explore" data-kt-drawer-overlay="true"
            data-kt-drawer-toggle="#kt_explore_toggle" data-kt-drawer-width="{default:'350px', 'lg': '475px'}"
            data-kt-drawer="true" id="kt_explore">
            <!--begin::Card-->
            <div class="card shadow-none rounded-0 w-100">
                <!--begin::Header-->
                <div class="card-header" id="kt_explore_header">
                    <h3 class="card-title fw-bolder text-gray-700">Explore Metronic</h3>
                    <div class="card-toolbar">
                        <button class="btn btn-sm btn-icon btn-active-light-primary me-n5" id="kt_explore_close"
                            type="button">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg fill="none" height="24" viewBox="0 0 24 24" width="24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect fill="black" height="2" opacity="0.5" rx="1"
                                        transform="rotate(-45 6 17.3137)" width="16" x="6"
                                        y="17.3137" />
                                    <rect fill="black" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" width="16" x="7.41422"
                                        y="6" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body" id="kt_explore_body">
                    <!--begin::Content-->
                    <div class="scroll-y me-n5 pe-5" data-kt-scroll-dependencies="#kt_explore_header"
                        data-kt-scroll-height="auto" data-kt-scroll-offset="5px"
                        data-kt-scroll-wrappers="#kt_explore_body" data-kt-scroll="true" id="kt_explore_scroll">
                        <!--begin::Wrapper-->
                        <div class="mb-0">
                            <!--begin::Header-->
                            <div class="mb-7">
                                <div class="d-flex flex-stack">
                                    <h3 class="mb-0">Metronic Licenses</h3>
                                    <a class="fw-bold" href="https://themeforest.net/licenses/standard"
                                        target="_blank">License FAQs</a>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::License-->
                            <div class="rounded border border-dashed border-gray-300 py-4 px-6 mb-5">
                                <div class="d-flex flex-stack">
                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center mb-1">
                                            <div class="fs-6 fw-bold text-gray-800 fw-bold mb-0 me-1">Regular License
                                            </div>
                                            <i class="text-gray-400 fas fa-exclamation-circle ms-1 fs-7"
                                                data-bs-content="Use, by you or one client in a single end product which end users are not charged for."
                                                data-bs-custom-class="popover-dark" data-bs-placement="top"
                                                data-bs-toggle="popover" data-bs-trigger="hover"></i>
                                        </div>
                                        <div class="fs-7 text-muted">For single end product used by you or one client
                                        </div>
                                    </div>
                                    <div class="text-nowrap">
                                        <span class="text-muted fs-7 fw-bold me-n1">$</span>
                                        <span class="text-dark fs-1 fw-bolder">39</span>
                                    </div>
                                </div>
                            </div>
                            <!--end::License-->
                            <!--begin::License-->
                            <div class="rounded border border-dashed border-gray-300 py-4 px-6 mb-5">
                                <div class="d-flex flex-stack">
                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center mb-1">
                                            <div class="fs-6 fw-bold text-gray-800 fw-bold mb-0 me-1">Extended License
                                            </div>
                                            <i class="text-gray-400 fas fa-exclamation-circle ms-1 fs-7"
                                                data-bs-content="Use, by you or one client, in a single end product which end users can be charged for."
                                                data-bs-custom-class="popover-dark" data-bs-placement="top"
                                                data-bs-toggle="popover" data-bs-trigger="hover"></i>
                                        </div>
                                        <div class="fs-7 text-muted">For single end product with paying users.</div>
                                    </div>
                                    <div class="text-nowrap">
                                        <span class="text-muted fs-7 fw-bold me-n1">$</span>
                                        <span class="text-dark fs-1 fw-bolder">939</span>
                                    </div>
                                </div>
                            </div>
                            <!--end::License-->
                            <!--begin::License-->
                            <div class="rounded border border-dashed border-gray-300 py-4 px-6 mb-5">
                                <div class="d-flex flex-stack">
                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center mb-1">
                                            <div class="fs-6 fw-bold text-gray-800 fw-bold mb-0 me-1">Custom License
                                            </div>
                                        </div>
                                        <div class="fs-7 text-muted">Reach us for custom license offers.</div>
                                    </div>
                                    <div class="text-nowrap">
                                        <a class="btn btn-sm btn-success" href="https://keenthemes.com/contact/"
                                            target="_blank">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                            <!--end::License-->
                            <!--begin::Purchase-->
                            <a class="btn btn-primary mb-15 w-100" href="https://1.envato.market/EA4JP">Buy Now</a>
                            <!--end::Purchase-->
                            <!--begin::Demos-->
                            <div class="mb-0">
                                <h3 class="fw-bolder text-center mb-6">Metronic Demos</h3>
                                <!--begin::Row-->
                                <div class="row g-5">
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Demo-->
                                        <div
                                            class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                            <div class="overlay-wrapper">
                                                <img alt="demo" class="w-100"
                                                    src="assets/media/demos/demo1.png" />
                                            </div>
                                            <div class="overlay-layer bg-dark bg-opacity-10">
                                                <a class="btn btn-sm btn-success shadow"
                                                    href="https://preview.keenthemes.com/metronic8/demo1">Demo 1</a>
                                            </div>
                                        </div>
                                        <!--end::Demo-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Demo-->
                                        <div
                                            class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                            <div class="overlay-wrapper">
                                                <img alt="demo" class="w-100"
                                                    src="assets/media/demos/demo2.png" />
                                            </div>
                                            <div class="overlay-layer bg-dark bg-opacity-10">
                                                <a class="btn btn-sm btn-success shadow"
                                                    href="https://preview.keenthemes.com/metronic8/demo2">Demo 2</a>
                                            </div>
                                        </div>
                                        <!--end::Demo-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Demo-->
                                        <div
                                            class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                            <div class="overlay-wrapper">
                                                <img alt="demo" class="w-100"
                                                    src="assets/media/demos/demo3.png" />
                                            </div>
                                            <div class="overlay-layer bg-dark bg-opacity-10">
                                                <a class="btn btn-sm btn-success shadow"
                                                    href="https://preview.keenthemes.com/metronic8/demo3">Demo 3</a>
                                            </div>
                                        </div>
                                        <!--end::Demo-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Demo-->
                                        <div
                                            class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                            <div class="overlay-wrapper">
                                                <img alt="demo" class="w-100"
                                                    src="assets/media/demos/demo4.png" />
                                            </div>
                                            <div class="overlay-layer bg-dark bg-opacity-10">
                                                <a class="btn btn-sm btn-success shadow"
                                                    href="https://preview.keenthemes.com/metronic8/demo4">Demo 4</a>
                                            </div>
                                        </div>
                                        <!--end::Demo-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Demo-->
                                        <div
                                            class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                            <div class="overlay-wrapper">
                                                <img alt="demo" class="w-100"
                                                    src="assets/media/demos/demo5.png" />
                                            </div>
                                            <div class="overlay-layer bg-dark bg-opacity-10">
                                                <a class="btn btn-sm btn-success shadow"
                                                    href="https://preview.keenthemes.com/metronic8/demo5">Demo 5</a>
                                            </div>
                                        </div>
                                        <!--end::Demo-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Demo-->
                                        <div
                                            class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                            <div class="overlay-wrapper">
                                                <img alt="demo" class="w-100"
                                                    src="assets/media/demos/demo6.png" />
                                            </div>
                                            <div class="overlay-layer bg-dark bg-opacity-10">
                                                <a class="btn btn-sm btn-success shadow"
                                                    href="https://preview.keenthemes.com/metronic8/demo6">Demo 6</a>
                                            </div>
                                        </div>
                                        <!--end::Demo-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Demo-->
                                        <div
                                            class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                            <div class="overlay-wrapper">
                                                <img alt="demo" class="w-100"
                                                    src="assets/media/demos/demo7.png" />
                                            </div>
                                            <div class="overlay-layer bg-dark bg-opacity-10">
                                                <a class="btn btn-sm btn-success shadow"
                                                    href="https://preview.keenthemes.com/metronic8/demo7">Demo 7</a>
                                            </div>
                                        </div>
                                        <!--end::Demo-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Demo-->
                                        <div
                                            class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                            <div class="overlay-wrapper">
                                                <img alt="demo" class="w-100"
                                                    src="assets/media/demos/demo8.png" />
                                            </div>
                                            <div class="overlay-layer bg-dark bg-opacity-10">
                                                <a class="btn btn-sm btn-success shadow"
                                                    href="https://preview.keenthemes.com/metronic8/demo8">Demo 8</a>
                                            </div>
                                        </div>
                                        <!--end::Demo-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Demo-->
                                        <div
                                            class="overlay overflow-hidden position-relative border border-4 border-success rounded">
                                            <div class="overlay-wrapper">
                                                <img alt="demo" class="w-100"
                                                    src="assets/media/demos/demo9.png" />
                                            </div>
                                            <div class="overlay-layer bg-dark bg-opacity-10">
                                                <a class="btn btn-sm btn-success shadow"
                                                    href="https://preview.keenthemes.com/metronic8/demo9">Demo 9</a>
                                            </div>
                                        </div>
                                        <!--end::Demo-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Demo-->
                                        <div
                                            class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                            <div class="overlay-wrapper">
                                                <img alt="demo" class="w-100 opacity-25"
                                                    src="assets/media/demos/demo10.png" />
                                            </div>
                                            <div class="overlay-layer bg-dark bg-opacity-10">
                                                <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming
                                                    soon</div>
                                            </div>
                                        </div>
                                        <!--end::Demo-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Demo-->
                                        <div
                                            class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                            <div class="overlay-wrapper">
                                                <img alt="demo" class="w-100"
                                                    src="assets/media/demos/demo11.png" />
                                            </div>
                                            <div class="overlay-layer bg-dark bg-opacity-10">
                                                <a class="btn btn-sm btn-success shadow"
                                                    href="https://preview.keenthemes.com/metronic8/demo11">Demo 11</a>
                                            </div>
                                        </div>
                                        <!--end::Demo-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Demo-->
                                        <div
                                            class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                            <div class="overlay-wrapper">
                                                <img alt="demo" class="w-100 opacity-25"
                                                    src="assets/media/demos/demo12.png" />
                                            </div>
                                            <div class="overlay-layer bg-dark bg-opacity-10">
                                                <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming
                                                    soon</div>
                                            </div>
                                        </div>
                                        <!--end::Demo-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Demo-->
                                        <div
                                            class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                            <div class="overlay-wrapper">
                                                <img alt="demo" class="w-100"
                                                    src="assets/media/demos/demo13.png" />
                                            </div>
                                            <div class="overlay-layer bg-dark bg-opacity-10">
                                                <a class="btn btn-sm btn-success shadow"
                                                    href="https://preview.keenthemes.com/metronic8/demo13">Demo 13</a>
                                            </div>
                                        </div>
                                        <!--end::Demo-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Demo-->
                                        <div
                                            class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                            <div class="overlay-wrapper">
                                                <img alt="demo" class="w-100 opacity-25"
                                                    src="assets/media/demos/demo14.png" />
                                            </div>
                                            <div class="overlay-layer bg-dark bg-opacity-10">
                                                <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming
                                                    soon</div>
                                            </div>
                                        </div>
                                        <!--end::Demo-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Demo-->
                                        <div
                                            class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                            <div class="overlay-wrapper">
                                                <img alt="demo" class="w-100 opacity-25"
                                                    src="assets/media/demos/demo15.png" />
                                            </div>
                                            <div class="overlay-layer bg-dark bg-opacity-10">
                                                <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming
                                                    soon</div>
                                            </div>
                                        </div>
                                        <!--end::Demo-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Demo-->
                                        <div
                                            class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                            <div class="overlay-wrapper">
                                                <img alt="demo" class="w-100 opacity-25"
                                                    src="assets/media/demos/demo16.png" />
                                            </div>
                                            <div class="overlay-layer bg-dark bg-opacity-10">
                                                <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming
                                                    soon</div>
                                            </div>
                                        </div>
                                        <!--end::Demo-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Demo-->
                                        <div
                                            class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                            <div class="overlay-wrapper">
                                                <img alt="demo" class="w-100 opacity-25"
                                                    src="assets/media/demos/demo17.png" />
                                            </div>
                                            <div class="overlay-layer bg-dark bg-opacity-10">
                                                <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming
                                                    soon</div>
                                            </div>
                                        </div>
                                        <!--end::Demo-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Demo-->
                                        <div
                                            class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                            <div class="overlay-wrapper">
                                                <img alt="demo" class="w-100 opacity-25"
                                                    src="assets/media/demos/demo18.png" />
                                            </div>
                                            <div class="overlay-layer bg-dark bg-opacity-10">
                                                <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming
                                                    soon</div>
                                            </div>
                                        </div>
                                        <!--end::Demo-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Demo-->
                                        <div
                                            class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                            <div class="overlay-wrapper">
                                                <img alt="demo" class="w-100 opacity-25"
                                                    src="assets/media/demos/demo19.png" />
                                            </div>
                                            <div class="overlay-layer bg-dark bg-opacity-10">
                                                <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming
                                                    soon</div>
                                            </div>
                                        </div>
                                        <!--end::Demo-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Demo-->
                                        <div
                                            class="overlay overflow-hidden position-relative border border-4 border-gray-200 rounded">
                                            <div class="overlay-wrapper">
                                                <img alt="demo" class="w-100 opacity-25"
                                                    src="assets/media/demos/demo20.png" />
                                            </div>
                                            <div class="overlay-layer bg-dark bg-opacity-10">
                                                <div class="badge badge-white px-6 py-4 fw-bold fs-base shadow">Coming
                                                    soon</div>
                                            </div>
                                        </div>
                                        <!--end::Demo-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Demos-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Exolore drawer-->
        <!--begin::Chat drawer-->
        <div class="bg-body" data-kt-drawer-activate="true" data-kt-drawer-close="#kt_drawer_chat_close"
            data-kt-drawer-direction="end" data-kt-drawer-name="chat" data-kt-drawer-overlay="true"
            data-kt-drawer-toggle="#kt_drawer_chat_toggle" data-kt-drawer-width="{default:'300px', 'md': '500px'}"
            data-kt-drawer="true" id="kt_drawer_chat">
            <!--begin::Messenger-->
            <div class="card w-100 rounded-0" id="kt_drawer_chat_messenger">
                <!--begin::Card header-->
                <div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
                    <!--begin::Title-->
                    <div class="card-title">
                        <!--begin::User-->
                        <div class="d-flex justify-content-center flex-column me-3">
                            <a class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1"
                                href="#">Brian Cox</a>
                            <!--begin::Info-->
                            <div class="mb-0 lh-1">
                                <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                                <span class="fs-7 fw-bold text-muted">Active</span>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::User-->
                    </div>
                    <!--end::Title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Menu-->
                        <div class="me-2">
                            <button class="btn btn-sm btn-icon btn-active-light-primary"
                                data-kt-menu-placement="bottom-end" data-kt-menu-trigger="click">
                                <i class="bi bi-three-dots fs-3"></i>
                            </button>
                            <!--begin::Menu 3-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                                data-kt-menu="true">
                                <!--begin::Heading-->
                                <div class="menu-item px-3">
                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Contacts</div>
                                </div>
                                <!--end::Heading-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a class="menu-link px-3" data-bs-target="#kt_modal_users_search"
                                        data-bs-toggle="modal" href="#">Add Contact</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a class="menu-link flex-stack px-3" data-bs-target="#kt_modal_invite_friends"
                                        data-bs-toggle="modal" href="#">Invite Contacts
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                            title="Specify a contact email to send an invitation"></i></a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3" data-kt-menu-placement="right-start"
                                    data-kt-menu-trigger="hover">
                                    <a class="menu-link px-3" href="#">
                                        <span class="menu-title">Groups</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <!--begin::Menu sub-->
                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a class="menu-link px-3" data-bs-toggle="tooltip" href="#"
                                                title="Coming soon">Create Group</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a class="menu-link px-3" data-bs-toggle="tooltip" href="#"
                                                title="Coming soon">Invite Members</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a class="menu-link px-3" data-bs-toggle="tooltip" href="#"
                                                title="Coming soon">Settings</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu sub-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-1">
                                    <a class="menu-link px-3" data-bs-toggle="tooltip" href="#"
                                        title="Coming soon">Settings</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu 3-->
                        </div>
                        <!--end::Menu-->
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_chat_close">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg fill="none" height="24" viewBox="0 0 24 24" width="24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect fill="black" height="2" opacity="0.5" rx="1"
                                        transform="rotate(-45 6 17.3137)" width="16" x="6"
                                        y="17.3137" />
                                    <rect fill="black" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" width="16" x="7.41422"
                                        y="6" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body" id="kt_drawer_chat_messenger_body">
                    <!--begin::Messages-->
                    <div class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll-activate="true"
                        data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer"
                        data-kt-scroll-height="auto" data-kt-scroll-offset="0px"
                        data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body" data-kt-scroll="true">
                        <!--begin::Message(in)-->
                        <div class="d-flex justify-content-start mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-start">
                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/150-15.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-3">
                                        <a class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1"
                                            href="#">Brian Cox</a>
                                        <span class="text-muted fs-7 mb-1"> mins</span>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::User-->
                                <!--begin::Text-->
                                <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                    data-kt-element="message-text">How likely are you to recommend our company to your
                                    friends and family ?</div>
                                <!--end::Text-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Message(in)-->
                        <!--begin::Message(out)-->
                        <div class="d-flex justify-content-end mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-end">
                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Details-->
                                    <div class="me-3">
                                        <span class="text-muted fs-7 mb-1">5 mins</span>
                                        <a class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1"
                                            href="#">You</a>
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/150-26.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                </div>
                                <!--end::User-->
                                <!--begin::Text-->
                                <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                    data-kt-element="message-text">Hey there, we’re just writing to let you know that
                                    you’ve been subscribed to a repository on GitHub.</div>
                                <!--end::Text-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Message(out)-->
                        <!--begin::Message(in)-->
                        <div class="d-flex justify-content-start mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-start">
                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/150-15.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-3">
                                        <a class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1"
                                            href="#">Brian Cox</a>
                                        <span class="text-muted fs-7 mb-1">1 Hour</span>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::User-->
                                <!--begin::Text-->
                                <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                    data-kt-element="message-text">Ok, Understood!</div>
                                <!--end::Text-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Message(in)-->
                        <!--begin::Message(out)-->
                        <div class="d-flex justify-content-end mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-end">
                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Details-->
                                    <div class="me-3">
                                        <span class="text-muted fs-7 mb-1">2 Hours</span>
                                        <a class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1"
                                            href="#">You</a>
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/150-26.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                </div>
                                <!--end::User-->
                                <!--begin::Text-->
                                <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                    data-kt-element="message-text">You’ll receive notifications for all issues, pull
                                    requests!</div>
                                <!--end::Text-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Message(out)-->
                        <!--begin::Message(in)-->
                        <div class="d-flex justify-content-start mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-start">
                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/150-15.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-3">
                                        <a class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1"
                                            href="#">Brian Cox</a>
                                        <span class="text-muted fs-7 mb-1">3 Hours</span>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::User-->
                                <!--begin::Text-->
                                <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                    data-kt-element="message-text">You can unwatch this repository immediately by
                                    clicking here:
                                    <a href="https://keenthemes.com">Keenthemes.com</a>
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Message(in)-->
                        <!--begin::Message(out)-->
                        <div class="d-flex justify-content-end mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-end">
                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Details-->
                                    <div class="me-3">
                                        <span class="text-muted fs-7 mb-1">4 Hours</span>
                                        <a class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1"
                                            href="#">You</a>
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/150-26.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                </div>
                                <!--end::User-->
                                <!--begin::Text-->
                                <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                    data-kt-element="message-text">Most purchased Business courses during this sale!
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Message(out)-->
                        <!--begin::Message(in)-->
                        <div class="d-flex justify-content-start mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-start">
                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/150-15.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-3">
                                        <a class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1"
                                            href="#">Brian Cox</a>
                                        <span class="text-muted fs-7 mb-1">5 Hours</span>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::User-->
                                <!--begin::Text-->
                                <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                    data-kt-element="message-text">Company BBQ to celebrate the last quater
                                    achievements and goals. Food and drinks provided</div>
                                <!--end::Text-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Message(in)-->
                        <!--begin::Message(template for out)-->
                        <div class="d-flex justify-content-end mb-10 d-none" data-kt-element="template-out">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-end">
                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Details-->
                                    <div class="me-3">
                                        <span class="text-muted fs-7 mb-1">Just now</span>
                                        <a class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1"
                                            href="#">You</a>
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/150-26.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                </div>
                                <!--end::User-->
                                <!--begin::Text-->
                                <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                    data-kt-element="message-text"></div>
                                <!--end::Text-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Message(template for out)-->
                        <!--begin::Message(template for in)-->
                        <div class="d-flex justify-content-start mb-10 d-none" data-kt-element="template-in">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-start">
                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                        <img alt="Pic" src="assets/media/avatars/150-15.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-3">
                                        <a class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1"
                                            href="#">Brian Cox</a>
                                        <span class="text-muted fs-7 mb-1">Just now</span>
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::User-->
                                <!--begin::Text-->
                                <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                    data-kt-element="message-text">Right before vacation season we have the next Big
                                    Deal for you.</div>
                                <!--end::Text-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Message(template for in)-->
                    </div>
                    <!--end::Messages-->
                </div>
                <!--end::Card body-->
                <!--begin::Card footer-->
                <div class="card-footer pt-4" id="kt_drawer_chat_messenger_footer">
                    <!--begin::Input-->
                    <textarea class="form-control form-control-flush mb-3" data-kt-element="input" placeholder="Type a message"
                        rows="1"></textarea>
                    <!--end::Input-->
                    <!--begin:Toolbar-->
                    <div class="d-flex flex-stack">
                        <!--begin::Actions-->
                        <div class="d-flex align-items-center me-2">
                            <button class="btn btn-sm btn-icon btn-active-light-primary me-1"
                                data-bs-toggle="tooltip" title="Coming soon" type="button">
                                <i class="bi bi-paperclip fs-3"></i>
                            </button>
                            <button class="btn btn-sm btn-icon btn-active-light-primary me-1"
                                data-bs-toggle="tooltip" title="Coming soon" type="button">
                                <i class="bi bi-upload fs-3"></i>
                            </button>
                        </div>
                        <!--end::Actions-->
                        <!--begin::Send-->
                        <button class="btn btn-primary" data-kt-element="send" type="button">Send</button>
                        <!--end::Send-->
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Card footer-->
            </div>
            <!--end::Messenger-->
        </div>
        <!--end::Chat drawer-->
        <!--end::Drawers-->
        <!--begin::Modals-->
        <!--begin::Modal - Invite Friends-->
        <div aria-hidden="true" class="modal fade" id="kt_modal_invite_friends" tabindex="-1">
            <!--begin::Modal dialog-->
            <div class="modal-dialog mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header pb-0 border-0 justify-content-end">
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg fill="none" height="24" viewBox="0 0 24 24" width="24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect fill="black" height="2" opacity="0.5" rx="1"
                                        transform="rotate(-45 6 17.3137)" width="16" x="6"
                                        y="17.3137" />
                                    <rect fill="black" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" width="16" x="7.41422"
                                        y="6" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--begin::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                        <!--begin::Heading-->
                        <div class="text-center mb-13">
                            <!--begin::Title-->
                            <h1 class="mb-3">Invite a Friend</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <div class="text-muted fw-bold fs-5">If you need more info, please check out
                                <a class="link-primary fw-bolder" href="#">FAQ Page</a>.
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Google Contacts Invite-->
                        <div class="btn btn-light-primary fw-bolder w-100 mb-8">
                            <img alt="Logo" class="h-20px me-3"
                                src="assets/media/svg/brand-logos/google-icon.svg" />Invite Gmail Contacts
                        </div>
                        <!--end::Google Contacts Invite-->
                        <!--begin::Separator-->
                        <div class="separator d-flex flex-center mb-8">
                            <span class="text-uppercase bg-body fs-7 fw-bold text-muted px-3">or</span>
                        </div>
                        <!--end::Separator-->
                        <!--begin::Textarea-->
                        <textarea class="form-control form-control-solid mb-8" placeholder="Type or paste emails here" rows="3"></textarea>
                        <!--end::Textarea-->
                        <!--begin::Users-->
                        <div class="mb-10">
                            <!--begin::Heading-->
                            <div class="fs-6 fw-bold mb-2">Your Invitations</div>
                            <!--end::Heading-->
                            <!--begin::List-->
                            <div class="mh-300px scroll-y me-n7 pe-7">
                                <!--begin::User-->
                                <div
                                    class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="assets/media/avatars/150-1.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-5">
                                            <a class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2"
                                                href="#">Emma Smith</a>
                                            <div class="fw-bold text-muted">e.smith@kpmg.com.au</div>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Access menu-->
                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm"
                                            data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option selected="selected" value="2">Owner</option>
                                            <option value="3">Can Edit</option>
                                        </select>
                                    </div>
                                    <!--end::Access menu-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div
                                    class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-danger text-danger fw-bold">M</span>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-5">
                                            <a class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2"
                                                href="#">Melody Macy</a>
                                            <div class="fw-bold text-muted">melody@altbox.com</div>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Access menu-->
                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm"
                                            data-control="select2" data-hide-search="true">
                                            <option selected="selected" value="1">Guest</option>
                                            <option value="2">Owner</option>
                                            <option value="3">Can Edit</option>
                                        </select>
                                    </div>
                                    <!--end::Access menu-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div
                                    class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="assets/media/avatars/150-26.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-5">
                                            <a class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2"
                                                href="#">Max Smith</a>
                                            <div class="fw-bold text-muted">max@kt.com</div>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Access menu-->
                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm"
                                            data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option value="2">Owner</option>
                                            <option selected="selected" value="3">Can Edit</option>
                                        </select>
                                    </div>
                                    <!--end::Access menu-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div
                                    class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="assets/media/avatars/150-4.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-5">
                                            <a class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2"
                                                href="#">Sean Bean</a>
                                            <div class="fw-bold text-muted">sean@dellito.com</div>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Access menu-->
                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm"
                                            data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option selected="selected" value="2">Owner</option>
                                            <option value="3">Can Edit</option>
                                        </select>
                                    </div>
                                    <!--end::Access menu-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div
                                    class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="assets/media/avatars/150-15.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-5">
                                            <a class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2"
                                                href="#">Brian Cox</a>
                                            <div class="fw-bold text-muted">brian@exchange.com</div>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Access menu-->
                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm"
                                            data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option value="2">Owner</option>
                                            <option selected="selected" value="3">Can Edit</option>
                                        </select>
                                    </div>
                                    <!--end::Access menu-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div
                                    class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-warning text-warning fw-bold">M</span>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-5">
                                            <a class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2"
                                                href="#">Mikaela Collins</a>
                                            <div class="fw-bold text-muted">mikaela@pexcom.com</div>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Access menu-->
                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm"
                                            data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option selected="selected" value="2">Owner</option>
                                            <option value="3">Can Edit</option>
                                        </select>
                                    </div>
                                    <!--end::Access menu-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div
                                    class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="assets/media/avatars/150-8.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-5">
                                            <a class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2"
                                                href="#">Francis Mitcham</a>
                                            <div class="fw-bold text-muted">f.mitcham@kpmg.com.au</div>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Access menu-->
                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm"
                                            data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option value="2">Owner</option>
                                            <option selected="selected" value="3">Can Edit</option>
                                        </select>
                                    </div>
                                    <!--end::Access menu-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div
                                    class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-danger text-danger fw-bold">O</span>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-5">
                                            <a class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2"
                                                href="#">Olivia Wild</a>
                                            <div class="fw-bold text-muted">olivia@corpmail.com</div>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Access menu-->
                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm"
                                            data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option selected="selected" value="2">Owner</option>
                                            <option value="3">Can Edit</option>
                                        </select>
                                    </div>
                                    <!--end::Access menu-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div
                                    class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-primary text-primary fw-bold">N</span>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-5">
                                            <a class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2"
                                                href="#">Neil Owen</a>
                                            <div class="fw-bold text-muted">owen.neil@gmail.com</div>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Access menu-->
                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm"
                                            data-control="select2" data-hide-search="true">
                                            <option selected="selected" value="1">Guest</option>
                                            <option value="2">Owner</option>
                                            <option value="3">Can Edit</option>
                                        </select>
                                    </div>
                                    <!--end::Access menu-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div
                                    class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="assets/media/avatars/150-6.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-5">
                                            <a class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2"
                                                href="#">Dan Wilson</a>
                                            <div class="fw-bold text-muted">dam@consilting.com</div>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Access menu-->
                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm"
                                            data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option value="2">Owner</option>
                                            <option selected="selected" value="3">Can Edit</option>
                                        </select>
                                    </div>
                                    <!--end::Access menu-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div
                                    class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-danger text-danger fw-bold">E</span>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-5">
                                            <a class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2"
                                                href="#">Emma Bold</a>
                                            <div class="fw-bold text-muted">emma@intenso.com</div>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Access menu-->
                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm"
                                            data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option selected="selected" value="2">Owner</option>
                                            <option value="3">Can Edit</option>
                                        </select>
                                    </div>
                                    <!--end::Access menu-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div
                                    class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="assets/media/avatars/150-7.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-5">
                                            <a class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2"
                                                href="#">Ana Crown</a>
                                            <div class="fw-bold text-muted">ana.cf@limtel.com</div>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Access menu-->
                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm"
                                            data-control="select2" data-hide-search="true">
                                            <option selected="selected" value="1">Guest</option>
                                            <option value="2">Owner</option>
                                            <option value="3">Can Edit</option>
                                        </select>
                                    </div>
                                    <!--end::Access menu-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div
                                    class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-info text-info fw-bold">A</span>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-5">
                                            <a class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2"
                                                href="#">Robert Doe</a>
                                            <div class="fw-bold text-muted">robert@benko.com</div>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Access menu-->
                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm"
                                            data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option value="2">Owner</option>
                                            <option selected="selected" value="3">Can Edit</option>
                                        </select>
                                    </div>
                                    <!--end::Access menu-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div
                                    class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="assets/media/avatars/150-17.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-5">
                                            <a class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2"
                                                href="#">John Miller</a>
                                            <div class="fw-bold text-muted">miller@mapple.com</div>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Access menu-->
                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm"
                                            data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option value="2">Owner</option>
                                            <option selected="selected" value="3">Can Edit</option>
                                        </select>
                                    </div>
                                    <!--end::Access menu-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div
                                    class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-success text-success fw-bold">L</span>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-5">
                                            <a class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2"
                                                href="#">Lucy Kunic</a>
                                            <div class="fw-bold text-muted">lucy.m@fentech.com</div>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Access menu-->
                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm"
                                            data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option selected="selected" value="2">Owner</option>
                                            <option value="3">Can Edit</option>
                                        </select>
                                    </div>
                                    <!--end::Access menu-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div
                                    class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="assets/media/avatars/150-10.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-5">
                                            <a class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2"
                                                href="#">Ethan Wilder</a>
                                            <div class="fw-bold text-muted">ethan@loop.com.au</div>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Access menu-->
                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm"
                                            data-control="select2" data-hide-search="true">
                                            <option selected="selected" value="1">Guest</option>
                                            <option value="2">Owner</option>
                                            <option value="3">Can Edit</option>
                                        </select>
                                    </div>
                                    <!--end::Access menu-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-4">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="assets/media/avatars/150-1.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-5">
                                            <a class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2"
                                                href="#">Emma Smith</a>
                                            <div class="fw-bold text-muted">e.smith@kpmg.com.au</div>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Access menu-->
                                    <div class="ms-2 w-100px">
                                        <select class="form-select form-select-solid form-select-sm"
                                            data-control="select2" data-hide-search="true">
                                            <option value="1">Guest</option>
                                            <option value="2">Owner</option>
                                            <option selected="selected" value="3">Can Edit</option>
                                        </select>
                                    </div>
                                    <!--end::Access menu-->
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::List-->
                        </div>
                        <!--end::Users-->
                        <!--begin::Notice-->
                        <div class="d-flex flex-stack">
                            <!--begin::Label-->
                            <div class="me-5 fw-bold">
                                <label class="fs-6">Adding Users by Team Members</label>
                                <div class="fs-7 text-muted">If you need more info, please check budget planning</div>
                            </div>
                            <!--end::Label-->
                            <!--begin::Switch-->
                            <label class="form-check form-switch form-check-custom form-check-solid">
                                <input checked="checked" class="form-check-input" type="checkbox"
                                    value="1" />
                                <span class="form-check-label fw-bold text-muted">Allowed</span>
                            </label>
                            <!--end::Switch-->
                        </div>
                        <!--end::Notice-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Invite Friend-->
        <!--begin::Modal - Create App-->
        <div aria-hidden="true" class="modal fade" id="kt_modal_create_app" tabindex="-1">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-900px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2>Create App</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg fill="none" height="24" viewBox="0 0 24 24" width="24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect fill="black" height="2" opacity="0.5" rx="1"
                                        transform="rotate(-45 6 17.3137)" width="16" x="6"
                                        y="17.3137" />
                                    <rect fill="black" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" width="16" x="7.41422"
                                        y="6" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body py-lg-10 px-lg-10">
                        <!--begin::Stepper-->
                        <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid"
                            id="kt_modal_create_app_stepper">
                            <!--begin::Aside-->
                            <div
                                class="d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px">
                                <!--begin::Nav-->
                                <div class="stepper-nav ps-lg-10">
                                    <!--begin::Step 1-->
                                    <div class="stepper-item current" data-kt-stepper-element="nav">
                                        <!--begin::Line-->
                                        <div class="stepper-line w-40px"></div>
                                        <!--end::Line-->
                                        <!--begin::Icon-->
                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">1</span>
                                        </div>
                                        <!--end::Icon-->
                                        <!--begin::Label-->
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">Details</h3>
                                            <div class="stepper-desc">Name your App</div>
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Step 1-->
                                    <!--begin::Step 2-->
                                    <div class="stepper-item" data-kt-stepper-element="nav">
                                        <!--begin::Line-->
                                        <div class="stepper-line w-40px"></div>
                                        <!--end::Line-->
                                        <!--begin::Icon-->
                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">2</span>
                                        </div>
                                        <!--begin::Icon-->
                                        <!--begin::Label-->
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">Frameworks</h3>
                                            <div class="stepper-desc">Define your app framework</div>
                                        </div>
                                        <!--begin::Label-->
                                    </div>
                                    <!--end::Step 2-->
                                    <!--begin::Step 3-->
                                    <div class="stepper-item" data-kt-stepper-element="nav">
                                        <!--begin::Line-->
                                        <div class="stepper-line w-40px"></div>
                                        <!--end::Line-->
                                        <!--begin::Icon-->
                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">3</span>
                                        </div>
                                        <!--end::Icon-->
                                        <!--begin::Label-->
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">Database</h3>
                                            <div class="stepper-desc">Select the app database type</div>
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Step 3-->
                                    <!--begin::Step 4-->
                                    <div class="stepper-item" data-kt-stepper-element="nav">
                                        <!--begin::Line-->
                                        <div class="stepper-line w-40px"></div>
                                        <!--end::Line-->
                                        <!--begin::Icon-->
                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">4</span>
                                        </div>
                                        <!--end::Icon-->
                                        <!--begin::Label-->
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">Billing</h3>
                                            <div class="stepper-desc">Provide payment details</div>
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Step 4-->
                                    <!--begin::Step 5-->
                                    <div class="stepper-item" data-kt-stepper-element="nav">
                                        <!--begin::Line-->
                                        <div class="stepper-line w-40px"></div>
                                        <!--end::Line-->
                                        <!--begin::Icon-->
                                        <div class="stepper-icon w-40px h-40px">
                                            <i class="stepper-check fas fa-check"></i>
                                            <span class="stepper-number">5</span>
                                        </div>
                                        <!--end::Icon-->
                                        <!--begin::Label-->
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">Completed</h3>
                                            <div class="stepper-desc">Review and Submit</div>
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Step 5-->
                                </div>
                                <!--end::Nav-->
                            </div>
                            <!--begin::Aside-->
                            <!--begin::Content-->
                            <div class="flex-row-fluid py-lg-5 px-lg-15">
                                <!--begin::Form-->
                                <form class="form" id="kt_modal_create_app_form" novalidate="novalidate">
                                    <!--begin::Step 1-->
                                    <div class="current" data-kt-stepper-element="content">
                                        <div class="w-100">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                                    <span class="required">App Name</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                        data-bs-toggle="tooltip"
                                                        title="Specify your unique app name"></i>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-lg form-control-solid"
                                                    name="name" placeholder="" type="text"
                                                    value="" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-5 fw-bold mb-4">
                                                    <span class="required">Category</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                        data-bs-toggle="tooltip"
                                                        title="Select your app category"></i>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin:Options-->
                                                <div class="fv-row">
                                                    <!--begin:Option-->
                                                    <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                        <!--begin:Label-->
                                                        <span class="d-flex align-items-center me-2">
                                                            <!--begin:Icon-->
                                                            <span class="symbol symbol-50px me-6">
                                                                <span class="symbol-label bg-light-primary">
                                                                    <!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
                                                                    <span
                                                                        class="svg-icon svg-icon-1 svg-icon-primary">
                                                                        <svg fill="none" height="24"
                                                                            viewBox="0 0 24 24" width="24"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M18.4 5.59998C21.9 9.09998 21.9 14.8 18.4 18.3C14.9 21.8 9.2 21.8 5.7 18.3L18.4 5.59998Z"
                                                                                fill="black" opacity="0.3" />
                                                                            <path
                                                                                d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM19.9 11H13V8.8999C14.9 8.6999 16.7 8.00005 18.1 6.80005C19.1 8.00005 19.7 9.4 19.9 11ZM11 19.8999C9.7 19.6999 8.39999 19.2 7.39999 18.5C8.49999 17.7 9.7 17.2001 11 17.1001V19.8999ZM5.89999 6.90002C7.39999 8.10002 9.2 8.8 11 9V11.1001H4.10001C4.30001 9.4001 4.89999 8.00002 5.89999 6.90002ZM7.39999 5.5C8.49999 4.7 9.7 4.19998 11 4.09998V7C9.7 6.8 8.39999 6.3 7.39999 5.5ZM13 17.1001C14.3 17.3001 15.6 17.8 16.6 18.5C15.5 19.3 14.3 19.7999 13 19.8999V17.1001ZM13 4.09998C14.3 4.29998 15.6 4.8 16.6 5.5C15.5 6.3 14.3 6.80002 13 6.90002V4.09998ZM4.10001 13H11V15.1001C9.1 15.3001 7.29999 16 5.89999 17.2C4.89999 16 4.30001 14.6 4.10001 13ZM18.1 17.1001C16.6 15.9001 14.8 15.2 13 15V12.8999H19.9C19.7 14.5999 19.1 16.0001 18.1 17.1001Z"
                                                                                fill="black" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </span>
                                                            <!--end:Icon-->
                                                            <!--begin:Info-->
                                                            <span class="d-flex flex-column">
                                                                <span class="fw-bolder fs-6">Quick Online
                                                                    Courses</span>
                                                                <span class="fs-7 text-muted">Creating a clear text
                                                                    structure is just one SEO</span>
                                                            </span>
                                                            <!--end:Info-->
                                                        </span>
                                                        <!--end:Label-->
                                                        <!--begin:Input-->
                                                        <span class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input" name="category"
                                                                type="radio" value="1" />
                                                        </span>
                                                        <!--end:Input-->
                                                    </label>
                                                    <!--end::Option-->
                                                    <!--begin:Option-->
                                                    <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                        <!--begin:Label-->
                                                        <span class="d-flex align-items-center me-2">
                                                            <!--begin:Icon-->
                                                            <span class="symbol symbol-50px me-6">
                                                                <span class="symbol-label bg-light-danger">
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                                                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                                                                        <svg height="24px" viewBox="0 0 24 24"
                                                                            width="24px"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <g fill-rule="evenodd" fill="none"
                                                                                stroke-width="1" stroke="none">
                                                                                <rect fill="#000000" height="5"
                                                                                    rx="1" width="5"
                                                                                    x="5" y="5" />
                                                                                <rect fill="#000000" height="5"
                                                                                    opacity="0.3" rx="1"
                                                                                    width="5" x="14"
                                                                                    y="5" />
                                                                                <rect fill="#000000" height="5"
                                                                                    opacity="0.3" rx="1"
                                                                                    width="5" x="5"
                                                                                    y="14" />
                                                                                <rect fill="#000000" height="5"
                                                                                    opacity="0.3" rx="1"
                                                                                    width="5" x="14"
                                                                                    y="14" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </span>
                                                            <!--end:Icon-->
                                                            <!--begin:Info-->
                                                            <span class="d-flex flex-column">
                                                                <span class="fw-bolder fs-6">Face to Face
                                                                    Discussions</span>
                                                                <span class="fs-7 text-muted">Creating a clear text
                                                                    structure is just one aspect</span>
                                                            </span>
                                                            <!--end:Info-->
                                                        </span>
                                                        <!--end:Label-->
                                                        <!--begin:Input-->
                                                        <span class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input" name="category"
                                                                type="radio" value="2" />
                                                        </span>
                                                        <!--end:Input-->
                                                    </label>
                                                    <!--end::Option-->
                                                    <!--begin:Option-->
                                                    <label class="d-flex flex-stack cursor-pointer">
                                                        <!--begin:Label-->
                                                        <span class="d-flex align-items-center me-2">
                                                            <!--begin:Icon-->
                                                            <span class="symbol symbol-50px me-6">
                                                                <span class="symbol-label bg-light-success">
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen013.svg-->
                                                                    <span
                                                                        class="svg-icon svg-icon-1 svg-icon-success">
                                                                        <svg fill="none" height="24"
                                                                            viewBox="0 0 24 24" width="24"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M20.9 12.9C20.3 12.9 19.9 12.5 19.9 11.9C19.9 11.3 20.3 10.9 20.9 10.9H21.8C21.3 6.2 17.6 2.4 12.9 2V2.9C12.9 3.5 12.5 3.9 11.9 3.9C11.3 3.9 10.9 3.5 10.9 2.9V2C6.19999 2.5 2.4 6.2 2 10.9H2.89999C3.49999 10.9 3.89999 11.3 3.89999 11.9C3.89999 12.5 3.49999 12.9 2.89999 12.9H2C2.5 17.6 6.19999 21.4 10.9 21.8V20.9C10.9 20.3 11.3 19.9 11.9 19.9C12.5 19.9 12.9 20.3 12.9 20.9V21.8C17.6 21.3 21.4 17.6 21.8 12.9H20.9Z"
                                                                                fill="black" opacity="0.3" />
                                                                            <path
                                                                                d="M16.9 10.9H13.6C13.4 10.6 13.2 10.4 12.9 10.2V5.90002C12.9 5.30002 12.5 4.90002 11.9 4.90002C11.3 4.90002 10.9 5.30002 10.9 5.90002V10.2C10.6 10.4 10.4 10.6 10.2 10.9H9.89999C9.29999 10.9 8.89999 11.3 8.89999 11.9C8.89999 12.5 9.29999 12.9 9.89999 12.9H10.2C10.4 13.2 10.6 13.4 10.9 13.6V13.9C10.9 14.5 11.3 14.9 11.9 14.9C12.5 14.9 12.9 14.5 12.9 13.9V13.6C13.2 13.4 13.4 13.2 13.6 12.9H16.9C17.5 12.9 17.9 12.5 17.9 11.9C17.9 11.3 17.5 10.9 16.9 10.9Z"
                                                                                fill="black" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </span>
                                                            <!--end:Icon-->
                                                            <!--begin:Info-->
                                                            <span class="d-flex flex-column">
                                                                <span class="fw-bolder fs-6">Full Intro
                                                                    Training</span>
                                                                <span class="fs-7 text-muted">Creating a clear text
                                                                    structure copywriting</span>
                                                            </span>
                                                            <!--end:Info-->
                                                        </span>
                                                        <!--end:Label-->
                                                        <!--begin:Input-->
                                                        <span class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input" name="category"
                                                                type="radio" value="3" />
                                                        </span>
                                                        <!--end:Input-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end:Options-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    </div>
                                    <!--end::Step 1-->
                                    <!--begin::Step 2-->
                                    <div data-kt-stepper-element="content">
                                        <div class="w-100">
                                            <!--begin::Input group-->
                                            <div class="fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-5 fw-bold mb-4">
                                                    <span class="required">Select Framework</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                        data-bs-toggle="tooltip"
                                                        title="Specify your apps framework"></i>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin:Option-->
                                                <label class="d-flex flex-stack cursor-pointer mb-5">
                                                    <!--begin:Label-->
                                                    <span class="d-flex align-items-center me-2">
                                                        <!--begin:Icon-->
                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label bg-light-warning">
                                                                <i class="fab fa-html5 text-warning fs-2x"></i>
                                                            </span>
                                                        </span>
                                                        <!--end:Icon-->
                                                        <!--begin:Info-->
                                                        <span class="d-flex flex-column">
                                                            <span class="fw-bolder fs-6">HTML5</span>
                                                            <span class="fs-7 text-muted">Base Web Projec</span>
                                                        </span>
                                                        <!--end:Info-->
                                                    </span>
                                                    <!--end:Label-->
                                                    <!--begin:Input-->
                                                    <span class="form-check form-check-custom form-check-solid">
                                                        <input checked="checked" class="form-check-input"
                                                            name="framework" type="radio" value="1" />
                                                    </span>
                                                    <!--end:Input-->
                                                </label>
                                                <!--end::Option-->
                                                <!--begin:Option-->
                                                <label class="d-flex flex-stack cursor-pointer mb-5">
                                                    <!--begin:Label-->
                                                    <span class="d-flex align-items-center me-2">
                                                        <!--begin:Icon-->
                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label bg-light-success">
                                                                <i class="fab fa-react text-success fs-2x"></i>
                                                            </span>
                                                        </span>
                                                        <!--end:Icon-->
                                                        <!--begin:Info-->
                                                        <span class="d-flex flex-column">
                                                            <span class="fw-bolder fs-6">ReactJS</span>
                                                            <span class="fs-7 text-muted">Robust and flexible app
                                                                framework</span>
                                                        </span>
                                                        <!--end:Info-->
                                                    </span>
                                                    <!--end:Label-->
                                                    <!--begin:Input-->
                                                    <span class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" name="framework"
                                                            type="radio" value="2" />
                                                    </span>
                                                    <!--end:Input-->
                                                </label>
                                                <!--end::Option-->
                                                <!--begin:Option-->
                                                <label class="d-flex flex-stack cursor-pointer mb-5">
                                                    <!--begin:Label-->
                                                    <span class="d-flex align-items-center me-2">
                                                        <!--begin:Icon-->
                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label bg-light-danger">
                                                                <i class="fab fa-angular text-danger fs-2x"></i>
                                                            </span>
                                                        </span>
                                                        <!--end:Icon-->
                                                        <!--begin:Info-->
                                                        <span class="d-flex flex-column">
                                                            <span class="fw-bolder fs-6">Angular</span>
                                                            <span class="fs-7 text-muted">Powerful data
                                                                mangement</span>
                                                        </span>
                                                        <!--end:Info-->
                                                    </span>
                                                    <!--end:Label-->
                                                    <!--begin:Input-->
                                                    <span class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" name="framework"
                                                            type="radio" value="3" />
                                                    </span>
                                                    <!--end:Input-->
                                                </label>
                                                <!--end::Option-->
                                                <!--begin:Option-->
                                                <label class="d-flex flex-stack cursor-pointer">
                                                    <!--begin:Label-->
                                                    <span class="d-flex align-items-center me-2">
                                                        <!--begin:Icon-->
                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label bg-light-primary">
                                                                <i class="fab fa-vuejs text-primary fs-2x"></i>
                                                            </span>
                                                        </span>
                                                        <!--end:Icon-->
                                                        <!--begin:Info-->
                                                        <span class="d-flex flex-column">
                                                            <span class="fw-bolder fs-6">Vue</span>
                                                            <span class="fs-7 text-muted">Lightweight and responsive
                                                                framework</span>
                                                        </span>
                                                        <!--end:Info-->
                                                    </span>
                                                    <!--end:Label-->
                                                    <!--begin:Input-->
                                                    <span class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" name="framework"
                                                            type="radio" value="4" />
                                                    </span>
                                                    <!--end:Input-->
                                                </label>
                                                <!--end::Option-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    </div>
                                    <!--end::Step 2-->
                                    <!--begin::Step 3-->
                                    <div data-kt-stepper-element="content">
                                        <div class="w-100">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <!--begin::Label-->
                                                <label class="required fs-5 fw-bold mb-2">Database Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-lg form-control-solid"
                                                    name="dbname" placeholder="" type="text"
                                                    value="master_db" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-5 fw-bold mb-4">
                                                    <span class="required">Select Database Engine</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                        data-bs-toggle="tooltip"
                                                        title="Select your app database engine"></i>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin:Option-->
                                                <label class="d-flex flex-stack cursor-pointer mb-5">
                                                    <!--begin::Label-->
                                                    <span class="d-flex align-items-center me-2">
                                                        <!--begin::Icon-->
                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label bg-light-success">
                                                                <i class="fas fa-database text-success fs-2x"></i>
                                                            </span>
                                                        </span>
                                                        <!--end::Icon-->
                                                        <!--begin::Info-->
                                                        <span class="d-flex flex-column">
                                                            <span class="fw-bolder fs-6">MySQL</span>
                                                            <span class="fs-7 text-muted">Basic MySQL database</span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </span>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <span class="form-check form-check-custom form-check-solid">
                                                        <input checked="checked" class="form-check-input"
                                                            name="dbengine" type="radio" value="1" />
                                                    </span>
                                                    <!--end::Input-->
                                                </label>
                                                <!--end::Option-->
                                                <!--begin:Option-->
                                                <label class="d-flex flex-stack cursor-pointer mb-5">
                                                    <!--begin::Label-->
                                                    <span class="d-flex align-items-center me-2">
                                                        <!--begin::Icon-->
                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label bg-light-danger">
                                                                <i class="fab fa-google text-danger fs-2x"></i>
                                                            </span>
                                                        </span>
                                                        <!--end::Icon-->
                                                        <!--begin::Info-->
                                                        <span class="d-flex flex-column">
                                                            <span class="fw-bolder fs-6">Firebase</span>
                                                            <span class="fs-7 text-muted">Google based app data
                                                                management</span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </span>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <span class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" name="dbengine"
                                                            type="radio" value="2" />
                                                    </span>
                                                    <!--end::Input-->
                                                </label>
                                                <!--end::Option-->
                                                <!--begin:Option-->
                                                <label class="d-flex flex-stack cursor-pointer">
                                                    <!--begin::Label-->
                                                    <span class="d-flex align-items-center me-2">
                                                        <!--begin::Icon-->
                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label bg-light-warning">
                                                                <i class="fab fa-amazon text-warning fs-2x"></i>
                                                            </span>
                                                        </span>
                                                        <!--end::Icon-->
                                                        <!--begin::Info-->
                                                        <span class="d-flex flex-column">
                                                            <span class="fw-bolder fs-6">DynamoDB</span>
                                                            <span class="fs-7 text-muted">Amazon Fast NoSQL
                                                                Database</span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </span>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <span class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" name="dbengine"
                                                            type="radio" value="3" />
                                                    </span>
                                                    <!--end::Input-->
                                                </label>
                                                <!--end::Option-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    </div>
                                    <!--end::Step 3-->
                                    <!--begin::Step 4-->
                                    <div data-kt-stepper-element="content">
                                        <div class="w-100">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column mb-7 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                    <span class="required">Name On Card</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                        data-bs-toggle="tooltip"
                                                        title="Specify a card holder's name"></i>
                                                </label>
                                                <!--end::Label-->
                                                <input class="form-control form-control-solid" name="card_name"
                                                    placeholder="" type="text" value="Max Doe" />
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column mb-7 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-6 fw-bold form-label mb-2">Card
                                                    Number</label>
                                                <!--end::Label-->
                                                <!--begin::Input wrapper-->
                                                <div class="position-relative">
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid"
                                                        name="card_number" placeholder="Enter card number"
                                                        type="text" value="4111 1111 1111 1111" />
                                                    <!--end::Input-->
                                                    <!--begin::Card logos-->
                                                    <div
                                                        class="position-absolute translate-middle-y top-50 end-0 me-5">
                                                        <img alt="" class="h-25px"
                                                            src="assets/media/svg/card-logos/visa.svg" />
                                                        <img alt="" class="h-25px"
                                                            src="assets/media/svg/card-logos/mastercard.svg" />
                                                        <img alt="" class="h-25px"
                                                            src="assets/media/svg/card-logos/american-express.svg" />
                                                    </div>
                                                    <!--end::Card logos-->
                                                </div>
                                                <!--end::Input wrapper-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="row mb-10">
                                                <!--begin::Col-->
                                                <div class="col-md-8 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required fs-6 fw-bold form-label mb-2">Expiration
                                                        Date</label>
                                                    <!--end::Label-->
                                                    <!--begin::Row-->
                                                    <div class="row fv-row">
                                                        <!--begin::Col-->
                                                        <div class="col-6">
                                                            <select class="form-select form-select-solid"
                                                                data-control="select2" data-hide-search="true"
                                                                data-placeholder="Month" name="card_expiry_month">
                                                                <option></option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                                <option value="7">7</option>
                                                                <option value="8">8</option>
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                            </select>
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="col-6">
                                                            <select class="form-select form-select-solid"
                                                                data-control="select2" data-hide-search="true"
                                                                data-placeholder="Year" name="card_expiry_year">
                                                                <option></option>
                                                                <option value="2021">2021</option>
                                                                <option value="2022">2022</option>
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                                                <option value="2025">2025</option>
                                                                <option value="2026">2026</option>
                                                                <option value="2027">2027</option>
                                                                <option value="2028">2028</option>
                                                                <option value="2029">2029</option>
                                                                <option value="2030">2030</option>
                                                                <option value="2031">2031</option>
                                                            </select>
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Row-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-md-4 fv-row">
                                                    <!--begin::Label-->
                                                    <label
                                                        class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                        <span class="required">CVV</span>
                                                        <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                            data-bs-toggle="tooltip"
                                                            title="Enter a card CVV code"></i>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input wrapper-->
                                                    <div class="position-relative">
                                                        <!--begin::Input-->
                                                        <input class="form-control form-control-solid"
                                                            maxlength="4" minlength="3" name="card_cvv"
                                                            placeholder="CVV" type="text" />
                                                        <!--end::Input-->
                                                        <!--begin::CVV icon-->
                                                        <div
                                                            class="position-absolute translate-middle-y top-50 end-0 me-3">
                                                            <!--begin::Svg Icon | path: icons/duotune/finance/fin002.svg-->
                                                            <span class="svg-icon svg-icon-2hx">
                                                                <svg fill="none" height="24"
                                                                    viewBox="0 0 24 24" width="24"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M22 7H2V11H22V7Z" fill="black" />
                                                                    <path
                                                                        d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z"
                                                                        fill="black" opacity="0.3" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                        <!--end::CVV icon-->
                                                    </div>
                                                    <!--end::Input wrapper-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-stack">
                                                <!--begin::Label-->
                                                <div class="me-5">
                                                    <label class="fs-6 fw-bold form-label">Save Card for further
                                                        billing?</label>
                                                    <div class="fs-7 fw-bold text-muted">If you need more info, please
                                                        check budget planning</div>
                                                </div>
                                                <!--end::Label-->
                                                <!--begin::Switch-->
                                                <label
                                                    class="form-check form-switch form-check-custom form-check-solid">
                                                    <input checked="checked" class="form-check-input"
                                                        type="checkbox" value="1" />
                                                    <span class="form-check-label fw-bold text-muted">Save Card</span>
                                                </label>
                                                <!--end::Switch-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    </div>
                                    <!--end::Step 4-->
                                    <!--begin::Step 5-->
                                    <div data-kt-stepper-element="content">
                                        <div class="w-100 text-center">
                                            <!--begin::Heading-->
                                            <h1 class="fw-bolder text-dark mb-3">Release!</h1>
                                            <!--end::Heading-->
                                            <!--begin::Description-->
                                            <div class="text-muted fw-bold fs-3">Submit your app to kickstart your
                                                project.</div>
                                            <!--end::Description-->
                                            <!--begin::Illustration-->
                                            <div class="text-center px-4 py-15">
                                                <img alt="" class="w-100 mh-300px"
                                                    src="assets/media/illustrations/sigma-1/9.png" />
                                            </div>
                                            <!--end::Illustration-->
                                        </div>
                                    </div>
                                    <!--end::Step 5-->
                                    <!--begin::Actions-->
                                    <div class="d-flex flex-stack pt-10">
                                        <!--begin::Wrapper-->
                                        <div class="me-2">
                                            <button class="btn btn-lg btn-light-primary me-3"
                                                data-kt-stepper-action="previous" type="button">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                                                <span class="svg-icon svg-icon-3 me-1">
                                                    <svg fill="none" height="24" viewBox="0 0 24 24"
                                                        width="24" xmlns="http://www.w3.org/2000/svg">
                                                        <rect fill="black" height="2" opacity="0.5"
                                                            rx="1" width="13" x="6"
                                                            y="11" />
                                                        <path
                                                            d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->Back
                                            </button>
                                        </div>
                                        <!--end::Wrapper-->
                                        <!--begin::Wrapper-->
                                        <div>
                                            <button class="btn btn-lg btn-primary" data-kt-stepper-action="submit"
                                                type="button">
                                                <span class="indicator-label">Submit
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                    <span class="svg-icon svg-icon-3 ms-2 me-0">
                                                        <svg fill="none" height="24" viewBox="0 0 24 24"
                                                            width="24" xmlns="http://www.w3.org/2000/svg">
                                                            <rect fill="black" height="2" opacity="0.5"
                                                                rx="1" transform="rotate(-180 18 13)"
                                                                width="13" x="18" y="13" />
                                                            <path
                                                                d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                                fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <span class="indicator-progress">Please wait...
                                                    <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                            <button class="btn btn-lg btn-primary" data-kt-stepper-action="next"
                                                type="button">Continue
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                <span class="svg-icon svg-icon-3 ms-1 me-0">
                                                    <svg fill="none" height="24" viewBox="0 0 24 24"
                                                        width="24" xmlns="http://www.w3.org/2000/svg">
                                                        <rect fill="black" height="2" opacity="0.5"
                                                            rx="1" transform="rotate(-180 18 13)"
                                                            width="13" x="18" y="13" />
                                                        <path
                                                            d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
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
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Create App-->
        <!--begin::Modal - Select Location-->
        <div aria-hidden="true" class="modal fade" id="kt_modal_select_location" tabindex="-1">
            <!--begin::Modal dialog-->
            <div class="modal-dialog mw-1000px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Title-->
                        <h2>Select Location</h2>
                        <!--end::Title-->
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg fill="none" height="24" viewBox="0 0 24 24" width="24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect fill="black" height="2" opacity="0.5" rx="1"
                                        transform="rotate(-45 6 17.3137)" width="16" x="6"
                                        y="17.3137" />
                                    <rect fill="black" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" width="16" x="7.41422"
                                        y="6" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body">
                        <div class="w-100 rounded" id="kt_modal_select_location_map" style="height:450px"></div>
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer d-flex justify-content-end">
                        <a class="btn btn-active-light me-5" data-bs-dismiss="modal" href="#">Cancel</a>
                        <button class="btn btn-primary" data-bs-dismiss="modal"
                            id="kt_modal_select_location_button" type="button">Apply</button>
                    </div>
                    <!--end::Modal footer-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Select Location-->
        <!--end::Modals-->
        <!--begin::Scrolltop-->
        <div class="scrolltop" data-kt-scrolltop="true" id="kt_scrolltop">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
            <span class="svg-icon">
                <svg fill="none" height="24" viewBox="0 0 24 24" width="24"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect fill="black" height="2" opacity="0.5" rx="1"
                        transform="rotate(90 13 6)" width="13" x="13" y="6" />
                    <path
                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                        fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>

        </div>
        <!--end::Modal dialog-->
        </div>
        <script>
            function goback() {
                event.preventDefault()
                history.back()
            }
        </script>
        <script>
            var hostUrl = "assets/";
        </script>
        <!--begin::Javascript-->
        <!--begin::Global Javascript Bundle(used by all pages)-->
        <script src="https://stockmgt.gapaautoparts.com/public/assets/plugins/global/plugins.bundle.js"></script>
        <script src="https://stockmgt.gapaautoparts.com/public/assets/js/scripts.bundle.js"></script>
        <!--end::Global Javascript Bundle-->
        <!--begin::Page Custom Javascript(used by this page)-->
        <script src="https://stockmgt.gapaautoparts.com/public/assets/js/custom/authentication/sign-in/general.js"></script>
        <!--end::Page Custom Javascript-->
        <!--end::Javascript-->

        <script src="https://stockmgt.gapaautoparts.com/public/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js">
        </script>
        <!--end::Page Vendors Javascript-->
        <!--begin::Page Custom Javascript(used by this page)-->
        <script src="https://stockmgt.gapaautoparts.com/public/assets/js/custom/widgets.js"></script>
        <script src="https://stockmgt.gapaautoparts.com/public/assets/js/custom/apps/chat/chat.js"></script>
        <script src="https://stockmgt.gapaautoparts.com/public/assets/js/custom/modals/create-app.js"></script>
        <script src="https://stockmgt.gapaautoparts.com/public/assets/js/custom/modals/upgrade-plan.js"></script>

        <script src="https://stockmgt.gapaautoparts.com/public/assets/plugins/custom/datatables/datatables.bundle.js"></script>
        <!--end::Page Vendors Javascript-->
        <!--begin::Page Custom Javascript(used by this page)-->
        <script src="https://stockmgt.gapaautoparts.com/public/assets/js/custom/pages/projects/project/project.js"></script>
        <script src="https://stockmgt.gapaautoparts.com/public/assets/js/custom/modals/users-search.js"></script>
        <script src="https://stockmgt.gapaautoparts.com/public/assets/js/custom/modals/new-target.js"></script>

        <script>
            function getData() {

                let faq = document.getElementById('editor_1').innerHTML;

                $.post('/update_faq', {

                    faq: faq,
                    "_token": "{{ csrf_token() }}",

                }).done((result) => {

                    Swal.fire("", result.message)
                    console.log(result.message)

                }).fail(() => {
                    Swal.fire("", "Sorry cant not find this product")
                })
            }



            function UpdatePolicy() {
                let aboutus = document.getElementById('editor_1').innerHTML;
                let teams = document.getElementById('editor_2').innerHTML;
                let policy = document.getElementById('editor').innerHTML;

                //update_website

                $.post('/update_website', {

                    about: aboutus,
                    terms: teams,
                    policy: policy,


                    "_token": "{{ csrf_token() }}",

                }).done((result) => {
                    Swal.fire("", result)


                }).fail(() => {
                    Swal.fire("", "Sorry cant not find any record")
                })


            }
        </script>

        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

        <!-- Initialize Quill editor -->
        <script>
            var quill = new Quill('#editor', {
                theme: 'snow'
            });

            var quill2 = new Quill('#editor_2', {
                theme: 'snow'
            });

            var quill1 = new Quill('#editor_1', {
                theme: 'snow'
            });



            var quill = new Quill('#editor_3', {
                theme: 'snow'
            });

            var quill2 = new Quill('#editor_4', {
                theme: 'snow'
            });

            var quill1 = new Quill('#editor_5', {
                theme: 'snow'
            });
        </script>



        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        </script>




        {{-- Script for Exporting Data --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.4/xlsx.full.min.js"></script>

        {{-- Ckeditor --}}
        <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('editor_ck1');
            CKEDITOR.replace('editor_ck2');
            CKEDITOR.replace('editor_ck3');
        </script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
        <script type="text/javascript">
            $(function() {
                $("#table").DataTable();
                // this is need to Move Ordera accordin user wish Arrangement
                $("#tablecontents").sortable({
                    items: "tr",
                    cursor: 'move',
                    opacity: 0.6,
                    update: function() {
                        sendOrderToServer();
                    }
                });

                function sendOrderToServer() {
                    var order = [];
                    var token = $('meta[name="csrf-token"]').attr('content');
                    //   by this function User can Update hisOrders or Move to top or under
                    $('tr.row1').each(function(index, element) {
                        order.push({
                            id: $(this).attr('data-id'),
                            position: index + 1
                        });
                    });
                    // the Ajax Post update 
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{ url('Custom-sortable') }}",
                        data: {
                            order: order,
                            _token: token
                        },
                        success: function(response) {
                            if (response.status == "success") {
                                console.log(response);
                            } else {
                                console.log(response);
                            }
                        }
                    });
                }
            });
        </script>

    </body>

</html>


<!----- model for adding data---------->
<div class="modal fade" id="updateBaggage" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>updateBaggage</h2>

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
                        <form class="form" novalidate="novalidate" id="kt_modal_create_app_form"
                            enctype="multipart/form-data" action="{{ route('updateBaggage', ['id' => 1]) }}"
                            method="POST">
                            @csrf
                            @method('put')
                            <!--begin::Step 1-->
                            <input type="hidden" name="id" value="1">

                            @php
                                $data = DB::table('baggage')
                                    ->where('id', '1')
                                    ->first();
                            @endphp
                            <div class="row">
                                <div class="w-100">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                            <span class="required">KG</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                title="Specify your unique app name"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" min="1"
                                            class="form-control form-control-lg form-control-solid" name="kg"
                                            placeholder="" disabled value="{{ $data->kg ?? 1 }}" required />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>

                            <div class="row">
                                <div class="w-100">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-5 fw-bold mb-2">
                                            <span class="required">Price</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                title="Specify your unique app name"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" min="100"
                                            class="form-control form-control-lg form-control-solid" name="price"
                                            value="{{ $data->price ?? '' }}" placeholder="" required />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->

                                </div>
                            </div>

                            <button type="submit" class="btn btn-lg btn-primary">Update
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                <span class="svg-icon svg-icon-3 ms-1 me-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="18" y="13" width="13"
                                            height="2" rx="1" transform="rotate(-180 18 13)"
                                            fill="black" />
                                        <path
                                            d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </button>
                        </form>
                        <!--end::Form-->
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
