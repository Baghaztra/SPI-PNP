<?php

namespace App\Http\Controllers;

use App\Models\CashOpname;
use Illuminate\Http\Request;

class CashOpnameController extends Controller
{
    public function index()
    {
        $dokumens = CashOpname::with('media')->get();
        $tanggal = CashOpname::select('tanggal')->distinct()->get();
        return view('SIWAS.dokumen.cash_opname', compact('dokumens', 'tanggal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required',
            'file' => 'required|file|mimes:pdf|max:10240'
        ]);

        $dokumen = CashOpname::create(['judul' => $request->judul, 'tanggal' => $request->tanggal]);

        if ($request->hasFile('file')) {
            $dokumen->addMedia($request->file('file'))->toMediaCollection('file_cash_opname');
        }

        return back()->with('success', 'Dokumen berhasil diunggah');
    }

    public function destroy(CashOpname $cash_opname)
    {
        $cash_opname->clearMediaCollection('file_cash_opname');
        $cash_opname->delete();
        return back()->with('success', 'Dokumen berhasil dihapus');
    }
}
