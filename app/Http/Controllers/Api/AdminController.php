<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ActiviteitInschrijving;
use App\Models\BlogPost;
use App\Models\Evenement;
use App\Models\Image;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    use UploadTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function SetActiviteitAanwezig(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'status' => 'required',
        ]);

        $update_inschrijving = ActiviteitInschrijving::where('id', $request->id)
            ->first();

        $update_inschrijving->is_aanwezig = $request->status;
        $is_saved = $update_inschrijving->save();

        if ($is_saved) return 'true';
        else return 'false';
    }

    public function SetEvenementActive(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'status' => 'required',
        ]);

        $update_evenement = Evenement::where('id', $request->id)
            ->first();

        $update_evenement->active = $request->status;
        $is_saved = $update_evenement->save();

        if ($is_saved) return 'true';
        else return 'false';
    }

    public function SetBlogPostActive(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'status' => 'required',
        ]);

        $update_evenement = BlogPost::where('id', $request->id)
            ->first();

        $update_evenement->active = $request->status;
        $is_saved = $update_evenement->save();

        if ($is_saved) return 'true';
        else return 'false';
    }

    public function UploadImage(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $image = $request->image;
        $name = Str::slug($request->image->getClientOriginalName()).'_'.time();
        $folder = '/uploads/';
        $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
        if ($this->uploadOne($image, $folder, 'public', $name)) {
            $image = new Image;
            $image->path = $filePath;
            $image->save();
            return [
                'id' => $image->id,
                'path' => $image->path,
            ];
        } else {
            return 'false';
        }
    }
}
