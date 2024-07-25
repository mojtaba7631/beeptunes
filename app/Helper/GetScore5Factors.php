<?php

namespace App\Helper;

class GetScore5Factors
{
    static function get_score_5_factors($answer_id)
    {
        if ($answer_id == 1){
            $score = 1 ;
        }
        elseif ($answer_id == 2){
            $score = 2 ;
        }
        elseif ($answer_id == 3){
            $score = 3 ;
        }
        elseif ($answer_id == 4){
            $score = 4 ;
        }
        elseif ($answer_id == 5){
            $score = 5 ;
        }
        return $score;
    }
}
