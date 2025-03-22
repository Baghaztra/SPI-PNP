<?php

namespace App\Http\Controllers;

use App\Models\DataReferensi;
use Illuminate\Http\Request;

class DataReferensiController extends Controller
{
    public function index()
    {
        $dokumens = DataReferensi::with('media')->get();
        return view('SIWAS.dokumen.data_referensi', compact('dokumens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'file' => 'required|file|mimes:pdf|max:10240'
        ]);

        $dokumen = DataReferensi::create(['judul' => $request->judul]);

        if ($request->hasFile('file')) {
            $dokumen->addMedia($request->file('file'))->toMediaCollection('file_data_referensi');
        }

        return back()->with('success', 'Dokumen berhasil diunggah');
    }

    public function destroy(DataReferensi $data_referensi)
    {
        $data_referensi->clearMediaCollection('file_data_referensi');
        $data_referensi->delete();
        return back()->with('success', 'Dokumen berhasil dihapus');
    }
}
