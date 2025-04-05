<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Pacjenta</title>
    <link rel="stylesheet" href="{{ secure_asset('css_login.css') }}">
</head>
<body>
    <div class="login-box">
        <h1>Edytuj Pacjenta</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pacjenci.update', $pacjent->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="user-box">
                <input type="text" name="imie" value="{{ old('imie', $pacjent->imie) }}" required>
                <label>Imię</label>
            </div>

            <div class="user-box">
                <input type="text" name="nazwisko" value="{{ old('nazwisko', $pacjent->nazwisko) }}" required>
                <label>Nazwisko</label>
            </div>

            <div class="user-box">
                <input type="text" name="pesel" value="{{ old('pesel', $pacjent->pesel) }}" required>
                <label>PESEL</label>
            </div>

            <div class="user-box">
                <input type="text" name="telefon" value="{{ old('telefon', $pacjent->telefon) }}" required>
                <label>Telefon</label>
            </div>

            <div class="user-box">
                <input type="date" name="data_urodzenia" value="{{ old('data_urodzenia', $pacjent->data_urodzenia) }}" required>
                <label>Data Urodzenia</label>
            </div>

            <button type="submit" class="btn">Zapisz</button>
            <p></p>
            <a href="{{ route('pacjenci.index') }}" class="btn btn-secondary">Anuluj</a>
        </form>
    </div>
</body>
</html>
