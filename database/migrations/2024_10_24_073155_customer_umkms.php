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
        Schema::create('customer_umkms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number')->nullable();
            $table->string('company_name')->nullable();
            $table->string('product_type')->nullable();
            $table->unsignedBigInteger('province_id')->nullable(); // References provinces.id
            $table->unsignedBigInteger('regency_id')->nullable(); // References regencies.id
            $table->unsignedBigInteger('district_id')->nullable(); // References districts.id;
            $table->text('full_address')->nullable();
            $table->integer('point')->default(0);
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->integer('parcel_average_per_day')->nullable();
            $table->boolean('pickup_activation')->default(true)->nullable();
            $table->json('days_of_pickup')->comment("array hari pickup, ex:['senin','rabu','selasa']")->nullable();
            $table->time('time_of_pickup')->nullable();
            $table->string('profile_img')->nullable()->comment('path to image');

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
        Schema::dropIfExists('customer_umkms');
    }
};