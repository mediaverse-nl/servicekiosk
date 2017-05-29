@extends('layouts.admin')

@section('title', 'All Clients')

@section('content')

{{--    {{dd($mollie->customersMandates())}}--}}

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>Opties</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <th scope="row">{!! $client->id !!}</th>
                                        <td>{!! $client->user->firstname !!}</td>
                                        <td>{!! $client->user->lastname !!}</td>
                                        <td>{!! $client->user->name !!}</td>
                                        <td>
                                            <div class="__web-inspector-hide-shortcut__">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                        Opties
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right" role="menu">
                                                        <li>
                                                            <a href="{!! route('admin.client.edit', $client->id) !!}">Wijzigen</a>
                                                        </li>
                                                        <li>
                                                            <a href="{!! route('admin.client.delete', $client->id) !!}">Verwijderen</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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