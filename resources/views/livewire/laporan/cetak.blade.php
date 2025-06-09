<!DOCTYPE html>
<html>
<head>
    <title>Laporan Keuangan Why Coffee</title>
    <style>
        body { font-family: sans-serif; }
        .judul { font-size: 20px; font-weight: bold; margin-bottom: 20px; }
        .box { margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #aaa; padding: 6px; text-align: left; }
        th { background: #eee; }
        .row-total { background: #f3f3f3; font-weight: bold; }
        .row-date { background: #e0e7ff; font-weight: bold; }
    </style>
</head>
<body>
    <div class="judul">Laporan Keuangan Why Coffee ({{ ucfirst($periode) }})</div>
    <div class="box">Tanggal: {{ $tanggal }}</div>

    {{-- PENJUALAN --}}
    <div class="box"><b>Pemasukan: Rp{{ number_format($totalPemasukan,0,',','.') }}</b></div>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Menu (Kopi)</th>
                <th>Jumlah Terjual</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @php
                $grandTotal = 0;
            @endphp
            @forelse($detailPenjualan as $tgl => $transaksiList)
                @php
                    $groupedPenjualan = [];
                    $totalHari = 0;
                    foreach($transaksiList as $jual) {
                        $nama = $jual->menu->nama ?? '-';
                        if (!isset($groupedPenjualan[$nama])) {
                            $groupedPenjualan[$nama] = [
                                'jumlah_terjual' => 0,
                                'total_harga' => 0
                            ];
                        }
                        $groupedPenjualan[$nama]['jumlah_terjual'] += $jual->jumlah_terjual;
                        $groupedPenjualan[$nama]['total_harga'] += $jual->total_harga;
                        $totalHari += $jual->total_harga;
                        $grandTotal += $jual->total_harga;
                    }
                @endphp
                @foreach($groupedPenjualan as $nama => $data)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($tgl)->format('d M Y') }}</td>
                        <td>{{ $nama }}</td>
                        <td>{{ $data['jumlah_terjual'] }}</td>
                        <td>Rp{{ number_format($data['total_harga'],0,',','.') }}</td>
                    </tr>
                @endforeach
                <tr class="row-total">
                    <td colspan="3" align="right">Total Hari Ini</td>
                    <td>Rp{{ number_format($totalHari,0,',','.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data penjualan</td>
                </tr>
            @endforelse
            <tr class="row-total">
                <td colspan="3" align="right">Total Keseluruhan</td>
                <td>Rp{{ number_format($grandTotal,0,',','.') }}</td>
            </tr>
        </tbody>
    </table>

    {{-- PENGELUARAN --}}
    <div class="box"><b>Pengeluaran: Rp{{ number_format($totalPengeluaran,0,',','.') }}</b></div>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Bahan Baku / Keterangan</th>
                <th>Jumlah</th>
                <th>Total Biaya</th>
            </tr>
        </thead>
        <tbody>
            @php
                $grandTotalKeluar = 0;
            @endphp
            @forelse($detailPengeluaran as $tgl => $keluarList)
                @php
                    $groupedPengeluaran = [];
                    $totalKeluarHari = 0;
                    foreach($keluarList as $keluar) {
                        $nama = $keluar->tipe === 'bahan_baku'
                            ? ($keluar->bahanBaku->nama ?? '-')
                            : ($keluar->catatan ?? 'Operasional');
                        if (!isset($groupedPengeluaran[$nama])) {
                            $groupedPengeluaran[$nama] = [
                                'jumlah' => 0,
                                'total_biaya' => 0,
                                'tipe' => $keluar->tipe
                            ];
                        }
                        if ($keluar->tipe === 'bahan_baku') {
                            $groupedPengeluaran[$nama]['jumlah'] += $keluar->jumlah;
                        }
                        $groupedPengeluaran[$nama]['total_biaya'] += $keluar->total_biaya;
                        $totalKeluarHari += $keluar->total_biaya;
                        $grandTotalKeluar += $keluar->total_biaya;
                    }
                @endphp
                @foreach($groupedPengeluaran as $nama => $data)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($tgl)->format('d M Y') }}</td>
                        <td>{{ $nama }}</td>
                        <td>
                            @if($data['tipe'] === 'bahan_baku')
                                {{ $data['jumlah'] }}
                            @else
                                -
                            @endif
                        </td>
                        <td>Rp{{ number_format($data['total_biaya'],0,',','.') }}</td>
                    </tr>
                @endforeach
                <tr class="row-total">
                    <td colspan="3" align="right">Total Hari Ini</td>
                    <td>Rp{{ number_format($totalKeluarHari,0,',','.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data pengeluaran</td>
                </tr>
            @endforelse
            <tr class="row-total">
                <td colspan="3" align="right">Total Keseluruhan</td>
                <td>Rp{{ number_format($grandTotalKeluar,0,',','.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="box"><b>Keuntungan: Rp{{ number_format($keuntungan,0,',','.') }}</b></div>
</body>
</html>
