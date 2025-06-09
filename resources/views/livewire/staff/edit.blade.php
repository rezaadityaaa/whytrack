<div class="p-6 max-w-lg mx-auto">
    <div class="bg-white dark:bg-zinc-800 rounded-2xl shadow-xl p-8 border border-blue-100 dark:border-zinc-700">
        <h2 class="text-2xl font-extrabold mb-6 text-blue-700 dark:text-blue-200 text-center flex items-center justify-center gap-2">
            <svg class="w-7 h-7 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>
            Edit Staff
        </h2>
        <form action="{{ route('staff.update', $staff->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-semibold mb-1 text-blue-900 dark:text-blue-100">Nama</label>
                <input type="text" name="name" id="name" required
                       class="w-full border border-blue-200 dark:border-zinc-700 rounded-lg px-3 py-2 bg-blue-50 dark:bg-zinc-900 text-blue-900 dark:text-blue-100 focus:ring-2 focus:ring-blue-400"
                       value="{{ old('name', $staff->name) }}">
                @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold mb-1 text-blue-900 dark:text-blue-100">Email</label>
                <input type="email" name="email" id="email" required
                       class="w-full border border-blue-200 dark:border-zinc-700 rounded-lg px-3 py-2 bg-blue-50 dark:bg-zinc-900 text-blue-900 dark:text-blue-100 focus:ring-2 focus:ring-blue-400"
                       value="{{ old('email', $staff->email) }}">
                @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-semibold mb-1 text-blue-900 dark:text-blue-100">Status</label>
                <select name="status" id="status" class="w-full border border-blue-200 dark:border-zinc-700 rounded-lg px-3 py-2 bg-blue-50 dark:bg-zinc-900 text-blue-900 dark:text-blue-100 focus:ring-2 focus:ring-blue-400">
                    <option value="aktif" {{ old('status', $staff->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ old('status', $staff->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('status') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-between items-center pt-2">
                <button type="submit" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-blue-400 text-white px-6 py-2 rounded-lg shadow hover:from-blue-700 hover:to-blue-500 transition font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Perbarui
                </button>
                <a href="{{ route('staff.index') }}" class="text-gray-600 dark:text-gray-300 hover:underline transition">Batal</a>
            </div>
        </form>
    </div>
</div>
