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
        Schema::create('parcel_assigment', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('assignment_date');
            $table->unsignedBigInteger('kurir_id');
            $table->unsignedBigInteger('parcel_id');
            $table->string('status_reason')->nullable();
            $table->enum('status', ['Berhasil', 'Gagal'])->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcel_assigment');
    }
};
