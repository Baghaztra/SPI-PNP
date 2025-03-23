<?php

namespace App\Http\Controllers;

use App\Models\RealisasiPNBP;
use Illuminate\Http\Request;

class RealisasiPNBPController extends Controller
{
    public function index()
    {
        $dokumens = RealisasiPNBP::with('media')->get();
        $tanggal = RealisasiPNBP::select('tanggal')->distinct()->get();
        return view('SIWAS.dokumen.realisasi_pnbp', compact('dokumens', 'tanggal'));
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
