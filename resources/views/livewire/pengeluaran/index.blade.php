<x-layouts.app>
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">Daftar Pengeluaran</h2>
        <a href="{{ route('pengeluaran.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Input Pengeluaran</a>
        <div class="overflow-x-auto rounded-xl shadow-lg bg-white dark:bg-zinc-800">
            <table class="min-w-full divide-y divide-blue-100 dark:divide-zinc-700">
                <thead>
                    <tr class="bg-blue-100 dark:bg-zinc-700">
                        <th class="py-3 px-4 text-center">Tanggal</th>
                        <th class="py-3 px-4 text-center">Tipe</th>
                        <th class="py-3 px-4 text-center">Bahan Baku</th>
                        <th class="py-3 px-4 text-center">Jumlah</th>
                        <th class="py-3 px-4 text-center">Total Biaya</th>
                        <th class="py-3 px-4 text-center">Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengeluarans as $pengeluaran)
                        <tr>
                            <td class="py-2 px-4 text-center">{{ $pengeluaran->tanggal }}</td>
                            <td class="py-2 px-4 text-center">{{ ucfirst($pengeluaran->tipe) }}</td>
                            <td class="py-2 px-4 text-center">
                                {{ $pengeluaran->bahanBaku->nama ?? '-' }}
                            </td>
                            <td class="py-2 px-4 text-center">{{ $pengeluaran->jumlah }}</td>
                            <td class="py-2 px-4 text-center">Rp{{ number_format($pengeluaran->total_biaya,0,',','.') }}</td>
                            <td class="py-2 px-4 text-center">{{ $pengeluaran->catatan }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-6 text-gray-500 dark:text-gray-400">Belum ada data pengeluaran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>
