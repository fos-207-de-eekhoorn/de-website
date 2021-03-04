<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
	protected $table = 'contents';

    protected $fillable = [
        'key', 'name',
    ];

    public function content_text()
    {
        return $this->hasMany(ContentText::class);
    }
}
