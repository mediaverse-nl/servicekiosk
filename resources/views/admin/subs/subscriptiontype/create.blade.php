@extends('layouts.admin')

@section('title', 'Nieuw subscription type')

@section('content')

    <!-- /.row -->
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            {!! Form::open(['class' => 'form-horizontal', 'route' => ['admin.sub.subscription.store']]) !!}
                            {!! Form::label('Naam', 'Naam:', ['class' => 'control-label']) !!}
                            {!! Form::text('name', '', ['class' => 'form-control']) !!}
                            {!! Form::label('Duur', 'Duur in maanden:', ['class' => 'control-label']) !!}
                            {!! Form::select('duration', $dates, '1', ['class' => 'form-control']) !!}
                            {!! Form::label('Prijs', 'Prijs:', ['class' => 'control-label']) !!}
                            {!! Form::text('price', null, ['class' => 'form-control']) !!}
                            {!! Form::label('Korting', 'Korting:', ['class' => 'control-label']) !!}
                            {!! Form::text('discount', null, ['class' => 'form-control']) !!}
                            <br>
                            {!! Form::submit('Verzenden', ['class' => 'btn btn-default pull-right']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">

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