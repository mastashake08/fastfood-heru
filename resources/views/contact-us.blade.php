@extends('layouts.app')

@section('content')
@section('background','/img/contact.jpeg')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Contact Us</div>

                <div class="panel-body">
                  <form class="form">
                    {{csrf_field()}}
                    <input name="phone_number" type="tel" class="form-control" placeholder="Phone Number">
                    <textarea class="form-control" name="message" placeholder="Your Message Goes Here...." required></textarea>
                    <button class="btn btn-info btn-md">Send Us A Message!</button>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
