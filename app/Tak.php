<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tak extends Model
{
    use SoftDeletes;

    protected $table = 'takken';

    protected $fillable = [
        'naam', 'foto', 'introductie', 'beschrijving', 'vanaf',
    ];

    public function tak_leiding()
    {
        return $this->hasMany(LeiderTak::class);
    }

    public function activiteit()
    {
        return $this->hasMany(Activiteit::class);
    }
}
