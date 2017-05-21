@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$resturant->name}}</div>
                <div class="panel-body">
                    <img src="{{$resturant->photo}}" class="img img-rounded text-center" width="250" height="250"/>
                    <br>
                    Address: <address><strong>{{$resturant->address}}</strong></address>
                    <br>
                    Phone: <a href="tel:{{$resturant->phone}}">{{$resturant->phone}}</a>
                    @can('create',App\Resturant::class)
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Description</th>
                          <th>Price</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($resturant->items as $item)
                        <tr>
                          <td>{{$item->name}}</td>
                          <td>{{$item->description}}</td>
                          <td>${{$item->price}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    @endcan
                    @cannot('create',App\Resturant::class)
                    <form class="form" method="post" action="{{url('place-order')}}">
                      {{ csrf_field() }}
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Description</th>
                          <th>Price</th>
                          <th>Quantity</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($resturant->items as $item)
                        <tr>
                          <td>{{$item->name}}</td>
                          <td>{{$item->description}}</td>
                          <td>${{$item->price}}</td>
                          <td><input type="number" min="0" name="order[{{$item->name}}]"/></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <button class="btn">Place Order</button>
                  </form>
                    @endcannot
                    @can('create',App\Resturant::class)
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('menu-item') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="resturant_id" value="{{$resturant->id}}">
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

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="tel" class="form-control" name="price" value="{{ old('price') }}" required autofocus>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Menu Item
                                </button>
                            </div>
                        </div>
                    </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
