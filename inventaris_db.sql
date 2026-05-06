CREATE DATABASE inventaris_db;
use inventaris_db;
CREATE TABLE barang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_barang VARCHAR(150) NOT NULL,
    kategori VARCHAR(100) NOT NULL,
    jumlah INT DEFAULT 0,
    harga DECIMAL(12,2) NOT NULL,
    lokasi VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);

INSERT INTO barang (nama_barang, kategori, jumlah, harga, lokasi) VALUES
('Laptop Asus', 'Elektronik', 10, 8500000, 'Gudang A'),
('Mouse Logitech', 'Aksesoris', 25, 150000, 'Gudang B'),
('Kursi Kantor', 'Furniture', 5, 1200000, 'Gudang C'),
('Printer Epson', 'Elektronik', 8, 2500000, 'Gudang A'),
('Buku Tulis', 'Alat Tulis', 50, 5000, 'Gudang D');
