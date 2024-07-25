<?php

namespace App\Helper;

class GetNeuroticismEmotionalStability
{
    static function get_neuroticism_emotional_stability($score)
    {
        // az 40 ---- 8 ta soal
        if ($score < 20){
            $result = 'روان رنجوری';
        }
        else if ($score > 20){
            $result = 'ثبات عاطفی';
        }
        return $result;
    }
}
