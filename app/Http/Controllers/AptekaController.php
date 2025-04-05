<?php

namespace App\Http\Controllers;

use App\Models\Apteka;
use Illuminate\Http\Request;

class AptekaController extends Controller
{

    public function index()
    {
        $apteki = Apteka::all();
        return view('apteki.index', compact('apteki'));
    }
    public function create()
    {
        return view('apteki.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'miasto' => 'required',
            'ulica' => 'required',
            'numer' => 'required',
            'telefon' => 'required',
            'email' => 'required|email',
        ]);

        Apteka::create($request->all());

        return redirect()->route('apteki.index')->with('success', 'Apteka została dodana.');
    }


    public function edit($id)
    {
        $apteka = Apteka::findOrFail($id);
        return view('apteki.edit', compact('apteka'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'miasto' => 'required',
            'ulica' => 'required',
            'numer' => 'required',
            'telefon' => 'required',
            'email' => 'required|email',
        ]);

        $apteka = Apteka::findOrFail($id);
        $apteka->update($request->all());

        return redirect()->route('apteki.index')->with('success', 'Apteka została zaktualizowana.');
    }


    public function destroy($id)
    {
        $apteka = Apteka::findOrFail($id);
        $apteka->delete();

        return redirect()->route('apteki.index')->with('success', 'Apteka została usunięta.');
    }
}
