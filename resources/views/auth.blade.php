<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1, ya-title=white, ya-dock=white" />
<head>
    <title>Авторизация</title>
    @vite('resources/sass/auth.sass')
</head>
<body>
<div id="auth">
</div>
@vite('resources/ts/auth.ts')
</body>
</html>
