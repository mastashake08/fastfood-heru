@extends('layouts.app')
@section('background','img/Categories.jpeg')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Categories</div>
                <div class="panel-body">
                  <div class="text-center">
                    <a href="{{url('/categories/resturant')}}"><h2>Restaurants</h2></a>
                    <hr>
                    <a href="{{url('/categories/store')}}"><h2>Convenience Stores</h2></a>
                    <hr>
                    <a href="{{url('/categories/grocery')}}"><h2>Grocery Stores</h2></a>
                    <hr>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
