@extends('layouts.siwas')

@section('title', 'Stock Opname')

@section('content')
    <x-table 
        :dokumens="$dokumens" 
        page_title="Stock Opname"
        add="siwas.stock_opname.store"
        show="file_stock_opname"
        delete="siwas.stock_opname.destroy"
    />
@endsection
