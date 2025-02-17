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
        Schema::create('agens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partnership_id')->nullable(); // References partnerships.id, nullable
            $table->unsignedBigInteger('submission_id'); // References agen_submissions.id
            $table->unsignedBigInteger('user_id')->unique(); // References users.id
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('phone_number');
            $table->unsignedBigInteger('province_id')->nullable(); // References provinces.id
            $table->unsignedBigInteger('regency_id')->nullable(); // References regencies.id
            $table->unsignedBigInteger('district_id')->nullable(); // References districts.id
            $table->text('full_address');
            $table->string('building_type')->nullable();
            $table->string('building_status')->nullable();
            $table->string('location')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->integer('balance')->default(0);
            $table->string('bank_name');
            $table->string('account_name');
            $table->string('account_number');
            $table->string('profile_img')->nullable(); // Path to image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agens');
    }
};
