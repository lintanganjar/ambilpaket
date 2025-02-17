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
        Schema::create('partnerships', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->integer('commission')->comment('1-100');
            $table->json('other_benefits')->comment('berupa array benefits');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('partnerships');
    }
};
