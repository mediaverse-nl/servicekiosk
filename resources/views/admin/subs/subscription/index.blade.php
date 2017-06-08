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
                                <th>Console id</th>
                                <th>Subscription type</th>
                                <th>Gebruiker</th>
                                <th>Start datum</th>
                                <th>Eind datum</th>
                                </thead>
                                <tbody>
                                @foreach($sub as $x)
                                    <tr>
                                        <td>{!! $x->console_id !!}</td>
                                        {{-- TODO: Martijn, krijg $x->subscriptiontype->name niet werkend, error: trying to get property of non-object --}}
                                        <td>{!! $x->subscriptiontype['name'] !!}</td>
                                        <td>{!! $console !!}</td>
                                        <td>{!! $x->startdate !!}</td>
                                        <td>{!! $x->enddate !!}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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