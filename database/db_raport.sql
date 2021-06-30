-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2021 pada 12.29
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_raport`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `sakit` int(11) NOT NULL,
  `izin` int(11) NOT NULL,
  `alpha` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_nilai_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id`, `siswa_id`, `sakit`, `izin`, `alpha`, `created_at`, `updated_at`, `semester`, `jenis_nilai_id`, `tanggal`) VALUES
(16, 12, 0, 1, 0, '2021-06-30 06:27:12', '2021-06-30 06:27:12', '1', 1, '2021-06-30'),
(17, 13, 0, 0, 0, '2021-06-30 06:27:12', '2021-06-30 06:27:12', '1', 1, '2021-06-30'),
(18, 14, 0, 0, 0, '2021-06-30 06:27:12', '2021-06-30 06:27:12', '1', 1, '2021-06-30'),
(19, 15, 0, 0, 0, '2021-06-30 06:27:12', '2021-06-30 06:27:12', '1', 1, '2021-06-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_upd`
--

CREATE TABLE `detail_upd` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_upd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_upd`
--

INSERT INTO `detail_upd` (`id`, `nama_upd`, `guru_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Basket', 1, NULL, NULL, NULL),
(2, 'Renang', 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `nama_guru`, `jk`, `no_telp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Udin', 'Laki-laki', '08967594843242', NULL, NULL, NULL),
(2, 'Putri', 'Laki-laki', '08532918534783', NULL, NULL, NULL),
(3, 'Ahmad', 'Laki-laki', '082198543721', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_nilai`
--

CREATE TABLE `jenis_nilai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_nilai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_nilai`
--

INSERT INTO `jenis_nilai` (`id`, `jenis_nilai`) VALUES
(1, 'Nilai Harian'),
(2, 'PH1'),
(3, 'PH2'),
(4, 'PTS Ganjil'),
(5, 'PH3'),
(6, 'PH4'),
(7, 'PAS Ganjil'),
(8, 'PH5'),
(9, 'PH6'),
(10, 'PTS Genap'),
(11, 'PH7'),
(12, 'PH8'),
(13, 'PAT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'OTKP', NULL, NULL, NULL),
(2, 'RPL', NULL, NULL, NULL),
(3, 'TKJ', NULL, NULL, NULL),
(4, 'MMD', NULL, NULL, NULL),
(5, 'BDP', NULL, NULL, NULL),
(6, 'TBG', NULL, NULL, NULL),
(7, 'HTL', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kikd`
--

CREATE TABLE `kikd` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenis_kikd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kompetensi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kikd`
--

INSERT INTO `kikd` (`id`, `created_at`, `updated_at`, `jenis_kikd`, `kompetensi`) VALUES
(1, '2021-06-19 14:36:10', '2021-06-21 16:45:37', 'Kompetensi Inti', 'Intii'),
(2, '2021-06-21 16:42:33', '2021-06-21 16:42:33', 'Kompetensi Dasar', 'Dasar'),
(3, '2021-06-22 01:57:00', '2021-06-22 01:57:00', 'Kompetensi Inti', 'sss'),
(4, '2021-06-22 01:57:45', '2021-06-22 01:57:45', 'Kompetensi Dasar', 'fffffffffffffffffffff'),
(5, '2021-06-24 16:04:13', '2021-06-24 16:04:13', 'Kompetensi Inti', 'wdawafawf'),
(6, '2021-06-24 16:04:19', '2021-06-24 16:04:19', 'Kompetensi Dasar', 'wagagwaggwa'),
(7, '2021-06-30 05:37:32', '2021-06-30 05:37:32', 'Kompetensi Inti', 'Contoh kompetensi inti'),
(8, '2021-06-30 05:38:04', '2021-06-30 05:38:04', 'Kompetensi Dasar', 'contoh kompetensi dasar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `jenis_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan_id` bigint(20) UNSIGNED NOT NULL,
  `rombel_id` bigint(20) UNSIGNED NOT NULL,
  `kode_mapel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ki_kd_id` bigint(20) UNSIGNED NOT NULL,
  `kd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id`, `nama_mapel`, `guru_id`, `created_at`, `updated_at`, `deleted_at`, `jenis_mapel`, `jurusan_id`, `rombel_id`, `kode_mapel`, `ki_kd_id`, `kd`) VALUES
(43, 'Bahasa Inggris', 2, NULL, '2021-06-30 05:35:25', NULL, 'Muatan Nasional', 2, 2, 'MP001', 1, 'fffffffffffffffffffff'),
(44, 'Bahasa Inggris', 1, NULL, NULL, NULL, 'Muatan Nasional', 2, 2, 'MP001', 3, 'wagagwaggwa'),
(45, 'Bahasa Indonesia', 1, '2021-06-30 05:35:09', '2021-06-30 05:35:09', NULL, 'Muatan Nasional', 2, 1, 'MP002', 1, 'Dasar'),
(46, 'Bahasa Indonesia', 1, '2021-06-30 05:35:09', '2021-06-30 05:35:09', NULL, 'Muatan Nasional', 2, 1, 'MP002', 3, 'Dasar'),
(47, 'Bahasa Indonesia', 1, '2021-06-30 05:35:09', '2021-06-30 05:36:58', '2021-06-30 05:36:58', 'Muatan Nasional', 2, 1, 'MP002', 5, 'Dasar'),
(48, 'matematika', 3, '2021-06-30 06:06:53', '2021-06-30 06:06:53', NULL, 'Muatan Nasional', 2, 1, 'mp0003', 3, 'contoh kompetensi dasar'),
(49, 'matematika', 3, '2021-06-30 06:06:54', '2021-06-30 06:06:54', NULL, 'Muatan Nasional', 2, 1, 'mp0003', 1, 'contoh kompetensi dasar'),
(50, 'matematika', 3, '2021-06-30 06:06:54', '2021-06-30 06:06:54', NULL, 'Muatan Nasional', 2, 1, 'mp0003', 7, 'contoh kompetensi dasar'),
(51, 'bahasa sunda', 2, '2021-06-30 06:26:05', '2021-06-30 06:26:05', NULL, 'Muatan Nasional', 2, 2, 'MP004', 3, 'Dasar'),
(52, 'bahasa sunda', 2, '2021-06-30 06:26:05', '2021-06-30 06:26:05', NULL, 'Muatan Nasional', 2, 2, 'MP004', 1, 'Dasar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_04_024452_create_siswa_table', 1),
(5, '2021_03_04_024727_create_rayon_table', 1),
(6, '2021_03_04_024756_create_jurusan_table', 1),
(7, '2021_03_04_024856_create_guru_table', 1),
(8, '2021_03_04_025002_create_mapel_table', 1),
(9, '2021_03_04_025511_create_upd_table', 1),
(10, '2021_03_04_025646_create_absen_table', 1),
(11, '2021_03_04_030825_add_foreign_to_siswa_table', 1),
(12, '2021_03_04_031230_add_foreign_to_rayon_table', 1),
(13, '2021_03_04_031342_add_foreign_to_mapel_table', 1),
(14, '2021_03_04_032351_add_foreign_to_absen_table', 1),
(15, '2021_03_06_080812_add_level_to_users_table', 1),
(16, '2021_03_06_144406_create_detail_upd_table', 1),
(17, '2021_03_06_144417_add_foreign_to_detail_upd_table', 1),
(18, '2021_03_06_154455_add_foreign_to_upd_table', 1),
(19, '2021_03_11_151828_create_nilais_table', 1),
(20, '2021_03_20_192828_add_soft_delete_on_siswa_table', 1),
(21, '2021_03_22_133406_add_soft_delete_on_rayon_table', 1),
(22, '2021_03_22_145837_add_soft_delete_on_guru_table', 1),
(23, '2021_03_22_203343_add_soft_delete_on_detail_table', 1),
(24, '2021_03_24_192213_create_rombel_table', 1),
(25, '2021_03_24_200228_add_rombel_to_siswa_table', 1),
(26, '2021_03_24_200323_add_foreign_rombel_to_siswa_table', 1),
(27, '2021_03_28_200745_add_foreign_to_rombel_table', 1),
(28, '2021_04_23_163753_create_jenis_nilai_table', 1),
(29, '2021_04_23_164942_drop_jenis_nilai_from_nilai_table', 1),
(30, '2021_04_23_165559_add_jenis_nilai_to_nilai_mapel_table', 1),
(31, '2021_04_23_221220_add_soft_delete_on_mapel_table', 1),
(32, '2021_04_24_144239_add_soft_delete_on_users_table', 1),
(33, '2021_04_25_131520_add_semester_to_nilai_mapel_table', 1),
(34, '2021_04_25_135016_add_semester_to_absen_table', 1),
(35, '2021_04_29_174723_add_soft_delete_on_jurusan_table', 1),
(36, '2021_04_29_184738_create_tahun_ajaran_table', 1),
(37, '2021_04_29_191305_add_tahun_ajaran_to_siswa_table', 1),
(38, '2021_04_29_191938_add_foreign_tahun_ajaran_to_siswa_table', 1),
(39, '2021_05_03_120318_add_column_to_mapel_table', 1),
(40, '2021_05_03_125328_add_tahun_ajaran_to_nilai_mapel_table', 1),
(41, '2021_05_03_185210_add_timestamps_to_nilai_mapel_table', 1),
(42, '2021_05_03_214000_add_kode_mapel_to_mapel_table', 1),
(43, '2021_05_04_155907_add_tingkat_to_rombel_table', 1),
(44, '2021_05_06_060433_add_foreign_jenis_nilai_to_upd_table', 1),
(45, '2021_05_06_135203_add_jenis_nilai_to_absen_table', 1),
(46, '2021_05_25_222320_add_jumlah_kehadiran_to_upd_table', 1),
(47, '2021_06_06_112458_create_kikd_table', 1),
(48, '2021_06_06_125951_add_kode_kikd_to_mapel_table', 1),
(49, '2021_06_19_181145_add_tanggal_to_nilai_mapel_table', 1),
(50, '2021_06_20_172053_add_tanggal_to_absen_table', 2),
(51, '2021_06_21_233440_drop_kompetensi_from_kikd', 3),
(52, '2021_06_25_215838_add_kd_to_mapel_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_mapel`
--

CREATE TABLE `nilai_mapel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_nilai_id` bigint(20) UNSIGNED NOT NULL,
  `nilai_pengetahuan` int(11) NOT NULL,
  `nilai_keterampilan` int(11) NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajaran_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilai_mapel`
--

INSERT INTO `nilai_mapel` (`id`, `siswa_id`, `mapel_id`, `jenis_nilai_id`, `nilai_pengetahuan`, `nilai_keterampilan`, `semester`, `tahun_ajaran_id`, `created_at`, `updated_at`, `tanggal`) VALUES
(6, 12, 43, 1, 90, 98, '1', 1, '2021-06-30 06:27:46', '2021-06-30 06:27:46', '2021-06-30'),
(7, 13, 43, 1, 90, 98, '1', 1, '2021-06-30 06:27:47', '2021-06-30 06:27:47', '2021-06-30'),
(8, 14, 43, 1, 87, 89, '1', 1, '2021-06-30 06:27:47', '2021-06-30 06:27:47', '2021-06-30'),
(9, 15, 43, 1, 97, 87, '1', 1, '2021-06-30 06:27:47', '2021-06-30 06:27:47', '2021-06-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rayon`
--

CREATE TABLE `rayon` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_rayon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rayon`
--

INSERT INTO `rayon` (`id`, `nama_rayon`, `guru_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cicurug 1', 3, NULL, NULL, NULL),
(2, 'Cicurug 2', 1, NULL, NULL, NULL),
(3, 'Cicurug 3', 2, NULL, NULL, NULL),
(4, 'Cicurug 4', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rombel`
--

CREATE TABLE `rombel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_rombel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jurusan_id` bigint(20) UNSIGNED NOT NULL,
  `tingkat` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rombel`
--

INSERT INTO `rombel` (`id`, `nama_rombel`, `created_at`, `updated_at`, `jurusan_id`, `tingkat`) VALUES
(1, 'XII-1', NULL, NULL, 2, 'XII'),
(2, 'XII-2', NULL, NULL, 2, 'XII'),
(3, 'XII-3', NULL, NULL, 2, 'XII'),
(4, 'XII-4', NULL, NULL, 2, 'XII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rayon_id` bigint(20) UNSIGNED NOT NULL,
  `jurusan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `rombel_id` bigint(20) UNSIGNED NOT NULL,
  `tahun_ajaran_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama_siswa`, `rayon_id`, `jurusan_id`, `created_at`, `updated_at`, `deleted_at`, `rombel_id`, `tahun_ajaran_id`) VALUES
(12, '1111', 'budi', 2, 2, '2021-06-30 06:19:37', '2021-06-30 06:19:37', NULL, 2, 1),
(13, '11806675', 'Marchella Putri Sannie', 4, 2, '2021-06-30 06:25:07', '2021-06-30 06:25:07', NULL, 2, 1),
(14, '1180013', 'test', 3, 2, '2021-06-30 06:25:08', '2021-06-30 06:25:08', NULL, 2, 1),
(15, '11805741', 'satu', 2, 2, '2021-06-30 06:25:08', '2021-06-30 06:25:08', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `tahun_ajaran`, `created_at`, `updated_at`) VALUES
(1, '2018/2019', NULL, NULL),
(2, '2019/2020', NULL, NULL),
(3, '2020/2021', NULL, NULL),
(4, '2021/2022', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `upd`
--

CREATE TABLE `upd` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `detail_upd_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_nilai_id` bigint(20) UNSIGNED NOT NULL,
  `nilai_upd` int(11) NOT NULL,
  `jumlah_tidak_hadir` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jumlah_kehadiran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `upd`
--

INSERT INTO `upd` (`id`, `siswa_id`, `detail_upd_id`, `jenis_nilai_id`, `nilai_upd`, `jumlah_tidak_hadir`, `semester`, `created_at`, `updated_at`, `jumlah_kehadiran`) VALUES
(6, 12, 2, 1, 50, 0, 1, '2021-06-30 06:28:19', '2021-06-30 06:28:19', 75),
(7, 13, 2, 1, 58, 0, 1, '2021-06-30 06:28:19', '2021-06-30 06:28:19', 87),
(8, 14, 2, 1, 78, 0, 1, '2021-06-30 06:28:19', '2021-06-30 06:28:19', 7),
(9, 15, 2, 1, 87, 0, 1, '2021-06-30 06:28:19', '2021-06-30 06:28:19', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` enum('admin','guru') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `level`, `deleted_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$aMbCnHWd07zOGOMsOsOnhuS0P0DSMRzj.FZvE4vU.xCXgtf1SEhdm', NULL, NULL, NULL, 'admin', NULL),
(2, 'guru', 'guru@gmail.com', NULL, '$2y$10$rxYuNnMmRwHjDTMJrXsf0.u4LSo/YSLiGtVJM9sRq83trf5CL3EWa', NULL, NULL, NULL, 'guru', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absen_siswa_id_foreign` (`siswa_id`),
  ADD KEY `absen_jenis_nilai_id_foreign` (`jenis_nilai_id`);

--
-- Indeks untuk tabel `detail_upd`
--
ALTER TABLE `detail_upd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_upd_guru_id_foreign` (`guru_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_nilai`
--
ALTER TABLE `jenis_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kikd`
--
ALTER TABLE `kikd`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mapel_guru_id_foreign` (`guru_id`),
  ADD KEY `mapel_jurusan_id_foreign` (`jurusan_id`),
  ADD KEY `mapel_rombel_id_foreign` (`rombel_id`),
  ADD KEY `mapel_ki_kd_id_foreign` (`ki_kd_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_mapel`
--
ALTER TABLE `nilai_mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_mapel_siswa_id_foreign` (`siswa_id`),
  ADD KEY `nilai_mapel_mapel_id_foreign` (`mapel_id`),
  ADD KEY `nilai_mapel_jenis_nilai_id_foreign` (`jenis_nilai_id`),
  ADD KEY `nilai_mapel_tahun_ajaran_id_foreign` (`tahun_ajaran_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `rayon`
--
ALTER TABLE `rayon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rayon_guru_id_foreign` (`guru_id`);

--
-- Indeks untuk tabel `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rombel_jurusan_id_foreign` (`jurusan_id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_rayon_id_foreign` (`rayon_id`),
  ADD KEY `siswa_jurusan_id_foreign` (`jurusan_id`),
  ADD KEY `siswa_rombel_id_foreign` (`rombel_id`),
  ADD KEY `siswa_tahun_ajaran_id_foreign` (`tahun_ajaran_id`);

--
-- Indeks untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `upd`
--
ALTER TABLE `upd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upd_siswa_id_foreign` (`siswa_id`),
  ADD KEY `upd_detail_upd_id_foreign` (`detail_upd_id`),
  ADD KEY `upd_jenis_nilai_id_foreign` (`jenis_nilai_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `detail_upd`
--
ALTER TABLE `detail_upd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_nilai`
--
ALTER TABLE `jenis_nilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kikd`
--
ALTER TABLE `kikd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `nilai_mapel`
--
ALTER TABLE `nilai_mapel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `rayon`
--
ALTER TABLE `rayon`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `upd`
--
ALTER TABLE `upd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_jenis_nilai_id_foreign` FOREIGN KEY (`jenis_nilai_id`) REFERENCES `jenis_nilai` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `absen_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_upd`
--
ALTER TABLE `detail_upd`
  ADD CONSTRAINT `detail_upd_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `mapel_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mapel_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mapel_ki_kd_id_foreign` FOREIGN KEY (`ki_kd_id`) REFERENCES `kikd` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mapel_rombel_id_foreign` FOREIGN KEY (`rombel_id`) REFERENCES `rombel` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_mapel`
--
ALTER TABLE `nilai_mapel`
  ADD CONSTRAINT `nilai_mapel_jenis_nilai_id_foreign` FOREIGN KEY (`jenis_nilai_id`) REFERENCES `jenis_nilai` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_mapel_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_mapel_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_mapel_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajaran` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rayon`
--
ALTER TABLE `rayon`
  ADD CONSTRAINT `rayon_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rombel`
--
ALTER TABLE `rombel`
  ADD CONSTRAINT `rombel_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_rayon_id_foreign` FOREIGN KEY (`rayon_id`) REFERENCES `rayon` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_rombel_id_foreign` FOREIGN KEY (`rombel_id`) REFERENCES `rombel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajaran` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `upd`
--
ALTER TABLE `upd`
  ADD CONSTRAINT `upd_detail_upd_id_foreign` FOREIGN KEY (`detail_upd_id`) REFERENCES `detail_upd` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `upd_jenis_nilai_id_foreign` FOREIGN KEY (`jenis_nilai_id`) REFERENCES `jenis_nilai` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `upd_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
