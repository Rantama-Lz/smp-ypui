-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 27 Jul 2025 pada 21.17
-- Versi server: 8.0.30
-- Versi PHP: 8.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smp-ypui`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('smp_ypui_cache_356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1753301386),
('smp_ypui_cache_356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1753301386;', 1753301386),
('smp_ypui_cache_77de68daecd823babbb58edb1c8e14d7106e83bb', 'i:1;', 1753311436),
('smp_ypui_cache_77de68daecd823babbb58edb1c8e14d7106e83bb:timer', 'i:1753311436;', 1753311436),
('smp_ypui_cache_902ba3cda1883801594b6e1b452790cc53948fda', 'i:1;', 1753048916),
('smp_ypui_cache_902ba3cda1883801594b6e1b452790cc53948fda:timer', 'i:1753048916;', 1753048916),
('smp_ypui_cache_ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4', 'i:1;', 1753306075),
('smp_ypui_cache_ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4:timer', 'i:1753306075;', 1753306075),
('smp_ypui_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1753648282),
('smp_ypui_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1753648282;', 1753648282),
('smp_ypui_cache_spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:157:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:9:\"view_guru\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:13:\"view_any_guru\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:11:\"create_guru\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:11:\"update_guru\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:4;a:3:{s:1:\"a\";i:5;s:1:\"b\";s:12:\"restore_guru\";s:1:\"c\";s:3:\"web\";}i:5;a:3:{s:1:\"a\";i:6;s:1:\"b\";s:16:\"restore_any_guru\";s:1:\"c\";s:3:\"web\";}i:6;a:3:{s:1:\"a\";i:7;s:1:\"b\";s:14:\"replicate_guru\";s:1:\"c\";s:3:\"web\";}i:7;a:3:{s:1:\"a\";i:8;s:1:\"b\";s:12:\"reorder_guru\";s:1:\"c\";s:3:\"web\";}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:11:\"delete_guru\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:15:\"delete_any_guru\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:10;a:3:{s:1:\"a\";i:11;s:1:\"b\";s:17:\"force_delete_guru\";s:1:\"c\";s:3:\"web\";}i:11;a:3:{s:1:\"a\";i:12;s:1:\"b\";s:21:\"force_delete_any_guru\";s:1:\"c\";s:3:\"web\";}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:10:\"view_kelas\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:14:\"view_any_kelas\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:12:\"create_kelas\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:12:\"update_kelas\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:16;a:3:{s:1:\"a\";i:17;s:1:\"b\";s:13:\"restore_kelas\";s:1:\"c\";s:3:\"web\";}i:17;a:3:{s:1:\"a\";i:18;s:1:\"b\";s:17:\"restore_any_kelas\";s:1:\"c\";s:3:\"web\";}i:18;a:3:{s:1:\"a\";i:19;s:1:\"b\";s:15:\"replicate_kelas\";s:1:\"c\";s:3:\"web\";}i:19;a:3:{s:1:\"a\";i:20;s:1:\"b\";s:13:\"reorder_kelas\";s:1:\"c\";s:3:\"web\";}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:12:\"delete_kelas\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:16:\"delete_any_kelas\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:22;a:3:{s:1:\"a\";i:23;s:1:\"b\";s:18:\"force_delete_kelas\";s:1:\"c\";s:3:\"web\";}i:23;a:3:{s:1:\"a\";i:24;s:1:\"b\";s:22:\"force_delete_any_kelas\";s:1:\"c\";s:3:\"web\";}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:18:\"view_mapel::master\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:22:\"view_any_mapel::master\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:20:\"create_mapel::master\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:20:\"update_mapel::master\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:28;a:3:{s:1:\"a\";i:29;s:1:\"b\";s:21:\"restore_mapel::master\";s:1:\"c\";s:3:\"web\";}i:29;a:3:{s:1:\"a\";i:30;s:1:\"b\";s:25:\"restore_any_mapel::master\";s:1:\"c\";s:3:\"web\";}i:30;a:3:{s:1:\"a\";i:31;s:1:\"b\";s:23:\"replicate_mapel::master\";s:1:\"c\";s:3:\"web\";}i:31;a:3:{s:1:\"a\";i:32;s:1:\"b\";s:21:\"reorder_mapel::master\";s:1:\"c\";s:3:\"web\";}i:32;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:20:\"delete_mapel::master\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:33;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:24:\"delete_any_mapel::master\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:34;a:3:{s:1:\"a\";i:35;s:1:\"b\";s:26:\"force_delete_mapel::master\";s:1:\"c\";s:3:\"web\";}i:35;a:3:{s:1:\"a\";i:36;s:1:\"b\";s:30:\"force_delete_any_mapel::master\";s:1:\"c\";s:3:\"web\";}i:36;a:3:{s:1:\"a\";i:37;s:1:\"b\";s:20:\"view_mata::pelajaran\";s:1:\"c\";s:3:\"web\";}i:37;a:3:{s:1:\"a\";i:38;s:1:\"b\";s:24:\"view_any_mata::pelajaran\";s:1:\"c\";s:3:\"web\";}i:38;a:3:{s:1:\"a\";i:39;s:1:\"b\";s:22:\"create_mata::pelajaran\";s:1:\"c\";s:3:\"web\";}i:39;a:3:{s:1:\"a\";i:40;s:1:\"b\";s:22:\"update_mata::pelajaran\";s:1:\"c\";s:3:\"web\";}i:40;a:3:{s:1:\"a\";i:41;s:1:\"b\";s:23:\"restore_mata::pelajaran\";s:1:\"c\";s:3:\"web\";}i:41;a:3:{s:1:\"a\";i:42;s:1:\"b\";s:27:\"restore_any_mata::pelajaran\";s:1:\"c\";s:3:\"web\";}i:42;a:3:{s:1:\"a\";i:43;s:1:\"b\";s:25:\"replicate_mata::pelajaran\";s:1:\"c\";s:3:\"web\";}i:43;a:3:{s:1:\"a\";i:44;s:1:\"b\";s:23:\"reorder_mata::pelajaran\";s:1:\"c\";s:3:\"web\";}i:44;a:3:{s:1:\"a\";i:45;s:1:\"b\";s:22:\"delete_mata::pelajaran\";s:1:\"c\";s:3:\"web\";}i:45;a:3:{s:1:\"a\";i:46;s:1:\"b\";s:26:\"delete_any_mata::pelajaran\";s:1:\"c\";s:3:\"web\";}i:46;a:3:{s:1:\"a\";i:47;s:1:\"b\";s:28:\"force_delete_mata::pelajaran\";s:1:\"c\";s:3:\"web\";}i:47;a:3:{s:1:\"a\";i:48;s:1:\"b\";s:32:\"force_delete_any_mata::pelajaran\";s:1:\"c\";s:3:\"web\";}i:48;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:10:\"view_nilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:4:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;}}i:49;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:14:\"view_any_nilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:4:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;}}i:50;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:12:\"create_nilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:51;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:12:\"update_nilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:52;a:3:{s:1:\"a\";i:53;s:1:\"b\";s:13:\"restore_nilai\";s:1:\"c\";s:3:\"web\";}i:53;a:3:{s:1:\"a\";i:54;s:1:\"b\";s:17:\"restore_any_nilai\";s:1:\"c\";s:3:\"web\";}i:54;a:3:{s:1:\"a\";i:55;s:1:\"b\";s:15:\"replicate_nilai\";s:1:\"c\";s:3:\"web\";}i:55;a:3:{s:1:\"a\";i:56;s:1:\"b\";s:13:\"reorder_nilai\";s:1:\"c\";s:3:\"web\";}i:56;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:12:\"delete_nilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:57;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:16:\"delete_any_nilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:58;a:3:{s:1:\"a\";i:59;s:1:\"b\";s:18:\"force_delete_nilai\";s:1:\"c\";s:3:\"web\";}i:59;a:3:{s:1:\"a\";i:60;s:1:\"b\";s:22:\"force_delete_any_nilai\";s:1:\"c\";s:3:\"web\";}i:60;a:4:{s:1:\"a\";i:61;s:1:\"b\";s:15:\"view_pembayaran\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:61;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:19:\"view_any_pembayaran\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:62;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:17:\"create_pembayaran\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:63;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:17:\"update_pembayaran\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:64;a:3:{s:1:\"a\";i:65;s:1:\"b\";s:18:\"restore_pembayaran\";s:1:\"c\";s:3:\"web\";}i:65;a:3:{s:1:\"a\";i:66;s:1:\"b\";s:22:\"restore_any_pembayaran\";s:1:\"c\";s:3:\"web\";}i:66;a:3:{s:1:\"a\";i:67;s:1:\"b\";s:20:\"replicate_pembayaran\";s:1:\"c\";s:3:\"web\";}i:67;a:3:{s:1:\"a\";i:68;s:1:\"b\";s:18:\"reorder_pembayaran\";s:1:\"c\";s:3:\"web\";}i:68;a:4:{s:1:\"a\";i:69;s:1:\"b\";s:17:\"delete_pembayaran\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:69;a:4:{s:1:\"a\";i:70;s:1:\"b\";s:21:\"delete_any_pembayaran\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:70;a:3:{s:1:\"a\";i:71;s:1:\"b\";s:23:\"force_delete_pembayaran\";s:1:\"c\";s:3:\"web\";}i:71;a:3:{s:1:\"a\";i:72;s:1:\"b\";s:27:\"force_delete_any_pembayaran\";s:1:\"c\";s:3:\"web\";}i:72;a:4:{s:1:\"a\";i:73;s:1:\"b\";s:9:\"view_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:73;a:4:{s:1:\"a\";i:74;s:1:\"b\";s:13:\"view_any_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:74;a:4:{s:1:\"a\";i:75;s:1:\"b\";s:11:\"create_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:75;a:4:{s:1:\"a\";i:76;s:1:\"b\";s:11:\"update_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:76;a:4:{s:1:\"a\";i:77;s:1:\"b\";s:11:\"delete_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:77;a:4:{s:1:\"a\";i:78;s:1:\"b\";s:15:\"delete_any_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:78;a:4:{s:1:\"a\";i:79;s:1:\"b\";s:10:\"view_siswa\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:79;a:4:{s:1:\"a\";i:80;s:1:\"b\";s:14:\"view_any_siswa\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:80;a:4:{s:1:\"a\";i:81;s:1:\"b\";s:12:\"create_siswa\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:81;a:4:{s:1:\"a\";i:82;s:1:\"b\";s:12:\"update_siswa\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:82;a:3:{s:1:\"a\";i:83;s:1:\"b\";s:13:\"restore_siswa\";s:1:\"c\";s:3:\"web\";}i:83;a:3:{s:1:\"a\";i:84;s:1:\"b\";s:17:\"restore_any_siswa\";s:1:\"c\";s:3:\"web\";}i:84;a:3:{s:1:\"a\";i:85;s:1:\"b\";s:15:\"replicate_siswa\";s:1:\"c\";s:3:\"web\";}i:85;a:3:{s:1:\"a\";i:86;s:1:\"b\";s:13:\"reorder_siswa\";s:1:\"c\";s:3:\"web\";}i:86;a:4:{s:1:\"a\";i:87;s:1:\"b\";s:12:\"delete_siswa\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:87;a:4:{s:1:\"a\";i:88;s:1:\"b\";s:16:\"delete_any_siswa\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:88;a:3:{s:1:\"a\";i:89;s:1:\"b\";s:18:\"force_delete_siswa\";s:1:\"c\";s:3:\"web\";}i:89;a:3:{s:1:\"a\";i:90;s:1:\"b\";s:22:\"force_delete_any_siswa\";s:1:\"c\";s:3:\"web\";}i:90;a:4:{s:1:\"a\";i:91;s:1:\"b\";s:17:\"view_siswa::kelas\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:91;a:4:{s:1:\"a\";i:92;s:1:\"b\";s:21:\"view_any_siswa::kelas\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:92;a:4:{s:1:\"a\";i:93;s:1:\"b\";s:19:\"create_siswa::kelas\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:93;a:4:{s:1:\"a\";i:94;s:1:\"b\";s:19:\"update_siswa::kelas\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:94;a:3:{s:1:\"a\";i:95;s:1:\"b\";s:20:\"restore_siswa::kelas\";s:1:\"c\";s:3:\"web\";}i:95;a:3:{s:1:\"a\";i:96;s:1:\"b\";s:24:\"restore_any_siswa::kelas\";s:1:\"c\";s:3:\"web\";}i:96;a:3:{s:1:\"a\";i:97;s:1:\"b\";s:22:\"replicate_siswa::kelas\";s:1:\"c\";s:3:\"web\";}i:97;a:3:{s:1:\"a\";i:98;s:1:\"b\";s:20:\"reorder_siswa::kelas\";s:1:\"c\";s:3:\"web\";}i:98;a:4:{s:1:\"a\";i:99;s:1:\"b\";s:19:\"delete_siswa::kelas\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:99;a:4:{s:1:\"a\";i:100;s:1:\"b\";s:23:\"delete_any_siswa::kelas\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:100;a:3:{s:1:\"a\";i:101;s:1:\"b\";s:25:\"force_delete_siswa::kelas\";s:1:\"c\";s:3:\"web\";}i:101;a:3:{s:1:\"a\";i:102;s:1:\"b\";s:29:\"force_delete_any_siswa::kelas\";s:1:\"c\";s:3:\"web\";}i:102;a:4:{s:1:\"a\";i:103;s:1:\"b\";s:8:\"view_spp\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:103;a:4:{s:1:\"a\";i:104;s:1:\"b\";s:12:\"view_any_spp\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:104;a:4:{s:1:\"a\";i:105;s:1:\"b\";s:10:\"create_spp\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:105;a:4:{s:1:\"a\";i:106;s:1:\"b\";s:10:\"update_spp\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:106;a:3:{s:1:\"a\";i:107;s:1:\"b\";s:11:\"restore_spp\";s:1:\"c\";s:3:\"web\";}i:107;a:3:{s:1:\"a\";i:108;s:1:\"b\";s:15:\"restore_any_spp\";s:1:\"c\";s:3:\"web\";}i:108;a:3:{s:1:\"a\";i:109;s:1:\"b\";s:13:\"replicate_spp\";s:1:\"c\";s:3:\"web\";}i:109;a:3:{s:1:\"a\";i:110;s:1:\"b\";s:11:\"reorder_spp\";s:1:\"c\";s:3:\"web\";}i:110;a:4:{s:1:\"a\";i:111;s:1:\"b\";s:10:\"delete_spp\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:111;a:4:{s:1:\"a\";i:112;s:1:\"b\";s:14:\"delete_any_spp\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:112;a:3:{s:1:\"a\";i:113;s:1:\"b\";s:16:\"force_delete_spp\";s:1:\"c\";s:3:\"web\";}i:113;a:3:{s:1:\"a\";i:114;s:1:\"b\";s:20:\"force_delete_any_spp\";s:1:\"c\";s:3:\"web\";}i:114;a:4:{s:1:\"a\";i:115;s:1:\"b\";s:12:\"view_tagihan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:115;a:4:{s:1:\"a\";i:116;s:1:\"b\";s:16:\"view_any_tagihan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:116;a:4:{s:1:\"a\";i:117;s:1:\"b\";s:14:\"create_tagihan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:117;a:4:{s:1:\"a\";i:118;s:1:\"b\";s:14:\"update_tagihan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:118;a:3:{s:1:\"a\";i:119;s:1:\"b\";s:15:\"restore_tagihan\";s:1:\"c\";s:3:\"web\";}i:119;a:3:{s:1:\"a\";i:120;s:1:\"b\";s:19:\"restore_any_tagihan\";s:1:\"c\";s:3:\"web\";}i:120;a:3:{s:1:\"a\";i:121;s:1:\"b\";s:17:\"replicate_tagihan\";s:1:\"c\";s:3:\"web\";}i:121;a:3:{s:1:\"a\";i:122;s:1:\"b\";s:15:\"reorder_tagihan\";s:1:\"c\";s:3:\"web\";}i:122;a:4:{s:1:\"a\";i:123;s:1:\"b\";s:14:\"delete_tagihan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:123;a:4:{s:1:\"a\";i:124;s:1:\"b\";s:18:\"delete_any_tagihan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:124;a:3:{s:1:\"a\";i:125;s:1:\"b\";s:20:\"force_delete_tagihan\";s:1:\"c\";s:3:\"web\";}i:125;a:3:{s:1:\"a\";i:126;s:1:\"b\";s:24:\"force_delete_any_tagihan\";s:1:\"c\";s:3:\"web\";}i:126;a:4:{s:1:\"a\";i:127;s:1:\"b\";s:18:\"view_tahun::ajaran\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:127;a:4:{s:1:\"a\";i:128;s:1:\"b\";s:22:\"view_any_tahun::ajaran\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:128;a:4:{s:1:\"a\";i:129;s:1:\"b\";s:20:\"create_tahun::ajaran\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:129;a:4:{s:1:\"a\";i:130;s:1:\"b\";s:20:\"update_tahun::ajaran\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:130;a:3:{s:1:\"a\";i:131;s:1:\"b\";s:21:\"restore_tahun::ajaran\";s:1:\"c\";s:3:\"web\";}i:131;a:3:{s:1:\"a\";i:132;s:1:\"b\";s:25:\"restore_any_tahun::ajaran\";s:1:\"c\";s:3:\"web\";}i:132;a:3:{s:1:\"a\";i:133;s:1:\"b\";s:23:\"replicate_tahun::ajaran\";s:1:\"c\";s:3:\"web\";}i:133;a:3:{s:1:\"a\";i:134;s:1:\"b\";s:21:\"reorder_tahun::ajaran\";s:1:\"c\";s:3:\"web\";}i:134;a:4:{s:1:\"a\";i:135;s:1:\"b\";s:20:\"delete_tahun::ajaran\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:135;a:4:{s:1:\"a\";i:136;s:1:\"b\";s:24:\"delete_any_tahun::ajaran\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:136;a:3:{s:1:\"a\";i:137;s:1:\"b\";s:26:\"force_delete_tahun::ajaran\";s:1:\"c\";s:3:\"web\";}i:137;a:3:{s:1:\"a\";i:138;s:1:\"b\";s:30:\"force_delete_any_tahun::ajaran\";s:1:\"c\";s:3:\"web\";}i:138;a:4:{s:1:\"a\";i:139;s:1:\"b\";s:9:\"view_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:139;a:4:{s:1:\"a\";i:140;s:1:\"b\";s:13:\"view_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:140;a:4:{s:1:\"a\";i:141;s:1:\"b\";s:11:\"create_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:141;a:4:{s:1:\"a\";i:142;s:1:\"b\";s:11:\"update_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:142;a:3:{s:1:\"a\";i:143;s:1:\"b\";s:12:\"restore_user\";s:1:\"c\";s:3:\"web\";}i:143;a:3:{s:1:\"a\";i:144;s:1:\"b\";s:16:\"restore_any_user\";s:1:\"c\";s:3:\"web\";}i:144;a:3:{s:1:\"a\";i:145;s:1:\"b\";s:14:\"replicate_user\";s:1:\"c\";s:3:\"web\";}i:145;a:3:{s:1:\"a\";i:146;s:1:\"b\";s:12:\"reorder_user\";s:1:\"c\";s:3:\"web\";}i:146;a:4:{s:1:\"a\";i:147;s:1:\"b\";s:11:\"delete_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:147;a:4:{s:1:\"a\";i:148;s:1:\"b\";s:15:\"delete_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:148;a:3:{s:1:\"a\";i:149;s:1:\"b\";s:17:\"force_delete_user\";s:1:\"c\";s:3:\"web\";}i:149;a:3:{s:1:\"a\";i:150;s:1:\"b\";s:21:\"force_delete_any_user\";s:1:\"c\";s:3:\"web\";}i:150;a:4:{s:1:\"a\";i:151;s:1:\"b\";s:16:\"widget_CardSiswa\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:151;a:4:{s:1:\"a\";i:152;s:1:\"b\";s:21:\"widget_DashboardChart\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:152;a:4:{s:1:\"a\";i:153;s:1:\"b\";s:20:\"widget_StatsOverview\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:153;a:4:{s:1:\"a\";i:154;s:1:\"b\";s:17:\"widget_RekapNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:154;a:4:{s:1:\"a\";i:155;s:1:\"b\";s:15:\"widget_AvgNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:155;a:4:{s:1:\"a\";i:156;s:1:\"b\";s:21:\"widget_PembayaranCard\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:156;a:4:{s:1:\"a\";i:157;s:1:\"b\";s:23:\"naik-kelas_siswa::kelas\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}}s:5:\"roles\";a:4:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"super_admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:4:\"guru\";s:1:\"c\";s:3:\"web\";}i:3;a:3:{s:1:\"a\";i:4;s:1:\"b\";s:5:\"siswa\";s:1:\"c\";s:3:\"web\";}}}', 1753697788);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gurus`
--

