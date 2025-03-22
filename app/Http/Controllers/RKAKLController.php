<?php

namespace App\Http\Controllers;

use App\Models\RKAKL;
use Illuminate\Http\Request;

class RKAKLController extends Controller
{
    public function index()
    {
        $dokumens = RKAKL::with('media')->get();
        return view('SIWAS.dokumen.rkakl', compact('dokumens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'file' => 'required|file|mimes:pdf|max:10240'
        ]);

        $dokumen = RKAKL::create(['judul' => $request->judul]);

        if ($request->hasFile('file')) {
            $dokumen->addMedia($request->file('file'))->toMediaCollection('file_rkakl');
        }

        return back()->with('success', 'Dokumen berhasil diunggah');
    }

    public function destroy(RKAKL $rkakl)
    {
        $rkakl->clearMediaCollection('file_rkakl');
        $rkakl->delete();
        return back()->with('success', 'Dokumen berhasil dihapus');
    }
}
