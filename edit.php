<?php
require_once 'T4-week-10/database.php';
$pesan = '';

$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM barang where id = :id");
$stmt->execute([':id' => $id]);
$data = $stmt->fetch();

if (!$data) {
    header("Location: index_tugas4.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_barang = trim($_POST['nama_barang']?? '');
    $kategori = trim($_POST['kategori']?? '');
    $jumlah = trim($_POST['jumlah']?? '');
    $harga = trim($_POST['harga']?? '');
    $lokasi = trim($_POST['lokasi']?? '');

    if (!empty($nama_barang) && !empty($kategori) && !empty($jumlah) && !empty($harga) && !empty($lokasi) ) {
        $stmt = $pdo->prepare("UPDATE barang SET nama_barang = :nama barang, kategori = :produsen, jumlah = :jumlah, harga = :harga, lokasi = :lokasi WHERE id = :id");
        $stmt->execute([
            ':nama_barang' => $nama_barang,
            ':kategori' => $kategori,
            ':jumlah' => $kategori,
            ':harga' => $kategori,
            ':lokasi' => $kategori,
            ':id' => $id
        ]);
        header("Location: index_tugas4.php?pesan=edit_sukses");
        exit;
    } else {
        $pesan = "Semua field wajib diisi!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset=UTF-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Barang</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5" style="max-width: 600px;">
            <h2> Edit Barang</h2>

            <?php if ($pesan): ?>
                <div class="alert alert-danger"><?= $pesan ?></div>
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
                <button type="submit" class="btn btn-warning">Update</button>
                <a href="index_tugas4.php" class="btn btn-secondary"><- kembali</a>
            </form>

        </div>
    </body>
</html>
