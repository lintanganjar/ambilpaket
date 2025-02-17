<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route untuk praktik halaman index dan subhalaman
// Route::name('index-practice')->get('/', function () {
//     return view('pages.practice.index');
// });

// Route::name('practice.')->group(function () {
//     Route::name('first')->get('practice/1', function () {
//         return view('pages.practice.1');
//     });
//     Route::name('second')->get('practice/2', function () {
//         return view('pages.practice.2');
//     });
// });


// Route::middleware(['auth'])->group(function () {
//     // <<<------- Customer ------->>>
//     Route::name('customer.')->prefix('customer')->middleware(['restrictRole:Customer'])->group(function () {
//         Route::controller(\App\Http\Controllers\Customer\Web\CekTarifController::class)->name('cekTarif.')->prefix('cekTarif')->group(function () {
//             Route::post('/', 'cekTarif')->name('index');
//         }); // Feature Cek 
//         Route::controller(\App\Http\Controllers\Customer\Web\AgenController::class)->name('agen.')->prefix('Agen')->group(function () {
//             Route::get('/', 'index')->name('index');
//             Route::get('/detail/{id}', 'show')->name('detail');
//         }); // Feature Cek Lokasi Agen
//         Route::controller(\App\Http\Controllers\Customer\Web\ProfileController::class)->name('profile.')->prefix('profile')->group(function () {
//             Route::get('/', 'profile')->name('profile');
//             Route::post('/update', 'update')->name('update');
//         }); // Feature Profile
//         Route::controller(\App\Http\Controllers\Customer\Web\RiwayatPengirimanController::class)->name('parcel.')->prefix('parcelHistory')->group(function () {
//             Route::get('/', 'index')->name('history');
//             Route::get('/show/{resi}', 'show')->name('show');
//             Route::post('/rate', 'rate')->name('rating');
//             Route::post('/updateRate/{id}', 'updateRate')->name('updateRate');
//         }); // Feature Riwayat Pengiriman
//         Route::controller(\App\Http\Controllers\Customer\Web\PoinController::class)->name('point.')->prefix('point')->group(function () {
//             Route::get('/', 'index')->name('point');
//             Route::get('/merch', 'showMerch')->name('merchList');
//             Route::get('/merch/{id}', 'showMerchDetail')->name('detail');
//             Route::post('/claimMerch', 'claimMerch')->name('claimMerch');
//         }); // Feature Point Claim Merch
//         Route::controller(\App\Http\Controllers\Customer\Web\ClaimHistoryController::class)->name('history.')->prefix('history')->group(function () {
//             Route::get('/', 'index')->name('tradeHistory');
//             Route::get('/show/{id}', 'show')->name('showDetail');
//         }); // Feature Trade History
//     });
//     // <<<------- END Customer ------->>> 

