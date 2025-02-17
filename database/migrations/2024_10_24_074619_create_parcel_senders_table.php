<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('parcel_senders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parcel_id')->unique();
            $table->string('sender_first_name');
            $table->string('sender_last_name');
            $table->string('sender_phone_number');
            $table->string('sender_email');
            $table->unsignedBigInteger('sender_province_id');
            $table->unsignedBigInteger('sender_regency_id');
            $table->unsignedBigInteger('sender_district_id');
            $table->string('sender_postal_code');
            $table->text('sender_full_address');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('parcel_senders');
    }
};
