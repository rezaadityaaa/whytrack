<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BahanBaku;
use Illuminate\Support\Facades\Auth;

class BahanBakuIndex extends Component
{
    public $bahanBaku;
    public $nama, $satuan, $stok;
    public $editId = null;

    protected $rules = [
        'nama' => 'required|string|max:255',
        'satuan' => 'required|string|max:50',
        'stok' => 'required|integer|min:0',
    ];

    public function render()
    {
        $this->bahanBaku = BahanBaku::latest()->get();
        return view('livewire.bahan-baku-index');
    }

    public function store()
    {
        $this->validate();

        BahanBaku::create([
            'nama' => $this->nama,
            'satuan' => $this->satuan,
            'stok' => $this->stok,
            'created_by' => Auth::id(),
        ]);

        $this->resetForm();
    }

    public function edit($id)
    {
        $item = BahanBaku::findOrFail($id);
        $this->editId = $id;
        $this->nama = $item->nama;
        $this->satuan = $item->satuan;
        $this->stok = $item->stok;
    }

    public function update()
    {
        $this->validate();

        $item = BahanBaku::findOrFail($this->editId);
        $item->update([
            'nama' => $this->nama,
            'satuan' => $this->satuan,
            'stok' => $this->stok,
            'updated_by' => Auth::id(),
        ]);

        $this->resetForm();
    }

    public function delete($id)
    {
        BahanBaku::findOrFail($id)->delete();
    }

    public function resetForm()
    {
        $this->editId = null;
        $this->nama = '';
        $this->satuan = '';
        $this->stok = '';
    }
}
