<x-sidebar-dashboard>
    <x-sidebar-menu-dashboard routeName="superadmin-dashboard*" title="Dashboard" icon="mdi:view-dashboard"/>
    <x-sidebar-menu-dropdown-dashboard routeName="superadmin-agen.*" title="Agen" icon="mdi:account-group">
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-agen.data-agen*" title="Data Agen"/>
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-agen.agen-registration*" title="Pendaftar Agen" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-agen.topup-saldo*" title="Topup Saldo" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-agen.topup-history*" title="Riwayat Topup" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-agen.partnership-upgrade*" title="Kemitraan" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-agen.partnership-history*" title="Riwayat Kemitraan" />
    </x-sidebar-menu-dropdown-dashboard>
    <x-sidebar-menu-dropdown-dashboard routeName="superadmin-kurir.*" title="Kurir" icon="mdi:truck">
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-kurir.data-kurir*" title="Data Kurir" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-kurir.balance-disbursement*"
            title="Pencairan Saldo" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-kurir.disbursement-history*"
            title="Riwayat Pencairan" />
    </x-sidebar-menu-dropdown-dashboard>
    <x-sidebar-menu-dropdown-dashboard routeName="superadmin-services.*" title="Layanan" icon="mdi:tools">
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-services.services-provider*" title="Penyedia Layanan" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-services.available-services*" title="Layanan Tersedia" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-services.services-price*" title="Harga Layanan" />
    </x-sidebar-menu-dropdown-dashboard>
    <x-sidebar-menu-dropdown-dashboard routeName="superadmin-data-master.*" title="Data Master" icon="mdi:database">
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-data-master.data-area*" title="Data Area" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-data-master.data-hub*" title="Data HUB" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-data-master.data-admin-hub*"
            title="Data Admin HUB" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-data-master.data-customer*"
            title="Data Customer" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-data-master.data-finance*" title="Data Finance" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-data-master.data-umkm*" title="Data Umkm" />
    </x-sidebar-menu-dropdown-dashboard>
    <x-sidebar-menu-dropdown-dashboard routeName="superadmin-pickup.*" title="Pickup" icon="mdi:car">
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-pickup.pickup-schedule*" title="Jadwal Pickup" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-pickup.pickup-umkm-submission*"
            title="Pengajuan Pickup" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-pickup.pickup-submission-history*"
            title="Riwayat Pengajuan" />
    </x-sidebar-menu-dropdown-dashboard>
    <x-sidebar-menu-dropdown-dashboard routeName="superadmin-parcel.*" title="Paket" icon="mdi:package-variant-closed">
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-parcel.incoming-parcel*" title="Paket Masuk" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-parcel.outcoming-parcel*" title="Paket Keluar" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-parcel.pending-parcel*"
            title="Paket Berlangsung" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-parcel.success-parcel*" title="Paket Berhasil" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-parcel.fail-parcel*" title="Paket Gagal" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-parcel.new-parcel-delivery*"
            title="Pengiriman Baru" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-parcel.courier-assignment*"
            title="Penugasan Kurir" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-parcel.assignment-history*"
            title="Riwayat Penugasan" />
    </x-sidebar-menu-dropdown-dashboard>
    <x-sidebar-menu-dropdown-dashboard routeName="superadmin-merch.*" title="Merchandise" icon="mdi:store">
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-merch.merch-stock*" title="Stok" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-merch.merch-send*" title="Pengiriman Baru" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-merch.merch-waiting-list*" title="Permintaan" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="superadmin-merch.merch-history*" title="Riwayat" />
    </x-sidebar-menu-dropdown-dashboard>
</x-sidebar-dashboard>
