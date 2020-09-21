<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentText extends Model
{
	protected $table = 'content_text';

    protected $fillable = [
        'content_id', 'leider_id', 'text'
    ];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function leider()
    {
        return $this->belongsTo(Leider::class);
    }
}
