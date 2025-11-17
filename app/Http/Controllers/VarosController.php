<?php

namespace App\Http\Controllers;

use App\Models\Varos;
use App\Models\Megye;
use Illuminate\Http\Request;

class VarosController extends Controller
{
    /**
     * LISTÁZÁS
     * Megjeleníti a városokat a táblázatban.
     */
    public function index()
    {
        // Lekérjük a városokat (20 db / oldal), betöltve a megye adatait is
        // A 'latest()' miatt a legutóbb módosítottak/hozzáadottak lesznek elöl
        $varosok = Varos::with('megye')->paginate(20);

        return view('crud', compact('varosok'));
    }

    /**
     * ŰRLAP MEGJELENÍTÉSE
     * Betölti az "Új hozzáadása" oldalt a megye listával.
     */
    public function create()
    {
        // ABC sorrendben megyék a legördülő listához
        $megyek = Megye::orderBy('nev')->get();
        return view('varosok.create', compact('megyek'));
    }

    /**
     * MENTÉS
     * Elmenti az új várost az adatbázisba.
     */
    public function store(Request $request)
    {
        // 1. Validáció
        $request->validate([
            'nev' => 'required|string|max:255',
            'megyeid' => 'required|exists:megye,id', // Csak létező megyét fogad el
        ]);

        //Mentés
        Varos::create([
            'nev' => $request->nev,
            'megyeid' => $request->megyeid,
            // A checkbox 'on' értéket küld vagy semmit, ezt alakítjuk boolean-re (1 vagy 0)
            'megyeszekhely' => $request->has('megyeszekhely'),
            'megyeijogu' => $request->has('megyeijogu'),
        ]);

        return redirect()->route('varosok.index')
                         ->with('success', 'Város sikeresen létrehozva!');
    }

    /**
     * SZERKESZTÉS
     * Betölti az űrlapot a meglévő adatokkal.
     */
    public function edit($id)
    {
        $varos = Varos::findOrFail($id);
        $megyek = Megye::orderBy('nev')->get();
        
        //
        return view('varosok.edit', compact('varos', 'megyek'));
    }

    /**
     * FRISSÍTÉS
     * Elmenti a módosításokat.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nev' => 'required|string|max:255',
            'megyeid' => 'required|exists:megye,id',
        ]);

        $varos = Varos::findOrFail($id);
        
        $varos->update([
            'nev' => $request->nev,
            'megyeid' => $request->megyeid,
            'megyeszekhely' => $request->has('megyeszekhely'),
            'megyeijogu' => $request->has('megyeijogu'),
        ]);

        return redirect()->route('varosok.index')
                         ->with('success', 'Város sikeresen frissítve!');
    }

    /**
     * TÖRLÉS
     * Törli a várost.
     */
    public function destroy($id)
    {
        $varos = Varos::findOrFail($id);

        //Először töröljük a hozzá tartozó népesség adatokat (hogy ne legyen SQL hiba)
        // Ehhez a Varos modellben definált 'lelekszams' kapcsolatot használjuk
        $varos->lelekszams()->delete();

        //Maga a város törlése
        $varos->delete();

        return redirect()->route('varosok.index')
                         ->with('success', 'Város sikeresen törölve.');
    }
}