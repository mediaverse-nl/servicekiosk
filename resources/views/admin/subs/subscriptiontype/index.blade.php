@extends('layouts.admin')

@section('title', 'Subscriptions')

@section('content')

    <!-- /.row -->
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Naam</th>
                                    <th>Duur</th>
                                    <th>Prijs</th>
                                    <th>Korting</th>
                                    <th>Opties</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subscription as $s)
                                    <tr>
                                        <td>
                                            {!! $s->id !!}
                                        </td>
                                        <td>
                                            {!! $s->name !!}
                                        </td>
                                        <td>
                                            {!! $s->duration !!}
                                        </td>
                                        <td>
                                            {!! $s->price !!}
                                        </td>
                                        <td>
                                            {!! $s->discount !!}
                                        </td>
                                        <td>
                                            <div class="pull-right __web-inspector-hide-shortcut__">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                        Opties
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right" role="menu">
                                                        <li>
                                                            <a href="{{route('admin.subs.subscriptiontype.view', $s->id)}}">Wijzigen</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('admin.subs.subscriptiontype.destroy', $s->id)}}">Verwijderen</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="{!! route('admin.subs.subscription.create') !!}" class="btn btn-default">Nieuw subscription</a>
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