@extends('layouts.app')
@section('background','/img/register.jpg')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

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
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required>

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
                                <input id="apt" type="text" class="form-control" name="apt" value="{{ old('apt') }}" >

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
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required>

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
                        			<option value="AK">Alaska</option>
                        			<option value="AL">Alabama</option>
                        			<option value="AR">Arkansas</option>
                        			<option value="AZ">Arizona</option>
                        			<option value="CA">California</option>
                        			<option value="CO">Colorado</option>
                        			<option value="CT">Connecticut</option>
                        			<option value="DC">District of Columbia</option>
                        			<option value="DE">Delaware</option>
                        			<option value="FL">Florida</option>
                        			<option value="GA">Georgia</option>
                        			<option value="HI">Hawaii</option>
                        			<option value="IA">Iowa</option>
                        			<option value="ID">Idaho</option>
                        			<option value="IL">Illinois</option>
                        			<option value="IN">Indiana</option>
                        			<option value="KS">Kansas</option>
                        			<option value="KY">Kentucky</option>
                        			<option value="LA">Louisiana</option>
                        			<option value="MA">Massachusetts</option>
                        			<option value="MD">Maryland</option>
                        			<option value="ME">Maine</option>
                        			<option value="MI">Michigan</option>
                        			<option value="MN">Minnesota</option>
                        			<option value="MO">Missouri</option>
                        			<option value="MS">Mississippi</option>
                        			<option value="MT">Montana</option>
                        			<option value="NC">North Carolina</option>
                        			<option value="ND">North Dakota</option>
                        			<option value="NE">Nebraska</option>
                        			<option value="NH">New Hampshire</option>
                        			<option value="NJ">New Jersey</option>
                        			<option value="NM">New Mexico</option>
                        			<option value="NV">Nevada</option>
                        			<option value="NY">New York</option>
                        			<option value="OH">Ohio</option>
                        			<option value="OK">Oklahoma</option>
                        			<option value="OR">Oregon</option>
                        			<option value="PA">Pennsylvania</option>
                        			<option value="PR">Puerto Rico</option>
                        			<option value="RI">Rhode Island</option>
                        			<option value="SC">South Carolina</option>
                        			<option value="SD">South Dakota</option>
                        			<option value="TN">Tennessee</option>
                        			<option value="TX">Texas</option>
                        			<option value="UT">Utah</option>
                        			<option value="VA">Virginia</option>
                        			<option value="VT">Vermont</option>
                        			<option value="WA">Washington</option>
                        			<option value="WI">Wisconsin</option>
                        			<option value="WV">West Virginia</option>
                        			<option value="WY">Wyoming</option>
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
                                <input id="zip" type="text" class="form-control" name="zip" value="{{ old('zip') }}" required>

                                @if ($errors->has('zip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
