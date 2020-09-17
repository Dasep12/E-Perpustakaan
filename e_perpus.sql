/*
SQLyog Enterprise - MySQL GUI v8.05 
MySQL - 5.5.5-10.4.11-MariaDB : Database - e_perpus
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`e_perpus` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `e_perpus`;

/*Table structure for table `akun` */

DROP TABLE IF EXISTS `akun`;

CREATE TABLE `akun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `id_akun` varchar(255) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role_id` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `akun` */

insert  into `akun`(`id`,`nama`,`id_akun`,`photo`,`password`,`no_telp`,`email`,`role_id`) values (1,'Dasep','002','002tanggapan.png','123','083821691460','dasep@gmail.com',1);

/*Table structure for table `master_buku` */

DROP TABLE IF EXISTS `master_buku`;

CREATE TABLE `master_buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_buku` varchar(30) DEFAULT NULL,
  `judul_buku` varchar(255) DEFAULT NULL,
  `thn_terbit` varchar(30) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `jumlah` int(12) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4;

/*Data for the table `master_buku` */

insert  into `master_buku`(`id`,`kd_buku`,`judul_buku`,`thn_terbit`,`pengarang`,`lokasi`,`jumlah`,`genre`) values (37,'BK0090','Belajar Membaca','2020','Satudin S,Pd','Rak-01',0,'Edukasi'),(38,'BK005','Pandai Menghitung','2020','Brian S,Kom','RAK-02',3,'Edukasi');

/*Table structure for table `member` */

DROP TABLE IF EXISTS `member`;

CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `id_user` varchar(255) NOT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`,`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `member` */

insert  into `member`(`id`,`nama`,`id_user`,`no_telp`,`email`,`alamat`,`status`,`photo`) values (1,'Dasep Depiyawan','01','083821619460','dasepdepiyawan19@gmail.com','Jl Lodan Dalam Raya II c Jakarta Utara','Member','01Logo_STMIK1.png');

/*Table structure for table `peminjaman` */

DROP TABLE IF EXISTS `peminjaman`;

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul_buku` varchar(255) DEFAULT NULL,
  `kd_buku` varchar(255) DEFAULT NULL,
  `id_peminjam` varchar(220) DEFAULT NULL,
  `peminjam` varchar(255) DEFAULT NULL,
  `tgl_pinjam` varchar(255) DEFAULT NULL,
  `tgl_kembali` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `peminjaman` */

insert  into `peminjaman`(`id`,`judul_buku`,`kd_buku`,`id_peminjam`,`peminjam`,`tgl_pinjam`,`tgl_kembali`) values (6,'Pandai Menghitung','BK005','01','Dasep Depiyawan','2020-09-17','2020-09-19');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
