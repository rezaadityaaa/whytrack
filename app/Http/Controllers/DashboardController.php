<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenjualanHarian;
use App\Models\Pengeluaran;
use App\Models\BahanBaku;
use App\Models\Menu;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Pendapatan harian
        $pendapatanHarian = PenjualanHarian::whereDate('tanggal', today())->sum('total_harga');

        // Total transaksi hari ini
        $totalTransaksi = PenjualanHarian::whereDate('tanggal', today())->count();

        // Pengeluaran harian
        $pengeluaranHarian = Pengeluaran::whereDate('tanggal', today())->sum('total_biaya');

        // Produk terlaris hari ini (top 5)
        $produkTerlaris = \App\Models\PenjualanHarian::select('menu_id')
            ->selectRaw('SUM(jumlah_terjual) as jumlah')
            ->whereDate('tanggal', today())
            ->groupBy('menu_id')
            ->orderByDesc('jumlah')
            ->with('menu') // pastikan relasi menu dimuat
            ->take(5)
            ->get()
            ->map(function($item) {
                return (object)[
                    'nama' => $item->menu->nama ?? '-',
                    'jumlah' => $item->jumlah
                ];
            });

        // Stok bahan baku terendah (top 5)
        $stokTerendah = BahanBaku::orderBy('stok')->take(5)->get();

        // Data grafik penjualan 7 hari terakhir
        $labels = [];
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $tanggal = Carbon::today()->subDays($i);
            $labels[] = $tanggal->format('d M');
            $data[] = \App\Models\PenjualanHarian::whereDate('tanggal', $tanggal)->sum('total_harga');
        }

        return view('dashboard', compact(
            'pendapatanHarian',
            'totalTransaksi',
            'pengeluaranHarian',
            'produkTerlaris',
            'stokTerendah',
            'labels',
            'data'
        ));
    }
}
