<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta name="author" content="Andrei Glazunov">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="theme-color" content="black">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1, ya-title=white, ya-dock=white"/>
<head>
    <title>АСКПД</title>
    @vite('resources/sass/app.sass')
</head>
<body>
<a id="anchorAppUp" style="display: none;"></a>
<div id="app">
</div>
@include('layouts.authUser')
@vite('resources/ts/app.ts')
</body>
</html>
