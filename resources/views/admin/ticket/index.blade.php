@extends('layouts.admin')

@section('title', 'Support tickets')

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
                                    <th>Ref. nr.</th>
                                    <th>Titel</th>
                                    <th>Aangemaakt</th>
                                    <th>Status</th>
                                    <th>Prioriteit</th>
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
                                            {!! $t->priority !!}
                                        </td>
                                        <td>
                                            <a href="{!! route('admin.ticket.view', $t->id) !!}"
                                               class="btn btn-default">Bekijken</a>
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