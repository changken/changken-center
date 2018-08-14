@extends('tpl.main')

@section('title', '登入')

@section('content')
    <form method="post" action="{{ url('loginc.php') }}" name="login">
        <table class="table table-bordered mx-auto w-50">
            <thead class="thead-dark">
                <tr>
                    <th>登入</th>
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
                        <div class="form-group">
                            <label for="password">密碼:</label>
                            <input name="password" id="password" type="password" class="form-control">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" class="btn btn-primary">登入</button>
                        沒有帳號？<a href="{{ url('reg.php') }}">註冊</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
@endsection