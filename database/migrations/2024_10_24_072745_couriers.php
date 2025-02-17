<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('couriers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->enum('courier_type', ['Delivery', 'Pickup']);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->enum('gender', ['Pria', 'Wanita']); // Sesuaikan opsi dengan gender yang dibutuhkan
            $table->string('profile_img')->comment('path to image');
            $table->unsignedBigInteger('area_id')->comment('untuk menandai kota');
            $table->integer('balance')->default(0);
            $table->string('bank_name');
            $table->string('account_name');
            $table->string('account_number');
            
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
        Schema::dropIfExists('couriers');
    }
};