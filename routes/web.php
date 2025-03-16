<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('SIWAS.dashboard');
    })->name('dashboard');
    
    // Users Management
    Route::get('/users', function () {
        return view('SIWAS.users.index');
    })->name('users.index');
    
    Route::get('/users/create', function () {
        return view('SIWAS.users.create');
    })->name('users.create');
    
    Route::get('/users/{id}/edit', function ($id) {
        return view('SIWAS.users.edit', compact('id'));
    })->name('users.edit');
    
    // Profile
    Route::get('/profile', function () {
        return view('SIWAS.profile');
    })->name('profile');
    
    // Settings
    Route::get('/settings', function () {
        return view('SIWAS.settings');
    })->name('settings');
});

// Authentication
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');