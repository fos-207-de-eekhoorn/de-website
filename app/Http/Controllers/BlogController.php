<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTag;
use App\Http\Shared\CommonHelpers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    use CommonHelpers;

    public function get_blog()
    {
        $blog_posts = BlogPost::with([
                'image',
            ])
            ->where('active', 1)
            ->where('live_at', '<=', Carbon::now('Europe/Berlin')->format('Y-m-d H:i:s'))
            ->orderBy('live_at', 'desc')
            ->get();

        $categories = BlogCategory::get();
        $tags = BlogTag::get();

        return view('blog.index', [
            'blog_posts' => $blog_posts,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    public function get_blog_post(BlogPost $blog_post)
    {
        $blog_post->load([
            'image',
            'blocks' => function($query) {
                $query->orderBy('order', 'ASC');
            },
            'blocks.image',
        ]);

        $next_blog_posts = $this->get_next_blog_posts();

        return view('blog.post', [
            'blog_post' => $blog_post,
            'next_blog_posts' => $next_blog_posts,
        ]);
    }
}
