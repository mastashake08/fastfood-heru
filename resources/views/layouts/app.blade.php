<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Vendor libraries -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.2.3/jquery.payment.min.js"></script>
    <!-- If you're using Stripe for payments -->
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
</head>
<body>
<style>
     body {
        background-image: url(@yield('background'));
        background-size: cover;
    }
  
    .panel-transparent {
      background:none;
    }


</style>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src=@yield('logo','/img/logo-white.png') class="img img-responsive img-rounded" height="50" width="50">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                      <li><a href="{{url('/about')}}"><strong>About</strong></a></li>
                      <li><a href="{{url('/how-does-it-work')}}"><strong>How Does It Work</strong></a></li>
                      <li><a href="{{url('/categories')}}"><strong>Categories</strong></a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                    <div class="nav navbar navbar-right">
                        <img src="{{url('/img/logo-spoon.png')}}" class="img img-responsive img-rounded" height="50" width="50">
                    </div>
                </div>
            </div>
        </nav>

        @yield('content')
        <footer>
        <div class="navbar-brand  navbar-bottom">

        <p class="navbar-text pull-left">© 2017 - Site Built By Jyrone Parker
             <a href="https://jyroneparker.com" target="_blank" >Get Yours Now</a>
        </p>
        <p class="navbar-text pull-left">
             <a href="{{url('/privacy')}}" target="_blank" >Privacy Policy</a>
        </p>
        <p class="navbar-text pull-left">
             <a href="{{url('/terms')}}" target="_blank" >Terms Of Service</a>
        </p>
        <p class="navbar-text pull-left">
             <a href="{{url('/how-does-it-work')}}" target="_blank" >Help Center</a>
        </p>
        <p class="navbar-text pull-left">
             <a href="https://www.instagram.com/fastfoodiebiz/" target="_blank" ><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </p>
        <p class="navbar-text pull-left">
             <a href="https://www.facebook.com/FastFoodie.biz" target="_blank" ><i class="fa fa-facebook" aria-hidden="true"></i></a>
        </p>
        <p class="navbar-text pull-left">
             <a href="https://twitter.com/fastfoodiebiz"  target="_blank" ><i class="fa fa-twitter" aria-hidden="true"></i></a>
        </p>

        <p class="pull-right navbar-img">
        <a href="{{url('/contact-us')}}" class="  ">

        <img src="{{url('/img/melanite.png')}}" class="img img-responsive img-rounded" height="150" width="150"/>
      </p>


    </div>
  </footer>
    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>


</body>
</html>
