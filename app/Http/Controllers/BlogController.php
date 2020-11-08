<?php

namespace App\Http\Controllers;

use App\BlogPost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function get_blog()
    {
        $posts = BlogPost::with([
                'image',
            ])
            ->where('active', 1)
            ->where('live_at', '<=', Carbon::now('Europe/Berlin')->format('Y-m-d H:i:s'))
            ->orderBy('live_at', 'desc')
            ->get();

        return view('blog.blog', [
            'posts' => $posts,
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
            ->whereRaw('lower(replace(replace(replace(title, \' \', \'\'), \'?\', \'\'), \'.\', \'\')) = ?', str_replace('-','',$request->title))->first();

        return view('blog.blog_post', [
            'post' => $post,
        ]);
    }
}
