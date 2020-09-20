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

    public function parse_odd_str_date($month)
    {
        $month_number = intval($month, 10);

        if ($month_number % 2 === 0) $month_number = $month_number === 12 ? 1 : $month_number + 1;

        return [$this->str_double_digit_string($month_number), $this->str_double_digit_string($month_number + 1)];
    }

    public function str_double_digit_string($date)
    {
        if ($date < 10) $date = '0' . $date;
        else strval($date);

        return $date;
    }

    public function get_count_inschrijvingen_per_group($inschrijvingen, $config)
    {
        $inschrijvingen_count = array();
        // dd($inschrijvingen->toArray());
        for ($i = 0; $i < count($config); $i++) {
            $inschrijvingen_count[$i] = count(array_filter($inschrijvingen->toArray(), function($obj){
                // dd($obj["group"]);
                if (isset($obj["group"]) && $obj["group"] == $i) return true;
                return false;
            }));
        }
        return $inschrijvingen_count;
    }
}
