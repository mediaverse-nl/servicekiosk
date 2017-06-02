@extends('layouts.admin')

@section('title', 'Product')

@section('content')

    <!-- /.row -->
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            {!! Form::model($product, ['class' => 'form-horizontal', 'route' => ['admin.product.view', $product->id], 'method' => 'patch']) !!}
                            {!! Form::label('Naam', 'Naam:', ['class' => 'control-label']) !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            {!! Form::label('Beschrijving', 'Beschrijving:', ['class' => 'control-label']) !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5']) !!}
                            {!! Form::label('Status', 'Status:', ['class' => 'control-label']) !!}
                            {!! Form::select('status', \App\Product::status(),$product->status, ['class' => 'form-control']) !!}
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