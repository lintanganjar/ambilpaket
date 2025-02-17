<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('temp_parcel_receivers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parcel_id')->unique(); // References temp_parcels.id, unique
            $table->string('reciever_first_name');
            $table->string('reciever_last_name');
            $table->string('reciever_phone_number');
            $table->string('reciever_email');
            $table->unsignedBigInteger('reciever_province_id'); // References provinces.id
            $table->unsignedBigInteger('reciever_regency_id'); // References regencies.id
            $table->unsignedBigInteger('reciever_district_id'); // References districts.id
            $table->string('reciever_postal_code');
            $table->text('reciever_full_address');
            $table->string('reciever_latitude')->nullable();
            $table->string('reciever_longitude')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temp_parcel_receivers');
    }
};
