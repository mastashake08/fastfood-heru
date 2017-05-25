@extends('layouts.app')

@section('content')
@section('background', $category->photo)
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$category->name}}</div>
                <div class="panel-body">
                  <div class="text-center">
                    @foreach($category->resturants as $resturant)
                    <h2>{{$resturant->name}}</h2>
                    <a href="{{url('/resturant/'.$resturant->id)}}"><img src="{{$resturant->photo}}" width="250" height="250" class="img img-rounded"/></a>
                    <br>
                    <p>{{$resturant->description}}</p>
                    <hr>
                    @endforeach
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
