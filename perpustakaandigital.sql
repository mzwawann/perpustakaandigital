-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 21, 2025 at 05:44 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaandigital`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `user_id`, `nama_lengkap`, `email`, `telepon`, `alamat`, `photo`, `role`, `created_at`, `updated_at`) VALUES
(4, 2025031336548467, 'Mzwawannn', 'kurniawanfirdaus@gmail.com', '0895390631152', 'Grogol 8, Parangtritis, Kretek, Bantul', NULL, NULL, '2025-03-16 11:19:00', '2025-03-16 11:19:00'),
(5, 2025031576430351, 'kiaaaa', 'zazkia@gmail.com', '0895415532140', 'Semampir, Panjangrejo, Pundong, Bantul', NULL, NULL, '2025-03-16 11:19:00', '2025-03-16 11:19:00'),
(6, 2025031625997410, 'Arongg', 'arongg@gmail.com', '0896785387764', 'Giwangan UH7', NULL, NULL, '2025-03-16 11:19:00', '2025-03-16 11:19:00'),
(9, 2025031641547436, 'frdswwn', 'f@gmail.com', '0895678434452', 'Paris, Kretek', NULL, NULL, '2025-03-16 11:19:00', '2025-03-16 11:19:00'),
(19, 2025031336548467, 'Mzwawannn', 'kurniawanfirdaus@gmail.com', '0895390631152', 'Grogol 8, Parangtritis, Kretek, Bantul', NULL, NULL, '2025-03-16 11:48:46', '2025-03-16 11:48:46'),
(20, 2025031576430351, 'kiaaaa', 'zazkia@gmail.com', '0895415532140', 'Semampir, Panjangrejo, Pundong, Bantul', NULL, NULL, '2025-03-16 11:48:46', '2025-03-16 11:48:46'),
(21, 2025031625997410, 'Arongg', 'arongg@gmail.com', '0896785387764', 'Giwangan UH7', NULL, NULL, '2025-03-16 11:48:46', '2025-03-16 11:48:46'),
(22, 2025031641547436, 'frdswwn', 'f@gmail.com', '0895678434452', 'Paris, Kretek', NULL, NULL, '2025-03-16 11:48:46', '2025-03-16 11:48:46'),
(23, 2025031657229647, 'kreshna', 'kreshna@gmail.com', '09876574321', 'Manding, Jogja', NULL, NULL, '2025-03-16 11:48:46', '2025-03-16 11:48:46'),
(25, 2025032020162281, 'tes', 'tes@gmail.com', '098765432', 'tes', NULL, NULL, '2025-03-20 01:44:25', '2025-03-20 01:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `bukus`
--

CREATE TABLE `bukus` (
  `id` bigint UNSIGNED NOT NULL,
  `judul_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_buku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `rack_id` bigint UNSIGNED DEFAULT NULL,
  `tahun_terbit` year NOT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bukus`
--

INSERT INTO `bukus` (`id`, `judul_buku`, `penulis`, `penerbit`, `description`, `cover`, `code_buku`, `category_id`, `rack_id`, `tahun_terbit`, `stock`, `created_at`, `updated_at`) VALUES
(2025031255373196, 'Bocah Andromeda', 'Marselina Andriani', 'Novel Dewasa Muda', '<p><strong>The standard Lorem Ipsum passage</strong></p><p>used since the 1500s \"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. <em>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</em></p><p><br></p><p><strong>Section 1.10.32 of \"de Finibus Bonorum et Malorum\"</strong></p><p>written by Cicero in 45 BC \"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p>', 'uploads/covers/01JP40BHFJKA9TBDNF3F7A60KP.webp', NULL, 13, 5, '2025', 200, '2025-03-12 01:43:54', '2025-03-12 01:50:26'),
(2025031260636435, 'Lukisan Awan', 'Shawn Garcia', 'example', '<p><strong>The standard Lorem Ipsum passage </strong></p><p>used since the 1500s \"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. <em>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</em></p><p><br></p><p><strong>Section 1.10.32 of \"de Finibus Bonorum et Malorum\"</strong></p><p> written by Cicero in 45 BC \"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p>', 'uploads/covers/01JP40F7022NJVZZATXCZM02NV.webp', NULL, 10, 2, '2025', 240, '2025-03-12 01:45:54', '2025-03-12 01:50:52'),
(2025031394918087, '2024 Laporan tahunan', 'Cahaya dewi', 'example', '<p><strong>Lorem ipsum</strong></p><p><em>Lorem ipsum</em></p><p><span style=\"text-decoration: underline;\">Lorem ipsum</span></p><p>Lorem ipsum</p>', 'uploads/covers/01JP6RSXRNVWF991MMKY1V5B2Y.webp', NULL, 11, 3, '2025', 238, '2025-03-13 03:29:40', '2025-03-13 03:31:16'),
(2025031511624462, 'Lukisan senja', 'Cahaya dewi', 'example', '<p><strong>Lorem ipsum odor amet</strong></p><p>&nbsp;consectetuer adipiscing elit. Auctor fringilla facilisi bibendum tristique, pulvinar bibendum leo duis. Bibendum vivamus dictum diam odio quam vestibulum aenean ullamcorper commodo. Egestas fusce neque platea felis libero. Mollis augue libero orci placerat platea curabitur volutpat. Volutpat per ipsum sem potenti efficitur fringilla placerat ullamcorper. Urna justo metus ligula auctor adipiscing dignissim habitasse commodo. <em>Ante egestas consectetur ante vivamus cubilia congue.</em></p><p><span style=\"text-decoration: underline;\">Erat adipiscing sem non fusce malesuada donec</span>, a consequat fames. Ultrices morbi vestibulum suscipit duis; viverra habitasse. Eget ac vulputate risus nec vitae per. Dapibus pretium varius maximus; per maecenas et. Leo pharetra non, ornare laoreet enim laoreet. Morbi vel bibendum mi curabitur at cursus. Odio justo tortor velit porttitor rhoncus sapien luctus. Quis in ex velit proin; porta volutpat.</p>', 'uploads/covers/01JPAYJFWZP063PX6KEMCA6PFM.jpg', NULL, 12, 5, '2025', 249, '2025-03-14 18:27:26', '2025-03-14 18:27:26'),
(2025031512547817, 'Sebuah simfoni sinar matahari', 'Eleanor fitzgerald', 'example', '<p><strong>Lorem ipsum odor amet</strong></p><p>&nbsp;consectetuer adipiscing elit. Auctor fringilla facilisi bibendum tristique, pulvinar bibendum leo duis. Bibendum vivamus dictum diam odio quam vestibulum aenean ullamcorper commodo. Egestas fusce neque platea felis libero. Mollis augue libero orci placerat platea curabitur volutpat. Volutpat per ipsum sem potenti efficitur fringilla placerat ullamcorper. Urna justo metus ligula auctor adipiscing dignissim habitasse commodo. <em>Ante egestas consectetur ante vivamus cubilia congue.</em></p><p><span style=\"text-decoration: underline;\">Erat adipiscing sem non fusce malesuada donec</span>, a consequat fames. Ultrices morbi vestibulum suscipit duis; viverra habitasse. Eget ac vulputate risus nec vitae per. Dapibus pretium varius maximus; per maecenas et. Leo pharetra non, ornare laoreet enim laoreet. Morbi vel bibendum mi curabitur at cursus. Odio justo tortor velit porttitor rhoncus sapien luctus. Quis in ex velit proin; porta volutpat.</p>', 'uploads/covers/01JPAYSGRXVB4SYKHVV8J7EYAD.jpg', NULL, 13, 4, '2025', 250, '2025-03-14 18:31:16', '2025-03-14 18:31:16'),
(2025031528843895, 'Kala senja menyapa', 'Rosa maria aguado', 'Rosa maria aguado', '<p><strong>Lorem ipsum odor amet</strong></p><p>&nbsp;consectetuer adipiscing elit. Auctor fringilla facilisi bibendum tristique, pulvinar bibendum leo duis. Bibendum vivamus dictum diam odio quam vestibulum aenean ullamcorper commodo. Egestas fusce neque platea felis libero. Mollis augue libero orci placerat platea curabitur volutpat. Volutpat per ipsum sem potenti efficitur fringilla placerat ullamcorper. Urna justo metus ligula auctor adipiscing dignissim habitasse commodo. <em>Ante egestas consectetur ante vivamus cubilia congue.</em></p><p><span style=\"text-decoration: underline;\">Erat adipiscing sem non fusce malesuada donec</span>, a consequat fames. Ultrices morbi vestibulum suscipit duis; viverra habitasse. Eget ac vulputate risus nec vitae per. Dapibus pretium varius maximus; per maecenas et. Leo pharetra non, ornare laoreet enim laoreet. Morbi vel bibendum mi curabitur at cursus. Odio justo tortor velit porttitor rhoncus sapien luctus. Quis in ex velit proin; porta volutpat.</p>', 'uploads/covers/01JPAYGRM5SEGZ76CKYXR57X76.jpg', NULL, 11, 3, '2025', 250, '2025-03-14 18:26:29', '2025-03-14 18:26:29'),
(2025031530206696, 'Tema 1: Hidup Rukun', 'kemendikbud', 'example', '<p><strong>Lorem ipsum odor amet</strong></p><p>&nbsp;consectetuer adipiscing elit. Auctor fringilla facilisi bibendum tristique, pulvinar bibendum leo duis. Bibendum vivamus dictum diam odio quam vestibulum aenean ullamcorper commodo. Egestas fusce neque platea felis libero. Mollis augue libero orci placerat platea curabitur volutpat. Volutpat per ipsum sem potenti efficitur fringilla placerat ullamcorper. Urna justo metus ligula auctor adipiscing dignissim habitasse commodo. <em>Ante egestas consectetur ante vivamus cubilia congue.</em></p><p><span style=\"text-decoration: underline;\">Erat adipiscing sem non fusce malesuada donec</span>, a consequat fames. Ultrices morbi vestibulum suscipit duis; viverra habitasse. Eget ac vulputate risus nec vitae per. Dapibus pretium varius maximus; per maecenas et. Leo pharetra non, ornare laoreet enim laoreet. Morbi vel bibendum mi curabitur at cursus. Odio justo tortor velit porttitor rhoncus sapien luctus. Quis in ex velit proin; porta volutpat.</p>', 'uploads/covers/01JPAZA2E50V3VDVYSYECJP41S.jpg', NULL, 11, 4, '2025', 200, '2025-03-14 18:40:18', '2025-03-16 08:58:05'),
(2025031549758051, 'Senja yang menyakitkan', 'Chidi eze', 'example', '<p><strong>Lorem ipsum odor amet</strong></p><p>&nbsp;consectetuer adipiscing elit. Auctor fringilla facilisi bibendum tristique, pulvinar bibendum leo duis. Bibendum vivamus dictum diam odio quam vestibulum aenean ullamcorper commodo. Egestas fusce neque platea felis libero. Mollis augue libero orci placerat platea curabitur volutpat. Volutpat per ipsum sem potenti efficitur fringilla placerat ullamcorper. Urna justo metus ligula auctor adipiscing dignissim habitasse commodo. <em>Ante egestas consectetur ante vivamus cubilia congue.</em></p><p><span style=\"text-decoration: underline;\">Erat adipiscing sem non fusce malesuada donec</span>, a consequat fames. Ultrices morbi vestibulum suscipit duis; viverra habitasse. Eget ac vulputate risus nec vitae per. Dapibus pretium varius maximus; per maecenas et. Leo pharetra non, ornare laoreet enim laoreet. Morbi vel bibendum mi curabitur at cursus. Odio justo tortor velit porttitor rhoncus sapien luctus. Quis in ex velit proin; porta volutpat.</p>', 'uploads/covers/01JPAYMRD39DNQ35RXESZRJH6T.jpg', NULL, 12, 3, '2025', 249, '2025-03-14 18:28:40', '2025-03-14 18:28:40'),
(2025031565401889, 'Perspektif pendidikan dalam bingkai ilmu dan tokoh', 'Kurniawan', 'example', '<p><strong>Lorem ipsum odor amet</strong></p><p>&nbsp;consectetuer adipiscing elit. Auctor fringilla facilisi bibendum tristique, pulvinar bibendum leo duis. Bibendum vivamus dictum diam odio quam vestibulum aenean ullamcorper commodo. Egestas fusce neque platea felis libero. Mollis augue libero orci placerat platea curabitur volutpat. Volutpat per ipsum sem potenti efficitur fringilla placerat ullamcorper. Urna justo metus ligula auctor adipiscing dignissim habitasse commodo. <em>Ante egestas consectetur ante vivamus cubilia congue.</em></p><p><span style=\"text-decoration: underline;\">Erat adipiscing sem non fusce malesuada donec</span>, a consequat fames. Ultrices morbi vestibulum suscipit duis; viverra habitasse. Eget ac vulputate risus nec vitae per. Dapibus pretium varius maximus; per maecenas et. Leo pharetra non, ornare laoreet enim laoreet. Morbi vel bibendum mi curabitur at cursus. Odio justo tortor velit porttitor rhoncus sapien luctus. Quis in ex velit proin; porta volutpat.</p>', 'uploads/covers/01JPAZ0QD7W4GD46669Z670EWW.jpg', NULL, 14, 4, '2025', 200, '2025-03-14 18:35:12', '2025-03-14 18:35:12'),
(2025031568563857, 'Sejarah Indonesia kelas XI', 'kemendikbud', 'example', '<p><strong>Lorem ipsum odor amet</strong></p><p>&nbsp;consectetuer adipiscing elit. Auctor fringilla facilisi bibendum tristique, pulvinar bibendum leo duis. Bibendum vivamus dictum diam odio quam vestibulum aenean ullamcorper commodo. Egestas fusce neque platea felis libero. Mollis augue libero orci placerat platea curabitur volutpat. Volutpat per ipsum sem potenti efficitur fringilla placerat ullamcorper. Urna justo metus ligula auctor adipiscing dignissim habitasse commodo. <em>Ante egestas consectetur ante vivamus cubilia congue.</em></p><p><span style=\"text-decoration: underline;\">Erat adipiscing sem non fusce malesuada donec</span>, a consequat fames. Ultrices morbi vestibulum suscipit duis; viverra habitasse. Eget ac vulputate risus nec vitae per. Dapibus pretium varius maximus; per maecenas et. Leo pharetra non, ornare laoreet enim laoreet. Morbi vel bibendum mi curabitur at cursus. Odio justo tortor velit porttitor rhoncus sapien luctus. Quis in ex velit proin; porta volutpat.</p>', 'uploads/covers/01JPAZ4EFCRA901P2HE85GWMHM.jpg', NULL, 14, 4, '2025', 200, '2025-03-14 18:37:14', '2025-03-14 18:37:14'),
(2025031568762259, 'Tema 6: Cita-citaku', 'kemendikbud', 'example', '<p><strong>Lorem ipsum odor amet</strong></p><p>&nbsp;consectetuer adipiscing elit. Auctor fringilla facilisi bibendum tristique, pulvinar bibendum leo duis. Bibendum vivamus dictum diam odio quam vestibulum aenean ullamcorper commodo. Egestas fusce neque platea felis libero. Mollis augue libero orci placerat platea curabitur volutpat. Volutpat per ipsum sem potenti efficitur fringilla placerat ullamcorper. Urna justo metus ligula auctor adipiscing dignissim habitasse commodo. <em>Ante egestas consectetur ante vivamus cubilia congue.</em></p><p><span style=\"text-decoration: underline;\">Erat adipiscing sem non fusce malesuada donec</span>, a consequat fames. Ultrices morbi vestibulum suscipit duis; viverra habitasse. Eget ac vulputate risus nec vitae per. Dapibus pretium varius maximus; per maecenas et. Leo pharetra non, ornare laoreet enim laoreet. Morbi vel bibendum mi curabitur at cursus. Odio justo tortor velit porttitor rhoncus sapien luctus. Quis in ex velit proin; porta volutpat.</p>', 'uploads/covers/01JPAYXJEDSKK1K81WA31082MT.png', NULL, 11, 3, '2025', 200, '2025-03-14 18:33:29', '2025-03-14 18:33:29'),
(2025031572275969, 'Cerita dari negeri dongeng', 'Sacha', 'example', '<p><strong>Lorem ipsum odor amet</strong></p><p>&nbsp;consectetuer adipiscing elit. Auctor fringilla facilisi bibendum tristique, pulvinar bibendum leo duis. Bibendum vivamus dictum diam odio quam vestibulum aenean ullamcorper commodo. Egestas fusce neque platea felis libero. Mollis augue libero orci placerat platea curabitur volutpat. Volutpat per ipsum sem potenti efficitur fringilla placerat ullamcorper. Urna justo metus ligula auctor adipiscing dignissim habitasse commodo. <em>Ante egestas consectetur ante vivamus cubilia congue.</em></p><p><span style=\"text-decoration: underline;\">Erat adipiscing sem non fusce malesuada donec</span>, a consequat fames. Ultrices morbi vestibulum suscipit duis; viverra habitasse. Eget ac vulputate risus nec vitae per. Dapibus pretium varius maximus; per maecenas et. Leo pharetra non, ornare laoreet enim laoreet. Morbi vel bibendum mi curabitur at cursus. Odio justo tortor velit porttitor rhoncus sapien luctus. Quis in ex velit proin; porta volutpat.</p>', 'uploads/covers/01JPAYQM1XWDPKJCJ0J1J7KG0Z.jpg', NULL, 11, 4, '2025', 250, '2025-03-14 18:30:14', '2025-03-14 18:30:14'),
(2025031573109503, 'Digital Marketing', 'Drs. Usman Chamdani', 'example', '<p><strong>Lorem ipsum odor amet</strong></p><p>&nbsp;consectetuer adipiscing elit. Auctor fringilla facilisi bibendum tristique, pulvinar bibendum leo duis. Bibendum vivamus dictum diam odio quam vestibulum aenean ullamcorper commodo. Egestas fusce neque platea felis libero. Mollis augue libero orci placerat platea curabitur volutpat. Volutpat per ipsum sem potenti efficitur fringilla placerat ullamcorper. Urna justo metus ligula auctor adipiscing dignissim habitasse commodo. <em>Ante egestas consectetur ante vivamus cubilia congue.</em></p><p><span style=\"text-decoration: underline;\">Erat adipiscing sem non fusce malesuada donec</span>, a consequat fames. Ultrices morbi vestibulum suscipit duis; viverra habitasse. Eget ac vulputate risus nec vitae per. Dapibus pretium varius maximus; per maecenas et. Leo pharetra non, ornare laoreet enim laoreet. Morbi vel bibendum mi curabitur at cursus. Odio justo tortor velit porttitor rhoncus sapien luctus. Quis in ex velit proin; porta volutpat.</p>', 'uploads/covers/01JPAYWB0FVF87WABNYD3DZFMA.jpg', NULL, 13, 4, '2025', 199, '2025-03-14 18:32:48', '2025-03-14 18:32:48'),
(2025031577368193, 'Kedamaian', 'Riki santo', 'example', '<p><strong>Lorem ipsum odor amet</strong></p><p>&nbsp;consectetuer adipiscing elit. Auctor fringilla facilisi bibendum tristique, pulvinar bibendum leo duis. Bibendum vivamus dictum diam odio quam vestibulum aenean ullamcorper commodo. Egestas fusce neque platea felis libero. Mollis augue libero orci placerat platea curabitur volutpat. Volutpat per ipsum sem potenti efficitur fringilla placerat ullamcorper. Urna justo metus ligula auctor adipiscing dignissim habitasse commodo. <em>Ante egestas consectetur ante vivamus cubilia congue.</em></p><p><span style=\"text-decoration: underline;\">Erat adipiscing sem non fusce malesuada donec</span>, a consequat fames. Ultrices morbi vestibulum suscipit duis; viverra habitasse. Eget ac vulputate risus nec vitae per. Dapibus pretium varius maximus; per maecenas et. Leo pharetra non, ornare laoreet enim laoreet. Morbi vel bibendum mi curabitur at cursus. Odio justo tortor velit porttitor rhoncus sapien luctus. Quis in ex velit proin; porta volutpat.</p>', 'uploads/covers/01JPAYP2M5FW533QPF7ENWNKYG.jpg', NULL, 13, 4, '2025', 249, '2025-02-27 18:29:23', '2025-03-14 18:29:23'),
(2025031582939461, 'Zaman perang', 'Hendi jo', 'example', '<p><strong>Lorem ipsum odor amet</strong></p><p>&nbsp;consectetuer adipiscing elit. Auctor fringilla facilisi bibendum tristique, pulvinar bibendum leo duis. Bibendum vivamus dictum diam odio quam vestibulum aenean ullamcorper commodo. Egestas fusce neque platea felis libero. Mollis augue libero orci placerat platea curabitur volutpat. Volutpat per ipsum sem potenti efficitur fringilla placerat ullamcorper. Urna justo metus ligula auctor adipiscing dignissim habitasse commodo. <em>Ante egestas consectetur ante vivamus cubilia congue.</em></p><p><span style=\"text-decoration: underline;\">Erat adipiscing sem non fusce malesuada donec</span>, a consequat fames. Ultrices morbi vestibulum suscipit duis; viverra habitasse. Eget ac vulputate risus nec vitae per. Dapibus pretium varius maximus; per maecenas et. Leo pharetra non, ornare laoreet enim laoreet. Morbi vel bibendum mi curabitur at cursus. Odio justo tortor velit porttitor rhoncus sapien luctus. Quis in ex velit proin; porta volutpat.</p>', 'uploads/covers/01JPAZ1S2WZGJ1PWXQK8CA8ZF6.jpg', NULL, 14, 1, '2025', 200, '2025-02-26 18:35:47', '2025-03-14 18:35:47'),
(2025031588131204, 'Keamanan komputer', 'Gede surya mahendra', 'example', '<p><strong>Lorem ipsum odor amet</strong></p><p>&nbsp;consectetuer adipiscing elit. Auctor fringilla facilisi bibendum tristique, pulvinar bibendum leo duis. Bibendum vivamus dictum diam odio quam vestibulum aenean ullamcorper commodo. Egestas fusce neque platea felis libero. Mollis augue libero orci placerat platea curabitur volutpat. Volutpat per ipsum sem potenti efficitur fringilla placerat ullamcorper. Urna justo metus ligula auctor adipiscing dignissim habitasse commodo. <em>Ante egestas consectetur ante vivamus cubilia congue.</em></p><p><span style=\"text-decoration: underline;\">Erat adipiscing sem non fusce malesuada donec</span>, a consequat fames. Ultrices morbi vestibulum suscipit duis; viverra habitasse. Eget ac vulputate risus nec vitae per. Dapibus pretium varius maximus; per maecenas et. Leo pharetra non, ornare laoreet enim laoreet. Morbi vel bibendum mi curabitur at cursus. Odio justo tortor velit porttitor rhoncus sapien luctus. Quis in ex velit proin; porta volutpat.</p>', 'uploads/covers/01JPAZ39GYEMA71ARD2BPD4N70.webp', NULL, 15, 5, '2025', 200, '2025-01-29 18:36:36', '2025-03-14 18:36:36'),
(2025031591448220, 'Implementasi jaringan komputer', 'Januar al amien || Harun mukhtar', 'example', '<p><strong>Lorem ipsum odor amet</strong></p><p>&nbsp;consectetuer adipiscing elit. Auctor fringilla facilisi bibendum tristique, pulvinar bibendum leo duis. Bibendum vivamus dictum diam odio quam vestibulum aenean ullamcorper commodo. Egestas fusce neque platea felis libero. Mollis augue libero orci placerat platea curabitur volutpat. Volutpat per ipsum sem potenti efficitur fringilla placerat ullamcorper. Urna justo metus ligula auctor adipiscing dignissim habitasse commodo. <em>Ante egestas consectetur ante vivamus cubilia congue.</em></p><p><span style=\"text-decoration: underline;\">Erat adipiscing sem non fusce malesuada donec</span>, a consequat fames. Ultrices morbi vestibulum suscipit duis; viverra habitasse. Eget ac vulputate risus nec vitae per. Dapibus pretium varius maximus; per maecenas et. Leo pharetra non, ornare laoreet enim laoreet. Morbi vel bibendum mi curabitur at cursus. Odio justo tortor velit porttitor rhoncus sapien luctus. Quis in ex velit proin; porta volutpat.</p>', 'uploads/covers/01JPAZ6K5K0G0CGDHPXWTR7EEY.jpg', NULL, 15, 4, '2025', 200, '2025-01-21 18:38:24', '2025-03-14 18:38:24'),
(2025031595695907, 'Kisah kasih senja', 'Rona alvarado', 'example', '<p><strong>Lorem ipsum odor amet</strong></p><p>&nbsp;consectetuer adipiscing elit. Auctor fringilla facilisi bibendum tristique, pulvinar bibendum leo duis. Bibendum vivamus dictum diam odio quam vestibulum aenean ullamcorper commodo. Egestas fusce neque platea felis libero. Mollis augue libero orci placerat platea curabitur volutpat. Volutpat per ipsum sem potenti efficitur fringilla placerat ullamcorper. Urna justo metus ligula auctor adipiscing dignissim habitasse commodo. <em>Ante egestas consectetur ante vivamus cubilia congue.</em></p><p><span style=\"text-decoration: underline;\">Erat adipiscing sem non fusce malesuada donec</span>, a consequat fames. Ultrices morbi vestibulum suscipit duis; viverra habitasse. Eget ac vulputate risus nec vitae per. Dapibus pretium varius maximus; per maecenas et. Leo pharetra non, ornare laoreet enim laoreet. Morbi vel bibendum mi curabitur at cursus. Odio justo tortor velit porttitor rhoncus sapien luctus. Quis in ex velit proin; porta volutpat.</p>', 'uploads/covers/01JPAYETD9QFV3A48AH9CAYGW1.jpg', NULL, 11, 3, '2025', 200, '2025-01-07 18:25:25', '2025-03-14 18:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('d779b4c4d0dc854a3808a2c07a1e7e69b23d0095', 'i:1;', 1742347795),
('d779b4c4d0dc854a3808a2c07a1e7e69b23d0095:timer', 'i:1742347795;', 1742347795),
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:4:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:18:\"access_admin_panel\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:12:\"manage_books\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:12:\"manage_users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:13:\"approve_loans\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:1:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}}}', 1742577617);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(10, 'Novel', '2025-02-19 16:00:21', '2025-02-19 16:00:21'),
(11, 'Cerpen', '2025-02-19 16:12:49', '2025-02-19 16:12:49'),
(12, 'Asmara', '2025-02-19 16:13:28', '2025-02-19 16:13:28'),
(13, 'Motivasi', '2025-02-19 16:23:26', '2025-02-19 16:23:26'),
(14, 'Sejarah', '2025-03-14 18:33:45', '2025-03-14 18:33:45'),
(15, 'Pemrograman', '2025-03-14 18:33:51', '2025-03-14 18:33:51'),
(16, 'Pendidikan', '2025-03-19 01:30:53', '2025-03-19 01:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `buku_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `buku_id`, `created_at`, `updated_at`) VALUES
(75, 2025031336548467, 2025031260636435, '2025-03-13 10:25:22', '2025-03-13 10:25:22'),
(77, 2025031336548467, 2025031588131204, '2025-03-14 18:42:10', '2025-03-14 18:42:10'),
(78, 2025031336548467, 2025031582939461, '2025-03-14 18:42:14', '2025-03-14 18:42:14'),
(79, 2025031336548467, 2025031573109503, '2025-03-14 18:42:15', '2025-03-14 18:42:15'),
(80, 2025031336548467, 2025031577368193, '2025-03-14 18:42:17', '2025-03-14 18:42:17'),
(82, 2025031336548467, 2025031595695907, '2025-03-14 18:42:24', '2025-03-14 18:42:24'),
(84, 2025031625997410, 2025031568563857, '2025-03-16 15:19:10', '2025-03-16 15:19:10'),
(87, 2025031336548467, 2025031394918087, '2025-03-18 03:46:46', '2025-03-18 03:46:46'),
(89, 2025031336548467, 2025031530206696, '2025-03-19 01:22:15', '2025-03-19 01:22:15'),
(91, 2025031336548467, 2025031568563857, '2025-03-20 01:51:23', '2025-03-20 01:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_22_030609_create_bukus_table', 2),
(5, '2025_01_22_040017_create_peminjam_table', 3),
(6, '2025_01_23_231059_create_anggota_table', 4),
(7, '2025_01_23_231059_create_anggotas_table', 5),
(8, '2025_01_23_231819_create__peminjaman_bukus_table', 6),
(9, '2025_01_23_232354_create_peminjaman_bukus_table', 7),
(10, '2025_01_24_102441_create_categories_table', 8),
(11, '2025_02_04_144756_add_role_to_users_table', 9),
(12, '2025_02_10_205343_create_permission_tables', 10),
(13, '2025_02_12_110712_create_peminjamen_table', 11),
(14, '2025_02_12_110712_create_peminjaman_table', 12),
(15, '2025_02_12_132118_create_peminjamen_table', 13),
(16, '2025_02_12_135150_create_peminjamen_table', 14),
(17, '2025_02_12_213105_create_petugas_table', 15),
(18, '2025_02_13_102815_add_categories_to_bukus_table', 16),
(19, '2025_02_16_221552_add_cover_to_bukus_table', 17),
(20, '2025_02_16_231124_add_unique_to_categories', 18),
(21, '2025_02_16_231642_rename_category_to_category_id_in_bukus', 19),
(22, '2025_02_16_232500_add_category_id_to_bukus_table', 20),
(23, '2025_02_16_234643_drop_category_id_from_bukus_table', 21),
(24, '2025_02_16_234909_add_category_id_to_bukus_table', 22),
(25, '2025_02_18_115736_drop_jumlah_from_bukus', 23),
(26, '2025_02_18_142226_create_racks_table', 24),
(27, '2025_02_18_142403_add_rack_id_to_bukus_table', 24),
(28, '2025_02_18_143128_drop_rack_id_from_bukus_table', 25),
(29, '2025_02_18_143321_add_rack_id_to_bukus_table', 26),
(30, '2025_02_20_232851_add_buku_id_to_peminjamen_table', 27),
(31, '2025_02_20_233821_remove_judul_buku_from_peminjamen', 28),
(32, '2025_02_21_000415_remove_uid_from_anggotas', 29),
(33, '2025_02_21_000908_add_anggota_id_to_peminjamen_table', 30),
(34, '2025_02_21_001707_remove_nama_anggota_from_peminjamen', 31),
(35, '2025_02_21_002450_drop_anggota_id_from_peminjamen', 32),
(36, '2025_02_21_002610_add_anggota_id_to_peminjamen_table', 33),
(37, '2025_02_24_094059_add_telepon_to_users_table', 34),
(38, '2025_03_01_195407_create_favorites_table', 35),
(39, '2025_03_01_204608_create_favorites_table', 36),
(40, '2025_03_06_132038_add_custom_fields_to_users_table', 37),
(42, '2025_03_06_132039_add_avatar_url_to_users_table', 38),
(43, '2025_03_06_221954_add_foreign_key_to_peminjamen_table', 39),
(44, '2025_03_07_091659_drop_anggotas_table', 40),
(45, '2025_03_07_224707_modify_deskripsi_column_on_bukus_table', 41),
(48, '2025_03_09_225717_update_status_default_peminjaman', 42),
(49, '2025_03_10_211117_add_stock_on_bukus_table', 42),
(52, '2025_03_10_213232_add_triggers_to_peminjaman', 43),
(53, '2025_03_10_211031_add_atock_on_bukus_table', 44),
(55, '2025_03_11_125427_create_reviews_table', 45),
(56, '2025_03_13_101810_change_code_buku_nullable_in_bukus_table', 46),
(57, '2025_03_13_114942_create_denda_table', 47),
(58, '2025_03_13_133510_update_denda_default_to_peminjaman_table', 48),
(59, '2025_03_16_173708_rename_petugas_to_anggota', 48),
(61, '2025_03_16_174139_add_trigger_to_users', 49),
(62, '2025_03_16_174725_update_uid_foreign_key', 50),
(63, '2025_03_16_175728_add_trigger_to_users', 51),
(64, '2025_03_16_180419_add_trigger_to_users', 52),
(65, '2025_03_16_180932_add_trigger_to_users_update', 53),
(69, '2025_03_19_091642_add_is_hidden_to_reviews', 54),
(70, '2025_03_19_132959_create_settings_table', 55);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjamen`
--

CREATE TABLE `peminjamen` (
  `id` bigint UNSIGNED NOT NULL,
  `buku_id` bigint UNSIGNED DEFAULT NULL,
  `anggota_id` bigint UNSIGNED DEFAULT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `tanggal_harus_kembali` date NOT NULL,
  `denda` int NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu konfirmasi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjamen`
