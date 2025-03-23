<?php

namespace App\Http\Controllers;

use App\Models\LaporanKeuangan;
use Illuminate\Http\Request;

class LaporanKeuanganController extends Controller
{
    public function index()
    {
        $dokumens = LaporanKeuangan::with('media')->get();
        $tanggal = LaporanKeuangan::select('tanggal')->distinct()->get();
        return view('SIWAS.dokumen.laporan_keuangan', compact('dokumens', 'tanggal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required',
            'file' => 'required|file|mimes:pdf|max:10240'
        ]);

        $dokumen = LaporanKeuangan::create(['judul' => $request->judul, 'tanggal' => $request->tanggal]);

        if ($request->hasFile('file')) {
            $dokumen->addMedia($request->file('file'))->toMediaCollection('file_laporan_keuangan');
        }

        return back()->with('success', 'Dokumen berhasil diunggah');
    }

    public function destroy(LaporanKeuangan $laporan_keuangan)
    {
        $laporan_keuangan->clearMediaCollection('file_laporan_keuangan');
        $laporan_keuangan->delete();
        return back()->with('success', 'Dokumen berhasil dihapus');
    }
}
