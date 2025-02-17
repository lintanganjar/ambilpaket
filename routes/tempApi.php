<?php

use App\Http\Controllers\ImageGetterController;
use App\Http\Controllers\Superadmin\InputPaketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| TEMPORARY API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Temporary API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// Route::prefix('role')->name('role.')->middleware(['role','verified'])->group(function (){
//     Route::controller(\App\Http\Controllers\Admin\AdminController::class)->name('hub.')->prefix('hub')->group(function () {
//         Route::any('/','index')->name('index');
//     });
// });
// Example above as Reverence Routing with Middleware


// TEST API ONGKIR ================================>
Route::controller(\App\Http\Controllers\TestingController::class)->group(function () {
    Route::post('/cekOngkir', 'cekOngkir')->name('cekOngkir');
});
// TEST API ONGKIR ================================>

// TEST City List ================================>
Route::controller(\App\Http\Controllers\CityController::class)->group(function () {
    Route::get('/getCity', 'getCityList')->name('cityList');
});
// TEST City List ================================>

// Start of USER Modul -------------------------------->
Route::controller(\App\Http\Controllers\TestingController::class)->name('loginSignUp.')->prefix('loginSignUp')->group(function () {
    Route::post('/', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(\App\Http\Controllers\TestingController::class)->name('user.')->prefix('user')->group(function () {
    Route::get('/ban/{id}', 'banUser')->name('ban');
    Route::get('/unBan/{id}', 'unBanUser')->name('unban');
});
// End of User Modul <--------------------------------
Route::middleware(['auth:sanctum'])->group(function () {

    // Test Image Getter
    // Route::get('/image/{context}/', ImageGetterController::class);

    // End of Test Image Getter
    // Start of HUB Modul -------------------------------->
    Route::controller(\App\Http\Controllers\TestingController::class)->name('hub.')->prefix('hub')->group(function () {
        Route::any('/', 'showHubs')->name('index');
        Route::get('/detail/{id}', 'getHubDetail')->name('show');
        Route::post('/create', 'createHub')->name('create');
        Route::post('/update/{id}', 'updateHub')->name('update');
        Route::post('/delete/{id}', 'deleteHub')->name('delete');
    });
    // End of HUB Modul <--------------------------------

    // Start of Admin Modul -------------------------------->
    Route::prefix('admin')->name('admin.')->middleware(['restrictRole:Superadmin'])->group(function () {
        Route::controller(\App\Http\Controllers\TestingController::class)->name('admin.')->prefix('admin')->group(function () {
            Route::any('/', 'showAdmins')->name('index');
            Route::get('/detail/{id}', 'getAdminDetail')->name('show');
            Route::post('/create', 'createAdmin')->name('create');
            Route::post('/update/{id}', 'updateAdmin')->name('update');
        });
    });
    // End of Admin Modul <--------------------------------

    // Start of Customer Modul -------------------------------->
    Route::controller(\App\Http\Controllers\TestingController::class)->name('customer.')->prefix('customer')->group(function () {
        Route::any('/', 'showCustomers')->name('index');
        Route::get('/detail/{id}', 'getCustomerDetail')->name('show');
        Route::post('/create', 'createCustomer')->name('create');
        Route::post('/update/{id}', 'updateCustomer')->name('update');
    });
    // End of Customer Modul <--------------------------------

    // Start of Finance Modul -------------------------------->
    Route::controller(\App\Http\Controllers\TestingController::class)->name('finance.')->prefix('finance')->group(function () {
        Route::any('/', 'showFinances')->name('index');
        Route::get('/detail/{id}', 'getFinanceDetail')->name('show');
        Route::post('/create', 'createFinance')->name('create');
        Route::post('/update/{id}', 'updateFinance')->name('update');
        // End of Finance Modul <---------------------------------
    });

    // Start of Umkm Modul -------------------------------->
    Route::controller(\App\Http\Controllers\TestingController::class)->name('umkm.')->prefix('umkm')->group(function () {
        Route::any('/', 'showUmkms')->name('index');
        Route::get('/detail/{id}', 'getUmkmDetail')->name('show');
        Route::post('/create', 'createUmkm')->name('create');
        Route::post('/update/{id}', 'updateUmkm')->name('update');
    });
    // End of Umkm Modul <---------------------------------

    // Start of Agen Modul -------------------------------->
    // Route::controller(\App\Http\Controllers\TestingController::class)->name('agen.')->prefix('agen')->group(function () {
    //     Route::any('/', 'showAgens')->name('index');
    //     Route::get('/detail/{id}', 'getAgenDetail')->name('show');
    //     Route::post('/create', 'createAgen')->name('create');
    //     Route::post('/update/{id}', 'updateAgen')->name('update');
    // });
    // End of Agen Modul <---------------------------------

    // Start of Agen Submission Modul -------------------------------->
    Route::controller(\App\Http\Controllers\TestingController::class)->name('agen-submission.')->prefix('agen-submission')->group(function () {
        Route::post('/create', 'createAgenSubmission')->name('create');
        Route::post('/confirm/{submissionId}', 'confirmAgenRegistration')->name('confirm');
    });
    // End of Agen Submission Modul --------------------------------

    // Start of Parcels Modul -------------------------------->
    // Route::controller(\App\Http\Controllers\TestingDuaController::class)->name('parcels.')->prefix('parcels')->group(function () {
    //     Route::any('/', 'index')->name('index');
    //     Route::get('/{resi}', 'showByResi')->name('showByResi');
    //     Route::post('/create', 'store')->name('create');
    //     Route::post('/{id}/update', 'update')->name('update');
    //     Route::post('/{id}/delete', 'destroy')->name('destroy');
    //     Route::patch('/{parcelId}/assign-courier', 'assignCourier')->name('assignCourier');
    // });
    // End of Parcels Modul <--------------------------------

    // Start of Courier Modul -------------------------------->
    // Route::controller(\App\Http\Controllers\TestingDuaController::class)->name('courier.')->prefix('courier')->group(function () {
    //     Route::any('/', 'getAllCouriersWithSearch')->name('index');
    //     Route::get('/detail/{id}', 'getDetailCourier')->name('show');
    //     Route::post('/create', 'createCourierWithUser')->name('create');
    //     Route::post('/update/{id}', 'updateCourier')->name('update');
    //     // Route::post('/registrationCourier', 'confirmCourierRegistration')->name('register');
    // });
    // End of Courier Modul <--------------------------------->

    // Start of Courier Submission Modul -------------------------------->
    Route::controller(\App\Http\Controllers\TestingDuaController::class)->name('courier-submission.')->prefix('courier-submission')->group(function () {
        Route::post('/create', 'createCourierSubmission')->name('create');
        Route::get('/confirm/{submissionId}', 'confirmCourierRegistration')->name('confirm');
    });
    // End of Courier Submission Modul --------------------------------

    // Start of Merch Modul -------------------------------->
    Route::controller(\App\Http\Controllers\TestingDuaController::class)->name('merch.')->prefix('merch')->group(function () {
        Route::any('/', 'showMerch')->name('index');
        Route::get('/detail/{id}', 'getMerchDetail')->name('show');
        Route::post('/create', 'createMerch')->name('create');
        Route::post('/update/{id}', 'updateMerch')->name('update');
        Route::delete('/delete/{id}', 'deleteMerch')->name('delete');
    });
    // End of Merch Modul <---------------------------------

    // Start of Merch Request Modul -------------------------------->
    Route::controller(\App\Http\Controllers\TestingDuaController::class)->name('merch-request.')->prefix('merch-request')->group(function () {
        Route::any('/', 'showMerchRequest')->name('index');
        Route::get('/detail/{id}', 'getMerchRequestDetail')->name('show');
        Route::post('/create', 'createMerchRequest')->name('create');
        Route::post('/create-parcel/{id}', 'createParcel')->name('create-parcel');
        Route::post('/decline/{id}', 'declineMerchRequest')->name('decline');
    });
    // End of Merch Request Modul <---------------------------------

    // Start of Keuangan Modul <--------------------------------
    // Start of Service Provider <--------------------------------
    Route::controller(\App\Http\Controllers\TestingDuaController::class)->name('service_provider.')->prefix('serviceprovider')->group(function () {
        Route::any('/', 'indexServiceProvider')->name('index');
    });
    // End of Service Provider <--------------------------------

    // Start of Service Types <--------------------------------
    Route::controller(\App\Http\Controllers\TestingDuaController::class)->name('service_type.')->prefix('servicetype')->group(function () {
        Route::any('/', 'getServiceProviderTypes')->name('index');
    });
    // End of Service Type <--------------------------------

    // Start of Service Price <--------------------------------
    Route::controller(\App\Http\Controllers\TestingDuaController::class)->name('service_price.')->prefix('service_price')->group(function () {
        Route::any('/', 'getAllWithSearch')->name('index');
    });
    // End of Service Price <--------------------------------

    // Start of Partnership Transation <--------------------------------
    Route::controller(\App\Http\Controllers\TestingDuaController::class)->name('partnership_transaction.')->prefix('partnership_transaction')->group(function () {
        Route::any('/', 'getHistoryWithSearch')->name('index');
    });
    // End of Partnership Transation <--------------------------------

    // Start of TopUp Transaction <--------------------------------
    Route::controller(\App\Http\Controllers\TestingDuaController::class)->name('top_up_transaction.')->prefix('top_up_transaction')->group(function () {
        Route::any('/', 'getTopupHistory')->name('index');
    });
    // End of TopUp Transaction <--------------------------------

    // Start of Courier Commissions <--------------------------------
    Route::controller(\App\Http\Controllers\TestingDuaController::class)->name('courier_commission.')->prefix('courier_commission')->group(function () {
        Route::any('/', 'getCourierCommission')->name('index');
    });
    // End of Courier Commissions <--------------------------------
    // End of Keuangan <--------------------------------

    // Start of Timeline <--------------------------------
    Route::controller(\App\Http\Controllers\TimelineController::class)->name('timeline.')->prefix('timeline')->group(function () {
        Route::any('/', 'index')->name('index');
        Route::post('/create', 'store')->name('store');
        Route::post('/update/{id}', 'update')->name('update');
    });
    // End of Courier Commissions <--------------------------------
});

// <--------------------------------->
// jika ingin mengetes tanpa login, taruh modulnya dibawah sini lalu pada terminal ketik
// php artisan optimize
// php artisan route:list
// lalu jalankan route yang ingin dicoba



// <---------------------------- Testing Route For FE integrating BE ---------------------------->

// Route::middleware(['auth:sanctum'])->group(function () {
//     // <<<------- Superadmin ------->>>
//     Route::name('superadmin.')->prefix('superadmin')->group(function () {
//         Route::controller(\App\Http\Controllers\Superadmin\ProfileController::class)->name('profile.')->prefix('profile')->group(function () {
//             Route::get('/', 'profile')->name('profile');
//             Route::post('/update', 'update')->name('update');
//         }); // Feature Profile
//         Route::controller(\App\Http\Controllers\Superadmin\HubController::class)->name('hub.')->prefix('hub')->group(function () {
//             Route::get('/', 'index')->name('index');
//             Route::post('/create', 'store')->name('store');
//             Route::post('/update/{id}', 'update')->name('update');
//             Route::delete('/{id}', 'destroy')->name('destroy');
//         }); // Feature Hubs
//         Route::controller(\App\Http\Controllers\Superadmin\LayananController::class)->name('layanan.')->prefix('layanan')->group(function () {
//             Route::get('/available', 'availableService')->name('available');
//             Route::post('/add', 'addService')->name('add');
//             Route::post('/add/{id}/type', 'addServiceType')->name('addType');
//             Route::post('/update/{id}', 'updateServiceProvider')->name('updateProvider');
//             Route::post('/update/{id}/type', 'updateServiceType')->name('updateType');
//             Route::get('/{id}', 'showServiceProvider')->name('showProvider');
//             Route::delete('/delete/{id}', 'deleteServiceProvider')->name('deleteProvider');
//             Route::delete('/delete/type/{id}', 'deleteServiceType')->name('deleteType');
//         }); // Feature Layanan
//         Route::controller(\App\Http\Controllers\Superadmin\FinanceController::class)->name('finance.')->prefix('finance')->group(function () {
//             Route::get('/', 'index')->name('index');
//             Route::post('/create', 'store')->name('store');
//             Route::post('/update/{id}', 'update')->name('update');
//             Route::delete('/{id}', 'destroy')->name('destroy');
//         }); // Feature Finance
//         Route::controller(\App\Http\Controllers\Superadmin\AdminHubController::class)->name('admin-hub.')->prefix('admin-hub')->group(function () {
//             Route::get('/', 'index')->name('index');
//             Route::post('/create', 'store')->name('store');
//             Route::post('/update/{id}', 'update')->name('update');
//             Route::delete('/{id}', 'destroy')->name('destroy');
//         }); // Feature Admin Hub
//         Route::controller(\App\Http\Controllers\Superadmin\KurirController::class)->name('kurir.')->prefix('kurir')->group(function () {
//             Route::get('/', 'index')->name('index');
//             Route::post('/create', 'createCourier')->name('create');
//             Route::get('/{id}', 'showDetailCourier')->name('showDetail');
//             Route::post('/withdrawal', 'courierWithdrawal')->name('withdrawal');
//             Route::get('/withdrawal-history', 'courierWithdrawalHistory')->name('withdrawalHistory');
//             Route::post('/accept-withdrawal/{id}', 'acceptCourierWithdrawal')->name('acceptWithdrawal');
//             Route::post('/decline-withdrawal/{id}', 'declineCourierWithdrawal')->name('declineWithdrawal');
//             Route::delete('/{id}', 'destroy')->name('destroy');
//         }); // Feature Kurir 
//         Route::controller(\App\Http\Controllers\Superadmin\AgenController::class)->name('agen.')->prefix('agen')->group(function () {
//             Route::get('/', 'getAllAgenWithSearch')->name('index');
//             Route::get('/{id}', 'getAgenDetail')->name('showDetail');
//             Route::get('/history/topup', 'getTopUpHistory')->name('getTopUpHistory');
//             Route::post('/{id}/partnership', 'managePartnership')->name('managePartnership');
//             Route::post('/{id}/topup', 'manageTopUpRequest')->name('manageTopUpRequest');
//             Route::post('/store', 'storeAgen')->name('store');
//             Route::post('approve/{id}', 'approveAgen')->name('agen.approve');
//             Route::post('reject/{id}', 'rejectAgen')->name('agen.reject');
//         }); // Feature Agen
//         Route::controller(\App\Http\Controllers\Superadmin\MerchController::class)->name('merch.')->prefix('merch')->group(function () {
//             Route::get('/stock', 'stock')->name('stock');
//             Route::get('/stock/{id}', 'showMerch')->name('showMerch');
//             Route::post('/stock/tambah', 'addMerch')->name('addMerch');
//             Route::post('/stock/edit/{id} ', 'updateMerch')->name('updateMerch');
//             Route::delete('/stock/delete/{id}', 'deleteMerch')->name('deleteMerch');
//             Route::get('/waiting-list', 'waitingList')->name('waitingList');
//             Route::post('/send-merch', 'sendMerchForm')->name('sendMerchForm');
//             Route::get('/history', 'history')->name('history');
//         }); //Feature Merch
//         Route::controller(\App\Http\Controllers\Superadmin\InputPaketController::class)->name('input-paket.')->prefix('input-paket')->group(function () {
//             Route::get('/create', 'create')->name('create'); // Menampilkan form input paket
//             Route::post('/store', 'store')->name('store');   // Menyimpan data paket baru
//         }); //Feature Input Paket
//         Route::controller(\App\Http\Controllers\Superadmin\PaketController::class)->name('parcels.')->prefix('parcels')->group(function () {
//             Route::post('/incoming', 'paketMasuk')->name('incoming'); // Paket Masuk
//             Route::post('/outgoing', 'paketKeluar')->name('outgoing'); // Paket Keluar
//             Route::get('/ongoing', 'paketBerlangsung')->name('ongoing');    // Paket Berlangsung
//             Route::get('/success', 'paketBerhasil')->name('success');    // Paket Berhasil
//             Route::get('/failed', 'paketGagal')->name('failed');       // Paket Gagal
//             Route::post('/penugasan-kurir', 'penugasanKurir')->name('courierAssignments'); // Penugasan Kurir
//             Route::get('/courier-assignment-history', 'riwayatPenugasanKurir')->name('courierAssignmentHistory'); // Riwayat Penugasan Kurir
//         }); // Feature Parcels
//         Route::controller(\App\Http\Controllers\Superadmin\AreaController::class)->name('area.')->prefix('area')->group(function () {
//             Route::get('/', 'index')->name('index');
//         }); // Feature Area
//         Route::controller(\App\Http\Controllers\Superadmin\CustomerController::class)->name('customer.')->prefix('customer')->group(function () {
//             Route::get('/', 'index')->name('index');
//             Route::post('/create', 'createCustomer')->name('create');
//         }); // Feature Customer
//         Route::controller(\App\Http\Controllers\Superadmin\CustomerUmkmController::class)->name('umkm.')->prefix('umkm')->group(function () {
//             Route::get('/', 'index')->name('index');
//             Route::post('/create', 'createCustomerUmkm')->name('create');
//         }); // Feature Customer Umkm
//         Route::controller(\App\Http\Controllers\Superadmin\PickupRequestUmkmController::class)->name('requestpickup.')->prefix('requestpickup')->group(function () {
//             Route::get('/', 'index')->name('index');
//             Route::post('/request/{id}', 'assignToAgent')->name('assign');    
//         }); // Feature Request Pickup Umkm
//         Route::controller(\App\Http\Controllers\Superadmin\HistoryPickupRequestController::class)->name('historyrequestpickup.')->prefix('historyrequestpickup')->group(function () {
//             Route::get('/', 'index')->name('index');
//         }); // Feature History Request Pickup
//         Route::controller(\App\Http\Controllers\Superadmin\JadwalPickupAgenController::class)->name('jadwalpickup.')->prefix('jadwalpickup')->group(function () {
//             Route::get('/', 'index')->name('index');
//         }); // Feature Jadwal Pickup Agen
//     });
//     // <<<------- END Superadmin ------->>>
// });
