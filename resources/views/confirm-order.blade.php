@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Confirm Order</div>

                <div class="panel-body">
                    {!!$message!!}
                    <br>
                    <strong>Total Price: {{money_format('%.2n', $price)}}</strong>

<button id="customButton">Purchase</button>

<script>
var handler = StripeCheckout.configure({
  key: 'pk_test_2wxtoSte8Dk1ttocOHG2j2Zr',
  image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
  locale: 'auto',
  token: function(token) {
    // You can access the token ID with `token.id`.
    // Get the token ID to your server-side code for use.
    console.log(token);
  }
});

document.getElementById('customButton').addEventListener('click', function(e) {
  console.log(e);
  // Open Checkout with further options:
  handler.open({
    name: 'Jyrone Parker',
    description: '2 widgets',
    amount: 2000
  });
  e.preventDefault();
});

// Close Checkout on page navigation:
window.addEventListener('popstate', function() {
  handler.close();
});
</script>


                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
