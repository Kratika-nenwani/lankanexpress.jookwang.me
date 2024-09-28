-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 28, 2024 at 09:03 AM
-- Server version: 10.6.18-MariaDB-cll-lve
-- PHP Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jook8601_lankanexpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkpoints`
--

CREATE TABLE `checkpoints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quote_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkpoints`
--

INSERT INTO `checkpoints` (`id`, `quote_id`, `title`, `address`, `date`, `time`, `country`, `created_at`, `updated_at`) VALUES
(1, '1', 'PICKED', 'Inspaze coworks, LIG, Indore, Madhya Pradesh, India', '2024-09-23', '1:16 PM', NULL, '2024-09-23 07:46:50', '2024-09-23 07:46:50'),
(2, '1', 'PICKED', 'Inspaze coworks, LIG, Indore, Madhya Pradesh, India', '2024-09-23', '1:17 PM', NULL, '2024-09-23 07:47:11', '2024-09-23 07:47:11'),
(3, '1', 'PICKED', 'Inspaze coworks, LIG, Indore, Madhya Pradesh, India', '2024-09-23', '1:17 PM', NULL, '2024-09-23 07:47:14', '2024-09-23 07:47:14'),
(4, '1', 'Half way', 'MR9', '2024-09-23', '13:21', NULL, '2024-09-23 07:51:43', '2024-09-23 07:51:43'),
(5, '1', 'Delivered', 'NRK business park, vijaynagar, Indore', '2024-09-23', '14:22', NULL, '2024-09-23 07:52:23', '2024-09-23 07:52:23'),
(6, '4', 'PICKED', 'test, twdt, test, tetsg, test', '2024-09-23', '3:58 PM', NULL, '2024-09-23 10:28:16', '2024-09-23 10:28:16'),
(7, '8', 'PICKED', '2nd floor, Inspaze coworks, LIG Square, Indore, Madhya Pradesh, India', '2024-09-23', '8:04 PM', NULL, '2024-09-23 14:34:26', '2024-09-23 14:34:26'),
(8, '8', 'Half way', 'MR9', '2024-09-23', '8:07 PM', NULL, '2024-09-23 14:37:26', '2024-09-23 14:37:26'),
(9, '8', 'Delivered', 'Nrk Business Park, Vijaynagar, Indore', '2024-09-23', '8:08 PM', NULL, '2024-09-23 14:38:22', '2024-09-23 14:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drop_of_points`
--

CREATE TABLE `drop_of_points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `number1` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `assigned_callagent` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drop_of_points`
--

