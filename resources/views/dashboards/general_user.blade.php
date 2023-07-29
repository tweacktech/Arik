@extends('layouts.admin', ['title' => 'User Accounts'])
                
@section('content')


<div class="content-body">
    <div class="container-fluid">

         <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <!-- <span>Activities</span> -->
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Staff</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Activities</a></li>
                        </ol>
                    </div>
                </div>

                    <div class="row">
                        <div class=" col-md-4 col-sm-6">
                            <div class="card overflow-hidden">
                                <div type="button" class="card-body d-flex align-items-center justify-content-around"
                                    data-toggle="modal" data-target=".bd-example-modal-lg">

                                    <div class="p-md-3">
                                        <img class="img-fluid" src="{{ asset('public/images/airplane-ticket.png') }}"
                                            alt="">
                                    </div>

                                    <h2 id="count" class="text-primary ms-lg-2 mb-0 mt-3 me-5 me-md-0  display-5">30</h2>
                                </div>
                                
                                <button class="btn-primary" data-toggle="modal" data-target="#loginModal">
                                Adhoc Group Request</button>
                            </div>
                        </div>  
                        <div class=" col-md-4 col-sm-6">
                            <div class="card overflow-hidden">
                                <div class="card-body d-flex align-items-center justify-content-around">
                                    {{-- <div class="row">
                                        <div class="col"> --}}
                                    <div class="p-md-3">
                                        <a href="">
                                            <img class="img-fluid" src="{{ asset('public/images/viewrequest.png') }}"
                                                alt="">
                                        </a>
                                    </div>
                                     <h2 id="count" class="text-primary ms-lg-2 mb-0 mt-3 me-5 me-md-0  display-5">30</h2>
                                    {{-- </div>
                                    </div> --}}
                                </div>
                                <p class="text-center mt-md-n4">View Request</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="card overflow-hidden">
                                <div href="" data-toggle="modal" {{-- data-target="#exampleModalCenter"> --}} <div type="button"
                                    class="card-body d-flex align-items-center justify-content-around data-toggle="modal"
                                    data-target="#paymentModal">
                                    <div class="p-md-3">
                                        <img class="img-fluid" src="{{ asset('public/images/cashless-payment .png') }}"
                                            alt="">
                                    </div>
                                     <h2 id="count" class="text-primary ms-lg-2 mb-0 mt-3 me-5 me-md-0  display-5">30</h2>
                                </div>
                                <p class="text-center mt-md-n4">Make Payment</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="card overflow-hidden">
                                <div type="button" class="card-body d-flex align-items-center justify-content-around"
                                    data-toggle="modal" data-target="#addModal">
                                    <div class="p-md-3 col-8">
                                        <img class="img-fluid" src="{{ asset('public/images/add-friend.png') }}" alt="">
                                    </div>
                                </div>
                                <p class="text-center mt-md-n4">Add Guest</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="card overflow-hidden">
                                <div class="card-body d-flex align-items-center justify-content-around">
                                    {{-- <div class="row">
                                        <div class="col"> --}}
                                    <div class="p-md-3 col-8">
                                        <a href="{{url('group')}}">
                                            <img class="img-fluid" src="{{ asset('public/images/viewbooking.png') }}"
                                                alt="">
                                        </a>
                                    </div>
                                    {{-- </div>
                                    </div> --}}
                                </div>
                                <p class="text-center mt-md-n4">View Booking</p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-6">
                            <div class="card overflow-hidden">
                                <div class="card-body d-flex align-items-center justify-content-">
                                    {{-- <div class="row">
                                        <div class="col"> --}}
                                    <div class="p-md-3 col-8">
                                        <a href="">
                                            <img class="img-fluid" src="{{ asset('public/images/help-desk 1.png') }}"
                                                alt="">
                                        </a>
                                    </div>
                                    {{-- <p class="text-primary ms-lg-2 mb-0 mt-3 me-5 me-md-0  display-5">17</p> --}}
                                    {{-- </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>



<div class="modal fade bd-example-modal-lg" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
            aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Flight Schedule</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Login Form -->
                        <form method="POST" action="{{ route('booking.store') }}">
        @csrf

        <div>
            <label for="customer_id">Flight ID:</label>
            <input type="number" min="1" name="flight_id" id="customer_id" required>
        </div>

         <div>
            <label for="customer_id">Customer ID:</label>
            <input type="number" min="1" name="customer_id" id="customer_id" required>
        </div>

        <div>
            <label for="company_id">Company ID:</label>
            <input type="hidden" value="1" min="1" name="company_id" id="company_id" required>
        </div>

        <div>
            <label for="group_name">Group Name:</label>
            <input type="text" name="group_name" id="group_name" required>
        </div>

        <div>
            <label for="trip_type">Trip Type:</label>
            <input type="text" name="trip_type" id="trip_type" required>
        </div>

        <div>
            <label for="departure_date">Departure Date:</label>
            <input type="date" name="departure_date" id="departure_date" required>
        </div>

        <div>
            <label for="return_date">Return Date:</label>
            <input type="date" name="return_date" id="return_date" required>
        </div>

        <div>
            <label for="message">Message:</label>
            <textarea name="message" id="message"></textarea>
        </div>

        <div>
            <label for="group_size">Group Size:</label>
            <input type="number" name="group_size" id="group_size" required>
        </div>

        <div>
            <label for="emails">Emails:</label>
            <input type="text" name="emails" required>
            <!-- Add more input fields for emails if needed -->
        </div>

        <div>
            <label for="booking_number">Booking Number:</label>
            <input type="text" name="booking_number" id="booking_number" required>
        </div>

        <button type="submit">Create Booking</button>
    </form>
                        <!-- Login Form -->                        
                    </div>
        </div>
    </div>
</div>

@endsection


