<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('courier_submissions', function (Blueprint $table) {
            $table->id();
            $table->enum('courier_type', ['Delivery', 'Pickup']);
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number');
            $table->enum('gender', ['Pria', 'Wanita']);
            $table->string('profile_img')->nullable()->comment('path to image');
            $table->unsignedBigInteger('area_id')->comment('untuk menandai kota');
            $table->integer('balance')->default(0);
            $table->string('bank_name');
            $table->string('account_name');
            $table->string('account_number');
            $table->boolean('approval')->nullable()->default(null)->comment('null untuk status belum diproses, true diterima, false ditolak');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('courier_submissions');
    }
};
