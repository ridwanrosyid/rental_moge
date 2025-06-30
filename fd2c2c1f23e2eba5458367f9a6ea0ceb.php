<!DOCTYPE html>
<html>
<head>
    <title>Ridwan Rosyid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1516116216624-53e697fedbea?auto=format&fit=crop&w=1350&q=80'); /* Ganti URL ini jika kamu ingin gambar lain */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background-color: rgba(255, 255, 255, 0.9); /* transparan putih */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h3 class="mb-4 text-center">Login Admin Rental Moge</h3>

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

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php /**PATH C:\laravel\rental_moge\resources\views/login.blade.php ENDPATH**/ ?>