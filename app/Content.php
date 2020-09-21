<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
	protected $table = 'content';

    protected $fillable = [
        'leider_id', 'key', 'text'
    ];

    public function leider()
    {
        return $this->belongsTo(Leider::class);
    }
}
