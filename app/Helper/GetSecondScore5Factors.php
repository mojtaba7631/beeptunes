<?php

namespace App\Helper;

class GetSecondScore5Factors
{
    static function get_second_score_5_factors($answer_id)
    {
        if ($answer_id == 1){
            $score = 5 ;
        }
        elseif ($answer_id == 2){
            $score = 4 ;
        }
        elseif ($answer_id == 3){
            $score = 3 ;
        }
        elseif ($answer_id == 4){
            $score = 2 ;
        }
        elseif ($answer_id == 5){
            $score = 1 ;
        }
        return $score;
    }
}
