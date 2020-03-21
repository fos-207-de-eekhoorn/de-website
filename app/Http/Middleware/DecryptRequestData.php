<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Crypt;

class DecryptRequestData
{
    public function handle($request, Closure $next, $type, $key)
    {
        if (null != $request->$key) {
            switch ($type) {
                case 'value':
                    $request->merge([$key => Crypt::decrypt($request->$key)]);
                    break;
                case 'array':
                    $request->merge([$key => array_map(function ($v) {
                        return Crypt::decrypt($v);
                    }, $request->$key ?? [])]);
                    break;
            }
        }

        return $next($request);
    }
}
