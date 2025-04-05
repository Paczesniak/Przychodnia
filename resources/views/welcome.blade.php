<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przychodnia</title>
    <link rel="stylesheet" href="{{ asset('title.css') }}">
</head>
<body>
    <a href="{{ route('main') }}" class="header-link"><h1 class="gradient-text">Przychodnia</h1></a>
    <i class="background"></i>
    <div>
        <a href="{{ route('login') }}" class="log">Login</a>
        <a href="{{ route('register') }}" class="log">Sign Up</a>
    </div>
</body>
</html>
