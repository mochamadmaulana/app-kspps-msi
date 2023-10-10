<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KantorCabangController;
use App\Http\Controllers\Admin\KantorPusatController;
use App\Http\Controllers\Admin\KaryawanController;
use App\Http\Controllers\Admin\MajlisController;
use App\Http\Controllers\Admin\NasabahController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::resource('nasabah',NasabahController::class);

    Route::resource('karyawan',KaryawanController::class);
    Route::put('karyawan/{id}/edit-password', [KaryawanController::class,'edit_password'])->name('karyawan.edit-password');

    Route::resource('majlis',MajlisController::class);

    Route::prefix('kantor')->name('kantor.')->group(function () {
        Route::resource('pusat',KantorPusatController::class)->except('show','create','edit','destroy');
        Route::resource('cabang',KantorCabangController::class)->except('show');
        Route::post('cabang/cek-admin',[KantorCabangController::class,'cek_admin'])->name('cabang.cek-admin');
        Route::get('cabang/{id}/admin/create',[KantorCabangController::class,'admin_create'])->name('cabang.admin-create');
        Route::post('cabang/{id}/admin/create',[KantorCabangController::class,'admin_store'])->name('cabang.admin-store');
    });
});
