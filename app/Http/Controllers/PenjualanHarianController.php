<?php

namespace App\Http\Controllers;

use App\Models\PenjualanHarian;
use App\Models\PenghasilanHarian;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjualanHarianController extends Controller
{
    public function index()
    {
        $penjualans = PenjualanHarian::with('menu')
            ->where('staff_id', Auth::id())
            ->where('tanggal', date('Y-m-d')) // hanya hari ini
            ->latest()
            ->get();

        return view('livewire.penjualan.index', compact('penjualans'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('livewire.penjualan.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id'        => 'required|array',
            'menu_id.*'      => 'exists:menus,id',
            'tanggal'        => 'required|date',
            'jam'             => 'required|date_format:H:i',
            'jumlah_terjual' => 'required|array',
            'jumlah_terjual.*' => 'integer|min:1',
        ]);

        foreach ($request->menu_id as $i => $menuId) {
            $menu = Menu::findOrFail($menuId);
            $jumlah = $request->jumlah_terjual[$i];
            $total_harga = $menu->harga * $jumlah;

            // Simpan ke tabel penjualan_harian
            PenjualanHarian::create([
                'staff_id'       => Auth::id(),
                'menu_id'        => $menu->id,
                'tanggal'        => $request->tanggal,
                'jam'            => $request->jam,
                'jumlah_terjual' => $jumlah,
                'total_harga'    => $total_harga,
            ]);
        }

        // Hitung ulang total penghasilan harian
        $totalHariItu = PenjualanHarian::where('staff_id', Auth::id())
            ->where('tanggal', $request->tanggal)
            ->sum('total_harga');

        // Simpan atau update penghasilan_harian
        PenghasilanHarian::updateOrCreate(
            [
                'staff_id' => Auth::id(),
                'tanggal'  => $request->tanggal,
            ],
            [
                'total_harian' => $totalHariItu,
            ]
        );

        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil disimpan dan penghasilan harian diperbarui.');
    }
}

$start = date('Y-m-d'); // atau tentukan sesuai kebutuhan
$end = date('Y-m-d');   // misal, untuk hari ini saja

// Jika ingin filter custom, bisa gunakan request parameter
// $start = $request->input('start', date('Y-m-d'));
// $end = $request->input('end', date('Y-m-d'));

$penghasilanHariIni = PenghasilanHarian::where('staff_id', Auth::id())
    ->where('tanggal', date('Y-m-d'))
    ->first();

// $totalPemasukan = PenjualanHarian::whereBetween('tanggal', [$start, $end])->sum('total_harga');
// atau jika pakai penghasilan_harian
$totalPemasukan = PenghasilanHarian::whereBetween('tanggal', [$start, $end])->sum('total_harian');
