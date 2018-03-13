<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0"/>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"/>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</head>
<body>
@yield('body')
</body>
</html>
