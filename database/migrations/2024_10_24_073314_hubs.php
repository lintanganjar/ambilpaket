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
        Schema::create('hubs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('area_id'); // References areas.id
            $table->string('name');
            $table->unsignedBigInteger('province_id'); // References provinces.id
            $table->unsignedBigInteger('regency_id'); // References regencies.id
            $table->unsignedBigInteger('district_id'); // References districts.id
            $table->text('full_address');
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hubs');
    }
};

