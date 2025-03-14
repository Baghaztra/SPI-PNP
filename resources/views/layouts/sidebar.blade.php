<style>
    .sidebar {
        width: 300px;
        height: 100vh;
        background: #343a40;
        color: #fff;
        padding: 1rem;
    }

    .sidebar h4 {
        color: #fff;
        margin-bottom: 1rem;
    }

    .sidebar .nav-link {
        color: #fff;
        cursor: pointer;
    }

    .sidebar .nav-link:hover {
        background: #ffbb1d;
    }

    .submenu .nav-link {
        padding-left: 2rem;
        font-size: 0.9rem;
    }

    .fa-chevron-down {
        transition: transform 0.3s;
    }

    .collapse.show+.nav-link .fa-chevron-down {
        transform: rotate(180deg);
    }
</style>

<div class="sidebar">
    <nav class="nav flex-column">
        <a class="nav-link" href="#">
            <i class="fa-solid fa-tachometer-alt me-2"></i> Dashboard
        </a>

        <a class="nav-link" data-bs-toggle="collapse" href="#keuangan" role="button" aria-expanded="false"
            aria-controls="keuangan">
            <i class="fa-solid fa-chart-line me-2"></i>Keuangan <i class="fa-solid fa-chevron-down float-end"></i>
        </a>
        <div class="collapse" id="keuangan">
            <nav class="nav flex-column ms-3 submenu">
                <a class="nav-link" href="#">Daftar Realisasi Anggaran</a>
                <a class="nav-link" href="#">Daftar Realisasi PNBP</a>
                <a class="nav-link" href="#">Daftar Laporan Keuangan</a>
                <a class="nav-link" href="#">Daftar Cash Opname</a>
            </nav>
        </div>

        <a class="nav-link" data-bs-toggle="collapse" href="#pbj" role="button" aria-expanded="false"
            aria-controls="pbj">
            <i class="fa-solid fa-chart-line me-2"></i>Pengadaan Barang/Jasa <i class="fa-solid fa-chevron-down float-end"></i>
        </a>
        <div class="collapse" id="pbj">
            <nav class="nav flex-column ms-3 submenu">
                <a class="nav-link" href="#">Daftar Paket Kegiatan</a>
                <a class="nav-link" href="#">Daftar Serah Terima</a>
                <a class="nav-link" href="#">Daftar Stock Opname</a>
            </nav>
        </div>

        <a class="nav-link" data-bs-toggle="collapse" href="#sdm" role="button" aria-expanded="false"
            aria-controls="sdm">
            <i class="fa-solid fa-chart-line me-2"></i>Sumber Daya Manusia <i class="fa-solid fa-chevron-down float-end"></i>
        </a>
        <div class="collapse" id="sdm">
            <nav class="nav flex-column ms-3 submenu">
                <a class="nav-link" href="#">Daftar Studi Lanjut</a>
                <a class="nav-link" href="#">Daftar Masa Pensiun</a>
                <a class="nav-link" href="#">Daftar LHKPN/LHKASN</a>
            </nav>
        </div>

        <a class="nav-link" >
            <i class="fa-solid fa-chart-line me-2"></i>Review RKAKL</i>
        </a>
        <a class="nav-link" >
            <i class="fa-solid fa-chart-line me-2"></i>Dokumen SPI</i>
        </a>
        <a class="nav-link" >
            <i class="fa-solid fa-chart-line me-2"></i>Data Referensi</i>
        </a>
        <a class="nav-link" >
            <i class="fa-solid fa-user me-2"></i>User</i>
        </a>
    </nav>
</div>