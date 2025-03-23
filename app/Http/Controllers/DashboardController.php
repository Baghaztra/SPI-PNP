<?php

namespace App\Http\Controllers;

use App\Models\LHKPN;
use App\Models\RKAKL;
use App\Models\Dokumen;
use App\Models\CashOpname;
use App\Models\MasaPensiun;
use App\Models\SerahTerima;
use App\Models\StockOpname;
use App\Models\StudiLanjut;
use Illuminate\Http\Request;
use App\Models\DataReferensi;
use App\Models\PaketKegiatan;
use App\Models\RealisasiPNBP;
use App\Models\LaporanKeuangan;
use App\Models\RealisasiAnggaran;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menghitung jumlah dokumen dari setiap model
        $data = [
            'Realisasi Anggaran' => RealisasiAnggaran::count(),
            'Realisasi PNBP' => RealisasiPNBP::count(),
            'Laporan Keuangan' => LaporanKeuangan::count(),
            'Cash Opname' => CashOpname::count(),
            'Paket Kegiatan' => PaketKegiatan::count(),
            'Serah Terima' => SerahTerima::count(),
            'Stock Opname' => StockOpname::count(),
            'Studi Lanjut' => StudiLanjut::count(),
            'Masa Pensiun' => MasaPensiun::count(),
            'LHKPN' => LHKPN::count(),
            'RKAKL' => RKAKL::count(),
            'Dokumen SPI' => Dokumen::count(),
            'Data Referensi' => DataReferensi::count(),
        ];

        return view('siwas.dashboard', compact('data'));
    }

}
