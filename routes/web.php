<?php

use Illuminate\Support\Facades\Route;

// Vista de Login (Raíz)
Route::get('/', function () {
    return view('auth.login');
})->name('login');

// Acción de Login (Simulada)
Route::post('/login-simulado', function () {
    // Aquí no validamos, solo redirigimos
    return redirect()->route('dashboard');
})->name('login.post');

// Grupo de Rutas del Sistema (Panel Central)
Route::prefix('sistema')->group(function () {
    
    Route::get('/dashboard', function () {
        return view('sistema.dashboard');
    })->name('dashboard');

    Route::get('/telemetria', function () {
        return view('sistema.telemetria');
    })->name('telemetria');

    Route::get('/rutas-horarios', function () {
        return view('sistema.rutas');
    })->name('rutas');
    
    Route::get('/monitoreo', function () {
        return view('sistema.monitoreo');
    })->name('monitoreo');
});