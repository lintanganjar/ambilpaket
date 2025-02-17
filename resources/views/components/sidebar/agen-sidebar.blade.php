<x-sidebar-dashboard>
    <x-sidebar-menu-dashboard routeName="dashboard-agen" title="Dashboard" icon="mdi:view-dashboard"/>
    <x-sidebar-menu-dropdown-dashboard routeName="penjemputan.*" title="Penjemputan" icon="mdi:car">
        <x-sidebar-menu-dropdown-item-dashboard routeName="penjemputan.jadwal-penjemputan" title="Jadwal Penjemputan"/>
        <x-sidebar-menu-dropdown-item-dashboard routeName="penjemputan.pengajuan-jadwal" title="Pengajuan Jadwal"/>
    </x-sidebar-menu-dropdown-dashboard>
    <x-sidebar-menu-dropdown-dashboard routeName="pengiriman.*" title="Pengiriman" icon="mdi:package-variant-closed">
        <x-sidebar-menu-dropdown-item-dashboard routeName="pengiriman.pengiriman-baru" title="Pengiriman Baru"/>
        <x-sidebar-menu-dropdown-item-dashboard routeName="pengiriman.riwayat-pengiriman" title="Riwayat Pengiriman"/>
    </x-sidebar-menu-dropdown-dashboard>
    <x-sidebar-menu-dashboard routeName="paket-kemitraan" title="Paket Kemitraan" icon="mdi:handshake"/>
    <x-sidebar-menu-dashboard routeName="saldo" title="Saldo" icon="mdi:credit-card-outline"/>
    {{-- <x-sidebar-menu-dashboard routeName="agen-profile" title="Profile"/> --}}
</x-sidebar-dashboard>

