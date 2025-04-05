<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ secure_asset('css_login.css') }}">
    <title>Sign Up</title>
</head>
<body>
    <div class="login-box">
        <h1>Sign Up</h1>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="user-box">
                <input type="text" name="imie" value="{{ old('imie') }}" required>
                <label>First Name</label>
                @error('imie')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="user-box">
                <input type="text" name="nazwisko" value="{{ old('nazwisko') }}" required>
                <label>Surname</label>
                @error('nazwisko')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="user-box">
                <input type="text" name="pesel" value="{{ old('pesel') }}" required>
                <label>Pesel</label>
                @error('pesel')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="user-box">
                <input type="email" name="email" value="{{ old('email') }}" required>
                <label>Email</label>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="user-box">
                <input type="text" name="telefon" value="{{ old('telefon') }}" required>
                <label>Phone Number</label>
                @error('telefon')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="user-box">
                <input type="date" name="data_urodzenia" value="{{ old('data_urodzenia') }}" required>
                <label>Date of Birth</label>
                @error('data_urodzenia')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="user-box">
                <input type="password" name="password" required>
                <label>Password</label>
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="user-box">
                <input type="password" name="password_confirmation" required>
                <label>Confirm Password</label>
                @error('password_confirmation')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn">Sign Up</button>
        </form>
    </div>
</body>
</html>
