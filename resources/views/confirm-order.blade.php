@extends('layouts.app')
@section('background','/img/checkout.jpg')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Confirm Order</div>

                <div class="panel-body">
                    {!!nl2br($message)!!}
                    <br>

                    @if(Auth::guest())
                              <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
                              <form accept-charset="UTF-8" action="{{url('/charge')}}" method="POST" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{env('STRIPE_KEY')}}" id="payment-form">
                                <input type="hidden" name="message" value="{{$message}}">
                                <input type="hidden" name="total_price" value="{{$total_price}}">
                                <input type="hidden" name="price" value="{{$price}}">
                                <input type="hidden" name="tax" value="{{$tax}}">
                                <input type="hidden" name="fee" value="{{$fee}}">
                                <input type="hidden" name="resturant" value="{{$resturant->id}}">
                                <div class='form-row'>
                                  <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Delivery Address</label>
                                    <input class='form-control' name="address" size='4' type='text'>
                                  </div>
                                  <div class='col-xs-12 form-group '>
                                    <label class='control-label'>Comments</label>
                                    <textarea class="form-control" name="comments" placeholder="Extra napkins, no ice, etc."></textarea>
                                    <input class="form-control" placeholder="Tip" name="tip"/>
                                  </div>
                                </div>
                                <div class='form-row'>
                                  <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Name on Card</label>
                                    <input class='form-control' size='4' type='text'>
                                  </div>
                                </div>
                                <div class='form-row'>
                                  <div class='col-xs-12 form-group card required'>
                                    <label class='control-label'>Card Number</label>
                                    <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                                  </div>
                                </div>
                                <div class='form-row'>
                                  <div class='col-xs-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label>
                                    <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                  </div>
                                  <div class='col-xs-4 form-group expiration required'>
                                    <label class='control-label'>Expiration</label>
                                    <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                                  </div>
                                  <div class='col-xs-4 form-group expiration required'>
                                    <label class='control-label'> </label>
                                    <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                                  </div>
                                </div>
                                <div class='form-row'>
                                  <div class='col-md-12'>
                                    <div class='form-control total btn btn-info'>
                                      Total (Delivery Fee Included ):
                                      <span class='amount'>{{money_format('%.2n', $total_price)}}</span>
                                    </div>

                                  </div>
                                </div>
                                <div class='form-row'>
                                  <div class='col-md-12 form-group'>
                                    <button class='form-control btn btn-primary submit-button' type='submit'>Pay »</button>
                                  </div>
                                </div>
                                  <div class='col-md-12 error form-group hide'>
                                    <div class='alert-danger alert'>
                                      Please correct the errors and try again.
                                    </div>
                                  </div>
                                </div>
                              </form>

                            <div class='col-md-4'></div>
                            @else
                            <form accept-charset="UTF-8" action="{{url('/charge')}}" method="POST" >
                              <input type="hidden" name="message" value="{{$message}}">
                              <input type="hidden" name="total_price" value="{{$total_price}}">
                              <input type="hidden" name="price" value="{{$price}}">
                              <input type="hidden" name="tax" value="{{$tax}}">
                              <input type="hidden" name="fee" value="{{$fee}}">
                              <input type="hidden" name="resturant" value="{{$resturant->id}}">
                              <div class='form-row'>
                                <div class='col-xs-12 form-group required'>
                                  <label class='control-label'>Delivery Address</label>
                                  <input class='form-control' name="address" size='4' type='text' value="{{auth()->user()->address}}">
                                </div>
                                <div class='col-xs-12 form-group '>
                                  <label class='control-label'>Comments</label>
                                  <textarea class="form-control" name="comments" placeholder="Extra napkins, no ice, etc."></textarea>
                                  <input class="form-control" placeholder="Tip" name="tip"/>
                                </div>
                              </div>
                              <div class='form-row'>
                                <div class='col-md-12'>
                                  <div class='form-control total btn btn-info'>
                                    Total (Delivery Fee Included):
                                    <span class='amount'>{{money_format('%.2n', $total_price)}}</span>
                                  </div>
                                </div>
                              </div>
                              <div class='form-row'>
                                <div class='col-md-12 form-group'>
                                  <button class='form-control btn btn-primary submit-button' type='submit'>Pay With Default Card»</button>
                                </div>


                              </div>
                            </form>

                            @endif
                        </div>
                    </div>


                    <br>
                </div>
            </div>
        </div>

<script>
$(function() {
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(e.target).closest('form'),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;

    $errorMessage.addClass('hide');
    $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault(); // cancel on first error
      }
    });
  });
});

$(function() {
  var $form = $("#payment-form");

  $form.on('submit', function(e) {
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  });

  function stripeResponseHandler(status, response) {
    if (response.error) {
      $('.error')
        .removeClass('hide')
        .find('.alert')
        .text(response.error.message);
    } else {
      // token contains id, last4, and card type
      var token = response['id'];
      // insert the token into the form so it gets submitted to the server
      $form.find('input[type=text]').empty();
      $form.append("<input type='hidden' name='reservation[stripe_token]' value='" + token + "'/>");

      $form.get(0).submit();
    }
  }
})
</script>
@endsection
