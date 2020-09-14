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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `master_buku` */

insert  into `master_buku`(`id`,`kd_buku`,`judul_buku`,`thn_terbit`,`pengarang`,`lokasi`,`jumlah`,`genre`) values (1,'BK001','Pemrograman Web Dengan Javascript','2019','Dasep Depiyawan S.Kom M.Kom','Rak-02-04',10,'Web Programming'),(2,'BK002','Matematika Diskrit','2013','Ayu S,Kom','Rak-04',10,'Edukasi');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
