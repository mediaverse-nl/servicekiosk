@extends('layouts.panel')

@section('title', 'ticket')

@section('content')

    <div class="container">
        <div class="row">
            @include('layouts.panel-group-menu')
            <div class="col-sm-9 pull-right">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tickets
                    </div>
                    <div class="panel-body">
                        {{ Form::open(['class' => 'form-horizontal', 'route' => ['panel.ticket.create'], 'method' => 'post']) }}
                        {{ Form::label('Onderwerp', 'Onderwerp', ['class' => 'control-label']) }}
                        {{ Form::text('onderwerp', '', ['class' => 'form-control']) }}
                        {{ Form::label('Probleem', 'Probleem', ['class' => 'control-label']) }}
                        {{ Form::textarea('probleem', null, ['class' => 'form-control', 'rows' => '3']) }}
                        {{ Form::label('Prioriteit', 'Prioriteit', ['class' => 'control-label']) }}
                        {{ Form::select('prioriteit', $p, '', ['class' => 'form-control']) }}
                        {{ Form::submit('Verzenden', ['class' => 'btn btn-default pull-right']) }}
                        {{ Form::close() }}
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