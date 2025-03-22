<?php

namespace App\Http\Controllers;

use App\Models\MasaPensiun;
use Illuminate\Http\Request;

class MasaPensiunController extends Controller
{
    public function index()
    {
        $dokumens = MasaPensiun::with('media')->get();
        return view('SIWAS.dokumen.masa_pensiun', compact('dokumens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'file' => 'required|file|mimes:pdf|max:10240'
        ]);

        $dokumen = MasaPensiun::create(['judul' => $request->judul]);

        if ($request->hasFile('file')) {
            $dokumen->addMedia($request->file('file'))->toMediaCollection('file_masa_pensiun');
        }

        return back()->with('success', 'Dokumen berhasil diunggah');
    }

    public function destroy(MasaPensiun $masa_pensiun)
    {
        $masa_pensiun->clearMediaCollection('file_masa_pensiun');
        $masa_pensiun->delete();
        return back()->with('success', 'Dokumen berhasil dihapus');
    }
}
