@extends('layouts.app')

@section('content')
@section('background','/img/categories.jpg');

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-transparent panel  panel-default">
                <div class="panel-heading">Restaurants</div>
                <div class="panel-body ">
                  <div class="text-center">
                    @foreach($resturants as $resturanty)
                    <h2>{{$resturanty->name}}</h2>
                    <a href="{{url('/resturant/'.$resturanty->id)}}"><img src="{{$resturanty->photo}}" width="250" height="250" class="img img-rounded"/></a>
                    <hr>
                    @endforeach
                    {!!$resturants->links()!!}
                  </div>

                </div>
            </div>
        </div>
    </div>
</div>
<style>

</style>
@endsection
