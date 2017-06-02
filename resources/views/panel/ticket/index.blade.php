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
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Ref. nr.</th>
                                    <th>Titel</th>
                                    <th>Aangemaakt</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ticket as $t)
                                    <tr>
                                        <td>
                                            {!! $t->id !!}
                                        </td>
                                        <td>
                                            {!! $t->titel !!}
                                        </td>
                                        <td>
                                            {!! $t->created_at !!}
                                        </td>
                                        <td>
                                            {!! $t->status !!}
                                        </td>
                                        <td>
                                            <a href="{!! route('panel.view', $t->id) !!}"
                                               class="btn btn-default pull-right">Bekijken</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <a class="btn btn-default" href="{!! route('panel.ticket.create') !!}">
                                Nieuw ticket
                            </a>
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