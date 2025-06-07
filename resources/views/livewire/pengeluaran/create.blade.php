<x-layouts.app>
    <div class="p-6 max-w-lg mx-auto">
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-extrabold mb-6 text-blue-700 dark:text-blue-200 text-center">Input Pengeluaran</h2>
            <form action="{{ route('pengeluaran.store') }}" method="POST" x-data="{ tipe: 'bahan_baku' }">
                @csrf
                <div class="mb-4">
                    <label for="tanggal" class="block text-sm font-semibold mb-1 text-blue-900 dark:text-blue-100">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" required class="w-full border border-blue-200 dark:border-zinc-700 rounded-lg px-3 py-2 bg-blue-50 dark:bg-zinc-900 text-blue-900 dark:text-blue-100 focus:ring-2 focus:ring-blue-400">
                    @error('tanggal') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-1 text-blue-900 dark:text-blue-100">Tipe Pengeluaran</label>
                    <select name="tipe" x-model="tipe" class="w-full border border-blue-200 dark:border-zinc-700 rounded-lg px-3 py-2 bg-blue-50 dark:bg-zinc-900 text-blue-900 dark:text-blue-100 focus:ring-2 focus:ring-blue-400">
                        <option value="bahan_baku">Bahan Baku</option>
                        <option value="operasional">Operasional</option>
                    </select>
                    @error('tipe') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4" x-show="tipe === 'bahan_baku'">
                    <label for="bahan_baku_id" class="block text-sm font-semibold mb-1 text-blue-900 dark:text-blue-100">Bahan Baku</label>
                    <select name="bahan_baku_id" id="bahan_baku_id" class="w-full border border-blue-200 dark:border-zinc-700 rounded-lg px-3 py-2 bg-blue-50 dark:bg-zinc-900 text-blue-900 dark:text-blue-100 focus:ring-2 focus:ring-blue-400">
                        <option value="">-- Pilih Bahan Baku --</option>
                        @foreach($bahanBakus as $bahanBaku)
                            <option value="{{ $bahanBaku->id }}">{{ $bahanBaku->nama }}</option>
                        @endforeach
                    </select>
                    @error('bahan_baku_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="jumlah" class="block text-sm font-semibold mb-1 text-blue-900 dark:text-blue-100">Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" min="1" required class="w-full border border-blue-200 dark:border-zinc-700 rounded-lg px-3 py-2 bg-blue-50 dark:bg-zinc-900 text-blue-900 dark:text-blue-100 focus:ring-2 focus:ring-blue-400">
                    @error('jumlah') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="total_biaya" class="block text-sm font-semibold mb-1 text-blue-900 dark:text-blue-100">Total Biaya</label>
                    <input type="number" name="total_biaya" id="total_biaya" min="0" required class="w-full border border-blue-200 dark:border-zinc-700 rounded-lg px-3 py-2 bg-blue-50 dark:bg-zinc-900 text-blue-900 dark:text-blue-100 focus:ring-2 focus:ring-blue-400">
                    @error('total_biaya') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="catatan" class="block text-sm font-semibold mb-1 text-blue-900 dark:text-blue-100">Catatan (Opsional)</label>
                    <textarea name="catatan" id="catatan" rows="2" class="w-full border border-blue-200 dark:border-zinc-700 rounded-lg px-3 py-2 bg-blue-50 dark:bg-zinc-900 text-blue-900 dark:text-blue-100 focus:ring-2 focus:ring-blue-400"></textarea>
                    @error('catatan') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="flex justify-between items-center pt-2">
                    <button type="submit" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-blue-400 text-white px-6 py-2 rounded-lg shadow hover:from-blue-700 hover:to-blue-500 transition font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan
                    </button>
                    <a href="{{ route('pengeluaran.index') }}" class="text-gray-600 dark:text-gray-300 hover:underline transition">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
