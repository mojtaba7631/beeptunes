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
        Schema::create('track_albums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('album_id');
            $table->string('track_title', 255);
            $table->string('track_nickname', 255);
            $table->string('track_image', 255);
            $table->string('track_time', 255);
            $table->string('track_file', 255);
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
