<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeiderTak extends Model
{
    use SoftDeletes;

    protected $table = 'leiding_tak';

    protected $fillable = [
        'tak_id', 'leiding_id', 'contact_volgorde', 'is_tl',
    ];

    public function leider()
    {
        return $this->belongsTo(Leider::class);
    }

    public function tak()
    {
        return $this->belongsTo(Tak::class);
    }
}