<x-layouts.app>
    <div class="p-6">
        {{-- Total Penghasilan Harian --}}
        <div class="mb-6">
            <div class="bg-gradient-to-r from-green-400 to-green-600 text-white rounded-lg shadow px-6 py-4 flex items-center justify-between">
                <span class="text-lg font-semibold">Total Penghasilan Hari Ini ({{ date('d-m-Y') }})</span>
                <span class="text-2xl font-bold">
                    Rp{{ number_format($penjualans->where('tanggal', date('Y-m-d'))->sum('total_harga'), 0, ',', '.') }}
                </span>
            </div>
        </div>
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-bold">Daftar Penjualan Harian</h2>
            <a href="{{ route('penjualan.create') }}"
               class="bg-gradient-to-r from-blue-600 to-blue-400 text-white px-5 py-2 rounded-lg shadow hover:from-blue-700 hover:to-blue-500 transition font-semibold flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Input Penjualan
            </a>
        </div>
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4 border-l-4 border-green-500 shadow text-center">
                {{ session('success') }}
            </div>
        @endif
        <div class="overflow-x-auto rounded-xl shadow-lg bg-white dark:bg-zinc-800">
            <table class="min-w-full divide-y divide-blue-100 dark:divide-zinc-700 table-fixed">
                <thead>
                    <tr class="bg-blue-100 dark:bg-zinc-700">
                        <th class="py-3 px-4 text-blue-900 dark:text-blue-100 font-semibold text-center w-12">No</th>
                        <th class="py-3 px-4 text-blue-900 dark:text-blue-100 font-semibold text-center">Tanggal</th>
                        <th class="py-3 px-4 text-blue-900 dark:text-blue-100 font-semibold text-center">Jam</th>
                        <th class="py-3 px-4 text-blue-900 dark:text-blue-100 font-semibold text-center">Menu</th>
                        <th class="py-3 px-4 text-blue-900 dark:text-blue-100 font-semibold text-center">Jumlah Terjual</th>
                        <th class="py-3 px-4 text-blue-900 dark:text-blue-100 font-semibold text-center">Total Harga</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-blue-50 dark:divide-zinc-700">
                    @forelse($penjualans as $i => $penjualan)
                        <tr class="hover:bg-blue-50 dark:hover:bg-zinc-700 transition">
                            <td class="py-3 px-4 text-center font-medium text-gray-900 dark:text-gray-100">{{ $i + 1 }}</td>
                            <td class="py-3 px-4 text-center text-gray-900 dark:text-gray-100">{{ $penjualan->tanggal }}</td>
                            <td class="py-3 px-4 text-center text-gray-900 dark:text-gray-100">{{ $penjualan->jam }}</td>
                            <td class="py-3 px-4 text-center text-gray-900 dark:text-gray-100">{{ $penjualan->menu->nama ?? '-' }}</td>
                            <td class="py-3 px-4 text-center text-gray-900 dark:text-gray-100">{{ $penjualan->jumlah_terjual }}</td>
                            <td class="py-3 px-4 text-center text-gray-900 dark:text-gray-100">Rp{{ number_format($penjualan->total_harga,0,',','.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-6 text-gray-500 dark:text-gray-400">Belum ada data penjualan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>
