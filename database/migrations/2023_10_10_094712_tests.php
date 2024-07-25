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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('test_name', 255)->nullable();
            $table->string('test_image', 255)->nullable();
            $table->string('test_slug', 255)->nullable();
            $table->string('test_meta_keywords', 500);
            $table->string('test_meta_description', 500);
            $table->longText('test_description')->nullable();
            $table->integer('main_test');
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
