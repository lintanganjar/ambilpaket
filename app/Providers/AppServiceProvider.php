<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Validasi custom untuk nomor telepon (9-14 digit angka)
        Validator::extend('phone_number', function ($attribute, $value, $parameters, $validator) {
            return (bool) preg_match('/^[0-9]{9,14}$/', $value);
        });

        // Pesan error custom
        Validator::replacer('phone_number', function ($message, $attribute, $rule, $parameters) {
            return "Format $attribute tidak valid. Gunakan angka 9-14 digit.";
        });
    }
}
