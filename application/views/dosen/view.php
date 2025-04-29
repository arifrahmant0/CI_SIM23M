<!-- application/views/dosen/view.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Dosen</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>"> <!-- Ganti dengan path CSS Anda -->
</head>

<body>
    <div class="container">
        <h1>Detail Dosen</h1>
        <p><strong>NIDN:</strong> <?= htmlspecialchars($dosen['id']); ?></p>
        <p><strong>Nama:</strong> <?= htmlspecialchars($dosen['nama']); ?></p>
        <p><strong>Alamat:</strong> <?= htmlspecialchars($dosen['alamat']); ?></p>
        <p><strong>Jenis Kelamin:</strong> <?= htmlspecialchars($dosen['jenis_kelamin']); ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($dosen['email']); ?></p>
        <p><strong>Telepon:</strong> <?= htmlspecialchars($dosen['telp']); ?></p>
        <a href="<?= base_url('dosen'); ?>" class="btn btn-primary">Kembali</a>
    </div>
</body>

</html>