@extends('layouts.panel')

@section('title', 'ticket')

@section('content')

    <div class="container">
        <div class="row">
            @include('layouts.panel-group-menu')
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Account gegevens
                    </div>
                    <div class="panel-body">
                        {{--{!! dd($u) !!}--}}
                        {!! Form::model($u, ['route' => ['panel.account.update', $u->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}
                        {!! Form::label('Naam', 'Naam:', ['class' => 'control-label']) !!}
                        {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
                        {!! Form::label('Achternaam', 'Achternaam:', ['class' => 'control-label']) !!}
                        {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
                        {!! Form::label('Email', 'Email:', ['class' => 'control-label']) !!}
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        {!! Form::label('Telefoon', 'Telefoon nr.:', ['class' => 'control-label']) !!}
                        {!! Form::text('phonenumber', null, ['class' => 'form-control']) !!}
                        {!! Form::label('Adres', 'Adres:', ['class' => 'control-label']) !!}
                        {!! Form::text('adress', $u->client->first()->adress, ['class' => 'form-control']) !!}
                        {!! Form::label('Postcode', 'Postcode:', ['class' => 'control-label']) !!}
                        {!! Form::text('zipcode', $u->client->first()->zipcode, ['class' => 'form-control']) !!}
                        {!! Form::label('Plaats', 'Plaats:', ['class' => 'control-label']) !!}
                        {!! Form::text('city', $u->client->first()->city, ['class' => 'form-control']) !!}
                        {!! Form::label('Bedrijf', 'Bedrijf:', ['class' => 'control-label']) !!}
                        {!! Form::text('companyname', $u->client->first()->companyname, ['class' => 'form-control']) !!}
                        {!! Form::label('KvK', 'KvK:', ['class' => 'control-label']) !!}
                        {!! Form::text('kvk', $u->client->first()->kvk, ['class' => 'form-control']) !!}
                        {!! Form::label('VAT', 'VAT nummer:', ['class' => 'control-label']) !!}
                        {!! Form::text('vatnumber', $u->client->first()->vatnumber, ['class' => 'form-control']) !!}
                        <br>
                        {!! Form::submit('Opslaan', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Wachtwoord resetten
                    </div>
                    <div class="panel-body">
                        {!! Form::open([/*'route' => 'panel.account.update', 'method' => 'post',*/ 'class' => 'form-control']) !!}
                        {!! Form::label('Wachtwoord', 'Wachtwoord:', ['class' => 'control-label']) !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                        {!! Form::label('Herhaal wachtwoord', 'Herhaal wachtwood:', ['class' => 'control-label']) !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                        <br>
                        {!! Form::submit('Opslaan', ['class' => 'btn btn-primary']) !!}
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