<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Aptekę</title>
    <link rel="stylesheet" href="{{ secure_asset('css_login.css') }}">
</head>
<body>
    <div class="login-box">
        <h1>Dodaj Nową Aptekę</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('apteki.store') }}" method="POST">
            @csrf
            <div class="user-box">
                <input type="text" name="miasto" value="{{ old('miasto') }}" required>
                <label>Miasto</label>
            </div>

            <div class="user-box">
                <input type="text" name="ulica" value="{{ old('ulica') }}" required>
                <label>Ulica</label>
            </div>

            <div class="user-box">
                <input type="text" name="numer" value="{{ old('numer') }}" required>
                <label>Numer</label>
            </div>

            <div class="user-box">
                <input type="text" name="telefon" value="{{ old('telefon') }}" required>
                <label>Telefon</label>
            </div>

            <div class="user-box">
                <input type="email" name="email" value="{{ old('email') }}" required>
                <label>Email</label>
            </div>

            <button type="submit" class="btn">Dodaj</button>
        </form>
    </div>
</body>
</html>
