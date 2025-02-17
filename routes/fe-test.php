<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::name('auth')->get('/', function () {
    return view('pages.login-page');
});


Route::prefix('landing-page')->name('landing-page.')->group(function () {
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
});

// SUPERADMIN //
Route::prefix('superadmin')->group(function () {
    Route::name('superadmin-dashboard')->get('/', function () {
        return view('pages.superadmin.dashboard.index');
    });
    Route::name('superadmin-profile')->get('profile', function () {
        return view('pages.superadmin.profile.index');
    });
    Route::prefix('agen')->name('superadmin-agen.')->group(function () {
        Route::name('data-agen')->get('data-agen', function () {
            return view('pages.superadmin.agen.data-agen.index');
        });
        Route::name('agen-registration')->get('agen-registration', function () {
            return view('pages.superadmin.agen.pendaftaran-agen.index');
        });
        Route::name('topup-saldo')->get('topup-saldo', function () {
            return view('pages.superadmin.agen.topup-saldo.index');
        });
        Route::name('topup-history')->get('topup-history', function () {
            return view('pages.superadmin.agen.riwayat-topup-saldo-agen.index');
        });
        Route::name('partnership-upgrade')->get('partnership-upgrade', function () {
            return view('pages.superadmin.agen.upgrade-kemitraan.index');
        });
        Route::name('partnership-history')->get('partnership-history', function () {
            return view('pages.superadmin.agen.riwayat-upgrade-kemitraan.index');
        });
    });
    Route::prefix('kurir')->name('superadmin-kurir.')->group(function () {
        Route::name('data-kurir')->get('data-kurir', function () {
            return view('pages.superadmin.kurir.data-kurir.index');
        });
        Route::name('balance-disbursement')->get('balance-disbursement', function () {
            return view('pages.superadmin.kurir.pencairan-kurir.index');
        });
        Route::name('disbursement-history')->get('disbursement-history', function () {
            return view('pages.superadmin.kurir.riwayat-pencairan.index');
        });
    });
    Route::prefix('services')->name('superadmin-services.')->group(function () {
        Route::name('available-services')->get('available-services', function () {
            return view('pages.superadmin.layanan.layanan-tersedia.index');
        });
        Route::name('services-price')->get('services-price', function () {
            return view('pages.superadmin.layanan.harga-layanan.index');
        });
        Route::name('services-provider')->get('services-provider', function () {
            return view('pages.superadmin.layanan.penyedia-layanan.index');
        });
    });
    Route::prefix('data-master')->name('superadmin-data-master.')->group(function () {
        Route::name('data-area')->get('data-area', function () {
            return view('pages.superadmin.data-master.data-area.index');
        });
        Route::name('data-hub')->get('data-hub', function () {
            return view('pages.superadmin.data-master.data-hub.index');
        });
        Route::name('data-admin-hub')->get('data-admin-hub', function () {
            return view('pages.superadmin.data-master.data-admin-hub.index');
        });
        Route::name('data-customer')->get('data-customer', function () {
            return view('pages.superadmin.data-master.data-customer.index');
        });
        Route::name('data-finance')->get('data-finance', function () {
            return view('pages.superadmin.data-master.data-finance.index');
        });
        Route::name('data-umkm')->get('data-umkm', function () {
            return view('pages.superadmin.data-master.data-umkm.index');
        });
    });
    Route::prefix('pickup')->name('superadmin-pickup.')->group(function () {
        Route::name('pickup-schedule')->get('pickup-schedule', function () {
            return view('pages.superadmin.pickup.jadwal-pickup-agen.index');
        });
        Route::name('pickup-umkm-submission')->get('pickup-umkm-submission', function () {
            return view('pages.superadmin.pickup.pengajuan-pickup-umkm.index');
        });
        Route::name('pickup-submission-history')->get('pickup-submission-history', function () {
            return view('pages.superadmin.pickup.riwayat-pengajuan-pickup.index');
        });
    });
    Route::prefix('merch')->name('superadmin-merch.')->group(function () {
        Route::name('merch-stock')->get('stock', function () {
            return view('pages.superadmin.merch.stock.index');
        });
        Route::name('merch-send')->get('send', function () {
            return view('pages.superadmin.merch.sending.index');
        });
        Route::name('merch-history')->get('history', function () {
            return view('pages.superadmin.merch.history.index');
        });
        Route::name('merch-waiting-list')->get('waiting-list', function () {
            return view('pages.superadmin.merch.waiting-list.index');
        });
    });
    Route::prefix('parcel')->name('superadmin-parcel.')->group(function () {
        Route::name('success-parcel')->get('success-parcel', function () {
            return view('pages.superadmin.paket.paket-berhasil.index');
        });
        Route::name('pending-parcel')->get('pending-parcel', function () {
            return view('pages.superadmin.paket.paket-berlangsung.index');
        });
        Route::name('fail-parcel')->get('fail-parcel', function () {
            return view('pages.superadmin.paket.paket-gagal.index');
        });
        Route::name('incoming-parcel')->get('incoming-parcel', function () {
            return view('pages.superadmin.paket.paket-masuk.index');
        });
        Route::name('outcoming-parcel')->get('outcoming-parcel', function () {
            return view('pages.superadmin.paket.paket-keluar.index');
        });
        Route::name('new-parcel-delivery')->get('new-parcel-delivery', function () {
            return view('pages.superadmin.paket.pengiriman-baru.index');
        });
        Route::name('courier-assignment')->get('courier-assignment', function () {
            return view('pages.superadmin.paket.penugasan-kurir.index');
        });
        Route::name('assignment-history')->get('assignment-history', function () {
            return view('pages.superadmin.paket.riwayat-penugasan-kurir.index');
        });
    });
});

