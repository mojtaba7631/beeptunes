<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'first_name' => 'ادمین',
                'last_name' => 'کل',
                'email' => '_base_admin_',
                'password' => '$2y$10$zqLe.NgDBwaEYXk9zEnRzOSG3aQSIMzJ4CZBusSaZLMykbg1m.bOK',
                'is_active' => 1,
                'gender' => 1,
                'created_at' => Carbon::now(),
            ]
        ]);

        DB::table('role_user')->insert([
            [
                'user_id' => 1,
                'role_id' => 1,
            ]
        ]);
    }
}
