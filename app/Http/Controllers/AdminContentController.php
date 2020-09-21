<?php

namespace App\Http\Controllers;

use Auth;
use App\Content;
use App\ContentText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminContentController extends Controller
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

    public function get_content_key($key)
    {
        $content = content::where('key', $key)
            ->with([
                'content_text' => function ($query) {
                    $query->orderBy('created_at', 'DESC');
                },
            ])
            ->first();

        return view('admin.content.content', [
            'content' => $content,
        ]);
    }

    public function post_add_content_text(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:contents,id',
            'leider_id' => 'required|exists:leiding,id',
            'text' => 'required'
        ]);

        $content = content::where('id', $request->id)->first();

        if (count($content->content_text) > 0 && $content->content_text[0]->text === $request->text) {
            Session::flash('samesies');
        } else {
            $new_text = new ContentText;

            $new_text->content_id = $request->id;
            $new_text->leider_id = $request->leider_id;
            $new_text->text = $request->text;

            $add = $new_text->save();

            if ($add) {
                Session::flash('add_success');
            } else {
                Session::flash('add_error');
            }
        }

        return redirect('/admin/contents/' . strtolower($content->key));
    }
}
