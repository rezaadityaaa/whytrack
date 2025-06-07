<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BahanBakuController extends Controller
{
    // Tampilkan daftar bahan baku
    public function index()
    {
        $bahanBaku = BahanBaku::all();
        return view('livewire.bahan-baku.index', compact('bahanBaku'));
    }

    // Form tambah bahan baku
    public function create()
    {
        return view('livewire.bahan-baku.create');
    }

    // Simpan bahan baku baru
    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'stok'   => 'required|integer|min:0',
        ]);

        BahanBaku::create([
            'nama'       => $request->nama,
            'satuan'     => $request->satuan,
            'stok'       => $request->stok,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('bahan-baku.index')->with('success', 'Bahan baku berhasil ditambahkan');
    }

    // Form edit bahan baku
    public function edit(BahanBaku $bahanBaku)
    {
        return view('livewire.bahan-baku.edit', compact('bahanBaku'));
    }

    // Update bahan baku
    public function update(Request $request, BahanBaku $bahanBaku)
    {
        $request->validate([
            'nama'   => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
        ]);

        $bahanBaku->update([
            'nama'       => $request->nama,
            'satuan'     => $request->satuan,
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('bahan-baku.index')->with('success', 'Bahan baku berhasil diperbarui');
    }

    // Hapus bahan baku
    public function destroy(BahanBaku $bahanBaku)
    {
        $bahanBaku->delete();
        return redirect()->route('bahan-baku.index')->with('success', 'Bahan baku berhasil dihapus');
    }
}
