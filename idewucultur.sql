-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2025 at 10:15 AM
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
-- Database: `idewucultur`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Kubwa Branch', '2025-06-27 11:19:50', '2025-06-27 11:19:50'),
(2, 'Gwarimpa Branch', '2025-06-27 11:19:55', '2025-06-27 11:19:55'),
(3, 'Lugbe', '2025-06-27 11:20:05', '2025-06-27 11:20:05');

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
('idewucultur_cache_356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1750775705),
('idewucultur_cache_356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1750775704;', 1750775704),
('idewucultur_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1750769176),
('idewucultur_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1750769176;', 1750769176),
('idowuculture_cache_356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1751317217),
('idowuculture_cache_356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1751317216;', 1751317217),
('idowuculture_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1751314763),
('idowuculture_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1751314763;', 1751314763);

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
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `image`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Men\'s Clothes', 'mens-clothes', 'images/categories/01JYH2Y17W1YJ9E7RZVJ6CCRYN.jpg', NULL, '2025-06-24 12:44:40', '2025-06-24 13:57:01'),
(2, 'Women\'s Clothing', 'womens-clothing', 'images/categories/01JYH5RMH1PQFP9M31G7T11BVA.jpg', NULL, '2025-06-24 13:34:08', '2025-06-24 13:34:08'),
(3, 'Top and blowse', 'top-and-blowse', 'images/categories/01JYKX0BKA3EVY13289J0JY5M8.jpg', NULL, '2025-06-25 14:58:47', '2025-06-25 14:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `cloth_collections`
--

CREATE TABLE `cloth_collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cloth_collections`
--

INSERT INTO `cloth_collections` (`id`, `title`, `slug`, `image`, `created_at`, `updated_at`, `position`) VALUES
(1, 'Men\'s Set', 'mens-set', '01JZ1A40ZT3A00F0J8NPXJ48NZ.png', '2025-06-30 19:58:07', '2025-06-30 20:53:55', 2),
(2, 'Women\'s Set', 'womens-set', '01JZ1A4VZ7873DKXRHEZ0CHK94.png', '2025-06-30 19:58:34', '2025-06-30 20:53:55', 3),
(3, 'Junior\'s Set', 'juniors-set', '01JZ1A69GEBKHSEA67MQNWGVXB.jpg', '2025-06-30 19:59:21', '2025-06-30 20:53:55', 1);

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
-- Table structure for table `measurements`
--

CREATE TABLE `measurements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `measured_by` bigint(20) UNSIGNED NOT NULL,
  `neck` decimal(5,2) DEFAULT NULL,
  `chest` decimal(5,2) DEFAULT NULL,
  `waist` decimal(5,2) DEFAULT NULL,
  `hip` decimal(5,2) DEFAULT NULL,
  `shoulder` decimal(5,2) DEFAULT NULL,
  `sleeve_length` decimal(5,2) DEFAULT NULL,
  `top_length` decimal(5,2) DEFAULT NULL,
  `trouser_length` decimal(5,2) DEFAULT NULL,
  `thigh` decimal(5,2) DEFAULT NULL,
  `knee` decimal(5,2) DEFAULT NULL,
  `ankle` decimal(5,2) DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `measurements`
--

INSERT INTO `measurements` (`id`, `user_id`, `measured_by`, `neck`, `chest`, `waist`, `hip`, `shoulder`, `sleeve_length`, `top_length`, `trouser_length`, `thigh`, `knee`, `ankle`, `amount`, `notes`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 32.00, 38.00, 16.00, 53.00, 4.00, 62.00, 1.00, 100.00, 22.00, 15.00, 25.00, 64.00, 'Earum est molestias ', 'pending', '2025-06-27 12:58:11', '2025-06-27 12:58:11'),
(2, 6, 1, 8.00, 33.00, 85.00, 17.00, 73.00, 12.00, 78.00, 18.00, 68.00, 84.00, 50.00, 49.00, 'Autem esse consequa', 'in_progress', '2025-06-27 14:45:20', '2025-06-27 14:45:20');

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
(4, '2025_06_24_125303_create_categories_table', 2),
(6, '2025_06_24_145758_create_products_table', 3),
(12, '2025_06_27_113324_create_branches_table', 4),
(13, '2025_06_27_114913_add_branch_to_users_table', 4),
(15, '2025_06_27_131631_create_measurements_table', 5),
(17, '2025_06_30_200131_add_is_featured_to_products', 6),
(18, '2025_06_30_203355_create_cloth_collections_table', 7),
(19, '2025_06_30_203814_add_cloth_collection_to_products', 7),
(21, '2025_06_30_214304_add_position_to_cloth_collections', 8);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sku` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `colors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`colors`)),
  `sizes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`sizes`)),
  `description` mediumtext NOT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`images`)),
  `has_fabric` tinyint(1) NOT NULL DEFAULT 0,
  `stock` int(11) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cloth_collection_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sku`, `title`, `slug`, `price`, `colors`, `sizes`, `description`, `images`, `has_fabric`, `stock`, `is_featured`, `created_at`, `updated_at`, `cloth_collection_id`) VALUES
(1, 1, 'SKUTVJDKS6E', 'Buba', 'buba', 50000.00, '[{\"color\":\"rgb(46, 112, 212)\",\"quantity\":\"5\"},{\"color\":\"rgb(232, 46, 46)\",\"quantity\":\"7\"}]', '[{\"size\":\"xl\",\"quantity\":\"5\"},{\"size\":\"xxl\",\"quantity\":\"7\"}]', '<p>Very good for chubby men.</p><p>Sure! Could you please clarify <strong>what topic</strong> you\'d like the 1000 words on? Here are a few example categories to choose from, or you can give your own:</p><ol><li><strong>Technology</strong> (e.g. AI, cybersecurity, future of work)</li><li><strong>Education</strong> (e.g. benefits of online learning, reforming schools)</li><li><strong>Health</strong> (e.g. mental health awareness, fitness tips)</li><li><strong>Business</strong> (e.g. entrepreneurship, marketing trends)</li><li><strong>Fiction</strong> (e.g. a short story or a sci-fi scene)</li><li><strong>Motivational</strong> (e.g. self-discipline, achieving goals)</li></ol><p>Let me know your preference!</p>', '[\"images\\/products\\/01JYHBPJFWYWFN0NNPKKQFM6TJ.jpg\",\"images\\/products\\/01JYHBPJHWFMYKM3BPTXRZ15SR.jpg\",\"images\\/products\\/01JYHBPJJ6FT1QVMK912KRVX7T.jpg\",\"images\\/products\\/01JYHBPJJEFVZWM0101X2XB659.jpg\",\"images\\/products\\/01JYHBPJKAZAYNBGC642M4APXH.png\",\"images\\/products\\/01JYHBPJKJ6N2QDW2VBHY9BEMV.jpg\",\"images\\/products\\/01JYHBPJMJ6ACXZ8BCRC36415R.jpg\",\"images\\/products\\/01JYHBPJNCCBHGNCPP1C1KX7YR.jpg\",\"images\\/products\\/01JYHBPJNPPY58MH9TTVW34XYJ.jpg\"]', 1, 12, 1, '2025-06-24 15:17:52', '2025-06-30 20:03:44', 1),
(2, 2, 'SKUIWQNFORU', 'Senetor', 'senetor', 39991.00, '[{\"color\":\"rgb(130, 32, 150)\",\"quantity\":\"2\"}]', '[{\"size\":\"xl\",\"quantity\":\"4\"}]', '<p>A good product</p>', '[\"images\\/products\\/01JYKX7DERK2X9EQKQGSB4GK8E.jpg\",\"images\\/products\\/01JYKX7DJ6QHXFXXNBXM7VZ0SG.jpg\",\"images\\/products\\/01JYKX7DJE643WVXJ1QDET8YC3.jpg\",\"images\\/products\\/01JYKX7DJQ8CRWG621JF8RFPS8.jpg\",\"images\\/products\\/01JYKX7DK1C7S4MY24GRN3H4V6.jpg\",\"images\\/products\\/01JYKX7DKK3D2RXXVPKM0Q083V.jpg\"]', 1, 12, 0, '2025-06-25 15:02:39', '2025-06-30 20:04:21', 2);

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
('0mDBAc4m5hTavXOaoMN3g9fFwI0Q8ulJdr9OFwld', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiM3RrczZiRUhaQWhCaTJyMHpTZGhLejZjNGtMQXplbDZkVHVhdEVrdCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NToiaHR0cHM6Ly9hZG1pbi5pZG93dWN1bHR1cmUudGVzdC8/aGVyZD1wcmV2aWV3Ijt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vYWRtaW4uaWRvd3VjdWx0dXJlLnRlc3QvP2hlcmQ9cHJldmlldyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751314661),
('42ehepOIX8rfmDhLU6WNu5RdmLtpmLskYJTbdBxv', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSkw2SzNweTM2cUJCb0xtNEIza1k0YzJzeVJNUURGc3g1SllRVldqeiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NToiaHR0cHM6Ly9hZG1pbi5pZG93dWN1bHR1cmUudGVzdC8/aGVyZD1wcmV2aWV3Ijt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vYWRtaW4uaWRvd3VjdWx0dXJlLnRlc3QvP2hlcmQ9cHJldmlldyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751312814),
('9fHzmvPOJbGspxWUGYdE0kChHhGILIJDpeuGpPEc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRm8zTGtmbThPMGRpNzBCalJoTHdEbFppdzNCaEdXa0dLQmwyekNVciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vYWRtaW4uaWRvd3VjdWx0dXJlLnRlc3QvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751314691),
('elM6KoGGRAEbvEVWCAhAeVbO33xwEC2mlPFLZBnS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTElYR2NpUzVhRXNsOFlncXhuNEl5WUdZbXZ1UWpkRWZpRHJFYk1RNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vaWRvd3VjdWx0dXJlLnRlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751272443),
('GFo5xkunf8jaWNMegTPYtJV0wOlJjlFXe0U3RJGq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiejRodk9qa0MwSTM0UG1PbDluYkFmYXV3R0xBS2RhRTdod1luMm5rWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vaWRvd3VjdWx0dXJlLnRlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751320738),
('Vweub3mNSUz3X04dviZaV1DiSjGg6I8hOlhXAEO4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieUdiVjlaeXR6dGxvZ0p0WldPNkI4TW9HMGI0SG93dWlsU21kRmlGeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vaWRvd3VjdWx0dXJlLnRlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751222208),
('Y6Z0ddmAh0sgF5hhGpqLa9tor9uMtjdXT0U2v3T4', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiZUJlV3FVb2xsb2xseFFScndHVmpCckRKQ0FkenVZQm9XT1ZPa250RSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ5OiJodHRwczovL2FkbWluLmlkb3d1Y3VsdHVyZS50ZXN0L2Nsb3RoLWNvbGxlY3Rpb25zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJGJiT0RORUlhdnprZjlvd2JNN3E4aU9KSXRNbXdzQnNsNVNiS3FqbGUzT0xoeVdzdTdLZEUuIjtzOjg6ImZpbGFtZW50IjthOjA6e319', 1751320437),
('YilZ3w1Pr1CwTEVnKNtYxU2reV1t9NYEYcZpPv6e', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWlNHODdDTk9xU3lQZXhreVBFVWg5MjV3dUVKOFJtYkZCOWFWcUpsWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vaWRvd3VjdWx0dXJlLnRlc3QvP2hlcmQ9cHJldmlldyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751312814);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phone`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `branch_id`) VALUES
(1, 'Frankie', 'Nitzsche', 'admin@gmail.com', '364-795-8349', NULL, '$2y$12$bbODNEIavzkf9owbM7q8iOJItMmwsBsl5SbKqjle3OLhyWsu7KdE.', 'admin', 'f76jgy7TL8DxwKYigzNiinY2uFij7S9u4gwKbwqjoyXcZ1hGLZAuctVRpLEz', '2025-06-24 11:44:47', '2025-06-24 11:44:47', NULL),
(2, 'Eberechi', 'Ugorji', 'product@gmail.com', '08136791356', NULL, '$2y$12$SFI8tBYLgXbZfsWycomCceezNLcqJNDbQiejn6qM77oUAqjv3VKIy', 'production', NULL, '2025-06-27 09:14:09', '2025-06-27 11:24:19', 1),
(3, 'Edmond', 'Frau', 'edmondfrau@gmail.com', '08136791356', NULL, '$2y$12$sCf6N190mcnroSQGo4ayU.fbekEOVmCJrR48BXsSNLRRLhaWXWm8W', 'user', NULL, '2025-06-27 11:10:19', '2025-06-27 11:10:19', NULL),
(6, 'Monisola', 'Aiyekusehin', 'aiyekusehinmonisola@gmail.com', '08062505647', NULL, '$2y$12$kp95lsnGZw/lnKJpPyfpAOuinVUfHxtfbeRUFmg/41JbdYrxGe.76', 'user', NULL, '2025-06-27 12:09:27', '2025-06-27 12:09:27', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `categories_title_unique` (`title`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `cloth_collections`
--
ALTER TABLE `cloth_collections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cloth_collections_title_unique` (`title`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `measurements`
--
ALTER TABLE `measurements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `measurements_user_id_foreign` (`user_id`),
  ADD KEY `measurements_measured_by_foreign` (`measured_by`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_cloth_collection_id_foreign` (`cloth_collection_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_branch_id_foreign` (`branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cloth_collections`
--
ALTER TABLE `cloth_collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `measurements`
--
ALTER TABLE `measurements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `measurements`
--
ALTER TABLE `measurements`
  ADD CONSTRAINT `measurements_measured_by_foreign` FOREIGN KEY (`measured_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `measurements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_cloth_collection_id_foreign` FOREIGN KEY (`cloth_collection_id`) REFERENCES `cloth_collections` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
