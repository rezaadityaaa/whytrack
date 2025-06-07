<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Edit Staff</h2>

    <form action="{{ route('staff.update', $staff->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium">Nama</label>
            <input type="text" name="name" id="name" required
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                   value="{{ old('name', $staff->name) }}">
            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium">Email</label>
            <input type="email" name="email" id="email" required
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                   value="{{ old('email', $staff->email) }}">
            @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="status" class="block text-sm font-medium">Status</label>
            <select name="status" id="status" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                <option value="aktif" {{ old('status', $staff->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ old('status', $staff->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
            @error('status') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Perbarui
            </button>
            <a href="{{ route('staff.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
