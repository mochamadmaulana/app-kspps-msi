<?php

use App\Http\Controllers\KasiePembiayaan\AnggotaController;
use App\Http\Controllers\KasiePembiayaan\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('kasie-pembiayaan')->name('kasie-pembiayaan.')->group(function () {
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('anggota',[AnggotaController::class,'index'])->name('anggota.index');
    Route::get('anggota/create',[AnggotaController::class,'create'])->name('anggota.create');
    Route::post('anggota/store',[AnggotaController::class,'store'])->name('anggota.store');
    Route::get('anggota/{id}/show',[AnggotaController::class,'show'])->name('anggota.show');

    // Route::prefix('kantor')->name('kantor.')->group(function () {
    // });
});
