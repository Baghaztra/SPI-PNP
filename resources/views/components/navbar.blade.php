<div class="p-3 bg-primary text-white">
    <div class="container">
        <div class="navbar-brand d-flex gap-3">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="height: 50px; width: auto;">
            <div>
                <h1 class="mb-0 fs-4">Satuan Pengawas Internal | PNP</h1>
                <span class="fs-6">Profesional dan berintegritas</span>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
    <div class="container bg-dark">
        <!-- Tombol Toggle untuk Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Utama -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active bg-primary' : '' }}" href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                <!-- Dropdown Profile -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('profile.*') ? 'active bg-primary' : '' }}" href="#" role="button" data-bs-toggle="dropdown">
                        Profile
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                        <li><a class="dropdown-item" href="{{ route('profile.sejarah') }}">Sejarah</a></li>
                        <li><a class="dropdown-item" href="{{ route('profile.struktur') }}">Struktur Organisasi</a></li>
                        <li><a class="dropdown-item" href="{{ route('profile.tugas-fungsi') }}">Tugas & Fungsi</a></li>
                        <li><a class="dropdown-item" href="{{ route('profile.visi-misi') }}">Visi & Misi</a></li>
                    </ul>
                </li>

                <!-- Dropdown Kegiatan -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Kegiatan
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                        <li><a class="dropdown-item" href="{{ route('home') }}">Audit</a></li>
                        <li><a class="dropdown-item" href="{{ route('home') }}">Monev</a></li>
                        <li><a class="dropdown-item" href="{{ route('home') }}">Bantuan Kepentingan</a></li>
                        <li><a class="dropdown-item" href="{{ route('home') }}">Review</a></li>
                    </ul>
                </li>

                <!-- Dropdown Layanan -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Layanan
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                        <li><a class="dropdown-item" href="{{ route('home') }}">Pendampingan</a></li>
                        <li><a class="dropdown-item" href="{{ route('home') }}">Pengaduan Masyarakat</a></li>
                        <li><a class="dropdown-item" href="{{ route('home') }}">Penguatan Pengawasan</a></li>
                        <li><a class="dropdown-item" href="{{ route('home') }}">Unit Pengendali Gratifikasi</a></li>
                        <li><a class="dropdown-item" href="{{ route('home') }}">WBS</a></li>
                        <li><a class="dropdown-item" href="{{ route('home') }}">SPIP</a></li>
                    </ul>
                </li>

                <!-- Menu Lainnya -->
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Peraturan</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('siwas.dashboard') ? 'active bg-primary' : '' }}" href="{{ route('siwas.dashboard') }}">SIWAS</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">SATIK</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Lapor</a></li>
            </ul>
        </div>
    </div>
</nav>