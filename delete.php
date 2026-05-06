<?php
require_once 'T4-week-10/database.php';

$id = $_GET['id'] ?? 0;

if ($id) {
    $stmt = $pdo->prepare("DELETE FROM barang WHERE id = :id");
    $stmt->execute([':id' => $id]);
}

header("Location: index_tugas4.php?pesan=hapus_sukses");
exit;
?>