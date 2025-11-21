<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Megye extends Model
{
    protected $table = 'megye';

    public function varosok()
    {
        return $this->hasMany(Varos::class, 'megye_id', 'id');
    }
}
