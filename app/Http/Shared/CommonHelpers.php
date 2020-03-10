<?php

namespace App\Http\Shared;

use App\Leider;
use Illuminate\Support\Facades\Auth;

trait CommonHelpers
{
    public function get_leider($leider_id = null)
    {
        return $this->get_user_query($leider_id)->with(
            'takleiding'
        )->first();
    }

    public function get_leider_query($leider_id = null)
    {
        $leider_id = $leider_id ?? Auth::user()->id;

        return Leider::where('id', $leider_id);
    }

    public function get_el()
    {
        return Leider::where('is_el', 1)->first();
    }

    public function get_ael()
    {
        return Leider::
            where('is_ael_financien', 1)
            ->orWhere('is_ael_leden', 1)
            ->get();
    }
}
