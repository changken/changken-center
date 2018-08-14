@extends('tpl.main')

@section('title', '更新帳號資訊')

@section('content')
    @if(Auth::check())
    <form method="post" action="{{ url('updatec.php') }}" name="reg">
        <table class="table table-bordered mx-auto w-50">
            <thead class="thead-dark">
                <tr>
                    <th>更新帳號資訊</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="username">使用者:</label>
                            <input name="username" id="username" type="text" value="{{ $row['username'] }}" class="form-control" readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="email">email:</label>
                            <input name="email" id="email" type="text" value="{{ $row['email'] }}" class="form-control"><br>
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
                            <label for="level">等級:</label>
                            <input name="level" id="level" type="text" value="{{ $row['level'] }}" class="form-control" readonly><br>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" class="btn btn-primary">更新</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    @else
        @include('tpl.warning')
    @endif
@endsection