@component('mail::message')
# Introduction

You have a new contact request below are the details.
<hr>
Phone: {{$phone}}
Message: {{$message}}
<br>
<img src="{{url('/img/logo.png')}}" width="250" height="250" class="img img-responsive img-rounded"/>
<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
