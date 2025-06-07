<x-layouts.app>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Tambah Bahan Baku</h2>
        <form action="{{ route('bahan-baku.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nama" class="block text-sm font-medium">Nama</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required class="w-full border rounded px-3 py-2">
                @error('nama') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="satuan" class="block text-sm font-medium">Satuan</label>
                <input type="text" name="satuan" id="satuan" value="{{ old('satuan') }}" required class="w-full border rounded px-3 py-2">
                @error('satuan') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="stok" class="block text-sm font-medium">Stok</label>
                <input type="number" name="stok" id="stok" value="{{ old('stok') }}" min="0" required class="w-full border rounded px-3 py-2">
                @error('stok') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
                <a href="{{ route('bahan-baku.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
            </div>
        </form>
    </div>
</x-layouts.app>
