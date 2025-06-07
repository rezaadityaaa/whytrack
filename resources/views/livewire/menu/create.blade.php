<x-layouts.app>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Tambah Menu</h2>
        <form action="{{ route('menu.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nama" class="block text-sm font-medium">Nama Menu</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required class="w-full border rounded px-3 py-2">
                @error('nama') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="harga" class="block text-sm font-medium">Harga</label>
                <input type="number" name="harga" id="harga" value="{{ old('harga') }}" required class="w-full border rounded px-3 py-2">
                @error('harga') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
                <a href="{{ route('menu.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
            </div>
        </form>
    </div>
</x-layouts.app>