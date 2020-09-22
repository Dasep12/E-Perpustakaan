-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Sep 2020 pada 14.23
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
(1, 'Dasep Depiyawan', '002', '002admin2.png', '123', '083821619460', 'dasepdepiyawan@gmail.com', 1),
(2, 'Petugas', '003', '003admin2.png', '123', '0216194600', 'petugas@gmail.com', 2),
(6, 'AFAN WIJAYA ', '226810', '226810satudin.png', '123', '0216194600121', 'afan@gmail.com', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori_kembali`
--

CREATE TABLE `histori_kembali` (
  `id` int(11) NOT NULL,
  `id_peminjaman` varchar(255) DEFAULT NULL,
  `judul_buku` varchar(255) DEFAULT NULL,
  `kd_buku` varchar(255) DEFAULT NULL,
  `id_peminjam` varchar(255) DEFAULT NULL,
  `peminjam` varchar(150) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_dikembalikan` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `jam_kembali` varchar(25) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `denda` varchar(255) DEFAULT NULL,
  `telat_pengembalian` varchar(255) DEFAULT NULL,
  `total_lama_pinjam` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `histori_kembali`
--

INSERT INTO `histori_kembali` (`id`, `id_peminjaman`, `judul_buku`, `kd_buku`, `id_peminjam`, `peminjam`, `tgl_pinjam`, `tgl_dikembalikan`, `tgl_kembali`, `jam_kembali`, `status`, `denda`, `telat_pengembalian`, `total_lama_pinjam`) VALUES
(22, 'EPERPUS20200921658840468635', 'Pandai Menghitung', 'BK005', '01', 'Dasep Depiyawan', '2020-09-16', '2020-09-21', '2020-09-19', '09:14:47', NULL, '4000', '2', '5'),
(23, 'EPERPUS20200921546530546279', 'Pandai Menghitung', 'BK005', '01', 'Dasep Depiyawan', '2020-09-18', '2020-09-21', '2020-09-30', '09:45:19', NULL, '0', '0', '3'),
(24, 'EPERPUS20200922624878749416', 'Pandai Menghitung', 'BK005', '01', 'Dasep Depiyawan', '2020-09-22', '2020-09-22', '2020-09-30', '17:44:25', NULL, '0', '0', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori_pinjam`
--

CREATE TABLE `histori_pinjam` (
  `id` int(11) NOT NULL,
  `id_peminjaman` varchar(255) DEFAULT NULL,
  `judul_buku` varchar(200) DEFAULT NULL,
  `kd_buku` varchar(200) DEFAULT NULL,
  `id_peminjam` varchar(200) DEFAULT NULL,
  `peminjam` varchar(200) DEFAULT NULL,
  `tgl_pinjam` varchar(200) DEFAULT NULL,
  `tgl_dikembalikan` varchar(200) DEFAULT NULL,
  `tgl_kembali` varchar(200) DEFAULT NULL,
  `jam_kembali` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `histori_pinjam`
--

INSERT INTO `histori_pinjam` (`id`, `id_peminjaman`, `judul_buku`, `kd_buku`, `id_peminjam`, `peminjam`, `tgl_pinjam`, `tgl_dikembalikan`, `tgl_kembali`, `jam_kembali`) VALUES
(40, 'EPERPUS20200921658840468635', 'Pandai Menghitung', 'BK005', '01', 'Dasep Depiyawan', '2020-09-16', '2020-09-21', '2020-09-19', '09:14:47'),
(41, 'EPERPUS20200921546530546279', 'Pandai Menghitung', 'BK005', '01', 'Dasep Depiyawan', '2020-09-18', '2020-09-21', '2020-09-30', '09:45:19'),
(42, 'EPERPUS20200922624878749416', 'Pandai Menghitung', 'BK005', '01', 'Dasep Depiyawan', '2020-09-22', '2020-09-22', '2020-09-30', '17:44:25');

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
(37, 'BK0090', 'Belajar Membaca', '2020', 'Satudin S,Pd', 'Rak-01', 0, 'Edukasi'),
(38, 'BK005', 'Pandai Menghitung', '2020', 'Brian S,Kom', 'RAK-02', 5, 'Edukasi'),
(95, 'BK007', 'Pemrograman Web', '2012', 'Rika S,Pd', 'Rak-07', 10, 'Edukasi'),
(96, 'BK0011', 'Dasar Javascript', '2016', 'Dasep Depiyawan S,Kom', 'RAK-09', 5, 'Edukasi');

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
(1, 'Dasep Depiyawan', '01', '083821619460', 'dasepdepiyawan19@gmail.com', 'Jl Lodan Dalam Raya II c Jakarta Utara', 'Member', '01siswa.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `id_peminjaman` varchar(255) DEFAULT NULL,
  `judul_buku` varchar(255) DEFAULT NULL,
  `kd_buku` varchar(255) DEFAULT NULL,
  `id_peminjam` varchar(220) DEFAULT NULL,
  `peminjam` varchar(255) DEFAULT NULL,
  `tgl_pinjam` varchar(255) DEFAULT NULL,
  `tgl_kembali` varchar(255) DEFAULT NULL,
  `perpanjangan` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `histori_kembali`
--
ALTER TABLE `histori_kembali`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `histori_pinjam`
--
ALTER TABLE `histori_pinjam`
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
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `histori_kembali`
--
ALTER TABLE `histori_kembali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `histori_pinjam`
--
ALTER TABLE `histori_pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `master_buku`
--
ALTER TABLE `master_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
