@extends('tpl.main')

@section('title', '會員中心')

@section('content')
    @if(Auth::check())
        <div class="alert alert-info mx-auto w-50" role="alert">
            <p class="text-center text-info">歡迎使用會員中心！！！<br>
            您現在的權限是: {{ Auth::getLevel() }}</p>
        </div>
    @else
        @include('tpl.warning')
    @endif
@endsection