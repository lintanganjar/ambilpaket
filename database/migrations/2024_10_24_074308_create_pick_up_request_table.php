<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pick_up_request', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_umkm_id');
            $table->unsignedBigInteger('agen_id')->nullable();
            $table->integer('parcel_average_per_day');
            $table->string('parcel_type')->comment("contohnya seperti 'baju', 'alat mandi, dll'");
            $table->json('days_of_pickup')->comment("array hari pickup, ex:['senin','rabu','selasa']");
            $table->time('time_of_pickup');
            $table->string('reason')->nullable();
            $table->enum('status', ['Menunggu', 'Diterima', 'Ditolak'])->default('Menunggu');
            $table->boolean('is_assigned')->default(false)->comment("Tanda sudah diteruskan ke agen atau belum");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pick_up_request');
    }
};
