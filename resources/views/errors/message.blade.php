@if($errors->any())
    {{--<div class="container">--}}
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </div>
    {{--</div>--}}
@endif

@if(Session::has('succes_message'))
    <div class="alert alert-success fade in "><span class="glyphicon glyphicon-ok"></span><em> {!! session('succes_message') !!}</em></div>
@endif

@if(Session::has('success'))
    <div class="alert alert-success fade in "><span class="glyphicon glyphicon-ok"></span><em> {!! session('succes_message') !!}</em></div>
@endif