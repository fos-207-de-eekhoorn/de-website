<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvenementTak extends Model
{
    protected $table = 'evenement_takken';

    protected $fillable = [
        'tak_id', 'evenement_id',
    ];

    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }

    public function tak()
    {
        return $this->belongsTo(Tak::class);
    }
}
