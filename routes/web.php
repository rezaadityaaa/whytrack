<?php

use App\Http\Controllers\StaffController;
use App\Http\Livewire\BahanBakuIndex;
use App\Http\Controllers\PengeluaranHarianController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PenjualanHarianController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PenggunaanBahanBakuController;
use App\Http\Controllers\PergerakanStokController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

// Route untuk semua yang sudah login
Route::middleware(['auth'])->group(function () {
    // Untuk Admin
    Route::middleware('role:admin')->group(function () {
       
    });

    // Untuk Staff
    Route::middleware('role:staff')->group(function () {
    });
});

// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
//     Route::get('/staff/create', [StaffController::class, 'create'])->name('staff.create');
//     Route::post('/staff', [StaffController::class, 'store'])->name('staff.store');
//     Route::get('/staff/{staff}/edit', [StaffController::class, 'edit'])->name('staff.edit');
//     Route::put('/staff/{staff}', [StaffController::class, 'update'])->name('staff.update');
//     Route::delete('/staff/{staff}', [StaffController::class, 'destroy'])->name('staff.destroy');
//     Route::resource('staff', \App\Http\Controllers\StaffController::class)->except('show');
// });

Route::middleware(['auth', 'admin'])->prefix('staff')->name('staff.')->group(function () {
    Route::get('/', App\Livewire\Staff\Index::class)->name('index');
    Route::get('/create', App\Livewire\Staff\Create::class)->name('create');
    Route::post('/', [\App\Http\Controllers\StaffController::class, 'store'])->name('store');
    Route::get('/{staff}/edit', App\Livewire\Staff\Edit::class)->name('edit');
    Route::put('/{staff}', [\App\Http\Controllers\StaffController::class, 'update'])->name('update');
    Route::delete('/{staff}', [\App\Http\Controllers\StaffController::class, 'destroy'])->name('destroy');
});

Route::resource('menu', MenuController::class);
Route::resource('bahan-baku', \App\Http\Controllers\BahanBakuController::class);
Route::resource('penjualan', PenjualanHarianController::class);
Route::resource('pengeluaran', PengeluaranController::class);
Route::resource('penggunaan-bahan-baku', PenggunaanBahanBakuController::class);
Route::resource('pergerakan-stok', PergerakanStokController::class);
Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('laporan/cetak', [LaporanController::class, 'cetak'])->name('laporan.cetak');

require __DIR__.'/auth.php';
