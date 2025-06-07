<x-layouts.app>
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">Daftar Penggunaan Bahan Baku</h2>
        <a href="{{ route('penggunaan-bahan-baku.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Input Penggunaan</a>
        <div class="overflow-x-auto rounded-xl shadow-lg bg-white dark:bg-zinc-800">
            <table class="min-w-full divide-y divide-blue-100 dark:divide-zinc-700">
                <thead>
                    <tr class="bg-blue-100 dark:bg-zinc-700">
                        <th class="py-3 px-4 text-center">Tanggal</th>
                        <th class="py-3 px-4 text-center">Bahan Baku</th>
                        <th class="py-3 px-4 text-center">Jumlah</th>
                        <th class="py-3 px-4 text-center">Digunakan Untuk</th>
                        <th class="py-3 px-4 text-center">Keterangan</th>
                        <th class="py-3 px-4 text-center">Oleh</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($penggunaan as $item)
                        <tr>
                            <td class="py-2 px-4 text-center">{{ $item->tanggal }}</td>
                            <td class="py-2 px-4 text-center">{{ $item->bahanBaku->nama ?? '-' }}</td>
                            <td class="py-2 px-4 text-center">{{ $item->jumlah }}</td>
                            <td class="py-2 px-4 text-center">{{ $item->digunakan_untuk }}</td>
                            <td class="py-2 px-4 text-center">{{ $item->keterangan }}</td>
                            <td class="py-2 px-4 text-center">{{ $item->creator->name ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-6 text-gray-500 dark:text-gray-400">Belum ada data penggunaan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>
