<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <style>
        body { font-family: sans-serif; max-width: 500px; margin: 2rem auto; padding: 1rem; }
        .form-group { margin-bottom: 1rem; }
        label { display: block; margin-bottom: .5rem; font-weight: bold; }
        input { width: 100%; padding: 8px; box-sizing: border-box; }
        button { background: #28a745; color: white; padding: 10px 15px; border: none; cursor: pointer; }
        button:hover { background: #218838; }
        .alert { padding: 10px; margin-bottom: 15px; border-radius: 4px; }
        .error { background: #f8d7da; color: #721c24; }
        .success { background: #d4edda; color: #155724; }
    </style>
</head>
<body>

    <h2>Form Registrasi Sederhana</h2>

    <?php if (isset($_GET['status']) && $_GET['status'] == 'sukses'): ?>
        <div class="alert success">Data berhasil dikirim!</div>
    <?php elseif (isset($_GET['error'])): ?>
        <div class="alert error"><?php echo htmlspecialchars($_GET['error']); ?></div>
    <?php endif; ?>

    <form action="proses.php" method="POST">
        <div class="form-group">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda">
        </div>

        <div class="form-group">
            <label for="email">Email (Wajib Gmail):</label>
            <input type="email" id="email" name="email" placeholder="nama@gmail.com">
        </div>

        <div class="form-group">
            <label for="usia">Usia (Min 17 tahun):</label>
            <input type="number" id="usia" name="usia" placeholder="Contoh: 20">
        </div>

        <button type="submit">Kirim Data</button>
    </form>
    
    <p><small>Atau cek <a href="api.php">API Data User</a></small></p>

</body>
</html>