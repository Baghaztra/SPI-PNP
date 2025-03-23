<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\CashOpnameController;
use App\Http\Controllers\DataReferensiController;
use App\Http\Controllers\LaporanKeuanganController;
use App\Http\Controllers\LHKPNController;
use App\Http\Controllers\MasaPensiunController;
use App\Http\Controllers\PaketKegiatanController;
use App\Http\Controllers\RealisasiAnggaranController;
use App\Http\Controllers\RealisasiPNBPController;
use App\Http\Controllers\RKAKLController;
use App\Http\Controllers\SerahTerimaController;
use App\Http\Controllers\StockOpnameController;
use App\Http\Controllers\StudiLanjutController;
use App\Http\Controllers\DashboardController;

// Landing Page
Route::get('/', function () {
    return view('home');
})->name('home');


Route::middleware(['guest'])->group(function () {
    // Authentication Routes
    Route::get('/login', function () {
        return view('SIWAS.signin');
    })->name('login');
    Route::post('proses', [SigninController::class, 'authentication'])->name('proses-signin');
});

// Profile Routes
Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/sejarah', function () {
        return view('profile.sejarah');
    })->name('sejarah');

    Route::get('/struktur', function () {
        return view('profile.struktur');
    })->name('struktur');

    Route::get('/visi-misi', function () {
        return view('profile.visi-misi');
    })->name('visi-misi');

    Route::get('/tugas-fungsi', function () {
        return view('profile.tugas-fungsi');
    })->name('tugas-fungsi');
});

Route::middleware(['auth'])->group(function () {
    // SIWAS Routes
    Route::prefix('siwas')->name('siwas.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/profile', function () {
            return view('siwas.profile');
        })->name('profile');

        Route::get('/settings', function () {
            return view('siwas.settings');
        })->name('settings');

        Route::get('/users', function () {
            return view('siwas.users.index');
        })->name('users.index');
        Route::get('/users/create', function () {
            return view('siwas.users.create');
        })->name('users.create');
        Route::get('/users/edit', function () {
            return view('siwas.users.edit');
        })->name('users.edit');

        // Perdokumenan
        Route::resource('realisasi_anggaran', RealisasiAnggaranController::class)
            ->names('realisasi_anggaran')
            ->except(['edit', 'update', 'show']);

        Route::resource('realisasi_pnbp', RealisasiPNBPController::class)
            ->names('realisasi_pnbp')
            ->except(['edit', 'update', 'show']);

        Route::resource('laporan_keuangan', LaporanKeuanganController::class)
            ->names('laporan_keuangan')
            ->except(['edit', 'update', 'show']);

        Route::resource('cash_opname', CashOpnameController::class)
            ->names('cash_opname')
            ->except(['edit', 'update', 'show']);

        Route::resource('paket_kegiatan', PaketKegiatanController::class)
            ->names('paket_kegiatan')
            ->except(['edit', 'update', 'show']);

        Route::resource('serah_terima', SerahTerimaController::class)
            ->names('serah_terima')
            ->except(['edit', 'update', 'show']);

        Route::resource('stock_opname', StockOpnameController::class)
            ->names('stock_opname')
            ->except(['edit', 'update', 'show']);

        Route::resource('studi_lanjut', StudiLanjutController::class)
            ->names('studi_lanjut')
            ->except(['edit', 'update', 'show']);

        Route::resource('masa_pensiun', MasaPensiunController::class)
            ->names('masa_pensiun')
            ->except(['edit', 'update', 'show']);

        Route::resource('lhkpn', LHKPNController::class)
            ->names('lhkpn')
            ->except(['edit', 'update', 'show']);

        Route::resource('rkakl', RKAKLController::class)
            ->names('rkakl')
            ->except(['edit', 'update', 'show']);

        Route::resource('dokumen_spi', DokumenController::class)
            ->names('dokumen_spi')
            ->except(['edit', 'update', 'show']);

        Route::resource('data_referensi', DataReferensiController::class)
            ->names('data_referensi')
            ->except(['edit', 'update', 'show']);
    });
});

// Authentication
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
