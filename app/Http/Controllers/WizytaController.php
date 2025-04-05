<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wizyta;
use App\Models\Pacjent;
use App\Models\Lekarz;
use App\Models\Choroba;
use App\Models\Lekarstwo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WizytaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'pacjent') {
            $wizyty = Wizyta::where('id_pacjent', $user->pacjent->id)->with(['pacjent', 'lekarz', 'choroba', 'leczenie'])->get();
        } elseif ($user->role === 'lekarz') {
            $wizyty = Wizyta::where('id_lekarz', $user->lekarz->id)->with(['pacjent', 'lekarz', 'choroba', 'leczenie'])->get();
        } else {
            $wizyty = Wizyta::with(['pacjent', 'lekarz', 'choroba', 'leczenie'])->get();
        }


        return view('wizyty.index', compact('wizyty'));
    }

    public function create()
    {
        $pacjenci = Pacjent::all();
        $lekarze = Lekarz::all();
        $choroby = Choroba::all();
        $leczenia = Lekarstwo::all();
        return view('wizyty.create', compact('pacjenci', 'lekarze', 'choroby', 'leczenia'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pacjent_id' => 'required|integer',
            'lekarz_id' => 'required|integer',
            'data_wizyty' => 'required|date',
            'opis' => 'nullable|string',
            'choroba_id' => 'nullable|integer',
            'leczenie_id' => 'nullable|integer',
        ]);

        DB::statement('CALL ScheduleAppointment(?, ?, ?, ?, ?, ?)', [
            $request->pacjent_id,
            $request->lekarz_id,
            $request->data_wizyty,
            $request->opis,
            $request->choroba_id,
            $request->leczenie_id
        ]);



        return redirect()->route('wizyty.index')->with('success', 'Wizyta została dodana.');
    }

    public function edit($id)
    {
        $wizyta = Wizyta::findOrFail($id);
        $pacjenci = Pacjent::all();
        $lekarze = Lekarz::all();
        $choroby = Choroba::all();
        $leczenia = Lekarstwo::all();

        return view('wizyty.edit', compact('wizyta', 'pacjenci', 'lekarze', 'choroby', 'leczenia'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pacjent_id' => 'required|integer',
            'lekarz_id' => 'required|integer',
            'data_wizyty' => 'required|date',
            'opis' => 'nullable|string',
            'choroba_id' => 'nullable|integer',
            'leczenie_id' => 'nullable|integer',
        ]);

        DB::statement('CALL EditAppointment(?, ?, ?, ?, ?, ?, ?)', [
            $id,
            $request->pacjent_id,
            $request->lekarz_id,
            $request->data_wizyty,
            $request->opis,
            $request->choroba_id,
            $request->leczenie_id
        ]);

        return redirect()->route('wizyty.index')->with('success', 'Wizyta została zaktualizowana.');
    }

    public function destroy($id)
    {

        $wizyta = Wizyta::findOrFail($id);


        DB::table('historia_wizyt')->insert([
            'id_pacjent' => $wizyta->id_pacjent,
            'id_lekarz' => $wizyta->id_lekarz,
            'data_wizyty' => $wizyta->data_wizyty,
            'opis' => 'Wizyta została usunięta.',
            'choroba_id' => $wizyta->choroba_id,
            'leczenie_id' => $wizyta->leczenie_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        Wizyta::deleteAppointment($id);


        return redirect()->route('wizyty.index')->with('success', 'Wizyta została usunięta.');
    }

    public function show($id)
    {
        $wizyta = Wizyta::with(['pacjent', 'lekarz', 'choroba', 'leczenie'])->findOrFail($id);
        return view('wizyty.show', compact('wizyta'));
    }
}
