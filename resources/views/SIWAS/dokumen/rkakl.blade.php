@extends('layouts.siwas')

@section('title', 'Review RKAKL')

@section('content')
    <x-table
        :dokumens="$dokumens"
        :tanggal="$tanggal"
        page_title="Review RKAKL"
        add="siwas.rkakl.store"
        show="file_rkakl"
        delete="siwas.rkakl.destroy"
    />
@endsection
