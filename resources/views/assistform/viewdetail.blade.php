@extends('layouts.app', ['title' => 'Manage Park Sport'])

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

<div class="card card-flush p-5">
    <!--begin::Card body-->
    <div class="row">
        <div class="col-md-6">
            <div class="tab-content">
               < <p>Full name: <span class="item"> {{$data->fullname}}</span></p>
                <p>phone: <span class="item"> {{$data->phone}}</span></p>
                <p>email: <span class="item"> {{$data->email}}</span></p>
                <p>seat_type: <span class="item"> {{$data->seat_type}}</span></p>
                <p>assistance: <span class="item"> {{$data->assistance}}</span></p>
                <p>wheelchair: <span class="item"> {{$data->wheelchair}}</span></p>
                <p>disability_ass: <span class="item"> {{$data->disability_ass}}</span></p>
                <p>amount: <span class="item"> {{$data->amount}}</span></p>
                <p>Status: <span class="item"> {{$data->is_paid}}</span></p>
            </div>
        </div>
    </div>
</div>


@endsection
