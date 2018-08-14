@extends('tpl.main')

@section('title', '首頁')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">首頁</h1>
        <p class="lead">總算有一個像樣的首頁囉~XD</p>
        <hr>
        <a class="btn btn-primary btn-lg" href="{{ url('reg.php') }}" role="button">來註冊吧！</a>
    </div>
@endsection