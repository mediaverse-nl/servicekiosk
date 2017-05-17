<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body{
            margin-top: 70px;
        }
        /* Dropdown Button */
        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 14px;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            /*padding: 0px 20px;*/
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {background-color: #f1f1f1}

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }
    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{route('home')}}">Project name</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="{{ (Request::is('/') || Request::is('home')) ? 'active' : null }}"><a href="{{route('home')}}">Home</a></li>
                        <li>
                            <div class="dropdown">
                                <a href="{{route('product.index')}}">
                                    <button class="dropbtn">Producten</button>
                                </a>
                                <div class="dropdown-content">
                                    <a href="{{route('product.indoorzuil')}}">indoor zuilen</a>

                                    {{--<a href="#">Link 2</a>--}}
                                    {{--<a href="#">Link 3</a>--}}
                                </div>
                            </div>
                        </li>
                        <li class="{{ Request::is('services') ? 'active' : null }}"><a  href="{{route('service.index')}}">Services</a></li>
                        <li class="{{ Request::is('nieuws' ) ? 'active' : null }}"><a href="{{route('nieuws.index')}}">Nieuws</a></li>
                        <li class="{{ Request::is('contact') ? 'active' : null }}"><a href="{{route('contact.index')}}">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        @if (Auth::check())
                            <li class="{{ Request::is('panel') ? 'active' : null }}"><a href="{{route('admin.dashboard')}}">panel</a></li>
                            <li><a href="{{route('logout')}}">Uitloggen</a></li>
                        @else
                            <li class="{{ Request::is('login') ? 'active' : null }}"><a href="{{route('login')}}">Inloggen</a></li>
                        @endif
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">
            <h1>@yield('title')</h1>
        </div>

        @yield('content')


    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
