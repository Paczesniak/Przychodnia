<?php

namespace App\Http\Controllers;

use App\Models\Choroba;
use Illuminate\Http\Request;

class ChorobaController extends Controller
{
    public function index()
    {
        $choroby = Choroba::all();
        return view('choroby.index', compact('choroby'));
    }
    public function create()
    {
        return view('choroby.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nazwa' => 'required',
        ]);

        Choroba::create($request->all());

        return redirect()->route('choroby.index')->with('success', 'Choroba została dodana.');
    }

    public function edit($id)
    {
        $choroba = Choroba::findOrFail($id);
        return view('choroby.edit', compact('choroba'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nazwa' => 'required',
        ]);

        $choroba = Choroba::findOrFail($id);
        $choroba->update($request->all());

        return redirect()->route('choroby.index')->with('success', 'Choroba została zaktualizowana.');
    }

    public function destroy($id)
    {
        $choroba = Choroba::findOrFail($id);
        $choroba->delete();

        return redirect()->route('choroby.index')->with('success', 'Choroba została usunięta.');
    }
}
