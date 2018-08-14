@extends('tpl.main')

@section('title', '註冊')

@section('content')
    <form method="post" action="{{ url('regc.php') }}" name="reg">
        <table class="table table-bordered mx-auto w-50">
            <thead class="thead-dark">
                <tr>
                    <th>註冊</th>
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
                            <label for="email">email:</label>
                            <input name="email" id="email" type="text" class="form-control">
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
                        <div class="form-group">
                            <label for="password2">密碼(再輸入一次):</label>
                            <input name="password2" id="password2" type="password" class="form-control">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" class="btn btn-primary">註冊</button>
                        已有帳號？<a href="{{ url('login.php') }}">登入</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
@endsection