<?php

namespace App\Http\Controllers;

use App\Models\PenggunaanBahanBaku;
use App\Models\BahanBaku;
use App\Models\PergerakanStok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenggunaanBahanBakuController extends Controller
{
    public function index()
    {
        $penggunaan = PenggunaanBahanBaku::with('bahanBaku', 'creator')->latest()->get();
        return view('livewire.penggunaan-bahan-baku.index', compact('penggunaan'));
    }

    public function create()
    {
        $bahanBakus = BahanBaku::all();
        return view('livewire.penggunaan-bahan-baku.create', compact('bahanBakus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bahan_baku_id'   => 'required|exists:bahan_baku,id',
            'tanggal'         => 'required|date',
            'jumlah'          => 'required|integer|min:1',
            'digunakan_untuk' => 'required|string|max:255',
            'keterangan'      => 'nullable|string',
        ]);

        PenggunaanBahanBaku::create([
            'bahan_baku_id'   => $request->bahan_baku_id,
            'tanggal'         => $request->tanggal,
            'jumlah'          => $request->jumlah,
            'digunakan_untuk' => $request->digunakan_untuk,
            'keterangan'      => $request->keterangan,
            'created_by'      => Auth::id(),
        ]);

        // Kurangi stok bahan baku
        $bahanBaku = BahanBaku::find($request->bahan_baku_id);
        $bahanBaku->decrement('stok', $request->jumlah);

        // Catat ke pergerakan stok (otomatis)
        PergerakanStok::create([
            'bahan_baku_id' => $request->bahan_baku_id,
            'tipe'          => 'keluar',
            'jumlah'        => $request->jumlah,
            'sumber'        => 'Penggunaan',
            'keterangan'    => $request->digunakan_untuk,
            'created_by'    => Auth::id(),
        ]);

        return redirect()->route('penggunaan-bahan-baku.index')->with('success', 'Penggunaan bahan baku berhasil dicatat.');
    }
}
