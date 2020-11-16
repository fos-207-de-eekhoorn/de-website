<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPostBlock extends Model
{
    protected $table = 'blog_post_blocks';

    protected $fillable = [
        'name', 'blog_post_id', 'blog_block_id', 
    ];

    public function post()
    {
        return $this->hasOne(BlogPost::class);
    }

    public function block()
    {
        return $this->hasOne(BlogBlock::class);
    }
}
