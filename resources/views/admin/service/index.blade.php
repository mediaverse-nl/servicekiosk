@extends('layouts.admin')

@section('title', 'Services')

@section('content')

    {{--    {{dd($mollie->customersMandates())}}--}}
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Naam</th>
                                    <th>Beschrijving</th>
                                    <th>Opties</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($service as $s)
                                    <tr>
                                        <th scope="row">{!! $s->id !!}</th>
                                        <td>{!! $s->name !!}</td>
                                        <td>{!! $s->description !!}</td>
                                        <td>
                                            <div class="__web-inspector-hide-shortcut__">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                        Opties
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right" role="menu">
                                                        <li>
                                                            <a href="{!! route('admin.service.view', $s->id) !!}">Wijzigen</a>
                                                        </li>
                                                        <li>
                                                            <a href="{!! route('admin.service.destroy', $s->id) !!}">Verwijderen</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="{!! route('admin.service.create') !!}" class="btn btn-default">Nieuwe service</a>
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