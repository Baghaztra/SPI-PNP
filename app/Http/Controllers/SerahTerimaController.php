<?php

namespace App\Http\Controllers;

use App\Models\SerahTerima;
use Illuminate\Http\Request;

class SerahTerimaController extends Controller
{
    public function index()
    {
        $dokumens = SerahTerima::with('media')->get();
        return view('SIWAS.dokumen.serah_terima', compact('dokumens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'file' => 'required|file|mimes:pdf|max:10240'
        ]);

        $dokumen = SerahTerima::create(['judul' => $request->judul]);

        if ($request->hasFile('file')) {
            $dokumen->addMedia($request->file('file'))->toMediaCollection('file_serah_terima');
        }

        return back()->with('success', 'Dokumen berhasil diunggah');
    }

    public function destroy(SerahTerima $serah_terima)
    {
        $serah_terima->clearMediaCollection('file_serah_terima');
        $serah_terima->delete();
        return back()->with('success', 'Dokumen berhasil dihapus');
    }
}
