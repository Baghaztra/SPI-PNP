@extends('layouts.siwas')

@section('title', 'Data Referensi')

@section('content')
    <x-table
        :dokumens="$dokumens"
        :tanggal="$tanggal"
        page_title="Data Referensi"
        add="siwas.data_referensi.store"
        show="file_data_referensi"
        delete="siwas.data_referensi.destroy"
    />
@endsection
