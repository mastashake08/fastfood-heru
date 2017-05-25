@extends('layouts.app')

@section('content')
@section('background','/img/categories.jpg');
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Food Categories</div>
                <div class="panel-body">
                  <div class="text-center">
                    @foreach($categories as $category)
                    <h2>{{$category->name}}</h2>
                    <a href="{{url('/category/'.$category->id)}}"><img src="{{$category->photo}}" width="250" height="250" class="img img-rounded"/></a>
                    <hr>
                    @endforeach
                    {!!$categories->links()!!}
                  </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
