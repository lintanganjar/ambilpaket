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
        Schema::create('rate', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('parcel_id')->unique();
            $table->unsignedBigInteger('kurir_id');
            $table->integer('expedition_rate')->nullable();
            $table->text('expedition_comment')->nullable();
            $table->integer('kurir_rate')->nullable();
            $table->string('kurir_comment')->nullable();
            
            // Foreign key constraints
            $table->foreign('parcel_id')->references('id')->on('parcels')->onDelete('cascade');
            $table->foreign('kurir_id')->references('id')->on('couriers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rate');
    }
};
