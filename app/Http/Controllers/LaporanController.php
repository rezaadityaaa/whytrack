<?php

namespace App\Http\Controllers;

use App\Models\PenghasilanHarian;
use App\Models\Pengeluaran;
use App\Models\PenjualanHarian;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter filter dari request
        $periode = $request->input('periode', 'hari'); // hari/minggu/bulan
        $tanggal = $request->input('tanggal', date('Y-m-d'));

        if ($periode === 'hari') {
            $start = $tanggal;
            $end = $tanggal;
        } elseif ($periode === 'minggu') {
            $start = \Carbon\Carbon::parse($tanggal)->startOfWeek()->toDateString();
            $end = \Carbon\Carbon::parse($tanggal)->endOfWeek()->toDateString();
        } else { // bulan
            $start = \Carbon\Carbon::parse($tanggal)->startOfMonth()->toDateString();
            $end = \Carbon\Carbon::parse($tanggal)->endOfMonth()->toDateString();
        }

        // Total pemasukan dari penjualan harian (total_harga)
        $totalPemasukan = PenjualanHarian::whereBetween('tanggal', [$start, $end])->sum('total_harga');

        // Total pengeluaran dari pengeluaran (total_biaya)
        $totalPengeluaran = Pengeluaran::whereBetween('tanggal', [$start, $end])->sum('total_biaya');

        $keuntungan = $totalPemasukan - $totalPengeluaran;

        return view('livewire.laporan.index', [
            'totalPemasukan'   => $totalPemasukan,
            'totalPengeluaran' => $totalPengeluaran,
            'keuntungan'       => $keuntungan,
            'tanggal'          => $tanggal,
            // Jika ingin menampilkan detail, tambahkan query detail di sini
        ]);
    }

    public function cetak(Request $request)
    {
        $periode = $request->input('periode', 'hari');
        $tanggal = $request->input('tanggal', date('Y-m-d'));

        if ($periode === 'hari') {
            $start = $tanggal;
            $end = $tanggal;
        } elseif ($periode === 'minggu') {
            $start = \Carbon\Carbon::parse($tanggal)->startOfWeek()->toDateString();
            $end = \Carbon\Carbon::parse($tanggal)->endOfWeek()->toDateString();
        } else { // bulan
            $start = \Carbon\Carbon::parse($tanggal)->startOfMonth()->toDateString();
            $end = \Carbon\Carbon::parse($tanggal)->endOfMonth()->toDateString();
        }

        $totalPemasukan = PenjualanHarian::whereBetween('tanggal', [$start, $end])->sum('total_harga');
        $totalPengeluaran = Pengeluaran::whereBetween('tanggal', [$start, $end])->sum('total_biaya');
        $keuntungan = $totalPemasukan - $totalPengeluaran;

        // Ambil detail penjualan (kopi apa & jumlah)
        $detailPenjualan = PenjualanHarian::with('menu')
            ->orderBy('tanggal')
            ->get()
            ->groupBy('tanggal'); // tanpa ->count() atau ->exists()

        // Ambil detail pengeluaran (bahan baku & jumlah)
        $detailPengeluaran = Pengeluaran::with('bahanBaku')
            ->orderBy('tanggal')
            ->get()
            ->groupBy('tanggal');

        $pdf = Pdf::loadView('livewire.laporan.cetak', [
            'totalPemasukan'     => $totalPemasukan,
            'totalPengeluaran'   => $totalPengeluaran,
            'keuntungan'         => $keuntungan,
            'tanggal'            => $tanggal,
            'periode'            => $periode,
            'detailPenjualan'    => $detailPenjualan,
            'detailPengeluaran'  => $detailPengeluaran,
        ]);

        return $pdf->stream('laporan-keuangan.pdf');
    }
}