//     // <<<------- Finance ------->>>
//     Route::name('finance.')->prefix('finance')->middleware(['restrictRole:Finance'])->group(function () {
//         Route::controller(\App\Http\Controllers\Finance\ProfileController::class)->name('profile.')->prefix('profile')->group(function () {
//             Route::get('/', 'profile')->name('profile');
//             Route::post('/update', 'update')->name('update');
//         }); // Feature Profile
//         Route::controller(\App\Http\Controllers\Finance\ServiceController::class)->name('service.')->prefix('service')->group(function () {
//             Route::get('/', 'availableService')->name('availableService');
//             Route::post('/addService', 'addService')->name('addService');
//             Route::get('/show/{id}', 'showServiceProvider')->name('showService');
//             Route::post('/addServiceType/{id}', 'addServiceType')->name('addServiceType');
//             Route::post('/updateServiceProvider/{id}', 'updateServiceProvider')->name('updateServiceProvider');
//             Route::post('/updateServiceType/{id}', 'updateServiceType')->name('updateServiceType');
//             Route::delete('/deleteServiceProvider/{id}', 'deleteServiceProvider')->name('deleteServiceProvider');
//             Route::delete('/deleteServiceType/{id}', 'deleteServiceType')->name('deleteServiceType');
//         }); // Feature Service Data
//         Route::controller(\App\Http\Controllers\Finance\AgenController::class)->name('agen.')->prefix('agen')->group(function () {
//             Route::get('/', 'index')->name('getAllAgenWithSearch');
//             Route::get('/showDetailAgen/{id}', 'showDetailAgen')->name('showAgen');
//             Route::get('/topUpSaldo', 'topUpSaldo')->name('topUpSaldo');
//             Route::get('/topUpSaldoHistory', 'topUpSaldoHistory')->name('topUpSaldoHistory');
//             Route::get('/acceptTopUpSaldo/{id}', 'acceptTopUpSaldo')->name('acceptTopUpSaldo');
//             Route::get('/declineTopUpSaldo/{id}', 'declineTopUpSaldo')->name('declineTopUpSaldo');
//         }); // Feature Agen
//         Route::controller(\App\Http\Controllers\Finance\KurirController::class)->name('courier.')->prefix('courier')->group(function () {
//             Route::get('/', 'index')->name('getAllCouriersWithSearch');
//             Route::get('/showDetailCourier/{id}', 'showDetailCourier')->name('showDetailCourier');
//             Route::get('/courierWithdrawal', 'courierWithdrawal')->name('courierWithdrawal');
//             Route::get('/courierWithdrawalHistory', 'courierWithdrawalHistory')->name('courierWithdrawalHistory');
//             Route::get('/acceptCourierWithdrawal/{id}', 'acceptCourierWithdrawal')->name('acceptCourierWithdrawal');
//             Route::get('/declineCourierWithdrawal/{id}', 'declineCourierWithdrawal')->name('declineCourierWithdrawal');
//         }); // Feature Courier
//     });
// Route untuk logout
Route::post('/logout', function () {
    Auth::logout(); // Melakukan logout
    return redirect()->route('auth'); // Mengarahkan ke halaman login
})->name('logout');

Route::name('auth')->get('auth', function () {
    return view('pages.login-page');
});

    Route::name('customer')->get('/', function () {
        return view('pages.landing.customer-landing');
    });
    Route::name('delivery-price')->get('/price', function () {
        return view('pages.landing.cek-tarif');
    });
    Route::name('about')->get('/about', function () {
        return view('pages.landing.about');
    });
    Route::name('faq')->get('/faq', function () {
        return view('pages.landing.faq');
    });
    Route::name('faq-result')->get('/faq-result', function () {
        return view('pages.landing.faq-result');
    });
    Route::name('contact')->get('/contact', function () {
        return view('pages.landing.contact');
    });
    Route::name('umkm')->get('/umkm', function () {
        return view('pages.landing.umkm-landing');
    });
    Route::name('agen')->get('/agen', function () {
        return view('pages.landing.agen-landing');
    });


