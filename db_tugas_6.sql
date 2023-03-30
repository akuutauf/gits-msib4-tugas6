-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 30 Mar 2023 pada 10.18
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
-- Database: `db_tugas_6`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `total_price` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `quantity`, `total_price`, `created_at`, `updated_at`) VALUES
('12b911f4-340a-4283-bd49-64d54d1ba346', 'd536f407-3b7a-418e-8cf4-4656053e6b10', 3, 1860000, '2023-03-27 17:38:27', '2023-03-30 00:57:20'),
('40c7df20-c4a8-49a1-ab3d-3204e6b2ec3e', '505f4117-ba42-43bc-bdab-1a5f29f6703e', 2, 2500000, '2023-03-27 17:38:38', '2023-03-28 02:00:44'),
('99370cf9-3e9c-42ba-8ca8-ade0d807a640', 'b84b3274-9c3a-40b0-b186-5a276e6a918f', 1, 3250000, '2023-03-27 17:16:23', '2023-03-27 17:16:23'),
('d5cd23b0-9599-46f0-adc7-819c4a25b328', '547a6872-0745-45de-9230-eb5e68988cb6', 2, 300000, '2023-03-27 17:38:11', '2023-03-27 17:39:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
('1964d7b0-3039-43e6-bf83-9dbbb4c8350c', 'Merchandise', 'Aktif', '2023-03-27 16:10:56', '2023-03-27 16:10:56'),
('3c25bae7-6c6b-44e2-bde1-be868516cb8b', 'Figure', 'Aktif', '2023-03-27 16:08:49', '2023-03-27 16:08:49'),
('656d772b-7fdd-499c-b7dc-d510694827cf', 'Accessories', 'Tidak Aktif', '2023-03-27 16:11:07', '2023-03-28 01:57:29'),
('78703e02-aee0-4b71-a0ea-e3cd312b438b', 'Nendoroid', 'Aktif', '2023-03-27 16:10:47', '2023-03-27 16:10:47'),
('fcc60e77-d8f9-4e16-83c6-cc9ca3fd7097', 'Manga', 'Aktif', '2023-03-27 16:10:32', '2023-03-27 16:10:32');

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
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2023_03_17_225741_create_categories_table', 1),
(13, '2023_03_17_225751_create_products_table', 1),
(14, '2023_03_17_225803_create_carts_table', 1),
(15, '2023_03_30_080156_add_column_photo_to_users_table', 2);

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
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
('00512446-0f9b-4c0d-ba5e-fc35833434f3', 'fcc60e77-d8f9-4e16-83c6-cc9ca3fd7097', 'Kadokawa Dengeki Comics Next Manga Lycoris Recoil Official Comic Anthology Repeat - Spider Lily', 'public/product/GSuW3l3T7QHnDnoe7mKAR0xvi4tRNKfiBq6PlAj2.webp', 150000, 74, 'Original from Japan, Japanese Language', '2023-03-28', 'Ready', '2023-03-27 17:25:55', '2023-03-28 00:41:35'),
('136cd31f-e5ff-4cc8-91eb-3116c2a850ec', '78703e02-aee0-4b71-a0ea-e3cd312b438b', 'Nendoroid Miyako Hoshino - Wataten!', 'public/product/JXOyWn5IRqB3B2r6h94jDdtTMNIzDkvaJxmAJBkk.webp', 620000, 10, '\"Hana-chan... be my friend...\"\r\n\r\nFrom \"Wataten!: An Angel Flew Down to Me: Precious Friends\" comes a Nendoroid of Miyako Hoshino, the shy college student who makes cosplay costumes as a hobby! She comes with three face plates including a smiling face, a troubled face and an excited face for when she\'s near Hana-chan! Optional parts include her cell phone, essential for taking photos, as well as replaceable bangs with an anemone hairpin, a gift she received from Hana-chan. The Nendoroid also comes with plenty of hand and leg parts for creating different poses. Enjoy displaying the highly expressive Mya-nee in all kinds of situations in Nendoroid form!', '2023-03-28', 'Run Out', '2023-03-27 17:34:11', '2023-03-28 00:42:03'),
('14e83a1a-67eb-40c9-aa12-9cbd22b5adc9', '3c25bae7-6c6b-44e2-bde1-be868516cb8b', 'PVC Figure 1/7 Traveler / Aether - Genshin Impact', 'public/product/fww3Je88zgAvGDT7c0p1RjlgFWgAbYm4vk3AljIv.webp', 2350000, 72, 'Material : PVC & ABS\r\nSize : 270mm', '2023-03-28', 'Ready', '2023-03-27 17:09:24', '2023-03-28 00:40:53'),
('1bbd0bf8-2e3b-4c37-945b-1d129ed8a597', 'fcc60e77-d8f9-4e16-83c6-cc9ca3fd7097', 'Kadokawa Dengeki Comic Manga Tensei Oujo to Tensai Reijou no Mahou Kakumei 2 - Nadaka Harutsugu', 'public/product/2r29RtBoTKV3acCouvvuEFgYGhEA3KeDfSw7WeRG.webp', 130000, 13, 'Original from Japan, Japanese Language', '2023-03-28', 'Run Out', '2023-03-27 17:27:48', '2023-03-28 00:41:44'),
('505f4117-ba42-43bc-bdab-1a5f29f6703e', '78703e02-aee0-4b71-a0ea-e3cd312b438b', 'Nendoroid Traveler / Lumine - Genshin Impact', 'public/product/UiQWIzFh47EAFCjpRlOjN20c4V1Mrx0Z9E5DtA2q.webp', 1250000, 66, 'Material : ABS & PVC\r\nSize : 100mm', '2023-03-28', 'Ready', '2023-03-27 17:36:23', '2023-03-28 00:42:19'),
('547a6872-0745-45de-9230-eb5e68988cb6', 'fcc60e77-d8f9-4e16-83c6-cc9ca3fd7097', 'Shueisha Jump Comic Manga Endo SPY x FAMILY Official Fan Book - Endo Tatsuya', 'public/product/tmE59ZkLYl2JSxMzQWKkDZqLzT3vjOiI5ofbsMdj.webp', 150000, 38, 'Original from Japan, Japanese Language', '2023-03-28', 'Ready', '2023-03-27 17:28:47', '2023-03-28 00:41:53'),
('76fd32fa-d132-4c9b-ba47-6efe60c08979', '3c25bae7-6c6b-44e2-bde1-be868516cb8b', 'PVC Figure 1/7 Traveler / Lumine - Genshin Impact', 'public/product/t9fCq1rJMaaNvH0gGKCW2ZLh1C0IjzC2nRoL41Cl.webp', 2350000, 27, 'Material : PVC & ABS\r\nSize : 270mm', '2023-03-28', 'Pre-Order', '2023-03-27 17:10:18', '2023-03-28 00:41:03'),
('8c42ae9d-12ca-48f8-8899-f14ed359380a', '3c25bae7-6c6b-44e2-bde1-be868516cb8b', 'PVC Figure 1/8 Yae Sakura - Chinese Dress Ver', 'public/product/7RuzRJRw1HHzgJ15letzFwdfQgsLppxUfgkSIoVQ.webp', 4250000, 84, 'Specifications Complete Figure\r\nScale: 1/8\r\nSize: Approx. H30cm\r\nMaterial: PVC, ABS\r\n\r\n[Set Contents]\r\n-Main figure\r\n-Optional background board x3 types\r\n\r\nDetails Here comes the miko \"Yae Sakura\" from miHoYo\'s popular smartphone game \"Honkai Impact 3rd\"!\r\nThis figure is made by APEX\'s skillful sculptors according to the official illustration!\r\nUnder the moonlight through window, Yae Sakura appears in a sexy China dress and sitting on a branch of cherry blossom tree.\r\nThis figure comes with 3 types of alternative background boards. You can customize its background to create your favorite scene.', '2023-03-28', 'Ready', '2023-03-27 17:08:25', '2023-03-28 00:40:44'),
('8d8cb24c-ef39-4091-92ef-41e6e4ba96a7', '3c25bae7-6c6b-44e2-bde1-be868516cb8b', 'Pop Up Parade Figure Gawr Gura - hololive production', 'public/product/HkPXNBOYtpOCw7PF23XOXJHJYR8d1ke67oRNipMM.webp', 590000, 40, 'A New Addition to the POP UP PARADE!\r\n\r\nPOP UP PARADE is a series of figures that are easy to collect with affordable prices and speedy releases! Each figure typically stands around 17-18cm in height and the series features a vast selection of characters from popular anime and game series, with many more to be added soon!', '2023-03-28', 'Ready', '2023-03-27 16:46:24', '2023-03-28 00:39:22'),
('96115a5a-f9af-4c44-8e3c-4ec5462cd58a', '78703e02-aee0-4b71-a0ea-e3cd312b438b', 'Keqing / Kokusei Mini Figure Battlefield Heroes Series Vol.2 (8cm) - Genshin Impact', 'public/product/jcdhm1PREbPIkapNOdEVYAK8xQgkOomhcr5v28sj.webp', 250000, 25, 'Original form miHoYo China', '2023-03-28', 'Ready', '2023-03-27 17:01:01', '2023-03-28 00:39:39'),
('9fa077b4-47d4-4f77-a0b5-4295b6a406d8', 'fcc60e77-d8f9-4e16-83c6-cc9ca3fd7097', 'Houbunsha Manga Time KR Comics Manga Bocchi the Rock! 1 - Hamaji Aki', 'public/product/E9KowolyKDivxTKcZebFqbQYXZhyhgeqaa6vfrgg.webp', 200000, 34, 'Original from Japan, Japanese Language', '2023-03-28', 'Ready', '2023-03-27 17:23:43', '2023-03-28 00:41:15'),
('a589578d-62c5-43e8-b6eb-6e492b010f2e', '78703e02-aee0-4b71-a0ea-e3cd312b438b', 'Nendoroid Yuji Itadori - Jujutsu Kaisen', 'public/product/ra4cHdWumesHrdEr5GwHPm4wCIZFELG7qlSzwzey.webp', 840000, 29, '\"I\'m not gonna regret the way I live!\"\r\nFrom the currently airing anime series \"Jujutsu Kaisen\" comes a Nendoroid of the main character Yuji Itadori! He comes with three face plates including a standard expression, a combat expression and a smiling expression! Optional parts include the finger of the Double-Faced Specter and effect parts for recreating combat sequences. Be sure to add him to your collection!\r\n\r\nSet Contents:\r\n\r\nBack and Front Hair Parts\r\nFace Plates x3\r\nBody\r\nRight Arm Parts x3\r\nLeft Arm Parts x2\r\nRight Hand Parts x2\r\nRight Hand Part (Holding Finger of the Double-Faced Specter)\r\nLeft Hand Parts x2\r\nRight Leg Part x1\r\nLeft Leg Part x1\r\nInterchangeable Lower Half Part x1\r\nCombat Effect Parts x2\r\nSpecial Stand Base', '2023-03-28', 'Pre-Order', '2023-03-27 17:37:31', '2023-03-28 01:57:45'),
('a7d7b194-b1af-4152-a2b9-d492e15d567d', 'fcc60e77-d8f9-4e16-83c6-cc9ca3fd7097', 'Shogakukan Shonen Sunday Comics Manga Karakai Jouzu no (Moto) Takagi-san 16 - Inaba Fumi', 'public/product/fGY4GvMIjbaMrIkq0VZ4lj9SXXrf5l7A2xHhQeYm.webp', 140000, 85, 'Original from Japan, Japanese Language', '2023-03-28', 'Pre-Order', '2023-03-27 17:24:38', '2023-03-28 00:41:25'),
('b84b3274-9c3a-40b0-b186-5a276e6a918f', '3c25bae7-6c6b-44e2-bde1-be868516cb8b', 'PVC Figure 1/7 Theresa Apocalypse - Starlit Astrologos Orchid\'s Night Ver.', 'public/product/cWDMYEVjK51qL3JG3L5Aav9SF8W3C2Oq2aTV6zRb.webp', 3250000, 22, 'Specifications Pre-painted Complete Figure\r\nScale: 1/7\r\nSize: Approx. H30cm (including base)\r\nMaterial: PVC\r\nDetails Sculptor: Hobbymax\r\nCooperation: kiking, hiro', '2023-03-28', 'Run Out', '2023-03-27 17:07:12', '2023-03-28 00:39:58'),
('d536f407-3b7a-418e-8cf4-4656053e6b10', '78703e02-aee0-4b71-a0ea-e3cd312b438b', 'Nendoroid Naofumi Iwatani / Shield Hero - Tate no Yuusha no Nariagari', 'public/product/81X0q4heJZxJKnQnq6EY03mquSJFVAnf7nlaIany.webp', 620000, 30, '\"I\'ll protect them, come what may!\"\r\n\r\nFrom the anime series \"The Rising of the Shield Hero\" comes a Nendoroid of Shield Hero! He comes with three face plates including his sulking standard expression, his ghastly combat expression and his crying expression. Optional parts include his Small Shield, the Chimera Viper Shield, the Shield of Rage II and the Air Strike Shield. An Orange Balloon, fond of gnawing on the Shield Hero, is included as well! Be sure to add the Shield Hero who lost everything to your collection!', '2023-03-28', 'Pre-Order', '2023-03-27 17:35:32', '2023-03-28 00:42:11'),
('db15b97c-35f3-4fd3-8bbf-05c0092acb3b', '3c25bae7-6c6b-44e2-bde1-be868516cb8b', 'PVC Figure 1/7 Keqing - Driving Thunder Ver. Genshin Impact', 'public/product/Q9B7og0Nt3Q9cPXUU1oJslOQfa1ToSMTqW7rcM6L.webp', 2550000, 16, 'Specifications Scale: 1/7\r\nSize: Approx. H320mm x Approx. W220mm x Approx. D190mm (including the base)\r\nMaterial: PVC, ABS\r\n\r\n[Set Contents]\r\n-Main figure x1\r\n-Parts (sword) x1\r\n-Special base x1\r\n\r\nDetails Sculptor: Seigi\r\nPaintwork: Luu, 180m/h, _Gallun\r\nProduction: APEX TOYS', '2023-03-28', 'Pre-Order', '2023-03-27 17:03:27', '2023-03-28 00:39:48');

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
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'empty'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `photo`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$dK82P7JPtQD0vwsd2k2m7uCGNHsBpM.e3IJwVzCWCXA3nIh33vrLC', NULL, '2023-03-28 01:48:45', '2023-03-28 01:48:45', 'empty'),
(2, 'Taufik Hidayat', 'taufikhidayat09121@gmail.com', NULL, '$2y$10$8UggHeCCduGpfbmydGtQq.WtOIKtMozPM2jppeYhhk4cvYn960RLu', NULL, '2023-03-28 02:17:00', '2023-03-28 02:17:00', 'empty');

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
