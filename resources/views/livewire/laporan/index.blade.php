<x-layouts.app>
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">Laporan Keuangan</h2>
        <form method="GET" class="mb-6 flex gap-2 flex-wrap">
            <select name="periode" id="periode" class="border rounded px-2 py-1" onchange="toggleCustomDate()">
                <option value="hari" {{ request('periode') == 'hari' ? 'selected' : '' }}>Hari</option>
                <option value="minggu" {{ request('periode') == 'minggu' ? 'selected' : '' }}>Minggu</option>
                <option value="bulan" {{ request('periode') == 'bulan' ? 'selected' : '' }}>Bulan</option>
                <option value="custom" {{ request('periode') == 'custom' ? 'selected' : '' }}>Custom</option>
            </select>
            <input type="date" name="tanggal" value="{{ request('tanggal', date('Y-m-d')) }}" class="border rounded px-2 py-1" id="tanggalInput" {{ request('periode') == 'custom' ? 'hidden' : '' }}>
            <input type="date" name="start" value="{{ request('start') }}" class="border rounded px-2 py-1" id="startInput" placeholder="Dari" {{ request('periode') == 'custom' ? '' : 'hidden' }}>
            <input type="date" name="end" value="{{ request('end') }}" class="border rounded px-2 py-1" id="endInput" placeholder="Sampai" {{ request('periode') == 'custom' ? '' : 'hidden' }}>
            <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded">Tampilkan</button>
        </form>
        <a href="{{ route('laporan.cetak', request()->all()) }}" target="_blank"
           class="bg-green-600 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-green-700">
            Cetak Laporan
        </a>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-green-100 p-4 rounded shadow">
                <div class="font-semibold text-green-700">Pemasukan</div>
                <div class="text-2xl text-black font-bold">Rp{{ number_format($totalPemasukan,0,',','.') }}</div>
            </div>
            <div class="bg-red-100 p-4 rounded shadow">
                <div class="font-semibold text-red-700">Pengeluaran</div>
                <div class="text-2xl text-black font-bold">Rp{{ number_format($totalPengeluaran,0,',','.') }}</div>
            </div>
            <div class="bg-blue-100 p-4 rounded shadow">
                <div class="font-semibold text-blue-700">Keuntungan</div>
                <div class="text-2xl text-black font-bold">Rp{{ number_format($keuntungan,0,',','.') }}</div>
            </div>
        </div>
    </div>
    <script>
        function toggleCustomDate() {
            const periode = document.getElementById('periode').value;
            document.getElementById('tanggalInput').hidden = (periode === 'custom');
            document.getElementById('startInput').hidden = (periode !== 'custom');
            document.getElementById('endInput').hidden = (periode !== 'custom');
        }
        document.addEventListener('DOMContentLoaded', toggleCustomDate);
    </script>
</x-layouts.app>
