<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tak extends Model
{
    use SoftDeletes;

    protected $table = 'takken';

    protected $fillable = [
        'naam', 'foto', 'introductie', 'beschrijving', 'activiteiten_beschrijving', 'vanaf',
    ];

    public function leiding_tak()
    {
        return $this->hasMany(LeiderTak::class);
    }

    public function activiteiten()
    {
        return $this->hasMany(Activiteit::class);
    }
}
