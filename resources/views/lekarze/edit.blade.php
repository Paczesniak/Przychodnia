<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Lekarza</title>
    <link rel="stylesheet" href="{{ asset('css_login.css') }}">
</head>
<body>
    <div class="login-box">
        <h1>Edytuj Lekarza</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('lekarze.update', $lekarz->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="user-box">
                <input type="text" name="imie" value="{{ old('imie', $lekarz->imie) }}" required>
                <label>Imię</label>
            </div>

            <div class="user-box">
                <input type="text" name="nazwisko" value="{{ old('nazwisko', $lekarz->nazwisko) }}" required>
                <label>Nazwisko</label>
            </div>

            <div class="user-box">
                <input type="email" name="email" value="{{ old('email', $lekarz->user->email) }}" required>
                <label>Email</label>
            </div>

            <div class="user-box">
                <input type="text" name="telefon" value="{{ old('telefon', $lekarz->telefon) }}" required>
                <label>Telefon</label>
            </div>

            <button type="submit" class="btn ">Zapisz</button>
        <p></p>
            <a href="{{ route('lekarze.index') }}" class="btn btn-secondary">Anuluj</a>
        </form>
    </div>
</body>
</html>
