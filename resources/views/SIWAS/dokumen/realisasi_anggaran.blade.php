@extends('layouts.siwas')

@section('title', 'Realisasi Anggaran')

@section('content')
    <x-table
        :dokumens="$dokumens"
        :tanggalList="$tanggalList"
        :bulanTahunList="$bulanTahunList"
        :tahunList="$tahunList"
        page_title="Realisasi Anggaran"
        add="siwas.realisasi_anggaran.store"
        show="file_realisasi_anggaran"
        delete="siwas.realisasi_anggaran.destroy"
    />
@endsection
