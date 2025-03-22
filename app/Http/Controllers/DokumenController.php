<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function index()
    {
        $dokumens = Dokumen::with('media')->get();
        return view('SIWAS.dokumen.dokumen_spi', compact('dokumens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'file' => 'required|file|mimes:pdf|max:10240'
        ]);

        $dokumen = Dokumen::create(['judul' => $request->judul]);

        if ($request->hasFile('file')) {
            $dokumen->addMedia($request->file('file'))->toMediaCollection('file_dokumen_spi');
        }

        return back()->with('success', 'Dokumen berhasil diunggah');
    }

    public function destroy(Dokumen $dokumen_spi)
    {
        $dokumen_spi->clearMediaCollection('file_dokumen_spi');
        $dokumen_spi->delete();
        return back()->with('success', 'Dokumen berhasil dihapus');
    }
}
