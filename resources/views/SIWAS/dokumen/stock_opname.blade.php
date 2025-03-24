@extends('layouts.siwas')

@section('title', 'Stock Opname')

@section('content')
    <x-table
        :dokumens="$dokumens"
        :tanggalList="$tanggalList"
        :bulanTahunList="$bulanTahunList"
        :tahunList="$tahunList"
        page_title="Stock Opname"
        add="siwas.stock_opname.store"
        show="file_stock_opname"
        delete="siwas.stock_opname.destroy"
    />
@endsection
