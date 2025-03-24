<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RealisasiPNBP;
use Illuminate\Support\Facades\DB;

class RealisasiPNBPController extends Controller
{
    public function index(Request $request)
    {

        $tanggal = $request->input('tanggal');
        $bulanTahun = $request->input('bulan_tahun');
        $tahun = $request->input('tahun');

        $query = RealisasiPNBP::with('media');

        // Filter tanggal (YYYY-MM-DD)
        if ($tanggal) {
            $query->whereDate('tanggal', $tanggal);
        }

        // Cek connection DB
        $connection = DB::connection()->getDriverName();

        // Filter bulan & tahun
        if ($bulanTahun) {
            if ($connection === 'sqlite') {
                $query->whereRaw("strftime('%Y-%m', tanggal) = ?", [$bulanTahun]);
            } else {
                $query->whereRaw("DATE_FORMAT(tanggal, '%Y-%m') = ?", [$bulanTahun]);
            }
        }

        // Filter tahun saja
        if ($tahun) {
            if ($connection === 'sqlite') {
                $query->whereRaw("strftime('%Y', tanggal) = ?", [$tahun]);
            } else {
                $query->whereYear('tanggal', $tahun);
            }
        }
        $dokumens = $query->orderBy('tanggal', 'desc')->get();

        // Ambil list filter (bulan-tahun & tahun)
        if ($connection === 'sqlite') {
            $bulanTahunList = RealisasiPNBP::selectRaw("strftime('%Y-%m', tanggal) as bulan_tahun")
                ->distinct()
                ->pluck('bulan_tahun');

            $tahunList = RealisasiPNBP::selectRaw("strftime('%Y', tanggal) as tahun")
                ->distinct()
                ->pluck('tahun');
        } else {
            $bulanTahunList = RealisasiPNBP::selectRaw("DATE_FORMAT(tanggal, '%Y-%m') as bulan_tahun")
                ->distinct()
                ->pluck('bulan_tahun');

            $tahunList = RealisasiPNBP::selectRaw("YEAR(tanggal) as tahun")
                ->distinct()
                ->pluck('tahun');
        }

        // List tanggal buat filter manual (kalau mau dipakai)
        $tanggalList = RealisasiPNBP::select('tanggal')->distinct()->get();
        return view('SIWAS.dokumen.realisasi_pnbp', compact('dokumens', 'tanggalList', 'bulanTahunList', 'tahunList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required',
            'file' => 'required|file|mimes:pdf|max:10240'
        ]);

        $dokumen = RealisasiPNBP::create(['judul' => $request->judul, 'tanggal' => $request->tanggal]);

        if ($request->hasFile('file')) {
            $dokumen->addMedia($request->file('file'))->toMediaCollection('file_realisasi_pnbp');
        }

        return back()->with('success', 'Dokumen berhasil diunggah');
    }

    public function destroy(RealisasiPNBP $realisasi_pnbp)
    {
        $realisasi_pnbp->clearMediaCollection('file_realisasi_pnbp');
        $realisasi_pnbp->delete();
        return back()->with('success', 'Dokumen berhasil dihapus');
    }
}
