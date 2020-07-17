<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activiteit extends Model
{
	use SoftDeletes;

    protected $table = 'activiteiten';

    protected $fillable = [
        'tak_id', 'omschrijving', 'datum', 'start_uur', 'eind_uur', 'locatie', 'prijs', 'is_activiteit',
    ];

    public function tak()
    {
        return $this->belongsTo(Tak::class);
    }
}
