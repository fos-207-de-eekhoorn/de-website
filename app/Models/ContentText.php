<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentText extends Model
{
	protected $table = 'content_text';

    protected $fillable = [
        'content_id', 'user_id', 'text'
    ];

    const UPDATED_AT = null;

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
