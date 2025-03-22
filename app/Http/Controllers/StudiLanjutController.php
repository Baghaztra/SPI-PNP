<?php

namespace App\Http\Controllers;

use App\Models\StudiLanjut;
use Illuminate\Http\Request;

class StudiLanjutController extends Controller
{
    public function index()
    {
        $dokumens = StudiLanjut::with('media')->get();
        return view('SIWAS.dokumen.studi_lanjut', compact('dokumens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'file' => 'required|file|mimes:pdf|max:10240'
        ]);

        $dokumen = StudiLanjut::create(['judul' => $request->judul]);

        if ($request->hasFile('file')) {
            $dokumen->addMedia($request->file('file'))->toMediaCollection('file_studi_lanjut');
        }

        return back()->with('success', 'Dokumen berhasil diunggah');
    }

    public function destroy(StudiLanjut $studi_lanjut)
    {
        $studi_lanjut->clearMediaCollection('file_studi_lanjut');
        $studi_lanjut->delete();
        return back()->with('success', 'Dokumen berhasil dihapus');
    }
}
