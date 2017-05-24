@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Your Order Has Been Filed!</div>

                <div class="panel-body">
                  <h1>Receipt Number: {{$charge->id}}</h1>

                     <br>
                     <div class="text-center">
                       Your food will arrive shortly! Here are the details of your order:
                       <br>
                       <img height="250" width="250" src="{{$resturant->photo}}" class="img img-rounded"/>
                       <br>
                       <h2><strong>{{$resturant->name}}</strong></h2>
                       <br>
                       {!!nl2br($charge->description)!!}
                       <br>
                       Price: {{money_format('%.2n', $charge->amount/100)}}
                       <br>
                       Dropoff Address: {{$charge->metadata['address']}}
                      <br>
                     </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
