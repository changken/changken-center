<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    @include('tpl.head')
</head>
<body>
    <div class="container">
        <header>
            <h1 class="text-center">@yield('title')</h1>
            <nav>
                @include('tpl.nav')
            </nav>
        </header>
        <hr>
        <section>
            @section('content')
            @show
        </section>
        <hr>
        <footer>
            @include('tpl.footer')
        </footer>
    </div>
</body>
</html>