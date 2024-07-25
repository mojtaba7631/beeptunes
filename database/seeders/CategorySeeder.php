<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'cat_title' => 'مقالات',
                'for_post' => 1,
                'for_product' => 0,
                'created_at' => Carbon::now(),
            ],
            [
                'cat_title' => 'اخبار',
                'for_post' => 1,
                'for_product' => 0,
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
