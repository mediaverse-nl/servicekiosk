@extends('layouts.admin')

@section('title', 'Clients')

@section('content')

    {{dd($mollie->customersMandates())}}


@endsection

@push('css')
<style>

</style>
@endpush

@push('js')
<script>

</script>
@endpush