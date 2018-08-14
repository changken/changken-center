@extends('tpl.main')

@section('title', '刪除會員')

@section('content')
    @if(Auth::check(function ($user, $level) {
        return $level == "admin";
    }))
        <div class="alert alert-danger" role="alert">
            <p class="text-center text-danger">此動作不可回復！</p>
            <p class="text-center text-danger">不能刪除自己！</p>
        </div>
        <form method="post" action="{{ url('deletec.php') }}" name="delete">
            <table class="table table-bordered mx-auto w-50">
                <thead class="thead-dark">
                    <tr>
                        <th>刪除會員</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="username">使用者:</label>
                                <input name="username" id="username" type="text" class="form-control">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" class="btn btn-primary">刪除</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    @else
        @include('tpl.warning')
    @endif
@endsection