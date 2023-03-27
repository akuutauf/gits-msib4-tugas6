-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 21 Mar 2023 pada 08.48
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_crud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `total_price` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `quantity`, `total_price`, `created_at`, `updated_at`) VALUES
(15, 2, 4, 15400000, '2023-03-20 23:13:54', '2023-03-20 23:59:31'),
(16, 4, 2, 4700000, '2023-03-20 23:14:01', '2023-03-20 23:59:21'),
(17, 5, 3, 750000, '2023-03-20 23:57:03', '2023-03-20 23:59:15'),
(18, 3, 1, 2700000, '2023-03-20 23:59:47', '2023-03-21 00:00:06'),
(19, 9, 3, 540000, '2023-03-21 00:47:11', '2023-03-21 00:47:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nendoroid', 'Aktif', '2023-03-20 16:35:03', '2023-03-20 16:35:03'),
(2, 'Figure', 'Aktif', '2023-03-20 16:37:27', '2023-03-20 16:37:27'),
(3, 'Manga', 'Aktif', '2023-03-20 16:37:35', '2023-03-20 16:37:35'),
(4, 'Merchandise', 'Aktif', '2023-03-20 16:37:46', '2023-03-20 16:37:46'),
(5, 'Accessories', 'Tidak Aktif', '2023-03-20 16:37:56', '2023-03-20 16:37:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_resets_table', 1),
(21, '2019_08_19_000000_create_failed_jobs_table', 1),
(22, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(23, '2023_03_17_225741_create_categories_table', 1),
(24, '2023_03_17_225751_create_products_table', 1),
(25, '2023_03_17_225803_create_carts_table', 1);

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
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `release_date` date NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `foto`, `price`, `stock`, `description`, `release_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 'PVC Figure 1/7 Ningguang - Hidden Moon Tianquan Ver.', 'https://i.postimg.cc/8CkF69GS/1.webp', 3850000, 46, 'Specifications Scale: 1/7\r\nSize: Approx. H270mm x Approx. W300mm x Approx. D300mm (full diorama) / Approx. H210mm x Approx. W200mm x Approx. D120mm (figure and chair only)\r\nMaterial: PVC, ABS\r\nBattery Type: CR1220 (not included)\r\nFeatures: Light-up function (switch is on the bottom of the lantern stand)\r\n\r\n[Set Contents]\r\n-Main figure x1\r\n-Special base x1\r\nDetails Sculptor: APEX TOYS', '2023-03-21', 'Ready', '2023-03-20 16:39:35', '2023-03-20 16:39:35'),
(3, 2, 'PVC Figure 1/7 Klee - Spark Knight Ver. - Genshin Impact', 'https://i.postimg.cc/vmP4Lh86/2.webp', 2700000, 71, 'Specifications Scale: 1/7\r\nSize: Main Part: Approx. H17.5cm\r\nMaterial: PVC, ABS\r\n\r\n[Set Contents]\r\n-Main figure\r\n-Special base\r\nDetails Sculptor: APEX TOYS', '2023-03-21', 'Pre-Order', '2023-03-20 16:40:44', '2023-03-20 16:42:43'),
(4, 2, 'PVC Figure 1/7 Traveler / Aether - Genshin Impact', 'https://i.postimg.cc/Gmx89rZK/3.webp', 2350000, 66, 'Material : PVC & ABS\r\nSize : 270mm', '2023-03-21', 'Ready', '2023-03-20 16:41:41', '2023-03-20 16:41:41'),
(5, 2, 'PVC Figure 1/7 Traveler / Lumine - Genshin Impact', 'https://i.postimg.cc/y8H3VWrW/4.webp', 250000, 6, 'Material : PVC & ABS\r\nSize : 270mm', '2023-03-21', 'Run Out', '2023-03-20 16:42:32', '2023-03-20 23:58:42'),
(6, 3, 'Shueisha Jump Comics Manga Kimetsu no Yaiba: Gaiden Side Stories - Koyoharu Gotouge', 'https://i.postimg.cc/q75Qz8Kp/1.webp', 150000, 56, 'Original from Japan', '2023-03-21', 'Ready', '2023-03-20 16:45:14', '2023-03-20 16:45:14'),
(7, 3, 'Shueisha Jump Comics Manga Kimetsu no Yaiba 22 - Koyoharu Gotouge', 'https://i.postimg.cc/K8Q0yXvk/2.webp', 180000, 75, 'Original from Japan, Japanese Language', '2023-03-21', 'Run Out', '2023-03-20 16:46:10', '2023-03-20 16:46:10'),
(8, 3, 'Shueisha Jump Comics Manga Kimetsu no Yaiba 14 - Koyoharu Gotouge', 'https://i.postimg.cc/g0JNzMnM/4.webp', 170000, 31, 'Original from Japan, Japanese Language', '2023-03-21', 'Ready', '2023-03-20 16:47:06', '2023-03-20 16:47:06'),
(9, 3, 'Shueisha Jump Comics Manga Kimetsu no Yaiba 20 - Koyoharu Gotouge', 'https://i.postimg.cc/VkzKTs1P/3.webp', 180000, 70, 'Original from Japan, Japanese Language', '2023-03-21', 'Pre-Order', '2023-03-20 16:47:47', '2023-03-20 16:47:47'),
(10, 1, 'Nendoroid Marin Kitagawa - Sono Bisque Doll wa Koi wo Suru', 'https://i.postimg.cc/1RBmvPqL/1.webp', 740000, 79, '\"You need to speak up about how you\'re feeling, for your own sake.\"\r\n\r\nFrom the anime series \"My Dress-Up Darling\" comes a Nendoroid of the cosplay-loving gal, Marin Kitagawa! She comes with three face plates including a smiling face, a winking face and an \"I totally wuv him\" face! Optional parts include a copy of \"Slippery Girls 2\", a leopard print mirror and Marin\'s special omurice with \"sorry\" written on top! A Shizuku-tan body pillow is included too, so enjoy creating all kinds of scenes from the series in Nendoroid form! Be sure to add this adorable Nendoroid of Marin Kitagawa to your collection!', '2023-03-22', 'Ready', '2023-03-20 16:49:08', '2023-03-20 16:49:08'),
(11, 1, 'Nendoroid Hitori Gotoh - Bocchi the Rock!', 'https://i.postimg.cc/rmZtXcNT/1.webp', 600000, 43, '\"Please forgive my arrogance!\"\r\n\r\nFrom \"Bocchi the Rock!\" comes a Nendoroid of the main character Hitori Gotoh, guitarist of Kessoku Band!\r\nFace plates:\r\n· Anxious face\r\n· Crying face\r\n· Breaking down face\r\n\r\nOptional parts:\r\n· Guitar\r\n· Blanket\r\n· Other optional parts for different poses.', '2023-03-22', 'Pre-Order', '2023-03-20 16:50:34', '2023-03-20 16:50:34');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
