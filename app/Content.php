<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
	use SoftDeletes;

    protected $table = 'activiteiten';

    protected $fillable = [
        'leiding_id', 'key', 'text'
    ];

    public function leiding()
    {
        return $this->belongsTo(Leider::class);
    }
}
