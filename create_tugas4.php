<?php
require_once 'T4-week-10/database.php';
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_barang = trim($_POST['nama_barang']?? '');
    $kategori = trim($_POST['kategori']?? '');
    $jumlah = trim($_POST['jumlah']?? '');
    $harga = trim($_POST['harga']?? '');
    $lokasi = trim($_POST['lokasi']?? '');

    if (!empty($nama_barang) && !empty($kategori) && !empty($jumlah) && !empty($harga) && !empty($lokasi) ) {
        $stmt = $pdo->prepare("INSERT INTO barang (nama_barang, kategori, jumlah, harga, lokasi) values (:nama_barang, :kategori, :jumlah, :harga, :lokasi)");
        $stmt->execute([
            ':nama_barang' => $nama_barang,
            ':kategori' => $kategori,
            ':jumlah' => $kategori,
            ':harga' => $kategori,
            ':lokasi' => $kategori,
        ]);
        header("Location: index_tugas4.php?pesan=tambah_sukes");
        exit;
    } else {
        $pesan = "Semua field wajib diidi!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>    
<body>
<div class="container mt-5" style="max-width: 600px;">
    <h2> Tambah Barang Baru</h2>

    <?php if ($pesan): ?>
        <div class="alert alert-danger"><?=  $pesan ?></div>
    <?php endif; ?>
    
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">nama_barang</label>
            <input type="text" name="nama_barang" class="from-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">kategori</label>
            <input type="text" name="kategori" class="form-control" required>
        </div>
         <div class="mb-3">
            <label class="form-label">jumlah</label>
            <input type="text" name="jumlah" class="form-control" required>
        </div>
         <div class="mb-3">
            <label class="form-label">harga</label>
            <input type="text" name="harga" class="form-control" required>
        </div>
         <div class="mb-3">
            <label class="form-label">lokasi</label>
            <input type="text" name="lokasi" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-succes">Simpan</button>
        <a href="index.php" class=btn btn-secondary><- Kembali</a>
    </form>
</div>
</body>
</html>
