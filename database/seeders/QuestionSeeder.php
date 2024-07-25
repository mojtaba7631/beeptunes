<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            [
                'question' => 'پرحرف',
                'character' => '1',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'به دنبال یافتن ایراد در دیگران',
                'character' => '2',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'تمایل به یک کار تمام وقت و کامل',
                'character' => '3',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'افسرده',
                'character' => '4',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'تمایل به کسب ایده های جدید',
                'character' => '5',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'کم حرف',
                'character' => '1',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'مفید و کمک رسان برای دیگران',
                'character' => '2',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'تا حدودی بی دقت',
                'character' => '3',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'راحت و بدون استرس',
                'character' => '4',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'کنجکاو در مورد اکثر مسائل',
                'character' => '5',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'سرشار از انرژی',
                'character' => '1',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'شروع کننده نزاع با دیگران',
                'character' => '2',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'یک کارمند مورد اطمینان',
                'character' => '3',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'تنش زا',
                'character' => '4',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'باهوش و متفکر',
                'character' => '5',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'سرشار از اشتیاق',
                'character' => '1',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'دارای ذات بخشنده',
                'character' => '2',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'تمایل به بی نظمی',
                'character' => '3',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'نگران ( به صورت مداوم یا زیاد )',
                'character' => '4',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'تخیل فعال',
                'character' => '5',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'تمایل به سکوت',
                'character' => '1',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'قابل اعتماد',
                'character' => '2',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'تمایل به بی خیالی و تنبلی',
                'character' => '3',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'ثبات هیجانی ( به راحتی عصبانی نمی شوم )',
                'character' => '4',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'خلاق',
                'character' => '5',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'یک شخصیت قاطع',
                'character' => '1',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'شخصیت سرد و بی تفاوت',
                'character' => '2',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'مصمم ( تا اتمام کار یا وظیفه محول شده )',
                'character' => '3',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'دمدمی مزاج',
                'character' => '4',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'زیبایی شناختی ( نگرش به اطراف )',
                'character' => '5',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'خجالتی ( در بعضی مواقع )',
                'character' => '1',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'با ملاحظه و مهربان با اکثر افراد',
                'character' => '2',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'کارآمد',
                'character' => '3',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'آرام در مواقع تنش زا',
                'character' => '4',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'تمایل به انجام کارهای یکنواخت',
                'character' => '5',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'اجتماعی',
                'character' => '1',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'پررو ( در برخوردهای اجتماعی )',
                'character' => '2',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'برنامه ریزی کردن و دنبال کردن آنها',
                'character' => '3',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'به راحتی عصبی شدن',
                'character' => '4',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'تمایل به انعکاس عقاید',
                'character' => '5',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'تمایلات هنری',
                'character' => '5',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'تمایل به همکاری با دیگران',
                'character' => '2',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'به راحتی پریشان شدن',
                'character' => '3',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'ماهر در زمینه هنر ، موسیقی یا ادبیات',
                'character' => '5',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
