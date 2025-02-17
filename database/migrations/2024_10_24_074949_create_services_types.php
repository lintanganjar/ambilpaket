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
        Schema::create('services_types', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('service_provider_id');
            $table->string('name');
            $table->string('note')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services_types');
    }
};
