<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uzenet extends Model
{
    //uzenetek' nevű táblát használja
    protected $table = 'uzenetek';

    // Engedély mezők kitöltése
    protected $fillable = ['nev', 'email', 'szoveg'];
}