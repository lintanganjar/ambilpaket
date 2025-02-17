<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// AUTH API
Route::controller(\App\Http\Controllers\API\AuthController::class)->name('auth.')->prefix('auth')->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
    Route::get('/logout', 'logout')->name('logout');
    Route::post('/send-otp', 'sendOtp')->name('sendOtp');
    Route::post('/send-otp-new-email', 'sendOtpNewEmail')->name('sendOtpNewEmail');
    Route::post('/verify-otp-new-email', 'verifyOtpNewEmail')->name('verifyOtpNewEmail');
});

Route::get('/image/{context}/', \App\Http\Controllers\ImageGetterController::class);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::controller(\App\Http\Controllers\API\AuthController::class)->name('auth.')->prefix('auth')->group(function () {
        Route::post('/verify-otp', 'verifyOtp')->name('verifyOtp');
        Route::post('/reset-password', 'resetPassword')->name('resetPassword');
    });

    Route::controller(\App\Http\Controllers\ProvinceController::class)->name('province.')->prefix('province')->group(function () {
        Route::get('/all-search', 'getAllProvinceSearch')->name('getAllProvinceSearch');
    });

    Route::controller(\App\Http\Controllers\RegencyController::class)->name('regency.')->prefix('regency')->group(function () {
        Route::get('/all-search', 'getAllRegencySearch')->name('getAllRegencySearch');
    });

    Route::controller(\App\Http\Controllers\DistrictController::class)->name('district.')->prefix('district')->group(function () {
        Route::get('/all-search', 'getAllDistrictSearch')->name('getAllDistrictSearch');
    });

    Route::controller(\App\Http\Controllers\BankController::class)->name('bank.')->prefix('bank')->group(function () {
        Route::get('/all-search', 'getAllBankSearch')->name('getAllBankSearch');
    });

    Route::controller(\App\Http\Controllers\API\UserController::class)->name('user.')->prefix('user')->group(function () {
        Route::get('/detail', 'getProfileDetail')->name('getProfileDetail');
        Route::post('/update', 'updateProfile')->name('updateProfile');
        Route::post('/change-email', 'updateEmail')->name('updateEmail');
        Route::post('/change-password', 'updatePassword')->name('updatePassword');
    });

    Route::controller(\App\Http\Controllers\API\UmkmController::class)->name('umkm.')->prefix('umkm')->group(function () {
        Route::post('/update-umkm', 'updateUmkmCompany')->name('updateUmkmCompany');
        Route::get('/detail-pickup-request', 'getDetailUmkmPickUpRequestByCustomerUmkmId')->name('getDetailUmkmPickUpRequestByCustomerUmkmId');
        Route::post('/post-pickup-request', 'postUmkmPickUpRequest')->name('postUmkmPickUpRequest');
        Route::post('/update-umkm-pickup', 'updateUmkmPickUp')->name('updateUmkmPickUp');
    });

    Route::controller(\App\Http\Controllers\API\CourierController::class)->name('courier.')->prefix('courier')->group(function () {
        Route::get('/all-courier-with-drawal', 'index')->name('index');
        Route::post('/create-courier-with-drawal', 'store')->name('store');
        Route::post('/update-courier-bank-account', 'updateCourierBankAccount')->name('updateCourierBankAccount');

        Route::prefix('parcel-assignment')->group(function () {
            Route::get('/all-with-search', 'getAllParcelAssignmentWithSearch')->name('getAllParcelAssignmentWithSearch');
            Route::get('/all', 'getAllParcelAssignment')->name('getAllParcelAssignment');
            Route::get('/detail/{id}', 'detailParcelAssignmentByResiNumber')->name('detailParcelAssignmentByResiNumber');
            Route::post('/update-parcel-assignment/{id}', 'updateParcelAssignment')->name('updateParcelAssignment');
        });
    });

    Route::controller(\App\Http\Controllers\API\ParcelsController::class)->name('parcels.')->prefix('parcels')->group(function () {
        Route::get('/all', 'getAllParcels')->name('getAllParcels');
        Route::get('/parcels-resi', 'getResiParcels')->name('getResiParcels');
    });

    Route::controller(\App\Http\Controllers\API\TempParcelController::class)->name('temp-parcels.')->prefix('temp-parcels')->group(function () {
        Route::get('/all', 'index')->name('index');
        Route::get('/detail/{id}', 'detail')->name('detail');
        Route::post('/create', 'store')->name('store');
        Route::post('/edit/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');
    });

    Route::controller(\App\Http\Controllers\API\RateController::class)->name('rate.')->prefix('rate')->group(function () {
        Route::get('/all', 'index')->name('index');
        Route::get('/detail/{id}', 'show')->name('show');
        Route::post('/create', 'store')->name('store');
        Route::post('/edit/{id}', 'update')->name('update');
    });

    Route::controller(\App\Http\Controllers\API\TimelimeController::class)->name('timeline.')->prefix('timeline')->group(function () {
        Route::get('/all', 'index')->name('index');
        Route::get('/detail/{id}', 'show')->name('show');
    });

    Route::controller(\App\Http\Controllers\Customer\Web\CekTarifController::class)->name('cekTarif.')->prefix('cekTarif')->group(function () {
        Route::post('/', 'cekTarif')->name('index');
    });

    Route::controller(\App\Http\Controllers\API\TempParcelController::class)->name('cekPriceService.')->prefix('cekPriceService')->group(function () {
        Route::post('/', 'cekPriceService')->name('index');
    });

    Route::controller(\App\Http\Controllers\API\MerchController::class)->name('merch.')->prefix('merch')->group(function () {
        Route::get('/merch-all', 'getAllMerch')->name('getAllMerch');
        Route::get('/merch-detail', 'getDetailMerch')->name('getDetailMerch');
        Route::get('/merch-history-request', 'getRequestMerch')->name('getRequestMerch');
        Route::post('/merch-request-post', 'requestMerch')->name('requestMerch');
    });

    Route::controller(\App\Http\Controllers\CityController::class)->group(function () {
        Route::get('/getCity', 'getCityList')->name('cityList');
    });

    Route::controller(\App\Http\Controllers\Customer\Web\AgenController::class)->name('agen.')->prefix('agen')->group(function () {
        Route::get('/location', 'index')->name('index');
        Route::get('/detail/{id}', 'show')->name('detail');
    });

    Route::controller(\App\Http\Controllers\API\AgenController::class)->name('agen.')->prefix('agen')->group(function () {
        Route::get('/detailRegency', 'getAgenDetailByRegency')->name('getAgenDetailByRegency');
    });
});
