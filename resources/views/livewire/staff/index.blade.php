<div class="p-6 bg-gradient-to-br from-blue-50 via-white to-blue-100 dark:from-zinc-900 dark:via-zinc-800 dark:to-zinc-900 min-h-screen">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-extrabold text-blue-800 dark:text-blue-200 tracking-tight">Kelola Pengguna (Staff)</h2>
        <a wire:navigate href="{{ route('staff.create') }}"
           class="bg-gradient-to-r from-blue-600 to-blue-400 text-white px-5 py-2 rounded-lg shadow hover:from-blue-700 hover:to-blue-500 transition font-semibold flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Staff
        </a>
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
                    <th class=" py-3 px-4 text-blue-900 dark:text-blue-100 font-semibold text-center">No</th>
                    <th class=" py-3 px-4 text-blue-900 dark:text-blue-100 font-semibold text-center">Nama</th>
                    <th class=" py-3 px-4 text-blue-900 dark:text-blue-100 font-semibold text-center">Email</th>
                    <th class=" py-3 px-4 text-blue-900 dark:text-blue-100 font-semibold text-center">Status</th>
                    <th class=" py-3 px-4 text-blue-900 dark:text-blue-100 font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-blue-50 dark:divide-zinc-700">
                @forelse($staffs as $index => $staff)
                    <tr class="hover:bg-blue-50 dark:hover:bg-zinc-700 transition">
                        <td class=" py-3 px-4 text-gray-900 dark:text-gray-100 text-center font-medium">{{ $index + 1 }}</td>
                        <td class=" py-3 px-4 text-gray-900 dark:text-gray-100 font-medium text-center">{{ $staff->name }}</td>
                        <td class=" py-3 px-4 text-gray-900 dark:text-gray-100 text-center">{{ $staff->email }}</td>
                        <td class=" py-3 px-4 text-center">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-bold
                                {{ $staff->status === 'aktif'
                                    ? 'bg-green-100 text-green-700 dark:bg-green-800 dark:text-green-300'
                                    : 'bg-red-100 text-red-700 dark:bg-red-800 dark:text-red-300' }}">
                                {{ ucfirst($staff->status) }}
                            </span>
                        </td>
                        <td class="py-3 px-4 flex justify-center items-center">
                            <a href="{{ route('staff.edit', $staff->id) }}"
                               class="inline-flex items-center px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition text-sm font-semibold shadow">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13h3l8-8a2.828 2.828 0 00-4-4l-8 8v3z"/>
                                </svg>
                                Edit
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-6 text-gray-500 dark:text-gray-400">Belum ada staff.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
