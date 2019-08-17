<?php

namespace App\Http\Shared;

use App\User;
use Illuminate\Support\Facades\Auth;

trait CommonHelpers
{
    public function get_user($leider_id = null)
    {
        return $this->get_user_query($leider_id)->with(
            'takleiding'
        )->first();
    }

    public function get_user_query($leider_id = null)
    {
        $leider_id = $leider_id ?? Auth::user()->id;

        return Leider::where('id', $leider_id);
    }
}
