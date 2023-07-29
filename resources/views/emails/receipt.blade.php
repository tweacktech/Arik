@component('mail::message')
# Payment Receipt

Thank you for your payment. Below is the receipt for your payment:

**Amount Paid:** ${{ $amount }}

If you have any questions or concerns, please feel free to contact us.

Thank you,
{{ config('app.name') }}
@endcomponent
