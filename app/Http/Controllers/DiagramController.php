<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Megye;
use App\Models\Varos;
use App\Models\Lelekszam;
use Illuminate\Support\Facades\DB;

class DiagramController extends Controller
{
    public function index()
    {
         $megyeStats = DB::table('megye')
            ->leftJoin('varos', 'varos.megyeid', '=', 'megye.id')
            ->leftJoin('lelekszam', 'lelekszam.varosid', '=', 'varos.id')
            ->select('megye.id', 'megye.nev as megye', DB::raw('COALESCE(SUM(lelekszam.osszesen), 0) as nepesseg'))
            ->groupBy('megye.id', 'megye.nev')
            ->orderBy('megye.nev')
            ->get();

        return view('diagram', compact('megyeStats'));
    }
}
