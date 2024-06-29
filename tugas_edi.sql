-- --------------------------------------------------------
-- Host:                         localhost
-- Versi server:                 8.0.31 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk tugas_edi
CREATE DATABASE IF NOT EXISTS `tugas_edi` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `tugas_edi`;

-- membuang struktur untuk table tugas_edi.biodata_pelamar
CREATE TABLE IF NOT EXISTS `biodata_pelamar` (
  `id_biodata` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi_yang_dilamar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ktp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan_darah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_ktp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_tinggal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orang_terdekat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penempatan_karyawan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penghasilan_yang_diharapkan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_biodata`),
  KEY `biodata_pelamar_id_foreign` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel tugas_edi.biodata_pelamar: 3 rows
/*!40000 ALTER TABLE `biodata_pelamar` DISABLE KEYS */;
INSERT INTO `biodata_pelamar` (`id_biodata`, `id`, `posisi_yang_dilamar`, `nama`, `no_ktp`, `ttl`, `jenis_kelamin`, `agama`, `golongan_darah`, `status`, `alamat_ktp`, `alamat_tinggal`, `email`, `no_telepon`, `orang_terdekat`, `skill`, `penempatan_karyawan`, `penghasilan_yang_diharapkan`, `created_at`, `updated_at`) VALUES
	('BP00001', '2', 'Et delectus nisi ve', 'Ut sint esse dolor', 'Autem deserunt aliqu', 'Ut qui reprehenderit', 'Pilih Jenis Kelamin', 'Ut proident sunt l', 'Non aut accusantium', 'Qui veniam laborum', 'Excepturi non id dol', 'Assumenda modi eaque', 'qupi@mailinator.com', 'Tenetur irure aliqua', 'Vel explicabo Molli', 'Consequatur Labore', 'tidak', 'Qui deserunt eu null', '2024-06-29 03:14:29', '2024-06-29 03:14:29'),
	('BP00003', '2', 'Qui qui harum quam r', 'Veritatis fuga Porr', 'Et eligendi doloremq', 'Nam ut voluptas cupi', 'perempuan', 'Sit aliquam recusand', 'Labore autem id ab c', 'Qui sit rem aute Nam', 'Voluptate qui offici', 'Enim non sunt cumque', 'zycat@mailinator.com', 'Officia atque et nos', 'Explicabo Natus ut', 'Fugit qui irure ill', 'tidak', 'Sint inventore magna', '2024-06-29 03:16:19', '2024-06-29 13:59:25');
/*!40000 ALTER TABLE `biodata_pelamar` ENABLE KEYS */;

-- membuang struktur untuk table tugas_edi.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel tugas_edi.failed_jobs: 0 rows
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- membuang struktur untuk table tugas_edi.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel tugas_edi.migrations: 0 rows
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_02_18_051905_add_new_fields_to_users_table', 1),
	(6, '2024_06_29_041515_create_biodata_pelamar_table', 1),
	(7, '2024_06_29_041603_create_pendidikan_pelamar_table', 1),
	(8, '2024_06_29_041644_create_riwayat_pelatihan_pelamar_table', 1),
	(9, '2024_06_29_041710_create_riwayat_pekerjaan_pelamar_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- membuang struktur untuk table tugas_edi.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel tugas_edi.password_resets: 0 rows
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- membuang struktur untuk table tugas_edi.pendidikan_pelamar
CREATE TABLE IF NOT EXISTS `pendidikan_pelamar` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_biodata` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenjang_pendidikan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_instusi_akademik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_lulus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ipk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pendidikan_pelamar_id_biodata_foreign` (`id_biodata`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel tugas_edi.pendidikan_pelamar: 5 rows
/*!40000 ALTER TABLE `pendidikan_pelamar` DISABLE KEYS */;
INSERT INTO `pendidikan_pelamar` (`id`, `id_biodata`, `jenjang_pendidikan`, `nama_instusi_akademik`, `jurusan`, `tahun_lulus`, `ipk`, `created_at`, `updated_at`) VALUES
	(2, 'BP00001', 'Ex eu nesciunt temp', 'Necessitatibus omnis', 'Dolorum fugiat qui', 'Quis delectus totam', 'Similique ut repelle', '2024-06-29 03:14:29', '2024-06-29 03:14:29'),
	(3, 'BP00002', 'Eum accusamus est et', 'Fugiat eaque aliqui', 'Nobis repellendus A', 'Nisi laborum In ips', 'Ad in officia saepe', '2024-06-29 03:15:08', '2024-06-29 03:15:08'),
	(4, 'BP00003', 'Sit distinctio Har', 'Et eum numquam vitae', 'Enim eius pariatur', 'Cum dolorem dolore c', 'Perferendis sit sin', '2024-06-29 03:16:19', '2024-06-29 13:59:25'),
	(5, 'BP00004', 'Similique sunt volup', 'Magna molestiae cons', 'Inventore dolores id', 'Quis magna explicabo', 'Repellendus Maxime', '2024-06-29 03:21:34', '2024-06-29 03:21:34'),
	(6, 'BP00003', 'Amet minus nihil es', 'Laborum Laborum sim', 'Anim optio velit do', 'Aut doloremque ad si', 'Nihil voluptatem no', '2024-06-29 13:59:14', '2024-06-29 13:59:25');
/*!40000 ALTER TABLE `pendidikan_pelamar` ENABLE KEYS */;

-- membuang struktur untuk table tugas_edi.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel tugas_edi.personal_access_tokens: 0 rows
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- membuang struktur untuk table tugas_edi.riwayat_pekerjaan_pelamar
CREATE TABLE IF NOT EXISTS `riwayat_pekerjaan_pelamar` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_biodata` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_perusahaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi_terakhir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendapatan_terakhir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `riwayat_pekerjaan_pelamar_id_biodata_foreign` (`id_biodata`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel tugas_edi.riwayat_pekerjaan_pelamar: 5 rows
/*!40000 ALTER TABLE `riwayat_pekerjaan_pelamar` DISABLE KEYS */;
INSERT INTO `riwayat_pekerjaan_pelamar` (`id`, `id_biodata`, `nama_perusahaan`, `posisi_terakhir`, `pendapatan_terakhir`, `tahun`, `created_at`, `updated_at`) VALUES
	(1, 'BP00001', 'Ad impedit laudanti', 'Animi et ab necessi', 'Sit iste aspernatur', 'Unde at debitis nost', '2024-06-29 03:14:29', '2024-06-29 03:14:29'),
	(2, 'BP00002', 'Velit dolorum libero', 'Sed est sed voluptas', 'Qui consectetur elig', 'Incididunt consequat', '2024-06-29 03:15:08', '2024-06-29 03:15:08'),
	(3, 'BP00002', 'Doloribus ratione pr', 'Temporibus aut qui d', 'Itaque sit beatae v', 'Dolorem molestiae ab', '2024-06-29 03:15:08', '2024-06-29 03:15:08'),
	(4, 'BP00003', 'Sit nesciunt est', 'Sit nesciunt est', 'Sit nesciunt est', 'Quidem corrupti asp', '2024-06-29 03:16:19', '2024-06-29 14:00:01'),
	(5, 'BP00004', 'Voluptates voluptate', 'Occaecat aute aut ne', 'In explicabo Conseq', 'Exercitationem dolor', '2024-06-29 03:21:34', '2024-06-29 03:21:34');
/*!40000 ALTER TABLE `riwayat_pekerjaan_pelamar` ENABLE KEYS */;

-- membuang struktur untuk table tugas_edi.riwayat_pelatihan_pelamar
CREATE TABLE IF NOT EXISTS `riwayat_pelatihan_pelamar` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_biodata` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kursus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sertifikat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `riwayat_pelatihan_pelamar_id_biodata_foreign` (`id_biodata`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel tugas_edi.riwayat_pelatihan_pelamar: 4 rows
/*!40000 ALTER TABLE `riwayat_pelatihan_pelamar` DISABLE KEYS */;
INSERT INTO `riwayat_pelatihan_pelamar` (`id`, `id_biodata`, `nama_kursus`, `sertifikat`, `tahun`, `created_at`, `updated_at`) VALUES
	(1, 'BP00001', 'Est quo ullam iure', 'tidak', 'Qui sunt ad delectu', '2024-06-29 03:14:29', '2024-06-29 03:14:29'),
	(2, 'BP00002', 'Aut tempore non ist', 'tidak', 'Nihil et in dolorem', '2024-06-29 03:15:08', '2024-06-29 03:15:08'),
	(3, 'BP00003', 'Autem dolor alias su', 'ada', 'Praesentium ex magna', '2024-06-29 03:16:19', '2024-06-29 13:59:25'),
	(5, 'BP00003', 'Fugit repudiandae i', 'tidak', 'Magni sint quas qui', '2024-06-29 13:59:25', '2024-06-29 14:00:01');
/*!40000 ALTER TABLE `riwayat_pelatihan_pelamar` ENABLE KEYS */;

-- membuang struktur untuk table tugas_edi.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('User','Admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel tugas_edi.users: 0 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `type`) VALUES
	(1, NULL, 'admin@gmail.com', NULL, '$2y$10$LiIubdkkmUBdS2.9ASuS5e/m61azEnC4i3WLG.QfeA4GcyLtTS.fa', NULL, '2024-06-28 21:56:54', '2024-06-28 21:56:54', 'Admin'),
	(2, NULL, 'user@gmail.com', NULL, '$2y$10$V67fNTtYC/YglkqYlpzDDOV6Bqp7YdX/eAGobLWSTDxcWfs.FLply', NULL, '2024-06-28 22:38:29', '2024-06-28 22:38:29', 'User');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
