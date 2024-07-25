<?php

namespace App\Helper;

class GetCharacterTitle
{
    static function get_character_title($id)
    {
        if ($id == 1){
            $character_title = 'برون گرایی - درون گرایی';
        }
        else if ($id == 2){
            $character_title = 'توافق پذیری - تضاد';
        }
        else if ($id == 3){
            $character_title = 'وجدان - عدم توجه (بی خیالی)';
        }
        else if ($id == 4){
            $character_title = 'روان رنجوری - ثبات عاطفی';
        }
        else if ($id == 5){
            $character_title = 'باز بودن - عدم داشتن تجربه';
        }

        return $character_title;
    }
}
