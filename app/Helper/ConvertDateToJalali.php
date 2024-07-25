<?php

namespace App\Helper;

class ConvertDateToJalali
{
    static function convert_date_to_jalali($date)
    {
        $jalali_date = verta($date)->format('j/M/Y');
        return $jalali_date;
    }
}
