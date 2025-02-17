<x-sidebar-dashboard>
    <x-sidebar-menu-dashboard routeName="dashboard-finance" title="Dashboard" icon="mdi:view-dashboard"/>
    <x-sidebar-menu-dropdown-dashboard routeName="layanan.*" title="Data Layanan" icon="mdi:tools">
        <x-sidebar-menu-dropdown-item-dashboard routeName="layanan.penyedia-layanan" title="Penyedia Layanan "/>
        <x-sidebar-menu-dropdown-item-dashboard routeName="layanan.layanan-tersedia" title="Layanan tersedia"/>
        <x-sidebar-menu-dropdown-item-dashboard routeName="layanan.harga-layanan" title="Harga Layanan"/>
    </x-sidebar-menu-dropdown-dashboard>
    <x-sidebar-menu-dropdown-dashboard routeName="agen.*" title="Agen" icon="mdi:account-group">
        <x-sidebar-menu-dropdown-item-dashboard routeName="agen.data-agen" title="Data Agen"/>
        <x-sidebar-menu-dropdown-item-dashboard routeName="agen.topup-saldo" title="Pengajuan Topup "/>
        <x-sidebar-menu-dropdown-item-dashboard routeName="agen.riwayat-topup" title="Riwayat Topup "/>
        <x-sidebar-menu-dropdown-item-dashboard routeName="agen.upgrade-kemitraan" title="Upgrade Kemitraan"/>
        <x-sidebar-menu-dropdown-item-dashboard routeName="agen.riwayat-upgrade-kemitraan" title="Riwayat Upgrade"/>
    </x-sidebar-menu-dropdown-dashboard>
    <x-sidebar-menu-dropdown-dashboard routeName="kurir.*" title="Kurir" icon="mdi:truck">
        <x-sidebar-menu-dropdown-item-dashboard routeName="kurir.data-kurir" title="Data Kurir"/>
        <x-sidebar-menu-dropdown-item-dashboard routeName="kurir.pencairan-kurir" title=" Pencairan Saldo"/>
        <x-sidebar-menu-dropdown-item-dashboard routeName="kurir.riwayat-pencairan" title="Riwayat Pencairan"/>
    </x-sidebar-menu-dropdown-dashboard>
    {{-- <x-sidebar-menu-dashboard routeName="finance-profile" title="Profile"/> --}}
</x-sidebar-dashboard>

