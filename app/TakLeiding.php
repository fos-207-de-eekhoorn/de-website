<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TakLeiding extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tak_id', 'leiding_id', 'is_tl',
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
