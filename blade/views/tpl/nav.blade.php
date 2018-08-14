<ul class="nav nav-tabs justify-content-center">
    <li class="nav-item"><a class="nav-link" href="{{ url('index.php') }}">首頁</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('reg.php') }}">註冊</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('login.php') }}">登入</a></li>
    @if(Auth::check())
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">會員系統</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ url('update.php') }}">更新帳號資訊</a>
                <a class="dropdown-item" href="{{ url('delete.php') }}">刪除會員</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('logout.php') }}">登出【{{ Auth::getUsername() }}】</a>
            </div>
        </li>
    @endif
</ul>