<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActiviteitInschrijving extends Model
{
    protected $table = 'activiteit_inschrijvingen';

    protected $fillable = [
        'activiteit_id', 'voornaam', 'achternaam', 'is_aanwezig',
    ];

    public function activiteit()
    {
        return $this->belongsTo(Activiteit::class);
    }
}
