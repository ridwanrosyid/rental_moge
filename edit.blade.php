<!DOCTYPE html>
<html>
<head>
    <title>Edit Motor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Edit Motor</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada kesalahan.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('motor.update', $motor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Merk</label>
            <input type="text" name="merk" class="form-control" value="{{ $motor->merk }}" required>
        </div>

        <div class="mb-3">
            <label>Tipe</label>
            <input type="text" name="tipe" class="form-control" value="{{ $motor->tipe }}" required>
        </div>

        <div class="mb-3">
            <label>No Polisi</label>
            <input type="text" name="no_polisi" class="form-control" value="{{ $motor->no_polisi }}" required>
        </div>

        <div class="mb-3">
            <label>Harga Sewa</label>
            <input type="number" name="harga_sewa" class="form-control" value="{{ $motor->harga_sewa }}" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="tersedia" {{ $motor->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="dipinjam" {{ $motor->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Gambar Motor</label><br>
            @if ($motor->gambar)
                <img src="{{ asset('storage/' . $motor->gambar) }}" width="150" class="mb-2"><br>
            @endif
            <input type="file" name="gambar" class="form-control">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('motor.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
