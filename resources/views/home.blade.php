@extends('layouts.app')

{{--@section('title', 'Home')--}}

@section('content')

    <div class="slider-banner">
        <div>
            <img src="https://dummyimage.com/2000x400/000000/0011ff">

        </div><div>
            <img src="https://dummyimage.com/2000x400/000000/0011ff">
        </div>
    </div>

    <div class="container" style="height: 600px;">
        <div class="row">

            <div class="animated fadeInLeft">
                asdasfasf asdasfaf
            </div>
            <h1 class="animated infinite bounce">Example</h1>

        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <style>
        .slider-banner{
            margin-top: -25px;
            overflow:hidden !important;

        }
        .slider-contact{
            height: 200px !important;
            background-color: #2ab27b;
            /*z-index: 1;*/
        }
        .slider-banner > div {
            /*height: auto;*/
        }
        .slick-next{
            right: 30px;
        }
        .slick-prev{
            left: 10px;
        }
        .slick-prev:before, .slick-next:before{
            color: white;
            font-size: 40px;
        }
        .slick-arrow{
            z-index: 999 !important;
        }

    </style>
@endpush

@push('js')
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.slider-banner').slick({
                dots: true
            });
    //            $('.slider-contact').focus();
        });
    </script>


@endpush