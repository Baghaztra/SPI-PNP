<?php

namespace App\Http\Controllers;

use App\Models\LHKPN;
use Illuminate\Http\Request;

class LHKPNController extends Controller
{
    public function index()
    {
        $dokumens = LHKPN::with('media')->get();
        return view('SIWAS.dokumen.lhkpn', compact('dokumens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'file' => 'required|file|mimes:pdf|max:10240'
        ]);

        $dokumen = LHKPN::create(['judul' => $request->judul]);

        if ($request->hasFile('file')) {
            $dokumen->addMedia($request->file('file'))->toMediaCollection('file_lhkpn');
        }

        return back()->with('success', 'Dokumen berhasil diunggah');
    }

    public function destroy(LHKPN $lhkpn)
    {
        $lhkpn->clearMediaCollection('file_lhkpn');
        $lhkpn->delete();
        return back()->with('success', 'Dokumen berhasil dihapus');
    }
}
