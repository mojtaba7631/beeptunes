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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('address_title', 500);
            $table->string('address', 2000);
            $table->string('lat', 500)->nullable()->default(null);
            $table->string('lon', 500)->nullable()->default(null);
            $table->string('shareable_link', 500)->nullable()->default(null);
            $table->unsignedBigInteger('city')->nullable()->default(null);
            $table->unsignedBigInteger('province')->nullable()->default(null);
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('addresses');
    }
};
