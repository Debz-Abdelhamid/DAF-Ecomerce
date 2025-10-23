-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2025 at 03:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electrooo`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `logo`, `name`, `slug`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Brands/JC5dBY3vmb6QFFhywuHiGywpNAfk8cu6BHJz6w1Z.png', 'Sammsung', 'sammsung', 1, 1, '2024-10-23 21:13:00', '2024-10-25 11:34:25'),
(2, 'Brands/fIjVywGbh2f0f3KEtgp1iZFPSQdly9ltgJLy5lLO.png', 'condor', 'condor', 1, 1, '2024-10-23 21:17:35', '2025-09-16 10:54:34'),
(4, 'Brands/4hvJBnG7Opz2FKwHsy7HLe7siVZ8UAVPcGbg3PVZ.png', 'LG', 'lg', 1, 1, '2024-10-25 11:00:17', '2024-10-25 11:16:07'),
(6, 'Brands/XXb0zNybaM1CD5SkurCZL9LWDZtdoJRkc6n5GdVd.png', 'Starlight', 'starlight', 1, 1, '2024-10-25 11:05:05', '2024-10-25 11:05:05');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('anissannabi2@gmail.com|127.0.0.1', 'i:4;', 1758024212),
('anissannabi2@gmail.com|127.0.0.1:timer', 'i:1758024212;', 1758024212),
('sliders', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:5:{i:0;O:17:\"App\\Models\\Slider\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:7:\"sliders\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:10:{s:2:\"id\";i:1;s:6:\"banner\";s:52:\"sliders/vcTpODkNc77AHKW5LY71RklIONihQ2dGWmmqHnZI.jpg\";s:4:\"type\";s:9:\"chauffage\";s:5:\"title\";s:20:\"chauffage electrique\";s:14:\"starting_price\";s:4:\"3000\";s:7:\"btn_url\";s:21:\"http://127.0.0.1:8000\";s:6:\"serial\";i:1;s:6:\"status\";i:1;s:10:\"created_at\";s:19:\"2024-10-23 22:03:52\";s:10:\"updated_at\";s:19:\"2024-10-23 22:03:52\";}s:11:\"\0*\0original\";a:10:{s:2:\"id\";i:1;s:6:\"banner\";s:52:\"sliders/vcTpODkNc77AHKW5LY71RklIONihQ2dGWmmqHnZI.jpg\";s:4:\"type\";s:9:\"chauffage\";s:5:\"title\";s:20:\"chauffage electrique\";s:14:\"starting_price\";s:4:\"3000\";s:7:\"btn_url\";s:21:\"http://127.0.0.1:8000\";s:6:\"serial\";i:1;s:6:\"status\";i:1;s:10:\"created_at\";s:19:\"2024-10-23 22:03:52\";s:10:\"updated_at\";s:19:\"2024-10-23 22:03:52\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:7:{i:0;s:6:\"banner\";i:1;s:4:\"type\";i:2;s:5:\"title\";i:3;s:14:\"starting_price\";i:4;s:7:\"btn_url\";i:5;s:6:\"serial\";i:6;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:17:\"App\\Models\\Slider\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:7:\"sliders\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:10:{s:2:\"id\";i:2;s:6:\"banner\";s:52:\"sliders/rLVjcMJr5AQP5pwsKEGJwOLGiIF45qahoftiE79s.jpg\";s:4:\"type\";s:15:\"machine a laver\";s:5:\"title\";s:15:\"machine a laver\";s:14:\"starting_price\";s:4:\"5000\";s:7:\"btn_url\";s:21:\"http://127.0.0.1:8000\";s:6:\"serial\";i:2;s:6:\"status\";i:1;s:10:\"created_at\";s:19:\"2024-10-23 22:05:22\";s:10:\"updated_at\";s:19:\"2024-10-23 22:05:22\";}s:11:\"\0*\0original\";a:10:{s:2:\"id\";i:2;s:6:\"banner\";s:52:\"sliders/rLVjcMJr5AQP5pwsKEGJwOLGiIF45qahoftiE79s.jpg\";s:4:\"type\";s:15:\"machine a laver\";s:5:\"title\";s:15:\"machine a laver\";s:14:\"starting_price\";s:4:\"5000\";s:7:\"btn_url\";s:21:\"http://127.0.0.1:8000\";s:6:\"serial\";i:2;s:6:\"status\";i:1;s:10:\"created_at\";s:19:\"2024-10-23 22:05:22\";s:10:\"updated_at\";s:19:\"2024-10-23 22:05:22\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:7:{i:0;s:6:\"banner\";i:1;s:4:\"type\";i:2;s:5:\"title\";i:3;s:14:\"starting_price\";i:4;s:7:\"btn_url\";i:5;s:6:\"serial\";i:6;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:17:\"App\\Models\\Slider\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:7:\"sliders\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:10:{s:2:\"id\";i:3;s:6:\"banner\";s:52:\"sliders/FffsnIpObUm7cnsDFxl3lp3VvK6LmwdYgGu8vozC.jpg\";s:4:\"type\";s:11:\"Climatiseur\";s:5:\"title\";s:29:\"Climatiseur Trés bon caliter\";s:14:\"starting_price\";s:4:\"5000\";s:7:\"btn_url\";s:21:\"http://127.0.0.1:8000\";s:6:\"serial\";i:3;s:6:\"status\";i:1;s:10:\"created_at\";s:19:\"2024-10-23 22:07:12\";s:10:\"updated_at\";s:19:\"2024-12-22 15:06:50\";}s:11:\"\0*\0original\";a:10:{s:2:\"id\";i:3;s:6:\"banner\";s:52:\"sliders/FffsnIpObUm7cnsDFxl3lp3VvK6LmwdYgGu8vozC.jpg\";s:4:\"type\";s:11:\"Climatiseur\";s:5:\"title\";s:29:\"Climatiseur Trés bon caliter\";s:14:\"starting_price\";s:4:\"5000\";s:7:\"btn_url\";s:21:\"http://127.0.0.1:8000\";s:6:\"serial\";i:3;s:6:\"status\";i:1;s:10:\"created_at\";s:19:\"2024-10-23 22:07:12\";s:10:\"updated_at\";s:19:\"2024-12-22 15:06:50\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:7:{i:0;s:6:\"banner\";i:1;s:4:\"type\";i:2;s:5:\"title\";i:3;s:14:\"starting_price\";i:4;s:7:\"btn_url\";i:5;s:6:\"serial\";i:6;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:17:\"App\\Models\\Slider\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:7:\"sliders\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:10:{s:2:\"id\";i:4;s:6:\"banner\";s:52:\"sliders/dfggVkhIcCj9wskG3m3m2GYR20AaeHBQ0xtAd5ZX.jpg\";s:4:\"type\";s:12:\"Télévision\";s:5:\"title\";s:2:\"TV\";s:14:\"starting_price\";s:5:\"43000\";s:7:\"btn_url\";s:21:\"http://127.0.0.1:8000\";s:6:\"serial\";i:4;s:6:\"status\";i:1;s:10:\"created_at\";s:19:\"2024-10-23 22:09:18\";s:10:\"updated_at\";s:19:\"2024-10-23 22:09:18\";}s:11:\"\0*\0original\";a:10:{s:2:\"id\";i:4;s:6:\"banner\";s:52:\"sliders/dfggVkhIcCj9wskG3m3m2GYR20AaeHBQ0xtAd5ZX.jpg\";s:4:\"type\";s:12:\"Télévision\";s:5:\"title\";s:2:\"TV\";s:14:\"starting_price\";s:5:\"43000\";s:7:\"btn_url\";s:21:\"http://127.0.0.1:8000\";s:6:\"serial\";i:4;s:6:\"status\";i:1;s:10:\"created_at\";s:19:\"2024-10-23 22:09:18\";s:10:\"updated_at\";s:19:\"2024-10-23 22:09:18\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:7:{i:0;s:6:\"banner\";i:1;s:4:\"type\";i:2;s:5:\"title\";i:3;s:14:\"starting_price\";i:4;s:7:\"btn_url\";i:5;s:6:\"serial\";i:6;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:4;O:17:\"App\\Models\\Slider\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:7:\"sliders\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:10:{s:2:\"id\";i:5;s:6:\"banner\";s:52:\"sliders/0rUkvJpX9geej9qejFdYLWVvI9f6kJHZbfXpOqgl.jpg\";s:4:\"type\";s:11:\"Frégidaire\";s:5:\"title\";s:24:\"Frégidaire haut calité\";s:14:\"starting_price\";s:5:\"23000\";s:7:\"btn_url\";s:21:\"http://127.0.0.1:8000\";s:6:\"serial\";i:5;s:6:\"status\";i:1;s:10:\"created_at\";s:19:\"2024-10-23 22:10:48\";s:10:\"updated_at\";s:19:\"2024-12-22 15:04:13\";}s:11:\"\0*\0original\";a:10:{s:2:\"id\";i:5;s:6:\"banner\";s:52:\"sliders/0rUkvJpX9geej9qejFdYLWVvI9f6kJHZbfXpOqgl.jpg\";s:4:\"type\";s:11:\"Frégidaire\";s:5:\"title\";s:24:\"Frégidaire haut calité\";s:14:\"starting_price\";s:5:\"23000\";s:7:\"btn_url\";s:21:\"http://127.0.0.1:8000\";s:6:\"serial\";i:5;s:6:\"status\";i:1;s:10:\"created_at\";s:19:\"2024-10-23 22:10:48\";s:10:\"updated_at\";s:19:\"2024-12-22 15:04:13\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:7:{i:0;s:6:\"banner\";i:1;s:4:\"type\";i:2;s:5:\"title\";i:3;s:14:\"starting_price\";i:4;s:7:\"btn_url\";i:5;s:6:\"serial\";i:6;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 2073383284);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Télévision', 'television', 'fas fa-tv', 1, '2024-10-23 21:20:17', '2024-10-25 10:50:29'),
(2, 'Machine à Laver', 'machine-a-laver', 'fas fa-angle-down', 1, '2024-10-25 11:50:39', '2024-10-25 11:51:06'),
(3, 'Radiateur', 'radiateur', 'fab fa-adversal', 1, '2024-10-25 12:10:32', '2024-10-25 12:10:32'),
(4, 'Plaque de cuisson', 'plaque-de-cuisson', 'fab fa-affiliatetheme', 1, '2024-10-25 12:35:51', '2025-09-16 10:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `child_categories`
--

CREATE TABLE `child_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `flash_sells`
--

