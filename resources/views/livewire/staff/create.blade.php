<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Tambah Staff Baru</h2>

    <form action="{{ route('staff.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium">Nama</label>
            <input type="text" name="name" id="name" required
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                   value="{{ old('name') }}">
            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium">Email</label>
            <input type="email" name="email" id="email" required
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                   value="{{ old('email') }}">
            @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium">Password</label>
            <input type="password" name="password" id="password" required
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            @error('password_confirmation') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Simpan
            </button>
            <a href="{{ route('staff.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
