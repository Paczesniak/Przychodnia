<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pacjent;
use App\Models\Wizyta;
use App\Models\User;

class PacjentController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'lekarz') {
            $pacjentIds = Wizyta::where('id_lekarz', $user->lekarz->id)->pluck('id_pacjent')->toArray();
            $pacjenci = Pacjent::whereIn('id', $pacjentIds)->with('user')->get();
        } else {
            $pacjenci = Pacjent::all();
        }

        return view('pacjenci.index', compact('pacjenci'));
    }

    public function edit($id)
    {
        $pacjent = Pacjent::findOrFail($id);
        $users = User::all();
        $lekarze = User::where('role', 'lekarz')->get();

        return view('pacjenci.edit', compact('pacjent', 'users', 'lekarze'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'imie' => 'required',
            'nazwisko' => 'required',
            'pesel' => 'required|unique:pacjent,pesel,' . $id,
            'telefon' => 'required',
            'data_urodzenia' => 'required|date',
        ]);

        $pacjent = Pacjent::findOrFail($id);
        $pacjent->update($request->all());

        return redirect()->route('pacjenci.index')->with('success', 'Pacjent został zaktualizowany.');
    }

    public function destroy($id)
    {
        $pacjent = Pacjent::findOrFail($id);
        $user = $pacjent->user;
        $pacjent->delete();
        $user->delete();

        return redirect()->route('pacjenci.index')->with('success', 'Pacjent został usunięty.');
    }

    public function show($id)
    {
        $pacjent = Pacjent::with('user')->findOrFail($id);
        $visitDetails = $pacjent->getVisitDetails();
        $visitCount = $pacjent->getVisitCount();

        return view('pacjenci.show', compact('pacjent', 'visitDetails', 'visitCount'));
    }
}
