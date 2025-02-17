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
        Schema::create('merchandise_request', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('merchandise_id'); // reference merchandise_id
            $table->unsignedBigInteger('user_id'); // reference user_id
            $table->enum('status', ['Belum dikirim', 'Sudah dikirim', 'Selesai', 'Menunggu Konfirmasi', 'Ditolak'])->default('Menunggu Konfirmasi'); 
            $table->date('request_date'); 
            $table->integer('amount')->comment('jumlah'); 
            $table->string('note')->nullable(); // Catatan (opsional)
            $table->boolean('approval')->nullable()->comment('true diterima, false ditolak');

        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchandise_request');
    }
};
