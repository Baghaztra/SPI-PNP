<?php

namespace App\Http\Controllers;

use App\Models\RealisasiAnggaran;
use Illuminate\Http\Request;

class RealisasiAnggaranController extends Controller
{
    public function index()
    {
        $dokumens = RealisasiAnggaran::with('media')->get();
        return view('SIWAS.dokumen.realisasi_anggaran', compact('dokumens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'file' => 'required|file|mimes:pdf|max:10240'
        ]);

        $dokumen = RealisasiAnggaran::create(['judul' => $request->judul]);

        if ($request->hasFile('file')) {
            $dokumen->addMedia($request->file('file'))->toMediaCollection('file_realisasi_anggaran');
        }

        return back()->with('success', 'Dokumen berhasil diunggah');
    }

    public function destroy(RealisasiAnggaran $realisasi_anggaran)
    {
        $realisasi_anggaran->clearMediaCollection('file_realisasi_anggaran');
        $realisasi_anggaran->delete();
        return back()->with('success', 'Dokumen berhasil dihapus');
    }
}
