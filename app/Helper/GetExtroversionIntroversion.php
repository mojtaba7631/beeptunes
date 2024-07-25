<?php

namespace App\Helper;

class GetExtroversionIntroversion
{
    static function get_extroversion_introversion($score)
    {
        // az 40 ---- 8 ta soal
        if ($score < 20){
            $result = 'درون گرا';
        }
        else if ($score > 20){
            $result = 'برون گرا';
        }
        return $result;
    }
}
