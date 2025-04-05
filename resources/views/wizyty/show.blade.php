<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szczegóły wizyty</title>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
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

        .info-box {
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

        .info-box h1 {
            margin: 0 0 40px;
            padding: 0;
            color: #91cdd6;
            text-align: center;
        }

        .info-box .info-item {
            position: relative;
            margin-bottom: 30px;
            color: #fff;
        }

        .info-box .info-item span {
            display: block;
            font-size: 20px;
            color: #fff;
            pointer-events: none;
            transition: .5s;
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
            margin-top: 30px;
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
    </style>
</head>
<body>
    <div class="info-box">
        <h1>Szczegóły wizyty</h1>
        <div class="info-item">
            <span>Wizyta #: {{ $wizyta->id }}</span>
        </div>
        <div class="info-item">
            <span>Pacjent: {{ $wizyta->pacjent->imie }} {{ $wizyta->pacjent->nazwisko }}</span>
        </div>
        <div class="info-item">
            <span>Lekarz: {{ $wizyta->lekarz->imie }} {{ $wizyta->lekarz->nazwisko }}</span>
        </div>
        <div class="info-item">
            <span>Data wizyty: {{ $wizyta->data_wizyty }}</span>
        </div>
        <div class="info-item">
            <span>Opis: {{ $wizyta->opis }}</span>
        </div>
        <div class="info-item">
            <span>Choroba: {{ $wizyta->choroba ? $wizyta->choroba->nazwa : 'Brak' }}</span>
        </div>
        <div class="info-item">
            <span>Leczenie: {{ $wizyta->leczenie ? $wizyta->leczenie->nazwa : 'Brak' }}</span>
        </div>
        <a href="{{ route('wizyty.index') }}" class="btn">Powrót</a>
    </div>
</body>
</html>
