@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$resturant->name}}</div>
                <div class="panel-body">
                    <img src="{{$resturant->photo}}" class="img img-rounded" width="250" height="250"/>
                    <br>
                    Phone: {{$resturant->phone}}
                    <br>
                    Address: {{$resturant->address}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
