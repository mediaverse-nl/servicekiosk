@extends('layouts.panel')

@section('title', 'asdasdad')

@section('content')

    <div class="container">
        <div class="row">

            @include('layouts.panel-group-menu')

            <div class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @yield('title')
                    </div>
                    <div class="panel-body">


                        <div class="col-lg-4">

                            <div class="thumbnail">
asdasdasd
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('css')
    <style>

    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush