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
        Schema::create('partnership_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agen_id');
            $table->integer('amount');
            $table->unsignedBigInteger('from_partnership_id')->nullable();
            $table->unsignedBigInteger('into_partnership_id');
            $table->unsignedBigInteger('payment_method_id');
            $table->enum('request_status', ['Sukses', 'Pending', 'Ditolak']);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('partnership_transactions');
    }
};
