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

Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

// Route untuk semua yang sudah login



Route::middleware(['auth', 'role.access'])->group(function () {
        Route::prefix('staff')->name('staff.')->group(function () {
        Route::get('/', App\Livewire\Staff\Index::class)->name('index');
        Route::get('/create', App\Livewire\Staff\Create::class)->name('create');
        Route::post('/', [\App\Http\Controllers\StaffController::class, 'store'])->name('store');
        Route::get('/{staff}/edit', App\Livewire\Staff\Edit::class)->name('edit');
        Route::put('/{staff}', [\App\Http\Controllers\StaffController::class, 'update'])->name('update');
        Route::delete('/{staff}', [\App\Http\Controllers\StaffController::class, 'destroy'])->name('destroy');
    });
    Route::resource('menu', MenuController::class);
    Route::resource('bahan-baku', BahanBakuController::class);
    Route::resource('penjualan', PenjualanHarianController::class);
    Route::resource('pengeluaran', PengeluaranController::class);
    Route::resource('penggunaan-bahan-baku', PenggunaanBahanBakuController::class);
    Route::resource('pergerakan-stok', PergerakanStokController::class);
    Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('laporan/cetak', [LaporanController::class, 'cetak'])->name('laporan.cetak');
});


require __DIR__.'/auth.php';