<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use App\Models\Content;
use App\Models\ContentText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_contents()
    {
        $contents = content::distinct()
            ->orderBy('key', 'ASC')
            ->get();

        return view('admin.content.index', [
            'contents' => $contents,
        ]);
    }

    public function get_content_key(content $content)
    {
        $content->load([
            'content_text' => function ($query) {
                $query->orderBy('created_at', 'DESC');
            },
        ]);

        return view('admin.content.content', [
            'content' => $content,
        ]);
    }

    public function post_add_content_text(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:contents,id',
            'user_id' => 'required|exists:users,id',
            'text' => 'required'
        ]);

        $content = content::where('id', $request->id)->first();

        if (count($content->content_text) > 0 && $content->content_text[0]->text === $request->text) {
            Session::flash('samesies');
        } else {
            $new_text = new ContentText;

            $new_text->content_id = $request->id;
            $new_text->user_id = $request->user_id;
            $new_text->text = $request->text;

            $add = $new_text->save();

            if ($add) {
                Session::flash('add_success');
            } else {
                Session::flash('add_error');
            }
        }

        return redirect()->route('admin.contents', ['content' => strtolower($content->key)]);
    }
}
