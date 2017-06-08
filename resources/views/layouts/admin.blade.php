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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7+1/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
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

        .panel-default{
            background-color: #F8F8F8;
            border-radius: 0px;
        }

        .dataTables_wrapper .dataTables_length {
            float: left;
        }
        .dataTables_wrapper .dataTables_filter {
            float: right;
            text-align: left;
        }
        .dataTables_wrapper .dataTables_paginate  {
            float: right;
            text-align: left;
        }
        .dataTables_wrapper .dataTables_info  {
            float: left;
            text-align: left;
        }
        .pagination{
            margin: 0px;
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
<div id="wrapper">

    @include('layouts.admin-menu')

    <div id="page-wrapper" style="min-height: 898px;">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">@yield('title')</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        @include('errors.message')

        @yield('content')

    </div>
    <!-- /#page-wrapper -->

</div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{--<script src="http://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7+1/js/sb-admin-2.min.js"></script>--}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.0/metisMenu.min.js"></script>



<!-- Bootstrap Core JavaScript -->
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
{{--<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>--}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
{{-- datatabes --}}
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7+1/js/sb-admin-2.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7+1/js/sb-admin-2.min.js"></script>--}}

{{-- javascript money mask on inputs --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>
{{-- datatabes --}}
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.js"></script>
<script>
    $(".alert").delay(4000).fadeOut(400, function() {
        $(this).alert('close');
    });
</script>
    <script>
        $(function() {
            $('#side-menu').metisMenu();
        });
    </script>
<script>
    $('.table').DataTable({
        "oLanguage": {
            "sUrl": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Dutch.json"
        },
        "order": [[ 0, "desc" ]],
//            "scrollX": false,
        "dom":' <"search"f> <"class"><"top"l>rt<"bottom"ip><"clear">'
    });
</script>
</body>
</html>
