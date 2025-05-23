@extends('layouts.siwas')

@section('title', 'Dashboard')

@section('content')
<h2 class="text-primary mb-4">Total Dokumen Tersimpan</h2>
<div class="row">
    @foreach($data as $key => $count)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{ $key }}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Content Row -->
<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Overview</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <p class="text-center text-muted my-5">Chart Area</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <p class="text-center text-muted my-5">Pie Chart</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