//     // <<<------- END Finance ------->>>
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login'])->name('login');
    // <<<------- Agen ------->>>
    Route::name('agen.')->prefix('agen')->group(function () {
        Route::controller(\App\Http\Controllers\Agen\ProfileController::class)->name('profile.')->prefix('profile')->group(function () {
            Route::get('/', 'profile')->name('profile');
            Route::post('/update', 'update')->name('update');
        }); // Feature Profile
        Route::controller(\App\Http\Controllers\Agen\PengirimanBaruController::class)->name('input-paket.')->prefix('input-paket')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/detail/{resi}', 'show')->name('show');
            Route::post('/create', 'store')->name('store');
            Route::post('/update/{resi}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        }); // Feature Pengiriman Baru (Input Paket)
        Route::controller(\App\Http\Controllers\Agen\RiwayatPengirimanController::class)->name('riwayat-pengiriman.')->prefix('riwayat-pengiriman')->group(function () {
            Route::get('/', 'index')->name('index');
        }); // Feature Riwayat Pengiriman
        Route::controller(\App\Http\Controllers\Agen\PaketKemitraanController::class)->name('paket-kemitraan.')->prefix('paket-kemitraan')->group(function () {
            Route::get('/current-package', 'showCurrentPackage')->name('current-package');
            Route::post('/upgrade-package', 'upgradePackage')->name('upgrade-package');
        }); // Feature Paket Kemitraan
        Route::controller(\App\Http\Controllers\Agen\SaldoController::class)->name('saldo.')->prefix('saldo')->group(function () {
            Route::get('/current-balance', 'showCurrentBalance')->name('current-balance');
            Route::post('/topup-balance', 'topup')->name('topup-balance');
        }); // Feature Saldo
        Route::controller(\App\Http\Controllers\Agen\Penjemputan\JadwalPenjemputanController::class)->name('jadwal-penjemputan.')->prefix('jadwal-penjemputan')->group(function () {
            Route::get('/', 'index')->name('index');
        }); // Feature Jadwal Penjemputan
        Route::controller(\App\Http\Controllers\Agen\Penjemputan\PengajuanJadwalController::class)->name('pengajuan-jadwal.')->prefix('pengajuan-jadwal')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/accept/{id}', 'accept')->name('accept');
            Route::post('/decline/{id}', 'decline')->name('decline');
        }); // Feature Pengajuan Jadwal
    });
    // <<<------- END Agen ------->>>

