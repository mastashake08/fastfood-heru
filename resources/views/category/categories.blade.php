@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Categories</div>
                <div class="panel-body">
                  <div class="text-center">
                    <a href="{{url('/categories/filter?category=resturant')}}"><h2>Resturants</h2></a>
                    <hr>
                    <a href="{{url('/categories/filter?category=store')}}"><h2>Conveneience Stores</h2></a>
                    <hr>
                    <a href="{{url('/categories/filter?category=grocery')}}"><h2>Grocery Stores</h2></a>
                    <hr>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
