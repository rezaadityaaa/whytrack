<x-layouts.app>
    <div class="p-6 max-w-lg mx-auto">
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold mb-6 text-blue-700 dark:text-blue-200 text-center">Input Pergerakan Stok</h2>
            <form action="{{ route('pergerakan-stok.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="bahan_baku_id" class="block text-sm font-semibold mb-1 text-blue-900 dark:text-blue-100">Bahan Baku</label>
                    <select name="bahan_baku_id" id="bahan_baku_id" required class="w-full border border-blue-200 dark:border-zinc-700 rounded-lg px-3 py-2 bg-blue-50 dark:bg-zinc-900 text-blue-900 dark:text-blue-100">
                        <option value="">-- Pilih Bahan Baku --</option>
                        @foreach($bahanBakus as $bahanBaku)
                            <option value="{{ $bahanBaku->id }}">{{ $bahanBaku->nama }}</option>
                        @endforeach
                    </select>
                    @error('bahan_baku_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="tipe" class="block text-sm font-semibold mb-1 text-blue-900 dark:text-blue-100">Tipe Pergerakan</label>
                    <select name="tipe" id="tipe" required class="w-full border border-blue-200 dark:border-zinc-700 rounded-lg px-3 py-2 bg-blue-50 dark:bg-zinc-900 text-blue-900 dark:text-blue-100">
                        <option value="masuk">Masuk</option>
                        <option value="keluar">Keluar</option>
                    </select>
                    @error('tipe') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="jumlah" class="block text-sm font-semibold mb-1 text-blue-900 dark:text-blue-100">Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" min="1" required class="w-full border border-blue-200 dark:border-zinc-700 rounded-lg px-3 py-2 bg-blue-50 dark:bg-zinc-900 text-blue-900 dark:text-blue-100">
                    @error('jumlah') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="sumber" class="block text-sm font-semibold mb-1 text-blue-900 dark:text-blue-100">Sumber</label>
                    <input type="text" name="sumber" id="sumber" class="w-full border border-blue-200 dark:border-zinc-700 rounded-lg px-3 py-2 bg-blue-50 dark:bg-zinc-900 text-blue-900 dark:text-blue-100">
                    @error('sumber') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="keterangan" class="block text-sm font-semibold mb-1 text-blue-900 dark:text-blue-100">Keterangan (Opsional)</label>
                    <textarea name="keterangan" id="keterangan" rows="2" class="w-full border border-blue-200 dark:border-zinc-700 rounded-lg px-3 py-2 bg-blue-50 dark:bg-zinc-900 text-blue-900 dark:text-blue-100"></textarea>
                    @error('keterangan') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="flex justify-between items-center pt-2">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 font-semibold">
                        Simpan
                    </button>
                    <a href="{{ route('pergerakan-stok.index') }}" class="text-gray-600 dark:text-gray-300 hover:underline transition">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