INSERT INTO `drop_of_points` (`id`, `name`, `address`, `number`, `number1`, `longitude`, `latitude`, `assigned_callagent`, `created_at`, `updated_at`) VALUES
(1, 'Lanka Express Milano Agostino', 'Via Cesare da Sesto 24, Milano, 20123', '3278068743', '393802617054', '9.171418252789854', '45.45913250309663', '3', '2024-07-25 11:58:03', '2024-07-25 11:58:03'),
(2, 'Lanka Express Milano Pasteur', 'Via Dei Transiti No 5, Milano, 20127', '393274304884', '393802617054', '9.221390283277042', '45.490719064509605', NULL, '2024-07-25 12:01:51', '2024-08-14 07:10:01'),
(3, 'Lanka Express Napoli Cavour', 'Via Mario Pagano 43, 80137, Napoli', '393889888751', '393802617054', '14.254526825392068', '40.856312793213164', NULL, '2024-07-25 12:04:46', '2024-07-25 12:04:46'),
(4, 'Lanka Express Napoli Montesanto', 'Napoli Salita Paradiso 04, 80134, Napoli', '393298837075', '393802617054', '14.2466116965562', '40.84590699270017', NULL, '2024-07-25 12:07:18', '2024-08-21 12:30:04'),
(5, 'Lanka Express Paris', '17 rue Philippe de Girard 75010 Paris', '3333753338950', '393802617054', '2.3613356104344314', '48.88255425496302, 2.3613356104344314', NULL, '2024-07-25 12:09:35', '2024-07-25 12:09:35'),
(7, 'Lanka Express Firenze', 'Via Guelfa 89R Firenze,50123', '393513026155', '393802617054', '11.252496739018621', '43.778563735398706', NULL, '2024-07-25 12:13:03', '2024-08-21 13:01:51'),
(8, 'Lanka Express Verona', 'Via Sansovino, 8, 37138, Verona', '393206343988', '393802617054', '10.973430383274433', '45.43734009576163', NULL, '2024-07-25 12:15:14', '2024-07-25 12:15:14'),
(9, 'Lanka Express Rome', 'Via Conte Verde, 32, 00185, Rome', '393285355508', '393802617054', '12.507012983108925', '41.89311641411137', NULL, '2024-07-25 12:17:17', '2024-07-25 12:17:17'),
(10, 'Lanka Express Monza', 'DON MARKET, VIA VOLTURNO 37, 20900 MONZA (MB)', '393270733230', '393802617054', '9.26841953910443', '45.5775261724665', NULL, '2024-07-25 12:19:31', '2024-07-25 12:19:31'),
(11, 'Lanka Express Brescia', 'VIA MARCANTONIO DUCCO, 32,25123 BRESCIA (BR)', '393270733230', '393802617054', '10.230350481432547', '45.55426746319674', NULL, '2024-07-25 12:21:28', '2024-07-25 12:21:28'),
(12, 'Lanka Express Genova', 'EASY FLY, VIA BOBBIO 70R , 16137 GENOVA (GE)', '393270733230', '393802617054', '8.9483765762607', '44.41748950581051', NULL, '2024-07-25 12:23:58', '2024-07-25 12:23:58'),
(13, 'Lanka Express Venezia', 'VIA COLOMBO 47 , MESTRE CENTRO VENEZIA (VE)', '393270733230', '393802617054', '12.247843525606584', '45.495648402254176', NULL, '2024-07-25 12:26:23', '2024-07-25 12:26:23'),
(14, 'Lanka Express Como', 'LANKA EXPRESS COMO, VIA MILANO 309, 22100 COMO (CO)', '393270733230', '393802617054', '9.086830825621323', '45.799390367091334', NULL, '2024-07-25 12:28:46', '2024-07-25 12:28:46'),
(15, 'Lanka Express Taranto', 'VIA SAN PIO X 46 TARANTO', '393270733230', '393802617054', '17.263700925374682', '40.458375928304235', NULL, '2024-07-25 12:30:39', '2024-07-25 12:30:39'),
(16, 'Lanka Express Modana', 'CEYLON ALIMENTARI, VIALE EUGENIO ZANASI 2A 41051 CASTELNUOVO RANGONE (MO)', '393270733230', '393802617054', '10.939179454396585', '44.54956837148892', NULL, '2024-07-25 12:32:39', '2024-08-21 13:27:10'),
(17, 'Lanka Express Parma', 'LAKSIRI MIN MARKET ,VIA GIOSUE CARDUCCI 4C 43035 FELINO (PR)', '393270733230', '393802617054', '10.243558230168725', '44.695154986959494', NULL, '2024-07-25 12:34:28', '2024-07-25 12:34:28'),
(18, 'Lanka Express Torino', 'CORSO RE UMBERTO 48, 1028 TORINO TO', '393270733230', '393802617054', '7.669604010244025', '45.059173500374435', NULL, '2024-07-25 12:36:07', '2024-07-25 12:36:07'),
(19, 'Lanka Express Pesaro', 'VIA DELLA PACE 3, 61121 PESARO (PU)', '393270733230', '393802617054', '12.906107223683412', '43.91180652496465', NULL, '2024-07-30 10:27:12', '2024-07-30 10:27:12'),
(21, 'Lanka Express Seeduwa', '222 Colombo Road,,Ambalammulla, Seeduwa, Sri Lanka', '+94713020202', NULL, '79.87941908652516', '7.121305890680801', NULL, '2024-08-26 14:25:24', '2024-08-26 14:25:24'),
(22, 'Lanka Express Ja Ela', 'No, 110 Minuwangoda Road, Kanuwana Ja Ela', '+94703616163', NULL, '79.89667007243526', '7.086673705222097', NULL, '2024-08-26 14:29:07', '2024-08-26 14:29:07'),
(23, 'Lanka Express Wennapuwa', 'chilaw road, dummaladeniya, wennappuwa 61170 Wennappuwa, Sri Lanka', '+94703616169', NULL, '79.84714856573798', '7.326607754173166,', NULL, '2024-08-26 14:44:06', '2024-08-26 14:44:06'),
(24, 'Lanka Express Union Place Colombo', '19 Union Pl, Colombo 00200, Sri Lanka', '+94703616163', NULL, '79.85299147166694', '6.923011545681709', NULL, '2024-08-26 14:53:59', '2024-08-26 14:53:59'),
(25, 'Lanka Express Wellawatte', '177/A Galle Rd, Dehiwala-Mount Lavinia 10350, Sri Lanka', '+94703616163', NULL, '79.87081270061023', '6.825724678532335', NULL, '2024-08-26 14:57:29', '2024-08-26 14:57:29'),
(26, 'Lanka Express Yakkala', '55/B Kandy Rd, Yakkala 11870, Sri Lanka', '+94703616163', NULL, '80.03387620654476', '7.0970338495192715,', NULL, '2024-08-26 15:08:15', '2024-08-26 15:08:15'),
(27, 'Lanka Express Galle', '48, 1 Colombo Rd, Galle 80086, Sri Lanka', '+94703616163', NULL, '80.21076083099811', '6.062998647416551', NULL, '2024-08-26 15:10:09', '2024-08-26 15:10:09'),
(28, 'Lanka Express Chilaw', 'Colombo Road, maikkulama, Chilaw 61000, Sri Lanka', '+94703616789', NULL, '79.88773010886501', '7.176711032366844,', NULL, '2024-08-26 15:12:06', '2024-08-26 15:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_06_094812_create_countries_table', 1),
(6, '2024_07_06_094849_create_cities_table', 1),
(7, '2024_07_06_094953_create_drop_of_points_table', 1),
(8, '2024_07_08_072835_create_orders_table', 1),
(9, '2024_07_08_072859_create_check_points_table', 1),
(10, '2024_07_08_123316_create_plans_table', 1),
(11, '2024_07_10_095626_create_promotions_table', 1),
(12, '2024_07_10_102359_create_thoughts_table', 1),
(13, '2024_07_18_130028_create_table_quotes', 2),
(14, '2024_07_18_132016_create_table_quotes', 3),
(15, '2024_07_24_071219_create_payments_table', 4),
(16, '2024_07_27_071328_create_checkpoints_table', 4),
(17, '2014_10_12_100000_create_password_resets_table', 5),
(18, '2024_09_16_073416_create_plan_transactions_table', 5),
(20, '2024_09_18_115911_create_requests_table', 6),
(21, '2024_09_20_072330_create_offer_requests_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `offer_requests`
--

CREATE TABLE `offer_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `request_for` enum('Meal','Tea','Package') NOT NULL,
  `status` enum('pending','delivered','approved','rejected') NOT NULL DEFAULT 'pending',
  `count_offered` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offer_requests`
--

INSERT INTO `offer_requests` (`id`, `user_id`, `transaction_id`, `request_for`, `status`, `count_offered`, `created_at`, `updated_at`) VALUES
(1, '4', '1', 'Meal', 'rejected', NULL, '2024-09-23 12:24:47', '2024-09-23 12:26:27'),
(2, '4', '1', 'Meal', 'rejected', NULL, '2024-09-23 12:26:54', '2024-09-23 12:27:25'),
(3, '7', '4', 'Meal', 'delivered', '2', '2024-09-23 14:49:00', '2024-09-23 14:53:02'),
(4, '7', '4', 'Tea', 'delivered', '1', '2024-09-23 14:53:56', '2024-09-23 14:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` char(36) NOT NULL,
  `service_type` enum('AIR CARGO','SEA CARGO','ROAD TRANSPORTATION','3PL SERVICES') NOT NULL,
  `additional_services` enum('UPB OPERATIONS','CUSTOM CLEARANCE','BONDED TRUCKS','BONDED WAREHOUSING','CARGO INSURANCES','INTERNATIONAL WAREHOUSING') DEFAULT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_phone` varchar(255) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `sender_id` varchar(255) NOT NULL,
  `sender_image` varchar(255) NOT NULL,
  `sender_pickup_address` varchar(255) NOT NULL,
  `sender_street_address` varchar(255) DEFAULT NULL,
  `sender_city` varchar(255) NOT NULL,
  `sender_state` varchar(255) NOT NULL,
  `sender_country` varchar(255) NOT NULL,
  `receiver_delivery_address` varchar(255) NOT NULL,
  `receiver_street_address` varchar(255) DEFAULT NULL,
  `receiver_city` varchar(255) NOT NULL,
  `receiver_state` varchar(255) NOT NULL,
  `receiver_country` varchar(255) NOT NULL,
  `number_of_parcels` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `length` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `width` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `item_value` varchar(255) NOT NULL,
  `insurance_level` varchar(255) NOT NULL,
  `status` enum('Pending','Processing','Placed','Transit','Delivered','Cancelled1','Cancelled2') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'mk-network', '752abff47da7b9f9a837f3464c4d8d1699c55b62140e7eaff490f2d5bceab302', '[\"*\"]', NULL, NULL, '2024-07-18 07:27:16', '2024-07-18 07:27:16'),
(2, 'App\\Models\\User', 1, 'mk-network', '638cbd4400fcd3e40950e85895620f079dc011f30cf32d8f59ace385050cebec', '[\"*\"]', NULL, NULL, '2024-07-18 07:27:46', '2024-07-18 07:27:46'),
(3, 'App\\Models\\User', 1, 'lanka-express', '765b09f7fcae1fdb8b9325483e8862f7efe591bb7fa2da4f65ad7ce213dba6b4', '[\"*\"]', '2024-07-23 13:05:15', NULL, '2024-07-18 07:27:51', '2024-07-23 13:05:15'),
(4, 'App\\Models\\User', 1, 'mk-network', 'c6a1f61876cebc134ff9e54959b8e387c2f8c9dd145ea0e0daa7525fb5c6f444', '[\"*\"]', '2024-07-19 03:10:03', NULL, '2024-07-18 23:07:53', '2024-07-19 03:10:03'),
(5, 'App\\Models\\User', 1, 'mk-network', '684443e1cc39facdf7d6801b134a8cda8427c7ab1597411f1944d35477ca6db4', '[\"*\"]', '2024-07-19 01:14:04', NULL, '2024-07-19 01:07:55', '2024-07-19 01:14:04'),
(6, 'App\\Models\\User', 1, 'mk-network', 'e139ddc8dc1f0a9656ea529e7ea5694ecdc35ee25802f7d169c1d944da3069f7', '[\"*\"]', NULL, NULL, '2024-07-19 01:53:57', '2024-07-19 01:53:57'),
(7, 'App\\Models\\User', 1, 'mk-network', '85e87e55f6e70bf072fb0255fb275ce2f5b8b3158aeae6e601fd97520de98bb8', '[\"*\"]', NULL, NULL, '2024-07-19 01:55:42', '2024-07-19 01:55:42'),
(8, 'App\\Models\\User', 1, 'mk-network', '63b6de9944e05c7883b3135f0e7f66b1091e4817a5d38a7ab042e8d83044745b', '[\"*\"]', '2024-07-19 02:47:09', NULL, '2024-07-19 02:45:21', '2024-07-19 02:47:09'),
(9, 'App\\Models\\User', 1, 'mk-network', 'e49cab94d9df7d27ffff591b61c21249df827efe2ff816c99111b16c5226ca13', '[\"*\"]', '2024-07-19 02:58:14', NULL, '2024-07-19 02:55:17', '2024-07-19 02:58:14'),
(10, 'App\\Models\\User', 3, 'mk-network', '3959aa0a5fb1fa46381cd91c3de0d5bc8b334281de469fab3d13ba22b8c698c6', '[\"*\"]', '2024-07-24 10:04:42', NULL, '2024-07-22 06:29:21', '2024-07-24 10:04:42'),
(11, 'App\\Models\\User', 3, 'lanka-express', '09950e546546bfadff42a70c8f771f3753ffed81d5f513077f6154a60db7925c', '[\"*\"]', '2024-07-22 08:14:09', NULL, '2024-07-22 06:29:33', '2024-07-22 08:14:09'),
(12, 'App\\Models\\User', 3, 'lanka-express', '31960d6c85b9366cc6d3c29f2683460a41c1f8bda5b403514d7b4bc3c3e3f408', '[\"*\"]', '2024-07-27 08:10:04', NULL, '2024-07-22 06:31:14', '2024-07-27 08:10:04'),
(13, 'App\\Models\\User', 3, 'lanka-express', '9bba5617bea2aec28a38dd25fdbca158c795c3b99fa656ec35530346df9c8e04', '[\"*\"]', NULL, NULL, '2024-07-22 13:09:09', '2024-07-22 13:09:09'),
(14, 'App\\Models\\User', 4, 'lanka-express', '3645ea4c2f44a970ea4965ce9ec17d4763ecc7baf76c2c445e48a1675677e79b', '[\"*\"]', NULL, NULL, '2024-07-22 13:12:06', '2024-07-22 13:12:06'),
(15, 'App\\Models\\User', 4, 'mk-network', 'f3986c3356b78107396932ef527d46a39386a71a09e870cb4dafa31c932855ab', '[\"*\"]', NULL, NULL, '2024-07-22 13:12:27', '2024-07-22 13:12:27'),
(16, 'App\\Models\\User', 4, 'lanka-express', '8898a7725beb2e46171a1a9a41abaa33b643256a907bf36c656f3ae490439b4d', '[\"*\"]', NULL, NULL, '2024-07-22 13:27:18', '2024-07-22 13:27:18'),
(17, 'App\\Models\\User', 4, 'lanka-express', 'f0c41b24d7ee651b1f20a2e8bcc45c1902d59a4cdccfe4df8509ca109c593d87', '[\"*\"]', NULL, NULL, '2024-07-23 09:41:14', '2024-07-23 09:41:14'),
(18, 'App\\Models\\User', 5, 'lanka-express', '38b12a597240d319b333a83998b7a6445348a1661bd9d6be1d2b58236bf833a5', '[\"*\"]', NULL, NULL, '2024-07-23 09:44:17', '2024-07-23 09:44:17'),
(19, 'App\\Models\\User', 5, 'lanka-express', '93c5ba2631dbfd6cbbe624fe97b7e2921215a514395eddf215a851e7108a824c', '[\"*\"]', NULL, NULL, '2024-07-23 09:44:31', '2024-07-23 09:44:31'),
(20, 'App\\Models\\User', 5, 'lanka-express', '27030830582b0070ea4b48b2b442f468b97637bddbd9539595df348cb20adda8', '[\"*\"]', NULL, NULL, '2024-07-23 10:02:47', '2024-07-23 10:02:47'),
(21, 'App\\Models\\User', 6, 'lanka-express', '21d7fa61d1cbfbea5d5c969af0a632580591e1275c306ab4b2c7692ad552f895', '[\"*\"]', NULL, NULL, '2024-07-23 10:03:25', '2024-07-23 10:03:25'),
(22, 'App\\Models\\User', 6, 'lanka-express', 'e42864e2ad6e754220074f6ef5e48e79af1824d74b1de1de05df6247216b064a', '[\"*\"]', NULL, NULL, '2024-07-23 10:03:32', '2024-07-23 10:03:32'),
(23, 'App\\Models\\User', 6, 'lanka-express', '2ffec917bb886c1d86f58c5d1f796c9330ae87cbc4c35a2aac78beaf92a7343d', '[\"*\"]', NULL, NULL, '2024-07-23 10:13:05', '2024-07-23 10:13:05'),
(24, 'App\\Models\\User', 6, 'lanka-express', '123132abf8460d9e437e6ce502b8c960562e3829e581db15b14ce8e9234319c7', '[\"*\"]', NULL, NULL, '2024-07-23 10:13:43', '2024-07-23 10:13:43'),
(25, 'App\\Models\\User', 6, 'mk-network', '9bc4b8cca16fe4626d28f5d17c41c4324a6d695de5576a4c588d45fbbe2f9fbb', '[\"*\"]', NULL, NULL, '2024-07-23 10:25:47', '2024-07-23 10:25:47'),
(26, 'App\\Models\\User', 6, 'mk-network', '749b606c59c8e03e5c71cb9314b191dfd4fd929dd7462be0c719f428c729f72a', '[\"*\"]', NULL, NULL, '2024-07-23 10:26:01', '2024-07-23 10:26:01'),
(27, 'App\\Models\\User', 6, 'mk-network', '3cbea35bc0e04d5dc3d04a1aea809fa97ab27ee57545b5fce209657d44e2fdb2', '[\"*\"]', NULL, NULL, '2024-07-23 10:26:05', '2024-07-23 10:26:05'),
(28, 'App\\Models\\User', 6, 'mk-network', '5903d97c7da277f42d3ca23f14dbb18f9b396abd2f55275ca1a644d1c6bcf6cd', '[\"*\"]', NULL, NULL, '2024-07-23 10:29:03', '2024-07-23 10:29:03'),
(29, 'App\\Models\\User', 6, 'mk-network', 'bc543ca40ab068ccdf1321a899df9d57213df31d14bff0737acdd52b4a75cbec', '[\"*\"]', NULL, NULL, '2024-07-23 10:35:17', '2024-07-23 10:35:17'),
(30, 'App\\Models\\User', 6, 'lanka-express', '00d0c4d3d2faf5ad13cce83bc1e3c401a537803fc164d883be3b16ba03712894', '[\"*\"]', '2024-07-27 08:07:53', NULL, '2024-07-23 11:00:47', '2024-07-27 08:07:53'),
(31, 'App\\Models\\User', 3, 'mk-network', 'f46363fcb3953a5df373b082d3fc7fb2211cbd430feef5e6795b12deced77596', '[\"*\"]', '2024-07-24 10:04:37', NULL, '2024-07-23 11:01:11', '2024-07-24 10:04:37'),
(32, 'App\\Models\\User', 6, 'mk-network', 'f7631464a0fd63ea1b4aae6a6e80eefc6f524fb59fa722765d3c033f91eefa2f', '[\"*\"]', NULL, NULL, '2024-07-23 11:01:56', '2024-07-23 11:01:56'),
(33, 'App\\Models\\User', 3, 'mk-network', 'a01e89abb90f77ace9c5acdd6824117efa26285a14e5fc281b7c0956d92132bf', '[\"*\"]', '2024-07-24 06:37:08', NULL, '2024-07-24 06:19:29', '2024-07-24 06:37:08'),
(34, 'App\\Models\\User', 3, 'mk-network', '580b4efac24cd15032666785fe45530c1ac027b638770190d33522c54b580122', '[\"*\"]', NULL, NULL, '2024-07-24 09:37:08', '2024-07-24 09:37:08'),
(35, 'App\\Models\\User', 4, 'mk-network', '70fde1ecfb71b82604d2af568614f598f8592964cf53c18600115b842f8735c7', '[\"*\"]', NULL, NULL, '2024-07-25 06:49:05', '2024-07-25 06:49:05'),
(36, 'App\\Models\\User', 4, 'mk-network', 'acfe8b66a13d13627dd6fd7e5a2dd544a997f0ff0d88750599d9e9dd7f448511', '[\"*\"]', '2024-08-20 06:35:34', NULL, '2024-07-25 06:49:14', '2024-08-20 06:35:34'),
(37, 'App\\Models\\User', 6, 'lanka-express', '12414c59d7a01a5d79c3b531835c59040750083a344d070daed7f975cc354969', '[\"*\"]', NULL, NULL, '2024-07-25 07:09:03', '2024-07-25 07:09:03'),
(38, 'App\\Models\\User', 4, 'lanka-express', '337132746faf1209407abaff9a220ffaa385f4860c8ea5fec5e6a3c538453661', '[\"*\"]', NULL, NULL, '2024-07-25 07:09:39', '2024-07-25 07:09:39'),
(39, 'App\\Models\\User', 4, 'mk-network', 'd45ed44a22dd1590fb17892fd1b3ffdaa07e8f11f9d5ad51aac5b580a8bc753f', '[\"*\"]', NULL, NULL, '2024-07-25 07:10:10', '2024-07-25 07:10:10'),
(40, 'App\\Models\\User', 6, 'lanka-express', 'b49b14c183bd2ed12a8b1462b3476560866d764e7ff2ee838c9a46da6cc8a9c6', '[\"*\"]', NULL, NULL, '2024-07-25 07:17:56', '2024-07-25 07:17:56'),
(41, 'App\\Models\\User', 12, 'mk-network', 'c506c42ea1f7019b420dc2d9573ff646285561ea9d082c0e2d67134463fe70a1', '[\"*\"]', NULL, NULL, '2024-07-25 07:22:50', '2024-07-25 07:22:50'),
(42, 'App\\Models\\User', 6, 'lanka-express', '7dec134274716b6af9494f2f333de67afa147eb71f54f8282cc84106695e84f7', '[\"*\"]', NULL, NULL, '2024-07-25 07:23:08', '2024-07-25 07:23:08'),
(43, 'App\\Models\\User', 6, 'mk-network', '3c92c475afc8e5a822dd4286f2036e8f46657a60e37a9034d400e4ec3817a45e', '[\"*\"]', NULL, NULL, '2024-07-25 07:24:18', '2024-07-25 07:24:18'),
(44, 'App\\Models\\User', 6, 'lanka-express', 'f54c8118e0cdbf2beffcf59391fb21d3ab03f89ee1bea0e30e2d3068b57d24e4', '[\"*\"]', NULL, NULL, '2024-07-25 07:25:31', '2024-07-25 07:25:31'),
(45, 'App\\Models\\User', 6, 'lanka-express', 'db4fc51f7715731808848028d5425a098edb4078ea6e44dd86a7e1c1cff7ade2', '[\"*\"]', NULL, NULL, '2024-07-25 07:25:35', '2024-07-25 07:25:35'),
(46, 'App\\Models\\User', 13, 'mk-network', '38b760ae9d0a10c98ebcd3a9948b59cb1fb06d4bf5cd45dbb0e85e67c4712d9c', '[\"*\"]', NULL, NULL, '2024-07-25 07:29:53', '2024-07-25 07:29:53'),
(47, 'App\\Models\\User', 4, 'mk-network', 'f6e72d25088670bcc2048b0f0e2d5f4d5e6458b820a59823c5040eed66cbc350', '[\"*\"]', NULL, NULL, '2024-07-25 07:32:50', '2024-07-25 07:32:50'),
(48, 'App\\Models\\User', 4, 'mk-network', 'c40dc091543eaa49301fb05d27475b09071ab00a713d5fea1dec36664f8e2be7', '[\"*\"]', NULL, NULL, '2024-07-25 07:32:59', '2024-07-25 07:32:59'),
(49, 'App\\Models\\User', 3, 'mk-network', '88227b5eb0966906d639acef9dda315e1f40889fb1f1600d82fe7e6dbc7ceb47', '[\"*\"]', NULL, NULL, '2024-07-25 10:01:24', '2024-07-25 10:01:24'),
(50, 'App\\Models\\User', 3, 'mk-network', 'd1f466895f1a1f9a2f40d6d8116e0ab4f52e535d0c96c9ee03f91b3f5028c5c0', '[\"*\"]', NULL, NULL, '2024-07-25 10:11:42', '2024-07-25 10:11:42'),
(51, 'App\\Models\\User', 3, 'mk-network', '55c9cd64a87f2496eed781dbd39c4fd9b6855a4bfcf10e7eb69d526c0e2d60d0', '[\"*\"]', NULL, NULL, '2024-07-25 10:14:54', '2024-07-25 10:14:54'),
(52, 'App\\Models\\User', 3, 'lanka-express', 'beb9662e005884c77329e2da3906d5eeee4934b0abfdc74d44ce087e6883fdd5', '[\"*\"]', NULL, NULL, '2024-07-25 10:14:58', '2024-07-25 10:14:58'),
(53, 'App\\Models\\User', 3, 'lanka-express', '428394bba5d9cbdaea9e3227363fe514bf4fa9fd97ca40f6993402e4a2ae2c63', '[\"*\"]', NULL, NULL, '2024-07-25 10:21:09', '2024-07-25 10:21:09'),
(54, 'App\\Models\\User', 3, 'lanka-express', '288fba04577ef55893d5f2fbf880db47cc917d2c819e168a026d919b3e7b5604', '[\"*\"]', '2024-08-21 04:46:49', NULL, '2024-07-25 10:23:11', '2024-08-21 04:46:49'),
(55, 'App\\Models\\User', 5, 'lanka-express', 'aa94331a09fb8bbb56eaaaf4569cc65ea19511e487e7f4d068d76e0a4480dcaa', '[\"*\"]', '2024-07-25 10:25:32', NULL, '2024-07-25 10:24:18', '2024-07-25 10:25:32'),
(56, 'App\\Models\\User', 4, 'lanka-express', 'cc7614ead80fa3b7098597607eee79599a08d287d0c3b7e89918bbc7a49460c2', '[\"*\"]', '2024-07-25 10:24:47', NULL, '2024-07-25 10:24:38', '2024-07-25 10:24:47'),
(57, 'App\\Models\\User', 4, 'lanka-express', '6d1c411cd05e9d5fa512666b10cb19ec0f2cf6d33ec672a2fdba60de828470c5', '[\"*\"]', NULL, NULL, '2024-07-25 10:43:43', '2024-07-25 10:43:43'),
(58, 'App\\Models\\User', 6, 'lanka-express', 'c352bdb2235f1f008eb445b731e036c8c7b6c55b96b62d64719abba42f950982', '[\"*\"]', NULL, NULL, '2024-07-25 10:44:01', '2024-07-25 10:44:01'),
(59, 'App\\Models\\User', 8, 'lanka-express', 'e0390ee6a676293fedbc0a55a0076d39d91162c07e2da46571ce334fbf28a0ae', '[\"*\"]', NULL, NULL, '2024-07-25 10:47:08', '2024-07-25 10:47:08'),
(60, 'App\\Models\\User', 6, 'mk-network', '5fad84472f0810edb159ca4e098104e68ff0134441a441a031b9483ebc1c1454', '[\"*\"]', NULL, NULL, '2024-07-25 10:53:47', '2024-07-25 10:53:47'),
(61, 'App\\Models\\User', 6, 'mk-network', '22f24ea73cfb404fcfed8c3816e668dfa11778f2ca0544104d854fbc4b2236d3', '[\"*\"]', NULL, NULL, '2024-07-25 10:53:47', '2024-07-25 10:53:47'),
(62, 'App\\Models\\User', 8, 'lanka-express', '2e38eca3862d6aea3acda8c9ee0ccf5a07a6ba9ceed137f0c5033299322777b9', '[\"*\"]', NULL, NULL, '2024-07-25 10:57:22', '2024-07-25 10:57:22'),
(63, 'App\\Models\\User', 6, 'lanka-express', 'b78c14e1f0fd6bf5d7e3b75997c7f7fc47fde779aeca3f3134d777abb96a755e', '[\"*\"]', NULL, NULL, '2024-07-25 10:57:41', '2024-07-25 10:57:41'),
(64, 'App\\Models\\User', 6, 'lanka-express', '41ceca2171d30dea65744d0013d0f2300f6863b058c06fe8b972c53b8570abee', '[\"*\"]', NULL, NULL, '2024-07-25 13:09:17', '2024-07-25 13:09:17'),
(65, 'App\\Models\\User', 6, 'lanka-express', 'd10b1bf97181cfa08c5bfb421ce1ab48d939f6759e3893701f31a54edc2707ec', '[\"*\"]', '2024-07-27 07:10:34', NULL, '2024-07-25 13:47:08', '2024-07-27 07:10:34'),
(66, 'App\\Models\\User', 8, 'lanka-express', 'e5e38a1ab06e1e8d6a33c6c7442f5aa04d0a2e1e7cfe8429bda93b5fe9487661', '[\"*\"]', NULL, NULL, '2024-07-26 03:11:30', '2024-07-26 03:11:30'),
(67, 'App\\Models\\User', 6, 'lanka-express', 'e26eef3b614a6dcb063b2431f33a1a07cbedbc209cf7c84b2110149c5632e124', '[\"*\"]', NULL, NULL, '2024-07-26 03:11:42', '2024-07-26 03:11:42'),
(68, 'App\\Models\\User', 4, 'lanka-express', 'ad7a6973c1529759a96c42b4a8f9fe5b9ae5a961f54cce7d6d8e9dd8c861dba8', '[\"*\"]', NULL, NULL, '2024-07-26 03:11:51', '2024-07-26 03:11:51'),
(69, 'App\\Models\\User', 4, 'lanka-express', '2366842cfb8913440ddb58f8677815bd5b9edf9c8fe06007e4e917a78820dbe9', '[\"*\"]', NULL, NULL, '2024-07-26 11:21:47', '2024-07-26 11:21:47'),
(70, 'App\\Models\\User', 4, 'lanka-express', 'f9b07bc77b217915834222a8e2c96e5f1c3a90b21ed97c1e4831bb4a292291b5', '[\"*\"]', NULL, NULL, '2024-07-26 11:37:19', '2024-07-26 11:37:19'),
(71, 'App\\Models\\User', 4, 'lanka-express', 'dc9b5a29967aecca6da309411c991191c7d41143d37c04918fff990cb4e57cac', '[\"*\"]', NULL, NULL, '2024-07-26 11:44:31', '2024-07-26 11:44:31'),
(72, 'App\\Models\\User', 4, 'lanka-express', '6e05ace42f5f25f4155b2d7f64a68cb95a360fd74c7874558c68b2fc05855ea9', '[\"*\"]', NULL, NULL, '2024-07-26 11:52:15', '2024-07-26 11:52:15'),
(73, 'App\\Models\\User', 4, 'lanka-express', '1d9e949585552031c0cbc50826ac2ed7d8678efe31bb395a2660e24ba05e6fca', '[\"*\"]', NULL, NULL, '2024-07-26 12:35:34', '2024-07-26 12:35:34'),
(74, 'App\\Models\\User', 4, 'lanka-express', '5b8dea6eed770dab83a9116436bff1305ff0ef2417bf6e31757ef99e65be896c', '[\"*\"]', NULL, NULL, '2024-07-26 12:47:23', '2024-07-26 12:47:23'),
(75, 'App\\Models\\User', 4, 'lanka-express', 'b6bd141ce9fa49f1237989444b69902583eea72b53defc4694d29bd9fb4d9051', '[\"*\"]', NULL, NULL, '2024-07-26 13:08:16', '2024-07-26 13:08:16'),
(76, 'App\\Models\\User', 4, 'lanka-express', '026bbc3df51a5d5cf771aca6c99bc2380435a05d0c336bc8ec9f4848e0face6a', '[\"*\"]', NULL, NULL, '2024-07-26 13:12:46', '2024-07-26 13:12:46'),
(77, 'App\\Models\\User', 4, 'lanka-express', 'c454ae7a1979cf7d69f3ccabfc86ce43e747e79ac0d8549235ff41b6a586ffb4', '[\"*\"]', NULL, NULL, '2024-07-26 13:22:40', '2024-07-26 13:22:40'),
(78, 'App\\Models\\User', 4, 'lanka-express', 'dfd4bfdb5b2f68028c33981ae4fd7e30d2e195cb44ac85256f36cbb629758445', '[\"*\"]', NULL, NULL, '2024-07-26 13:31:19', '2024-07-26 13:31:19'),
(79, 'App\\Models\\User', 6, 'lanka-express', '3d2f3bfa21d866603db8f168decfa79cda7247ff656b5d6d77f37721540a3e65', '[\"*\"]', NULL, NULL, '2024-07-27 05:37:18', '2024-07-27 05:37:18'),
(80, 'App\\Models\\User', 8, 'lanka-express', '560bed0cc9e33be464da39341a8e62f0333bd8a8db4aa19b7249b857adaee459', '[\"*\"]', NULL, NULL, '2024-07-27 05:39:57', '2024-07-27 05:39:57'),
(81, 'App\\Models\\User', 4, 'lanka-express', '9c49aa5defb2ecb6078b5f14675990a62ab9d3e1de9fbe494a2f17ef280c2635', '[\"*\"]', NULL, NULL, '2024-07-27 05:40:18', '2024-07-27 05:40:18'),
(82, 'App\\Models\\User', 13, 'lanka-express', '7068c9d8a7b6eb7beada4c9265bee183a8e6ffaeeeebb41e896cac7e53f343b6', '[\"*\"]', NULL, NULL, '2024-07-27 06:24:00', '2024-07-27 06:24:00'),
(83, 'App\\Models\\User', 13, 'lanka-express', 'c267b610aec175a1f879146a03ad10a4fc4e2504af5cac88e67a16e5008ee1f1', '[\"*\"]', NULL, NULL, '2024-07-27 06:24:48', '2024-07-27 06:24:48'),
(84, 'App\\Models\\User', 4, 'lanka-express', '10098d836ee77c0ad32eac222d266acf7e3ebc502000445ad59b805b13f479d0', '[\"*\"]', '2024-07-27 07:18:57', NULL, '2024-07-27 06:47:55', '2024-07-27 07:18:57'),
(85, 'App\\Models\\User', 6, 'lanka-express', 'ed3427fc8c997b383eb3ec4d68d6571b1c472bb007d268a88de28ccf18f34865', '[\"*\"]', '2024-07-27 09:25:39', NULL, '2024-07-27 07:17:10', '2024-07-27 09:25:39'),
(86, 'App\\Models\\User', 4, 'lanka-express', '8b32241b368cbc6ead1a027b5e3401fb56085cd076849f9661bc7b26f84afa3d', '[\"*\"]', '2024-07-29 05:15:16', NULL, '2024-07-27 07:47:08', '2024-07-29 05:15:16'),
(87, 'App\\Models\\User', 8, 'lanka-express', '60d63a8709eb790941955df43b3ca583631da9ce200ef5e6e838d2b762356161', '[\"*\"]', NULL, NULL, '2024-07-29 05:09:51', '2024-07-29 05:09:51'),
(88, 'App\\Models\\User', 4, 'lanka-express', '18b9ef5b5e8b81ea53fc2434c582f4eab20022047da70937b74a47da77b0a0e0', '[\"*\"]', '2024-07-29 09:24:32', NULL, '2024-07-29 05:12:47', '2024-07-29 09:24:32'),
(89, 'App\\Models\\User', 8, 'lanka-express', '78150344436090d0a0626d18fc887a8550c1a00a387cbc9fbd0c346712189531', '[\"*\"]', NULL, NULL, '2024-07-29 09:21:15', '2024-07-29 09:21:15'),
(90, 'App\\Models\\User', 4, 'lanka-express', '56dfa45eba5a9f8d4cb66a4dcf3669dc3fcdc1b84f77c57372ca622c0088371b', '[\"*\"]', '2024-07-29 12:36:52', NULL, '2024-07-29 09:22:56', '2024-07-29 12:36:52'),
(91, 'App\\Models\\User', 13, 'lanka-express', '62c14678fbea90a92db8850b243f1346eb1f7b3ee9c938175ce7bec0c3de6555', '[\"*\"]', NULL, NULL, '2024-07-29 12:30:15', '2024-07-29 12:30:15'),
(92, 'App\\Models\\User', 13, 'lanka-express', '1502fb4abdcf8211fa346f825aece1b1a1e81ad2ce53128033a4f0b10135f0b6', '[\"*\"]', NULL, NULL, '2024-07-29 12:30:25', '2024-07-29 12:30:25'),
(93, 'App\\Models\\User', 13, 'lanka-express', 'ea84c9e297a4164266391f83ea58140d05633f39b87cade5623a64cec5cdf96c', '[\"*\"]', NULL, NULL, '2024-07-29 12:31:26', '2024-07-29 12:31:26'),
(94, 'App\\Models\\User', 4, 'lanka-express', '8cc3e3f5284ce3822ce5413c3dbdece4fddf1e87d3f1d59f87349ac97c14f577', '[\"*\"]', '2024-07-29 13:05:16', NULL, '2024-07-29 12:33:51', '2024-07-29 13:05:16'),
(95, 'App\\Models\\User', 6, 'lanka-express', '1fd2609ab4ece7f3bcc0c2cd31478522364b98ab7ddda65c38e246e7c2e76835', '[\"*\"]', '2024-07-29 13:13:33', NULL, '2024-07-29 13:04:39', '2024-07-29 13:13:33'),
(96, 'App\\Models\\User', 4, 'lanka-express', '8d783e8ee17f37b960945d5301f2e5f1e8fa6c65499dd2f6e558d2e715ca294f', '[\"*\"]', '2024-07-30 04:42:43', NULL, '2024-07-29 13:11:47', '2024-07-30 04:42:43'),
(97, 'App\\Models\\User', 4, 'mk-network', 'f882c54b4559d7833da02bbc8119ed336a7ef46c980de08de2229e9c8833035a', '[\"*\"]', '2024-07-30 05:09:39', NULL, '2024-07-30 05:09:38', '2024-07-30 05:09:39'),
(98, 'App\\Models\\User', 4, 'lanka-express', 'bb33e028bb9d4d69443a6fc8b76ab4baf5f9797358f44509e04b5e95a8d8981c', '[\"*\"]', '2024-07-30 05:15:12', NULL, '2024-07-30 05:15:10', '2024-07-30 05:15:12'),
(99, 'App\\Models\\User', 6, 'lanka-express', '6537f85a1047a8b85daa0613c5d3ff7331aa9ad61681787ebed4d86aa397f18b', '[\"*\"]', NULL, NULL, '2024-07-30 05:29:08', '2024-07-30 05:29:08'),
(100, 'App\\Models\\User', 14, 'mk-network', '3328529b053f74b3bb679edcaab064152218d66b11eb8e8712a68817ce03a89d', '[\"*\"]', '2024-07-30 05:33:34', NULL, '2024-07-30 05:33:33', '2024-07-30 05:33:34'),
(101, 'App\\Models\\User', 4, 'lanka-express', '0bc14d6b5fbf9365c3a1928c1d405a7bd2a6dab62b1f2b27761a7e82860d8881', '[\"*\"]', '2024-07-30 10:04:01', NULL, '2024-07-30 05:34:22', '2024-07-30 10:04:01'),
(102, 'App\\Models\\User', 13, 'lanka-express', '2a46fd4e87a28c076946459ea86a2ff4094e358619958edcfb8fea33e12c0b38', '[\"*\"]', '2024-07-30 10:04:32', NULL, '2024-07-30 10:04:18', '2024-07-30 10:04:32'),
(103, 'App\\Models\\User', 6, 'lanka-express', '12dd2ed3a4053829ad0f591a36bf6cad328a12a98004f20d5be4a3ac0a088731', '[\"*\"]', '2024-07-30 10:04:48', NULL, '2024-07-30 10:04:43', '2024-07-30 10:04:48'),
(104, 'App\\Models\\User', 8, 'lanka-express', '87208f2e2692ba9b35143a3d045c2c87930de3ac1694e5bed0c7c5f9d25424c7', '[\"*\"]', '2024-07-30 10:10:34', NULL, '2024-07-30 10:05:12', '2024-07-30 10:10:34'),
(105, 'App\\Models\\User', 4, 'lanka-express', '2c5a110e9e7b3aa99f778c5dd43e22f4bfae1578bf7b583f28754a5a6aa5f08b', '[\"*\"]', '2024-07-30 10:21:40', NULL, '2024-07-30 10:21:37', '2024-07-30 10:21:40'),
(106, 'App\\Models\\User', 8, 'lanka-express', 'fad3bfaec9525f612b219ae0690245d560ac08580f44ba9f3784a8997b320a35', '[\"*\"]', '2024-07-30 10:33:14', NULL, '2024-07-30 10:24:12', '2024-07-30 10:33:14'),
(107, 'App\\Models\\User', 4, 'lanka-express', 'df47872b8dc05e5bb0524f0c53fa22f4956a55986a0ae49584fa1c86d814442c', '[\"*\"]', '2024-07-30 10:27:33', NULL, '2024-07-30 10:27:30', '2024-07-30 10:27:33'),
(108, 'App\\Models\\User', 8, 'lanka-express', 'b8ecb6d15390d86d8ebe38a9ed6cdcc1d8e3421c54ece0c8ca0f6dbb7f5899d5', '[\"*\"]', '2024-07-30 10:37:34', NULL, '2024-07-30 10:28:27', '2024-07-30 10:37:34'),
(109, 'App\\Models\\User', 6, 'lanka-express', 'c933c5babb87d7406986b53d73064322da888080c626b0df11da8406b8d0d2df', '[\"*\"]', NULL, NULL, '2024-07-30 10:39:09', '2024-07-30 10:39:09'),
(110, 'App\\Models\\User', 13, 'lanka-express', 'def7b892f569f3e55a9760aed4ad2e0cb4f7208cac02b5e885fc747fb03da02c', '[\"*\"]', '2024-07-30 10:39:41', NULL, '2024-07-30 10:39:19', '2024-07-30 10:39:41'),
(111, 'App\\Models\\User', 4, 'lanka-express', 'c308434c439fd21f2b2783f4416eb6f00fe5c5ae41c5adf115b2c47ca40a48c4', '[\"*\"]', '2024-07-30 11:19:38', NULL, '2024-07-30 10:40:14', '2024-07-30 11:19:38'),
(112, 'App\\Models\\User', 15, 'mk-network', '34c92013c0fb639b8f8e48e34ddc14f8993f7849f6903960a950feead54a632a', '[\"*\"]', '2024-07-30 11:20:56', NULL, '2024-07-30 11:20:24', '2024-07-30 11:20:56'),
(113, 'App\\Models\\User', 16, 'mk-network', '656e3869f23460b0742cd60384042a10aee0bb350637700e70ee32f404c32775', '[\"*\"]', '2024-07-30 11:43:14', NULL, '2024-07-30 11:38:15', '2024-07-30 11:43:14'),
(114, 'App\\Models\\User', 8, 'lanka-express', '6d409ebda25a49e1de376b4cba625b811a615561a65089ddd7011eb98d62f263', '[\"*\"]', '2024-07-30 11:45:57', NULL, '2024-07-30 11:43:29', '2024-07-30 11:45:57'),
(115, 'App\\Models\\User', 4, 'lanka-express', '678aaf6c616f1eac8608d2a3bf7f3c7f0e2488532a7e6daeba40e6496ea8724d', '[\"*\"]', '2024-07-30 11:44:22', NULL, '2024-07-30 11:44:21', '2024-07-30 11:44:22'),
(116, 'App\\Models\\User', 4, 'lanka-express', 'a24fe4d33790c8a5881448ce7ed22b7030173849bdd6b6dceb14ed801e100287', '[\"*\"]', '2024-07-30 11:44:38', NULL, '2024-07-30 11:44:37', '2024-07-30 11:44:38'),
(117, 'App\\Models\\User', 8, 'lanka-express', '6df2784c1de2fb39102a60693d7d557c0b5b70d0ff11ce2a0627f883fcf5523d', '[\"*\"]', '2024-07-30 11:45:25', NULL, '2024-07-30 11:44:45', '2024-07-30 11:45:25'),
(118, 'App\\Models\\User', 4, 'lanka-express', '15eb611beabb0547d9a443a0535395426c36d9be5d80d0c1776fd9d687cdd3b3', '[\"*\"]', '2024-07-30 11:46:11', NULL, '2024-07-30 11:46:05', '2024-07-30 11:46:11'),
(119, 'App\\Models\\User', 8, 'lanka-express', '7e9389ce0944ae631d3aa20dbef731611d73e6c4b0f5567539b7688fda9648e7', '[\"*\"]', NULL, NULL, '2024-07-30 11:46:21', '2024-07-30 11:46:21'),
(120, 'App\\Models\\User', 6, 'lanka-express', '8f57a60044038553a1c15faa23ee6d0350ceca34170fb476df5b9b7ecb391325', '[\"*\"]', '2024-07-30 11:47:03', NULL, '2024-07-30 11:46:59', '2024-07-30 11:47:03'),
(121, 'App\\Models\\User', 6, 'mk-network', '69434152b55fdfa2cb6d2e3081cf260c59c5899c2f844257f568a2524b0e4364', '[\"*\"]', NULL, NULL, '2024-07-30 11:55:10', '2024-07-30 11:55:10'),
(122, 'App\\Models\\User', 13, 'mk-network', '4f59fa1d49c9e14a97f9f58da7f87b630c50667a95c78f2e1997f1f4c7873d1b', '[\"*\"]', '2024-07-30 11:56:22', NULL, '2024-07-30 11:56:18', '2024-07-30 11:56:22'),
(123, 'App\\Models\\User', 8, 'mk-network', 'b1add84ac4f19c1c6b0763e3db3a5232fc7c16eddda6cf1bad96980fd38e1f18', '[\"*\"]', NULL, NULL, '2024-07-30 12:07:55', '2024-07-30 12:07:55'),
(124, 'App\\Models\\User', 13, 'mk-network', 'f9c98acd03138a8f43d708346e68f590dfe8b43993ea201ba2ab6264d01f0272', '[\"*\"]', '2024-07-30 12:08:15', NULL, '2024-07-30 12:08:13', '2024-07-30 12:08:15'),
(125, 'App\\Models\\User', 6, 'mk-network', '7a7d58c3a32f68b8ba3ff6f4d28c3477c75d35e667c39ab54fc946651c57a720', '[\"*\"]', NULL, NULL, '2024-07-30 12:08:34', '2024-07-30 12:08:34'),
(126, 'App\\Models\\User', 13, 'mk-network', 'edf587bde68d21f2e092d9a229004816f37af37c1cac46e44438a756c512f609', '[\"*\"]', '2024-07-31 06:55:40', NULL, '2024-07-30 12:57:17', '2024-07-31 06:55:40'),
(127, 'App\\Models\\User', 17, 'mk-network', '39d3b87bceb6d4808287ac533a57ebaff3991ed9da31d742bb8022995398b33d', '[\"*\"]', '2024-09-07 07:14:03', NULL, '2024-07-30 16:16:44', '2024-09-07 07:14:03'),
(128, 'App\\Models\\User', 4, 'mk-network', '675ed8afa8b48821041f3d137b09abdee027dfa503e94d340856f34a760dde38', '[\"*\"]', '2024-07-31 05:47:24', NULL, '2024-07-31 05:45:19', '2024-07-31 05:47:24'),
(129, 'App\\Models\\User', 3, 'mk-network', 'd6fcad18997c7a0283610a1fa621e9285ae09b05d56e642506efee84487c93f1', '[\"*\"]', '2024-07-31 05:53:08', NULL, '2024-07-31 05:50:20', '2024-07-31 05:53:08'),
(130, 'App\\Models\\User', 13, 'mk-network', '6453fef2ad6f6455b395f36395508700787c71facee55a2d9c6e0c9191c6ecdb', '[\"*\"]', '2024-07-31 06:25:25', NULL, '2024-07-31 05:55:41', '2024-07-31 06:25:25'),
(131, 'App\\Models\\User', 4, 'lanka-express', '21f6d252c6b0e309049641d1a8ff107f23d24d4456c708010983a43822ff48fc', '[\"*\"]', '2024-08-06 09:42:33', NULL, '2024-07-31 06:55:50', '2024-08-06 09:42:33'),
(132, 'App\\Models\\User', 4, 'lanka-express', '657c3e2a2a1ec1155db71834c3fb48e378083283b409d432b7dbd4b34f898f00', '[\"*\"]', '2024-08-06 09:42:41', NULL, '2024-08-06 09:41:42', '2024-08-06 09:42:41'),
(133, 'App\\Models\\User', 13, 'mk-network', '3eb9e47f921083cc41e5b6548e3c25dec17483f41d3399ac22f00589131e173a', '[\"*\"]', '2024-08-06 09:48:21', NULL, '2024-08-06 09:44:43', '2024-08-06 09:48:21'),
(134, 'App\\Models\\User', 4, 'lanka-express', '0a8be2380d249ad1c396d939bf554d6ae91d1ebcc8b3be3b1decc4f2c52a0ce5', '[\"*\"]', '2024-08-06 09:49:20', NULL, '2024-08-06 09:49:20', '2024-08-06 09:49:20'),
(135, 'App\\Models\\User', 13, 'mk-network', 'd7ae694dbf83136072d789d2812ecc4c91b863a1c6e150f37c120c9b17a21836', '[\"*\"]', '2024-08-06 09:50:55', NULL, '2024-08-06 09:49:35', '2024-08-06 09:50:55'),
(136, 'App\\Models\\User', 4, 'lanka-express', '4bfad7af341ac5fac294919681e165fbbd5ac5521a5cd1420e4cfae78c5fb496', '[\"*\"]', '2024-08-06 09:53:31', NULL, '2024-08-06 09:52:11', '2024-08-06 09:53:31'),
(137, 'App\\Models\\User', 13, 'mk-network', 'bf6ed4c37203c943e7d977895eb2761f9d6fc39f857aa6662542c7e41ae5fbc5', '[\"*\"]', '2024-08-06 09:56:38', NULL, '2024-08-06 09:53:54', '2024-08-06 09:56:38'),
(138, 'App\\Models\\User', 6, 'mk-network', '32fbb2144074461313dde0d6e63b1e1c8ea7b758f9867bc2f5cc9f88bb36eace', '[\"*\"]', '2024-08-06 09:59:51', NULL, '2024-08-06 09:56:51', '2024-08-06 09:59:51'),
(139, 'App\\Models\\User', 6, 'mk-network', '76dfb672a30ec318627060653f788309e8e9d4bf771b917508a480014adcac7d', '[\"*\"]', '2024-08-06 10:00:58', NULL, '2024-08-06 10:00:13', '2024-08-06 10:00:58'),
(140, 'App\\Models\\User', 6, 'mk-network', '21e4e2495420232b9d69d18d7507554306724ea3299d40590fce741a76d92b49', '[\"*\"]', '2024-08-06 10:09:02', NULL, '2024-08-06 10:01:23', '2024-08-06 10:09:02'),
(141, 'App\\Models\\User', 4, 'lanka-express', '1a64d39605baf36fb553810fe6b77637a31954ba6506aee1084a511d700212a3', '[\"*\"]', '2024-08-06 10:14:07', NULL, '2024-08-06 10:09:17', '2024-08-06 10:14:07'),
(142, 'App\\Models\\User', 13, 'mk-network', '6ab0e8ae0e95246fc15cd252ab0fee930763ec092e649e0b1f2ffa505f01c79f', '[\"*\"]', '2024-08-06 10:11:54', NULL, '2024-08-06 10:11:52', '2024-08-06 10:11:54'),
(143, 'App\\Models\\User', 4, 'lanka-express', '1456bdc22ee5c44862a315abbca7e68ef319c9bcec79fc59b7d3a62133613a84', '[\"*\"]', '2024-08-06 10:12:49', NULL, '2024-08-06 10:12:44', '2024-08-06 10:12:49'),
(144, 'App\\Models\\User', 13, 'mk-network', 'f1b26eb9c50b22d417a13ae50f44880c8d9b3fc86a18cc3c71a7312654dd7d78', '[\"*\"]', '2024-08-06 10:13:36', NULL, '2024-08-06 10:13:33', '2024-08-06 10:13:36'),
(145, 'App\\Models\\User', 4, 'lanka-express', '4162cc9c462c6029854ba0aa191fd7d11811aa919bb82308fe96a5e5b0b2a656', '[\"*\"]', '2024-08-06 10:22:13', NULL, '2024-08-06 10:14:16', '2024-08-06 10:22:13'),
(146, 'App\\Models\\User', 6, 'mk-network', '2bb2a7f2b8de4007c307c0185c684353eaaa8b5efd4f366771b6bfb4cc3f16b7', '[\"*\"]', '2024-08-06 10:22:52', NULL, '2024-08-06 10:22:28', '2024-08-06 10:22:52'),
(147, 'App\\Models\\User', 4, 'lanka-express', 'd8aec21d54a61b090270d4e9f0edad910a27a2610e7a1cb192aeace669b29a1f', '[\"*\"]', '2024-08-12 07:45:46', NULL, '2024-08-12 06:04:06', '2024-08-12 07:45:46'),
(148, 'App\\Models\\User', 6, 'mk-network', '1b343171518ac7c0814fca05c67875e4c9572131776bfd5ff9cbb9eedb400aa4', '[\"*\"]', '2024-08-12 07:55:08', NULL, '2024-08-12 07:46:30', '2024-08-12 07:55:08'),
(149, 'App\\Models\\User', 4, 'lanka-express', '8eebc1bf87515cbff81de40f69f0866b78cba695207c0f09919c060f23d69190', '[\"*\"]', '2024-08-12 08:05:20', NULL, '2024-08-12 08:05:16', '2024-08-12 08:05:20'),
(150, 'App\\Models\\User', 6, 'mk-network', '90ca16326b1c6d40c18cc0bc70621b6b96977570f7d2158929c31318edc13ea1', '[\"*\"]', '2024-08-12 08:31:59', NULL, '2024-08-12 08:07:47', '2024-08-12 08:31:59'),
(151, 'App\\Models\\User', 4, 'lanka-express', 'c09cdc6dee89bb5a990dfea34392860d6fb521e1e4ad7e3068f38164e61f3ae8', '[\"*\"]', '2024-08-12 08:33:04', NULL, '2024-08-12 08:32:59', '2024-08-12 08:33:04'),
(152, 'App\\Models\\User', 6, 'mk-network', '9fd0e9a155a02bc4c32120cada36698cfb9a6164381402b7fb1ad6aa4b96bc3a', '[\"*\"]', '2024-08-12 09:47:57', NULL, '2024-08-12 08:37:14', '2024-08-12 09:47:57'),
(153, 'App\\Models\\User', 4, 'lanka-express', '48e0ad27363afa3550369811e01e71307260a6cd56b5e06852c92f2ee0f7caa5', '[\"*\"]', '2024-08-12 10:35:06', NULL, '2024-08-12 09:48:21', '2024-08-12 10:35:06'),
(154, 'App\\Models\\User', 18, 'mk-network', 'cba88c18e875c407baa57be4ee8c7bbc465e38e0b25eb1d116ea30372d265355', '[\"*\"]', NULL, NULL, '2024-08-12 10:35:23', '2024-08-12 10:35:23'),
(155, 'App\\Models\\User', 18, 'mk-network', 'd379e2edce5ef4ad90463da5e5ccd73f5b067187ddacb7e6891cc6d4487e39ef', '[\"*\"]', '2024-08-12 11:22:26', NULL, '2024-08-12 10:35:29', '2024-08-12 11:22:26'),
(156, 'App\\Models\\User', 6, 'mk-network', '7758da9a750f3d7cd9ae6428d399deda07a89d406298e4885d5345c9aff61b4d', '[\"*\"]', '2024-08-12 11:19:20', NULL, '2024-08-12 10:42:31', '2024-08-12 11:19:20'),
(157, 'App\\Models\\User', 4, 'lanka-express', 'ef76a4585ab6c961318ea8ae41927695f3aa316ae146771072ddc132138136a4', '[\"*\"]', '2024-08-12 11:22:36', NULL, '2024-08-12 11:20:20', '2024-08-12 11:22:36'),
(158, 'App\\Models\\User', 6, 'mk-network', '78b693664feb0fd7b9623b7a26a3694bdedce585cd51deee679647abe83202f2', '[\"*\"]', '2024-08-12 12:05:48', NULL, '2024-08-12 11:22:44', '2024-08-12 12:05:48'),
(159, 'App\\Models\\User', 4, 'lanka-express', 'f16cad8e65cb111632315cb0cb50e3cd0e1b11ac7fd13313abba30804fbc9ddc', '[\"*\"]', '2024-08-12 12:13:20', NULL, '2024-08-12 12:06:14', '2024-08-12 12:13:20'),
(160, 'App\\Models\\User', 6, 'mk-network', '4c968284c0a987ef603db7fb9e1df53b31ff677a2839c14fff7fac58b7281bec', '[\"*\"]', '2024-08-12 12:14:21', NULL, '2024-08-12 12:14:00', '2024-08-12 12:14:21'),
(161, 'App\\Models\\User', 13, 'mk-network', 'c82c1468a99ebf6843afd7d3205468637e8103920b47ad8c8c59261e4905e2d4', '[\"*\"]', '2024-08-12 12:20:53', NULL, '2024-08-12 12:15:01', '2024-08-12 12:20:53'),
(162, 'App\\Models\\User', 6, 'mk-network', 'a92c03ca96d1d956c2b269b98a196e93f513f4e3a82bd6bb0eb3ff4272ba7113', '[\"*\"]', '2024-08-12 12:48:37', NULL, '2024-08-12 12:32:04', '2024-08-12 12:48:37'),
(163, 'App\\Models\\User', 4, 'lanka-express', '95999f460c6723886c3bd16e701bdb7bd7fa6a927d5d39f5f6e2837f48202ed3', '[\"*\"]', '2024-08-12 16:13:53', NULL, '2024-08-12 16:11:47', '2024-08-12 16:13:53'),
(164, 'App\\Models\\User', 6, 'mk-network', '70bb19dabfc9b8bb261e4c369eff21a8bad068280973a56f74192d06ace143e0', '[\"*\"]', '2024-08-12 16:14:25', NULL, '2024-08-12 16:14:09', '2024-08-12 16:14:25'),
(165, 'App\\Models\\User', 13, 'mk-network', '553b2a2c269d9642282254a074f8570825f3cadba0b44fe23718e31d7c423f04', '[\"*\"]', '2024-08-12 16:15:24', NULL, '2024-08-12 16:15:01', '2024-08-12 16:15:24'),
(166, 'App\\Models\\User', 4, 'lanka-express', '5c553e927433f9302317a7f84fa0dcaeda993003861c89aaae15c3694c831797', '[\"*\"]', '2024-08-20 06:46:17', NULL, '2024-08-12 19:14:38', '2024-08-20 06:46:17'),
(167, 'App\\Models\\User', 18, 'mk-network', '70c197e07f7db0b81ded82299307916af7988736b42b329520d1baff686b074a', '[\"*\"]', '2024-08-14 07:47:12', NULL, '2024-08-14 07:43:20', '2024-08-14 07:47:12'),
(168, 'App\\Models\\User', 18, 'mk-network', '40cf9b8e5f926b9ee9d0c8785080e1eaa9ea49d272aceec94786cd244824e164', '[\"*\"]', NULL, NULL, '2024-08-14 07:57:32', '2024-08-14 07:57:32'),
(169, 'App\\Models\\User', 18, 'mk-network', 'ccbcc5a3251a3b86b8b159b6d13be4a42459d4fe2b2557a4c23a85e00a6f9373', '[\"*\"]', '2024-08-14 08:07:20', NULL, '2024-08-14 08:06:52', '2024-08-14 08:07:20'),
(170, 'App\\Models\\User', 18, 'mk-network', '2709390c32b2fb8f6ae0162c577c3dd02afb7969b43a78ee3f113d1994453e89', '[\"*\"]', '2024-08-20 06:36:00', NULL, '2024-08-14 08:19:07', '2024-08-20 06:36:00'),
(171, 'App\\Models\\User', 6, 'lanka-express', '6164fff8e9c07759b05ef97aa9bf225faae89835deb51fa4b7caff3184c1899f', '[\"*\"]', '2024-08-22 08:07:49', NULL, '2024-08-20 06:25:36', '2024-08-22 08:07:49'),
(172, 'App\\Models\\User', 6, 'lanka-express', '13c080ee1f69af90c856e2683afcc6a1032b8093ac2747e344e17aa7a8f23209', '[\"*\"]', NULL, NULL, '2024-08-20 06:30:29', '2024-08-20 06:30:29'),
(173, 'App\\Models\\User', 6, 'mk-network', 'cb605a66bbf96f31eb8a14987dd7add04119c3b5abaf44b4e902cfbfe49b77ed', '[\"*\"]', '2024-08-20 06:36:20', NULL, '2024-08-20 06:35:09', '2024-08-20 06:36:20'),
(174, 'App\\Models\\User', 6, 'mk-network', '1dd17327dc17bed4ddddb1a05bc09086477a853f606a1f6b8ef179099ee6fa86', '[\"*\"]', '2024-08-20 06:45:30', NULL, '2024-08-20 06:45:14', '2024-08-20 06:45:30'),
(175, 'App\\Models\\User', 4, 'lanka-express', 'e25f5e25f94b41bacdd0ec5b15fc4532d5182acff239de6e53aa5c1e37a4e3a5', '[\"*\"]', '2024-08-20 06:51:50', NULL, '2024-08-20 06:46:43', '2024-08-20 06:51:50'),
(176, 'App\\Models\\User', 18, 'mk-network', 'cd5b0e108e1ef75e2fb6ce8a5b4ab003abd6b1ccebf9a08d326444601e24184a', '[\"*\"]', '2024-08-20 06:54:34', NULL, '2024-08-20 06:52:07', '2024-08-20 06:54:34'),
(177, 'App\\Models\\User', 6, 'mk-network', '17ce28ff9e8411a7aa5b760c391a366f36df9b761be343678983b39776f7cb63', '[\"*\"]', '2024-08-20 06:53:19', NULL, '2024-08-20 06:52:17', '2024-08-20 06:53:19'),
(178, 'App\\Models\\User', 4, 'lanka-express', '4342a8c705d44368c2f997a8e831e14d5b701103734ac94c51016cdb9bc07b51', '[\"*\"]', '2024-08-20 06:59:57', NULL, '2024-08-20 06:53:50', '2024-08-20 06:59:57'),
(179, 'App\\Models\\User', 6, 'mk-network', '015624f6b36431ddfb7d60d3c5ee335cc70772cab0ff2620fb3ae721ffffae6a', '[\"*\"]', '2024-08-20 07:07:13', NULL, '2024-08-20 07:02:45', '2024-08-20 07:07:13'),
(180, 'App\\Models\\User', 4, 'lanka-express', 'd95734c9bc437021d43a346a633ed592e86f0f009f5560487ff0e15d7f4e8980', '[\"*\"]', '2024-08-20 08:23:56', NULL, '2024-08-20 07:07:22', '2024-08-20 08:23:56'),
(181, 'App\\Models\\User', 18, 'mk-network', 'adc0160a6841921efe53a3c2d884c372669ffccb0d8ca7eef9aaed926e0c1a1f', '[\"*\"]', NULL, NULL, '2024-08-20 07:07:31', '2024-08-20 07:07:31'),
(182, 'App\\Models\\User', 18, 'mk-network', '318eddcf44193d7d4efae0821dd24c6fe60c0cf9599b2eccf8320ccd6f30f5c2', '[\"*\"]', NULL, NULL, '2024-08-20 07:11:18', '2024-08-20 07:11:18'),
(183, 'App\\Models\\User', 18, 'mk-network', '84cc3217a019573ac8fa20bcc00025ee6b431028060a70d7de25cd438be5053f', '[\"*\"]', '2024-08-20 09:01:36', NULL, '2024-08-20 07:15:34', '2024-08-20 09:01:36'),
(184, 'App\\Models\\User', 6, 'mk-network', '5d62957d6e0ef3a08d98c86d9f405464b34ad890f4ef174ef0f4adfe67628cf6', '[\"*\"]', '2024-08-20 08:22:16', NULL, '2024-08-20 08:22:13', '2024-08-20 08:22:16'),
(185, 'App\\Models\\User', 13, 'mk-network', '51552fb9d077b329c6fc716486c87cb4edf5711b3299a38fc467f6996dea1cc0', '[\"*\"]', '2024-08-20 08:24:01', NULL, '2024-08-20 08:22:40', '2024-08-20 08:24:01'),
(186, 'App\\Models\\User', 6, 'mk-network', 'c40d7f02887e9273a63bffe5392d59d0c9263d08bf581ac27a9854b9cd13e850', '[\"*\"]', '2024-08-20 08:24:16', NULL, '2024-08-20 08:24:14', '2024-08-20 08:24:16'),
(187, 'App\\Models\\User', 4, 'lanka-express', '5b74c3473a5fb1817a7167159f3e1fcc05246cb8c15f23be4f87d9722338b777', '[\"*\"]', '2024-08-20 09:03:54', NULL, '2024-08-20 08:24:47', '2024-08-20 09:03:54'),
(188, 'App\\Models\\User', 6, 'mk-network', '3544a2133ff90477f98638ada5d310c5bf2b3b2e7a3dbfcca7aa07058d3d7729', '[\"*\"]', '2024-08-20 08:45:39', NULL, '2024-08-20 08:38:03', '2024-08-20 08:45:39'),
(189, 'App\\Models\\User', 4, 'lanka-express', '4e68c15985b152f1a7e9d52f473dd6193af468b224a10a612193aadeb9b3095c', '[\"*\"]', '2024-08-20 08:47:08', NULL, '2024-08-20 08:45:53', '2024-08-20 08:47:08'),
(190, 'App\\Models\\User', 6, 'mk-network', '126e6a72fe6fca027b4b6c97b90c3eb3c47ef6a3a804d66d7d1b2d9c32e437d2', '[\"*\"]', '2024-08-20 09:02:32', NULL, '2024-08-20 08:47:44', '2024-08-20 09:02:32'),
(191, 'App\\Models\\User', 4, 'lanka-express', '9ea41be2e80a20c4c42b3487e33e83032afecf1c0d39cf7fceb7b284eb9b3e28', '[\"*\"]', '2024-08-20 08:49:38', NULL, '2024-08-20 08:48:16', '2024-08-20 08:49:38'),
(192, 'App\\Models\\User', 6, 'mk-network', 'de79b92477e8367ab7172fab8940f488779d16916d8be58e79b07a29cb3732c4', '[\"*\"]', '2024-08-20 08:50:18', NULL, '2024-08-20 08:50:16', '2024-08-20 08:50:18'),
(193, 'App\\Models\\User', 4, 'lanka-express', 'db8ebd6d8d9c93560ceeacfb24d822133239f9ab2ef2f74b49091e51d6d7be5e', '[\"*\"]', '2024-08-20 08:51:58', NULL, '2024-08-20 08:50:40', '2024-08-20 08:51:58'),
(194, 'App\\Models\\User', 6, 'mk-network', '555b60cf9d9459bf6d479992206f7acd2e547108c42b44b3ee2181ed54ebeaf0', '[\"*\"]', '2024-08-20 08:52:17', NULL, '2024-08-20 08:52:15', '2024-08-20 08:52:17'),
(195, 'App\\Models\\User', 4, 'lanka-express', '2b2b010bec3a63e80d378c6eef375e41ca6ebd921aafd226cd74e66a774b57eb', '[\"*\"]', '2024-08-20 09:02:07', NULL, '2024-08-20 08:53:17', '2024-08-20 09:02:07'),
(196, 'App\\Models\\User', 6, 'mk-network', 'd17ba5b51cecf6c8a15ac8107ba1bd68ee11d7e21eec51421f42a20129d41a10', '[\"*\"]', '2024-08-20 09:02:22', NULL, '2024-08-20 09:02:20', '2024-08-20 09:02:22'),
(197, 'App\\Models\\User', 4, 'lanka-express', '055e0c84e2d3837f2a8be64239938ad2320b6ea6cd1ae781cb078abb2148c577', '[\"*\"]', '2024-08-20 09:57:37', NULL, '2024-08-20 09:02:42', '2024-08-20 09:57:37'),
(198, 'App\\Models\\User', 6, 'mk-network', '8ab424420f9c424589f601a5871455dbdc8da8c8baa92e931e613e80bf014952', '[\"*\"]', '2024-08-20 10:03:59', NULL, '2024-08-20 09:59:20', '2024-08-20 10:03:59'),
(199, 'App\\Models\\User', 18, 'mk-network', '2c24371b967ed2d3a7107acbe751753cb65a28addaa5debccd48cdfafa65b9e9', '[\"*\"]', '2024-08-20 10:38:56', NULL, '2024-08-20 10:11:19', '2024-08-20 10:38:56'),
(200, 'App\\Models\\User', 13, 'mk-network', '75e00a6c16b82f8e52c04acd2ba05d0f7ad6986e231dd5cd690688b9f598fd2a', '[\"*\"]', '2024-08-20 10:27:31', NULL, '2024-08-20 10:15:48', '2024-08-20 10:27:31'),
(201, 'App\\Models\\User', 6, 'mk-network', '41d3a285e59b59e6ce181375d3a6a81fc26f17ab48230c60248d3e7be1dc751b', '[\"*\"]', '2024-08-20 10:42:10', NULL, '2024-08-20 10:27:49', '2024-08-20 10:42:10'),
(202, 'App\\Models\\User', 13, 'mk-network', '9c6e190aa696fa55411824b0e9bf222f483771796c58ac570927a704f3a4fd1f', '[\"*\"]', '2024-08-20 10:39:05', NULL, '2024-08-20 10:39:03', '2024-08-20 10:39:05'),
(203, 'App\\Models\\User', 6, 'mk-network', 'c57f74739206188d8c85b673244272bb491f44210bc7e82c745aca3a20d59449', '[\"*\"]', '2024-08-20 11:04:09', NULL, '2024-08-20 10:42:04', '2024-08-20 11:04:09'),
(204, 'App\\Models\\User', 4, 'lanka-express', 'b10da74c8593108268047a9432f56330e211762a4afe0bd226f8c85698e7a75c', '[\"*\"]', '2024-08-20 11:08:50', NULL, '2024-08-20 11:04:28', '2024-08-20 11:08:50'),
(205, 'App\\Models\\User', 6, 'mk-network', '16044716220050af64a36f347496ad9f9eff277c21a2cd135b7489a04dc701a9', '[\"*\"]', '2024-08-20 11:07:03', NULL, '2024-08-20 11:06:50', '2024-08-20 11:07:03'),
(206, 'App\\Models\\User', 4, 'lanka-express', '471e0140d041c4be1678da1aeddde171c7a43b1768513ed50f9a588d5016fe23', '[\"*\"]', '2024-08-20 11:07:20', NULL, '2024-08-20 11:07:13', '2024-08-20 11:07:20'),
(207, 'App\\Models\\User', 13, 'mk-network', '35d90aa60bc3eae24ee935bff0636329e42e43a8b62db4f46305967f718cab2d', '[\"*\"]', '2024-08-20 11:07:53', NULL, '2024-08-20 11:07:48', '2024-08-20 11:07:53'),
(208, 'App\\Models\\User', 4, 'lanka-express', '8ff88d0b6abba7058635c570acc769364f17fd675cd1097edc6db5a0859150c5', '[\"*\"]', '2024-08-20 11:16:15', NULL, '2024-08-20 11:09:06', '2024-08-20 11:16:15'),
(209, 'App\\Models\\User', 4, 'lanka-express', '6a9a4efc6e3e16b34bf1d05118fee4ca95968750807b4db0029e368383a98e4c', '[\"*\"]', NULL, NULL, '2024-08-20 11:09:10', '2024-08-20 11:09:10'),
(210, 'App\\Models\\User', 13, 'mk-network', 'b9f02bb894da699270c169d09b682b0817628a27615c1e9ed68c7e5a9beeb2ed', '[\"*\"]', '2024-08-20 11:17:32', NULL, '2024-08-20 11:17:12', '2024-08-20 11:17:32'),
(211, 'App\\Models\\User', 4, 'lanka-express', 'c013a3288e0945158fc97ab4633ed440e5399981047c2393a691b8c755afeac7', '[\"*\"]', '2024-08-20 11:18:41', NULL, '2024-08-20 11:17:43', '2024-08-20 11:18:41'),
(212, 'App\\Models\\User', 6, 'mk-network', '3234a1789b428bb7517846e49e8c4c466c01e113fea4255a7d77f45737bec355', '[\"*\"]', '2024-08-20 11:22:58', NULL, '2024-08-20 11:19:38', '2024-08-20 11:22:58'),
(213, 'App\\Models\\User', 13, 'mk-network', '66e5e9dc3a1eb5203cf77dfc63520644d7ebffa03d01e9b7618b39e7199da947', '[\"*\"]', '2024-08-20 12:08:52', NULL, '2024-08-20 11:28:18', '2024-08-20 12:08:52'),
(214, 'App\\Models\\User', 18, 'mk-network', 'c5b1aeef960485d9c6f12ac8536217bed7bb9c418dfab5093f6f115280a7770c', '[\"*\"]', '2024-08-20 11:50:17', NULL, '2024-08-20 11:50:04', '2024-08-20 11:50:17'),
(215, 'App\\Models\\User', 6, 'mk-network', 'f414808915fa8f303e7213a1207aabe3b20b9fc810f74320677545670a046953', '[\"*\"]', '2024-08-20 12:20:37', NULL, '2024-08-20 12:12:35', '2024-08-20 12:20:37'),
(216, 'App\\Models\\User', 4, 'lanka-express', '0f6abb221050bde919196903c18529f002c8c951d40266d09b7591f7c8f4fd4f', '[\"*\"]', '2024-08-20 12:21:31', NULL, '2024-08-20 12:21:15', '2024-08-20 12:21:31'),
(217, 'App\\Models\\User', 6, 'mk-network', '21aec10f634781aa4a9917e5f7a9b63bd2468c4fb8000a6fcab090c98c33117f', '[\"*\"]', '2024-08-20 12:22:19', NULL, '2024-08-20 12:22:17', '2024-08-20 12:22:19'),
(218, 'App\\Models\\User', 13, 'mk-network', '07e0881c111c97bded5d1115ee644a1b45dbd113c894f38d3760b64af9e90528', '[\"*\"]', '2024-08-20 12:24:00', NULL, '2024-08-20 12:22:32', '2024-08-20 12:24:00'),
(219, 'App\\Models\\User', 4, 'lanka-express', 'ffee8d695daedccae84fa70a2df847b9060d25fe5069f8c2511dcea769521da6', '[\"*\"]', '2024-08-20 12:29:33', NULL, '2024-08-20 12:24:32', '2024-08-20 12:29:33'),
(220, 'App\\Models\\User', 13, 'mk-network', '0f98246bc9cdd3de5dcd51d338dd730f6ebbc29d80f3a01a7c105d0ca31439a5', '[\"*\"]', '2024-08-20 12:26:09', NULL, '2024-08-20 12:25:31', '2024-08-20 12:26:09'),
(221, 'App\\Models\\User', 4, 'lanka-express', '519fc4860dcfc9f88022d0dabadce15a642cf34d4c85652e294ef354ee4d9c58', '[\"*\"]', '2024-08-20 12:26:36', NULL, '2024-08-20 12:26:32', '2024-08-20 12:26:36'),
(222, 'App\\Models\\User', 13, 'mk-network', '3419cb536601e213368da1ef4c3cbc8786c12c462bc6fee56e0e2f150d31b511', '[\"*\"]', '2024-08-20 12:29:45', NULL, '2024-08-20 12:29:22', '2024-08-20 12:29:45'),
(223, 'App\\Models\\User', 4, 'lanka-express', '5ff2488df4d95d55bf9cefa6dc371ea14d17115379d236375385d6181f3ffb51', '[\"*\"]', '2024-08-20 12:38:11', NULL, '2024-08-20 12:29:53', '2024-08-20 12:38:11'),
(224, 'App\\Models\\User', 13, 'mk-network', 'a688ddc7e51a2a60f03f751f99228bd086a47501a78c880e81dcbd0cbd1a4ade', '[\"*\"]', '2024-08-20 12:30:56', NULL, '2024-08-20 12:30:49', '2024-08-20 12:30:56'),
(225, 'App\\Models\\User', 4, 'lanka-express', 'f698b23080e8bdda329b6fcf0b24e95bf7f3732e83dbb2fd5afccfbbf741e151', '[\"*\"]', '2024-08-20 12:49:52', NULL, '2024-08-20 12:31:36', '2024-08-20 12:49:52'),
(226, 'App\\Models\\User', 4, 'lanka-express', 'ed6ba1a3287e6694c65d4f4b18a44cae325c60f51cf31b98b095202d39200d14', '[\"*\"]', '2024-08-21 04:49:33', NULL, '2024-08-20 12:52:31', '2024-08-21 04:49:33'),
(227, 'App\\Models\\User', 18, 'mk-network', '9b9734590747be569c37c266771e70b2f56d3d1585270ca90a52d6d2a1ed1dd0', '[\"*\"]', '2024-08-20 13:27:17', NULL, '2024-08-20 13:04:24', '2024-08-20 13:27:17'),
(228, 'App\\Models\\User', 18, 'mk-network', 'f58efd390b0d684fa8e77ac64f6f006a508262141b04ccfd7a0a3b9345b6e8b2', '[\"*\"]', '2024-08-20 13:46:20', NULL, '2024-08-20 13:46:08', '2024-08-20 13:46:20'),
(229, 'App\\Models\\User', 6, 'lanka-express', 'c3c1d505cb6460e5b9002054bf9fd981de42a74c96938eaa480a2a167816c436', '[\"*\"]', '2024-08-21 04:47:18', NULL, '2024-08-21 04:42:18', '2024-08-21 04:47:18'),
(230, 'App\\Models\\User', 8, 'mk-network', '2b3ff698524f19a02a935e4a575a0dd32fe7372515441389aa7180d8c768379f', '[\"*\"]', '2024-08-21 04:53:20', NULL, '2024-08-21 04:49:51', '2024-08-21 04:53:20'),
(231, 'App\\Models\\User', 4, 'lanka-express', 'e6ce1200293a4b55ffc58966f29b9ca6407dba5fd8bbbc1a873233a4c9570042', '[\"*\"]', '2024-08-21 05:58:05', NULL, '2024-08-21 05:00:13', '2024-08-21 05:58:05'),
(232, 'App\\Models\\User', 4, 'lanka-express', '86c67647d876cdf8e905df48e49c01b0a8424820bf4debbb1678655139addd48', '[\"*\"]', NULL, NULL, '2024-08-21 05:00:16', '2024-08-21 05:00:16'),
(233, 'App\\Models\\User', 4, 'lanka-express', 'f0a25ad48a8b8de2213a0eeb6becdeba86329792835cca526caac76b2ff3c776', '[\"*\"]', '2024-08-21 12:21:16', NULL, '2024-08-21 05:58:20', '2024-08-21 12:21:16'),
(234, 'App\\Models\\User', 6, 'lanka-express', 'c58a6250ce1daba81e568048312c6e7b90e5f6ec2eccf08021465ccb35f6fb09', '[\"*\"]', '2024-08-21 06:11:07', NULL, '2024-08-21 06:10:38', '2024-08-21 06:11:07'),
(235, 'App\\Models\\User', 18, 'mk-network', '327f2d3afa43322a65c49746161b7c25ac3f2eadbc0a70e58b04ee5be266e5f4', '[\"*\"]', '2024-08-21 12:07:56', NULL, '2024-08-21 11:48:38', '2024-08-21 12:07:56'),
(236, 'App\\Models\\User', 6, 'mk-network', '257342a8d98339264b2395dbddbdfa0bb4364a53282e8e8092819c0647c131e7', '[\"*\"]', '2024-08-21 12:13:31', NULL, '2024-08-21 12:13:29', '2024-08-21 12:13:31'),
(237, 'App\\Models\\User', 13, 'mk-network', 'd52cf2fe104c47aadb912d3ffcb3e0701465e0e851b97719c5b7e562151dbd17', '[\"*\"]', '2024-08-21 12:17:50', NULL, '2024-08-21 12:14:13', '2024-08-21 12:17:50'),
(238, 'App\\Models\\User', 4, 'lanka-express', '5b8095edb4f1ed3fdec52d662db5afb6c0cc62611dd4f7fcf1d57ef849a83d78', '[\"*\"]', '2024-08-21 12:16:29', NULL, '2024-08-21 12:16:22', '2024-08-21 12:16:29'),
(239, 'App\\Models\\User', 6, 'mk-network', '30239fad27ac279e4cfe47f125b6e46418e825093065bbcd96fa16d980ea02ce', '[\"*\"]', '2024-08-21 12:17:54', NULL, '2024-08-21 12:16:42', '2024-08-21 12:17:54'),
(240, 'App\\Models\\User', 4, 'lanka-express', '34ff3b5a1a7ce90827d1d33b456dcbfff281eae9af6af4e5d7eca0e56f4643ec', '[\"*\"]', '2024-08-21 12:19:07', NULL, '2024-08-21 12:18:13', '2024-08-21 12:19:07'),
(241, 'App\\Models\\User', 6, 'mk-network', 'c41221e2696f0c5207f124c1a08a9388d0617bcdf385bd65773ce11d7338d424', '[\"*\"]', '2024-08-21 12:19:52', NULL, '2024-08-21 12:19:23', '2024-08-21 12:19:52'),
(242, 'App\\Models\\User', 4, 'lanka-express', 'a60dade0e6fbac1d5b1d084d946eba456f4b365238bcb3776e6283bf48682e55', '[\"*\"]', '2024-08-21 12:20:19', NULL, '2024-08-21 12:20:13', '2024-08-21 12:20:19'),
(243, 'App\\Models\\User', 13, 'mk-network', 'e7a4db86cdf4f43a0b974605f5878db7feef07c1f71ff89d5355f92ee99c829d', '[\"*\"]', '2024-08-21 12:22:05', NULL, '2024-08-21 12:20:46', '2024-08-21 12:22:05'),
(244, 'App\\Models\\User', 4, 'lanka-express', '92316f8cdadc15d983397f7fdf4936db96822b3b18c855e4edefd1dfb6bd8f2c', '[\"*\"]', '2024-08-21 12:36:17', NULL, '2024-08-21 12:22:20', '2024-08-21 12:36:17'),
(245, 'App\\Models\\User', 13, 'mk-network', '6e0de8438af9e581941d28cca81826338724e29d03c42300b57db1902a1f943d', '[\"*\"]', '2024-08-21 12:35:58', NULL, '2024-08-21 12:35:37', '2024-08-21 12:35:58'),
(246, 'App\\Models\\User', 6, 'mk-network', '922150e43de86af6b8824b8fe14a2d56faa28885801317a51b6735b67ffdc665', '[\"*\"]', '2024-08-21 12:36:26', NULL, '2024-08-21 12:36:10', '2024-08-21 12:36:26'),
(247, 'App\\Models\\User', 4, 'lanka-express', '76ef8234ae89d670d23b9e14f134e954d42a375b742e5543856e2a60623dd868', '[\"*\"]', '2024-08-21 12:37:39', NULL, '2024-08-21 12:36:37', '2024-08-21 12:37:39'),
(248, 'App\\Models\\User', 4, 'lanka-express', '306f879d2921b4ad56ef3572575318eb8e0539075c4376deee2d03a163b6045d', '[\"*\"]', '2024-08-22 04:53:44', NULL, '2024-08-21 12:37:59', '2024-08-22 04:53:44'),
(249, 'App\\Models\\User', 6, 'mk-network', '1f37836acf82dd2965bd4d509f8ee4d0bb7f75e235283d28982da8c91a9ccbb6', '[\"*\"]', '2024-08-22 05:12:16', NULL, '2024-08-22 05:03:31', '2024-08-22 05:12:16'),
(250, 'App\\Models\\User', 4, 'lanka-express', 'c6cd978805ab279328d1652405da7433d3d9b350ac10c2e0bdd30fc963a77416', '[\"*\"]', '2024-08-22 05:35:45', NULL, '2024-08-22 05:17:40', '2024-08-22 05:35:45'),
(251, 'App\\Models\\User', 13, 'mk-network', 'a0b920bee7d74ee4b770f026f15c572edac2e7bb845f66524677ccc98d4c73d4', '[\"*\"]', '2024-08-22 05:37:13', NULL, '2024-08-22 05:36:03', '2024-08-22 05:37:13'),
(252, 'App\\Models\\User', 6, 'mk-network', 'caa3c1c7d716ce9f85ac1005f9d6e6356d584ff462956e45d36b5c0810ec49df', '[\"*\"]', '2024-08-22 05:39:52', NULL, '2024-08-22 05:37:22', '2024-08-22 05:39:52'),
(253, 'App\\Models\\User', 4, 'lanka-express', '6a58ca0959e6e41c0262f7f6b200ce248418927c53f15d89871f3c140ffd88e4', '[\"*\"]', '2024-08-22 05:41:31', NULL, '2024-08-22 05:40:16', '2024-08-22 05:41:31'),
(254, 'App\\Models\\User', 6, 'mk-network', '904e65cfeeb2ce684159d03e7dbc50a4b195a50be217f3bf1c76587cdff4c68c', '[\"*\"]', '2024-08-22 05:41:34', NULL, '2024-08-22 05:41:26', '2024-08-22 05:41:34'),
(255, 'App\\Models\\User', 20, 'mk-network', '35385f86efd4d10a87ffbfefe5869fa1eb5b5be629407def28ee668610ceeae2', '[\"*\"]', '2024-08-22 06:29:59', NULL, '2024-08-22 06:29:58', '2024-08-22 06:29:59'),
(256, 'App\\Models\\User', 4, 'lanka-express', '0a0eb2b652786179d6dadedad1a87227302437b97e1a7cb4a5099c123581619c', '[\"*\"]', '2024-08-22 07:54:32', NULL, '2024-08-22 06:39:35', '2024-08-22 07:54:32'),
(257, 'App\\Models\\User', 6, 'lanka-express', '27ec92cf2d0cb97ed17fdc94275629f55140227fb4b403504e1ef3523b70c951', '[\"*\"]', '2024-08-22 06:41:44', NULL, '2024-08-22 06:41:37', '2024-08-22 06:41:44'),
(258, 'App\\Models\\User', 23, 'mk-network', '09499e8a5c141fd21ee62c9307c4f90ab90f6fe6065dab5fd6403dc3d539938a', '[\"*\"]', '2024-08-22 12:10:45', NULL, '2024-08-22 06:59:14', '2024-08-22 12:10:45');
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(259, 'App\\Models\\User', 23, 'mk-network', '7d29dc989df85273295829577cd3ba055eb60e055acfdddea3f8aa1bbdb90e9b', '[\"*\"]', '2024-08-22 07:55:55', NULL, '2024-08-22 07:55:51', '2024-08-22 07:55:55'),
(260, 'App\\Models\\User', 23, 'mk-network', 'b7eac4e396702f81c600232ac25977a221d09a949d878ddfc985084827fad81a', '[\"*\"]', '2024-08-22 07:56:26', NULL, '2024-08-22 07:56:20', '2024-08-22 07:56:26'),
(261, 'App\\Models\\User', 23, 'mk-network', 'c237dac980de46b0ce10bf58869ef48933ee685c83baaa2d8c88acb811204a2f', '[\"*\"]', '2024-08-22 08:02:09', NULL, '2024-08-22 07:56:57', '2024-08-22 08:02:09'),
(262, 'App\\Models\\User', 4, 'lanka-express', '4dfada66ab5211bacba61aa3cae3e5060a2d15e256e85385894f51b30507b75d', '[\"*\"]', '2024-08-22 08:02:42', NULL, '2024-08-22 08:02:26', '2024-08-22 08:02:42'),
(263, 'App\\Models\\User', 4, 'lanka-express', 'cd63183119080f195886b3ee3ffee7f562942e8b8f88ac7a4a57d6658378878b', '[\"*\"]', '2024-08-22 08:05:18', NULL, '2024-08-22 08:02:33', '2024-08-22 08:05:18'),
(264, 'App\\Models\\User', 4, 'mk-network', '942f9741a2d9b9fb75150ee6df8728b05b973392174c564fb3e7f83b6f880adc', '[\"*\"]', '2024-08-22 08:28:46', NULL, '2024-08-22 08:03:40', '2024-08-22 08:28:46'),
(265, 'App\\Models\\User', 6, 'lanka-express', '0110ae1ebc01a795f216161490ead70d143d44107a84a5b11f5daaa61dcd1840', '[\"*\"]', '2024-08-22 08:25:19', NULL, '2024-08-22 08:08:33', '2024-08-22 08:25:19'),
(266, 'App\\Models\\User', 4, 'lanka-express', '4e2baac55b72f369dce9e73b7e79283b49120e324813dbb2204d7e34aa682053', '[\"*\"]', '2024-08-22 10:29:21', NULL, '2024-08-22 08:59:51', '2024-08-22 10:29:21'),
(267, 'App\\Models\\User', 4, 'lanka-express', 'f29f4a6c0ed7afb71b29d51149e668391eb9e3f7f78d6414cd5b262aecd5d97f', '[\"*\"]', '2024-08-24 16:39:24', NULL, '2024-08-22 10:35:21', '2024-08-24 16:39:24'),
(268, 'App\\Models\\User', 13, 'mk-network', 'fac316cd4af1eada8d2475214a8010b691ca033c990f9fe4dab28b72da41ddd1', '[\"*\"]', '2024-08-22 12:11:45', NULL, '2024-08-22 12:11:44', '2024-08-22 12:11:45'),
(269, 'App\\Models\\User', 13, 'mk-network', 'd5f2db8dddb8bb3a50cda225fbf09e46a5b5082418eee6c657fc655dd45db614', '[\"*\"]', '2024-08-22 12:17:16', NULL, '2024-08-22 12:16:36', '2024-08-22 12:17:16'),
(270, 'App\\Models\\User', 6, 'mk-network', '3777d05851bed12d9cc0d7349772f0bbdec24e881c82854f9a95d7e122095cc2', '[\"*\"]', '2024-08-22 12:27:09', NULL, '2024-08-22 12:17:36', '2024-08-22 12:27:09'),
(271, 'App\\Models\\User', 13, 'mk-network', 'd835629c626d6db6a6da275bfa02e0d3b8b0f446277de9a881ef9fdea55f636f', '[\"*\"]', '2024-08-22 12:27:15', NULL, '2024-08-22 12:24:19', '2024-08-22 12:27:15'),
(272, 'App\\Models\\User', 4, 'lanka-express', '9c899d10207cc2f803c61564a801204ceebc1b21520ea6eac01ac593e44b0b68', '[\"*\"]', '2024-08-29 09:13:04', NULL, '2024-08-24 20:58:21', '2024-08-29 09:13:04'),
(273, 'App\\Models\\User', 6, 'mk-network', 'ebf0fbf2bfd54f178278da16b3ed9c7c601f82a2eaa34e7c703cd68e241af7b8', '[\"*\"]', '2024-08-29 09:16:50', NULL, '2024-08-29 09:13:19', '2024-08-29 09:16:50'),
(274, 'App\\Models\\User', 4, 'lanka-express', '938cb7ca53a2298341bbd8fb223c3b39b9e561e396fd5d6ac7fbb586716fb439', '[\"*\"]', '2024-08-29 09:46:06', NULL, '2024-08-29 09:39:51', '2024-08-29 09:46:06'),
(275, 'App\\Models\\User', 4, 'lanka-express', '4c12f1c0c529cc73de9f01b50071bb810de86d83d1c1edabf2e9da332df22396', '[\"*\"]', '2024-08-29 09:44:41', NULL, '2024-08-29 09:40:38', '2024-08-29 09:44:41'),
(276, 'App\\Models\\User', 6, 'mk-network', '1b9be30969785dfe3bcc036e2503dcfcc0beebd4c47c402023e4eb17cb302543', '[\"*\"]', '2024-08-29 09:46:09', NULL, '2024-08-29 09:45:05', '2024-08-29 09:46:09'),
(277, 'App\\Models\\User', 4, 'lanka-express', '58c8ca85d26725a20ffe01d1a6634f20aaece3126f7b1b63ae568e1569f498f9', '[\"*\"]', '2024-08-29 09:47:34', NULL, '2024-08-29 09:46:32', '2024-08-29 09:47:34'),
(278, 'App\\Models\\User', 13, 'mk-network', 'e6874229dc4268d1b3fb0a9aadb1ee5d15bfe854ecefeccfd6ee7345272fc9c9', '[\"*\"]', '2024-08-29 09:48:04', NULL, '2024-08-29 09:47:57', '2024-08-29 09:48:04'),
(279, 'App\\Models\\User', 4, 'lanka-express', 'a2a63ebdd703c6596cff586c4fbe029917997715fa74709d762dd86e86457ad2', '[\"*\"]', '2024-08-29 10:16:09', NULL, '2024-08-29 09:48:50', '2024-08-29 10:16:09'),
(280, 'App\\Models\\User', 13, 'mk-network', 'f93cb3aef1fb0759ad6f46f458e619ed4284ff1dddb49247ee57781ea4505f79', '[\"*\"]', '2024-08-29 10:52:47', NULL, '2024-08-29 10:29:55', '2024-08-29 10:52:47'),
(281, 'App\\Models\\User', 4, 'lanka-express', '455535628994827d07b606d930963bc96ce83e2dfaf8f89d18d4f804557723e3', '[\"*\"]', '2024-08-29 12:35:00', NULL, '2024-08-29 10:53:00', '2024-08-29 12:35:00'),
(282, 'App\\Models\\User', 6, 'mk-network', 'fbbafcd7a24dd7035e1e6b4d272ea6b4d91dd8732f5c2ae62c98cb1a56f96a89', '[\"*\"]', '2024-08-29 12:55:44', NULL, '2024-08-29 12:35:34', '2024-08-29 12:55:44'),
(283, 'App\\Models\\User', 4, 'lanka-express', '4012c1585e712f71ebe844eb11a57fbd8d62b985c11fbb99eebffdf0d369c55f', '[\"*\"]', '2024-08-29 13:01:04', NULL, '2024-08-29 12:55:55', '2024-08-29 13:01:04'),
(284, 'App\\Models\\User', 6, 'mk-network', '22159b9b22af7407972bb9f45ffa854a1238c28693a6be6fa1ce26bede95ae21', '[\"*\"]', '2024-08-29 13:03:10', NULL, '2024-08-29 13:00:41', '2024-08-29 13:03:10'),
(285, 'App\\Models\\User', 13, 'mk-network', '57dc5c4e684d65dc699371bb7faa04ff9cbf356f3b7536c0ea13d68e8dea3b2a', '[\"*\"]', '2024-08-29 13:03:59', NULL, '2024-08-29 13:03:23', '2024-08-29 13:03:59'),
(286, 'App\\Models\\User', 6, 'mk-network', '23ef056531954ac6ef1705dbdb34a8368f8bf1d7bfb8a26ac683a9686dcdd255', '[\"*\"]', '2024-08-29 13:04:18', NULL, '2024-08-29 13:04:07', '2024-08-29 13:04:18'),
(287, 'App\\Models\\User', 4, 'lanka-express', '595f8555625cbf254fbec8f15abafc946aefde7b1959aaafc0143fac680f6fc4', '[\"*\"]', '2024-08-29 13:07:57', NULL, '2024-08-29 13:04:27', '2024-08-29 13:07:57'),
(288, 'App\\Models\\User', 6, 'mk-network', '6e58f68d00ad24cccfc4514acdbbc57eb0a6ddb0f75a0e8718cf488d993e441d', '[\"*\"]', '2024-09-02 06:47:05', NULL, '2024-08-29 13:06:16', '2024-09-02 06:47:05'),
(289, 'App\\Models\\User', 6, 'mk-network', 'cbdb04be9f1696a590509067d5145a3fb8acc6beed17883cbcbaeda868cc845e', '[\"*\"]', '2024-08-30 05:16:48', NULL, '2024-08-29 13:08:19', '2024-08-30 05:16:48'),
(290, 'App\\Models\\User', 4, 'lanka-express', 'ebc5c37941030512ca32e9b38edf879bb7b913913dd90aa0f4071940627d44bb', '[\"*\"]', '2024-08-29 13:11:38', NULL, '2024-08-29 13:11:14', '2024-08-29 13:11:38'),
(291, 'App\\Models\\User', 6, 'lanka-express', 'ceb0f84bca007b920133be82c6e1a0a21a55844468f0ef492c53bca36205419c', '[\"*\"]', '2024-09-20 12:00:17', NULL, '2024-08-29 13:11:48', '2024-09-20 12:00:17'),
(292, 'App\\Models\\User', 4, 'lanka-express', 'b71747b624358557ceb3d5851eb96b681d47b81f5f7ea488ebae377a7c22fba9', '[\"*\"]', '2024-08-30 11:12:15', NULL, '2024-08-30 11:08:52', '2024-08-30 11:12:15'),
(293, 'App\\Models\\User', 6, 'mk-network', '41809fcfc937270f106ba3403d697cf57e8ddf3b5720c069b0aaf671dc4aaeb1', '[\"*\"]', '2024-08-30 11:12:44', NULL, '2024-08-30 11:12:42', '2024-08-30 11:12:44'),
(294, 'App\\Models\\User', 8, 'mk-network', '65482d03b86537ea88630813511d350a2f067e64b0d3dfe228e7cbc0a402061e', '[\"*\"]', '2024-09-02 06:57:31', NULL, '2024-09-02 06:56:30', '2024-09-02 06:57:31'),
(295, 'App\\Models\\User', 13, 'mk-network', '11b9794b8c91f7178df84ddef45c8ba06d0fba6a0035722a1c2fce3a075a628d', '[\"*\"]', '2024-09-02 10:16:58', NULL, '2024-09-02 06:59:31', '2024-09-02 10:16:58'),
(296, 'App\\Models\\User', 6, 'mk-network', 'a9c3ac0867a9a9b520a6c756886983868b654dbe028446de1d16b7394782708e', '[\"*\"]', '2024-09-02 10:17:39', NULL, '2024-09-02 10:17:32', '2024-09-02 10:17:39'),
(297, 'App\\Models\\User', 13, 'mk-network', '229efb74ff11938b85dc170680715c248a91fc25eaedc7aa8f2b58441d28b8b3', '[\"*\"]', '2024-09-08 18:26:24', NULL, '2024-09-02 10:23:44', '2024-09-08 18:26:24'),
(298, 'App\\Models\\User', 4, 'lanka-express', '96e36511a7eb428fd2b388490b24d2c7bcce89beb3d64d630dde9312389a4ce6', '[\"*\"]', '2024-09-11 08:10:04', NULL, '2024-09-05 08:29:36', '2024-09-11 08:10:04'),
(299, 'App\\Models\\User', 6, 'mk-network', '01966d9b0c721e6fa6ac437feb8c7032da8ec704162dc7cbe40180b187f9c410', '[\"*\"]', '2024-09-11 13:06:50', NULL, '2024-09-08 18:26:43', '2024-09-11 13:06:50'),
(300, 'App\\Models\\User', 8, 'mk-network', 'e433d2c510712f52584bd66a7bdedf9475d418a6edd526788f07148f5b5681b1', '[\"*\"]', '2024-09-11 06:19:04', NULL, '2024-09-11 06:08:51', '2024-09-11 06:19:04'),
(301, 'App\\Models\\User', 4, 'mk-network', '827ae7fd4d231c282104bc4c55fe70d35188d44d02e0c56ff6a2e35e5bdceea8', '[\"*\"]', '2024-09-11 07:51:03', NULL, '2024-09-11 06:20:13', '2024-09-11 07:51:03'),
(302, 'App\\Models\\User', 4, 'mk-network', '36e5b0100e398b5105927bf6361c69f0445996b5e4686724cb5598388c78fc1f', '[\"*\"]', '2024-09-11 08:17:22', NULL, '2024-09-11 08:04:43', '2024-09-11 08:17:22'),
(303, 'App\\Models\\User', 8, 'mk-network', '3e040d631131a79df21c849b3b68c4ea3aa7fcc83934f1e7580cd0ca21c2ca7d', '[\"*\"]', NULL, NULL, '2024-09-11 13:07:15', '2024-09-11 13:07:15'),
(304, 'App\\Models\\User', 13, 'mk-network', '861b654c6fca17e25ed51d51540f77a735261d8c2fa391e61ae8984ad4948f40', '[\"*\"]', '2024-09-11 13:14:06', NULL, '2024-09-11 13:07:53', '2024-09-11 13:14:06'),
(305, 'App\\Models\\User', 8, 'mk-network', '96c506948a65260696005a3d4fab72b4176e8f40435e3765c3eb346f29dc3d32', '[\"*\"]', NULL, NULL, '2024-09-11 13:14:21', '2024-09-11 13:14:21'),
(306, 'App\\Models\\User', 4, 'lanka-express', 'ceafea8338a01a96f5c7f13aea792533b0a0a07b6e5da60296566c08aea2b81c', '[\"*\"]', '2024-09-12 05:05:13', NULL, '2024-09-12 04:52:24', '2024-09-12 05:05:13'),
(307, 'App\\Models\\User', 4, 'lanka-express', '3ced583436a366854c361aeee18f8bc9d79e868dd90e52fca5b2a74e7499c3c4', '[\"*\"]', '2024-09-12 08:41:42', NULL, '2024-09-12 07:22:27', '2024-09-12 08:41:42'),
(308, 'App\\Models\\User', 4, 'mk-network', 'e1764ba2919b6d36f669194056d46fe4b70578d787da53ec6e6bb4fe409d5591', '[\"*\"]', '2024-09-12 11:46:21', NULL, '2024-09-12 07:46:40', '2024-09-12 11:46:21'),
(309, 'App\\Models\\User', 4, 'mk-network', 'ed482d9eaf98d0b9515102003cec93150b753a387719b47ce48b0378a456d22d', '[\"*\"]', '2024-09-16 07:07:17', NULL, '2024-09-12 08:39:46', '2024-09-16 07:07:17'),
(310, 'App\\Models\\User', 4, 'lanka-express', 'b8414c616706ced0941ae66c439a4f16d1011e5ec4a92aa87c7ca87161045e1c', '[\"*\"]', '2024-09-21 09:05:19', NULL, '2024-09-13 06:10:51', '2024-09-21 09:05:19'),
(311, 'App\\Models\\User', 4, 'mk-network', 'a69af6cb9d162e81e15cbfa71371034138a19735c860e842b16342df2c1c0fa6', '[\"*\"]', '2024-09-13 06:18:27', NULL, '2024-09-13 06:17:03', '2024-09-13 06:18:27'),
(312, 'App\\Models\\User', 8, 'mk-network', 'ac17c5a524e6186d3b4ae958fbd14404c2b59eda9efbe5e2aaefcd8970a9e82f', '[\"*\"]', '2024-09-21 10:04:33', NULL, '2024-09-13 17:18:59', '2024-09-21 10:04:33'),
(313, 'App\\Models\\User', 15, 'lanka-express', '94e3764f28bd60b6ca08455397c4eed2f70b524a4086615d70c459eff5e4f40d', '[\"*\"]', '2024-09-16 11:17:48', NULL, '2024-09-16 07:07:38', '2024-09-16 11:17:48'),
(314, 'App\\Models\\User', 4, 'mk-network', 'a7fcd830888a9ba873d7fe0a21bef3bc2d9d358d02ea9027ee1b41b8f42d2d08', '[\"*\"]', '2024-09-16 11:24:43', NULL, '2024-09-16 11:18:07', '2024-09-16 11:24:43'),
(315, 'App\\Models\\User', 15, 'lanka-express', '9487d77a946cd971b27ec12165cd654043c1ceb701171d1edf5d916a93942a1c', '[\"*\"]', '2024-09-16 11:26:16', NULL, '2024-09-16 11:26:07', '2024-09-16 11:26:16'),
(316, 'App\\Models\\User', 1, 'mk-network', 'c04976693eee5acdd640935541de246a0bd6ac40f79909bd2edc4277348e4834', '[\"*\"]', NULL, NULL, '2024-09-16 11:27:06', '2024-09-16 11:27:06'),
(317, 'App\\Models\\User', 4, 'mk-network', '1e6e73a2d01641871feebdfebc295db6d11b09d08c9d8dc77340a3f6e7f764ba', '[\"*\"]', '2024-09-20 12:08:52', NULL, '2024-09-16 11:29:28', '2024-09-20 12:08:52'),
(318, 'App\\Models\\User', 8, 'mk-network', '05fad4f4138f19d498d701a1126a4ec544c26e54fd5b1c8ab7fb97a963443d2b', '[\"*\"]', '2024-09-17 11:56:28', NULL, '2024-09-17 11:50:59', '2024-09-17 11:56:28'),
(319, 'App\\Models\\User', 8, 'mk-network', 'f5fb02b2ec7e5f70a85a21b8f76b061e6bd301ed772153497aa463cef95d26cf', '[\"*\"]', '2024-09-19 12:22:41', NULL, '2024-09-18 11:35:36', '2024-09-19 12:22:41'),
(320, 'App\\Models\\User', 8, 'mk-network', '9a952aa49db8791bcd4b63dc0e18fa9794cc6cb35b18a9e1c1663a7b69d77d42', '[\"*\"]', '2024-09-19 12:23:06', NULL, '2024-09-19 06:38:09', '2024-09-19 12:23:06'),
(321, 'App\\Models\\User', 4, 'mk-network', '8a350e949f2d90b707adff2f2996538f80d0763d038cb711af035c9387e3fa0f', '[\"*\"]', '2024-09-23 07:15:46', NULL, '2024-09-20 07:46:20', '2024-09-23 07:15:46'),
(322, 'App\\Models\\User', 4, 'mk-network', '19e1cbdb510471343148eae63b6fee46e980bd89b4b99ffb3e7249334fe5a73e', '[\"*\"]', '2024-09-20 08:02:46', NULL, '2024-09-20 08:02:31', '2024-09-20 08:02:46'),
(323, 'App\\Models\\User', 8, 'mk-network', 'e8339b823318cbfabed80d3960e8d88a1d6a6f2d062cde3db96904085ef75b5d', '[\"*\"]', '2024-09-21 09:32:18', NULL, '2024-09-20 11:06:03', '2024-09-21 09:32:18'),
(324, 'App\\Models\\User', 26, 'mk-network', 'd9e0c1af787e64a7a24e3446982a434c6d0ee7e3d19fbd67d1a39fa5fec2d6a2', '[\"*\"]', '2024-09-20 12:05:13', NULL, '2024-09-20 11:58:11', '2024-09-20 12:05:13'),
(325, 'App\\Models\\User', 8, 'mk-network', '5afb4eed4155ecf155904a9a26ee61bd401f35bf1767405c7dcab5211427c7b7', '[\"*\"]', '2024-09-20 12:05:08', NULL, '2024-09-20 12:04:42', '2024-09-20 12:05:08'),
(326, 'App\\Models\\User', 4, 'mk-network', '7d11feb91bc29ba8486c5aab63eae7e5e3b50d5041d74114587fde579f82e407', '[\"*\"]', '2024-09-22 11:36:48', NULL, '2024-09-20 12:06:53', '2024-09-22 11:36:48'),
(327, 'App\\Models\\User', 8, 'mk-network', '5b7ec7d497c9652ebdeb16ece58eb5f2b8a667eab728676a731d781899737cb0', '[\"*\"]', '2024-09-21 09:46:20', NULL, '2024-09-21 07:12:32', '2024-09-21 09:46:20'),
(328, 'App\\Models\\User', 27, 'mk-network', '435c2375e8e681492646a226211e8ce2de3ff62092d664a7af7ac669121cac60', '[\"*\"]', '2024-09-21 08:40:36', NULL, '2024-09-21 08:37:56', '2024-09-21 08:40:36'),
(329, 'App\\Models\\User', 27, 'lanka-express', 'fe3c77f97787b52d395846c3fd4b31d46da6683b20b5318dcfa6ae64814f5925', '[\"*\"]', NULL, NULL, '2024-09-21 08:41:11', '2024-09-21 08:41:11'),
(330, 'App\\Models\\User', 28, 'mk-network', 'bd15d005dcc96e593c88141da52b580d1c3b3bf83587552e9e5a91e7abb0480c', '[\"*\"]', '2024-09-21 10:03:56', NULL, '2024-09-21 08:46:32', '2024-09-21 10:03:56'),
(331, 'App\\Models\\User', 28, 'mk-network', '3dfab75672faab0803da97657e289111dbd54a65a240bdf86d707cfcc94c12b1', '[\"*\"]', '2024-09-21 09:03:19', NULL, '2024-09-21 09:03:18', '2024-09-21 09:03:19'),
(332, 'App\\Models\\User', 28, 'mk-network', 'cc12702075bb5843b01a63eab5c697733d108a70b924c9b59160fb7afa08aec9', '[\"*\"]', '2024-09-21 09:05:35', NULL, '2024-09-21 09:03:41', '2024-09-21 09:05:35'),
(333, 'App\\Models\\User', 6, 'mk-network', '5e1d14bc627afd999c845b7ab9cda4cc76c5189cc45765ccc0a5be2fbe7af744', '[\"*\"]', '2024-09-21 09:06:22', NULL, '2024-09-21 09:06:15', '2024-09-21 09:06:22'),
(334, 'App\\Models\\User', 4, 'mk-network', 'a2335d76c8278c406244b1dce6a510273e3702441dc7147b6875d2e45035f512', '[\"*\"]', '2024-09-21 09:14:53', NULL, '2024-09-21 09:06:58', '2024-09-21 09:14:53'),
(335, 'App\\Models\\User', 6, 'mk-network', '5d9391d0a676b1b4714ab63b9677829c4415a7413e9ff7b8ffdc298538b0878e', '[\"*\"]', '2024-09-21 09:10:15', NULL, '2024-09-21 09:09:30', '2024-09-21 09:10:15'),
(336, 'App\\Models\\User', 4, 'mk-network', 'dfbde9ba36654a63bc6fff56badea600214935256ba0c63f733489516fa58516', '[\"*\"]', '2024-09-21 09:13:00', NULL, '2024-09-21 09:10:41', '2024-09-21 09:13:00'),
(337, 'App\\Models\\User', 4, 'mk-network', '3d41243d6fb70ac48fdba5d7a0b6208103aed2e31d20bc44dcf8ee42003bb377', '[\"*\"]', '2024-09-21 09:35:12', NULL, '2024-09-21 09:14:53', '2024-09-21 09:35:12'),
(338, 'App\\Models\\User', 4, 'mk-network', '8027dae0acb500bf936b78fa7f3da411b9fd850a8aedcc7ecd740a3cccf74455', '[\"*\"]', NULL, NULL, '2024-09-21 09:22:37', '2024-09-21 09:22:37'),
(339, 'App\\Models\\User', 29, 'mk-network', '7b49ef832b07f13dfa643a84e8b43044151327c5498101147a6d72c93c3a3588', '[\"*\"]', '2024-09-21 09:30:31', NULL, '2024-09-21 09:28:12', '2024-09-21 09:30:31'),
(340, 'App\\Models\\User', 29, 'mk-network', 'cdfbe4af896d064cc98641c6269f7a181bfe464fab4672297545e0f76d825e62', '[\"*\"]', '2024-09-21 09:35:31', NULL, '2024-09-21 09:34:45', '2024-09-21 09:35:31'),
(341, 'App\\Models\\User', 29, 'mk-network', '185a4cfa166242147aa0c5b02882d312ee27da07e2238bdabf08bc4a1a97f192', '[\"*\"]', '2024-09-21 09:50:23', NULL, '2024-09-21 09:39:46', '2024-09-21 09:50:23'),
(342, 'App\\Models\\User', 29, 'mk-network', '617e3449698ae3b8a6aee8c1e4fe2f30d6ff79c03fa1853f451467cf55a8715a', '[\"*\"]', '2024-09-21 09:44:39', NULL, '2024-09-21 09:40:46', '2024-09-21 09:44:39'),
(343, 'App\\Models\\User', 29, 'mk-network', '0f625544e41ed961a81b613d2e1e74c46b6f4fac208c3bb661498f11c1119dd6', '[\"*\"]', '2024-09-21 09:42:42', NULL, '2024-09-21 09:42:35', '2024-09-21 09:42:42'),
(344, 'App\\Models\\User', 4, 'mk-network', '717c5c7307ee551e1a7e2ae2e3c89628af58cb5dae0819c022c4345a9cb6cccb', '[\"*\"]', '2024-09-21 09:46:04', NULL, '2024-09-21 09:43:02', '2024-09-21 09:46:04'),
(345, 'App\\Models\\User', 29, 'mk-network', 'bfcd289375b90d010a2a7bc316823153f449e143beafa822ae0090fcb93bcfd2', '[\"*\"]', '2024-09-21 09:58:06', NULL, '2024-09-21 09:49:19', '2024-09-21 09:58:06'),
(346, 'App\\Models\\User', 4, 'mk-network', 'b33b3260fe3a1e1d198d8d89fef85ae9e4b7d977a10e3f39b0183ddf42426483', '[\"*\"]', '2024-09-21 11:51:22', NULL, '2024-09-21 09:58:05', '2024-09-21 11:51:22'),
(347, 'App\\Models\\User', 30, 'mk-network', '407c4ddc330d7f07e4ee5c4c73fb01f457593be5824726d22d727a7c9ff6e03b', '[\"*\"]', '2024-09-21 10:05:04', NULL, '2024-09-21 10:04:30', '2024-09-21 10:05:04'),
(348, 'App\\Models\\User', 30, 'mk-network', '5b17eabc8fb93665d6fdd86d6db760e4b61f36f1fa5d908135a049b898e0640b', '[\"*\"]', '2024-09-21 10:39:39', NULL, '2024-09-21 10:06:53', '2024-09-21 10:39:39'),
(349, 'App\\Models\\User', 6, 'mk-network', 'e2f50f3622fcb36e0ac34f4cf978904ecf15433f6e506d139789d4fb66be7652', '[\"*\"]', NULL, NULL, '2024-09-21 12:00:36', '2024-09-21 12:00:36'),
(350, 'App\\Models\\User', 6, 'mk-network', '31ddd46e50103814946694fa767f9a9c22193f84333c33476f1461a26fa9d155', '[\"*\"]', '2024-09-21 12:03:33', NULL, '2024-09-21 12:02:49', '2024-09-21 12:03:33'),
(351, 'App\\Models\\User', 29, 'mk-network', '4504235750508a6b78f31da73c60cee15411ff8bc0c32977ace8c18cec114a51', '[\"*\"]', '2024-09-21 12:03:08', NULL, '2024-09-21 12:03:01', '2024-09-21 12:03:08'),
(352, 'App\\Models\\User', 28, 'mk-network', 'bc835661be27e23f5826dcc8f91103d09ef476eb0c33d39f306e02af9c99337f', '[\"*\"]', '2024-09-21 12:03:50', NULL, '2024-09-21 12:03:24', '2024-09-21 12:03:50'),
(353, 'App\\Models\\User', 6, 'mk-network', 'ed8f1aee5c14bf7b47ba74d41ceb80205bda7d1beb895eade22059b99af2f300', '[\"*\"]', '2024-09-21 12:04:24', NULL, '2024-09-21 12:04:03', '2024-09-21 12:04:24'),
(354, 'App\\Models\\User', 29, 'mk-network', '5e24bf92a3701b91312cfb1db37ad49c4d0934531c0225f0dfca258ee63002b9', '[\"*\"]', '2024-09-21 12:05:20', NULL, '2024-09-21 12:04:59', '2024-09-21 12:05:20'),
(355, 'App\\Models\\User', 4, 'mk-network', 'f6fdea0babe9cab585ed2d3a10bcb375d16e6307f8a19756a73e882afdd7b581', '[\"*\"]', '2024-09-23 04:26:03', NULL, '2024-09-23 04:07:42', '2024-09-23 04:26:03'),
(356, 'App\\Models\\User', 29, 'mk-network', '3a4f71addd1894cee019a7ef85c78c33a39f9d27bc678d862aa8e44d517e92fa', '[\"*\"]', '2024-09-23 04:24:23', NULL, '2024-09-23 04:24:20', '2024-09-23 04:24:23'),
(357, 'App\\Models\\User', 4, 'mk-network', 'c37ffe6dc52df4d6653f9fc5b7263a4612623e21ebeb32a02dcb5c6953a2554c', '[\"*\"]', '2024-09-23 04:25:03', NULL, '2024-09-23 04:24:55', '2024-09-23 04:25:03'),
(358, 'App\\Models\\User', 6, 'mk-network', '62319c0a22c0fbb6404450c76982c12bfe590e527e445a233e0201c0fcb3f76e', '[\"*\"]', NULL, NULL, '2024-09-23 04:26:02', '2024-09-23 04:26:02'),
(359, 'App\\Models\\User', 4, 'mk-network', '11c90ea2d3c87a7450b114d359f667966ce951eaf12e76e72a741119cffa8841', '[\"*\"]', '2024-09-23 04:28:10', NULL, '2024-09-23 04:27:54', '2024-09-23 04:28:10'),
(360, 'App\\Models\\User', 4, 'mk-network', '0fde70082cef75f569e8736c72434d3d331565fb99991f34a36daaef1bcb7129', '[\"*\"]', '2024-09-23 05:39:32', NULL, '2024-09-23 05:17:21', '2024-09-23 05:39:32'),
(361, 'App\\Models\\User', 8, 'mk-network', '1ef4845249b848bc8863012af803ddbe4e4336007e87812fb2492d7b8ba5b433', '[\"*\"]', '2024-09-23 05:41:23', NULL, '2024-09-23 05:31:25', '2024-09-23 05:41:23'),
(362, 'App\\Models\\User', 1, 'mk-network', '4f74e79c080e414244c65a400feb8d16d2921db59ba63ce7649a46e63317bcf3', '[\"*\"]', '2024-09-23 06:02:28', NULL, '2024-09-23 05:58:15', '2024-09-23 06:02:28'),
(363, 'App\\Models\\User', 2, 'mk-network', 'd363f639acd18985b76bece974ce58a220e1bf152b778258341d75057639f456', '[\"*\"]', '2024-09-23 06:18:08', NULL, '2024-09-23 06:01:58', '2024-09-23 06:18:08'),
(364, 'App\\Models\\User', 3, 'mk-network', '073ef8b726c60f91d621a0653b8ea08694f0c21ac8b9c203f5044f9be105434a', '[\"*\"]', '2024-09-23 06:22:19', NULL, '2024-09-23 06:03:30', '2024-09-23 06:22:19'),
(365, 'App\\Models\\User', 4, 'mk-network', 'faaabe4039d9734bd9f6629a699f088bccd2e1116997e3e3fdc550abffd81333', '[\"*\"]', '2024-09-23 06:20:49', NULL, '2024-09-23 06:04:09', '2024-09-23 06:20:49'),
(366, 'App\\Models\\User', 1, 'lanka-express', '8c9de00da28542be197f2a157717b41adfb6780a58ca99a4914d01df6a62627a', '[\"*\"]', '2024-09-23 08:21:47', NULL, '2024-09-23 06:04:30', '2024-09-23 08:21:47'),
(367, 'App\\Models\\User', 2, 'mk-network', '1e0f124912e02001aacea3579030069d8eb3d05d4194b781915dfd7a5a78f279', '[\"*\"]', '2024-09-23 07:55:04', NULL, '2024-09-23 06:10:51', '2024-09-23 07:55:04'),
(368, 'App\\Models\\User', 3, 'lanka-express', '46d71280eb8b4655405cc9d1d03e5858efa843bd7b88073eee28ac9921f1d3b7', '[\"*\"]', '2024-09-25 10:21:57', NULL, '2024-09-23 06:20:48', '2024-09-25 10:21:57'),
(369, 'App\\Models\\User', 4, 'lanka-express', '1588d8c033ebb4ef62988d824eae612b32bfc465255957d9ac001a2242c48f7e', '[\"*\"]', '2024-09-23 12:12:32', NULL, '2024-09-23 06:20:49', '2024-09-23 12:12:32'),
(370, 'App\\Models\\User', 5, 'mk-network', 'a82e013594a1def0453ac0eb4da17cb4fb4a402407eeeca1a0c96d97993679c0', '[\"*\"]', '2024-09-23 06:56:25', NULL, '2024-09-23 06:25:19', '2024-09-23 06:56:25'),
(371, 'App\\Models\\User', 1, 'mk-network', 'ae8602fa60ece531a316f8a075804a890f12a62cecbb79ffe2fb0b6e655ba153', '[\"*\"]', '2024-09-23 07:14:33', NULL, '2024-09-23 06:28:29', '2024-09-23 07:14:33'),
(372, 'App\\Models\\User', 1, 'mk-network', 'ab32f4919aa9f1fc8c70abfc3201185a04e65eee63981f8a2119a71237404b2d', '[\"*\"]', '2024-09-23 06:55:52', NULL, '2024-09-23 06:49:28', '2024-09-23 06:55:52'),
(373, 'App\\Models\\User', 5, 'mk-network', '9aa9784c4bedc570334800daf69c35ced754f0f6bf7e5b64ee21863143012a9c', '[\"*\"]', '2024-09-23 06:56:12', NULL, '2024-09-23 06:56:06', '2024-09-23 06:56:12'),
(374, 'App\\Models\\User', 1, 'mk-network', 'feeeeef339b910f41fcf200cab2096e2c2b840ee9f2459a7ebdc61b1c529b912', '[\"*\"]', '2024-09-23 07:04:09', NULL, '2024-09-23 06:56:24', '2024-09-23 07:04:09'),
(375, 'App\\Models\\User', 5, 'mk-network', 'd51db5fa4d4872ed6e43a8d46944caf818e1f6b7e5cf1bec1fa5f98d0c65ba6b', '[\"*\"]', '2024-09-23 07:27:01', NULL, '2024-09-23 07:04:08', '2024-09-23 07:27:01'),
(376, 'App\\Models\\User', 5, 'mk-network', '4f00f2600109df862b0087abc78b51366e8b8a8d616809850a950314bbd8aa78', '[\"*\"]', '2024-09-23 09:22:16', NULL, '2024-09-23 07:06:59', '2024-09-23 09:22:16'),
(377, 'App\\Models\\User', 6, 'mk-network', 'b0dede4301d7b42cf704410c3b68384e44ba61b699a157a50f58ce2de3d66ffe', '[\"*\"]', '2024-09-23 07:47:20', NULL, '2024-09-23 07:45:47', '2024-09-23 07:47:20'),
(378, 'App\\Models\\User', 2, 'mk-network', '8405bcb051ea5f020120140c227764c4509f66139d79746f51837dfc718bde31', '[\"*\"]', '2024-09-23 10:31:49', NULL, '2024-09-23 07:50:44', '2024-09-23 10:31:49'),
(379, 'App\\Models\\User', 5, 'mk-network', '64afd2e099e0e1a02eaec67826ef58ef23a084e3e8c335ef158ee0cc0d6bb261', '[\"*\"]', '2024-09-23 07:56:38', NULL, '2024-09-23 07:53:40', '2024-09-23 07:56:38'),
(380, 'App\\Models\\User', 6, 'mk-network', '4a986e8f2e756eb6570c84f419bd3901447a37c358df18d36c134cc5d0162420', '[\"*\"]', '2024-09-23 07:56:36', NULL, '2024-09-23 07:54:35', '2024-09-23 07:56:36'),
(381, 'App\\Models\\User', 5, 'mk-network', '73c1810746d10c1250a99ff7eeb091ba1c498b7d56bc72b766ddf6280df850dc', '[\"*\"]', '2024-09-23 08:00:54', NULL, '2024-09-23 08:00:50', '2024-09-23 08:00:54'),
(382, 'App\\Models\\User', 5, 'mk-network', 'a56a66b0b778086dcd461ef98142d7b56a3a51d77bd0d095c6a33c0fd645bf10', '[\"*\"]', '2024-09-23 08:02:56', NULL, '2024-09-23 08:02:54', '2024-09-23 08:02:56'),
(383, 'App\\Models\\User', 1, 'mk-network', 'ea3e9ca5d3b69f69645d06d240a95fc321f07db7ec06959cc3689ca3c0befeb5', '[\"*\"]', '2024-09-23 08:08:21', NULL, '2024-09-23 08:03:49', '2024-09-23 08:08:21'),
(384, 'App\\Models\\User', 5, 'mk-network', '0d6bdb465708e193859076c7535f28d533c019d58d556591876f7df3de5cbf64', '[\"*\"]', '2024-09-23 08:26:35', NULL, '2024-09-23 08:08:20', '2024-09-23 08:26:35'),
(385, 'App\\Models\\User', 5, 'mk-network', '3fcbb127f799e8a388c2279fd837cc7fe23ce9542b33247da0f15b17b3fb79a8', '[\"*\"]', '2024-09-23 08:10:17', NULL, '2024-09-23 08:10:03', '2024-09-23 08:10:17'),
(386, 'App\\Models\\User', 7, 'mk-network', 'eff6bf7b97548ec4a864e720f6e546e265d3d502bdfbb84e05677a30c98dc6ce', '[\"*\"]', '2024-09-23 08:23:50', NULL, '2024-09-23 08:21:47', '2024-09-23 08:23:50'),
(387, 'App\\Models\\User', 7, 'lanka-express', '3f6f0e58fe9b19e50277abd9f6b812382524d11571c24e8474024610744783d0', '[\"*\"]', '2024-09-23 09:53:52', NULL, '2024-09-23 08:25:07', '2024-09-23 09:53:52'),
(388, 'App\\Models\\User', 5, 'mk-network', '42ad5591df861dfb1a37abe26a03f2164012c24867050ea6791f4809cc785a92', '[\"*\"]', '2024-09-23 08:59:33', NULL, '2024-09-23 08:28:53', '2024-09-23 08:59:33'),
(389, 'App\\Models\\User', 2, 'mk-network', '90839d70413c54f96d602d6201df511959e39cc16453ad53b1ebc0ece58c52cc', '[\"*\"]', '2024-09-23 08:43:34', NULL, '2024-09-23 08:41:55', '2024-09-23 08:43:34'),
(390, 'App\\Models\\User', 2, 'mk-network', 'b77538a20df5ac8bc1c2092aa5b1bf2bf25eb47d6eb5cc2c9842461035793763', '[\"*\"]', '2024-09-23 08:48:04', NULL, '2024-09-23 08:45:04', '2024-09-23 08:48:04'),
(391, 'App\\Models\\User', 3, 'mk-network', '589c81801fd5d974e7c2da89341b3852d1b8adc6edda80f001115b7deb1dced6', '[\"*\"]', '2024-09-23 09:17:03', NULL, '2024-09-23 08:49:17', '2024-09-23 09:17:03'),
(392, 'App\\Models\\User', 2, 'mk-network', '577fc9df085be681c675f333efb7274d021141133b3040f9644491cff902672e', '[\"*\"]', '2024-09-23 09:16:26', NULL, '2024-09-23 09:09:34', '2024-09-23 09:16:26'),
(393, 'App\\Models\\User', 3, 'mk-network', '6ca1997ffbe1ade64b3f6a957025c8c0ca51f9f033308d34c37af8c5f4c2d605', '[\"*\"]', '2024-09-23 09:30:22', NULL, '2024-09-23 09:17:01', '2024-09-23 09:30:22'),
(394, 'App\\Models\\User', 2, 'mk-network', '9bbae8aa8bf84b6eb5aa008043ff96dd6a086b1c0bc95658aeddd25f132e9188', '[\"*\"]', '2024-09-23 09:25:50', NULL, '2024-09-23 09:25:48', '2024-09-23 09:25:50'),
(395, 'App\\Models\\User', 5, 'mk-network', 'fc4199bc5fbb8f73c4dc897ebf0225397fb8829d95f5a9951acf8e809aebc0a0', '[\"*\"]', '2024-09-23 09:26:06', NULL, '2024-09-23 09:26:00', '2024-09-23 09:26:06'),
(396, 'App\\Models\\User', 2, 'mk-network', 'd12b2923ee9079ce394c3ad02562a0ccc4418576e8bbf0cf9aff8c882456ec82', '[\"*\"]', '2024-09-23 09:26:52', NULL, '2024-09-23 09:26:50', '2024-09-23 09:26:52'),
(397, 'App\\Models\\User', 3, 'mk-network', 'ddc3248f23047c5b2f8fff49c257e2ef96417691c0da30a3d9a54fa9b7e22645', '[\"*\"]', '2024-09-23 09:27:28', NULL, '2024-09-23 09:27:24', '2024-09-23 09:27:28'),
(398, 'App\\Models\\User', 6, 'mk-network', '8f99d4e75ca15c23745823ba67bbfe515c8099aa2108312ce751edad48fb0fe6', '[\"*\"]', '2024-09-23 09:28:55', NULL, '2024-09-23 09:28:00', '2024-09-23 09:28:55'),
(399, 'App\\Models\\User', 3, 'mk-network', '048ee998dbef25df88cca374530b8e6c9522b71e02347484316c9353e8012615', '[\"*\"]', '2024-09-23 09:53:19', NULL, '2024-09-23 09:30:21', '2024-09-23 09:53:19'),
(400, 'App\\Models\\User', 5, 'mk-network', 'bc612153b2bd42ca2616c453f053f533bcad08f1dccd723d51e0705df11e668a', '[\"*\"]', '2024-09-23 09:58:19', NULL, '2024-09-23 09:53:18', '2024-09-23 09:58:19'),
(401, 'App\\Models\\User', 6, 'mk-network', '6cf012905878b614df882937eb8c9e695c818a3bcbe83010bb20acd6fe5378f1', '[\"*\"]', '2024-09-23 09:54:12', NULL, '2024-09-23 09:53:52', '2024-09-23 09:54:12'),
(402, 'App\\Models\\User', 6, 'mk-network', 'ae9dbf36422bf342e17ea05ba10b2449f6c0233cfe6b9d6c0312af792a97d58b', '[\"*\"]', '2024-09-23 10:00:45', NULL, '2024-09-23 09:58:54', '2024-09-23 10:00:45'),
(403, 'App\\Models\\User', 3, 'mk-network', '17de6f738771b50cee6b0eab989e0c89999a88cb7f3b43b52d49b8b8f1201afa', '[\"*\"]', '2024-09-23 10:00:14', NULL, '2024-09-23 10:00:12', '2024-09-23 10:00:14'),
(404, 'App\\Models\\User', 2, 'mk-network', 'c93e8b7a356eb09e81db6c655a61c297765079000116ae5177e40549e300e0fa', '[\"*\"]', '2024-09-23 10:06:21', NULL, '2024-09-23 10:00:26', '2024-09-23 10:06:21'),
(405, 'App\\Models\\User', 3, 'mk-network', '9f42d8d02be26f1a3911e87d15645b2d79b13ec39c1ec011d0c6c9a6851410f4', '[\"*\"]', '2024-09-23 10:17:18', NULL, '2024-09-23 10:02:56', '2024-09-23 10:17:18'),
(406, 'App\\Models\\User', 5, 'mk-network', 'b2ede94e3e73d3af40810c17156d8797cf746a98dcc196bf8ab6aa5bed40a72c', '[\"*\"]', '2024-09-23 10:16:17', NULL, '2024-09-23 10:12:51', '2024-09-23 10:16:17'),
(407, 'App\\Models\\User', 3, 'mk-network', 'c8d3936014b2caa125c231af6fd0e26fbb772ed64bad63c2d23a8f6b550948db', '[\"*\"]', '2024-09-23 10:16:55', NULL, '2024-09-23 10:16:52', '2024-09-23 10:16:55'),
(408, 'App\\Models\\User', 2, 'mk-network', '9496a8194e9cdd9e93834f096783b11c9ca409c58b6072bda3fbae1a16e4e2d7', '[\"*\"]', '2024-09-23 10:22:17', NULL, '2024-09-23 10:17:11', '2024-09-23 10:22:17'),
(409, 'App\\Models\\User', 3, 'mk-network', '0a62b9122f8680befa8fbd016a81bd5edaca533dc6b99f92951ddae68db56bf0', '[\"*\"]', '2024-09-23 10:30:02', NULL, '2024-09-23 10:17:48', '2024-09-23 10:30:02'),
(410, 'App\\Models\\User', 5, 'mk-network', '23aecf7df6345bcf4d6010b752349eaa6f2c9733725e3df74d725a4c03ffd0ef', '[\"*\"]', '2024-09-23 10:28:16', NULL, '2024-09-23 10:23:45', '2024-09-23 10:28:16'),
(411, 'App\\Models\\User', 3, 'mk-network', '07b068c8daf170115abe5af9e565855f4abac96822200a076b837aaf51278d36', '[\"*\"]', '2024-09-23 10:29:19', NULL, '2024-09-23 10:26:19', '2024-09-23 10:29:19'),
(412, 'App\\Models\\User', 2, 'mk-network', 'ea10ff1b864a90c4411ce30c3909946468d144275c7d5296f2a22b8fee07b58c', '[\"*\"]', '2024-09-23 10:47:00', NULL, '2024-09-23 10:29:53', '2024-09-23 10:47:00'),
(413, 'App\\Models\\User', 2, 'mk-network', 'cf5605d22befea3c3670788c23c456d50fb964430e37255a9734ed939b7119dd', '[\"*\"]', '2024-09-23 11:48:27', NULL, '2024-09-23 10:31:48', '2024-09-23 11:48:27'),
(414, 'App\\Models\\User', 5, 'mk-network', '00e79e25a706fed1d1f7dd42ef8975befb6e0395d1aa878bc96b61e80a31ff18', '[\"*\"]', '2024-09-23 10:51:39', NULL, '2024-09-23 10:46:59', '2024-09-23 10:51:39'),
(415, 'App\\Models\\User', 2, 'mk-network', '08bbf37a689ed175b15c2ec43ca64836141643889f1e33a6c07572a4a73559e1', '[\"*\"]', '2024-09-23 11:03:25', NULL, '2024-09-23 10:51:38', '2024-09-23 11:03:25'),
(416, 'App\\Models\\User', 1, 'mk-network', 'e55d12b3f7cd60bd11531ff66faed7c9c3c8ca2675915a438ce1a05e6c3cad3c', '[\"*\"]', '2024-09-23 11:01:10', NULL, '2024-09-23 10:53:26', '2024-09-23 11:01:10'),
(417, 'App\\Models\\User', 3, 'mk-network', '7ad2eac0eb381500d735dfbaf0859e9b5cd174254c524feb7bc4609500d1c153', '[\"*\"]', '2024-09-23 11:03:11', NULL, '2024-09-23 11:02:29', '2024-09-23 11:03:11'),
(418, 'App\\Models\\User', 5, 'mk-network', 'f9ad0a1dbc296202c08a1e36027444fd57767387e8cd33efcd26f2b41d1b0cff', '[\"*\"]', '2024-09-23 11:04:22', NULL, '2024-09-23 11:03:24', '2024-09-23 11:04:22'),
(419, 'App\\Models\\User', 1, 'lanka-express', '2332f304fd8f896bf3b67bd9a262c8f529ad226917edc7104e8be82d029d6ca6', '[\"*\"]', '2024-09-23 11:28:02', NULL, '2024-09-23 11:26:57', '2024-09-23 11:28:02'),
(420, 'App\\Models\\User', 7, 'lanka-express', '3c53bef28418b5067c88ab3b74e708370ac5b1eafdfb54703b278548bae33c98', '[\"*\"]', '2024-09-23 12:07:58', NULL, '2024-09-23 11:28:01', '2024-09-23 12:07:58'),
(421, 'App\\Models\\User', 5, 'mk-network', '8d94a26054b1150945fe728cad77470a99038bda82fa81dcf2a75bdde0b361bb', '[\"*\"]', '2024-09-23 13:37:13', NULL, '2024-09-23 11:32:42', '2024-09-23 13:37:13'),
(422, 'App\\Models\\User', 1, 'lanka-express', '836c4e49222945cddaac777007443c3f21eebbc4195898c8a29213b1e3e7334b', '[\"*\"]', '2024-09-23 12:21:47', NULL, '2024-09-23 11:48:22', '2024-09-23 12:21:47'),
(423, 'App\\Models\\User', 4, 'lanka-express', '379ba7525880d1232d665934587405632d76a4f4030d4f4deb8e4549f3f8be9c', '[\"*\"]', '2024-09-23 12:26:54', NULL, '2024-09-23 12:12:32', '2024-09-23 12:26:54'),
(424, 'App\\Models\\User', 1, 'lanka-express', 'eee8619a02f2401a4ced7b5e1e8f3fa3ce1b93f56427575eb66b305a87c916f4', '[\"*\"]', '2024-09-23 14:28:35', NULL, '2024-09-23 12:26:10', '2024-09-23 14:28:35'),
(425, 'App\\Models\\User', 4, 'lanka-express', 'e1d8ae567ea73050fbe07c86350588ac3471e513d36622b47708153fdb281f83', '[\"*\"]', '2024-09-24 06:26:48', NULL, '2024-09-23 12:26:44', '2024-09-24 06:26:48'),
(426, 'App\\Models\\User', 2, 'mk-network', '66dcfa7468a05790e07ab19b17c3c2a498f541fcc81f7a7314285a9c3c9bb4ca', '[\"*\"]', '2024-09-23 12:41:55', NULL, '2024-09-23 12:41:54', '2024-09-23 12:41:55'),
(427, 'App\\Models\\User', 7, 'lanka-express', '676b85a20bcb1eba7e2076720a5ea443159c5ee44302502b3277dff2dd206fb9', '[\"*\"]', '2024-09-23 14:28:00', NULL, '2024-09-23 14:14:17', '2024-09-23 14:28:00'),
(428, 'App\\Models\\User', 2, 'mk-network', 'af4aec91caa0469eae8e27041c710af2d88c3575e1f34fe4edb7f8e1229f4407', '[\"*\"]', '2024-09-23 14:26:42', NULL, '2024-09-23 14:23:43', '2024-09-23 14:26:42'),
(429, 'App\\Models\\User', 3, 'mk-network', '8adf2781b6aa28f9c37125275dbc70cf5669273183b0264e9937bbfd1f6d32f9', '[\"*\"]', '2024-09-23 15:00:24', NULL, '2024-09-23 14:27:12', '2024-09-23 15:00:24'),
(430, 'App\\Models\\User', 7, 'lanka-express', 'f0abec7ddcd69662c976b4cdf4f21d460435665a1a9020e12d4c80782bf16ff2', '[\"*\"]', '2024-09-23 14:57:19', NULL, '2024-09-23 14:29:43', '2024-09-23 14:57:19'),
(431, 'App\\Models\\User', 3, 'mk-network', '7074bbc21fea300ce3e25fe9bc75ab81eb02a1444315ba66258b2e1e11528236', '[\"*\"]', '2024-09-23 14:34:56', NULL, '2024-09-23 14:33:49', '2024-09-23 14:34:56'),
(432, 'App\\Models\\User', 7, 'lanka-express', 'cd2b66ecd6e961997450d3cf9c131330a68282d39abcfee71c613d75acaa412f', '[\"*\"]', '2024-09-23 14:35:44', NULL, '2024-09-23 14:35:12', '2024-09-23 14:35:44'),
(433, 'App\\Models\\User', 2, 'mk-network', 'b1544dcc3a86fd1b67f6cb7ba621ef32aa60b4a5ddb6aab6b385f88f6be4e162', '[\"*\"]', '2024-09-23 14:38:30', NULL, '2024-09-23 14:36:44', '2024-09-23 14:38:30'),
(434, 'App\\Models\\User', 7, 'lanka-express', 'bfb28dc4233a6b7227c291d49582f3808fdaeeb8ca1be69c203e0421c92c0b87', '[\"*\"]', '2024-09-23 14:48:40', NULL, '2024-09-23 14:39:12', '2024-09-23 14:48:40'),
(435, 'App\\Models\\User', 1, 'lanka-express', '15e899019041fe8ddc6f2d3b3a7b537842d3578f6fac11bd5a4b1e35cfdb0d92', '[\"*\"]', '2024-09-23 14:53:06', NULL, '2024-09-23 14:49:24', '2024-09-23 14:53:06'),
(436, 'App\\Models\\User', 7, 'lanka-express', '88893b0f412b280a3d0164d6b01be9968a9b0fa3cdcf63eb88ff99e64d8fc1c6', '[\"*\"]', '2024-09-23 14:53:48', NULL, '2024-09-23 14:53:44', '2024-09-23 14:53:48'),
(437, 'App\\Models\\User', 1, 'lanka-express', 'fdbc4c3ecac0668472403951b2af92134f696c2504feebff5ee6a5214c039f40', '[\"*\"]', '2024-09-23 14:54:30', NULL, '2024-09-23 14:54:06', '2024-09-23 14:54:30'),
(438, 'App\\Models\\User', 7, 'lanka-express', '835d99226fe7ca78adf683d3d7888835385df379692943314d9be050d5984b7d', '[\"*\"]', '2024-09-23 14:54:40', NULL, '2024-09-23 14:54:39', '2024-09-23 14:54:40'),
(439, 'App\\Models\\User', 1, 'lanka-express', '8f16844414edc8fb828729be7f009cd86a0eefd9f9ce1724eec21ec8dc563d6e', '[\"*\"]', '2024-09-23 14:55:26', NULL, '2024-09-23 14:55:10', '2024-09-23 14:55:26'),
(440, 'App\\Models\\User', 7, 'lanka-express', 'd0e9897fc43536b0e673c791c20ed5f57324e06019cabe70bc71b1d3bedca25b', '[\"*\"]', '2024-09-23 14:58:31', NULL, '2024-09-23 14:55:57', '2024-09-23 14:58:31'),
(441, 'App\\Models\\User', 1, 'lanka-express', 'b10bd0f107067dd37004fc6ee839642430200e778437984c6eb6d4a35e1a44e2', '[\"*\"]', NULL, NULL, '2024-09-23 15:00:23', '2024-09-23 15:00:23'),
(442, 'App\\Models\\User', 1, 'mk-network', '25aeee95a3c8e38b463fdf95de2c6e728ec1d6a766b85c2a7d72d73c26be02e5', '[\"*\"]', NULL, NULL, '2024-09-24 13:51:50', '2024-09-24 13:51:50'),
(443, 'App\\Models\\User', 7, 'lanka-express', 'f14d18836ff132616722389c82c6f3428753856a559939d9c9decfb52e578de7', '[\"*\"]', '2024-09-25 07:52:27', NULL, '2024-09-24 13:52:53', '2024-09-25 07:52:27'),
(444, 'App\\Models\\User', 1, 'mk-network', '94b55fe04e69450710ce5302c6c95d6b615f1fc791f5808423e0f9cb6fe20f93', '[\"*\"]', '2024-09-25 07:50:47', NULL, '2024-09-25 07:50:46', '2024-09-25 07:50:47'),
(445, 'App\\Models\\User', 8, 'mk-network', '67b48628b64c406207833ba2276e231f4623dd5255a0526577c77104b49a297b', '[\"*\"]', '2024-09-25 15:40:25', NULL, '2024-09-25 07:53:41', '2024-09-25 15:40:25'),
(446, 'App\\Models\\User', 7, 'lanka-express', '0fd9636cfb8524e2c1acb274d03d2216a74785596262640d7d662e46465c674b', '[\"*\"]', '2024-09-25 07:53:49', NULL, '2024-09-25 07:53:46', '2024-09-25 07:53:49'),
(447, 'App\\Models\\User', 7, 'lanka-express', 'efcf5b85e0bf7138ab0f3320486e2b847d12ab1373187a5e1d1e3a6156c4bbe3', '[\"*\"]', '2024-09-25 12:21:19', NULL, '2024-09-25 07:55:48', '2024-09-25 12:21:19'),
(448, 'App\\Models\\User', 7, 'mk-network', '6cd5b6635d970d888f684f6dd6c6dcc0622fdfd3f76adef14688e257a805df75', '[\"*\"]', '2024-09-25 07:56:35', NULL, '2024-09-25 07:56:01', '2024-09-25 07:56:35'),
(449, 'App\\Models\\User', 9, 'mk-network', '82a412cb7b027f5873e3ad655f245691c10fa34ec0d45809356d0eb0cbb405ed', '[\"*\"]', '2024-09-25 09:19:31', NULL, '2024-09-25 08:45:52', '2024-09-25 09:19:31'),
(450, 'App\\Models\\User', 5, 'mk-network', 'ac4481978cfe307aafe0ef6ecfaf5814eeba971604ef7dd01ab978ead260e227', '[\"*\"]', '2024-09-26 11:51:18', NULL, '2024-09-25 10:59:02', '2024-09-26 11:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `benefits` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`benefits`)),
  `bg_color` varchar(255) NOT NULL,
  `text_color` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `price`, `benefits`, `bg_color`, `text_color`, `color`, `created_at`, `updated_at`) VALUES
(1, 'GOLD', '449', '[\"25% Off: Enjoy a generous 25% discount on up to 20 air packs for air cargo (100 Kgs) , valid for an entire year!\",\"Luxury High Tea: Indulge in a 5-star high tea experience on us.\",\"12 meals from Pizza Hut \\/ KFC \\/ Nearest prefered restaurants\",\"Receive a complimentary School Package, Kids Package, Elderly Care Package, or Lover Package with your first transaction as part of our loyalty rewards.\"]', 'EFD972', '#FFFFFF', '#FFFFFF', '2024-09-11 06:35:15', '2024-09-11 06:35:15'),
(2, 'SILVER', '349', '[\"15% Off: Get a 15% discount on up to 15 air cargo packs (75 Kgs) valid for an entire year!\",\"8 meals from Pizza Hut \\/ KFC \\/ Nearest prefered restaurants\"]', 'F3F3F3', '#FFFFFF', '#FFFFFF', '2024-09-11 06:40:02', '2024-09-11 06:40:02'),
(3, 'BRONZE', '249', '[\"10% Discount: Receive a 10% discount on up to 12 air cargo packs. (60 Kgs),valid for an entire year!\",\"6 meals om Pizza Hut \\/ KFC \\/ Nearest prefered restaurants.\"]', 'F0D1BC', '#FFFFFF', '#FFFFFF', '2024-09-11 06:42:47', '2024-09-11 06:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `plan_transactions`
--

CREATE TABLE `plan_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `buy_date` varchar(255) NOT NULL,
  `expiry_date` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `count` varchar(255) NOT NULL,
  `meals` varchar(255) NOT NULL,
  `tea` varchar(255) NOT NULL,
  `package` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_transactions`
--

INSERT INTO `plan_transactions` (`id`, `user_id`, `plan_id`, `buy_date`, `expiry_date`, `amount`, `weight`, `count`, `meals`, `tea`, `package`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2024-09-23', '2025-09-23', '449', '100', '19', '12', '1', '1', '2024-09-23 06:14:44', '2024-09-23 12:19:05'),
(2, 5, 1, '2024-09-23', '2025-09-23', '449', '100', '19', '12', '1', '1', '2024-09-23 07:04:50', '2024-09-23 10:25:31'),
(3, 5, 2, '2024-09-23', '2025-09-23', '349', '75', '15', '8', '0', '0', '2024-09-23 08:31:56', '2024-09-23 08:31:56'),
(4, 7, 1, '2024-09-23', '2025-09-23', '449', '100', '19', '10', '0', '1', '2024-09-23 14:41:35', '2024-09-23 14:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('text','image','video','shorts') DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `shorts_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `type`, `caption`, `images`, `video_link`, `shorts_link`, `created_at`, `updated_at`) VALUES
(3, 'shorts', 'Logistics shorts', '\"[]\"', NULL, 'https://youtube.com/shorts/xnNHNa56f3c?si=cQsGszjh32ssX04i', '2024-07-22 08:11:28', '2024-07-22 08:11:28'),
(17, 'image', 'Hello', '\"[\\\"1724315291_66c6f69bafd50.jpg\\\"]\"', NULL, NULL, '2024-08-22 08:28:11', '2024-08-22 12:00:14'),
(20, 'video', 'Saple caption', '\"[]\"', 'https://youtu.be/f0BtHWMMkhg?si=xKgkjJnIvaTeVgxV', NULL, '2024-08-22 12:32:48', '2024-08-22 12:32:48'),
(21, 'image', 'Sampe', '\"[\\\"1724330033_66c73031d4305.png\\\"]\"', NULL, NULL, '2024-08-22 12:33:53', '2024-08-22 12:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `track_id` varchar(255) DEFAULT NULL,
  `service_type` enum('AIR FREIGHT','SEA FREIGHT','ROAD TRANSPORT','3PL SERVICES') NOT NULL,
  `container_transportation` tinyint(1) NOT NULL DEFAULT 0,
  `parcel_deliveries` tinyint(1) NOT NULL DEFAULT 0,
  `additional_services` enum('UPB OPERATION','CUSTOM CLEARANCE','BONDED TRUCKS','BONDED WAREHOUSING','INTERNATIONAL WAREHOUSING') DEFAULT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_phone` varchar(255) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `sender_id` varchar(255) NOT NULL,
  `sender_image` varchar(255) NOT NULL,
  `sender_pickup_address` varchar(255) NOT NULL,
  `sender_street_address` varchar(255) DEFAULT NULL,
  `sender_pin_code` int(11) DEFAULT NULL,
  `sender_city` varchar(255) NOT NULL,
  `sender_state` varchar(255) NOT NULL,
  `sender_country` varchar(255) NOT NULL,
  `receiver_delivery_address` varchar(255) NOT NULL,
  `receiver_street_address` varchar(255) NOT NULL,
  `receiver_city` varchar(255) NOT NULL,
  `receiver_state` varchar(255) NOT NULL,
  `receiver_pin_code` int(11) DEFAULT NULL,
  `receiver_country` varchar(255) NOT NULL,
  `number_of_parcels` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `length` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `width` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `item_value` varchar(255) NOT NULL,
  `insurance_level` enum('Level 1 - LKR 25,000','Level 2 - LKR 50,000','Level 3 - LKR 75,000','Level 4 - LKR 100,000','Level 5 - Specific Insurance Cover') NOT NULL,
  `status` enum('Pending','Processing','Placed','Transit','Delivered','Cancelled1','Cancelled2') NOT NULL DEFAULT 'Pending',
  `is_assigned` tinyint(1) DEFAULT 0,
  `drop_of_points` varchar(255) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `pickup_date` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT '0',
  `paid` varchar(255) DEFAULT NULL,
  `due` varchar(255) DEFAULT '0',
  `remark` longtext DEFAULT NULL,
  `loyality_points` int(11) DEFAULT 0,
  `shipping_date` date DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `user_id`, `track_id`, `service_type`, `container_transportation`, `parcel_deliveries`, `additional_services`, `sender_name`, `sender_phone`, `sender_email`, `sender_id`, `sender_image`, `sender_pickup_address`, `sender_street_address`, `sender_pin_code`, `sender_city`, `sender_state`, `sender_country`, `receiver_delivery_address`, `receiver_street_address`, `receiver_city`, `receiver_state`, `receiver_pin_code`, `receiver_country`, `number_of_parcels`, `weight`, `length`, `height`, `width`, `content`, `item_value`, `insurance_level`, `status`, `is_assigned`, `drop_of_points`, `payment`, `pickup_date`, `total`, `paid`, `due`, `remark`, `loyality_points`, `shipping_date`, `session_id`, `created_at`, `updated_at`) VALUES
(1, 4, 'MBA-0001', 'AIR FREIGHT', 0, 0, NULL, 'sumedhvyas4', '+919982414226', 'sumedhvyas3@gmail.com', '123567890', '1727071751.jpg', 'Inspaze coworks', 'LIG', NULL, 'Indore', 'Madhya Pradesh', 'India', 'NRK business park', 'vijaynagar', 'Indore', 'Madhya Pradesh', NULL, 'India', '1', '10', '50', '30', '40', 'Diamonds', '1 Cr', 'Level 4 - LKR 100,000', 'Delivered', 1, '1', NULL, NULL, '100', '75', '0', 'Pay the amount to start processing the parcels .', 5, NULL, 'cs_test_a1teKgLZDi9EvQntuPOVhXvpT1WBwc5KEbduXb6RjyJD8hxb83WdFTooFf', '2024-09-23 06:09:11', '2024-09-23 07:52:23'),
(2, 6, 'MBA-0002', 'AIR FREIGHT', 0, 0, NULL, 'test', '+919009930165', 'kratikanenwani@gmail.com', '142', '1727077640.jpg', 'test', 'test', NULL, 'test', 'test', 'test', 'test', 'test', 'tsst', 'test', NULL, 'test', '1', '10', '1', '1', '1', 'dd', '100', 'Level 2 - LKR 50,000', 'Cancelled1', 1, '1', NULL, NULL, '120', '0', '120', 'hshshsh sjsjs', 5, NULL, 'cs_test_a1qR0hYaN0N8AOv4x8mQ4DphnQrWfPgfnHVmPvDWESINKwU0Tht4cjYJpw', '2024-09-23 07:47:20', '2024-09-23 09:52:32'),
(3, 7, 'MBW-0001', '3PL SERVICES', 0, 0, 'BONDED WAREHOUSING', 'Aayush Patidar', '+916268269385', 'aayush_b190458ee@nitc.ac.in', '1234567890', '1727080148.jpg', '2nd floor, Inspaze coworks', 'LIG', NULL, 'Indore', 'Madhya Pradesh', 'India', 'NRK Business Park', 'vijaynagar', 'Indore', 'Madhya Pradesh', NULL, 'India', '1', '10', '60', '20', '40', 'Gold', '1 Cr', 'Level 4 - LKR 100,000', 'Processing', 1, '1', NULL, NULL, '450', '337.5', '0', 'hshs', 20, NULL, 'cs_test_a15fOIz4lZc1sTd7fBvmWxv9GCCRNf5qB23gdBR1F4L7wz6OrUVTIrJdIy', '2024-09-23 08:29:08', '2024-09-23 14:48:04'),
(4, 5, 'MBS-0001', 'SEA FREIGHT', 0, 0, NULL, 'test', '+917894561230', 'shivampatel0700@gmail.com', 'Passport', '1727085308.jpg', 'test', 'twdt', NULL, 'test', 'tetsg', 'test', 'test', 'test', 'test', 'teet', NULL, 'test', '5', '14', '15', '14', '14', 'test', '4500', 'Level 2 - LKR 50,000', 'Transit', 1, '1', NULL, NULL, '210', '157.5', '0', 'shs', 10, '2024-09-25', 'cs_test_a1ZjYJMiAVoUD3Jt7oqyep19baGIU9EhohRIVYX7gS5lVwiuD8hNWoawMM', '2024-09-23 09:55:08', '2024-09-23 15:17:01'),
(5, 5, 'MBA-0003', 'AIR FREIGHT', 0, 0, NULL, 'test', '+917894561230', 'shivampatel0700@gmail.com', 'Passport', '1727085405.jpg', 'test', 'twdt', NULL, 'test', 'tetsg', 'test', 'test', 'test', 'test', 'teet', NULL, 'test', '5', '14', '15', '14', '14', 'test', '4500', 'Level 3 - LKR 75,000', 'Cancelled1', 1, '1', NULL, NULL, '1280', NULL, '1280', 'fg', 60, NULL, NULL, '2024-09-23 09:56:45', '2024-09-23 11:03:04'),
(6, 5, 'MBW-0002', '3PL SERVICES', 0, 0, 'UPB OPERATION', 'test', '+917894561230', 'shivampatel0700@gmail.com', 'Passport', '1727085449.jpg', 'test', 'twdt', NULL, 'test', 'tetsg', 'test', 'test', 'test', 'test', 'teet', NULL, 'test', '5', '14', '15', '14', '14', 'test', '4500', 'Level 2 - LKR 50,000', 'Pending', 1, '1', NULL, NULL, '0', NULL, '0', NULL, 0, NULL, NULL, '2024-09-23 09:57:29', '2024-09-23 11:01:20'),
(7, 5, 'MBA-0004', 'AIR FREIGHT', 0, 0, NULL, 'test', '+917894561230', 'shivampatel0700@gmail.com', 'Passport', '1727085479.jpg', 'test', 'twdt', NULL, 'test', 'tetsg', 'test', 'test', 'test', 'test', 'teet', NULL, 'test', '5', '14', '15', '14', '14', 'test', '4500', 'Level 2 - LKR 50,000', 'Pending', 1, '1', NULL, NULL, '0', NULL, '0', NULL, 0, NULL, NULL, '2024-09-23 09:57:59', '2024-09-23 11:02:07'),
(8, 7, 'MBS-0002', 'SEA FREIGHT', 0, 0, NULL, 'Aayush Patidar', '+919982414226', 'aayush_b190458ee@nitc.ac.in', '1234567890', '1727101080.jpg', '2nd floor, Inspaze coworks', 'LIG Square', NULL, 'Indore', 'Madhya Pradesh', 'India', 'Nrk Business Park', 'Vijaynagar', 'Indore', 'Madhya Pradesh', NULL, 'India', '1', '10', '60', '20', '40', 'gold', '10000', 'Level 4 - LKR 100,000', 'Delivered', 1, '1', NULL, NULL, '100', '100', '0', 'pay before proceeding', 5, NULL, 'cs_test_a1SZZbxjzASuwfJPKe23vlT95TZtNYkCrSygGcGjqKjkD4TfZBZXtQHfCE', '2024-09-23 14:18:00', '2024-09-23 14:38:22'),
(9, 7, 'MBA-0005', 'AIR FREIGHT', 0, 0, NULL, 'Aayush Patidar', '+919982414226', 'aayush_b190458ee@nitc.ac.in', '1887262637', '1727186074.jpg', 'Hain', 'Jain', NULL, 'ohh', 'Jain', 'bhai', 'jail', 'idk', 'idk', 'jhum', NULL, 'Jain', '1', '10', '40', '10', '30', 'nhi', 'jao', 'Level 4 - LKR 100,000', 'Pending', 0, NULL, NULL, NULL, '0', NULL, '0', NULL, 0, NULL, NULL, '2024-09-24 13:54:34', '2024-09-24 13:54:34'),
(10, 9, 'MBA-0006', 'AIR FREIGHT', 0, 0, NULL, 'dcfffff', '+3933883867936', 'exposrilanka.thilina@gmail.com', 'hsjsjkejdod', '1727254835.jpg', 'uebsndkd', 'nmskdkd', NULL, 'cityn dmd', 'jekekekeks', 'itlay', 'heuekekd', 'uejejejkx', 'kdkdkkd', '7ndjdmd', NULL, 'italy', '445', '344', '345', '344', '344', 'dfc', 'wdx', 'Level 1 - LKR 25,000', 'Pending', 0, NULL, NULL, NULL, '0', NULL, '0', NULL, 0, NULL, NULL, '2024-09-25 09:00:35', '2024-09-25 09:00:35'),
(11, 7, 'MBA-0007', 'AIR FREIGHT', 0, 0, NULL, 'Aayush Patidar', '+919982414226', 'aayushpatidar04@gmail.com', '1234567890', '1727266824.jpg', 'hey', 'Jain', NULL, 'Jain', 'Jain', 'hello', 'NFL', 'Jain', 'Jain', 'jee', NULL, 'hehe', '1', '4', '20', '10', '10', 'platinum', '48', 'Level 4 - LKR 100,000', 'Pending', 0, NULL, NULL, NULL, '0', NULL, '0', NULL, 0, NULL, NULL, '2024-09-25 12:20:24', '2024-09-25 12:20:24'),
(12, 7, 'MBA-0008', 'AIR FREIGHT', 0, 0, NULL, 'Aayush Patidar', '+919982414226', 'aayushpatidar04@gmail.com', '1234567890', '1727266870.jpg', 'hey', 'Jain', NULL, 'Jain', 'Jain', 'hello', 'NFL', 'Jain', 'Jain', 'jee', NULL, 'hehe', '1', '4', '20', '10', '10', 'platinum', '48', 'Level 4 - LKR 100,000', 'Pending', 0, NULL, NULL, NULL, '0', NULL, '0', NULL, 0, NULL, NULL, '2024-09-25 12:21:10', '2024-09-25 12:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `quantity` varchar(245) DEFAULT NULL,
  `status` enum('approved','unapproved') NOT NULL DEFAULT 'unapproved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thoughts`
--

CREATE TABLE `thoughts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quote` longtext DEFAULT NULL,
  `thought` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thoughts`
--

INSERT INTO `thoughts` (`id`, `quote`, `thought`, `created_at`, `updated_at`) VALUES
(1, 'Hello everyone! Radhe Radhe!', 'Jai Shree Krishna!', '2024-08-22 08:15:07', '2024-08-22 08:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `role` enum('user','admin','call agent','operation') NOT NULL DEFAULT 'user',
  `loyality_points` int(11) NOT NULL DEFAULT 0,
  `membership` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `device_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `country`, `address`, `dob`, `gender`, `role`, `loyality_points`, `membership`, `email_verified_at`, `password`, `token`, `session_id`, `device_token`, `created_at`, `updated_at`) VALUES
(1, 'Aayush Patidar', 'aayushpatidar04@gmail.com', '9982414226', 'India', NULL, '2000-05-04', 'Male', 'admin', 0, NULL, NULL, '$2y$10$w6fQX0PErL0FoJLxv6yPqul4JMUAA6t2BJGAPow9MfzYYUcYVWTfe', '444|UsXWZFWFK7UWxAOXArskjrDgdUAHD4XdslKufKDE080b4249', NULL, 'cXPFHLB4SxiHmFhuBgecdM:APA91bH8nOMdM_uhoKa525fAESE5FnjmxMx5l-_Yn4haLaZ3gUOQLkDMsUsM2Oea0phjeYt5BwC1HEr5jQABOkQ26RjiPRJ3jTchuozfRu8cwb7DydbJHs8U82GfMXLqIQTDKFh_ZBjh', '2024-09-23 05:58:15', '2024-09-25 07:50:47'),
(2, 'Gaurav Joshi', 'gaurav192003joshi@gmail.com', '9302157313', 'India', NULL, '2003-06-19', 'Male', 'operation', 0, NULL, NULL, '$2y$10$jqKsTRFhj0RJfLdL1uE./.P/sRwPmgXIC8J4THM5eFZ0Cx5HJl3su', '433|90ogC75jX4XNNlPWB1CBlafXuaeeh5BlE32THhDH83b49a14', NULL, 'dra8Dvn2Sq2bWQWxAAVoS6:APA91bGqfpVfL66K7Ot2mwvi4jhvy9JWes3XGUymHo_bHACdgkChQe3AnDCGV6GKOs0O3svHv_rl_EzMMT_DMSsew4wAvWkPo2AzB-5pf6aTad9mf-eL_mji7iJydsYvwwnSQ8Ui38L-', '2024-09-23 06:01:57', '2024-09-23 14:36:44'),
(3, 'sapna yadav', 'sy.sy917422@gmail.com', '9174228422', 'India', NULL, '2002-07-06', 'Female', 'call agent', 0, NULL, NULL, '$2y$10$hDDMGqKRCx9Heg6.Kp3Ra.MdO7mUW.lvuxUAVue4NcMhM1UwxcqLq', '431|jnyPpR5IsWvUPmJRqplcInnIwGZAmQefkALnOsKIad5d80c1', NULL, 'dmvMlctTR726i9s73cTsJZ:APA91bG6eNPPkwikpKQNBbkkwZbHcc7gA7UHeZ-5Ms58tbPSq1RQ2nH9xLwXqEJmot_PX5-6ttD5O7TBMPbsvwWxwRIg2zmuhlTtxQTpJyendhbSI-jwOaqNKH9xTg9sSThumiIpc0l2', '2024-09-23 06:03:30', '2024-09-25 10:21:57'),
(4, 'sumedh', 'sumedhvyas3@gmail.com', '9009811128', 'india', NULL, '2002-12-28', 'Male', 'user', 5, '1', NULL, '$2y$10$Bie19mYbsUWjfgC1nK14BO7qpNjr/5c1n5oZzMfxtM.zwJjzd7v/.', '425|7V0cYcN5frgCrbViVetSjokGmsPel9rjzwcpUL6j21d0cd0d', 'cs_test_a1l5nggIGcNd3x3y3K60msrMw5hJxKo08bQ92pAHCFFSAJiEAhjG9RBkVx', 'dYU8hLAsQxSxC7i_8oZonE:APA91bHVLRKEulTdgH4i0tkhYlYHMlZSy9ql8aa-rXwmrdyPvTlAhtKlocXzOVORWWEJ9enVkkblCDOAVZGO-3qExy4W7MN3zDLoMcQvAIil8pJ0he-o7T5yYwSzBgvhlpIZKwnBayR-', '2024-09-23 06:04:09', '2024-09-23 12:26:44'),
(5, 'Shiv Patel', 'shivampatel0700@gmail.com', '7879908886', 'India', NULL, '2003-07-18', 'Male', 'user', 70, '2', NULL, '$2y$10$ZYfuExxe.4XowLOpPzgf6.PcrAXWF3g8AAMj038/JQQR.JOjUVZLy', '450|MeJpykwBKTaJ9c3ViMlGoOwp2teniSVT8UXwndiuef5af699', 'cs_test_a1B4HXHuwhuaQLNm2Z6OMxDbCHRVhASiBMooEeyBAdC4lWRMxmkr95gKru', 'f3es9A8JS9SuCN7HNKYyvC:APA91bHHh8gq9eCzBg8HatA2gij_hRoPWsA1eTsY7JjNNzqWQLL6QF9xfFZf9onz_p8WQciDfk-pTtjr-mZRarH77NF6FhiBAeZxnq8Xvw8xX5nq4iDaAROigE61_i1tLVtCyZlDuK-R', '2024-09-23 06:25:19', '2024-09-25 10:59:02'),
(6, 'kratika', 'kratikanenwani@gmail.com', '9009930165', 'india', NULL, '2024-09-02', 'Female', 'user', 5, NULL, NULL, '$2y$10$Cu1dzSWtbwMk7cIBU3mlLu.20W2uULPhpeJ1tHsohG6HxzKy97OW6', '402|sO0kd8eFtgQBB1gJHf67oSj3PEQl7K9769UjHPJBc8adb73f', NULL, 'f3es9A8JS9SuCN7HNKYyvC:APA91bHHh8gq9eCzBg8HatA2gij_hRoPWsA1eTsY7JjNNzqWQLL6QF9xfFZf9onz_p8WQciDfk-pTtjr-mZRarH77NF6FhiBAeZxnq8Xvw8xX5nq4iDaAROigE61_i1tLVtCyZlDuK-R', '2024-09-23 07:45:47', '2024-09-23 09:58:55'),
(7, 'Aayush Patidar', 'aayush_b190458ee@nitc.ac.in', '6268269385', 'India', NULL, '2003-05-04', 'Male', 'user', 25, '1', NULL, '$2y$10$5rBvfVX4rSYR2s1NgwTV4uOWz1m.quc.4N1M9qOscImyaktnSHfQe', '448|APMgSzfdN8K94e8vZcXQxhcdkPRWpyksD4NFOrEP9e20e7d5', 'cs_test_a1dKu3ItSoSMs7iRPav7N7DiX9JrXNhWKxuKve0Pp0UzJdVaYQygJ6EoUs', 'e7qk6Pj0SB2b40nj6C5GsZ:APA91bH0K5g77OfFwdODdQ1zmD025T_v-CM-h-otQtCtqdIImn-5emYcjTKj5b8auTOtmD3bj7oPMTwMIp7pI1iZfbgIhcMqOGGE9chTeWorqTJPyI58_fO_i2Lqg71sQBMoI51l2u4d', '2024-09-23 08:21:46', '2024-09-25 12:18:52'),
(8, 'aj', 'aj@gmail.com', '9827523017', 'india', NULL, '2024-09-25', 'Male', 'user', 0, NULL, NULL, '$2y$10$XtoFHMS0vU.2vqg3sMUBKecDCmLRzUsdGx0yQcA2U7dNrD3Uw4AG2', '445|NKGeNJAXEwceBUUWMlmiXVyoYP2tqyM6CH5m7kIQ6fcf7b33', NULL, 'cXPFHLB4SxiHmFhuBgecdM:APA91bH8nOMdM_uhoKa525fAESE5FnjmxMx5l-_Yn4haLaZ3gUOQLkDMsUsM2Oea0phjeYt5BwC1HEr5jQABOkQ26RjiPRJ3jTchuozfRu8cwb7DydbJHs8U82GfMXLqIQTDKFh_ZBjh', '2024-09-25 07:53:41', '2024-09-25 07:53:42'),
(9, 'Thilina', 'exposrilanka. thilina@gmail.com', '3388367936', 'italy', NULL, '1994-03-26', 'Male', 'admin', 0, NULL, NULL, '$2y$10$llJApcZikWeEJILN5BgEguYZXefQ4H.7cxV4sg.Lg1T4N7N6oSiPa', '449|A6bU6IAB6XnTrmJbVbgvPjoI6gdiZX2PVFP4fx2K845335e1', NULL, 'dTVi6KeRSgaJMn5oK5p9t8:APA91bGJZPa0FTf5RuToJQU6d6tScI-gran2V6EzpgFDiOvloUqba4ncyVslP9NXS_ab1PP3i8NhFv_wGPkdvzrRMUr-f36OsJ4jyt284YJAKoPpnnmKlddkox_eSBxvBQCuS7a5QIT8', '2024-09-25 08:45:52', '2024-09-25 08:45:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkpoints`
--
ALTER TABLE `checkpoints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drop_of_points`
--
ALTER TABLE `drop_of_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_requests`
--
ALTER TABLE `offer_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_transaction_id_unique` (`transaction_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_transactions`
--
ALTER TABLE `plan_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotes_user_id_foreign` (`user_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_user_id_foreign` (`user_id`),
  ADD KEY `requests_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `thoughts`
--
ALTER TABLE `thoughts`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `checkpoints`
--
ALTER TABLE `checkpoints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drop_of_points`
--
ALTER TABLE `drop_of_points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `offer_requests`
--
ALTER TABLE `offer_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=451;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plan_transactions`
--
ALTER TABLE `plan_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `thoughts`
--
ALTER TABLE `thoughts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quotes`
--
ALTER TABLE `quotes`
  ADD CONSTRAINT `quotes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plan_transactions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
