<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use SoftDeletes;

    protected $table = 'blog_posts';

    protected $fillable = [
        'name', 'title', 'subtitle', 'category_id', 'header_image_id', 'active', 'live_at', 
    ];

    public function category()
    {
        return $this->hasOne(BlogCategory::class, 'id', 'category_id');
    }

    public function tags()
    {
        return $this->hasManyThrough(
            BlogTag::class,
            BlogPostTag::class,
            'blog_post_id',
            'id',
            'id',
            'blog_tag_id'
        );
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'id', 'header_image_id');
    }

    public function blocks()
    {
        return $this->hasManyThrough(
            BlogBlock::class,
            BlogPostBlock::class,
            'blog_post_id',
            'id',
            'id',
            'blog_block_id'
        );
    }
}
