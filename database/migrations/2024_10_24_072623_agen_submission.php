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
        Schema::create('agen_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('agen_first_name');
            $table->string('agen_last_name')->nullable();
            $table->string('agen_phone_number');
            $table->string('agen_email');
            $table->string('agen_password');
            $table->unsignedBigInteger('agen_province_id')->nullable();
            $table->unsignedBigInteger('agen_regency_id')->nullable();
            $table->unsignedBigInteger('agen_district_id')->nullable();
            $table->text('agen_full_address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('building_type');
            $table->string('building_status');
            $table->string('location');
            $table->string('ktp_img')->nullable()->comment('path to image');
            $table->string('npwp_img')->nullable()->comment('path to image');
            $table->string('akta_pendiri_perusahaan_img')->nullable()->comment('path to image');
            $table->string('suket_domisili_usaha_img')->nullable()->comment('path to image');
            $table->string('surat_izin_usaha_perusahaan_img')->nullable()->comment('path to image');
            $table->string('location_img')->nullable()->comment('path to image');
            $table->string('building_condition_img')->nullable()->comment('path to image');
            $table->boolean('approval')->default(false)->nullable()->comment('true diterima, false ditolak');
            $table->string('bank_name');
            $table->string('account_name');
            $table->string('account_number');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agen_submissions');
    }
};
