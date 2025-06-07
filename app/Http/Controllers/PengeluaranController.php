<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\BahanBaku;
use App\Models\PergerakanStok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluarans = Pengeluaran::with('bahanBaku')->latest()->get();
        return view('livewire.pengeluaran.index', compact('pengeluarans'));
    }

    public function create()
    {
        $bahanBakus = BahanBaku::all();
        return view('livewire.pengeluaran.create', compact('bahanBakus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal'      => 'required|date',
            'tipe'         => 'required|in:bahan_baku,operasional',
            'jumlah'       => 'required|integer|min:1',
            'total_biaya'  => 'required|integer|min:0',
            'bahan_baku_id'=> 'nullable|exists:bahan_baku,id',
            'catatan'      => 'nullable|string',
        ]);

        DB::transaction(function () use ($request) {
            $pengeluaran = Pengeluaran::create([
                'tanggal'       => $request->tanggal,
                'tipe'          => $request->tipe,
                'bahan_baku_id' => $request->tipe === 'bahan_baku' ? $request->bahan_baku_id : null,
                'jumlah'        => $request->jumlah,
                'total_biaya'   => $request->total_biaya,
                'catatan'       => $request->catatan,
                'created_by'    => Auth::id(),
            ]);

            // Jika tipe bahan baku → tambah stok
            if ($pengeluaran->tipe === 'bahan_baku' && $pengeluaran->bahan_baku_id) {
                $bahanBaku = BahanBaku::findOrFail($pengeluaran->bahan_baku_id);
                $bahanBaku->increment('stok', $pengeluaran->jumlah);

                // Setelah stok ditambah
                PergerakanStok::create([
                    'bahan_baku_id' => $request->bahan_baku_id,
                    'tipe'          => 'masuk',
                    'jumlah'        => $request->jumlah,
                    'sumber'        => 'Pembelian',
                    'keterangan'    => $request->catatan,
                    'created_by'    => Auth::id(),
                ]);
            }
        });

        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil dicatat.');
    }

    public function totalPengeluaran($start, $end)
    {
        $totalPengeluaran = Pengeluaran::whereBetween('tanggal', [$start, $end])->sum('total_biaya');
        return $totalPengeluaran;
    }
}
