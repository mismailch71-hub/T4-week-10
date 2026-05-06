<?php
require_once 'T4-week-10/database.php';

$stmt = $pdo->query("SELECT * FROM barang ORDER BY id DESC");
$produk = $stmt->fetchAll();

$pesan = $_GET['pesan'] ?? '';
?>

<!DOCTYPE html>
<html lang= "id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Barang</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            <h2> Data Barang</h2>

            <?php if ($pesan === 'tambah_sukses'): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    Data berhasil ditambahkan!
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php elseif ($pesan === 'edit_sukses'): ?>
                <div class="alert alert-info">Data berhasil diupdate!</div>
            <?php elseif ($pesan === 'hapus_sukses'): ?>
                <div class="alert alert-warning">Data berhasil dihapus</div>
            <?php endif; ?>

            <a href="create_tugas4.php" class="btn btn-success mb-3">Tambah barang</a>

            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th width="60">No</th>
                        <th>nama barang</th>
                        <th>kategori</th>
                        <th>jumlah</th>
                        <th>harga</th>
                        <th>lokasi</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($produk) > 0): ?>
                        <?php $no = 1; ?>
                        <?php foreach ($produk as $row): ?>
                            <tr>
                                <td><?=  $no++ ?></td>
                                <td><?= htmlspecialchars($row['nama_barang']) ?></td>
                                <td><?= htmlspecialchars($row['kategori']) ?></td>
                                <td><?= htmlspecialchars($row['jumlah']) ?></td>
                                <td><?= htmlspecialchars($row['harga']) ?></td>
                                <td><?= htmlspecialchars($row['lokasi']) ?></td>
                                <td>
                                    <a href ="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="4" class="text-center">Belum ada data</td></tr>
                        <?php endif; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>