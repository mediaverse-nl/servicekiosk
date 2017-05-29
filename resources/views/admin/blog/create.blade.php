@extends('layouts.admin')

@section('title', 'Nieuws')

@section('content')

    <!-- /.row -->
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            {!! Form::open(['class' => 'form-horizontal', 'route' => ['admin.blog.create']]) !!}
                            {!! Form::label('Titel', 'Titel:', ['class' => 'control-label']) !!}
                            {!! Form::text('titel', '', ['class' => 'form-control']) !!}
                            {!! Form::label('Bericht', 'Bericht:', ['class' => 'control-label']) !!}
                            {!! Form::textarea('tekst', null, ['class' => 'form-control', 'rows' => '3']) !!}
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