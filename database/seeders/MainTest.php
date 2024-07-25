<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainTest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('main_test')->insert([
            [
                'name' => '5 عاملی',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'هالند',
                'created_at' => Carbon::now(),
            ],[
                'name' => 'mbti',
                'created_at' => Carbon::now(),
            ],[
                'name' => 'neo',
                'created_at' => Carbon::now(),
            ],[
                'name' => 'strong',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
