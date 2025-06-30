<!DOCTYPE html>
<html>
<head>
    <title>Login Admin Rental Moge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 500px;">
    <h3 class="mb-4">Login Admin Rental Moge</h3>

    <?php if($errors->has('login')): ?>
        <div class="alert alert-danger">
            <?php echo e($errors->first('login')); ?>

        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(url('/login')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required autofocus>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
</body>
</html>
<?php /**PATH C:\Users\MyBook Z Series\rental_moge\resources\views/login.blade.php ENDPATH**/ ?>