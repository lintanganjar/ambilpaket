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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number')->nullable();
            $table->unsignedBigInteger('province_id')->nullable(); // References provinces.id
            $table->unsignedBigInteger('regency_id')->nullable(); // References regencies.id
            $table->unsignedBigInteger('district_id')->nullable(); // References districts.id
            $table->string('postal_code')->nullable();
            $table->text('full_address')->nullable();
            $table->integer('point')->default(0);
            $table->string('profile_img')->nullable()->comment('path to image');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
};

