@extends('layouts.app')

@section('title', 'Nieuws')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-lg-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {!! $blog->titel !!}
                        {{--<span class="pull-right">--}}
                        {{--v1.2.2--}}
                        {{--</span>--}}
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                {!! $blog->tekst !!}
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <p class="text-right small">Geplaatst: {!! $blog->created_at !!} </p>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection