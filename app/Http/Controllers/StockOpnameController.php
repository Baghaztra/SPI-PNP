<?php

namespace App\Http\Controllers;

use App\Models\StockOpname;
use Illuminate\Http\Request;

class StockOpnameController extends Controller
{
    public function index()
    {
        $dokumens = StockOpname::with('media')->get();
        return view('SIWAS.dokumen.stock_opname', compact('dokumens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'file' => 'required|file|mimes:pdf|max:10240'
        ]);

        $dokumen = StockOpname::create(['judul' => $request->judul]);

        if ($request->hasFile('file')) {
            $dokumen->addMedia($request->file('file'))->toMediaCollection('file_stock_opname');
        }

        return back()->with('success', 'Dokumen berhasil diunggah');
    }

    public function destroy(StockOpname $stock_opname)
    {
        $stock_opname->clearMediaCollection('file_stock_opname');
        $stock_opname->delete();
        return back()->with('success', 'Dokumen berhasil dihapus');
    }
}
