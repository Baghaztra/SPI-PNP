@extends('layouts.siwas')

@section('title', 'Dokumen SPI')

@section('content')
    <x-table
        :dokumens="$dokumens"
        :tanggalList="$tanggalList"
        :bulanTahunList="$bulanTahunList"
        :tahunList="$tahunList"
        page_title="Dokumen SPI"
        add="siwas.dokumen_spi.store"
        show="file_dokumen_spi"
        delete="siwas.dokumen_spi.destroy"
    />
@endsection
