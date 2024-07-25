<?php

namespace App\Helper;

class GetCarelessness
{
    static function get_carelessness($score)
    {
        // az 45 ---- 9 ta soal
        if ($score < 20){
            $result = 'وجدان';
        }
        else if ($score > 20){
            $result = 'عدم توجه و بی خیالی';
        }
        return $result;
    }
}
