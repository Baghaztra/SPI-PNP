@extends('layouts.siwas')

@section('title', 'Laporan Keuangan')

@section('content')
    <x-table
        :dokumens="$dokumens"
        :tanggal="$tanggal"
        page_title="Laporan Keuangan"
        add="siwas.laporan_keuangan.store"
        show="file_laporan_keuangan"
        delete="siwas.laporan_keuangan.destroy"
    />
@endsection
