<?php

namespace App\Http\Shared;

use App\Leider;
use Illuminate\Support\Facades\Auth;

trait CommonHelpers
{
    public function ignore_files($array) {
        return array_filter($array, array($this, 'check_ignored_files'));
    }

    private function check_ignored_files($file) {
        $files_to_ignore = [
            '.DS_Store',
        ];

        $file_array = explode("/", $file);
        $file_name = $file_array[count($file_array) - 1];

        return !in_array($file_name, $files_to_ignore);
    }

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