INSERT INTO `gurus` (`id`, `nama`, `nip`, `jenis_kelamin`, `tgl_lahir`, `alamat`, `foto`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Citra', '198608082011100010', 'Perempuan', '1986-08-08', 'Jl. Hayam Wuruk No. 90, RT 010, RW 008, Kel. Glodok, Jakarta Barat\n', 'guru/01K0QKE53NY2DQ6RASGGJD0RP1.png', 2, '2025-07-20 05:41:06', '2025-07-21 22:59:55'),
(2, 'Kautsar El Nino', '198901012012011011', 'Laki-laki', '1989-01-01', 'Jl. Sisingamangaraja No. 22, RT 002, RW 001, Kel. Pejaten, Jakarta Selatan\n', 'guru/01K0QKHM60323RVCB4VY6G26AG.png', 9, '2025-07-20 17:17:55', '2025-07-21 23:01:49'),
(3, 'Andi Saputra', '198001012005011001', 'Laki-laki', '1980-01-15', 'Jl. Merdeka No. 123, RT 003, RW 012, Kel. Gambir, Jakarta Pusat', 'guru/01K0QKCET378B17P37HDW1APZZ.png', 11, '2025-07-21 08:26:24', '2025-07-21 22:59:00'),
(4, 'Siti Nurhaliza', '197803152003022002', 'Perempuan', '1978-03-15', 'Jl. Pahlawan No. 45, RT 007, RW 004, Kel. Senayan, Jakarta Selatan\n', 'guru/01K0QKK042WJ7KA55YVYSDS1EH.png', 12, '2025-07-21 08:36:16', '2025-07-21 23:02:34'),
(5, 'Budi Santoso', '198207222007033003', 'Laki-laki', '1982-07-22', 'Jl. Diponegoro No. 67, RT 002, RW 010, Kel. Cempaka Putih, Jakarta Pusat\n', 'guru/01K0QKCZT5HV8ZKFR5Z3C3B459.png', 13, '2025-07-21 08:36:54', '2025-07-21 22:59:17'),
(6, 'Rina Marlina', '198512122010014004', 'Perempuan', '1985-12-12', 'Jl. Sudirman No. 89, RT 005, RW 009, Kel. Karet, Jakarta Selatan\n', 'guru/01K0QKJ6A8HZKC3JD58N27TXYC.png', 14, '2025-07-21 08:37:47', '2025-07-21 23:02:07'),
(7, 'Dudi Setiawan', '197909092002055005', 'Laki-laki', '1979-09-09', 'Jl. Ahmad Yani No. 101, RT 001, RW 006, Kel. Rawamangun, Jakarta Timur\n', 'guru/01K0QKFC4KHRKB3YNZ0Z6ZS5MZ.png', 15, '2025-07-21 08:39:22', '2025-07-21 23:00:35'),
(8, 'Eka Putri', '198104182006066006', 'Perempuan', '1981-04-18', 'Jl. Imam Bonjol No. 12, RT 008, RW 003, Kel. Menteng, Jakarta Pusat\n', 'guru/01K0QKG0C6DW0Z43YJQ91DTCRP.png', 16, '2025-07-21 08:40:58', '2025-07-21 23:00:56'),
(9, 'Heri Susanto', '198306252009077007', 'Laki-laki', '1983-06-25', 'Jl. Jend. Sudirman No. 34, RT 004, RW 007, Kel. Kuningan, Jakarta Selatan\n', 'guru/01K0QKGGT361QSH3R63K720T9V.png', 17, '2025-07-21 08:42:04', '2025-07-21 23:01:13'),
(10, 'Yuni Astuti', '198411112008088008', 'Perempuan', '1984-11-11', 'Jl. Gatot Subroto No. 56, RT 006, RW 005, Kel. Tebet, Jakarta Selatan\n', 'guru/01K0QKKWCYEA9HZEGXWEDT4Z5H.png', 18, '2025-07-21 08:43:04', '2025-07-21 23:03:03'),
(11, 'Joko Pamungkas', '197702282001099009', 'Laki-laki', '1977-02-28', 'Jl. Gajah Mada No. 78, RT 009, RW 002, Kel. Kota Tua, Jakarta Barat\n', 'guru/01K0QKH045BH7PCNQEY07G9BXP.png', 19, '2025-07-21 08:45:11', '2025-07-21 23:01:28'),
(13, 'Ade Meriana', '123456789101234567', 'Perempuan', '1974-01-13', 'Jl. Naimun No.30, RT.03/RW.11, Pondok Pinang, Kebayoran Lama, Jakarta Selatan', 'guru/01K0WMSCTQK6AVTZ34KCPTF7RK.png', 28, '2025-07-23 21:59:44', '2025-07-23 21:59:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru_mapel`
--

CREATE TABLE `guru_mapel` (
  `id` bigint UNSIGNED NOT NULL,
  `guru_id` bigint UNSIGNED NOT NULL,
  `mapel_master_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `guru_mapel`
--

INSERT INTO `guru_mapel` (`id`, `guru_id`, `mapel_master_id`, `created_at`, `updated_at`) VALUES
(2, 1, 8, '2025-07-20 17:14:29', '2025-07-20 17:14:29'),
(4, 2, 4, '2025-07-20 20:37:46', '2025-07-20 20:37:46'),
(13, 3, 1, '2025-07-21 08:58:50', '2025-07-21 08:58:50'),
(14, 5, 7, '2025-07-21 08:59:07', '2025-07-21 09:05:43'),
(15, 4, 3, '2025-07-21 08:59:34', '2025-07-21 08:59:34'),
(16, 7, 10, '2025-07-21 08:59:57', '2025-07-21 08:59:57'),
(17, 8, 5, '2025-07-21 09:01:44', '2025-07-21 09:01:44'),
(18, 9, 2, '2025-07-21 09:02:14', '2025-07-21 09:02:14'),
(19, 6, 6, '2025-07-21 09:02:43', '2025-07-21 09:02:43'),
(20, 10, 7, '2025-07-21 09:04:28', '2025-07-21 09:04:28'),
(21, 11, 9, '2025-07-21 09:04:52', '2025-07-21 09:04:52'),
(22, 1, 9, '2025-07-23 16:40:19', '2025-07-23 16:40:19'),
(24, 13, 3, '2025-07-23 22:36:11', '2025-07-23 22:36:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `tingkat_kelas_id` bigint UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `tingkat_kelas_id`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(1, 1, '7 A', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(2, 1, '7 B', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(3, 1, '7 C', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(4, 1, '7 D', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(5, 2, '8 A', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(6, 2, '8 B', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(7, 2, '8 C', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(8, 2, '8 D', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(9, 3, '9 A', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(10, 3, '9 B', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(11, 3, '9 C', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(12, 3, '9 D', '2025-07-19 04:33:48', '2025-07-19 04:33:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel_masters`
--

CREATE TABLE `mapel_masters` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mapel_masters`
--

INSERT INTO `mapel_masters` (`id`, `nama_mapel`, `created_at`, `updated_at`) VALUES
(1, 'Pendidikan Agama dan Budi Pekerti', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(2, 'Pendidikan Pancasila dan Kewarganegaraan (PPKn)', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(3, 'Bahasa Indonesia', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(4, 'Bahasa Inggris', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(5, 'Matematika', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(6, 'Ilmu Pengetahuan Alam (IPA)', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(7, 'Ilmu Pengetahuan Sosial (IPS)', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(8, 'Seni Budaya', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(9, 'Pendidikan Jasmani, Olahraga, dan Kesehatan (PJOK)', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(10, 'Teknologi Informasi dan Komunikasi (TIK)', '2025-07-19 04:33:48', '2025-07-19 04:33:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajarans`
--

CREATE TABLE `mata_pelajarans` (
  `id` bigint UNSIGNED NOT NULL,
  `tingkat_kelas_id` bigint UNSIGNED NOT NULL,
  `mapel_master_id` bigint UNSIGNED NOT NULL,
  `guru_id` bigint UNSIGNED NOT NULL,
  `tahun_ajaran_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_10_064711_create_tingkat_kelas_table', 1),
(5, '2025_06_10_072156_create_mapel_masters_table', 1),
(6, '2025_06_24_141008_create_gurus_table', 1),
(7, '2025_06_24_173155_create_tahun_ajarans_table', 1),
(8, '2025_06_25_061816_create_mata_pelajarans_table', 1),
(9, '2025_06_26_102708_create_siswas_table', 1),
(10, '2025_06_26_144901_create_kelas_table', 1),
(11, '2025_06_26_153608_create_spps_table', 1),
(12, '2025_07_14_071247_create_siswa_kelas_table', 1),
(13, '2025_07_19_040101_create_permission_tables', 1),
(14, '2025_07_26_173242_create_tagihans_table', 1),
(15, '2025_07_26_173307_create_pembayarans_table', 1),
(16, '2025_07_30_061700_create_nilais_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(4, 'App\\Models\\User', 7),
(4, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 9),
(4, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 12),
(3, 'App\\Models\\User', 13),
(3, 'App\\Models\\User', 14),
(3, 'App\\Models\\User', 15),
(3, 'App\\Models\\User', 16),
(3, 'App\\Models\\User', 17),
(3, 'App\\Models\\User', 18),
(3, 'App\\Models\\User', 19),
(4, 'App\\Models\\User', 20),
(4, 'App\\Models\\User', 21),
(4, 'App\\Models\\User', 22),
(4, 'App\\Models\\User', 23),
(4, 'App\\Models\\User', 24),
(4, 'App\\Models\\User', 25),
(4, 'App\\Models\\User', 26),
(3, 'App\\Models\\User', 28),
(4, 'App\\Models\\User', 29);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_kelas_id` bigint UNSIGNED NOT NULL,
  `mapel_master_id` bigint UNSIGNED NOT NULL,
  `semester` enum('Ganjil','Genap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_harian` int DEFAULT NULL,
  `nilai_uts` int DEFAULT NULL,
  `nilai_uas` int DEFAULT NULL,
  `nilai_akhir` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilais`
--

INSERT INTO `nilais` (`id`, `siswa_kelas_id`, `mapel_master_id`, `semester`, `nilai_harian`, `nilai_uts`, `nilai_uas`, `nilai_akhir`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Ganjil', 88, 99, 60, 80, '2025-07-20 07:22:51', '2025-07-20 07:22:51'),
(2, 2, 3, 'Ganjil', 66, 77, 88, 78, '2025-07-20 07:26:29', '2025-07-20 07:26:29'),
(3, 1, 4, 'Ganjil', 77, 99, 99, 92, '2025-07-20 07:27:25', '2025-07-20 07:27:25'),
(4, 1, 1, 'Genap', 99, 55, 66, 73, '2025-07-20 07:27:47', '2025-07-20 07:27:47'),
(5, 2, 3, 'Genap', 66, 77, 88, 78, '2025-07-20 07:28:08', '2025-07-20 07:28:08'),
(6, 2, 2, 'Ganjil', 50, 66, 77, 66, '2025-07-20 07:54:42', '2025-07-20 08:02:56'),
(7, 2, 2, 'Genap', 70, 95, 78, 81, '2025-07-20 07:54:57', '2025-07-20 08:14:16'),
(8, 1, 6, 'Ganjil', 60, 66, 77, 69, '2025-07-20 07:58:20', '2025-07-20 08:02:49'),
(9, 2, 7, 'Genap', 55, 66, 77, 67, '2025-07-20 08:39:25', '2025-07-20 08:39:25'),
(10, 2, 7, 'Ganjil', 66, 77, 88, 78, '2025-07-20 08:39:52', '2025-07-20 08:39:52'),
(20, 5, 4, 'Ganjil', 55, 66, 55, 58, '2025-07-20 17:42:10', '2025-07-20 17:42:10'),
(21, 5, 5, 'Ganjil', 88, 66, 66, 73, '2025-07-20 17:43:01', '2025-07-20 17:43:01'),
(22, 5, 5, 'Genap', NULL, NULL, NULL, 0, '2025-07-20 17:43:45', '2025-07-20 17:50:02'),
(23, 5, 3, 'Ganjil', 77, 88, 99, 89, '2025-07-20 17:56:00', '2025-07-20 17:56:00'),
(24, 5, 3, 'Genap', 77, 77, 77, 77, '2025-07-20 17:56:11', '2025-07-20 17:56:11'),
(25, 5, 9, 'Ganjil', 66, 77, 88, 78, '2025-07-20 19:37:07', '2025-07-20 19:37:07'),
(26, 5, 9, 'Genap', 66, 77, 99, 83, '2025-07-20 19:37:14', '2025-07-20 19:37:14'),
(27, 5, 8, 'Ganjil', 66, 77, 88, 78, '2025-07-20 19:38:01', '2025-07-20 19:38:01'),
(28, 5, 8, 'Genap', 55, 66, 77, 67, '2025-07-20 19:45:29', '2025-07-20 19:45:29'),
(29, 1, 2, 'Ganjil', 90, 90, 90, 90, '2025-07-20 20:40:46', '2025-07-20 20:40:46'),
(30, 1, 2, 'Genap', 90, 90, 90, 90, '2025-07-20 20:40:54', '2025-07-20 20:40:54'),
(31, 1, 3, 'Genap', 90, 90, 90, 90, '2025-07-20 20:41:00', '2025-07-20 20:41:00'),
(32, 1, 3, 'Ganjil', 90, 90, 90, 90, '2025-07-20 20:41:09', '2025-07-20 20:41:09'),
(33, 1, 4, 'Genap', 67, 77, 77, 74, '2025-07-20 20:41:34', '2025-07-20 20:41:34'),
(34, 1, 5, 'Genap', 89, 77, 66, 76, '2025-07-20 20:41:46', '2025-07-20 20:41:46'),
(35, 1, 5, 'Ganjil', 78, 77, 89, 82, '2025-07-20 20:41:55', '2025-07-20 20:41:55'),
(36, 1, 6, 'Genap', 70, 70, 80, 74, '2025-07-20 20:42:10', '2025-07-20 20:42:10'),
(37, 1, 7, 'Ganjil', 80, 80, 80, 80, '2025-07-20 20:42:19', '2025-07-20 20:42:19'),
(38, 1, 7, 'Genap', 80, 80, 80, 80, '2025-07-20 20:42:25', '2025-07-20 20:42:25'),
(39, 1, 8, 'Genap', 80, 80, 78, 79, '2025-07-20 20:42:34', '2025-07-20 20:42:34'),
(40, 1, 8, 'Ganjil', 70, 77, 77, 75, '2025-07-20 20:42:44', '2025-07-20 20:42:44'),
(41, 1, 9, 'Ganjil', 70, 66, 56, 63, '2025-07-20 20:42:54', '2025-07-20 20:42:54'),
(42, 1, 9, 'Genap', 67, 67, 67, 67, '2025-07-20 20:43:00', '2025-07-20 20:43:00'),
(43, 1, 10, 'Genap', 55, 66, 66, 63, '2025-07-20 20:43:09', '2025-07-20 20:43:09'),
(44, 1, 10, 'Ganjil', 66, 77, 66, 69, '2025-07-20 20:43:14', '2025-07-20 20:43:14'),
(45, 14, 8, 'Ganjil', 11, 23, 45, 28, '2025-07-22 17:26:22', '2025-07-22 17:26:22'),
(46, 14, 8, 'Genap', 70, 77, 77, 75, '2025-07-22 17:26:31', '2025-07-22 17:26:31'),
(47, 6, 8, 'Ganjil', 80, 75, 78, 78, '2025-07-23 17:05:15', '2025-07-23 17:05:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` bigint UNSIGNED NOT NULL,
  `tagihan_id` bigint UNSIGNED NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `jumlah_bayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buktibayar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metode_bayar` enum('Tunai','Transfer') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Menunggu Validasi','Sudah Validasi','Ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menunggu Validasi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembayarans`
--

INSERT INTO `pembayarans` (`id`, `tagihan_id`, `tanggal_bayar`, `jumlah_bayar`, `buktibayar`, `metode_bayar`, `status`, `created_at`, `updated_at`) VALUES
(5, 12, '2025-07-21', '250000', 'buktibayar/01K0SA0HSHP3X2HP9BX2956QEG.jpeg', 'Transfer', 'Ditolak', '2025-07-20 22:26:59', '2025-07-22 14:53:41'),
(10, 17, '2025-07-05', '250000', 'buktibayar/01K0SBB9VWM9031J1R5A8PXZWA.jpeg', 'Transfer', 'Sudah Validasi', '2025-07-22 15:15:51', '2025-07-22 15:30:31'),
(12, 23, '2025-07-24', '250000', 'buktibayar/01K0SBH7Q9PDK808CBQGXYZNWZ.jpg', 'Transfer', 'Menunggu Validasi', '2025-07-22 15:20:16', '2025-07-22 15:20:16'),
(13, 20, '2025-07-10', '250000', 'buktibayar/01K0SBM3WHQSJPVPGKEW7Q4YYQ.jpg', 'Transfer', 'Menunggu Validasi', '2025-07-22 15:21:51', '2025-07-22 15:21:51'),
(14, 22, '2025-07-23', '250000', 'buktibayar/01K0SBNH0XPF6CZJ16C94XFKY7.jpeg', 'Transfer', 'Menunggu Validasi', '2025-07-22 15:22:37', '2025-07-22 15:22:37'),
(15, 25, '2025-07-24', '25', 'buktibayar/01K0W65A0S4N4MFZB68G7H6WC1.jpg', 'Transfer', 'Menunggu Validasi', '2025-07-23 17:44:06', '2025-07-23 17:44:06'),
(16, 21, '2025-07-24', '2', 'buktibayar/01K0W66YRKECDXZ7BBWRZJP0ER.jpg', 'Transfer', 'Menunggu Validasi', '2025-07-23 17:45:00', '2025-07-23 17:45:00'),
(17, 26, '2025-07-24', '250000', 'buktibayar/01K0WBWZN7VN8Z5P987942CFF3.jpeg', 'Tunai', 'Sudah Validasi', '2025-07-23 19:24:25', '2025-07-23 19:24:41'),
(18, 1, '2025-07-24', '250000', 'buktibayar/01K0WEE8CDEXNMFS0Z5HMTFS2G.jpg', 'Transfer', 'Sudah Validasi', '2025-07-23 20:08:48', '2025-07-23 20:09:13'),
(19, 12, '2025-07-11', '250000', 'buktibayar/01K0WK7N7WP7X7EQM6W8Y9HAPZ.jpg', 'Transfer', 'Menunggu Validasi', '2025-07-23 21:32:34', '2025-07-23 21:32:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_guru', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(2, 'view_any_guru', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(3, 'create_guru', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(4, 'update_guru', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(5, 'restore_guru', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(6, 'restore_any_guru', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(7, 'replicate_guru', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(8, 'reorder_guru', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(9, 'delete_guru', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(10, 'delete_any_guru', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(11, 'force_delete_guru', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(12, 'force_delete_any_guru', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(13, 'view_kelas', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(14, 'view_any_kelas', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(15, 'create_kelas', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(16, 'update_kelas', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(17, 'restore_kelas', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(18, 'restore_any_kelas', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(19, 'replicate_kelas', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(20, 'reorder_kelas', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(21, 'delete_kelas', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(22, 'delete_any_kelas', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(23, 'force_delete_kelas', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(24, 'force_delete_any_kelas', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(25, 'view_mapel::master', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(26, 'view_any_mapel::master', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(27, 'create_mapel::master', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(28, 'update_mapel::master', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(29, 'restore_mapel::master', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(30, 'restore_any_mapel::master', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(31, 'replicate_mapel::master', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(32, 'reorder_mapel::master', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(33, 'delete_mapel::master', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(34, 'delete_any_mapel::master', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(35, 'force_delete_mapel::master', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(36, 'force_delete_any_mapel::master', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(37, 'view_mata::pelajaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(38, 'view_any_mata::pelajaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(39, 'create_mata::pelajaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(40, 'update_mata::pelajaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(41, 'restore_mata::pelajaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(42, 'restore_any_mata::pelajaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(43, 'replicate_mata::pelajaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(44, 'reorder_mata::pelajaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(45, 'delete_mata::pelajaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(46, 'delete_any_mata::pelajaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(47, 'force_delete_mata::pelajaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(48, 'force_delete_any_mata::pelajaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(49, 'view_nilai', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(50, 'view_any_nilai', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(51, 'create_nilai', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(52, 'update_nilai', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(53, 'restore_nilai', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(54, 'restore_any_nilai', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(55, 'replicate_nilai', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(56, 'reorder_nilai', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(57, 'delete_nilai', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(58, 'delete_any_nilai', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(59, 'force_delete_nilai', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(60, 'force_delete_any_nilai', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(61, 'view_pembayaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(62, 'view_any_pembayaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(63, 'create_pembayaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(64, 'update_pembayaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(65, 'restore_pembayaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(66, 'restore_any_pembayaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(67, 'replicate_pembayaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(68, 'reorder_pembayaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(69, 'delete_pembayaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(70, 'delete_any_pembayaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(71, 'force_delete_pembayaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(72, 'force_delete_any_pembayaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(73, 'view_role', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(74, 'view_any_role', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(75, 'create_role', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(76, 'update_role', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(77, 'delete_role', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(78, 'delete_any_role', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(79, 'view_siswa', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(80, 'view_any_siswa', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(81, 'create_siswa', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(82, 'update_siswa', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(83, 'restore_siswa', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(84, 'restore_any_siswa', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(85, 'replicate_siswa', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(86, 'reorder_siswa', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(87, 'delete_siswa', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(88, 'delete_any_siswa', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(89, 'force_delete_siswa', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(90, 'force_delete_any_siswa', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(91, 'view_siswa::kelas', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(92, 'view_any_siswa::kelas', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(93, 'create_siswa::kelas', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(94, 'update_siswa::kelas', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(95, 'restore_siswa::kelas', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(96, 'restore_any_siswa::kelas', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(97, 'replicate_siswa::kelas', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(98, 'reorder_siswa::kelas', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(99, 'delete_siswa::kelas', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(100, 'delete_any_siswa::kelas', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(101, 'force_delete_siswa::kelas', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(102, 'force_delete_any_siswa::kelas', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(103, 'view_spp', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(104, 'view_any_spp', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(105, 'create_spp', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(106, 'update_spp', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(107, 'restore_spp', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(108, 'restore_any_spp', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(109, 'replicate_spp', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(110, 'reorder_spp', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(111, 'delete_spp', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(112, 'delete_any_spp', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(113, 'force_delete_spp', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(114, 'force_delete_any_spp', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(115, 'view_tagihan', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(116, 'view_any_tagihan', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(117, 'create_tagihan', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(118, 'update_tagihan', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(119, 'restore_tagihan', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(120, 'restore_any_tagihan', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(121, 'replicate_tagihan', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(122, 'reorder_tagihan', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(123, 'delete_tagihan', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(124, 'delete_any_tagihan', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(125, 'force_delete_tagihan', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(126, 'force_delete_any_tagihan', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(127, 'view_tahun::ajaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(128, 'view_any_tahun::ajaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(129, 'create_tahun::ajaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(130, 'update_tahun::ajaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(131, 'restore_tahun::ajaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(132, 'restore_any_tahun::ajaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(133, 'replicate_tahun::ajaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(134, 'reorder_tahun::ajaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(135, 'delete_tahun::ajaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(136, 'delete_any_tahun::ajaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(137, 'force_delete_tahun::ajaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(138, 'force_delete_any_tahun::ajaran', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(139, 'view_user', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(140, 'view_any_user', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(141, 'create_user', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(142, 'update_user', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(143, 'restore_user', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(144, 'restore_any_user', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(145, 'replicate_user', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(146, 'reorder_user', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(147, 'delete_user', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(148, 'delete_any_user', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(149, 'force_delete_user', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(150, 'force_delete_any_user', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(151, 'widget_CardSiswa', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(152, 'widget_DashboardChart', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(153, 'widget_StatsOverview', 'web', '2025-07-19 04:33:53', '2025-07-19 04:33:53'),
(154, 'widget_RekapNilai', 'web', '2025-07-20 20:10:01', '2025-07-20 20:10:01'),
(155, 'widget_AvgNilai', 'web', '2025-07-20 20:59:31', '2025-07-20 20:59:31'),
(156, 'widget_PembayaranCard', 'web', '2025-07-20 22:30:06', '2025-07-20 22:30:06'),
(157, 'naik-kelas_siswa::kelas', 'web', '2025-07-23 18:10:33', '2025-07-23 18:10:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(2, 'admin', 'web', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(3, 'guru', 'web', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(4, 'siswa', 'web', '2025-07-19 04:33:48', '2025-07-19 04:33:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(9, 1),
(10, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(21, 1),
(22, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(33, 1),
(34, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(57, 1),
(58, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(69, 1),
(70, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(87, 1),
(88, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(99, 1),
(100, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(111, 1),
(112, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(123, 1),
(124, 1),
(127, 1),
(128, 1),
(129, 1),
(130, 1),
(135, 1),
(136, 1),
(139, 1),
(140, 1),
(141, 1),
(142, 1),
(147, 1),
(148, 1),
(151, 1),
(152, 1),
(153, 1),
(154, 1),
(155, 1),
(156, 1),
(157, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(9, 2),
(10, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(21, 2),
(22, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(33, 2),
(34, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(57, 2),
(58, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(69, 2),
(70, 2),
(79, 2),
(80, 2),
(81, 2),
(82, 2),
(87, 2),
(88, 2),
(91, 2),
(92, 2),
(93, 2),
(94, 2),
(99, 2),
(103, 2),
(104, 2),
(105, 2),
(106, 2),
(111, 2),
(112, 2),
(115, 2),
(116, 2),
(117, 2),
(118, 2),
(123, 2),
(124, 2),
(127, 2),
(128, 2),
(129, 2),
(130, 2),
(135, 2),
(136, 2),
(139, 2),
(140, 2),
(142, 2),
(147, 2),
(148, 2),
(151, 2),
(152, 2),
(153, 2),
(157, 2),
(49, 3),
(50, 3),
(51, 3),
(52, 3),
(57, 3),
(91, 3),
(92, 3),
(151, 3),
(154, 3),
(155, 3),
(49, 4),
(50, 4),
(61, 4),
(62, 4),
(63, 4),
(64, 4),
(115, 4),
(116, 4),
(154, 4),
(156, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('zSPDum8qicaxiTcUBvs2rAq3zYMxv5oPqecCxlJU', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiYmdtdmFmNHZweHRtSVc5Q2N3cVU5Q1oxakRjZERVcjJCSEdxRlE0RyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkL3BlbWJheWFyYW5zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJHdQTEJrOHliYkVPVUVhTUU0Vndmek9vUjAuVzV6L3h0b1JjTDdoVUtTTkJZLlEyRS9MbGlhIjtzOjg6ImZpbGFtZW50IjthOjA6e31zOjY6InRhYmxlcyI7YTo4OntzOjMxOiJMaXN0UGVtYmF5YXJhbnNfdG9nZ2xlZF9jb2x1bW5zIjthOjU6e3M6NzoidGFnaWhhbiI7YToxOntzOjEwOiJzaXN3YUtlbGFzIjthOjI6e3M6NToic2lzd2EiO2E6MTp7czozOiJuaXMiO2I6MDt9czoxMToidGFodW5hamFyYW4iO2E6MTp7czoxMDoibmFtYV90YWh1biI7YjoxO319fXM6MTM6InRhbmdnYWxfYmF5YXIiO2I6MDtzOjEyOiJtZXRvZGVfYmF5YXIiO2I6MDtzOjEwOiJjcmVhdGVkX2F0IjtiOjE7czoxMDoidXBkYXRlZF9hdCI7YjoxO31zOjI1OiJMaXN0VXNlcnNfdG9nZ2xlZF9jb2x1bW5zIjthOjI6e3M6MTA6ImNyZWF0ZWRfYXQiO2I6MDtzOjEwOiJ1cGRhdGVkX2F0IjtiOjA7fXM6MjY6Ikxpc3RTaXN3YXNfdG9nZ2xlZF9jb2x1bW5zIjthOjY6e3M6MzoibmlzIjtiOjE7czo5OiJ0Z2xfbGFoaXIiO2I6MTtzOjY6ImFsYW1hdCI7YjowO3M6NDoiZm90byI7YjoxO3M6MTA6ImNyZWF0ZWRfYXQiO2I6MDtzOjEwOiJ1cGRhdGVkX2F0IjtiOjA7fXM6MzA6Ikxpc3RTaXN3YUtlbGFzX3RvZ2dsZWRfY29sdW1ucyI7YToyOntzOjEwOiJjcmVhdGVkX2F0IjtiOjA7czoxMDoidXBkYXRlZF9hdCI7YjowO31zOjI1OiJMaXN0S2VsYXNfdG9nZ2xlZF9jb2x1bW5zIjthOjM6e3M6MTI6InRpbmdrYXRrZWxhcyI7YToxOntzOjU6ImtlbGFzIjtiOjE7fXM6MTA6ImNyZWF0ZWRfYXQiO2I6MDtzOjEwOiJ1cGRhdGVkX2F0IjtiOjA7fXM6MzI6Ikxpc3RNYXBlbE1hc3RlcnNfdG9nZ2xlZF9jb2x1bW5zIjthOjI6e3M6MTA6ImNyZWF0ZWRfYXQiO2I6MDtzOjEwOiJ1cGRhdGVkX2F0IjtiOjA7fXM6MjY6Ikxpc3ROaWxhaXNfdG9nZ2xlZF9jb2x1bW5zIjthOjM6e3M6MTA6InNpc3dhS2VsYXMiO2E6Mjp7czo1OiJzaXN3YSI7YToxOntzOjM6Im5pcyI7YjowO31zOjExOiJ0YWh1bmFqYXJhbiI7YToxOntzOjEwOiJuYW1hX3RhaHVuIjtiOjA7fX1zOjEwOiJjcmVhdGVkX2F0IjtiOjA7czoxMDoidXBkYXRlZF9hdCI7YjowO31zOjI4OiJMaXN0VGFnaWhhbnNfdG9nZ2xlZF9jb2x1bW5zIjthOjM6e3M6MTA6InNpc3dhS2VsYXMiO2E6MTp7czo1OiJzaXN3YSI7YToxOntzOjM6Im5pcyI7YjowO319czoxMDoiY3JlYXRlZF9hdCI7YjowO3M6MTA6InVwZGF0ZWRfYXQiO2I6MDt9fX0=', 1753649823);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswas`
--

INSERT INTO `siswas` (`id`, `nama`, `nis`, `jenis_kelamin`, `tgl_lahir`, `alamat`, `foto`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Abillah Octavia', '4220250001', 'Perempuan', '2011-10-27', 'Jl.Irekad', 'siswa/01K0QFKK36MC1WAC4JZDWM8J6Y.png', 5, '2025-07-20 06:51:01', '2025-07-21 21:58:01'),
(2, 'Rafi Andra Pratama', '4220250002', 'Laki-laki', '2000-02-23', 'Jl.Tanah Ara No.04 RT.04/RW.01, Pondok Pinang , Kebayoran Lama, Jakarta Selatan', 'siswa/01K0QFVPJC25H7MD7TM16Q8C9Q.png', 7, '2025-07-20 07:25:35', '2025-07-21 21:57:25'),
(3, 'Rusdianto', '4220250003', 'Laki-laki', '2010-10-20', 'Jl. Tanah Ara', NULL, 8, '2025-07-20 09:36:02', '2025-07-21 21:59:55'),
(4, 'Dedi Prasetyo', '4220250004', 'Laki-laki', '2011-05-05', 'Jl.SMP 87 No.32 RT.01/RW.12, Pondok Pinang, Kebayoran Lama, Jakarta Selatan', 'siswa/01K0QFQ4C19MVYNRC1N6GPBBA2.png', 10, '2025-07-20 20:35:58', '2025-07-23 23:09:49'),
(5, 'Siti Amalia', '4220250005', 'Perempuan', '2011-05-12', 'Jl. Melati No. 15 RT 03 RW 05, Kel. Cipete Selatan, Kec. Cilandak, Jakarta Selatan\n', 'siswa/01K0QG4RZRH3CBTMR1RZFC06TX.png', 20, '2025-07-21 21:20:58', '2025-07-21 22:02:22'),
(6, 'Reza Pratama', '4220250006', 'Laki-laki', '2010-09-23', 'Jl. Kenanga No. 08 RT 04 RW 01, Kel. Karet Tengsin, Kec. Tanah Abang, Jakarta Pusat\n', 'siswa/01K0QFW7P8CV1D3PMF5Q2DT4GD.png', 21, '2025-07-21 21:21:46', '2025-07-21 21:57:42'),
(7, 'Nadia Putri', '4220250007', 'Perempuan', '2011-01-18', 'Jl. Mawar No. 22 RT 01 RW 04, Kel. Rawamangun, Kec. Pulogadung, Jakarta Timur\n', 'siswa/01K0QFTX7J97QFQEBX0KB3C7SS.png', 22, '2025-07-21 21:22:39', '2025-07-21 21:56:59'),
(8, 'Rina Salsabila', '4220250008', 'Perempuan', '2010-11-11', 'Jl. Cempaka No. 5 RT 06 RW 02, Kel. Kebon Jeruk, Kec. Kebon Jeruk, Jakarta Barat\n', 'siswa/01K0QG0Z5636KZQMG101JKX65A.png', 23, '2025-07-21 21:35:08', '2025-07-21 22:00:17'),
(9, 'Bayu Firmansyah', '4220250009', 'Laki-laki', '2011-05-07', 'Jl. Flamboyan No. 10 RT 03 RW 06, Kel. Tebet Barat, Kec. Tebet, Jakarta Selatan\n', 'siswa/01K0QFNWT5DWRDKKJ04VPQKVDA.png', 24, '2025-07-21 21:35:52', '2025-07-21 21:54:14'),
(10, 'Nurmila Yunita', '4220250010', 'Perempuan', '2010-04-04', 'Jl. Teratai No. 9 RT 05 RW 03, Kel. Duren Sawit, Kec. Duren Sawit, Jakarta Timur\n', 'siswa/01K0WR0ZBTAE5AJ7DYVKPW33SM.png', 25, '2025-07-21 21:36:26', '2025-07-23 23:11:23'),
(11, 'Ayu Lestari', '4220250011', 'Perempuan', '2010-08-02', 'Jl. Anggrek No. 3 RT 01 RW 01, Kel. Sunter Agung, Kec. Tanjung Priok, Jakarta Utara\n', 'siswa/01K0QFMYJE7J2TVYXYFS5DA353.png', 26, '2025-07-21 21:37:10', '2025-07-21 21:53:44'),
(12, 'Rosanih', '4220250012', 'Perempuan', '2011-08-20', 'Jl.Tanah Ara No.04 RT.02/RW.012, Pondok Pinang, Kebayoran Lama, Jakarta Selatan', 'siswa/01K0WQSWM08NGAS7GZ4WKY3W2K.png', 29, '2025-07-23 22:52:26', '2025-07-23 22:52:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_kelas`
--

CREATE TABLE `siswa_kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `tahun_ajaran_id` bigint UNSIGNED NOT NULL,
  `status` enum('Aktif','Tidak Aktif','Lulus') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa_kelas`
--

INSERT INTO `siswa_kelas` (`id`, `siswa_id`, `kelas_id`, `tahun_ajaran_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 2, 'Tidak Aktif', '2025-07-20 07:22:07', '2025-07-23 23:51:39'),
(2, 2, 5, 2, 'Tidak Aktif', '2025-07-20 07:25:57', '2025-07-23 23:51:39'),
(5, 3, 1, 2, 'Aktif', '2025-07-20 13:01:24', '2025-07-20 13:01:24'),
(6, 4, 1, 2, 'Aktif', '2025-07-20 20:36:17', '2025-07-20 20:36:17'),
(7, 5, 2, 2, 'Aktif', '2025-07-21 21:29:48', '2025-07-21 21:29:48'),
(8, 6, 2, 2, 'Aktif', '2025-07-21 21:29:48', '2025-07-21 21:29:48'),
(9, 7, 2, 2, 'Aktif', '2025-07-21 21:29:48', '2025-07-21 21:29:48'),
(10, 11, 2, 2, 'Aktif', '2025-07-21 22:09:24', '2025-07-21 22:09:24'),
(11, 8, 2, 2, 'Aktif', '2025-07-21 22:09:24', '2025-07-21 22:09:24'),
(12, 9, 2, 2, 'Aktif', '2025-07-21 22:09:24', '2025-07-21 22:09:24'),
(13, 10, 2, 2, 'Aktif', '2025-07-21 22:09:24', '2025-07-21 22:09:24'),
(14, 1, 1, 1, 'Tidak Aktif', '2025-07-22 16:57:05', '2025-07-22 17:41:35'),
(15, 2, 1, 1, 'Tidak Aktif', '2025-07-22 16:58:35', '2025-07-22 16:59:43'),
(16, 12, 7, 2, 'Aktif', '2025-07-23 23:16:01', '2025-07-23 23:16:01'),
(19, 1, 9, 3, 'Aktif', '2025-07-23 23:51:39', '2025-07-23 23:51:39'),
(20, 2, 9, 3, 'Aktif', '2025-07-23 23:51:39', '2025-07-23 23:51:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spps`
--

CREATE TABLE `spps` (
  `id` bigint UNSIGNED NOT NULL,
  `tahun_ajaran_id` bigint UNSIGNED NOT NULL,
  `bulan` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `spps`
--

INSERT INTO `spps` (`id`, `tahun_ajaran_id`, `bulan`, `nominal`, `created_at`, `updated_at`) VALUES
(1, 2, 'Januari', '250000', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(2, 2, 'Februari', '250000', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(3, 2, 'Maret', '250000', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(4, 2, 'April', '250000', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(5, 2, 'Mei', '250000', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(6, 2, 'Juni', '250000', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(7, 2, 'Juli', '250000', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(8, 2, 'Agustus', '250000', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(9, 2, 'September', '250000', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(10, 2, 'Oktober', '250000', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(11, 2, 'November', '250000', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(12, 2, 'Desember', '250000', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(13, 1, 'Juli', '275000', '2025-07-20 07:52:10', '2025-07-20 07:52:24'),
(14, 3, 'Januari', '250000', '2025-07-20 12:38:24', '2025-07-20 12:38:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihans`
--

CREATE TABLE `tagihans` (
  `id` bigint UNSIGNED NOT NULL,
  `spp_id` bigint UNSIGNED NOT NULL,
  `siswa_kelas_id` bigint UNSIGNED NOT NULL,
  `bulan` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Sudah Bayar','Belum Bayar') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum Bayar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tagihans`
--

INSERT INTO `tagihans` (`id`, `spp_id`, `siswa_kelas_id`, `bulan`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 'Januari', 'Sudah Bayar', '2025-07-20 07:23:07', '2025-07-23 20:09:13'),
(5, 2, 2, 'Januari', 'Belum Bayar', '2025-07-20 21:51:21', '2025-07-20 21:51:21'),
(6, 2, 5, 'Januari', 'Belum Bayar', '2025-07-20 21:51:21', '2025-07-20 21:51:21'),
(7, 2, 6, 'Januari', 'Belum Bayar', '2025-07-20 21:51:21', '2025-07-20 21:51:21'),
(8, 3, 2, 'Januari', 'Belum Bayar', '2025-07-20 21:51:29', '2025-07-20 22:01:55'),
(9, 3, 5, 'Januari', 'Sudah Bayar', '2025-07-20 21:51:29', '2025-07-22 14:55:21'),
(10, 3, 6, 'Januari', 'Belum Bayar', '2025-07-20 21:51:29', '2025-07-20 22:01:55'),
(12, 5, 1, 'Januari', 'Belum Bayar', '2025-07-20 22:15:51', '2025-07-20 22:15:51'),
(13, 5, 2, 'Januari', 'Belum Bayar', '2025-07-20 22:15:51', '2025-07-20 22:15:51'),
(14, 5, 5, 'Januari', 'Belum Bayar', '2025-07-20 22:15:51', '2025-07-20 22:15:51'),
(15, 5, 6, 'Januari', 'Belum Bayar', '2025-07-20 22:15:51', '2025-07-20 22:15:51'),
(16, 7, 5, 'Januari', 'Belum Bayar', '2025-07-22 14:16:44', '2025-07-23 20:03:22'),
(17, 7, 6, 'Januari', 'Belum Bayar', '2025-07-22 14:16:44', '2025-07-23 20:03:22'),
(18, 7, 7, 'Januari', 'Belum Bayar', '2025-07-22 14:16:44', '2025-07-23 20:03:22'),
(19, 7, 8, 'Januari', 'Belum Bayar', '2025-07-22 14:16:44', '2025-07-23 20:03:22'),
(20, 7, 9, 'Januari', 'Belum Bayar', '2025-07-22 14:16:44', '2025-07-23 20:03:22'),
(21, 7, 10, 'Januari', 'Belum Bayar', '2025-07-22 14:16:44', '2025-07-23 20:03:22'),
(22, 7, 11, 'Januari', 'Belum Bayar', '2025-07-22 14:16:44', '2025-07-23 20:03:22'),
(23, 7, 12, 'Januari', 'Belum Bayar', '2025-07-22 14:16:44', '2025-07-23 20:03:22'),
(24, 7, 13, 'Januari', 'Belum Bayar', '2025-07-22 14:16:44', '2025-07-23 20:03:22'),
(25, 7, 2, 'Januari', 'Belum Bayar', '2025-07-23 17:43:24', '2025-07-23 20:03:22'),
(26, 6, 1, 'Januari', 'Sudah Bayar', '2025-07-23 17:46:00', '2025-07-23 19:24:41'),
(27, 6, 2, 'Januari', 'Belum Bayar', '2025-07-23 17:46:00', '2025-07-24 01:14:50'),
(28, 6, 5, 'Januari', 'Belum Bayar', '2025-07-23 17:46:00', '2025-07-23 17:46:00'),
(29, 6, 6, 'Januari', 'Belum Bayar', '2025-07-23 17:46:00', '2025-07-23 17:46:00'),
(30, 6, 7, 'Januari', 'Belum Bayar', '2025-07-23 17:46:00', '2025-07-23 17:46:00'),
(31, 6, 8, 'Januari', 'Belum Bayar', '2025-07-23 17:46:00', '2025-07-23 17:46:00'),
(32, 6, 9, 'Januari', 'Belum Bayar', '2025-07-23 17:46:00', '2025-07-23 17:46:00'),
(33, 6, 10, 'Januari', 'Belum Bayar', '2025-07-23 17:46:00', '2025-07-23 17:46:00'),
(34, 6, 11, 'Januari', 'Belum Bayar', '2025-07-23 17:46:00', '2025-07-23 17:46:00'),
(35, 6, 12, 'Januari', 'Belum Bayar', '2025-07-23 17:46:00', '2025-07-23 17:46:00'),
(36, 6, 13, 'Januari', 'Belum Bayar', '2025-07-23 17:46:00', '2025-07-23 17:46:00'),
(37, 8, 5, 'Januari', 'Belum Bayar', '2025-07-24 03:16:51', '2025-07-24 03:16:51'),
(38, 8, 6, 'Januari', 'Belum Bayar', '2025-07-24 03:16:51', '2025-07-24 03:16:51'),
(39, 8, 7, 'Januari', 'Belum Bayar', '2025-07-24 03:16:51', '2025-07-24 03:16:51'),
(40, 8, 8, 'Januari', 'Belum Bayar', '2025-07-24 03:16:51', '2025-07-24 03:16:51'),
(41, 8, 9, 'Januari', 'Belum Bayar', '2025-07-24 03:16:51', '2025-07-24 03:16:51'),
(42, 8, 10, 'Januari', 'Belum Bayar', '2025-07-24 03:16:51', '2025-07-24 03:16:51'),
(43, 8, 11, 'Januari', 'Belum Bayar', '2025-07-24 03:16:51', '2025-07-24 03:16:51'),
(44, 8, 12, 'Januari', 'Belum Bayar', '2025-07-24 03:16:51', '2025-07-24 03:16:51'),
(45, 8, 13, 'Januari', 'Belum Bayar', '2025-07-24 03:16:51', '2025-07-24 03:16:51'),
(46, 8, 16, 'Januari', 'Belum Bayar', '2025-07-24 03:16:51', '2025-07-24 03:16:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajarans`
--

CREATE TABLE `tahun_ajarans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tahun_ajarans`
--

INSERT INTO `tahun_ajarans` (`id`, `nama_tahun`, `active`, `created_at`, `updated_at`) VALUES
(1, '2024/2025', 0, '2025-07-19 04:33:48', '2025-07-22 17:26:51'),
(2, '2025/2026', 1, '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(3, '2026/2027', 0, '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(4, '2027/2028', 0, '2025-07-20 12:58:31', '2025-07-20 12:58:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkat_kelas`
--

CREATE TABLE `tingkat_kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tingkat_kelas`
--

INSERT INTO `tingkat_kelas` (`id`, `kelas`, `created_at`, `updated_at`) VALUES
(1, '7', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(2, '8', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(3, '9', '2025-07-19 04:33:48', '2025-07-19 04:33:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@ypui.com', NULL, '$2y$12$KMyRcEt9ifkzESg/kltLfeSm9JNsVUMNrCfyVNd7Ft6Bf5V/Sj2Wy', 'g3H9bwLuU0mQGgg8i33DNxPwj1qRz5qASOcHTzS53Cz1QDmLjDG6yYezMUwP', '2025-07-19 04:33:48', '2025-07-19 04:33:48'),
(2, 'Citra', 'citracoleng@gmail.com', NULL, '$2y$12$vbMsUsqzhgud7ttjpKWHrOcz5PONQCZLvCux8WAkafesf0PrN5dbG', NULL, '2025-07-20 05:41:06', '2025-07-20 05:41:06'),
(3, 'Rafi Andra Pratama', 'adminrafi@ypui.com', NULL, '$2y$12$wPLBk8ybbEOUEaME4VwfzOoR0.W5z/xtoRcL7hUKSNBY.Q2E/Llia', NULL, '2025-07-20 05:58:13', '2025-07-20 05:58:13'),
(4, 'testadmin', 'testadmin@ypui.com', NULL, '$2y$12$PkbfYIWK1NVUygrWlwdjWerv7lx9rYIuE0kMPMEsr8KYsjJdZmZCa', NULL, '2025-07-20 06:09:31', '2025-07-20 06:09:31'),
(5, 'Abillah Octavia', 'abillah@gmail.com', NULL, '$2y$12$4Ni3cRTkxAXujgpdlyeame2RE1P0JHScYl.0vBslCInoqmvNZYCi2', 'SZLi8Vhz6x2ee5XExORZG2o2CqiUu6a4DqEzFcErkCYsU1lfEDAES88WQUD1', '2025-07-20 06:51:02', '2025-07-20 06:51:02'),
(6, 'testadmin2', 'testadmin2@ypui.com', NULL, '$2y$12$fwrVqjpYPRiE00aJzzGBpOgjzBVVtaKlPcftwSFyQyYoMIAJcghYy', NULL, '2025-07-20 07:14:02', '2025-07-20 07:18:29'),
(7, 'Rafi Andra Pratama', 'rafiandra@ymail.com', NULL, '$2y$12$ZnH9/zflwALWqMxR7M9qT.QLHLZnHiZDwxDGKe7WX9Y11Jj.uvUEm', NULL, '2025-07-20 07:25:35', '2025-07-20 07:25:35'),
(8, 'Rusdianto', 'rusdianto@gmail.com', NULL, '$2y$12$.6FKC5q6udp.dRNhuxl4euJG60cYEo9klBfOG7OErgTf/a6Hnw5Z2', NULL, '2025-07-20 09:36:02', '2025-07-20 09:36:02'),
(9, 'Kautsar El Nino', 'elnino@gmail.com', NULL, '$2y$12$aaxbd3ZmxWmicSy7WNeP/eq5iRhpH/eyKYinY1.KEnlJNFoUhX80y', NULL, '2025-07-20 17:17:56', '2025-07-20 17:17:56'),
(10, 'Dedi Prasetyo', 'dediprastyo@gmail.com', NULL, '$2y$12$NgU55fYQ4xS8LgmAbwd4vOB95aNPsXP9zC.zvIc7aVYzg7t10nLju', NULL, '2025-07-20 20:35:58', '2025-07-23 23:09:49'),
(11, 'Andi Saputra', 'andisaputra@gmail.com', NULL, '$2y$12$v5CBg496w2XDka8gKEud0O0UBv06jhHas9slBAuf.wzhqFZuBVqom', NULL, '2025-07-21 08:26:24', '2025-07-21 08:26:24'),
(12, 'Siti Nurhaliza', 'nurhaliza@gmail.com', NULL, '$2y$12$89/r0yWXwepwsPvqQqngmewprfu0GLmnTgSi9Ghdt3I.kHZQGfAqS', NULL, '2025-07-21 08:36:16', '2025-07-21 08:36:16'),
(13, 'Budi Santoso', 'budisantoso@gmail.com', NULL, '$2y$12$ewt4ZtiDPlIgSDrM.A9.ZeejboGwHp6nVtYdGXdK7w3IRN3YlfG7.', NULL, '2025-07-21 08:36:54', '2025-07-21 08:36:54'),
(14, 'Rina Marlina', 'rinamarlina@gmail.com', NULL, '$2y$12$AIS8rlMLa00EMdSliF3HC.LqmixLPV3dwMhqGjy2CgL7YraSlaaCq', NULL, '2025-07-21 08:37:47', '2025-07-21 08:37:47'),
(15, 'Dudi Setiawan', 'dudisetiawan@gmail.com', NULL, '$2y$12$B86DHBSfrgjjedAX1eCf6OIO7XDEMZy5pCVn8gQAnTD5EDPETy5t2', NULL, '2025-07-21 08:39:22', '2025-07-21 08:39:22'),
(16, 'Eka Putri', 'ekaputri@gmail.com', NULL, '$2y$12$hARqHRYLg2K6b0hFe45EEOHV/MqekL2wsadALqG8uP2uo8hIZZPUO', NULL, '2025-07-21 08:40:58', '2025-07-21 08:40:58'),
(17, 'Heri Susanto', 'herisusanto@gmail.com', NULL, '$2y$12$4k8gUQ8YAspAcMd/R1f8O.SYcy63sWfKDKxfNEmBMpha/GMffQLTy', NULL, '2025-07-21 08:42:04', '2025-07-21 08:42:04'),
(18, 'Yuni Astuti', 'yuniastuti@gmail.com', NULL, '$2y$12$2IghasdNddHAfD34hULdGeb9yxeIKmRq1t0hPZjHuGNlWXAsYGIr2', NULL, '2025-07-21 08:43:04', '2025-07-21 08:43:04'),
(19, 'Joko Pamungkas', 'jokopamung@gmail.com', NULL, '$2y$12$UPUyvho/ohvjNKlKKpMo6uPOVTLmdM5j8DzEDuMDOZxkSTFBaHUjG', NULL, '2025-07-21 08:45:12', '2025-07-21 08:45:12'),
(20, 'Siti Amalia', 'sitiamalia@gmail.com', NULL, '$2y$12$EDPDIZhFv/qYUDbhYyQsuep0Mg2ae7XAa7uUbXQslAhM4WLD8aY8u', NULL, '2025-07-21 21:20:58', '2025-07-21 21:20:58'),
(21, 'Reza Pratama', 'rezapratama@gmail.com', NULL, '$2y$12$yCqvD0/uKvAIEohmZYjt7O8Ri3WITaEmvD1gPGip.4/8R0cU/Jyo.', NULL, '2025-07-21 21:21:47', '2025-07-21 21:21:47'),
(22, 'Nadia Putri', 'nadiaputri@gmail.com', NULL, '$2y$12$7LNeDMzWYjvRa5Wh.oxea.DJk6VWsmsOwZuStF0C8MqG/ED2yNlCG', NULL, '2025-07-21 21:22:39', '2025-07-21 21:22:39'),
(23, 'Rina Salsabila', 'rinasalsa@gmail.com', NULL, '$2y$12$qZmt6z3AXeNXtDfhe/84me6R069LHDroZ0x8kyhApTKWxWysrA1FC', NULL, '2025-07-21 21:35:08', '2025-07-21 21:35:08'),
(24, 'Bayu Firmansyah', 'bayufirmansyah@gmail.com', NULL, '$2y$12$wGjImXfAeivrWwtcVFOdwuejtegrM3pQ2.7C6JlgPvNU1/hcJyICm', NULL, '2025-07-21 21:35:52', '2025-07-21 21:35:52'),
(25, 'Nurmila Yunita', 'nurmila@gmail.com', NULL, '$2y$12$QM6L.5LpdJw6xcnaTdwwJuA1cKUTNi0w36jgWic.RKPGKRd1yTILS', NULL, '2025-07-21 21:36:26', '2025-07-23 23:00:08'),
(26, 'Ayu Lestari', 'ayulestari@gmail.com', NULL, '$2y$12$VvSTgwp2mn/LAquH0vNSl.3kAjWJ4.q1yt2y6JysmoncAApp9DZOG', NULL, '2025-07-21 21:37:10', '2025-07-21 21:37:10'),
(28, 'Ade Meriana', 'ademeriana@gmail.com', NULL, '$2y$12$bpAhP2MAgZdk7hXUmUNmEuWaNphWC3YUlZzswF.NKPC8PCNIfnWge', NULL, '2025-07-23 21:59:44', '2025-07-23 21:59:44'),
(29, 'Rosanih', 'rosanih@gmail.com', NULL, '$2y$12$zfoo51LbjeQuOYm31z08nesf2CiVzIKv8xou1HVgPXRHzWJPUYmjy', NULL, '2025-07-23 22:52:26', '2025-07-23 22:52:26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gurus_nip_unique` (`nip`),
  ADD KEY `gurus_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `guru_mapel`
--
ALTER TABLE `guru_mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guru_mapel_guru_id_foreign` (`guru_id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_tingkat_kelas_id_foreign` (`tingkat_kelas_id`);

--
-- Indeks untuk tabel `mapel_masters`
--
ALTER TABLE `mapel_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mata_pelajarans`
--
ALTER TABLE `mata_pelajarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mata_pelajarans_tingkat_kelas_id_foreign` (`tingkat_kelas_id`),
  ADD KEY `mata_pelajarans_mapel_master_id_foreign` (`mapel_master_id`),
  ADD KEY `mata_pelajarans_guru_id_foreign` (`guru_id`),
  ADD KEY `mata_pelajarans_tahun_ajaran_id_foreign` (`tahun_ajaran_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilais_siswa_kelas_id_foreign` (`siswa_kelas_id`),
  ADD KEY `nilais_mapel_master_id_foreign` (`mapel_master_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayarans_tagihan_id_foreign` (`tagihan_id`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswas_nis_unique` (`nis`),
  ADD KEY `siswas_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_kelas_siswa_id_tahun_ajaran_id_unique` (`siswa_id`,`tahun_ajaran_id`),
  ADD KEY `siswa_kelas_kelas_id_foreign` (`kelas_id`),
  ADD KEY `siswa_kelas_tahun_ajaran_id_foreign` (`tahun_ajaran_id`);

--
-- Indeks untuk tabel `spps`
--
ALTER TABLE `spps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spps_tahun_ajaran_id_foreign` (`tahun_ajaran_id`);

--
-- Indeks untuk tabel `tagihans`
--
ALTER TABLE `tagihans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagihans_spp_id_foreign` (`spp_id`),
  ADD KEY `tagihans_siswa_kelas_id_foreign` (`siswa_kelas_id`);

--
-- Indeks untuk tabel `tahun_ajarans`
--
ALTER TABLE `tahun_ajarans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tahun_ajarans_nama_tahun_unique` (`nama_tahun`);

--
-- Indeks untuk tabel `tingkat_kelas`
--
ALTER TABLE `tingkat_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `guru_mapel`
--
ALTER TABLE `guru_mapel`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `mapel_masters`
--
ALTER TABLE `mapel_masters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `mata_pelajarans`
--
ALTER TABLE `mata_pelajarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `spps`
--
ALTER TABLE `spps`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tagihans`
--
ALTER TABLE `tagihans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajarans`
--
ALTER TABLE `tahun_ajarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tingkat_kelas`
--
ALTER TABLE `tingkat_kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gurus`
--
ALTER TABLE `gurus`
  ADD CONSTRAINT `gurus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `guru_mapel`
--
ALTER TABLE `guru_mapel`
  ADD CONSTRAINT `guru_mapel_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `gurus` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_tingkat_kelas_id_foreign` FOREIGN KEY (`tingkat_kelas_id`) REFERENCES `tingkat_kelas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mata_pelajarans`
--
ALTER TABLE `mata_pelajarans`
  ADD CONSTRAINT `mata_pelajarans_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `gurus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mata_pelajarans_mapel_master_id_foreign` FOREIGN KEY (`mapel_master_id`) REFERENCES `mapel_masters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mata_pelajarans_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajarans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mata_pelajarans_tingkat_kelas_id_foreign` FOREIGN KEY (`tingkat_kelas_id`) REFERENCES `tingkat_kelas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilais`
--
ALTER TABLE `nilais`
  ADD CONSTRAINT `nilais_mapel_master_id_foreign` FOREIGN KEY (`mapel_master_id`) REFERENCES `mapel_masters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilais_siswa_kelas_id_foreign` FOREIGN KEY (`siswa_kelas_id`) REFERENCES `siswa_kelas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD CONSTRAINT `pembayarans_tagihan_id_foreign` FOREIGN KEY (`tagihan_id`) REFERENCES `tagihans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  ADD CONSTRAINT `siswa_kelas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_kelas_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_kelas_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajarans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `spps`
--
ALTER TABLE `spps`
  ADD CONSTRAINT `spps_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajarans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tagihans`
--
ALTER TABLE `tagihans`
  ADD CONSTRAINT `tagihans_siswa_kelas_id_foreign` FOREIGN KEY (`siswa_kelas_id`) REFERENCES `siswa_kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tagihans_spp_id_foreign` FOREIGN KEY (`spp_id`) REFERENCES `spps` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
