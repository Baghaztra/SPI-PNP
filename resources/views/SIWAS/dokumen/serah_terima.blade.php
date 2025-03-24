@extends('layouts.siwas')

@section('title', 'Serah Terima')

@section('content')
    <x-table
        :dokumens="$dokumens"
        :tanggalList="$tanggalList"
        :bulanTahunList="$bulanTahunList"
        :tahunList="$tahunList"
        page_title="Serah Terima"
        add="siwas.serah_terima.store"
        show="file_serah_terima"
        delete="siwas.serah_terima.destroy"
    />
@endsection
