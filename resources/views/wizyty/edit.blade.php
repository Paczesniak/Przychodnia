<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Wizytę</title>
    <link rel="stylesheet" href="{{ asset('css_login.css') }}">
    <style>
        <style>
        html {
            height: 100%;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: linear-gradient(#000000, #182738);
        }

        .login-box {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 400px;
            padding: 40px;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, .6);
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
            border-radius: 10px;
            text-align: center;
        }

        .login-box h1 {
            margin: 0 0 40px;
            padding: 0;
            color: #91cdd6;
            text-align: center;
        }

        .login-box .user-box {
            position: relative;
            margin-bottom: 30px;
        }

        .login-box .user-box input,
        .login-box .user-box select,
        .login-box .user-box textarea {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
            background: transparent;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        .login-box .user-box select {
            background: rgba(0, 0, 0, 0.5);
        }

        .login-box .user-box label {
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            pointer-events: none;
            transition: .5s;
        }

        .login-box .user-box input:focus ~ label,
        .login-box .user-box input:valid ~ label,
        .login-box .user-box select:focus ~ label,
        .login-box .user-box select:valid ~ label,
        .login-box .user-box textarea:focus ~ label,
        .login-box .user-box textarea:valid ~ label {
            top: -20px;
            left: 0;
            color: #5bcedf;
            font-size: 12px;
        }

        .btn {
            width: 200px;
            height: 60px;
            text-align: center;
            display: inline-block;
            line-height: 60px;
            color: #fff;
            font-size: 24px;
            text-transform: uppercase;
            text-decoration: none;
            font-family: sans-serif;
            box-sizing: border-box;
            background: linear-gradient(90deg, #5bcedf, #f96161, #fc8f46, #36e494);
            background-size: 400%;
            border-radius: 30px;
            z-index: 1;
            position: relative;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            animation: animate 8s linear infinite;
        }

        .btn:before {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            z-index: -1;
            background: linear-gradient(90deg, #5bcedf, #f96161, #fc8f46, #36e494);
            background-size: 400%;
            border-radius: 40px;
            opacity: 0;
            transition: 0.5s;
        }

        .btn:hover:before {
            filter: blur(10px);
            opacity: 1;
        }

        .error-box {
            color: red;
            margin-top: 10px;
        }

        .error-box ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .error-box li {
            margin-top: 10px;
            margin-bottom: 35px;
        }

        .date-input[type="text"]::placeholder {
            color: transparent;
        }

        .date-input[type="date"]::placeholder {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h1>Edytuj Wizytę</h1>
        <form action="{{ route('wizyty.update', $wizyta->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="user-box">
                <select name="pacjent_id" required>
                    @foreach($pacjenci as $pacjent)
                        <option value="{{ $pacjent->id }}" {{ $pacjent->id == $wizyta->id_pacjent ? 'selected' : '' }}>
                            {{ $pacjent->imie }} {{ $pacjent->nazwisko }}
                        </option>
                    @endforeach
                </select>
                <label>Pacjent</label>
            </div>
            <div class="user-box">
                <select name="lekarz_id" required>
                    @foreach($lekarze as $lekarz)
                        <option value="{{ $lekarz->id }}" {{ $lekarz->id == $wizyta->id_lekarz ? 'selected' : '' }}>
                            {{ $lekarz->imie }} {{ $lekarz->nazwisko }}
                        </option>
                    @endforeach
                </select>
                <label>Lekarz</label>
            </div>
            <div class="user-box">
                <input type="date" name="data_wizyty" value="{{ $wizyta->data_wizyty }}" required>
                <label>Data Wizyty</label>
            </div>
            <div class="user-box">
                <textarea name="opis" rows="3">{{ $wizyta->opis }}</textarea>
                <label>Opis</label>
            </div>
            <div class="user-box">
                <select name="choroba_id">
                    <option value="">Brak</option>
                    @foreach($choroby as $choroba)
                        <option value="{{ $choroba->id }}" {{ $choroba->id == $wizyta->choroba_id ? 'selected' : '' }}>
                            {{ $choroba->nazwa }}
                        </option>
                    @endforeach
                </select>
                <label>Choroba</label>
            </div>
            <div class="user-box">
                <select name="leczenie_id">
                    <option value="">Brak</option>
                    @foreach($leczenia as $leczenie)
                        <option value="{{ $leczenie->id }}" {{ $leczenie->id == $wizyta->leczenie_id ? 'selected' : '' }}>
                            {{ $leczenie->nazwa }}
                        </option>
                    @endforeach
                </select>
                <label>Leczenie</label>
            </div>
            <button type="submit" class="btn">Zaktualizuj Wizytę</button>
        </form>
    </div>
</body>
</html>