// ADMIN HUB //
Route::prefix('admin-hub')->group(function () {
    Route::name('admin-hub-dashboard')->get('/', function () {
        return view('pages.admin-hub.dashboard.index');
    });
    Route::name('admin-hub-profile')->get('profile', function () {
        return view('pages.admin-hub.profile.index');
    });
    Route::prefix('agen')->name('admin-hub-agen.')->group(function () {
        Route::name('data-agen')->get('data-agen', function () {
            return view('pages.admin-hub.agen.data-agen.index');
        });
        Route::name('agen-registration')->get('agen-registration', function () {
            return view('pages.admin-hub.agen.pendaftaran-agen.index');
        });
    });
    Route::prefix('data-master')->name('admin-hub-data-master.')->group(function () {
        Route::name('data-hub')->get('data-hub', function () {
            return view('pages.admin-hub.data-master.data-hub.index');
        });
        Route::name('data-customer')->get('data-customer', function () {
            return view('pages.admin-hub.data-master.data-customer.index');
        });
        Route::name('data-kurir')->get('data-kurir', function () {
            return view('pages.admin-hub.data-master.data-kurir.index');
        });
        Route::name('data-umkm')->get('data-umkm', function () {
            return view('pages.admin-hub.data-master.data-umkm.index');
        });
    });
    Route::prefix('pickup')->name('admin-hub-pickup.')->group(function () {
        Route::name('pickup-schedule')->get('pickup-schedule', function () {
            return view('pages.admin-hub.pickup.jadwal-pickup-agen.index');
        });
        Route::name('pickup-umkm-submission')->get('pickup-umkm-submission', function () {
            return view('pages.admin-hub.pickup.pengajuan-pickup-umkm.index');
        });
        Route::name('pickup-submission-history')->get('pickup-submission-history', function () {
            return view('pages.admin-hub.pickup.riwayat-pengajuan-pickup.index');
        });
    });
    Route::prefix('merch')->name('admin-hub-merch.')->group(function () {
        Route::name('merch-stock')->get('stock', function () {
            return view('pages.admin-hub.merch.stock.index');
        });
        Route::name('merch-send')->get('send', function () {
            return view('pages.admin-hub.merch.sending.index');
        });
        Route::name('merch-history')->get('history', function () {
            return view('pages.admin-hub.merch.history.index');
        });
        Route::name('merch-waiting-list')->get('waiting-list', function () {
            return view('pages.admin-hub.merch.waiting-list.index');
        });
    });
    Route::prefix('parcel')->name('admin-hub-parcel.')->group(function () {
        Route::name('success-parcel')->get('success-parcel', function () {
            return view('pages.admin-hub.paket.paket-berhasil.index');
        });
        Route::name('pending-parcel')->get('pending-parcel', function () {
            return view('pages.admin-hub.paket.paket-berlangsung.index');
        });
        Route::name('fail-parcel')->get('fail-parcel', function () {
            return view('pages.admin-hub.paket.paket-gagal.index');
        });
        Route::name('incoming-parcel')->get('incoming-parcel', function () {
            return view('pages.admin-hub.paket.paket-masuk.index');
        });
        Route::name('outcoming-parcel')->get('outcoming-parcel', function () {
            return view('pages.admin-hub.paket.paket-keluar.index');
        });
        Route::name('courier-assignment')->get('courier-assignment', function () {
            return view('pages.admin-hub.paket.penugasan-kurir.index');
        });
        Route::name('assignment-history')->get('assignment-history', function () {
            return view('pages.admin-hub.paket.riwayat-penugasan-kurir.index');
        });
    });
});

