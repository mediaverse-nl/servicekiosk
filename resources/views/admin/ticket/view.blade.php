@extends('layouts.admin')

@section('title', 'Support tickets')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-9">
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
                                        <small class="text-muted pull-right">geplaatst
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
                            @if(\Auth::check() && $ticket->first()->status != 'completed')
                                {{ Form::open(['class' => 'form-horizontal', 'route' => ['admin.ticket.store', $ticket->first()->id]]) }}

                                {{ Form::label('Antwoord', 'Antwoord:', ['class' => 'control-label']) }}
                                {{ Form::textarea('antwoord', null, ['class' => 'form-control', 'rows' => '3']) }}
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