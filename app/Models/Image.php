<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;

    protected $table = 'images';

    protected $fillable = [
        'path',
    ];

    public function blog_posts()
    {
        return $this->hasMany(BlogPost::class, 'header_image_id', 'id');
    }

    public function blog_blocks()
    {
        return $this->hasMany(BlogPost::class);
    }
}
