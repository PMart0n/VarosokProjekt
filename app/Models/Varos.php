<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Varos extends Model
{
    // Tábla neve 
    protected $table = 'varos';

    //Kitölthető mezők
    protected $fillable = ['nev', 'megyeid', 'megyeszekhely', 'megyeijogu'];

    // KAPCSOLAT: Egy város egy megyéhez tartozik
    public function megye()
    {
        return $this->belongsTo(Megye::class, 'megyeid', 'id');
    }

    // KAPCSOLAT: Egy városnak sok népesség adata lehet
    // Ez a biztonságos törléshez kell majd
    public function lelekszams()
    {
        return $this->hasMany(Lelekszam::class, 'varosid', 'id');
    }
}