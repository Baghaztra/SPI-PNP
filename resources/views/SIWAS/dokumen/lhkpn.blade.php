@extends('layouts.siwas')

@section('title', 'LHKPN/LHKASN')

@section('content')
    <x-table
        :dokumens="$dokumens"
        :tanggalList="$tanggalList"
        :bulanTahunList="$bulanTahunList"
        :tahunList="$tahunList"
        page_title="LHKPN/LHKASN"
        add="siwas.lhkpn.store"
        show="file_lhkpn"
        delete="siwas.lhkpn.destroy"
    />
@endsection
