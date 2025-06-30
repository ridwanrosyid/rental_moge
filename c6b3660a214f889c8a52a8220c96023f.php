<!DOCTYPE html>
<html>
<head>
    <title>Data Motor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Data Motor</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <a href="<?php echo e(route('motor.create')); ?>" class="btn btn-primary mb-3">+ Tambah Motor</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Merk</th>
                <th>Tipe</th>
                <th>No Polisi</th>
                <th>Harga Sewa</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $motors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($motor->merk); ?></td>
                <td><?php echo e($motor->tipe); ?></td>
                <td><?php echo e($motor->no_polisi); ?></td>
                <td>Rp <?php echo e(number_format($motor->harga_sewa, 0, ',', '.')); ?></td>
                <td><?php echo e($motor->status); ?></td>
                <td>
                    <a href="<?php echo e(route('motor.edit', $motor->id)); ?>" class="btn btn-sm btn-warning">Edit</a>

                    <form action="<?php echo e(route('motor.destroy', $motor->id)); ?>" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
</body>
</html>
<?php /**PATH C:\Users\MyBook Z Series\rental_moge\resources\views/motor/index.blade.php ENDPATH**/ ?>