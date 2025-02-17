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
        Schema::create('temp_parcels', function (Blueprint $table) {
            $table->id();
            $table->string('temp_resi_number')->unique();
            $table->unsignedBigInteger('customer_id')->nullable(); // References customers.id, nullable
            $table->unsignedBigInteger('customer_umkm_id')->nullable(); // References customer_umkms.id, nullable
            $table->integer('price');
            $table->enum('item_type', ['Barang', 'Dokumen']); // Define appropriate item types here
            $table->string('item_name');
            $table->integer('amount');
            $table->string('weight');
            $table->string('item_height')->nullable();
            $table->string('item_width')->nullable();
            $table->string('item_length')->nullable();
            $table->text('note')->nullable();
            $table->unsignedBigInteger('service_price_id'); // References service_prices.id
            $table->string('estimation_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temp_parcels');
    }
};