// FINANCE
Route::prefix('finance')->group(function () {
    Route::name('dashboard-finance')->get('/', function () {
        return view('pages.finance.dashboard.index');
    });
    Route::name('finance-profile')->get('finance-profile', function () {
        return view('pages.finance.profile.index');
    });

    Route::prefix('layanan')->name('layanan.')->group(function () {
        Route::name('penyedia-layanan')->get('penyedia-layanan', function () {
            return view('pages.finance.data-layanan.penyedia-layanan.index');
        });
        Route::name('layanan-tersedia')->get('layanan-tersedia', function () {
            return view('pages.finance.data-layanan.layanan-tersedia.index');
        });
        Route::name('harga-layanan')->get('harga-layanan', function () {
            return view('pages.finance.data-layanan.harga-layanan.index');
        });
    });
    Route::prefix('agen')->name('agen.')->group(function () {
        Route::name('data-agen')->get('data-agen', function () {
            return view('pages.finance.agen.data-agen.index');
        });
        Route::name('topup-saldo')->get('topup-saldo', function () {
            return view('pages.finance.agen.topup-saldo.index');
        });
        Route::name('riwayat-topup')->get('riwayat-topup', function () {
            return view('pages.finance.agen.riwayat-topup-saldo-agen.index');
        });
        Route::name('upgrade-kemitraan')->get('upgrade-kemitraan', function () {
            return view('pages.finance.agen.upgrade-kemitraan.index');
        });
        Route::name('riwayat-upgrade-kemitraan')->get('riwayat-upgrade-kemitraan', function () {
            return view('pages.finance.agen.riwayat-upgrade-kemitraan.index');
        });
    });
    Route::prefix('kurir')->name('kurir.')->group(function () {
        Route::name('data-kurir')->get('data-kurir', function () {
            return view('pages.finance.kurir.data-kurir.index');
        });
        Route::name('pencairan-kurir')->get('pencairan-kurir', function () {
            return view('pages.finance.kurir.pencairan-kurir.index');
        });
        Route::name('riwayat-pencairan')->get('riwayat-pencairan', function () {
            return view('pages.finance.kurir.riwayat-pencairan-kurir.index');
        });
    });
});

// AGEN
Route::prefix('agen')->group(function () {
    Route::name('dashboard-agen')->get('/', function () {
        return view('pages.agen.dashboard.index');
    });
    Route::name('agen-profile')->get('profile', function () {
        return view('pages.agen.profile.index');
    });
   

//     // PAKET KEMITRAAN
    Route::name('paket-kemitraan')->get('paket-kemitraan', function () {
        return view('pages.agen.paket-kemitraan.index');
    });
    Route::name('pembayaran')->get('pembayaran', function () {
        return view('pages.agen.paket-kemitraan.pembayaran');
    });
    Route::name('detail-pembayaran')->get('detail-pembayaran', function () {
        return view('pages.agen.paket-kemitraan.detail-pembayaran');
    });

    // SALDO
    Route::name('saldo')->get('saldo', function () {
        return view('pages.agen.saldo.index');
    });
    Route::name('detail-topup-saldo')->get('detail-topup-saldo', function () {
        return view('pages.agen.saldo.detail-topup');
    });
    Route::name('topup-saldo')->get('topup-saldo', function () {
        return view('pages.agen.saldo.topup');
    });

    Route::prefix('pengiriman')->name('pengiriman.')->group(function () {
        Route::name('pengiriman-baru')->get('pengiriman-baru', function () {
            return view('pages.agen.pengiriman.pengiriman-baru.index');
        });
        Route::name('riwayat-pengiriman')->get('riwayat-pengiriman', function () {
            return view('pages.agen.pengiriman.riwayat-pengiriman.index');
        });
    });

    Route::prefix('penjemputan')->name('penjemputan.')->group(function () {
        Route::name('jadwal-penjemputan')->get('jadwal-penjemputan', function () {
            return view('pages.agen.penjemputan.jadwal-penjemputan.index');
        });
        Route::name('pengajuan-jadwal')->get('pengajuan-jadwal', function () {
            return view('pages.agen.penjemputan.pengajuan-jadwal.index');
        });
    });
 
});
