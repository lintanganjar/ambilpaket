<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('courier_withdrawal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('courier_id');
            $table->integer('amount');
            $table->string('bank_name');
            $table->string('account_name');
            $table->string('account_number');
            $table->enum('request_status', [ 'Sukses','Pending','Ditolak']); 
            $table->timestamps();
           
            $table->foreign('courier_id')->references('id')->on('couriers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courier_withdrawal');
    }
};
