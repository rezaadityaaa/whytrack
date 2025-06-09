<x-layouts.app>
    <div class="p-6 max-w-xl mx-auto">
        <div class="bg-white dark:bg-zinc-800 rounded-2xl shadow-xl p-8 border border-blue-100 dark:border-zinc-700">
            <h2 class="text-3xl font-extrabold mb-6 text-blue-700 dark:text-blue-200 text-center tracking-tight flex items-center justify-center gap-2">
                <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 8v4l3 3"/></svg>
                Input Penjualan Harian
            </h2>
            <form action="{{ route('penjualan.store') }}" method="POST" x-data="{ items: [{menu_id: '', jumlah: 1}] }" @submit="for(let i=0;i<items.length;i++){ if(!items[i].menu_id || !items[i].jumlah) { $event.preventDefault(); alert('Menu dan jumlah wajib diisi!'); break; } }">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="tanggal" class="block text-sm font-semibold mb-1 text-blue-900 dark:text-blue-100">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal"
                            value="{{ old('tanggal', date('Y-m-d')) }}"
                            required
                            class="w-full border border-blue-200 dark:border-zinc-700 rounded-lg px-3 py-2 bg-blue-50 dark:bg-zinc-900 text-blue-900 dark:text-blue-100 focus:ring-2 focus:ring-blue-400">
                        @error('tanggal') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="jam" class="block text-sm font-semibold mb-1 text-blue-900 dark:text-blue-100">Jam</label>
                        <input type="time" name="jam" id="jam"
                            value="{{ old('jam', now()->format('H:i')) }}"
                            required
                            @focus="if(!$event.target.value){ 
                                let now = new Date(); 
                                let h = String(now.getHours()).padStart(2,'0'); 
                                let m = String(now.getMinutes()).padStart(2,'0'); 
                                $event.target.value = h+':'+m; 
                            }"
                            class="w-full border border-blue-200 dark:border-zinc-700 rounded-lg px-3 py-2 bg-blue-50 dark:bg-zinc-900 text-blue-900 dark:text-blue-100 focus:ring-2 focus:ring-blue-400">
                        @error('jam') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-2 text-blue-900 dark:text-blue-100">Detail Penjualan</label>
                    <template x-for="(item, index) in items" :key="index">
                        <div class="flex gap-2 mb-3 items-end bg-blue-50 dark:bg-zinc-900 rounded-lg p-3 border border-blue-100 dark:border-zinc-700">
                            <div class="flex-1">
                                <label :for="'menu_id'+index" class="block text-xs font-semibold mb-1 text-blue-900 dark:text-blue-100">Menu</label>
                                <select :name="'menu_id[]'" x-model="item.menu_id" :id="'menu_id'+index" required class="w-full border border-blue-200 dark:border-zinc-700 rounded-lg px-3 py-2 bg-white dark:bg-zinc-800 text-blue-900 dark:text-blue-100 focus:ring-2 focus:ring-blue-400">
                                    <option value="">-- Pilih Menu --</option>
                                    @foreach($menus as $menu)
                                        <option value="{{ $menu->id }}">{{ $menu->nama }} (Rp{{ number_format($menu->harga,0,',','.') }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-32">
                                <label :for="'jumlah'+index" class="block text-xs font-semibold mb-1 text-blue-900 dark:text-blue-100">Jumlah</label>
                                <input type="number" :name="'jumlah_terjual[]'" x-model="item.jumlah" :id="'jumlah'+index" min="1" required class="w-full border border-blue-200 dark:border-zinc-700 rounded-lg px-3 py-2 bg-white dark:bg-zinc-800 text-blue-900 dark:text-blue-100 focus:ring-2 focus:ring-blue-400">
                            </div>
                            <button type="button" @click="items.splice(index,1)" x-show="items.length > 1" class="self-end mb-1 text-red-500 hover:text-red-700 text-xl font-bold" title="Hapus">
                                &times;
                            </button>
                        </div>
                    </template>
                    <button type="button" @click="items.push({menu_id: '', jumlah: 1})" class="mt-2 text-blue-600 hover:underline text-sm font-semibold">
                        + Tambah Menu
                    </button>
                </div>
                <div class="flex justify-between items-center pt-4">
                    <button type="submit" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-blue-400 text-white px-6 py-2 rounded-lg shadow hover:from-blue-700 hover:to-blue-500 transition font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan
                    </button>
                    <a href="{{ route('penjualan.index') }}" class="text-gray-600 dark:text-gray-300 hover:underline transition">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
