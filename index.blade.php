<!DOCTYPE html>
<html>
<head>
    <title>Data Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Data Transaksi</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">+ Tambah Transaksi</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Penyewa</th>
                <th>Motor</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Total Biaya</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksis as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_penyewa }}</td>
                <td>{{ $item->motor->merk }} - {{ $item->motor->no_polisi }}</td>
                <td>{{ $item->tanggal_pinjam }}</td>
                <td>{{ $item->tanggal_kembali }}</td>
                <td>Rp {{ number_format($item->total_biaya, 0, ',', '.') }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus transaksi?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                    @if ($item->status == 'berlangsung')
                    <form action="{{ route('transaksi.update', $item->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="selesai">
                        <button class="btn btn-sm btn-success">Selesai</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
