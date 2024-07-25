<?php

namespace App\Helper;

class GetLieDetector
{
    static function get_lie_detector($score)
    {
        if ($score < 40) {
            $result = '';
        } else if ($score > 40) {
            $result = '';
        }

        return $result;
    }
}
