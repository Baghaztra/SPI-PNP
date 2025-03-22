@extends('layouts.siwas')

@section('title', 'Paket Kegiatan')

@section('content')
    <x-table 
        :dokumens="$dokumens" 
        page_title="Paket Kegiatan"
        add="siwas.paket_kegiatan.store"
        show="file_paket_kegiatan"
        delete="siwas.paket_kegiatan.destroy"
    />
@endsection
