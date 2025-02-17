<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        //Table Provinces
        Schema::table('provinces', function (Blueprint $table) {
            // do nothing :)
        });
        //Table Regencies
        Schema::table('regencies', function (Blueprint $table) {
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
        });
        //Table Districts
        Schema::table('districts', function (Blueprint $table) {
            $table->foreign('regency_id')->references('id')->on('regencies')->onDelete('cascade');
        });
        //Table Superadmins
        Schema::table('superadmins', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //Regencies
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('regency_id')->references('id')->on('regencies')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
        });
        //Table Finances
        Schema::table('finances', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //Regencies
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('regency_id')->references('id')->on('regencies')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
        });
        //Table Admins
        Schema::table('admins', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('hub_id')->references('id')->on('hubs')->onDelete('cascade');
            //Regencies
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('regency_id')->references('id')->on('regencies')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
        });
        //Table Agens
        Schema::table('agens', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('partnership_id')->references('id')->on('partnerships')->onDelete('cascade');
            $table->foreign('submission_id')->references('id')->on('agen_submissions')->onDelete('cascade');
            //Regencies
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('regency_id')->references('id')->on('regencies')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
        });
        //Table Agen Submissions
        Schema::table('agen_submissions', function (Blueprint $table) {
            $table->foreign('agen_province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('agen_regency_id')->references('id')->on('regencies')->onDelete('cascade');
            $table->foreign('agen_district_id')->references('id')->on('districts')->onDelete('cascade');
        });
        //Table Couriers
        Schema::table('couriers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
        });
        //Table Customer UMKM
        Schema::table('customer_umkms', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //Regencies
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('regency_id')->references('id')->on('regencies')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
        });
        //Table Customer
        Schema::table('customers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //Regencies
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('regency_id')->references('id')->on('regencies')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
        });
        //Table Hubs
        Schema::table('hubs', function (Blueprint $table) {
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            //Regencies
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('regency_id')->references('id')->on('regencies')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
        });
        //Table Partnership Transactions
        Schema::table('partnership_transactions', function (Blueprint $table) {
            $table->foreign('agen_id')->references('id')->on('agens')->onDelete('cascade');
            $table->foreign('from_partnership_id')->references('id')->on('partnerships')->onDelete('cascade');
            $table->foreign('into_partnership_id')->references('id')->on('partnerships')->onDelete('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
        });
        //Table Top Up Transactions
        Schema::table('top_up_transactions', function (Blueprint $table) {
            $table->foreign('agen_id')->references('id')->on('agens')->onDelete('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
        });
        //Table Pick Up Request
        Schema::table('pick_up_request', function (Blueprint $table) {
            $table->foreign('customer_umkm_id')->references('id')->on('customer_umkms')->onDelete('cascade');
            $table->foreign('agen_id')->references('id')->on('agens')->onDelete('set null');
        });
        //Table Pick Up Schedule
        Schema::table('pick_up_schedule', function (Blueprint $table) {
            $table->foreign('request_id')->references('id')->on('pick_up_request')->onDelete('cascade');
            $table->foreign('agen_id')->references('id')->on('agens')->onDelete('cascade');
            $table->foreign('customer_umkm_id')->references('id')->on('customer_umkms')->onDelete('cascade');
        });
        //Table Parcel Receivers
        Schema::table('parcel_receivers', function (Blueprint $table) {
            $table->foreign('parcel_id')->references('id')->on('parcels')->onDelete('cascade');
            $table->foreign('reciever_province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('reciever_regency_id')->references('id')->on('regencies')->onDelete('cascade');
            $table->foreign('reciever_district_id')->references('id')->on('districts')->onDelete('cascade');
        });
        //Table Parcel Senders
        Schema::table('parcel_senders', function (Blueprint $table) {
            $table->foreign('parcel_id')->references('id')->on('parcels')->onDelete('cascade');
            $table->foreign('sender_province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('sender_regency_id')->references('id')->on('regencies')->onDelete('cascade');
            $table->foreign('sender_district_id')->references('id')->on('districts')->onDelete('cascade');
        });
        //Table Temp Parcel 
        Schema::table('temp_parcels', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('customer_umkm_id')->references('id')->on('customer_umkms')->onDelete('cascade');
            $table->foreign('service_price_id')->references('id')->on('services_prices')->onDelete('cascade');
        });
        //Table Temp Parcel Receivers
        Schema::table('temp_parcel_receivers', function (Blueprint $table) {
            $table->foreign('parcel_id')->references('id')->on('temp_parcels')->onDelete('cascade');
            $table->foreign('reciever_province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('reciever_regency_id')->references('id')->on('regencies')->onDelete('cascade');
            $table->foreign('reciever_district_id')->references('id')->on('districts')->onDelete('cascade');
        });
        //Table Temp Parcel Senders
        Schema::table('temp_parcel_senders', function (Blueprint $table) {
            $table->foreign('parcel_id')->references('id')->on('temp_parcels')->onDelete('cascade');
            $table->foreign('sender_province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('sender_regency_id')->references('id')->on('regencies')->onDelete('cascade');
            $table->foreign('sender_district_id')->references('id')->on('districts')->onDelete('cascade');
        });
        //Table Timeline
        Schema::table('timeline', function (Blueprint $table) {
            $table->foreign('parcel_id')->references('id')->on('parcels')->onDelete('cascade');
        });
        //Table Parcel Assigment
        Schema::table('parcel_assigment', function (Blueprint $table) {
            $table->foreign('kurir_id')->references('id')->on('couriers')->onDelete('cascade');
            $table->foreign('parcel_id')->references('id')->on('parcels')->onDelete('cascade');
        });
        //Table Services Types
        Schema::table('services_types', function (Blueprint $table) {
            $table->foreign('service_provider_id')->references('id')->on('services_providers')->onDelete('cascade');
        });
        //Table Services Prices
        Schema::table('services_prices', function (Blueprint $table) {
            $table->foreign('service_type_id')->references('id')->on('services_types')->onDelete('cascade');
        });
        //Table Merchandise Request
        Schema::table('merchandise_request', function (Blueprint $table) {
            $table->foreign('merchandise_id')->references('id')->on('merchandise')->onDelete('cascade'); // Foreign key ke tabel merchandise
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Foreign key ke tabel users
        });
        //Table Point Transactions
        Schema::table('point_transactions', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        /* Dibawah ini untuk apa ?
        DB::statement("CREATE TYPE request_status AS ENUM ('Sukses', 'Pending', 'Ditolak');");
        DB::statement("CREATE TYPE pickupstatus AS ENUM ('Diterima', 'Menunggu', 'Ditolak');");
        */

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // do nothing :)
        /* Dibawah ini untuk apa ?
        DB::statement("DROP TYPE request_status;");
        DB::statement("DROP TYPE pickupstatus;");
        */
    }
};
