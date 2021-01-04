<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use App\BlogPost;
use App\BlogTag;
use App\Http\Shared\CommonHelpers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    use CommonHelpers;

    public function get_blog()
    {
        $posts = BlogPost::with([
                'image',
            ])
            ->where('active', 1)
            ->where('live_at', '<=', Carbon::now('Europe/Berlin')->format('Y-m-d H:i:s'))
            ->orderBy('live_at', 'desc')
            ->get();

        $categories = BlogCategory::get();
        $tags = BlogTag::get();

        return view('blog.blog', [
            'posts' => $posts,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    public function get_blog_post(request $request)
    {
        $post = BlogPost::with([
                'image',
                'blocks' => function($query) {
                    $query->orderBy('order', 'ASC');
                },
                'blocks.image',
            ])
            ->where('url', $request->url)->first();

        if ($post) {
            $next_blog_posts = $this->get_next_blog_posts();
    
            return view('blog.blog_post', [
                'post' => $post,
                'next_blog_posts' => $next_blog_posts,
            ]);
        } else {
            Session::flash('error_post_not_found');

            return redirect('/blog');
        }
    }
}
