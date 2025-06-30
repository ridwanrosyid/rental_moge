<!DOCTYPE html>
<html>
<head>
    <title>Tambah Motor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Tambah Motor</h2>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada kesalahan.<br><br>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

   <form action="<?php echo e(route('motor.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    
    <!-- Merk -->
    <div class="mb-3">
        <label>Merk</label>
        <input type="text" name="merk" class="form-control" required>
    </div>

    <!-- Tipe -->
    <div class="mb-3">
        <label>Tipe</label>
        <input type="text" name="tipe" class="form-control" required>
    </div>

    <!-- No Polisi -->
    <div class="mb-3">
        <label>No Polisi</label>
        <input type="text" name="no_polisi" class="form-control" required>
    </div>

    <!-- Harga Sewa -->
    <div class="mb-3">
        <label>Harga Sewa</label>
        <input type="number" name="harga_sewa" class="form-control" required>
    </div>

    <!-- Gambar Motor -->
    <div class="mb-3">
        <label>Gambar Motor</label>
        <input type="file" name="gambar" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?php echo e(route('motor.index')); ?>" class="btn btn-secondary">Kembali</a>
</form>

</div>
</body>
</html>
<?php /**PATH C:\Users\MyBook Z Series\rental_moge\resources\views/motor/create.blade.php ENDPATH**/ ?>