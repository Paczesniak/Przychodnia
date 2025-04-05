<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lekarz;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LekarzController extends Controller
{
    public function index()
    {
        $lekarze = Lekarz::with('user')->get();
        return view('lekarze.index', compact('lekarze'));
    }

    public function create()
    {
        return view('lekarze.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'imie' => 'required',
            'nazwisko' => 'required',
            'email' => 'required|email|unique:users,email',
            'telefon' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['imie'] . ' ' . $validatedData['nazwisko'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => 'lekarz',
        ]);

        Lekarz::create([
            'user_id' => $user->id,
            'imie' => $validatedData['imie'],
            'nazwisko' => $validatedData['nazwisko'],
            'telefon' => $validatedData['telefon'],
        ]);

        return redirect()->route('lekarze.index')->with('success', 'Lekarz został dodany.');
    }

    public function edit($id)
    {
        $lekarz = Lekarz::findOrFail($id);
        return view('lekarze.edit', compact('lekarz'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'imie' => 'required',
            'nazwisko' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->input('user_id'),
            'telefon' => 'required',
        ]);

        $lekarz = Lekarz::findOrFail($id);
        $user = $lekarz->user;

        $user->update([
            'name' => $validatedData['imie'] . ' ' . $validatedData['nazwisko'],
            'email' => $validatedData['email'],
        ]);

        $lekarz->update([
            'imie' => $validatedData['imie'],
            'nazwisko' => $validatedData['nazwisko'],
            'telefon' => $validatedData['telefon'],
        ]);

        return redirect()->route('lekarze.index')->with('success', 'Lekarz został zaktualizowany.');
    }

    public function destroy($id)
    {
        $lekarz = Lekarz::findOrFail($id);
        $user = $lekarz->user;
        $lekarz->delete();
        $user->delete();

        return redirect()->route('lekarze.index')->with('success', 'Lekarz został usunięty.');
    }
    public function getPatientCount($id)
    {
        $lekarz = Lekarz::findOrFail($id);
        $patientCount = $lekarz->getPatientCount();

        return response()->json(['patient_count' => $patientCount]);
    }
    public function showPatientCount($id)
{
    $lekarz = Lekarz::findOrFail($id);
    $patientCount = $lekarz->getPatientCount();

    return view('lekarze.show', compact('lekarz', 'patientCount'));
}
public function getVisitsForDay($id, Request $request)
{
    $date = $request->input('date', now()->toDateString());
    $lekarz = Lekarz::findOrFail($id);
    $visits = $lekarz->getVisitsForDay($date);

    return view('lekarze.visits_for_day', compact('lekarz', 'visits', 'date'));
}
}
