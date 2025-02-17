<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->string('resi_number')->unique();
            $table->string('actual_resi_number')->unique();
            $table->unsignedBigInteger('agen_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('customer_umkm_id')->nullable();
            $table->integer('price')->nullable();
            $table->integer('agen_commission')->nullable();
            $table->enum('item_type', ['Barang', 'Dokumen'])->nullable();
            $table->string('item_name');
            $table->integer('amount');
            $table->string('weight')->nullable();
            $table->string('item_height')->nullable();
            $table->string('item_width')->nullable();
            $table->string('item_lenght')->nullable();
            $table->text('note')->nullable();
            $table->unsignedBigInteger('service_price_id')->nullable();
            $table->string('estimation_date');
            $table->string('receiver_origin')->nullable();
            $table->string('proof_img')->comment('path to image')->nullable();
            $table->enum('status', ['Gagal', 'Selesai', 'Dalam Perjalanan'])->default('Dalam Perjalanan');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('parcels');
    }
};
