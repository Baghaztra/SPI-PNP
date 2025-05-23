@extends('layouts.siwas')

@section('title', 'Studi Lanjut')

@section('content')
    <x-table
        :dokumens="$dokumens"
        :tanggalList="$tanggalList"
        :bulanTahunList="$bulanTahunList"
        :tahunList="$tahunList"
        page_title="Studi Lanjut"
        add="siwas.studi_lanjut.store"
        show="file_studi_lanjut"
        delete="siwas.studi_lanjut.destroy"
    />
@endsection
