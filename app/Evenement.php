<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Evenement extends Model
{
	use SoftDeletes;

    protected $table = 'evenementen';

    protected $fillable = [
        'tak_id', 'activiteit_id', 'naam', 'omschrijving', 'start_datum', 'eind_datum', 'start_uur', 'eind_uur', 'locatie', 'prijs', 'active',
    ];

    public function evenement_tak()
    {
        return $this->hasMany(EvenementTak::class);
    }

    public function getStartUurFormattedAttribute()
    {
    	return Carbon::parse($this->start_uur)->format('H') . 'u' . Carbon::parse($this->start_uur)->format('i');
    }

    public function getEindUurFormattedAttribute()
    {
    	return Carbon::parse($this->eind_uur)->format('H') . 'u' . Carbon::parse($this->eind_uur)->format('i');
    }
}
