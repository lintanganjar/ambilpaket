<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('parcel_receivers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parcel_id')->unique();
            $table->string('reciever_first_name');
            $table->string('reciever_last_name');
            $table->string('reciever_phone_number');
            $table->string('reciever_email');
            $table->unsignedBigInteger('reciever_province_id');
            $table->unsignedBigInteger('reciever_regency_id');
            $table->unsignedBigInteger('reciever_district_id');
            $table->string('reciever_postal_code');
            $table->text('reciever_full_address');
            $table->string('reciever_latitude')->nullable();
            $table->string('reciever_longitude')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('parcel_receivers');
    }
};