//     // <<<------- Customer UMKM ------->>>
//     Route::name('umkm.')->prefix('umkm')->group(function () {
//         Route::controller(\App\Http\Controllers\UMKM\Web\CekTarifController::class)->name('cekTarif.')->prefix('cekTarif')->group(function () {
//             Route::post('/', 'cekTarif')->name('index');
//         }); // Feature Cek 
//         Route::controller(\App\Http\Controllers\UMKM\Web\CekLokasiController::class)->name('agen.')->prefix('Agen')->group(function () {
//             Route::get('/', 'index')->name('index');
//             Route::get('/detail/{id}', 'show')->name('detail');
//         }); // Feature Cek Lokasi Agen
//         Route::controller(\App\Http\Controllers\UMKM\Web\ProfileController::class)->name('profile.')->prefix('profile')->group(function () {
//             Route::get('/', 'profile')->name('profile');
//             Route::post('/update', 'update')->name('update');
//         }); // Feature Profile
//         Route::controller(\App\Http\Controllers\UMKM\Web\RiwayatPengirimanController::class)->name('parcel.')->prefix('parcelHistory')->group(function () {
//             Route::get('/', 'index')->name('history');
//             Route::get('/show/{resi}', 'show')->name('show');
//             Route::post('/rate', 'rate')->name('rating');
//             Route::post('/updateRate/{id}', 'updateRate')->name('updateRate');
//         }); // Feature Riwayat Pengiriman
//         Route::controller(\App\Http\Controllers\UMKM\Web\PoinController::class)->name('point.')->prefix('point')->group(function () {
//             Route::get('/', 'index')->name('point');
//             Route::get('/merch', 'showMerch')->name('merchList');
//             Route::get('/merch/{id}', 'showMerchDetail')->name('detail');
//             Route::post('/claimMerch', 'claimMerch')->name('claimMerch');
//         }); // Feature Point Claim Merch
//         Route::controller(\App\Http\Controllers\UMKM\Web\ClaimHistoryController::class)->name('history.')->prefix('history')->group(function () {
//             Route::get('/', 'index')->name('tradeHistory');
//             Route::get('/show/{id}', 'show')->name('showDetail');
//         }); // Feature Trade History
//     });
//     // <<<------- END Customer UMKM ------->>>

    // <<<------- Admin Hub ------->>>
    Route::name('admin-hub.')->prefix('admin-hub')->group(function () {
        Route::controller(\App\Http\Controllers\Admin\DashboardController::class)->name('dashboard.')->prefix('dashboard')->group(function () {
            Route::get('/', 'index')->name('index');
        }); // Feature Dashboard
        Route::controller(\App\Http\Controllers\Admin\AgenController::class)->name('agen.')->prefix('agen')->group(function () {
            Route::get('/', 'data_agen')->name('data_agen');
            Route::get('/tambah', 'tambah')->name('tambah');
            Route::get('/agen-registration', 'agen_registration')->name('agen_registration');
            Route::get('/data-master', 'data_master')->name('data_master');
            Route::post('/terima-pendaftaran/{id}', 'terimaPendaftaran')->name('terimaPendaftaran');
            Route::post('/tolak-pendaftaran/{id}', 'tolakPendaftaran')->name('tolakPendaftaran');
        }); // Feature Agen
        Route::group(['middleware' => ['auth', 'verified', 'role:admin,manager,staff']], function () {

        });
        Route::prefix('data-master')->name('data-master.')->group(function () {
            Route::get('/', function(){
                return redirect()->route('admin-hub.data-master.data_hub');
            })->name('data_agen');
            Route::get('/data-hub', [\App\Http\Controllers\Admin\HubController::class, 'index'])->name('data_hub');
            Route::get('/data-kurir', [\App\Http\Controllers\Admin\KurirController::class, 'index'])->name('data_kurir');
            Route::get('/data-customer', [\App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('data_customer');
            Route::get('/data-umkm', [\App\Http\Controllers\Admin\UmkmController::class, 'index'])->name('data_umkm');
        });

        Route::prefix('pickup')->name('pickup.')->group(function () {
            Route::get('/pickup-schedule', [\App\Http\Controllers\Admin\JadwalPickUpAgenController::class, 'index'])->name('pickup_schedule');
            Route::get('/pengajuan-pickup', [\App\Http\Controllers\Admin\PengajuanPickupUmkmController::class, 'index'])->name('pengajuan_pickup');
            Route::get('/riwayat-pengajuan', [\App\Http\Controllers\Admin\RiwayatPengajuanPickUpController::class, 'index'])->name('riwayat_pengajuan');
        });

        
        Route::controller(\App\Http\Controllers\Admin\PaketController::class)->name('paket.')->prefix('paket')->group(function () {
            Route::get('/masuk', 'masuk')->name('masuk'); 
            Route::get('/keluar', 'keluar')->name('keluar');
            Route::get('/berlangsung', 'berlangsung')->name('berlangsung');
            Route::get('/berhasil', 'berhasil')->name('berhasil');
            Route::get('/gagal', 'gagal')->name('gagal');
            // Penugasan Kurir
            Route::get('/delivery', 'delivery')->name('delivery');
            Route::get('/pickup', 'pickup')->name('pickup');
            Route::post('/tugaskan', 'tugaskan')->name('tugaskan');
            // Riwayat Penugasan Kurir
            Route::get('/riwayat-penugasan', 'history_assigment')->name('history_assigment');
        }); // Feature Paket

        Route::controller(\App\Http\Controllers\Admin\MerchController::class)->name('merch.')->prefix('merch')->group(function () {
            Route::get('/stock', 'stock')->name('stock');
            Route::get('/pengiriman-baru', 'pengiriman_baru')->name('pengiriman_baru');
            Route::post('/pengiriman-baru', 'pengiriman_baru_store')->name('pengiriman_baru_store');
            Route::get('/waiting-list', 'waiting_list')->name('waiting_list');
            Route::get('/riwayat', 'riwayat')->name('riwayat');
        }); // Feature Merch

        // Route::controller(\App\Http\Controllers\Admin\JadwalPickupAgenController::class)->name('jadwal-pickup.')->prefix('jadwal-pickup')->group(function () {
        //     Route::get('/', 'index')->name('index');
        // }); // Feature Jadwal Pick-up Agen

        Route::controller(\App\Http\Controllers\Admin\ProfileController::class)->name('profile.')->prefix('profile')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/tambah', 'tambah')->name('tambah');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::delete('/hapus/{id}', 'hapus')->name('hapus');
        }); // Feature Profile  


        // Route::controller(\App\Http\Controllers\Admin\KurirController::class)->name('kurir.')->prefix('kurir')->group(function () {
        //     Route::get('/', 'index')->name('index');
        //     Route::get('/tambah', 'tambah')->name('tambah');
        // }); // Feature Kurir
        Route::controller(\App\Http\Controllers\Admin\PengajuanPickupUmkmController::class)->name('pengajuan-pickup.')->prefix('pengajuan-pickup')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/teruskan/{id}', 'teruskan')->name('teruskan');
        }); // Feature Pengajuan Pick-up UMKM
        Route::controller(\App\Http\Controllers\Admin\RiwayatPengajuanPickUpController::class)->name('riwayat-pengajuan.')->prefix('riwayat-pengajuan')->group(function () {
            Route::get('/', 'index')->name('index');
        }); // Feature Riwayat Pengajuan Pick-up


    });
    // <<<------- END AdminHub ------->>>

    // <<<------- Superadmin ------->>>
    Route::name('superadmin.')->prefix('superadmin')->group(function () {
        Route::controller(\App\Http\Controllers\Superadmin\ProfileController::class)->name('profile.')->prefix('profile')->group(function () {
            Route::get('/', 'profile')->name('profile');
            Route::post('/update', 'update')->name('update');
        }); // Feature Profile
        Route::controller(\App\Http\Controllers\Superadmin\HubController::class)->name('hub.')->prefix('hub')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/create', 'store')->name('store');
            Route::post('/update/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        }); // Feature Hubs
        Route::controller(\App\Http\Controllers\Superadmin\LayananController::class)->name('layanan.')->prefix('layanan')->group(function () {
            Route::get('/available', 'availableService')->name('available');
            Route::post('/add', 'addService')->name('add');
            Route::post('/add/{id}/type', 'addServiceType')->name('addType');
            Route::post('/update/{id}', 'updateServiceProvider')->name('updateProvider');
            Route::post('/update/{id}/type', 'updateServiceType')->name('updateType');
            Route::get('/{id}', 'showServiceProvider')->name('showProvider');
            Route::delete('/delete/{id}', 'deleteServiceProvider')->name('deleteProvider');
            Route::delete('/delete/type/{id}', 'deleteServiceType')->name('deleteType');
        }); // Feature Layanan
        Route::controller(\App\Http\Controllers\Superadmin\FinanceController::class)->name('finance.')->prefix('finance')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/create', 'store')->name('store');
            Route::post('/update/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        }); // Feature Finance
        Route::controller(\App\Http\Controllers\Superadmin\AdminHubController::class)->name('admin-hub.')->prefix('admin-hub')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/create', 'store')->name('store');
            Route::post('/update/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        }); // Feature Admin Hub
        Route::controller(\App\Http\Controllers\Superadmin\KurirController::class)->name('kurir.')->prefix('kurir')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/create', 'createCourier')->name('create');
            Route::get('/{id}', 'showDetailCourier')->name('showDetail');
            Route::post('/withdrawal', 'courierWithdrawal')->name('withdrawal');
            Route::get('/withdrawal-history', 'courierWithdrawalHistory')->name('withdrawalHistory');
            Route::post('/accept-withdrawal/{id}', 'acceptCourierWithdrawal')->name('acceptWithdrawal');
            Route::post('/decline-withdrawal/{id}', 'declineCourierWithdrawal')->name('declineWithdrawal');
            Route::delete('/{id}', 'destroy')->name('destroy');
        }); // Feature Kurir 
        Route::controller(\App\Http\Controllers\Superadmin\AgenController::class)->name('agen.')->prefix('agen')->group(function () {
            Route::get('/', 'getAllAgenWithSearch')->name('index');
            Route::get('/{id}', 'getAgenDetail')->name('showDetail');
            Route::get('/history/topup', 'getTopUpHistory')->name('getTopUpHistory');
            Route::post('/{id}/partnership', 'managePartnership')->name('managePartnership');
            Route::post('/{id}/topup', 'manageTopUpRequest')->name('manageTopUpRequest');
            Route::post('/store', 'storeAgen')->name('store');
            Route::post('approve/{id}', 'approveAgen')->name('agen.approve');
            Route::post('reject/{id}', 'rejectAgen')->name('agen.reject');
        }); // Feature Agen
        Route::controller(\App\Http\Controllers\Superadmin\MerchController::class)->name('merch.')->prefix('merch')->group(function () {
            Route::get('/stock', 'stock')->name('stock');
            Route::get('/stock/{id}', 'showMerch')->name('showMerch');
            Route::post('/stock/tambah', 'addMerch')->name('addMerch');
            Route::post('/stock/edit/{id} ', 'updateMerch')->name('updateMerch');
            Route::delete('/stock/delete/{id}', 'deleteMerch')->name('deleteMerch');
            Route::get('/waiting-list', 'waitingList')->name('waitingList');
            Route::post('/send-merch', 'sendMerchForm')->name('sendMerchForm');
            Route::get('/history', 'history')->name('history');
        }); //Feature Merch
        Route::controller(\App\Http\Controllers\Superadmin\InputPaketController::class)->name('input-paket.')->prefix('input-paket')->group(function () {
            Route::get('/create', 'create')->name('create'); // Menampilkan form input paket
            Route::post('/store', 'store')->name('store');   // Menyimpan data paket baru
        }); //Feature Input Paket
        Route::controller(\App\Http\Controllers\Superadmin\PaketController::class)->name('parcels.')->prefix('parcels')->group(function () {
            Route::post('/incoming', 'paketMasuk')->name('incoming'); // Paket Masuk
            Route::post('/outgoing', 'paketKeluar')->name('outgoing'); // Paket Keluar
            Route::get('/ongoing', 'paketBerlangsung')->name('ongoing');    // Paket Berlangsung
            Route::get('/success', 'paketBerhasil')->name('success');    // Paket Berhasil
            Route::get('/failed', 'paketGagal')->name('failed');       // Paket Gagal
            Route::post('/penugasan-kurir', 'penugasanKurir')->name('courierAssignments'); // Penugasan Kurir
            Route::get('/courier-assignment-history', 'riwayatPenugasanKurir')->name('courierAssignmentHistory'); // Riwayat Penugasan Kurir
        }); // Feature Parcels
        Route::controller(\App\Http\Controllers\Superadmin\AreaController::class)->name('area.')->prefix('area')->group(function () {
            Route::get('/', 'index')->name('index');
        }); // Feature Area
        Route::controller(\App\Http\Controllers\Superadmin\CustomerController::class)->name('customer.')->prefix('customer')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/create', 'createCustomer')->name('create');
        }); // Feature Customer
        Route::controller(\App\Http\Controllers\Superadmin\CustomerUmkmController::class)->name('umkm.')->prefix('umkm')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/create', 'createCustomerUmkm')->name('create');
        }); // Feature Customer Umkm
        Route::controller(\App\Http\Controllers\Superadmin\PickupRequestUmkmController::class)->name('requestpickup.')->prefix('requestpickup')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/request/{id}', 'assignToAgent')->name('assign');    
        }); // Feature Request Pickup Umkm
        Route::controller(\App\Http\Controllers\Superadmin\HistoryPickupRequestController::class)->name('historyrequestpickup.')->prefix('historyrequestpickup')->group(function () {
            Route::get('/', 'index')->name('index');
        }); // Feature History Request Pickup
        Route::controller(\App\Http\Controllers\Superadmin\JadwalPickupAgenController::class)->name('jadwalpickup.')->prefix('jadwalpickup')->group(function () {
            Route::get('/', 'index')->name('index');
        }); // Feature Jadwal Pickup Agen
    });
    // <<<------- END Superadmin ------->>>
// });
