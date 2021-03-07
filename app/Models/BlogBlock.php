<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogBlock extends Model
{
    use SoftDeletes;

    protected $table = 'blog_blocks';
    protected $appends = array('times_used');

    protected $fillable = [
        'name', 'content', 'image_id', 'order',
    ];

    public function image()
    {
        return $this->hasOne(Image::class, 'id', 'image_id');
    }

    public function posts()
    {
        return $this->hasManyThrough(
            BlogPost::class,
            BlogPostBlock::class,
            'blog_block_id',
            'id',
            'id',
            'blog_post_id'
        );
    }

    public function getUsedMultipleTimesAttribute()
    {
        return sizeof(BlogPostBlock::where('blog_block_id', $this->id)->get()) > 1;
    }

    public function getTimesUsedAttribute()
    {
        return sizeof(BlogPostBlock::where('blog_block_id', $this->id)->get());
    }
}