--

INSERT INTO `peminjamen` (`id`, `buku_id`, `anggota_id`, `tanggal_peminjaman`, `tanggal_pengembalian`, `tanggal_harus_kembali`, `denda`, `status`, `created_at`, `updated_at`) VALUES
(59, 2025031260636435, 2025031336548467, '2025-03-03', '2025-03-14', '2025-03-14', 0, 'dikembalikan', '2025-02-13 06:12:14', '2025-03-14 05:26:20'),
(60, 2025031260636435, 2025031336548467, '2025-03-03', '2025-03-14', '2025-03-14', 0, 'dikembalikan', '2025-03-13 06:44:14', '2025-03-14 05:26:20'),
(61, 2025031260636435, 2025031336548467, '2025-03-09', '2025-03-14', '2025-03-14', 0, 'dikembalikan', '2025-03-13 06:45:15', '2025-03-14 05:26:20'),
(62, 2025031394918087, 2025031336548467, '2025-03-13', '2025-03-14', '2025-03-14', 0, 'dikembalikan', '2025-03-13 09:50:22', '2025-03-14 05:26:20'),
(63, 2025031255373196, 2025031336548467, '2025-03-13', '2025-03-14', '2025-03-14', 0, 'dikembalikan', '2025-03-13 10:19:09', '2025-03-14 05:26:20'),
(64, 2025031394918087, 9755098220250313, '2025-03-13', '2025-03-14', '2025-03-14', 0, 'dikembalikan', '2025-03-13 16:50:13', '2025-03-14 05:26:20'),
(65, 2025031260636435, 9755098220250313, '2025-03-07', '2025-03-14', '2025-03-14', 0, 'dikembalikan', '2025-03-13 17:26:24', '2025-03-14 05:26:20'),
(66, 2025031260636435, 2025031336548467, '2025-03-07', '2025-03-14', '2025-03-14', 0, 'dikembalikan', '2025-03-13 17:28:44', '2025-03-14 05:26:20'),
(67, 2025031260636435, 9755098220250313, '2025-03-07', '2025-03-14', '2025-03-14', 0, 'dikembalikan', '2025-03-13 17:29:33', '2025-03-14 05:26:20'),
(68, 2025031394918087, 2025031336548467, '2025-03-14', '2025-03-14', '2025-03-14', 0, 'dikembalikan', '2025-03-14 00:58:58', '2025-03-14 05:26:20'),
(69, 2025031394918087, 2025031336548467, '2025-03-14', '2025-03-14', '2025-03-14', 0, 'dikembalikan', '2025-03-14 01:18:58', '2025-03-14 05:26:20'),
(70, 2025031260636435, 2025031336548467, '2025-03-14', '2025-03-14', '2025-03-14', 0, 'dikembalikan', '2025-03-14 02:58:03', '2025-03-14 05:26:20'),
(71, 2025031260636435, 2025031336548467, '2025-03-14', '2025-03-14', '2025-03-14', 0, 'dikembalikan', '2025-03-14 03:08:36', '2025-03-14 05:26:20'),
(72, 2025031255373196, 2025031336548467, '2025-03-14', '2025-03-14', '2025-03-14', 0, 'dikembalikan', '2025-03-14 03:22:09', '2025-03-14 05:26:20'),
(73, 2025031255373196, 2025031336548467, '2025-03-14', '2025-03-14', '2025-03-14', 0, 'dikembalikan', '2025-03-14 03:25:25', '2025-03-14 05:26:20'),
(74, 2025031260636435, 2025031336548467, '2025-03-14', '2025-03-14', '2025-03-14', 0, 'dikembalikan', '2025-03-14 05:17:11', '2025-03-14 05:26:20'),
(75, 2025031394918087, 2025031336548467, '2025-03-14', '2025-03-14', '2025-03-14', 0, 'dikembalikan', '2025-03-14 05:17:31', '2025-03-14 05:26:20'),
(76, 2025031255373196, 9755098220250313, '2025-03-14', '2025-03-14', '2025-03-14', 0, 'dikembalikan', '2025-03-14 05:24:28', '2025-03-14 05:26:20'),
(77, 2025031582939461, 2025031336548467, '2025-03-15', '2025-03-15', '2025-03-22', 0, 'dikembalikan', '2025-03-14 18:42:59', '2025-03-14 18:45:12'),
(78, 2025031572275969, 2025031336548467, '2025-03-15', '2025-03-16', '2025-03-22', 0, 'dikembalikan', '2025-03-14 18:45:55', '2025-03-16 06:57:19'),
(79, 2025031582939461, 2025031576430351, '2025-03-15', '2025-03-15', '2025-03-19', 0, 'dikembalikan', '2025-03-15 04:15:57', '2025-03-15 04:17:33'),
(81, 2025031591448220, 2025031336548467, '2025-03-16', '2025-03-16', '2025-03-21', 0, 'dikembalikan', '2025-03-16 08:48:56', '2025-03-16 08:49:53'),
(82, 2025031591448220, 2025031336548467, '2025-03-16', '2025-03-16', '2025-03-22', 0, 'dikembalikan', '2025-03-16 08:51:05', '2025-03-16 08:52:40'),
(83, 2025031565401889, 2025031336548467, '2025-03-19', '2025-03-19', '2025-03-26', 0, 'dikembalikan', '2025-03-19 01:23:17', '2025-03-19 01:26:16'),
(84, 2025031255373196, 2025031336548467, '2025-03-13', '2025-03-19', '2025-03-17', 16000, 'dikembalikan', '2025-03-19 06:40:00', '2025-03-19 16:04:32'),
(85, 2025031394918087, 2025031625997410, '2025-03-13', '2025-03-19', '2025-03-16', 24000, 'dikembalikan', '2025-03-19 06:51:38', '2025-03-19 16:04:53'),
(87, 2025031511624462, 2025031576430351, '2025-03-12', '2025-03-19', '2025-03-17', 16000, 'dikembalikan', '2025-03-19 16:19:42', '2025-03-19 16:20:51'),
(88, 2025031512547817, 2025031641547436, '2025-03-12', '2025-03-19', '2025-03-16', 30000, 'dikembalikan', '2025-03-19 16:23:03', '2025-03-19 16:23:27'),
(89, 2025031255373196, 2025031336548467, '2025-03-12', '2025-03-19', '2025-03-17', 20000, 'dikembalikan', '2025-03-19 16:26:12', '2025-03-19 16:44:09'),
(90, 2025031568563857, 2025031336548467, '2025-03-12', '2025-03-19', '2025-03-16', 0, 'dikembalikan', '2025-03-19 16:49:16', '2025-03-19 16:50:52'),
(91, 2025031577368193, 2025031336548467, '2025-03-12', NULL, '2025-03-17', 40000, 'dipinjam', '2025-03-19 16:51:35', '2025-03-20 17:18:55'),
(92, 2025031511624462, 2025031336548467, '2025-03-11', NULL, '2025-03-16', 50000, 'dipinjam', '2025-03-19 16:57:01', '2025-03-20 17:18:55'),
(93, 2025031394918087, 2025031336548467, '2025-03-13', NULL, '2025-03-18', 30000, 'dipinjam', '2025-03-19 17:23:50', '2025-03-20 17:18:55'),
(94, 2025031549758051, 2025032020162281, '2025-03-15', NULL, '2025-03-18', 20000, 'dipinjam', '2025-03-20 01:45:47', '2025-03-20 01:48:05'),
(95, 2025031573109503, 2025031336548467, '2025-03-20', NULL, '2025-03-22', 0, 'dipinjam', '2025-03-20 03:32:00', '2025-03-20 17:21:01');

