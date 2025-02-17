<x-sidebar-dashboard>
    <x-sidebar-menu-dashboard routeName="admin-hub.dashboard.index" title="Dashboard" icon="mdi:view-dashboard"/>
    <x-sidebar-menu-dropdown-dashboard routeName="admin-hub.agen.*" title="Agen" icon="mdi:account-group">
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin-hub.agen.data_agen" title="Data Agen" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin-hub.agen.agen_registration*" title="Pendaftar Agen" />
    </x-sidebar-menu-dropdown-dashboard>
    <x-sidebar-menu-dropdown-dashboard routeName="admin-hub.data-master.*" title="Data Master" icon="mdi:database">
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin-hub.data-master.data_hub" title="Data Hub" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin-hub.data-master.data_kurir*" title="Data Kurir" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin-hub.data-master.data_customer" title="Data Customer" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin-hub.data-master.data_umkm*" title="Data Umkm" />
    </x-sidebar-menu-dropdown-dashboard>
    <x-sidebar-menu-dropdown-dashboard routeName="admin-hub.pickup.*" title="Pickup" icon="mdi:car">
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin-hub.pickup.pickup_schedule*" title="Jadwal Pickup" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin-hub.pickup.pengajuan_pickup*" title="Pengajuan Pickup" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin-hub.pickup.riwayat_pengajuan*" title="Riwayat Pengajuan" />
    </x-sidebar-menu-dropdown-dashboard>
    <x-sidebar-menu-dropdown-dashboard routeName="admin-hub.paket.*" title="Paket" icon="mdi:package-variant-closed">
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin-hub.paket.masuk*" title="Paket Masuk" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin-hub.paket.keluar*" title="Paket Keluar" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin-hub.paket.berlangsung*" title="Paket Berlangsung" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin-hub.paket.berhasil*" title="Paket Berhasil" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin-hub.paket.gagal*" title="Paket Gagal" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin-hub.paket.delivery*" title="Penugasan Kurir" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin-hub.paket.history_assigment*"   title="Riwayat Penugasan" />
    </x-sidebar-menu-dropdown-dashboard>
    <x-sidebar-menu-dropdown-dashboard routeName="admin-hub.merch.*" title="Merchandise" icon="mdi:store">
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin-hub.merch.stock*" title="Stok" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin-hub.merch.pengiriman_baru*" title="Pengiriman Baru" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin-hub.merch.waiting_list*" title="Permintaan" />
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin-hub.merch.riwayat*" title="Riwayat" />
    </x-sidebar-menu-dropdown-dashboard>
</x-sidebar-dashboard>
