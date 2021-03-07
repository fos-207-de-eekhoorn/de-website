<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogTag extends Model
{
    use SoftDeletes;

    protected $table = 'blog_tags';

    protected $fillable = [
        'name',
    ];

    public function blog_post_tags()
    {
        return $this->hasMany(BlogPost::class);
    }

    public function getTimesUsedAttribute()
    {
        return sizeof(BlogPostTag::where('blog_tag_id', $this->id)->get());
    }
}
