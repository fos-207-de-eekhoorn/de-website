<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activiteit extends Model
{
    protected $fillable = [
        'tak_id', 'omschrijving', 'datum', 'start_uur', 'eind_uur', 'locatie', 'prijs',
    ];

    public function tak()
    {
        return $this->belongsTo(Tak::class);
    }
}
