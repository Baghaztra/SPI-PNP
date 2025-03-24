@extends('layouts.siwas')

@section('title', 'Realisasi PNBP')

@section('content')
    <x-table
        :dokumens="$dokumens"
        :tanggalList="$tanggalList"
        :bulanTahunList="$bulanTahunList"
        :tahunList="$tahunList"
        page_title="Realisasi PNBP"
        add="siwas.realisasi_pnbp.store"
        show="file_realisasi_pnbp"
        delete="siwas.realisasi_pnbp.destroy"
    />
@endsection
