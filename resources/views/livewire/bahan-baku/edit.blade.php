<x-layouts.app>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Edit Bahan Baku</h2>
        <form action="{{ route('bahan-baku.update', $bahanBaku->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="nama" class="block text-sm font-medium">Nama</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $bahanBaku->nama) }}" required class="w-full border rounded px-3 py-2">
                @error('nama') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="satuan" class="block text-sm font-medium">Satuan</label>
                <input type="text" name="satuan" id="satuan" value="{{ old('satuan', $bahanBaku->satuan) }}" required class="w-full border rounded px-3 py-2">
                @error('satuan') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="stok" class="block text-sm font-semibold mb-1">Stok</label>
                <input type="number" id="stok" value="{{ $bahanBaku->stok }}" class="w-full border text-black rounded-lg px-3 py-2 bg-gray-100" readonly>
            </div>
            <div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
                <a href="{{ route('bahan-baku.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
            </div>
        </form>
    </div>
</x-layouts.app>
