<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Lekarstwo</title>
    <link rel="stylesheet" href="{{ secure_asset('css_login.css') }}">
</head>
<body>
    <div class="login-box">
        <h1>Edytuj Lekarstwo</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('lekarstwa.update', $lekarstwo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="user-box">
                <input type="text" name="nazwa" value="{{ old('nazwa', $lekarstwo->nazwa) }}" required>
                <label>Nazwa</label>
            </div>

            <div class="user-box">
                <select name="dostepnosc" required>
                    <option value="1" {{ old('dostepnosc', $lekarstwo->dostepnosc) == '1' ? 'selected' : '' }}>Dostępne</option>
                    <option value="0" {{ old('dostepnosc', $lekarstwo->dostepnosc) == '0' ? 'selected' : '' }}>Niedostępne</option>
                </select>
                <label>Dostępność</label>
            </div>

            <button type="submit" class="btn">Zapisz</button>
            <p></p>
            <a href="{{ route('lekarstwa.index') }}" class="btn btn-secondary">Anuluj</a>
        </form>
    </div>
</body>
</html>
