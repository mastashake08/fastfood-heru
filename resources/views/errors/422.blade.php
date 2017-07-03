@extends('layouts.app')

@section('content')
@section('background','/img/register.jpg')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Error</div>

                <div class="panel-body">
                  <h2>{{ $exception->getMessage() }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
