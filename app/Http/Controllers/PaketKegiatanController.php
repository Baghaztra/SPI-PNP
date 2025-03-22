<?php

namespace App\Http\Controllers;

use App\Models\PaketKegiatan;
use Illuminate\Http\Request;

class PaketKegiatanController extends Controller
{
    public function index()
    {
        $dokumens = PaketKegiatan::with('media')->get();
        return view('SIWAS.dokumen.paket_kegiatan', compact('dokumens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'file' => 'required|file|mimes:pdf|max:10240'
        ]);

        $dokumen = PaketKegiatan::create(['judul' => $request->judul]);

        if ($request->hasFile('file')) {
            $dokumen->addMedia($request->file('file'))->toMediaCollection('file_paket_kegiatan');
        }

        return back()->with('success', 'Dokumen berhasil diunggah');
    }

    public function destroy(PaketKegiatan $paket_kegiatan)
    {
        $paket_kegiatan->clearMediaCollection('file_paket_kegiatan');
        $paket_kegiatan->delete();
        return back()->with('success', 'Dokumen berhasil dihapus');
    }
}
