@extends('layouts.siwas')

@section('title', 'Cash Opname')

@section('content')
    <x-table
        :dokumens="$dokumens"
        :tanggalList="$tanggalList"
        :bulanTahunList="$bulanTahunList"
        :tahunList="$tahunList"
        page_title="Cash Opname"
        add="siwas.cash_opname.store"
        show="file_cash_opname"
        delete="siwas.cash_opname.destroy"
    />
@endsection
