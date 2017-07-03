@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <h2>User Settings</h2>
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/customer/'.$user->id)  }}">
                    <input type="hidden" name="_method" value="PUT">
                      {{ csrf_field() }}

                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <label for="name" class="col-md-4 control-label">Name</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                              @if ($errors->has('name'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                              @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                          <label for="address" class="col-md-4 control-label">Address</label>

                          <div class="col-md-6">
                              <input id="address" type="text" class="form-control" name="address" value="{{ $user->address }}" required>

                              @if ($errors->has('address'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('address') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('apt') ? ' has-error' : '' }}">
                          <label for="apt" class="col-md-4 control-label">Apt/Suite</label>

                          <div class="col-md-6">
                              <input id="apt" type="text" class="form-control" name="apt" value="{{ $user->apt }}" >

                              @if ($errors->has('apt'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('apt') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                          <label for="city" class="col-md-4 control-label">City</label>

                          <div class="col-md-6">
                              <input id="city" type="text" class="form-control" name="city" value="{{ $user->city }}" required>

                              @if ($errors->has('city'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('city') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                        <label for="state" class="col-md-4 control-label">State</label>
                        <div class="col-md-6">
                          <select class="form-control" id="state" name="state">
                            <option value="">N/A</option>
                            <option value="AK" {{ $user->state === "AK" ? "selected" : null}}>Alaska</option>
                            <option value="AL" {{ $user->state === "AL" ? "selected" : null}}>Alabama</option>
                            <option value="AR" {{ $user->state === "AR" ? "selected" : null}}>Arkansas</option>
                            <option value="AZ" {{ $user->state === "AZ" ? "selected" : null}}>Arizona</option>
                            <option value="CA" {{ $user->state === "CA" ? "selected" : null}}>California</option>
                            <option value="CO" {{ $user->state === "CO" ? "selected" : null}}>Colorado</option>
                            <option value="CT" {{ $user->state === "CT" ? "selected" : null}}>Connecticut</option>
                            <option value="DC" {{ $user->state === "DC" ? "selected" : null}}>District of Columbia</option>
                            <option value="DE" {{ $user->state === "DE" ? "selected" : null}}>Delaware</option>
                            <option value="FL" {{ $user->state === "FL" ? "selected" : null}}>Florida</option>
                            <option value="GA" {{ $user->state === "GA" ? "selected" : null}}>Georgia</option>
                            <option value="HI" {{ $user->state === "HI" ? "selected" : null}}>Hawaii</option>
                            <option value="IA" {{ $user->state === "IA" ? "selected" : null}}>Iowa</option>
                            <option value="ID" {{ $user->state === "ID" ? "selected" : null}}>Idaho</option>
                            <option value="IL" {{ $user->state === "IL" ? "selected" : null}}>Illinois</option>
                            <option value="IN" {{ $user->state === "IN" ? "selected" : null}}>Indiana</option>
                            <option value="KS" {{ $user->state === "KS" ? "selected" : null}}>Kansas</option>
                            <option value="KY" {{ $user->state === "KY" ? "selected" : null}}>Kentucky</option>
                            <option value="LA" {{ $user->state === "LA" ? "selected" : null}}>Louisiana</option>
                            <option value="MA" {{ $user->state === "MA" ? "selected" : null}}>Massachusetts</option>
                            <option value="MD" {{ $user->state === "MD" ? "selected" : null}}>Maryland</option>
                            <option value="ME" {{ $user->state === "ME" ? "selected" : null}}>Maine</option>
                            <option value="MI" {{ $user->state === "MI" ? "selected" : null}}>Michigan</option>
                            <option value="MN" {{ $user->state === "MN" ? "selected" : null}}>Minnesota</option>
                            <option value="MO" {{ $user->state === "MO" ? "selected" : null}}>Missouri</option>
                            <option value="MS" {{ $user->state === "MS" ? "selected" : null}}>Mississippi</option>
                            <option value="MT" {{ $user->state === "MT" ? "selected" : null}}>Montana</option>
                            <option value="NC" {{ $user->state === "NC" ? "selected" : null}}>North Carolina</option>
                            <option value="ND" {{ $user->state === "ND" ? "selected" : null}}>North Dakota</option>
                            <option value="NE" {{ $user->state === "NE" ? "selected" : null}}>Nebraska</option>
                            <option value="NH" {{ $user->state === "NH" ? "selected" : null}}>New Hampshire</option>
                            <option value="NJ" {{ $user->state === "NJ" ? "selected" : null}}>New Jersey</option>
                            <option value="NM" {{ $user->state === "NM" ? "selected" : null}}>New Mexico</option>
                            <option value="NV" {{ $user->state === "NV" ? "selected" : null}}>Nevada</option>
                            <option value="NY" {{ $user->state === "NY" ? "selected" : null}}>New York</option>
                            <option value="OH" {{ $user->state === "OH" ? "selected" : null}}>Ohio</option>
                            <option value="OK" {{ $user->state === "OK" ? "selected" : null}}>Oklahoma</option>
                            <option value="OR" {{ $user->state === "OR" ? "selected" : null}}>Oregon</option>
                            <option value="PA" {{ $user->state === "PA" ? "selected" : null}}>Pennsylvania</option>
                            <option value="PR" {{ $user->state === "PR" ? "selected" : null}}>Puerto Rico</option>
                            <option value="RI" {{ $user->state === "RI" ? "selected" : null}}>Rhode Island</option>
                            <option value="SC" {{ $user->state === "SC" ? "selected" : null}}>South Carolina</option>
                            <option value="SD" {{ $user->state === "SD" ? "selected" : null}}>South Dakota</option>
                            <option value="TN" {{ $user->state === "TN" ? "selected" : null}}>Tennessee</option>
                            <option value="TX" {{ $user->state === "TX" ? "selected" : null}}>Texas</option>
                            <option value="UT" {{ $user->state === "UT" ? "selected" : null}}>Utah</option>
                            <option value="VA" {{ $user->state === "VA" ? "selected" : null}}>Virginia</option>
                            <option value="VT" {{ $user->state === "VT" ? "selected" : null}}>Vermont</option>
                            <option value="WA" {{ $user->state === "WA" ? "selected" : null}}>Washington</option>
                            <option value="WI" {{ $user->state === "WI" ? "selected" : null}}>Wisconsin</option>
                            <option value="WV" {{ $user->state === "WV" ? "selected" : null}}>West Virginia</option>
                            <option value="WY" {{ $user->state === "WY" ? "selected" : null}}>Wyoming</option>
                          </select>
                          @if ($errors->has('state'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('state') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>

                      <div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
                          <label for="zip" class="col-md-4 control-label">Zip</label>

                          <div class="col-md-6">
                              <input id="zip" type="text" class="form-control" name="zip" value="{{ $user->zip }}" required>

                              @if ($errors->has('zip'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('zip') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>


                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  Update Account Info
                              </button>
                          </div>
                      </div>
                  </form>
                  <hr>
                  <h2>Payment Settings</h2>
                  @if($customer->default_source != null)
                  Default payment ending in: {{$customer->sources->data[0]->last4}}
                  @else
                  You currently have no default payment set up.
                  @endif

         <!-- CREDIT CARD FORM STARTS HERE -->
         <div class="panel panel-default credit-card-box">
             <div class="panel-heading display-table" >
                 <div class="row display-tr" >
                     <h3 class="panel-title display-td" >Payment Details</h3>
                     <div class="display-td" >
                         <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                     </div>
                 </div>
             </div>
             <div class="panel-body">
                 <form role="form" id="payment-form" method="POST" action="{{url('/customer/update-payment')}}">
                     {{ csrf_field() }}
                     <div class="row">
                         <div class="col-xs-12">
                             <div class="form-group">
                                 <label for="cardNumber">CARD NUMBER</label>
                                 <div class="input-group">
                                     <input
                                         type="tel"
                                         class="form-control"
                                         name="cardNumber"
                                         placeholder="Valid Card Number"
                                         autocomplete="cc-number"
                                         required autofocus
                                     />
                                     <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-xs-7 col-md-7">
                             <div class="form-group">
                                 <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                 <input
                                     type="text"
                                     class="form-control"
                                     name="cardExpiry"
                                     placeholder="MM / YY"
                                     autocomplete="cc-exp"
                                     required
                                 />
                             </div>
                         </div>
                         <div class="col-xs-5 col-md-5 pull-right">
                             <div class="form-group">
                                 <label for="cardCVC">CV CODE</label>
                                 <input
                                     type="tel"
                                     class="form-control"
                                     name="cardCVC"
                                     placeholder="CVC"
                                     autocomplete="cc-csc"
                                     required
                                 />
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-xs-12">
                             <button class="subscribe btn btn-success btn-lg btn-block" type="submit">Update Card</button>
                         </div>
                     </div>
                     <div class="row" style="display:none;">
                         <div class="col-xs-12">
                             <p class="payment-errors"></p>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
         <!-- CREDIT CARD FORM ENDS HERE -->




                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
