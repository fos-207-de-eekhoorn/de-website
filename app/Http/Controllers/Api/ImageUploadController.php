<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetSignedImageUploadUrl;
use App\Http\Requests\PostCompleteImageUpload;
use App\Image;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->s3Client = App::make('aws')->createClient('s3');
        $this->bucket = Config::get('filesystems.disks.s3.bucket');
    }

    public function getSignedImageUploadUrl(GetSignedImageUploadUrl $request)
    {
        $cmd = $this->s3Client->getCommand('PutObject', [
            'ACL' => 'public-read',
            'Bucket' => $this->bucket,
            'ContentType' => 'multipart/form-data',
            'Key' => $request->input('key'),
        ]);

        $request = $this->s3Client->createPresignedRequest($cmd, '+20 minutes');

        $presignedUrl = (string) $request->getUri();

        return response()->json([
            'url' => $presignedUrl,
        ]);
    }

    public function postCompleteImageUpload(PostCompleteImageUpload $request)
    {
        $imageUrl = Storage::disk('s3')->url($request->key);

        $image = Image::where('path', $request->url)->first() ?? new Image;
        $image->path = $imageUrl;
        $image->save();

        return response()->json($image);
    }
}
