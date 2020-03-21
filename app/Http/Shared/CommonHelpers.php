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

    public function parse_odd_str_date($month) {
        $month_number = intval($month, 10);

        if ($month_number % 2 === 0) $month_number = $month_number === 12 ? 1 : $month_number + 1;

        return [$this->str_double_digit_string($month_number), $this->str_double_digit_string($month_number + 1)];
    }

    public function str_double_digit_string($date) {
        if ($date < 10) $date = '0' . $date;
        else strval($date);

        return $date;
    }
}
