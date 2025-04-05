<?php

namespace App\Http\Controllers;

use App\Models\HistoriaWizytWidok;
use Illuminate\Http\Request;

class HistoriaWizytWidokController extends Controller
{
    public function index(Request $request)
    {
        $query = HistoriaWizytWidok::query();

        if ($request->has('data_od') && $request->data_od) {
            $query->where('data_wizyty', '>=', $request->data_od);
        }

        if ($request->has('data_do') && $request->data_do) {
            $query->where('data_wizyty', '<=', $request->data_do);
        }

        if ($request->has('status') && $request->status == 'usunięte') {
            $query->where('opis', 'LIKE', '%Wizyta została usunięta%');
        } elseif ($request->has('status') && $request->status == 'aktywny') {
            $query->where('opis', 'NOT LIKE', '%Wizyta została usunięta%');
        }


        $historia = $query->orderBy('id', 'asc')->get();
        return view('historia.index', compact('historia'));
    }
}
