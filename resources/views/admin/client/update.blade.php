@extends('layouts.admin')

@section('title', 'Client')

@section('content')

    <!-- /.row -->
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            {!! Form::model($client, ['class' => 'form-horizontal', 'route' => ['admin.client.edit', $client->id], 'method' => 'patch']) !!}
                            {!! Form::label('Client', 'Client:', ['class' => 'control-label']) !!}
                            {!! Form::text('user', $client->user->firstname.' '.$client->user->lastname, ['class' => 'form-control']) !!}
                            {!! Form::label('Adres', 'Adres:', ['class' => 'control-label']) !!}
                            {!! Form::text('adress', null, ['class' => 'form-control']) !!}
                            {!! Form::label('Postcode', 'Postcode:', ['class' => 'control-label']) !!}
                            {!! Form::text('zipcode', null, ['class' => 'form-control']) !!}
                            {!! Form::label('Plaats', 'Plaats:', ['class' => 'control-label']) !!}
                            {!! Form::text('city', null, ['class' => 'form-control']) !!}
                            {!! Form::label('Bedrijfsnaam', 'Bedrijfsnaam:', ['class' => 'control-label']) !!}
                            {!! Form::text('companyname', null, ['class' => 'form-control']) !!}
                            {!! Form::label('KvK', 'KvK:', ['class' => 'control-label']) !!}
                            {!! Form::text('kvk', null, ['class' => 'form-control']) !!}
                            {!! Form::label('VAT nummer', 'VAT nummer:', ['class' => 'control-label']) !!}
                            {!! Form::text('vatnumber', null, ['class' => 'form-control']) !!}
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