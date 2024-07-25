<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class genderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert([
            [
                'gender_name' => 'مرد',
                'gender_class' => 'badge-info',
            ],
            [
                'gender_name' => 'زن',
                'gender_class' => 'badge-danger',
            ],
        ]);
    }
}
