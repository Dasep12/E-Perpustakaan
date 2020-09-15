-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Sep 2020 pada 13.30
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `id_akun` varchar(255) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role_id` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `nama`, `id_akun`, `photo`, `password`, `no_telp`, `email`, `role_id`) VALUES
(1, 'Dasep', '002', '002tanggapan.png', '123', '083821691460', 'dasep@gmail.com', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_buku`
--

CREATE TABLE `master_buku` (
  `id` int(11) NOT NULL,
  `kd_buku` varchar(30) DEFAULT NULL,
  `judul_buku` varchar(255) DEFAULT NULL,
  `thn_terbit` varchar(30) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `jumlah` int(12) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_buku`
--

INSERT INTO `master_buku` (`id`, `kd_buku`, `judul_buku`, `thn_terbit`, `pengarang`, `lokasi`, `jumlah`, `genre`) VALUES
(37, 'BK0090', 'Belajar Membaca', '2020', 'Satudin S,Pd', 'Rak-01', 3, 'Edukasi'),
(38, 'BK005', 'Pandai Menghitung', '2020', 'Brian S,Kom', 'RAK-02', 5, 'Edukasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `id_user` varchar(255) NOT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id`, `nama`, `id_user`, `no_telp`, `email`, `alamat`, `status`, `photo`) VALUES
(1, 'Dasep Depiyawan', '01', '083821619460', 'dasepdepiyawan19@gmail.com', 'Jl Lodan Dalam Raya II c Jakarta Utara', 'Member', '01Logo_STMIK1.png'),
(4, 'Pandji', '08545', '0831381', 'febriit@gmail.com', 'd', 'Member', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_buku`
--
ALTER TABLE `master_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`,`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `master_buku`
--
ALTER TABLE `master_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
