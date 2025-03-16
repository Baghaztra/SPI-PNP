<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', function () {
    return view('home');
})->name('home');

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

// SIWAS Routes
Route::prefix('siwas')->name('siwas.')->group(function () {
    Route::get('/dashboard', function () {
        return view('siwas.dashboard');
    })->name('dashboard');
    
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
});

// Authentication
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');