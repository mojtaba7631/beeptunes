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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_title', 255);
            $table->string('event_image', 255);
            $table->text('short_title');
            $table->integer('status');
            $table->longText('event_content');
            $table->string('event_meta_keywords',500)->nullable();
            $table->date('event_date')->nullable()->default(null);
            $table->string('event_date_counter',255);
            $table->boolean('main')->default(0);
            $table->unsignedBigInteger('price')->nullable()->default(0);
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
