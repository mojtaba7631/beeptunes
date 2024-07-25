<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('about_image', 255)->nullable();
            $table->longText('description')->nullable();
            $table->string('about_title', 255)->nullable();
            $table->string('about_sub_title', 255)->nullable();
            $table->string('about_first_user_image', 255)->nullable();
            $table->string('about_first_user_name', 255)->nullable();
            $table->string('about_first_user_education', 255)->nullable();
            $table->string('about_second_user_image', 255)->nullable();
            $table->string('about_second_user_name', 255)->nullable();
            $table->string('about_second_user_education', 255)->nullable();
            $table->string('about_third_user_image', 255)->nullable();
            $table->string('about_third_user_name', 255)->nullable();
            $table->string('about_third_user_education', 255)->nullable();
            $table->string('about_fourth_user_image', 255)->nullable();
            $table->string('about_fourth_user_name', 255)->nullable();
            $table->string('about_fourth_user_education', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
