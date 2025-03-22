@extends('layouts.siwas')

@section('title', 'Cash Opname')

@section('content')
    <x-table 
        :dokumens="$dokumens" 
        page_title="Cash Opname"
        add="siwas.cash_opname.store"
        show="file_cash_opname"
        delete="siwas.cash_opname.destroy"
    />
@endsection
