<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use SoftDeletes;

    protected $table = 'blog_categories';

    protected $fillable = [
        'name',
    ];

    public function blog_posts()
    {
        return $this->hasMany(BlogPost::class);
    }

    public function getTimesUsedAttribute()
    {
        return sizeof(BlogPost::where('category_id', $this->id)->get());
    }
}
