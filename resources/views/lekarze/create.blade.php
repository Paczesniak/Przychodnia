<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Lekarza</title>
    <link rel="stylesheet" href="{{ secure_asset('css_login.css') }}">
</head>
<body>
    <div class="login-box">
        <h1>Dodaj Nowego Lekarza</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('lekarze.store') }}" method="POST">
            @csrf
            <div class="user-box">
                <input type="text" name="imie" value="{{ old('imie') }}" required>
                <label>Imię</label>
            </div>

            <div class="user-box">
                <input type="text" name="nazwisko" value="{{ old('nazwisko') }}" required>
                <label>Nazwisko</label>
            </div>

            <div class="user-box">
                <input type="email" name="email" value="{{ old('email') }}" required>
                <label>Email</label>
            </div>

            <div class="user-box">
                <input type="text" name="telefon" value="{{ old('telefon') }}" required>
                <label>Telefon</label>
            </div>

            <div class="user-box">
                <input type="password" name="password" required>
                <label>Hasło</label>
            </div>

            <div class="user-box">
                <input type="password" name="password_confirmation" required>
                <label>Potwierdź Hasło</label>
            </div>

            <button type="submit" class="btn">Dodaj</button>
        </form>
    </div>
</body>
</html>
