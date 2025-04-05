<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Aptekę</title>
    <link rel="stylesheet" href="{{ secure_asset('css_login.css') }}">
</head>
<body>
    <div class="login-box">
        <h1>Edytuj Aptekę</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('apteki.update', $apteka->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="user-box">
                <input type="text" name="miasto" value="{{ old('miasto', $apteka->miasto) }}" required>
                <label>Miasto</label>
            </div>

            <div class="user-box">
                <input type="text" name="ulica" value="{{ old('ulica', $apteka->ulica) }}" required>
                <label>Ulica</label>
            </div>

            <div class="user-box">
                <input type="text" name="numer" value="{{ old('numer', $apteka->numer) }}" required>
                <label>Numer</label>
            </div>

            <div class="user-box">
                <input type="text" name="telefon" value="{{ old('telefon', $apteka->telefon) }}" required>
                <label>Telefon</label>
            </div>

            <div class="user-box">
                <input type="email" name="email" value="{{ old('email', $apteka->email) }}" required>
                <label>Email</label>
            </div>

            <button type="submit" class="btn">Zapisz</button>
            <p></p>
            <a href="{{ route('apteki.index') }}" class="btn btn-secondary">Anuluj</a>
        </form>
    </div>
</body>
</html>
