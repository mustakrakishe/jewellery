<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/app.css">
        <title>@yield('page_title')</title>
    </head>
    <body>
        @include('inc.header')

        <div class="container">
            @include('inc.messages')
            @yield('content')
            @include('inc.footer')
        </div>

    </body>
</html>