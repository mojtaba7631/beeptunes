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
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('album_title', 500);
            $table->text('album_content');
            $table->string('album_nickname', 255);
            $table->string('album_author', 255);
            $table->string('album_guidance_permit', 255); // mojavvez ershad
            $table->string('album_national_library_code', 255); // code ketabkhane melli
            $table->string('album_image', 255);
            $table->string('album_meta_keywords', 500);
            $table->string('album_meta_description', 500);
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('category_album');
            $table->boolean('album_type')->default('0')->comment('0 is download , 1 is phisical');
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
