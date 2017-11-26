@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Food Categories</div>

                <div class="panel-body">
                  <table class="table">
                      <thead>
                        <tr>
                          <th>Photo</th>
                          <th>Name</th>
                          <th>Category</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($categories as $category)
                        <tr>
                          <td><img width="250" height="250" class="img-responsive img-rounded" src="{{$category->photo}}"/></td>
                          <td>{{$category->name}}</td>
                          <td>{{$category->category}}</td>
                          <td>
                            <a href="{{url('/category/'.$category->id.'/edit')}}" class="btn btn-info btn-sm">Edit</a>
                            <form  action="{{ url('/category/'.$category->id) }}" method="POST">
                              <input type="hidden" name="_method" value="DELETE">
                              {{ csrf_field() }}
                              <button class="btn btn-danger btn-sm">Delete</button>
                          </form>
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                      {!! $categories->links()!!}
                    </table>
                    <a href="{{url('/category/create')}}" class="btn btn-success">Add New Category</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Resturants</div>

                <div class="panel-body">
                  <table class="table">
                      <thead>
                        <tr>
                          <th>Photo</th>
                          <th>Name</th>
                          <th>Address</th>
                          <th>Phone</th>
                          <th>Food Category</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($resturants as $resturant)
                        <tr>
                          <td><img width="250" height="250" class="img-responsive img-rounded" src="{{$resturant->photo}}"/></td>
                          <td><a href="{{url('/resturant/'.$resturant->id)}}" target="_blank">{{$resturant->name}}</a></td>
                          <td>{{$resturant->address}}</td>
                          <td>{{$resturant->phone}}</td>
                          <td>{{$resturant->category->name}}</td>
                          <td>
                            <a href="{{url('/resturant/'.$resturant->id.'/edit')}}" class="btn btn-info btn-sm">Edit</a>
                            <form  action="{{ url('/resturant/'.$resturant->id) }}" method="POST">
                              <input type="hidden" name="_method" value="DELETE">
                              {{ csrf_field() }}
                              <button class="btn btn-danger btn-sm">Delete</button>
                          </form>
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                      {!! $resturants->links()!!}
                    </table>
                    <a href="{{url('/resturant/create')}}" class="btn btn-success">Add New Resturant</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Place A Custom Order</div>

                <div class="panel-body">
                  <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
                  <form accept-charset="UTF-8" action="{{url('/charge')}}" method="POST" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{env('STRIPE_KEY')}}" id="payment-form">
                    <label class='control-label'>Delivery Address</label>
                    <input type="text" name="message" value="">
                    <label class='control-label'>Total Price</label>
                    <input type="text" name="total_price" value="">
                    <label class='control-label'>Price</label>
                    <input type="text" name="price" value="">
                    <label class='control-label'>Tax</label>
                    <input type="text" name="tax" value="">
                    <label class='control-label'>Fee</label>
                    <input type="text" name="fee" value="">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
