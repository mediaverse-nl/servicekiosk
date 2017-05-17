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

@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css"/>
    <style>
        .slider-contact{
            height: 200px !important;
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
    </style>
@endpush

@push('js')
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.slider-contact').slick();
//            $('.slider-contact').focus();
        });
    </script>
@endpush