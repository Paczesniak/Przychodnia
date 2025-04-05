<?php

namespace App\Http\Controllers;

use App\Models\Lekarstwo;
use Illuminate\Http\Request;

class LekarstwoController extends Controller
{

    public function index()
    {
        $lekarstwa = Lekarstwo::all();
        return view('lekarstwa.index', compact('lekarstwa'));
    }
    public function create()
    {
        return view('lekarstwa.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nazwa' => 'required',
            'dostepnosc' => 'required|boolean',
        ]);

        Lekarstwo::create($request->all());

        return redirect()->route('lekarstwa.index')->with('success', 'Lekarstwo zostało dodane.');
    }


    public function edit($id)
    {
        $lekarstwo = Lekarstwo::findOrFail($id);
        return view('lekarstwa.edit', compact('lekarstwo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nazwa' => 'required',
            'dostepnosc' => 'required|boolean',
        ]);

        $lekarstwo = Lekarstwo::findOrFail($id);
        $lekarstwo->update($request->all());

        return redirect()->route('lekarstwa.index')->with('success', 'Lekarstwo zostało zaktualizowane.');
    }

    public function destroy($id)
    {
        $lekarstwo = Lekarstwo::findOrFail($id);
        $lekarstwo->delete();

        return redirect()->route('lekarstwa.index')->with('success', 'Lekarstwo zostało usunięte.');
    }
}
