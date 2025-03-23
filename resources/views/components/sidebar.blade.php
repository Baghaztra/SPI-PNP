    <div id="sidebar-wrapper">
        <div class="sidebar-heading">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" height="30">
            <span class="ms-2">SPI PNP</span>
        </div>

        <div class="list-group list-group-flush">
            <a href="{{ route('siwas.dashboard') }}"
                class="list-group-item {{ request()->routeIs('siwas.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>

            <!-- Keuangan -->
            <div class="sidebar-item">
                <a href="#keuangan" class="list-group-item {{ request()->is('siwas/keuangan*') ? 'active' : '' }}"
                    data-bs-toggle="collapse" role="button">
                    <i class="fas fa-chart-line"></i>
                    <span>Keuangan</span>
                    <i class="fas fa-chevron-right ms-auto"></i>
                </a>
                <div class="collapse {{ request()->is('siwas/keuangan*') ? 'show' : '' }}" id="keuangan">
                    <div class="sub-menu">
                        <a href="{{ route('siwas.realisasi_anggaran.index') }}" class="list-group-item">Realisasi
                            Anggaran</a>
                        <a href="{{ route('siwas.realisasi_pnbp.index') }}" class="list-group-item">Realisasi PNBP</a>
                        <a href="{{ route('siwas.laporan_keuangan.index') }}" class="list-group-item">Laporan
                            Keuangan</a>
                        <a href="{{ route('siwas.cash_opname.index') }}" class="list-group-item">Cash Opname</a>
                    </div>
                </div>
            </div>

            <!-- PBJ -->
            <div class="sidebar-item">
                <a href="#pbj" class="list-group-item {{ request()->is('siwas/pbj*') ? 'active' : '' }}"
                    data-bs-toggle="collapse" role="button">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Pengadaan Barang/Jasa</span>
                    <i class="fas fa-chevron-right ms-auto"></i>
                </a>
                <div class="collapse {{ request()->is('siwas/pbj*') ? 'show' : '' }}" id="pbj">
                    <div class="sub-menu">
                        <a href="{{ route('siwas.paket_kegiatan.index') }}" class="list-group-item">Paket Kegiatan</a>
                        <a href="{{ route('siwas.serah_terima.index') }}" class="list-group-item">Serah Terima</a>
                        <a href="{{ route('siwas.stock_opname.index') }}" class="list-group-item">Stock Opname</a>
                    </div>
                </div>
            </div>

            <!-- SDM -->
            <div class="sidebar-item">
                <a href="#sdm" class="list-group-item {{ request()->is('siwas/sdm*') ? 'active' : '' }}"
                    data-bs-toggle="collapse" role="button">
                    <i class="fas fa-users"></i>
                    <span>Sumber Daya Manusia</span>
                    <i class="fas fa-chevron-right ms-auto"></i>
                </a>
                <div class="collapse {{ request()->is('siwas/sdm*') ? 'show' : '' }}" id="sdm">
                    <div class="sub-menu">
                        <a href="{{ route('siwas.studi_lanjut.index') }}" class="list-group-item">Studi Lanjut</a>
                        <a href="{{ route('siwas.masa_pensiun.index') }}" class="list-group-item">Masa Pensiun</a>
                        <a href="{{ route('siwas.lhkpn.index') }}" class="list-group-item">LHKPN/LHKASN</a>
                    </div>
                </div>
            </div>

            <div class="sidebar-divider"></div>

            <a href="{{ route('siwas.rkakl.index') }}"
                class="list-group-item {{ request()->routeIs('siwas.rkakl.index') ? 'active' : '' }}">
                <i class="fas fa-file-alt"></i>
                <span>Review RKAKL</span>
            </a>

            <a href="{{ route('siwas.dokumen_spi.index') }}"
                class="list-group-item {{ request()->routeIs('siwas.dokumen_spi.index') ? 'active' : '' }}">
                <i class="fas fa-file-contract"></i>
                <span>Dokumen SPI</span>
            </a>

            <a href="{{ route('siwas.data_referensi.index') }}"
                class="list-group-item {{ request()->routeIs('siwas.data_referensi.index') ? 'active' : '' }}">
                <i class="fas fa-database"></i>
                <span>Data Referensi</span>
            </a>

            <div class="sidebar-divider"></div>

            <a href="{{ route('siwas.users.index') }}"
                class="list-group-item {{ request()->routeIs('siwas.users.*') ? 'active' : '' }}">
                <i class="fas fa-user-cog"></i>
                <span>Users</span>
            </a>

            {{-- <a href="{{ route('siwas.settings') }}"
                class="list-group-item {{ request()->routeIs('siwas.settings') ? 'active' : '' }}">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a> --}}

            <a href="#" class="list-group-item" data-bs-toggle="modal" data-bs-target="#logoutModal">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>

            <!-- Modal Logout Confirmation -->
            <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin logout?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
