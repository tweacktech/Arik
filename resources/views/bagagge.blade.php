@extends('layouts.app', ['title' => 'Edit Footer Quick Box'])

@section('content')

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

  <div class="content-body">
            <div class="container-fluid">         
                  


                <div class="row justify-content-center">

                    <div class="col-lg-10 p-3">
                        <a style="position:fixed; background:#00659D; top:400px; left:30px; border-radius:50%; padding:20px;"
                            class=" shadow text-light fs-3" href="">
                            < </a>
                                <div class="card">
                                    <div class="text-end p-2">
                                        <a href="javascript:history.back()" class="btn btn-primary">Back</a>
                                    </div>
                                    <div class="card-header py-4">
                                        <!-- <b class="fs-3"> AMOUNT: </b> -->
                                    </div>

                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-lg-6">

                                  <form id="paymentForm">
                                <label for="name">Number of kg:</label>
                                <input type="number" min="1" id="kg" class="form-control" name="kg"   required>
                                <br>
                                <label for="email-address">Email Address:</label>
                              
                                <input type="email" id="email-address" class="form-control" name="email-address"  required>
                                <br>
                                <label for="amount">Amount:</label>
                                <input type="number" min="100" id="amount" class="form-control"  name="amount" required>
                                <br>

                                <input type="text" id="name" placeholder="Name">
                                <input type="text" id="phone" placeholder="Phone number">
                                <input type="text" id="ticketNumber" placeholder="Ticket Number">
                                

                               <button class="btn btn-secondary btn-lg" type="submit"    onclick="payWithPaystack()"> PAY WIHT PAYSTACK </button>
                              
                                </form>


                                            </div>
                                        

                                        </div>
                                    </div>

                                </div>
                    </div>


                </div>
            </div>
            </div>


    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    const paymentForm = document.getElementById('paymentForm');

    paymentForm.addEventListener("submit", payWithPaystack, false);

    function payWithPaystack(e) {
        e.preventDefault();

        const kg = document.getElementById("kg").value;
        const name = document.getElementById("name").value; // Get Name field value
        const phone = document.getElementById("phone").value; // Get Phone number field value
        const ticketNumber = document.getElementById("ticketNumber").value; // Get Ticket Number field value
        const email = document.getElementById("email-address").value;
        const amount = document.getElementById("amount").value;

        // Parse the amount as a float and multiply by 100 to convert to the smallest currency unit (kobo)
        const amountInKobo = parseFloat(amount) * 100;

        let handler = PaystackPop.setup({
            key: 'pk_test_7ce279d181176a0c0af488855daf72c19ca5ff8e', // Replace with your public key
            email: email,
            amount: amountInKobo,
            ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // label: "Optional string that replaces customer email"
            onClose: function() {
                alert('Window closed.');
            },
            callback: function(response) {
                let message = response.reference;

                // Append the additional parameters to the URL
                window.location.href = "verify-payment/" + message + "?kg=" + encodeURIComponent(kg) + "&name=" + encodeURIComponent(name) + "&phone=" + encodeURIComponent(phone) + "&ticketNumber=" + encodeURIComponent(ticketNumber);
            }
        });

        handler.openIframe();
    }
</script>


@endsection
