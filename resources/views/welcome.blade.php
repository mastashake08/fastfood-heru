<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #fff;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                background-image: url('/img/home_slide_image1.png');
                background-size: cover;
            }

            .form-inline .form-control {
                display: inline-block;
                width: 80%;
                color: black;
            }

            .btn-success {
                color: #000;
                background-color: #5cb85c;
                border-color: #4cae4c;
            }






            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                width:100%;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 18px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            *::-webkit-input-placeholder { /* WebKit, Blink, Edge */
                color:    #909;
            }
            *:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
               color:    #909;
               opacity:  1;
            }
            *::-moz-placeholder { /* Mozilla Firefox 19+ */
               color:    #909;
               opacity:  1;
            }
            *:-ms-input-placeholder { /* Internet Explorer 10-11 */
               color:    #909;
            }
            *::-ms-input-placeholder { /* Microsoft Edge */
               color:    #909;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <strong><img src="/img/logo-white.png" width="250" height="250" /></strong>
                    <form id="search" class="form-inline" method="get" action="{{url('/search/resturant')}}">
                      <input class="form-control" name="term" placeholder="Search Term" />
                      <button class="btn btn-success">Search</button>
                    </form>
                </div>

                <div class="links">
                    <a href="{{url('/about')}}"><strong>About</strong></a>
                    <a href="{{url('/how-does-it-work')}}"><strong>How Does It Work</strong></a>
                    <a href="{{url('/categories')}}"><strong>Categories</strong></a>
                </div>
            </div>
        </div>
    </body>
</html>
