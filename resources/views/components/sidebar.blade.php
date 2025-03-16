<div id="sidebar-wrapper">
    <div class="sidebar-heading">
        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" height="30">
        <span class="ms-2">SPI PNP</span>
    </div>
    
    <div class="list-group list-group-flush">
        <a href="{{ route('admin.dashboard') }}" 
           class="list-group-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-home"></i>
            <span>Dashboard</span>
        </a>

        <!-- Keuangan -->
        <div class="sidebar-item">
            <a href="#keuangan" 
               class="list-group-item {{ request()->is('admin/keuangan*') ? 'active' : '' }}"
               data-bs-toggle="collapse" 
               role="button">
                <i class="fas fa-chart-line"></i>
                <span>Keuangan</span>
                <i class="fas fa-chevron-right ms-auto"></i>
            </a>
            <div class="collapse {{ request()->is('admin/keuangan*') ? 'show' : '' }}" id="keuangan">
                <div class="sub-menu">
                    <a href="#" class="list-group-item">Realisasi Anggaran</a>
                    <a href="#" class="list-group-item">Realisasi PNBP</a>
                    <a href="#" class="list-group-item">Laporan Keuangan</a>
                    <a href="#" class="list-group-item">Cash Opname</a>
                </div>
            </div>
        </div>

        <!-- PBJ -->
        <div class="sidebar-item">
            <a href="#pbj" 
               class="list-group-item {{ request()->is('admin/pbj*') ? 'active' : '' }}"
               data-bs-toggle="collapse" 
               role="button">
                <i class="fas fa-shopping-cart"></i>
                <span>Pengadaan Barang/Jasa</span>
                <i class="fas fa-chevron-right ms-auto"></i>
            </a>
            <div class="collapse {{ request()->is('admin/pbj*') ? 'show' : '' }}" id="pbj">
                <div class="sub-menu">
                    <a href="#" class="list-group-item">Paket Kegiatan</a>
                    <a href="#" class="list-group-item">Serah Terima</a>
                    <a href="#" class="list-group-item">Stock Opname</a>
                </div>
            </div>
        </div>

        <!-- SDM -->
        <div class="sidebar-item">
            <a href="#sdm" 
               class="list-group-item {{ request()->is('admin/sdm*') ? 'active' : '' }}"
               data-bs-toggle="collapse" 
               role="button">
                <i class="fas fa-users"></i>
                <span>Sumber Daya Manusia</span>
                <i class="fas fa-chevron-right ms-auto"></i>
            </a>
            <div class="collapse {{ request()->is('admin/sdm*') ? 'show' : '' }}" id="sdm">
                <div class="sub-menu">
                    <a href="#" class="list-group-item">Studi Lanjut</a>
                    <a href="#" class="list-group-item">Masa Pensiun</a>
                    <a href="#" class="list-group-item">LHKPN/LHKASN</a>
                </div>
            </div>
        </div>

        <div class="sidebar-divider"></div>

        <a href="#" class="list-group-item">
            <i class="fas fa-file-alt"></i>
            <span>Review RKAKL</span>
        </a>

        <a href="#" class="list-group-item">
            <i class="fas fa-file-contract"></i>
            <span>Dokumen SPI</span>
        </a>

        <a href="#" class="list-group-item">
            <i class="fas fa-database"></i>
            <span>Data Referensi</span>
        </a>

        <div class="sidebar-divider"></div>

        <a href="{{ route('admin.users.index') }}" 
           class="list-group-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
            <i class="fas fa-user-cog"></i>
            <span>Users</span>
        </a>

        <a href="{{ route('admin.settings') }}" 
           class="list-group-item {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
            <i class="fas fa-cog"></i>
            <span>Settings</span>
        </a>
    </div>
</div> 