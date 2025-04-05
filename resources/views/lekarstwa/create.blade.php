<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Lekarstwo</title>
    <link rel="stylesheet" href="{{ asset('css_login.css') }}">
</head>
<body>
    <div class="login-box">
        <h1>Dodaj Nowe Lekarstwo</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('lekarstwa.store') }}" method="POST">
            @csrf
            <div class="user-box">
                <input type="text" name="nazwa" value="{{ old('nazwa') }}" required>
                <label>Nazwa</label>
            </div>

            <div class="user-box">
                <select name="dostepnosc" required>
                    <option value="1" {{ old('dostepnosc') == '1' ? 'selected' : '' }}>Dostępne</option>
                    <option value="0" {{ old('dostepnosc') == '0' ? 'selected' : '' }}>Niedostępne</option>
                </select>
                <label>Dostępność</label>
            </div>

            <button type="submit" class="btn">Dodaj</button>
        </form>
    </div>
</body>
</html>