--
-- Triggers `peminjamen`
--
DELIMITER $$
CREATE TRIGGER `kurangi_stock_saat_dipinjam` AFTER UPDATE ON `peminjamen` FOR EACH ROW BEGIN
                IF NEW.status = "dipinjam" AND OLD.status = "menunggu konfirmasi" THEN
                    UPDATE bukus 
                    SET stock = stock - 1 
                    WHERE id = NEW.buku_id;
                END IF;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_stock_saat_dikembalikan` AFTER UPDATE ON `peminjamen` FOR EACH ROW BEGIN
                IF NEW.status = "dikembalikan" AND OLD.status = "dipinjam" THEN
                    UPDATE bukus 
                    SET stock = stock + 1 
                    WHERE id = NEW.buku_id;
                END IF;
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'access_admin_panel', 'web', '2025-03-17 06:13:32', '2025-03-17 06:13:32'),
(2, 'manage_books', 'web', '2025-03-17 06:13:32', '2025-03-17 06:13:32'),
(3, 'manage_users', 'web', '2025-03-17 06:13:32', '2025-03-17 06:13:32'),
(4, 'approve_loans', 'web', '2025-03-17 06:13:32', '2025-03-17 06:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `racks`
--

CREATE TABLE `racks` (
  `id` bigint UNSIGNED NOT NULL,
  `rack_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `racks`
