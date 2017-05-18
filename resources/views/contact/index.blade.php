@extends('layouts.app')

@section('title', 'Contact')

@section('content')

    <div class="container">
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
            var uluru = {lat: -25.363, lng: 131.044};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                draggable: false,
                zoomControl: false,
                scrollWheel: false,
                disableDoubleClickZoom: true,
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