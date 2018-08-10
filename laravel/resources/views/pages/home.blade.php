@extends('app')

@section('content')
    <div class="jumbotron">
        <h1>{{ env('SITE_NAME', 'Hello World!') }}</h1>

        {!! env('SITE_DESCRIPTION', '[Site description goes here]') !!}

        <hr>

        <p>
            <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
        </p>
    </div>
@endsection
