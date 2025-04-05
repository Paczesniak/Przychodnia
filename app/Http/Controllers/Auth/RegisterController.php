<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pacjent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'imie' => 'required|string|max:255',
            'nazwisko' => 'required|string|max:255',
            'pesel' => 'required|string|max:255|unique:pacjent',
            'email' => 'required|string|email|max:255|unique:users',
            'telefon' => 'required|string|max:11',
            'data_urodzenia' => 'required|date',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Log::info('Validated data:', $validatedData);


        $user = User::create([
            'name' => $validatedData['imie'] . ' ' . $validatedData['nazwisko'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => 'pacjent',
        ]);

        Log::info('Created user:', $user->toArray());


        $pacjent = Pacjent::create([
            'user_id' => $user->id,
            'imie' => $validatedData['imie'],
            'nazwisko' => $validatedData['nazwisko'],
            'pesel' => $validatedData['pesel'],
            'email' => $validatedData['email'],
            'telefon' => $validatedData['telefon'],
            'data_urodzenia' => $validatedData['data_urodzenia'],
        ]);

        Log::info('Created pacjent:', $pacjent->toArray());

        auth()->login($user);

        return redirect('main');
    }
}
