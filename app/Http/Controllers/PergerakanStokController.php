<?php

namespace App\Http\Controllers;

use App\Models\PergerakanStok;
use App\Models\BahanBaku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PergerakanStokController extends Controller
{
    public function index()
    {
        $pergerakan = PergerakanStok::with('bahanBaku', 'creator')->latest()->get();
        return view('livewire.pergerakan-stok.index', compact('pergerakan'));
    }

    public function create()
    {
        $bahanBakus = BahanBaku::all();
        return view('livewire.pergerakan-stok.create', compact('bahanBakus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bahan_baku_id' => 'required|exists:bahan_baku,id',
            'tipe'          => 'required|in:masuk,keluar',
            'jumlah'        => 'required|integer|min:1',
            'sumber'        => 'nullable|string|max:255',
            'keterangan'    => 'nullable|string',
        ]);

        if ($request->tipe === 'masuk') {
            PergerakanStok::create([
                'bahan_baku_id' => $request->bahan_baku_id,
                'tipe'          => $request->tipe,
                'jumlah'        => $request->jumlah,
                'sumber'        => $request->sumber,
                'keterangan'    => $request->keterangan,
                'created_by'    => Auth::id(),
            ]);

            // Update stok bahan baku
            $bahanBaku = BahanBaku::find($request->bahan_baku_id);
            $bahanBaku->increment('stok', $request->jumlah);
        } else {
            // Kurangi stok bahan baku
            $bahanBaku = BahanBaku::find($request->bahan_baku_id);
            $bahanBaku->decrement('stok', $request->jumlah);

            // Catat pergerakan keluar
            PergerakanStok::create([
                'bahan_baku_id' => $request->bahan_baku_id,
                'tipe'          => 'keluar',
                'jumlah'        => $request->jumlah,
                'sumber'        => 'Penggunaan',
                'keterangan'    => $request->digunakan_untuk,
                'created_by'    => Auth::id(),
            ]);
        }

        return redirect()->route('pergerakan-stok.index')->with('success', 'Pergerakan stok berhasil dicatat.');
    }
}
