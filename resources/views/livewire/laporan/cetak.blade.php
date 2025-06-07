<!DOCTYPE html>
<html>
<head>
    <title>Laporan Keuangan WH</title>
    <style>
        body { font-family: sans-serif; }
        .judul { font-size: 20px; font-weight: bold; margin-bottom: 20px; }
        .box { margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #aaa; padding: 6px; text-align: left; }
        th { background: #eee; }
    </style>
</head>
<body>
    <div class="judul">Laporan Keuangan Why Coffee ({{ ucfirst($periode) }})</div>
    <div class="box">Tanggal: {{ $tanggal }}</div>

    <div class="box"><b>Pemasukan: Rp{{ number_format($totalPemasukan,0,',','.') }}</b></div>
    <table>
        <thead>
            <tr>
                <th>Menu (Kopi)</th>
                <th>Jumlah Terjual</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detailPenjualan as $jual)
                <tr>
                    <td>{{ $jual->menu->nama ?? '-' }}</td>
                    <td>{{ $jual->jumlah_terjual }}</td>
                    <td>Rp{{ number_format($jual->total_harga,0,',','.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="box"><b>Pengeluaran: Rp{{ number_format($totalPengeluaran,0,',','.') }}</b></div>
    <table>
        <thead>
            <tr>
                <th>Bahan Baku</th>
                <th>Jumlah</th>
                <th>Total Biaya</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detailPengeluaran as $keluar)
                <tr>
                    <td>{{ $keluar->bahanBaku->nama ?? '-' }}</td>
                    <td>{{ $keluar->jumlah }}</td>
                    <td>Rp{{ number_format($keluar->total_biaya,0,',','.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="box"><b>Keuntungan: Rp{{ number_format($keuntungan,0,',','.') }}</b></div>
</body>
</html>
