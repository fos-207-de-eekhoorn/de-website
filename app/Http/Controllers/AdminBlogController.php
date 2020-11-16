<?php

namespace App\Http\Controllers;

use Auth;
use Crypt;
use App\BlogBlock;
use App\BlogCategory;
use App\BlogPost;
use App\BlogPostBlock;
use App\BlogPostTag;
use App\BlogTag;
use App\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class AdminBlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_posts()
    {
        $posts = BlogPost::with([
            'blocks',
            'category',
            'image',
        ])
        ->orderBy('live_at', 'desc')
        ->get();

        return view('admin.blog.posts', [
            'posts' => $posts,
        ]);
    }

    public function get_add_post()
    {
        $categories = BlogCategory::get();
        $images = Image::get();
        $urls = BlogPost::pluck('url')->toArray();

        return view('admin.blog.add_post', [
            'categories' => $categories,
            'images' => $images,
            'urls' => $urls,
        ]);
    }

    public function get_edit_post(request $request)
    {
        $post = BlogPost::with(
            [
                'tags',
                'blocks' => function($query) {
                    $query->orderBy('order', 'ASC');
                },
            ])
            ->find($request->id);
        $blocks = BlogBlock::get();
        $categories = BlogCategory::get();
        $tags = BlogTag::get();
        $images = Image::get();
        $urls = BlogPost::pluck('url')->toArray();

        return view('admin.blog.edit_post', [
            'post' => $post,
            'blocks' => $blocks,
            'categories' => $categories,
            'tags' => $tags,
            'images' => $images,
            'urls' => $urls,
        ]);
    }

    public function add_post(request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'url' => 'required',
            'category' => 'required',
            'image' => 'required',
        ]);

        $new_post = new BlogPost;
        $new_post->name = $request->name;
        $new_post->title = $request->title;
        $new_post->subtitle = $request->subtitle;
        $new_post->url = $request->url;
        $new_post->category_id = $request->category;
        $new_post->header_image_id = $request->image;
        $new_post->live_at = ($request->live_at
            ? str_replace('T', ' ', $request->live_at)
            : Carbon::now('CET')->format('Y-m-d H:i'));
        $success = $new_post->save();

        if ($success) {
            Session::flash('add_success');
        } else {
            Session::flash('error');
        }

        return redirect('/admin/blog/posts');
    }

    public function edit_post(request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'url' => 'required',
            'category' => 'required',
            'image' => 'required',
        ]);

        if (isset($request->blocks)) foreach ($request->blocks as $key => $block) {
            $request->validate([
                'blocks.'.$key.'.name' => 'required',
                'blocks.'.$key.'.content' => 'required',
                'blocks.'.$key.'.ui_type' => 'required',
            ]);

            if ($block['ui_type'] != 'no_image' && $block['image_source'] == 'upload') $request->validate([
                'blocks.'.$key.'.image_upload' => 'required|image|max:2048',
            ]);
        }

        $success = 1;

        // Handle post
        $post = BlogPost::find($request->id);
        $post->name = $request->name;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->url = $request->url;
        $post->category_id = $request->category;
        $post->active = ($request->active ? '1' : '0');
        $post->header_image_id = $request->image;
        $post->live_at = ($request->live_at
            ? str_replace('T', ' ', $request->live_at)
            : Carbon::now('CET'));

        if ($post->save()) {
            // Handle Tags
            if (isset($request->tags)) foreach ($request->tags as $key => $tag) {
                if ($tag['type'] === 'new' || $tag['type'] === 'link') {
                    if ($tag['type'] === 'new') {
                        $new_tag = new BlogTag;
                        $new_tag->name = $tag['name'];
                        $new_tag->save();
                    } else if ($tag['type'] === 'link') $new_tag = BlogTag::find($tag['id']);

                    $new_link = new BlogPostTag;
                    $new_link->blog_post_id = $request->id;
                    $new_link->blog_tag_id = $new_tag->id;
                    $new_link->timestamps = false;
                    $new_link->save();
                } else if ($tag['type'] === 'remove' && isset($tag['id'])) {
                    $link = BlogPostTag::where('blog_post_id', $request->id)->where('blog_tag_id', $tag['id'])->first();
                    BlogPostTag::destroy($link->id);
                }
            }

            // Handle content blocks
            if (isset($request->blocks)) foreach ($request->blocks as $key => $block) {
                if ($block['type'] !== 'remove') {
                    if ($block['type'] === 'linked') {
                        $blog_block = BlogBlock::find($block['id']);
                        $post_block = BlogPostBlock::where('blog_post_id', $request->id)->where('blog_block_id', $block['id'])->first();
                        $post_block->order = $block['order'];
                        $post_block->save();
                    } else if ($block['type'] === 'new_link') {
                        $post_block = new BlogPostBlock;
                        $post_block->blog_post_id = $request->id;
                        $post_block->blog_block_id = $block['id'];
                        $post_block->order = $block['order'];
                        $post_block_id = $post_block->save();
                        $blog_block = BlogBlock::find($block['id']);
                    } else if ($block['type'] === 'new_block') $blog_block = new BlogBlock;

                    $blog_block->name = $block['name'];
                    $blog_block->content = $block['content'];
                    $blog_block->ui_type = $block['ui_type'];
                    if ($block['ui_type'] !== 'no_image') $blog_block->image_id = $block['image'];
                    else $blog_block->image_id = NULL;
                    $success = $blog_block->save();


                    if ($block['type'] === 'new_block') {
                        $post_block = new BlogPostBlock;
                        $post_block->blog_post_id = $request->id;
                        $post_block->blog_block_id = $blog_block->id;
                        $post_block->order = $block['order'];
                        $success = $post_block->save();
                    }
                } else {
                    $post_block = BlogPostBlock::where('blog_post_id', $request->id)->where('blog_block_id', $block['id'])->first();
                    if ($post_block) $success = BlogPostBlock::destroy($post_block->id);
                    else $success = 1;
                }
            }

            if ($success) Session::flash('success');
            else Session::flash('error');
        } else Session::flash('error');

        return redirect('/admin/blog/posts/edit/' . Crypt::encrypt($request->id));
    }

    public function delete_post(request $request)
    {
        $post = BlogPost::find($request->id);

        $post->active = 0;

        if ($post->save()) $success = BlogPost::destroy($request->id);

        if ($success) Session::flash('delete_success', $request->id);
        else Session::flash('error');

        return redirect('/admin/blog/posts');
    }

    public function delete_post_undo(Request $request)
    {
        $restore = BlogPost::withTrashed()->find($request->id)->restore();

        if ($restore) Session::flash('restore_success');
        else Session::flash('restore_error');

        return redirect('/admin/blog/posts');
    }

    public function get_categories()
    {
        $categories = BlogCategory::get();

        return view('admin.blog.categories', [
            'categories' => $categories,
        ]);
    }

    public function add_category(request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $new_category = new BlogCategory;

        $new_category->name = $request->name;

        $success = $new_category->save();

        if ($success) {
            Session::flash('add_success');
        } else {
            Session::flash('error');
        }

        return redirect('/admin/blog/categories');
    }

    public function delete_category(request $request)
    {
        $success = BlogCategory::destroy($request->id);

        if ($success) Session::flash('delete_success', $request->id);
        else Session::flash('error');

        return redirect('/admin/blog/categories');
    }

    public function delete_category_undo(Request $request)
    {
        $restore = BlogCategory::withTrashed()->find($request->id)->restore();

        if ($restore) Session::flash('restore_success');
        else Session::flash('restore_error');

        return redirect('/admin/blog/categories');
    }

    public function get_tags()
    {
        $tags = BlogTag::get();

        return view('admin.blog.tags', [
            'tags' => $tags,
        ]);
    }

    public function add_tag(request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $new_tag = new BlogTag;

        $new_tag->name = strtolower(preg_replace('/[^a-zA-Z0-9- ]/', '', str_replace('_', '-', str_replace(' ', '-', trim($request->name)))));

        $success = $new_tag->save();

        if ($success) {
            Session::flash('add_success');
        } else {
            Session::flash('error');
        }

        return redirect('/admin/blog/tags');
    }

    public function delete_tag(request $request)
    {
        BlogPostTag::where('blog_tag_id', $request->id)->delete();
        $success = BlogTag::destroy($request->id);

        if ($success) Session::flash('delete_success', $request->id);
        else Session::flash('error');

        return redirect('/admin/blog/tags');
    }

    public function delete_tag_undo(Request $request)
    {
        $restore = BlogTag::withTrashed()->find($request->id)->restore();

        if ($restore) Session::flash('restore_success');
        else Session::flash('restore_error');

        return redirect('/admin/blog/tags');
    }
}
