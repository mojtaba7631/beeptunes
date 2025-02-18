<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'role_name' => 'ادمین',
                'role_class' => 'badge-success',
            ],
            [
                'role_name' => 'کاربر عادی',
                'role_class' => 'badge-warning',
            ],
        ]);
    }
}
