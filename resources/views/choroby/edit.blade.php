<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Chorobę</title>
    <link rel="stylesheet" href="{{ asset('css_login.css') }}">
</head>
<body>
    <div class="login-box">
        <h1>Edytuj Chorobę</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('choroby.update', $choroba->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="user-box">
                <input type="text" name="nazwa" value="{{ old('nazwa', $choroba->nazwa) }}" required>
                <label>Nazwa</label>
            </div>

            <button type="submit" class="btn">Zapisz</button>
            <p></p>
            <a href="{{ route('choroby.index') }}" class="btn btn-secondary">Anuluj</a>
        </form>
    </div>
</body>
</html>