--

INSERT INTO `racks` (`id`, `rack_name`, `created_at`, `updated_at`) VALUES
(1, 'RAK NOMOR 1', '2025-02-18 07:42:04', '2025-02-18 07:42:04'),
(2, 'RAK NOMOR 2', '2025-02-18 07:42:14', '2025-02-18 07:42:43'),
(3, 'RAK NOMOR 3', '2025-02-18 07:42:54', '2025-02-18 07:42:54'),
(4, 'RAK NOMOR 4', '2025-02-18 07:43:00', '2025-02-18 07:43:00'),
(5, 'RAK NOMOR 5', '2025-02-18 07:43:05', '2025-02-18 07:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `buku_id` bigint UNSIGNED NOT NULL,
  `rating` int NOT NULL COMMENT 'Nilai rating dari 1-5',
  `komentar` text COLLATE utf8mb4_unicode_ci,
  `is_hidden` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `buku_id`, `rating`, `komentar`, `is_hidden`, `created_at`, `updated_at`) VALUES
(17, 2025031336548467, 2025031255373196, 4, NULL, 0, '2025-03-13 03:53:02', '2025-03-19 02:44:48'),
(18, 2025031336548467, 2025031260636435, 5, NULL, 0, '2025-03-13 10:19:43', '2025-03-19 02:44:48'),
(20, 2025031336548467, 2025031582939461, 5, NULL, 0, '2025-03-15 03:13:58', '2025-03-20 01:33:15'),
(21, 2025031336548467, 2025031582939461, 5, 'Buku ini sangat bagus, kita jadi tahu bagaimana kehidupan pada zaman kolonial!', 0, '2025-03-15 04:13:59', '2025-03-15 04:13:59'),
(22, 2025031576430351, 2025031582939461, 5, 'Buku ini saat bermanfaat untuk menambah pengetahuan tentang sejarah masa lampau', 0, '2025-03-15 04:18:06', '2025-03-15 04:18:06'),
(23, 2025031627453537, 2025031582939461, 4, 'bagusss banget bukunyaaaa cuyyy', 0, '2025-03-16 06:58:33', '2025-03-16 15:16:36'),
(24, 2025031336548467, 2025031591448220, 5, 'sangat membantu dalam mempelajari jaringan komputer', 0, '2025-03-17 14:57:59', '2025-03-20 01:32:57'),
(25, 2025031336548467, 2025031565401889, 5, 'bukunya bagus banget', 0, '2025-03-19 01:26:37', '2025-03-19 06:50:36'),
(26, 2025031336548467, 2025031591448220, 5, 'buku ini cocok untuk pemula yang ingin memulai mempelajari tentang jaringan komputer', 0, '2025-03-20 01:35:01', '2025-03-20 01:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-02-10 13:59:43', '2025-02-10 13:59:43'),
(2, 'petugas', 'web', '2025-02-10 13:59:43', '2025-02-10 13:59:43'),
(3, 'user', 'web', '2025-02-10 14:03:42', '2025-02-10 14:03:42');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('AACOspgcAEHm9XXgZXWMnGMfJ86o4LAA2c39SWHA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR010Q05SMTVzZnU3WVJnYmtFZ2cxSDFXd09IMDIyRnJQMzBOZndocSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9wZXJwdXN0YWthYW5kaWdpdGFsLnRlc3Q6ODA4MCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742449287),
('kMKPGBL5Zu9QIgHODmlq06985QeT12igJSIOhqKp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicFI4akJtbVFiTkltQlJaR3FETzY3QzFwRnNuV0hwM0k2dUsxWDQ0WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742579010),
('MfjcLXS3r9KHZ4Zdc7oQp99xeQNaYcALWpGz9NxX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRmJnNmhrbWFpV1VvaE5YZE5yZUxING5uNURBZ2tDeEdkWXdGYUV6SiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1742491647),
('z7FRGGOFSsdziGZhITSNJClw46S1gPhjnvUyc1FG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaXFjQmdVOGNhR3lxazF5M1daYjFWWlo4bWlvUjNSMG13aFhnNVJSeiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9idWt1cy5idWt1LzIwMjUwMzE1Njg1NjM4NTciO319', 1742451951);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'denda_per_hari', '10000', NULL, '2025-03-19 16:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `custom_fields` json DEFAULT NULL,
  `avatar_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `telepon`, `alamat`, `photo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `custom_fields`, `avatar_url`) VALUES
(2025031336548467, 'mzwawannn', 'kurniawanfirdaus@gmail.com', '0895390631152', 'Grogol 8, Parangtritis, Kretek, Bantul', NULL, NULL, '$2y$12$NLMLf4rCQWi8hyIo4Y.cOukRV9/gLNSvjqZGGwbrxEAdZvqUskKe2', '30etl6NnA27j89FfG1iatur6FquNh8ucppu9PxNE2Na6WgeWHedjMsAvFeCo', '2025-03-13 03:48:21', '2025-03-19 00:58:53', 'user', NULL, NULL),
(2025031350416552, 'Petugas', 'petugas@gmail.com', '089567893567', 'sabavoscho, smkn1bantul', NULL, NULL, '$2y$12$bUtfJULhSfa6ENPwTIK4..OQfWc21VZRCmpENhLteQSQptEzx1dua', 'Ftw33TYkiJqSdwl8gMd4egD1dqbhQWuYRU0Z7ge77xEPuywMOw2um71qGeqO', '2025-03-13 03:09:13', '2025-03-13 03:09:13', 'petugas', NULL, NULL),
(2025031576430351, 'kiaaaa', 'zazkia@gmail.com', '0895415532140', 'Semampir, Panjangrejo, Pundong, Bantul', NULL, NULL, '$2y$12$b1Idhqr398enyIqzdw8.YOIRhjLsj1Xdo0Hwd97eoJTmwq5SJyq/C', NULL, '2025-03-15 04:15:19', '2025-03-15 04:15:19', 'user', NULL, NULL),
(2025031625997410, 'Arongg', 'arongg@gmail.com', '0896785387764', 'Giwangan UH7', NULL, NULL, '$2y$12$UJ6wN///tjRKfz0o6ITb/.U8BqF87Be5MRnBzCAs2.Vbar8uCoaOG', 'cs12hYZJCtcT6WvuLTDsNWb2hrlXSLRVYoVAUrG1rDcBhniSGk6vfS1hvf1z', '2025-03-16 11:00:51', '2025-03-16 11:00:51', 'user', NULL, NULL),
(2025031627453537, 'wawannnnsayangggkiaaaaa', 'firdauzzz@gmail.com', '0895415532134', 'Semampir, Panjangrejo, Pundong, Bantul', NULL, NULL, '$2y$12$.3NGy.K02KR2tfxmqtfzhOucrCqwh1mXM.Z4cNYypEWGmTl9PNHai', 'dVWR8EeJYAQ2QsVFhaD8ItX0m4WEAm6ZFBLEKTvyWHea6YnHfeLhvK0lpqqb', '2025-03-16 06:52:58', '2025-03-16 11:20:06', 'petugas', NULL, NULL),
(2025031641547436, 'frdswwn', 'f@gmail.com', '0895678434452', 'Paris, Kretek', NULL, NULL, '$2y$12$8xDrgmmI9Bfh/xtmGbaMKulZcv8zOayvy7vPhSUuX14KPuJcrxPNa', NULL, '2025-03-16 10:35:14', '2025-03-16 10:35:14', 'user', NULL, NULL),
(2025031649675674, 'aronggwp', 'aronggwp@gmail.com', '0896785435567', 'Giwangan UH7, Yogyakarta', NULL, NULL, '$2y$12$5XbzOQlu0d08rAttOwmMh.HlEgL4KKiIym9zl.D03GzIXCYaN.C/S', NULL, '2025-03-16 11:05:50', '2025-03-16 11:13:43', 'petugas', NULL, NULL),
(2025031657229647, 'kreshna', 'kreshna@gmail.com', '09876574321', 'Manding, Jogja', NULL, NULL, '$2y$12$2vFhy9wWtb9FtK0L2efEbegeE7f0I.BwiOtO3CeuBMruccEWl52xC', NULL, '2025-03-16 10:56:39', '2025-03-16 10:56:39', 'user', NULL, NULL),
(2025032020162281, 'tes', 'tes@gmail.com', '098765432', 'tes', NULL, NULL, '$2y$12$eQfS9m2zXjrUB4CkEzvfyOMh1fw.AITtGOsUhD9v7ftlcZmhm9vb2', NULL, '2025-03-20 01:44:25', '2025-03-20 01:44:25', 'user', NULL, NULL),
(7513181320250313, 'Admin', 'admin@gmail.com', '0895390645584', 'sabavoscho, smkn1bantul', NULL, NULL, '$2y$12$/AiDp70BLto03G3d9pR7COIAJWC.gBLgyyDEBzZc8LQ0MIC4nQjAu', 'O9v3qXqA11EH6OBfAofscQTowAHcJzblhbRDtVA5NKa9nuNPowIPURbmME97', '2025-03-13 03:04:56', '2025-03-13 03:04:56', 'admin', NULL, NULL),
(9755098220250313, 'Anggota', 'anggota@gmail.com', '0895390678945', 'sabavoscho, smkn1bantul', NULL, NULL, '$2y$12$3FmyS0C18YNJpRcbCO./juy3FBYlAlNXvWLREf43sRyn74eCiQITa', 'KDKLOvQRcB1ZnQg3SMj0af7cPRHlHUUErHTZuIougLGNMWP6kzFNk9Z0nB80', '2025-03-13 03:06:49', '2025-03-19 01:34:06', 'petugas', NULL, NULL);

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `after_user_insert` AFTER INSERT ON `users` FOR EACH ROW BEGIN
                IF NEW.role = 'user' THEN
                    INSERT INTO anggota (user_id, nama_lengkap, email, alamat, telepon, created_at, updated_at)
                    VALUES (NEW.id, NEW.name, NEW.email, NEW.alamat, NEW.telepon, NOW(), NOW());
                END IF;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_user_update` AFTER UPDATE ON `users` FOR EACH ROW BEGIN
            IF OLD.role = 'user' AND NEW.role <> 'user' THEN
                DELETE FROM anggota WHERE user_id = OLD.id;
            END IF;
        END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggota_user_id_foreign` (`user_id`);

--
-- Indexes for table `bukus`
--
ALTER TABLE `bukus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bukus_category_id_foreign` (`category_id`),
  ADD KEY `bukus_rack_id_foreign` (`rack_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_nama_unique` (`nama`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`),
  ADD KEY `favorites_buku_id_foreign` (`buku_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `peminjamen`
--
ALTER TABLE `peminjamen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjamen_buku_id_foreign` (`buku_id`),
  ADD KEY `peminjamen_anggota_id_foreign` (`anggota_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `racks`
--
ALTER TABLE `racks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_buku_id_foreign` (`buku_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `bukus`
--
ALTER TABLE `bukus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2025031947359583;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `peminjamen`
--
ALTER TABLE `peminjamen`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `racks`
--
ALTER TABLE `racks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9755098220250314;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bukus`
--
ALTER TABLE `bukus`
  ADD CONSTRAINT `bukus_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `bukus_rack_id_foreign` FOREIGN KEY (`rack_id`) REFERENCES `racks` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `bukus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `peminjamen`
--
ALTER TABLE `peminjamen`
  ADD CONSTRAINT `peminjamen_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `peminjamen_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `bukus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `bukus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
