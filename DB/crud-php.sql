-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Agu 2023 pada 04.10
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud-php`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `username`, `email`, `password`, `level`) VALUES
(1, 'Yudha Ardiyansyah', 'Yudha1', 'yuda1@gmail.com', '$2y$10$pwDTXBTPyVN97pG/96rlzOSHQVrOUs7usu55BO7knIWDfHuHcOTNS', '1'),
(5, 'yuika', 'admin', 'yuika@yahoo.com', '$2y$10$iwrfAxhNYB71g9coKCe5EOnHmBbnzbpQjcz0kfRxkLXd61Bk9ZaWe', '1'),
(6, 'Operator Barang', 'opmbarang', 'opmbarang@gmail.com', '$2y$10$vMdW/AZxLL43IzaAneMDI.vnl8UlkMJIxU2hJaeA9cAsvA4pKNwwC', '2'),
(7, 'oprator mahasiswa', 'opmahaiswa', 'opmmahasiswa@gmail.com', '$2y$10$hJF1/8dveM2AIBAkuXWPJOv.XSeYVP.ipqXNro1a6Msvaah2iiiqW', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `barcode` varchar(15) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `jumlah`, `harga`, `barcode`, `tanggal`) VALUES
(16, 'Komputer Asus', '5', '10000000', '231251', '2023-08-12 09:41:36'),
(17, 'VGA CARD NVDIA', '10', '2500000', '653932', '2023-08-12 09:42:25'),
(18, 'Laptop Lenovo A', '22', '12000000', '243394', '2023-08-14 07:24:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama`, `prodi`, `jk`, `telepon`, `alamat`, `email`, `foto`) VALUES
(4, 'rizal', 'Teknik Infromatika', 'Laki-Laki', '098765432', '', 'rizal@gmail.com', '64d7314d8e617.jpg'),
(7, 'Yudha Ardiyansyah', 'Teknik Infromatika', 'Laki-Laki', '21321442124412412', '<p><em><strong>PARUNG</strong></em></p>', 'yuda@gmail.com', '64d1ec611a8c6.jpeg'),
(11, 'yuika', 'Komunikasi Visual', 'Perempuan', '22222223', '', 'yuika@yahoo.com', '64d31c286ab61.png'),
(13, 'sifa', 'Komunikasi Visual', 'Perempuan', '089123124123', 'Parung Bogor, Jawabarat, 163330', 'sifa@gmail.com', '64d75ac7e5553.jpg'),
(14, 'rizky Go', 'Teknik Mesin', 'Laki-Laki', '08312123123123', '<p><em>PARUNG BOGOR<strong>,Jawa Barat 14330</strong></em></p>', 'rizky@gmail.com', '64d75bedb5d79.png'),
(15, 'Dimas 1', 'Teknik Infromatika', 'Laki-Laki', '0812367123', 'Parung, Bogor', 'DImas1@gmail.com', '64da260e2715c.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
