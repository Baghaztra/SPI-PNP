@extends('layouts.siwas')

@section('title', 'LHKPN/LHKASN')

@section('content')
    <x-table
        :dokumens="$dokumens"
        :tanggal="$tanggal"
        page_title="LHKPN/LHKASN"
        add="siwas.lhkpn.store"
        show="file_lhkpn"
        delete="siwas.lhkpn.destroy"
    />
@endsection