CREATE TABLE `flash_sells` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flash_sells`
--

INSERT INTO `flash_sells` (`id`, `sale_end_date`, `created_at`, `updated_at`) VALUES
(1, '2025-09-30', '2024-10-23 13:38:07', '2025-09-18 09:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `flash_sell_items`
--

CREATE TABLE `flash_sell_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flash_sell_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `show_at_home` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flash_sell_items`
--

INSERT INTO `flash_sell_items` (`id`, `flash_sell_id`, `product_id`, `show_at_home`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 1, '2024-10-25 12:19:55', '2024-10-25 12:19:55'),
(3, 1, 1, 1, 1, '2024-10-25 12:21:01', '2024-10-25 12:21:01'),
(4, 1, 5, 1, 1, '2025-07-01 13:56:42', '2025-07-01 13:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `layout` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `currency_name` varchar(255) NOT NULL,
  `currency_icon` varchar(255) NOT NULL,
  `time_zone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `site_name`, `layout`, `contact_email`, `contact_phone`, `currency_name`, `currency_icon`, `time_zone`, `created_at`, `updated_at`) VALUES
(1, 'Mouad', 'LTR', 'louarmouad@gmail.com', '0795337574', 'DZD', 'DA', 'UTC', '2024-10-23 15:23:51', '2025-02-25 11:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `home_pages`
--

CREATE TABLE `home_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_pages`
--

INSERT INTO `home_pages` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(5, 'popular_category_section', '[{\"category\":\"2\",\"sub_category\":null,\"child_category\":null},{\"category\":\"3\",\"sub_category\":null,\"child_category\":null},{\"category\":\"1\",\"sub_category\":\"1\",\"child_category\":null},{\"category\":\"4\",\"sub_category\":null,\"child_category\":null},{\"category\":\"4\",\"sub_category\":null,\"child_category\":null}]', '2024-10-25 12:21:47', '2025-09-16 10:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_10_164138_create_sliders_table', 1),
(5, '2024_09_12_003145_create_categories_table', 1),
(6, '2024_09_12_170325_create_subcategories_table', 1),
(7, '2024_09_13_182202_create_child_categories_table', 1),
(8, '2024_09_15_125651_create_brands_table', 1),
(9, '2024_09_16_154928_create_products_table', 1),
(10, '2024_09_17_190706_create_productgalleries_table', 1),
(11, '2024_09_18_181259_create_product_variants_table', 1),
(12, '2024_09_19_011553_create_product_variant_items_table', 1),
(13, '2024_09_24_154622_create_flash_sells_table', 1),
(14, '2024_09_24_154739_create_flash_sell_items_table', 1),
(15, '2024_09_26_234637_create_general_settings_table', 1),
(16, '2024_09_27_102233_create_coupons_table', 1),
(17, '2024_09_27_134632_create_shipping_rules_table', 1),
(18, '2024_09_29_140240_create_adresses_table', 1),
(19, '2024_10_11_215808_create_orders_table', 1),
(20, '2024_10_11_215831_create_order_products_table', 1),
(21, '2024_10_19_120548_create_home_pages_table', 1),
(22, '2024_10_24_201750_add_image_to_users_table', 2),
(24, '2024_12_27_015708_add_dossier_to_orders_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inovice_id` varchar(255) NOT NULL,
  `subtotal` bigint(20) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `total_variants` bigint(20) NOT NULL,
  `user_amount` varchar(255) NOT NULL,
  `duree` int(11) NOT NULL,
  `total_facility` varchar(255) NOT NULL,
  `currency_name` varchar(255) NOT NULL,
  `currency_icon` varchar(255) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `order_address` text NOT NULL,
  `dossier` varchar(255) NOT NULL,
  `order_status` enum('pending','deliverd','destribution','canceled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `inovice_id`, `subtotal`, `amount`, `total_variants`, `user_amount`, `duree`, `total_facility`, `currency_name`, `currency_icon`, `product_qty`, `order_address`, `dossier`, `order_status`, `created_at`, `updated_at`) VALUES
(8, '434693', 1757796, 1757796, 0, '78000', 48, '4646', 'DZD', 'DA', 1, '{\"name\":\"Abdelhamid\",\"email\":\"anissannabi2@gmail.com\",\"phone\":\"0541515861\",\"country\":\"Algeria\",\"state\":\"Annaba\",\"city\":\"Annaba\",\"zip\":\"23000\",\"address\":\"Annaba\"}', 'fonctionnaire', 'destribution', '2024-12-27 01:09:43', '2025-09-16 11:07:49'),
(9, '974275', 878898, 878898, 0, '66000', 12, '222', 'DZD', 'DA', 1, '{\"name\":\"Abdelhamid\",\"email\":\"laouarmouad@gmail.com\",\"phone\":\"0541515861\",\"country\":\"Algeria\",\"state\":\"Annaba\",\"city\":\"Annaba\",\"zip\":\"23000\",\"address\":\"Annaba\"}', 'fonctionnaire militaire', 'deliverd', '2024-12-27 01:11:35', '2025-09-16 11:07:38'),
(10, '219356', 1757796, 1757796, 0, '46000', 12, '444', 'DZD', 'DA', 1, '{\"name\":\"Didou\",\"email\":\"didou@gmail.com\",\"phone\":\"0696566605\",\"country\":\"Algeria\",\"state\":\"sss\",\"city\":\"annaba\",\"zip\":\"23000\",\"address\":\"annaba\"}', 'retrait militaire', 'deliverd', '2024-12-27 12:13:59', '2025-09-18 09:43:48'),
(13, '606649', 878898, 878898, 0, '66000', 12, '222', 'DZD', 'DA', 1, '{\"name\":\"Python Developer\",\"phone\":\"0675112036\",\"country\":\"Algeria\",\"state\":\"Annaba\",\"city\":\"Annaba\",\"zip\":\"23000\",\"address\":\"Annaba\"}', 'fonctionnaire', 'pending', '2025-10-23 12:10:09', '2025-10-23 12:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `variants` text DEFAULT NULL,
  `variants_total` bigint(20) DEFAULT NULL,
  `unit_price` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `product_name`, `variants`, `variants_total`, `unit_price`, `qty`, `created_at`, `updated_at`) VALUES
(8, 8, 2, 'Machine à Laver SAMSUNG frontale 7Kg', NULL, 0, '878898', 2, '2024-12-27 01:09:43', '2024-12-27 01:09:43'),
(9, 9, 1, 'Téléviseur CONDOR 55″ Smart TV 4K', NULL, 0, '878898', 1, '2024-12-27 01:11:35', '2024-12-27 01:11:35'),
(10, 10, 2, 'Machine à Laver SAMSUNG frontale 7Kg', NULL, 0, '878898', 2, '2024-12-27 12:13:59', '2024-12-27 12:13:59'),
(14, 13, 2, 'Machine à Laver SAMSUNG frontale 7Kg', NULL, 0, '878898', 1, '2025-10-23 12:10:09', '2025-10-23 12:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('anissannabi2@gmail.com', '$2y$12$B8nKb4eACTnEFkoL7rQgUOsuHiUTQHEg3pRbk9MLThZ3X8ebjG4Uq', '2024-12-22 15:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `productgalleries`
--

CREATE TABLE `productgalleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productgalleries`
--

INSERT INTO `productgalleries` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'products/oWMRKa0DKvcp6C7IjUPfqUgZ51YbrnPLE8CypycJ.png', '2024-10-25 10:44:52', '2024-10-25 10:44:52'),
(2, 1, 'products/COiJn30zkkbkczlW9P1gRClcPqyVd1N1G8dXWKoG.png', '2024-10-25 10:44:59', '2024-10-25 10:44:59'),
(3, 1, 'products/z8KGsO2nEs2zdZZKsoX8K5UeMBP0Ob4sxipa72dJ.png', '2024-10-25 10:45:18', '2024-10-25 10:45:18'),
(4, 1, 'products/nol2BHEzK4MfL2pRjNIAJezZYIvfL9znbNNNlMj8.png', '2024-10-25 10:45:25', '2024-10-25 10:45:25'),
(5, 2, 'products/KEm2TWARgQiSg7vE4WLvfco9QeKVUnVi8jsyGdkX.png', '2024-10-25 12:00:29', '2024-10-25 12:00:29'),
(6, 2, 'products/oMoQIJJHSRpQiLqbhxeIfUAh3XdG6V7xKoGpepZT.png', '2024-10-25 12:00:35', '2024-10-25 12:00:35'),
(7, 2, 'products/sYGnEfTPUrLZ723lr8k53uF6iQ9t8H0MCb1nOgMj.png', '2024-10-25 12:00:42', '2024-10-25 12:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `childcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thumb_image` text NOT NULL,
  `qty` int(11) NOT NULL,
  `short_description` text NOT NULL,
  `long_description` text NOT NULL,
  `video_link` text DEFAULT NULL,
  `price` bigint(20) NOT NULL,
  `price_12` bigint(20) NOT NULL,
  `price_24` bigint(20) NOT NULL,
  `price_36` bigint(20) NOT NULL,
  `price_48` bigint(20) NOT NULL,
  `price_60` bigint(20) NOT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `offer_start_date` date DEFAULT NULL,
  `offer_end_date` date DEFAULT NULL,
  `type` enum('تقسيط') DEFAULT NULL,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `brand_id`, `category_id`, `subcategory_id`, `childcategory_id`, `name`, `slug`, `thumb_image`, `qty`, `short_description`, `long_description`, `video_link`, `price`, `price_12`, `price_24`, `price_36`, `price_48`, `price_60`, `offer_price`, `offer_start_date`, `offer_end_date`, `type`, `is_approved`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 1, NULL, 'Téléviseur CONDOR 55″ Smart TV 4K', 'televiseur-condor-55-smart-tv-4k', 'products/32J0HbBUgZ0LFEAudXAMCLwiofrkSCRSlsORSadn.png', 22, 'disponible', '<p>couleur noir</p><p>60 fps</p><p>32 pouces </p>', NULL, 878898, 222, 3232, 32323, 2323, 23232, NULL, NULL, NULL, 'تقسيط', 1, 1, '2024-10-23 21:26:15', '2024-10-25 10:49:33'),
(2, 3, 1, 2, NULL, NULL, 'Machine à Laver SAMSUNG frontale 7Kg', 'machine-a-laver-samsung-frontale-7kg', 'products/cIvqvGsCLUNRNPM3l0GuWxHtzoOETj8xhcmNRybe.png', 55, 'Machine à Laver SAMSUNG Frontale 7 kg, couleur Blanc, modèle WW70TA046T. Compact, efficace et facile d’utilisation pour une lessive sans souci.', '<h2 style=\"margin-right: 0px; margin-bottom: var(--wd-tags-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-weight: var(--wd-title-font-weight); font-stretch: inherit; line-height: 1.4; font-family: var(--wd-title-font); font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 24px;\">Machine à Laver SAMSUNG frontale 7Kg</h2><p style=\"margin-right: 0px; margin-bottom: var(--wd-tags-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: inherit; font-family: Inter, Arial, Helvetica, sans-serif; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 16px;\">Capacité de lavage: 7 kg<br>Vitesse d’essorage: 1400 tr/min<br>Classe énergétique: A+++<br>Efficacité d’essorage: B<br><a href=\"https://www.koktahome.com/produit-tag/moins-consommation-denergie/\" style=\"margin: 0px; padding: 0px 0px 2px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: bold; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; touch-action: manipulation; color: rgb(31, 61, 61); transition-duration: 0.25s; transition-property: all; box-shadow: none; background-image: linear-gradient(to right, rgb(32, 125, 233) 50%, transparent 50%); background-size: 6px 2px; background-position: 0px 90%; background-repeat: repeat-x;\">Consommation d’énergie</a>&nbsp;annuelle: 103 kWh<br>14 Programmes: Eco 40-60<br>Coton<br>Vidange/Essorage<br>Intensif à froid<br>Synthétiques<br>Express 15 min<br>Couleurs<br>Nettoyage Tambour<br>Charge mixte<br>Laine<br>Draps<br>Délicats<br>Programmes Vapeur<br>Rinçage + essorage<br>Moteur Digital inverter<br>Technologie ecobubble<br>Affichage: LED<br>Tiroir de lessive auto-nettoyant<br>Dimensions: (L x H x P): 60 x 85 x 55 cm<br>Poids: 65 kg<br>Couleur: Blanc<br>Grantie: 2 ans + 20 ans sur moteur</p><p style=\"margin-right: 0px; margin-bottom: var(--wd-tags-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: inherit; font-family: Inter, Arial, Helvetica, sans-serif; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 16px;\"><br></p>', NULL, 878898, 222, 3232, 32323, 2323, 23232, NULL, NULL, NULL, 'تقسيط', 1, 1, '2024-10-25 11:59:25', '2024-10-25 11:59:25'),
(5, 3, 6, 4, NULL, NULL, 'Plaque de cuisson PREMIUM 60Cm 2 Feux Vitre Noir AP32.BS01', 'plaque-de-cuisson-premium-60cm-2-feux-vitre-noir-ap32bs01', 'products/CaosfsAdTEkfoxOXQiWigLtKCSvf1ttfvEsMXDLM.png', 20, 'Plaque de cuisson PREMIUM AP32.BS01 : 60 cm, 2 foyers gaz, noir, grilles fonte, allumage intégré, sécurité thermocouple.', '<p style=\"margin-right: 0px; margin-bottom: var(--wd-tags-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: inherit; font-family: Inter, Arial, Helvetica, sans-serif; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 16px;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; color: rgb(0, 128, 0);\"><a href=\"https://www.koktahome.com/?product_cat=0&amp;dgwt_wcas=1&amp;post_type=product&amp;s=Plaque+de+cuisson\" style=\"margin: 0px; padding: 0px 0px 2px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: bold; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; touch-action: manipulation; color: rgb(31, 61, 61); transition-duration: 0.25s; transition-property: all; box-shadow: none; background-image: linear-gradient(to right, rgb(32, 125, 233) 50%, transparent 50%); background-size: 6px 2px; background-position: 0px 90%; background-repeat: repeat-x;\">Plaque de cuisson</a>&nbsp;PREMIUM AP32.BS01</span>&nbsp;:</span></p><p style=\"margin-right: 0px; margin-bottom: var(--wd-tags-mb); margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; line-height: inherit; font-family: Inter, Arial, Helvetica, sans-serif; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; font-size: 16px;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Modèle : Encastrable</span><br><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Type de cuisson : Gaz</span><br><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Couleur : Noir</span><br><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Nombre de foyers : 2</span><br><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Type de grilles : Fonte</span><br><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Allumage : Intégré</span><br><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Sécurité Thermocouple : Oui</span><br><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Dimensions produit : 520 x 300 mm</span><br><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Dimensions encastrement : 490 x 260 mm</span><br><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Gaz naturel : Oui</span><br><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Câble de raccordement : 1 m</span></p><div><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\"><br></span></div>', NULL, 878898, 222, 112, 122, 322, 342, NULL, NULL, NULL, 'تقسيط', 1, 1, '2024-10-25 12:51:06', '2024-10-25 12:51:06'),
(8, 10, 6, 3, NULL, NULL, 'Radiateur Aluminium', 'radiateur-aluminium', 'products/wQfd9A2dfLPSBBH7uzcjb03A4mwuHrwIezhBMVCq.jpg', 5, 'fvvvvvvvvvvvvvvvvvd', '<p>fvvvvvvvvvvvvvvvvvdfvvvvvvvvvvvvvvvvvdfvvvvvvvvvvvvvvvvvdfvvvvvvvvvvvvvvvvvdfvvvvvvvvvvvvvvvvvd</p>', NULL, 70000, 5945, 3024, 2051, 1565, 1273, NULL, NULL, NULL, 'تقسيط', 0, 1, '2024-12-22 12:37:48', '2025-09-16 11:09:40'),
(9, 3, 1, 2, NULL, NULL, 'MACHINE A LAVER SAMSUNG FRONT 8KG', 'machine-a-laver-samsung-front-8kg', 'products/fIrNcDMJQ9m8lVbTXguTVbo4QOWB3i3fVOPnWmgE.jpg', 5, 'dddddddddddddddddddddddddddd', '<p>gfbdhrthjttyjtyj</p>', NULL, 150000, 12738, 6480, 4395, 3353, 2729, NULL, NULL, NULL, 'تقسيط', 1, 1, '2024-12-22 13:08:08', '2024-12-22 13:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variant_items`
--

CREATE TABLE `product_variant_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_variant_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` bigint(20) NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9AKkqVvyJaPOZXFA2TQ8dnb9lyxIDafNiFgYa3z3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQTM2cUlXR3NGaUNZRWZkc0htNHdZb29nTnNmcld2V2JHQmNBWldHdyI7czo2OiJsb2NhbGUiO3M6MjoiYXIiO3M6MTg6ImZsYXNoZXI6OmVudmVsb3BlcyI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1758666685),
('MVbfVVxUgtbns9YknGEcUX8vV7Q26BU6NE5LG52e', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRlVGcTNUQ1liN2NCZXpjRkI5dUYzOUl1cTJzdTBUclJKa1VaVXBlWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJsb2NhbGUiO3M6MjoiYXIiO3M6MTg6ImZsYXNoZXI6OmVudmVsb3BlcyI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NDoiY2FydCI7YTowOnt9fQ==', 1761225011),
('oCVXKGTeQxCjymE0jewZsFUZkhvx905FlF7Ninxe', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiVElBN3BBRWVKenVCczJOdnZremtTNkZVbW9DZnBrZHljUTRIM2Q5USI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJsb2NhbGUiO3M6MjoiYXIiO3M6MTg6ImZsYXNoZXI6OmVudmVsb3BlcyI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czoxODoicHJvZHVjdF9saXN0X3N0eWxlIjtzOjQ6Imxpc3QiO30=', 1758192372);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner` text DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `starting_price` varchar(255) DEFAULT NULL,
  `btn_url` varchar(255) DEFAULT NULL,
  `serial` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `banner`, `type`, `title`, `starting_price`, `btn_url`, `serial`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sliders/vcTpODkNc77AHKW5LY71RklIONihQ2dGWmmqHnZI.jpg', 'chauffage', 'chauffage electrique', '3000', 'http://127.0.0.1:8000', 1, 1, '2024-10-23 21:03:52', '2024-10-23 21:03:52'),
(2, 'sliders/rLVjcMJr5AQP5pwsKEGJwOLGiIF45qahoftiE79s.jpg', 'machine a laver', 'machine a laver', '5000', 'http://127.0.0.1:8000', 2, 1, '2024-10-23 21:05:22', '2024-10-23 21:05:22'),
(3, 'sliders/FffsnIpObUm7cnsDFxl3lp3VvK6LmwdYgGu8vozC.jpg', 'Climatiseur', 'Climatiseur Trés bon caliter', '5000', 'http://127.0.0.1:8000', 3, 1, '2024-10-23 21:07:12', '2024-12-22 14:06:50'),
(4, 'sliders/dfggVkhIcCj9wskG3m3m2GYR20AaeHBQ0xtAd5ZX.jpg', 'Télévision', 'TV', '43000', 'http://127.0.0.1:8000', 4, 1, '2024-10-23 21:09:18', '2024-10-23 21:09:18'),
(5, 'sliders/0rUkvJpX9geej9qejFdYLWVvI9f6kJHZbfXpOqgl.jpg', 'Frégidaire', 'Frégidaire haut calité', '23000', 'http://127.0.0.1:8000', 5, 1, '2024-10-23 21:10:48', '2024-12-22 14:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Samsung', 'samsung', 1, '2024-10-23 21:20:54', '2024-10-23 21:20:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` enum('user','vendor','admin') NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `status`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`) VALUES
(3, 'Mouad', 'admin', 'active', 'laouarmouad@gmail.com', NULL, '$2y$12$N94zFGy6YsLUz4PqJ/jBJuj4a4Ns/N89ue9BkTsX2jJ/tcac3EBde', NULL, '2024-10-23 20:59:41', '2025-07-01 13:54:19', 'uploads/ZE5630vjpP4s4F2ue56cCkMqLekSYVleeJvYjpVV.jpg'),
(10, 'Abdelhamid', 'vendor', 'active', 'anissannabi2@gmail.com', NULL, '$2y$12$jZUy1dmshBm3BQX7bV5FJe34rXwpDgsY.9.T016MDCy15EC4Eid4G', 'mwIpvqfq9SjdV8fCbVslYyKi0kexFAZdqLdFoE76MoeWsU1apIS8qgPxG4eC', '2024-11-03 16:07:59', '2024-12-22 12:04:26', 'uploads/AJASfH9bROcUKAQ7h40PiPEf1y0xrTPzv35Lilmb'),
(11, 'Aniss', 'vendor', 'active', 'anissannabi@gmail.com', NULL, '$2y$12$UY/0vcklZxhPOY1IxvicHus5NPPWM8BBX8buEdJRXvz1iEsmmkaXu', NULL, '2025-09-16 10:38:04', '2025-09-16 11:07:07', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

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
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `child_categories`
--
ALTER TABLE `child_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `child_categories_name_unique` (`name`),
  ADD KEY `child_categories_category_id_foreign` (`category_id`),
  ADD KEY `child_categories_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `flash_sells`
--
ALTER TABLE `flash_sells`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flash_sell_items`
--
ALTER TABLE `flash_sell_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `flash_sell_items_product_id_unique` (`product_id`),
  ADD KEY `flash_sell_items_flash_sell_id_foreign` (`flash_sell_id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_pages`
--
ALTER TABLE `home_pages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_order_id_foreign` (`order_id`),
  ADD KEY `order_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `productgalleries`
--
ALTER TABLE `productgalleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productgalleries_product_id_foreign` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `products_childcategory_id_foreign` (`childcategory_id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variants_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_variant_items`
--
ALTER TABLE `product_variant_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variant_items_product_variant_id_foreign` (`product_variant_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sliders_serial_unique` (`serial`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcategories_name_unique` (`name`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `child_categories`
--
ALTER TABLE `child_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flash_sells`
--
ALTER TABLE `flash_sells`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flash_sell_items`
--
ALTER TABLE `flash_sell_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_pages`
--
ALTER TABLE `home_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `productgalleries`
--
ALTER TABLE `productgalleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_variant_items`
--
ALTER TABLE `product_variant_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `child_categories`
--
ALTER TABLE `child_categories`
  ADD CONSTRAINT `child_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `child_categories_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);

--
-- Constraints for table `flash_sell_items`
--
ALTER TABLE `flash_sell_items`
  ADD CONSTRAINT `flash_sell_items_flash_sell_id_foreign` FOREIGN KEY (`flash_sell_id`) REFERENCES `flash_sells` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `flash_sell_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `productgalleries`
--
ALTER TABLE `productgalleries`
  ADD CONSTRAINT `productgalleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_childcategory_id_foreign` FOREIGN KEY (`childcategory_id`) REFERENCES `child_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_variant_items`
--
ALTER TABLE `product_variant_items`
  ADD CONSTRAINT `product_variant_items_product_variant_id_foreign` FOREIGN KEY (`product_variant_id`) REFERENCES `product_variants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
