@extends('layouts.app')

@section('title', 'Nieuws')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-lg-9">
                @foreach($blog as $b)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{!! route('nieuws.show', [$b->id, str_replace(' ', '-', $b->titel)]) !!}" >{!! $b->titel !!}</a>
                        {{--<span class="pull-right">--}}
                            {{--v1.2.2--}}
                        {{--</span>--}}
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                {!! str_limit($b->tekst, 350) !!}
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <p class="text-right small">Geplaatst: {!! $b->created_at !!} </p>
                    </div>
                </div>
                @endforeach

                <div class="panel panel-default">
                    <div class="panel-heading">
                        title van de update, wijzigen of mededeling
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-4">
                                asdasd
                            </div>
                            <div class="col-lg-4">
                                asdasd
                            </div>
                            <div class="col-lg-4">
                                asdasd
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <p class="text-right small">Geplaatst: x datum </p>
                    </div>
                </div>

            </div>

            <div class="col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        sadasd
                    </div>
                    <div class="panel-body">
                        Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in elektronische letterzetting. Het is in de jaren '60 populair geworden met de introductie van Letraset vellen met Lorem Ipsum passages en meer recentelijk door desktop publishing software zoals Aldus PageMaker die versies van Lorem Ipsum be
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection