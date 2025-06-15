<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MakulController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\JadwalController;

// === PUBLIC ROUTES ===
Route::post('/login', [AuthController::class, 'login']);

// === PROTECTED ROUTES ===
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // === MAHASISWA ===
    Route::prefix('mahasiswa')->group(function () {
        Route::post('/create', [MahasiswaController::class, 'store']);
        Route::get('/read', [MahasiswaController::class, 'index']);
        Route::get('/show/{id}', [MahasiswaController::class, 'show']);
        Route::put('/update/{id}', [MahasiswaController::class, 'update']);
        Route::delete('/delete/{id}', [MahasiswaController::class, 'destroy']);
    });

    // === DOSEN ===
    Route::prefix('dosen')->group(function () {
        Route::post('/create', [DosenController::class, 'create']);
        Route::get('/read', [DosenController::class, 'read']);
        Route::put('/update/{id}', [DosenController::class, 'update']);
        Route::delete('/delete/{id}', [DosenController::class, 'delete']);
    });

    // === MAKUL ===
    Route::prefix('makul')->group(function () {
        Route::post('/create', [MakulController::class, 'create']);
        Route::get('/read', [MakulController::class, 'read']);
        Route::put('/update/{id}', [MakulController::class, 'update']);
        Route::delete('/delete/{id}', [MakulController::class, 'delete']);
    });

    // === RUANGAN ===
    Route::prefix('ruangan')->group(function () {
        Route::post('/create', [RuanganController::class, 'create']);
        Route::get('/read', [RuanganController::class, 'read']);
        Route::put('/update/{id}', [RuanganController::class, 'update']);
        Route::delete('/delete/{id}', [RuanganController::class, 'delete']);
    });

    // === JADWAL ===
    Route::prefix('jadwal')->group(function () {
        Route::post('/create', [JadwalController::class, 'create']);
        Route::get('/read', [JadwalController::class, 'read']);
        Route::put('/update/{id}', [JadwalController::class, 'update']);
        Route::delete('/delete/{id}', [JadwalController::class, 'delete']);
    });
});
