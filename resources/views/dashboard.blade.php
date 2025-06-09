<x-layouts.app :title="__('Dashboard')">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Pendapatan Harian -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-400 rounded-xl shadow p-6 flex flex-col items-center">
            <div class="text-sm text-blue-100 mb-1">Pendapatan Hari Ini</div>
            <div class="text-3xl font-extrabold text-white">Rp{{ number_format($pendapatanHarian,0,',','.') }}</div>
        </div>
        <!-- Total Transaksi -->
        <div class="bg-gradient-to-r from-green-500 to-green-400 rounded-xl shadow p-6 flex flex-col items-center">
            <div class="text-sm text-green-100 mb-1">Transaksi Hari Ini</div>
            <div class="text-3xl font-extrabold text-white">{{ $totalTransaksi }}</div>
        </div>
        <!-- Pengeluaran Hari Ini -->
        <div class="bg-gradient-to-r from-red-500 to-red-400 rounded-xl shadow p-6 flex flex-col items-center">
            <div class="text-sm text-red-100 mb-1">Pengeluaran Hari Ini</div>
            <div class="text-3xl font-extrabold text-white">Rp{{ number_format($pengeluaranHarian,0,',','.') }}</div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Produk Terlaris -->
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow p-6">
            <div class="font-semibold mb-4 text-blue-700 dark:text-blue-200 text-lg flex items-center gap-2">
                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 17.75l-6.172 3.245 1.179-6.873L2 9.755l6.908-1.004L12 2.5l3.092 6.251L22 9.755l-5.007 4.367 1.179 6.873z"/></svg>
                Produk Terlaris
            </div>
            <ul>
                @forelse($produkTerlaris as $produk)
                    <li class="flex items-center justify-between py-3 px-2 rounded-lg mb-2 bg-blue-50 dark:bg-zinc-900 shadow-sm hover:bg-blue-100 dark:hover:bg-zinc-800 transition">
                        <div class="flex items-center gap-3">
                            <div class="bg-blue-200 dark:bg-blue-900 text-blue-700 dark:text-blue-200 rounded-full w-9 h-9 flex items-center justify-center font-bold text-lg">
                                {{ strtoupper(substr($produk->nama,0,1)) }}
                            </div>
                            <span class="font-medium text-blue-900 dark:text-blue-100">{{ $produk->nama }}</span>
                        </div>
                        <span class="font-bold text-blue-700 dark:text-blue-200">{{ $produk->jumlah }} terjual</span>
                    </li>
                @empty
                    <li class="py-2 text-gray-400 text-center">Belum ada data</li>
                @endforelse
            </ul>
        </div>
        <!-- Stok Bahan Baku Terendah -->
        <div class="bg-white dark:bg-zinc-800 rounded-xl shadow p-6">
            <div class="font-semibold mb-4 text-red-700 dark:text-red-200 text-lg flex items-center gap-2">
                <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 22V2m0 0l7 7m-7-7L5 9"/></svg>
                Stok Bahan Baku Terendah
            </div>
            <ul>
                @forelse($stokTerendah as $bahan)
                    <li class="flex items-center justify-between py-3 px-2 rounded-lg mb-2 bg-red-50 dark:bg-zinc-900 shadow-sm hover:bg-red-100 dark:hover:bg-zinc-800 transition">
                        <div class="flex items-center gap-3">
                            <div class="bg-red-200 dark:bg-red-900 text-red-700 dark:text-red-200 rounded-full w-9 h-9 flex items-center justify-center font-bold text-lg">
                                {{ strtoupper(substr($bahan->nama,0,1)) }}
                            </div>
                            <span class="font-medium text-red-900 dark:text-red-100">{{ $bahan->nama }}</span>
                        </div>
                        <span class="font-bold text-red-700 dark:text-red-200">{{ $bahan->stok }}</span>
                    </li>
                @empty
                    <li class="py-2 text-gray-400 text-center">Belum ada data</li>
                @endforelse
            </ul>
        </div>
    </div>

    <div class="bg-white dark:bg-zinc-800 rounded-xl shadow p-6 mb-6">
        <div class="font-semibold mb-2 text-blue-700 dark:text-blue-200 text-lg">Grafik Penjualan 7 Hari Terakhir</div>
        <canvas id="chartPenjualan"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('chartPenjualan').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Penjualan',
                    data: {!! json_encode($data) !!},
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59,130,246,0.1)',
                    fill: true,
                    tension: 0.4
                }]
            }
        });
    });
    </script>
</x-layouts.app>
