<?php

namespace App\Helper;

class GetAgreeablenessContradiction
{
    static function get_agreeableness_contradiction($score)
    {
        // az 45 ---- 9 ta soal
        if ($score < 20){
            $result = 'توافق پذیر';
        }
        else if ($score > 20){
            $result = 'تضاد';
        }
        return $result;
    }
}
