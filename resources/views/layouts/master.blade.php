<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>ICT Asset Management System</title>
        <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
        <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/screen.css') }}">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}" />
        @yield('css')
    </head>

<body>

    <div id="page">
        @include('partials.header')

        <div class="content-center">
            @yield('content')
        </div>

    </div>

    @yield('scripts')
</body>
</html>
