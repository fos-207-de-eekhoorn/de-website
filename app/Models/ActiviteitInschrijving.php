<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActiviteitInschrijving extends Model
{
    use SoftDeletes;

    protected $table = 'activiteit_inschrijvingen';

    protected $fillable = [
        'activiteit_id', 'voornaam', 'achternaam', 'is_aanwezig',
    ];

    public function activiteit()
    {
        return $this->belongsTo(Activiteit::class);
    }
}
