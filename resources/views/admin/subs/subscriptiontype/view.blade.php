@extends('layouts.admin')

@section('title', 'Subscription type')

@section('content')

    <!-- /.row -->
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            {!! Form::model($subscription, ['class' => 'form-horizontal', 'route' => ['admin.sub.subscription.update', $subscription->id], 'method' => 'patch']) !!}
                            {!! Form::label('Naam', 'Naam:', ['class' => 'control-label']) !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            {!! Form::label('Duur', 'Duur in maanden:', ['class' => 'control-label']) !!}
                            {!! Form::select('duration', $dates, null, ['class' => 'form-control']) !!}
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