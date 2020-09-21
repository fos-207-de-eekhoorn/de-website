<?php

namespace App\Http\Controllers;

use Auth;
use App\Content;
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
            ->first();

        // return $content;

        return view('admin.content.content', [
            'content' => $content,
        ]);
    }
}
