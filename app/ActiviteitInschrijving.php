<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

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

    public function count()
    {
    	$this->select(`group`, DB::raw('count(*) as inschrijvingen_count'))
			->groupBy(`group`);
    }
}
