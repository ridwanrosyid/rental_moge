<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #121212; /* Dark background */
            color: #f0f0f0; /* Light text */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h2 {
            font-weight: bold;
            color: #e94560; /* Aesthetic red */
            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(255, 255, 255, 0.1);
        }

        .text-bg-primary    { background-color: #1e1e2f !important; color: #f0f0f0; }
        .text-bg-success    { background-color: #2e2f2e !important; color: #afffaf; }
        .text-bg-danger     { background-color: #3a1f1f !important; color: #ffb3b3; }
        .text-bg-warning    { background-color: #332f1f !important; color: #ffdf91; }
        .text-bg-info       { background-color: #1f2f3f !important; color: #aeeaff; }
        .text-bg-secondary  { background-color: #2b2b2b !important; color: #dcdcdc; }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 2rem;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Dashboard Admin</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Motor</h5>
                    <p class="card-text"><?php echo e($totalMotor); ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Motor Tersedia</h5>
                    <p class="card-text"><?php echo e($motorTersedia); ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Motor Dipinjam</h5>
                    <p class="card-text"><?php echo e($motorDipinjam); ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card text-bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Transaksi</h5>
                    <p class="card-text"><?php echo e($totalTransaksi); ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Berlangsung</h5>
                    <p class="card-text"><?php echo e($transaksiBerlangsung); ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-bg-secondary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Selesai</h5>
                    <p class="card-text"><?php echo e($transaksiSelesai); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php /**PATH C:\Users\MyBook Z Series\rental_moge\resources\views/dashboard.blade.php ENDPATH**/ ?>