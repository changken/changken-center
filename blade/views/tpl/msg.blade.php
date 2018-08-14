@extends('tpl.main')

@section('title', $title)

@section('content')
    @switch($status)
        @case(0)
            <div class="alert alert-danger" role="alert">
                <p class="text-center text-danger">{{ $msg }}</p>
            </div>
        @break
        @case(1)
            <div class="alert alert-success" role="alert">
                <p class="text-center text-success">{{ $msg }}</p>
            </div>
        @break
        @case(2)
            <div class="alert alert-warning" role="alert">
                <p class="text-center text-warning">{{ $msg }}</p>
            </div>
        @break
        @case(3)
            <div class="alert alert-info" role="alert">
                <p class="text-center text-info">{{ $msg }}</p>
            </div>
        @break
        @default
            <div class="alert alert-primary" role="alert">
                <p class="text-center text-primary">{{ $msg }}</p>
            </div>
    @endswitch
    <meta http-equiv="refresh" content="2; url={{ $redirectTo }}">
@endsection