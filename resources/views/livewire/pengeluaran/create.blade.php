<x-layouts.app>
    <div class="p-6 max-w-lg mx-auto">
        <div class="bg-white dark:bg-zinc-800 rounded-2xl shadow-xl p-8 border border-blue-100 dark:border-zinc-700">
            <h2 class="text-3xl font-extrabold mb-6 text-blue-700 dark:text-blue-200 text-center tracking-tight flex items-center justify-center gap-2">
                <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m-6 0h6"/></svg>
                Input Pengeluaran
            </h2>
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
                    <select name="bahan_baku_id" id="bahan_baku_id" class="w-full border border-blue-200 dark:border-zinc-700 rounded-lg px-3 py-2 bg-white dark:bg-zinc-800 text-blue-900 dark:text-blue-100 focus:ring-2 focus:ring-blue-400">
                        <option value="">-- Pilih Bahan Baku --</option>
                        @foreach($bahanBakus as $bahanBaku)
                            <option value="{{ $bahanBaku->id }}">{{ $bahanBaku->nama }}</option>
                        @endforeach
                    </select>
                    @error('bahan_baku_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4" x-show="tipe === 'bahan_baku'">
                    <label for="jumlah" class="block text-sm font-semibold mb-1 text-blue-900 dark:text-blue-100">Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" min="1" :required="tipe === 'bahan_baku'" class="w-full border border-blue-200 dark:border-zinc-700 rounded-lg px-3 py-2 bg-white dark:bg-zinc-800 text-blue-900 dark:text-blue-100 focus:ring-2 focus:ring-blue-400">
                    @error('jumlah') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="total_biaya" class="block text-sm font-semibold mb-1 text-blue-900 dark:text-blue-100">Total Biaya</label>
                    <div class="relative">
                        <span class="absolute left-3 top-2.5 text-blue-400">Rp</span>
                        <input type="number" name="total_biaya" id="total_biaya" min="0" required class="pl-10 w-full border border-blue-200 dark:border-zinc-700 rounded-lg px-3 py-2 bg-blue-50 dark:bg-zinc-900 text-blue-900 dark:text-blue-100 focus:ring-2 focus:ring-blue-400">
                    </div>
                    @error('total_biaya') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4" x-show="tipe === 'operasional'">
                    <label for="catatan" class="block text-sm font-semibold mb-1 text-blue-900 dark:text-blue-100">Catatan Operasional</label>
                    <textarea name="catatan" id="catatan" rows="2" class="w-full border border-blue-200 dark:border-zinc-700 rounded-lg px-3 py-2 bg-white dark:bg-zinc-800 text-blue-900 dark:text-blue-100 focus:ring-2 focus:ring-blue-400" placeholder="Contoh: Listrik, Air, dll"></textarea>
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
