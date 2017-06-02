@extends('layouts.app')

@section('title', 'Contact')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-body">
                    {{ Form::open(['method' => 'post']) }}
                    <div class="form-group">
                        {{ Form::label('Naam', 'Naam *') }}
                        {{ Form::text('Naam', Auth::check() ? Auth::user()->name.' '.Auth::user()->achternaam : null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('mail', 'E-mail *') }}
                        {{ Form::text('mail', Auth::check() ? Auth::user()->email : null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Bericht', 'Bericht *') }}
                        {{ Form::textarea('Bericht', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::submit('versturen', ['class' => 'btn btn-default']) }}
                        {{ Form::close() }}
                        <span class="pull-right">Alle velden met een * zijn verplicht.</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="">
{{--                <p>@include('includes._text_editor', ['text' => 'contact_text'])</p>--}}
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2487.7470007520255!2d5.4870205157669885!3d51.42607397962181!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6d8568a601f55%3A0x8090d2a5b7d0b2bc!2sLeenderweg+74B%2C+5615+AB+Eindhoven!5e0!3m2!1snl!2snl!4v1492609180812" width="100%" height="340" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-6">
                <div class="slider-contact">
                    <div>your content</div>
                    <div>your content</div>
                    <div>your content</div>
                </div>
            </div>

            <div class="col-lg-4">
                aasd
            </div>
            <div class="col-lg-4">
                adasd
            </div>

        </div>
    </div>



    <div id="map" style="width: 100%; height: 250px;"></div>
    <script>
        function initMap() {
            var uluru = {lat: 51.446512, lng: 5.522474};
            var map = new google.maps.Map(document.getElementById('map'), {
//                zoom: 4,
//                draggable: false,
//                zoomControl: false,
//                scrollWheel: false,
//                disableDoubleClickZoom: true,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCXOtAwh6qbt4PPV4fYRPRZhWeYt&callback=initMap"></script>


    {{--</div>--}}

@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css"/>
    <style>
        .slider-contact{
            height: 250px !important;
            background-color: #2ab27b;
            /*z-index: 1;*/
        }
        .slider-contact > div {
            height: 200px;
        }
        .slick-next{
            right: 30px;
        }
        .slick-prev{
            left: 10px;
        }
        .slick-prev:before, .slick-next:before{
            color: black;
            font-size: 40px;
        }
        .slick-arrow{
            z-index: 999 !important;
        }
        .slick-dots{
            /*margin-top: -px !important;*/
            bottom: 10px;
        }

    </style>
@endpush

@push('js')
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.slider-contact').slick({
                dots: true,
                autoplay: true,
                autoplaySpeed: 8000,

            });
//            $('.slider-contact').focus();
        });
    </script>
@endpush