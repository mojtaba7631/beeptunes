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
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->string('first_name',255)->nullable()->default(null);;
            $table->string('last_name',255)->nullable()->default(null);;
            $table->string('mobile')->nullable()->default(null);
            $table->unsignedTinyInteger('gender')->nullable()->default(null);;
            $table->string('national_code',20)->nullable()->default(null);;
            $table->date('birth_day')->nullable()->default(null);;
            $table->string('email')->nullable()->default(null);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default(null)->nullable();
            $table->unsignedInteger('is_active')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
