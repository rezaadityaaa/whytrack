<x-layouts.app>
    <div class="p-6 max-w-lg mx-auto">
        <div class="bg-white dark:bg-zinc-800 rounded-2xl shadow-xl p-8 border border-green-100 dark:border-green-700">
            <h2 class="text-2xl font-extrabold mb-6 text-green-700 dark:text-green-200 text-center flex items-center justify-center gap-2">
                <svg class="w-7 h-7 text-green-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>
                Edit Bahan Baku
            </h2>
            <form action="{{ route('bahan-baku.update', $bahanBaku->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')
                <div>
                    <label for="nama" class="block text-sm font-semibold mb-1 text-green-900 dark:text-green-100">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama', $bahanBaku->nama) }}" required
                        class="w-full border border-green-200 dark:border-green-700 rounded-lg px-3 py-2 bg-green-50 dark:bg-zinc-900 text-green-900 dark:text-green-100 focus:ring-2 focus:ring-green-400">
                    @error('nama') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="satuan" class="block text-sm font-semibold mb-1 text-green-900 dark:text-green-100">Satuan</label>
                    <input type="text" name="satuan" id="satuan" value="{{ old('satuan', $bahanBaku->satuan) }}" required
                        class="w-full border border-green-200 dark:border-green-700 rounded-lg px-3 py-2 bg-green-50 dark:bg-zinc-900 text-green-900 dark:text-green-100 focus:ring-2 focus:ring-green-400">
                    @error('satuan') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="stok" class="block text-sm font-semibold mb-1 text-green-900 dark:text-green-100">Stok</label>
                    <input type="number" id="stok" value="{{ $bahanBaku->stok }}" class="w-full border border-green-200 dark:border-green-700 rounded-lg px-3 py-2 bg-green-100 dark:bg-zinc-900 text-green-900 dark:text-green-100" readonly>
                </div>
                <div class="flex justify-between items-center pt-2">
                    <button type="submit" class="inline-flex items-center gap-2 bg-gradient-to-r from-green-600 to-green-400 text-white px-6 py-2 rounded-lg shadow hover:from-green-700 hover:to-green-500 transition font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Update
                    </button>
                    <a href="{{ route('bahan-baku.index') }}" class="text-gray-600 dark:text-gray-300 hover:underline transition">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
