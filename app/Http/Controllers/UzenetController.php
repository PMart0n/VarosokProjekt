<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller; //ha nem találja az alap Controllert
use App\Models\Uzenet;

class UzenetController extends Controller
{
    //Kapcsolat űrlap megjelenítése
    public function create()
    {
        return view('kapcsolat');
    }

    //üzenet elmentése (POST kérés)
    public function store(Request $request)
    {
        // Validáció
        $request->validate([
            'nev' => 'required|min:3',
            'email' => 'required|email',
            'szoveg' => 'required|min:5',
        ], [
            'nev.required' => 'A név megadása kötelező!',
            'email.required' => 'Az email cím megadása kötelező!',
            'szoveg.required' => 'Az üzenet szövege nem lehet üres!',
        ]);

        // Mentés adatbázisba
        Uzenet::create([
            'nev' => $request->nev,
            'email' => $request->email,
            'szoveg' => $request->szoveg,
        ]);

        // Visszairányítás
        return redirect()->route('kapcsolat')->with('success', 'Köszönjük! Üzenetét sikeresen elküldtük.');
    }

    //elküldött üzenetek listázása
    public function index()
    {
        $user = auth()->user();
        if ($user->role !== 'user' && $user->role !== 'admin') {
            abort(403); // Hozzáférés megtagadva
        }

        $uzenetek = Uzenet::orderBy('created_at', 'desc')->get();
        return view('uzenetek', compact('uzenetek'));
    }
}