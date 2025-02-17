<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pick_up_schedule', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_id');
            $table->unsignedBigInteger('agen_id');
            $table->unsignedBigInteger('customer_umkm_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pick_up_schedule');
    }
};
