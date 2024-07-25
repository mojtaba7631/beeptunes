<?php

namespace App\Helper;

class ConvertDateToGregorian
{
    static function convert_date_to_gregorian($date)
    {
        $date1 = explode(' ', $date);
        $date = explode('/', $date1[0]);
        $date = verta()->getGregorian(ConvertDigitsToEnglish::convert_digits_to_english($date[0]), ConvertDigitsToEnglish::convert_digits_to_english($date[1]),  ConvertDigitsToEnglish::convert_digits_to_english($date[2]));
        return join('-', $date);
    }
}
