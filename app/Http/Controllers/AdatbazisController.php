<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Varos;

class AdatbazisController extends Controller
{
    function index() {
        $varosok = Varos::with('megye', 'lelekszams')->get();
        return view('adatbazis', compact('varosok'));
    }
}