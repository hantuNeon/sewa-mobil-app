/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.27-MariaDB : Database - sewa_mobil
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sewa_mobil` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `sewa_mobil`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2022_12_28_044818_create_mobils_table',2),
(6,'2023_01_16_035242_create_pesans_table',3);

/*Table structure for table `mobil` */

DROP TABLE IF EXISTS `mobil`;

CREATE TABLE `mobil` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_mobil` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `gambar` text NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `bahan_bakar` varchar(255) NOT NULL,
  `jumlah_kursi` varchar(255) NOT NULL,
  `transmisi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `p3k` tinyint(1) NOT NULL,
  `charger` tinyint(1) NOT NULL,
  `audio` tinyint(1) NOT NULL,
  `ac` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `mobil` */

insert  into `mobil`(`id`,`nama_mobil`,`slug`,`gambar`,`harga_sewa`,`bahan_bakar`,`jumlah_kursi`,`transmisi`,`status`,`deskripsi`,`p3k`,`charger`,`audio`,`ac`,`created_at`,`updated_at`) values 
(8,'Avanza','avanza','asset/car/iudKWM8KVFeNMEyPFqC1wel9RqRPTGFLAYP8St76.jpg',300000,'Pertalite','8','otomatis','tersedia','Kendaraan ini berfungsi dengan baik dan menggunakan transmisi otomastis hanya saja untuk perlengkapan P3K tidak di sediakan',0,1,1,1,'2023-01-16 16:03:00','2023-01-16 17:35:21'),
(9,'Fortuner','fortuner','asset/car/0eGmVb9QUDNb3y5OkIefbeiwhFuo9me4xWmVA64X.jpg',500000,'Pertamax','5','manual','tidak tersedia','Mohon maaf untuk kendaraan ini skarang sedang tidak tersedia karena sedang mengalami perbaikan pada AC.',1,1,1,0,'2023-01-16 16:04:18','2023-01-16 17:29:41'),
(10,'Pajero','pajero','asset/car/ctCSKG4SsbiQR7BTqbDBb1wlndFR7Ztx54e06IVk.jpg',700000,'Pertamax','5','otomatis','tersedia','Kendaraan ini memiliki berfungsi dengan baik dan dilengkapi dengan semua perlengkapan mobil serta menggunakan transmisi otomatis',1,1,1,1,'2023-01-16 16:06:04','2023-01-16 17:33:55');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `pesan` */

DROP TABLE IF EXISTS `pesan`;

CREATE TABLE `pesan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pesan` */

insert  into `pesan`(`id`,`nama`,`email`,`subjek`,`isi`,`created_at`,`updated_at`) values 
(2,'Guntur','guntur@runtug.com','anjay','an\'yay sle\'ew','2023-01-16 15:21:24','2023-01-16 15:21:24'),
(3,'joko','joko@kojo.com','pesan','kamu nanya','2023-01-16 15:27:49','2023-01-16 15:27:49');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`is_admin`,`remember_token`,`created_at`,`updated_at`) values 
(1,'admin','admin@example.com',NULL,'$2y$10$SRfYPO53EDGcKR0.MYBLS.BZIKmdmYa7y2R5BzfAppS3P5l.yVWAi',1,NULL,'2022-12-14 15:11:44','2022-12-14 15:11:44');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
