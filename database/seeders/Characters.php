<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Characters extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('characters')->insert([
            [
                'main_title' => 'برون گرایی',
                'de_main_title' => 'درون گرایی',
                'created_at' => Carbon::now(),
            ],
            [
                'main_title' => 'توافق پذیری',
                'de_main_title' => 'تضاد',
                'created_at' => Carbon::now(),
            ],[
                'main_title' => 'وجدان',
                'de_main_title' => 'عدم توجه (بی خیالی)',
                'created_at' => Carbon::now(),
            ],[
                'main_title' => 'روان رنجوری',
                'de_main_title' => 'ثبات عاطفی',
                'created_at' => Carbon::now(),
            ],[
                'main_title' => 'باز بودن',
                'de_main_title' => 'عدم داشتن تجربه',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
