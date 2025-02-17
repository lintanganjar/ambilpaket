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
        Schema::create('temp_parcel_senders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parcel_id')->unique(); // References temp_parcels.id, unique
            $table->string('sender_first_name');
            $table->string('sender_last_name');
            $table->string('sender_phone_number');
            $table->string('sender_email');
            $table->unsignedBigInteger('sender_province_id'); // References provinces.id
            $table->unsignedBigInteger('sender_regency_id'); // References regencies.id
            $table->unsignedBigInteger('sender_district_id'); // References districts.id
            $table->string('sender_postal_code');
            $table->text('sender_full_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temp_parcel_senders');
    }
};
