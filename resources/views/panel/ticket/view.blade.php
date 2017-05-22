@extends('layouts.panel')

@section('title', 'ticket')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="list-group">
                    <a href="#" class="list-group-item">Systemen</a>
                    <a href="#" class="list-group-item">Account</a>
                    <a href="#" class="list-group-item">Facturering</a>
                    <a href="{{route('panel.ticket')}}" class="list-group-item active">Tickets</a>
                </div>
            </div>
            <div class="col-sm-9 pull-right">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>
                            Onderwerp {!! $ticket->first()->titel !!}
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="panel">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h4 style="margin-top: -5px;">{{$ticket->first()->user->name}}</h4>
                                        <p>{{$ticket->first()->text}}</p>
                                    </div>
                                    <div class="col-md-12">
                                        <small class="text-muted pull-right">geplaats
                                            op: {{$ticket->first()->created_at}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($message->get() as $m)
                        <div class="panel-body">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h4 style="margin-top: -5px;">{!! $m->user->name !!}</h4>
                                            <p>{{$m->tekst}}</p>
                                        </div>
                                        <div class="col-md-12">
                                            <small class="text-muted pull-right">geplaatst
                                                op: {{$m->created_at}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="panel" style="margin-top: 20px;">
                        <div class="panel-body">
                            @if(\Auth::check())
                                {{ Form::open(['class' => 'form-horizontal', 'route' => ['panel.store', $ticket->first()->id]]) }}

                                {{ Form::label('Antwoord', 'Antwoord:', ['class' => 'control-label']) }}
                                {{ Form::textarea('antwoord', null, ['class' => 'form-control', 'rows' => '3']) }}
                                {{ Form::text('uId', $user->id, ['class' => 'hidden'])  }}
                                {{ Form::text('id', $ticket->first()->id, ['class' => 'hidden'])  }}
                                <br>
                                {{ Form::submit('Verzenden', ['class' => 'btn btn-default pull-right']) }}
                                {{ Form::close() }}
                            @endif

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