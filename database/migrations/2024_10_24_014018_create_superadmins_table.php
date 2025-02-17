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
        Schema::create('superadmins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique(); // References users.id
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->unsignedBigInteger('province_id')->nullable(); // References provinces.id
            $table->unsignedBigInteger('regency_id')->nullable(); // References regencies.id
            $table->unsignedBigInteger('district_id')->nullable(); // References districts.id;
            $table->text('full_address')->nullable();
            $table->string('profile_img')->nullable(); // Path to image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('superadmins');
    }
};
