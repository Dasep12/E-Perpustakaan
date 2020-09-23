-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Sep 2020 pada 06.39
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
(1, 'Dasep Depiyawan', '002', '002tanggapan.png', '123', '083821619460', 'dasepdepiyawan@gmail.com', 1),
(7, 'Pandji', '432532', '432532ppppp.png', 'user', '0216194600', 'sinta@gmail.com', 2),
(8, 'Administrator', '647512', '647512admin2.png', 'admin', '083821619460', 'admin@gmail.com', 1);

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
(25, 'EPERPUS20200923551277768544', 'Dasar Javascript Untuk Pemula', 'BK0011', '761589', 'Dasep Depiyawan', '2020-09-23', '2020-09-23', '2020-09-30', '11:11:50', NULL, '0', '0', '0'),
(26, 'EPERPUS20200923666953059892', 'Pandai Menghitung', 'BK005', '761589', 'Dasep Depiyawan', '2020-09-18', '2020-09-23', '2020-09-20', '11:26:54', NULL, '6000', '3', '5');

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
(43, 'EPERPUS20200923551277768544', 'Dasar Javascript Untuk Pemula', 'BK0011', '761589', 'Dasep Depiyawan', '2020-09-23', '2020-09-23', '2020-09-30', '11:11:50'),
(44, 'EPERPUS20200923666953059892', 'Pandai Menghitung', 'BK005', '761589', 'Dasep Depiyawan', '2020-09-18', '2020-09-23', '2020-09-20', '11:26:54');

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
(97, 'BK005', 'Pandai Menghitung', '2019', 'Saktiawan Sinaga', 'Rak-02', 6, 'Pendidikan'),
(98, 'BK007', 'Pemrograman Web', '2012', 'Rika S,Pd', 'Rak-07', 10, 'Edukasi'),
(99, 'BK0011', 'Dasar Javascript Untuk Pemula', '2016', 'Dasep Depiyawan S,Kom M.Kom', 'RAK-09', 10, 'Edukasi');

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
(5, 'Dasep Depiyawan', '761589', '083821619460', 'Dasepdepiyawan19@gmail.com', 'Jl Lodan Dalam II C Kp Japat Kota Administrator Jakarta Utara ', 'Member', '761589guru2.png');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `histori_kembali`
--
ALTER TABLE `histori_kembali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `histori_pinjam`
--
ALTER TABLE `histori_pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `master_buku`
--
ALTER TABLE `master_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
