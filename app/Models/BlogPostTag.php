<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPostTag extends Model
{
    protected $table = 'blog_post_tags';

    protected $fillable = [
        'name', 'blog_post_id', 'blog_tag_id', 
    ];

    public function post()
    {
        return $this->hasOne(BlogPost::class);
    }

    public function tag()
    {
        return $this->hasOne(BlogTag::class);
    }
}
