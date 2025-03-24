@extends('layouts.siwas')

@section('title', 'Review RKAKL')

@section('content')
    <x-table
        :dokumens="$dokumens"
        :tanggalList="$tanggalList"
        :bulanTahunList="$bulanTahunList"
        :tahunList="$tahunList"
        page_title="Review RKAKL"
        add="siwas.rkakl.store"
        show="file_rkakl"
        delete="siwas.rkakl.destroy"
    />
@endsection
