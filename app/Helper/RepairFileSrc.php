<?php

namespace App\Helper;

class RepairFileSrc
{
    static function rapair_file_src($src)
    {
        return str_replace('\\', '/', $src);
    }
}
