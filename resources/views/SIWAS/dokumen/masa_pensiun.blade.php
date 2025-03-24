@extends('layouts.siwas')

@section('title', 'Masa Pensiun')

@section('content')
    <x-table
        :dokumens="$dokumens"
        :tanggalList="$tanggalList"
        :bulanTahunList="$bulanTahunList"
        :tahunList="$tahunList"
        page_title="Masa Pensiun"
        add="siwas.masa_pensiun.store"
        show="file_masa_pensiun"
        delete="siwas.masa_pensiun.destroy"
    />
@endsection
