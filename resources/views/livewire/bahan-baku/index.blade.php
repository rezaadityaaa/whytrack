<x-layouts.app>
    <div class="p-6 bg-gradient-to-br from-blue-50 via-white to-blue-100 dark:from-zinc-900 dark:via-zinc-800 dark:to-zinc-900 min-h-screen">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-extrabold text-blue-800 dark:text-blue-200 tracking-tight">Kelola Bahan Baku</h2>
            <div class="flex gap-2">
                <a href="{{ route('bahan-baku.create') }}"
                   class="bg-gradient-to-r from-blue-600 to-blue-400 text-white px-5 py-2 rounded-lg shadow hover:from-blue-700 hover:to-blue-500 transition font-semibold flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Tambah Bahan Baku
                </a>
                <a href="{{ route('penggunaan-bahan-baku.index') }}"
                   class="bg-gradient-to-r from-green-600 to-green-400 text-white px-5 py-2 rounded-lg shadow hover:from-green-700 hover:to-green-500 transition font-semibold flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                    </svg>
                    Gunakan Bahan Baku
                </a>
                <a href="{{ route('pergerakan-stok.index') }}"
                   class="bg-gradient-to-r from-yellow-500 to-yellow-300 text-white px-5 py-2 rounded-lg shadow hover:from-yellow-600 hover:to-yellow-400 transition font-semibold flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18"/>
                    </svg>
                    Pergerakan Stok
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4 border-l-4 border-green-500 dark:bg-green-900 dark:text-green-200 dark:border-green-400 shadow text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-xl shadow-lg bg-white dark:bg-zinc-800">
            <table class="min-w-full divide-y divide-blue-100 dark:divide-zinc-700 table-fixed">
                <thead>
                    <tr class="bg-blue-100 dark:bg-zinc-700">
                        <th class="py-3 px-4 font-semibold text-center w-12 text-blue-900 dark:text-blue-100">No</th>
                        <th class="py-3 px-4 font-semibold text-center text-blue-900 dark:text-blue-100">Nama</th>
                        <th class="py-3 px-4 font-semibold text-center text-blue-900 dark:text-blue-100">Satuan</th>
                        <th class="py-3 px-4 font-semibold text-center text-blue-900 dark:text-blue-100">Stok</th>
                        <th class="py-3 px-4 font-semibold text-center text-blue-900 dark:text-blue-100">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-blue-50 dark:divide-zinc-700">
                    @forelse($bahanBaku as $i => $bahan)
                        <tr class="hover:bg-blue-50 dark:hover:bg-zinc-700 transition">
                            <td class="py-3 px-4 text-center font-medium text-gray-900 dark:text-gray-100">{{ $i + 1 }}</td>
                            <td class="py-3 px-4 text-center text-gray-900 dark:text-gray-100">{{ $bahan->nama }}</td>
                            <td class="py-3 px-4 text-center text-gray-900 dark:text-gray-100">{{ $bahan->satuan }}</td>
                            <td class="py-3 px-4 text-center text-gray-900 dark:text-gray-100">{{ $bahan->stok }}</td>
                            <td class="py-3 px-4 flex justify-center items-center gap-2">
                                <a href="{{ route('bahan-baku.edit', $bahan->id) }}"
                                   class="inline-flex items-center px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition text-sm font-semibold shadow">
                                    Edit
                                </a>
                                <form action="{{ route('bahan-baku.destroy', $bahan->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus bahan baku ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition text-sm font-semibold shadow">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-6 text-gray-500 dark:text-gray-400">Belum ada bahan baku.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>
