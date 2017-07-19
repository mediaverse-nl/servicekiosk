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
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/jquery.fullpage.css">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/animation.css')}}">

    <style>
        html {
            position: relative;
            min-height: 100%;
        }

        body{
            margin: 51px 0 0px;
            /* bottom = footer height */
            /*padding: 25px;*/
            /*height: 700px;*/
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

        /*#app {*/
            /*min-height: 100%;*/
            /*height: auto;*/
            /*!* Negative indent footer by its height *!*/
            /*margin: 0 auto -250px;*/
            /*!* Pad bottom by footer height *!*/
            /*padding: 0 0 60px;*/
        /*}*/
        /*#main {*/
            /*overflow:auto;*/
            /*margin-top: 150px;*/
            /*padding-bottom: 300px; !* this needs to be bigger than footer height*!*/
        /*}*/
        .footer {
            /*height: 250px;*/
            /*background-color: #f5f5f5;*/

            background-color: orange;
            position: absolute;
            left: 0;
            bottom: 0;
            height: 250px;
            width: 100%;
            overflow:hidden;
        }

    </style>

    @stack('css')

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div>
        @include('errors.message')
        <div class="header">
            <nav class="main-nav">
                <ul>
                    <li data-menuanchor="firstSection">
                        <a href="#firstSection">Intro</a>
                    </li>

                    <li data-menuanchor="tenthSection">
                        <a href="#tenthSection">Waarom</a>
                    </li>

                    <li data-menuanchor="secondSection">
                        <a href="#secondSection">Intenties</a>
                    </li>
                    <li data-menuanchor="thirdSection">
                        <a href="#thirdSection">Dimensies</a>
                    </li>
                    <li data-menuanchor="fourthSection">
                        <a href="#fourthSection">Usp's</a>
                    </li>
                    <li data-menuanchor="fifthSection">
                        <a href="#fifthSection">Branches</a>
                    </li>
                    <li data-menuanchor="sixthSection">
                        <a href="#sixthSection">Kleuren</a>
                    </li>
                    <li data-menuanchor="seventhSection">
                        <a href="#seventhSection">Testemonials</a>
                    </li>
                    <li data-menuanchor="eighthSection">
                        <a href="#eighthSection">Contact</a>
                    </li>
                    <li data-menuanchor="ninethSection">
                        <a href="#ninethSection">Map</a>
                    </li>
                </ul>
            </nav>
        </div>

        <div id="main">
            <div>
                <h1>@yield('title')</h1>
            </div>

            @yield('content')

        </div>

    </div>


    <!-- Scripts -->
    <script src="{{ asset('/js/scripts.js') }}"></script>
    <script src="{{ asset('/js/jquery.fullpage.min.js.js') }}"></script>

    @stack('js')

</body>
</html>
