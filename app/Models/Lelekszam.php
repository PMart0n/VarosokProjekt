<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lelekszam extends Model
{
    protected $table = 'lelekszam';

    public function varos()
    {
        return $this->belongsTo(Varos::class, 'varos_id', 'id');
    }
}
