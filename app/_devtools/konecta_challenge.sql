-- Adminer 4.8.1 MySQL 5.5.5-10.4.24-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `kone_categories`;
CREATE TABLE `kone_categories` (
  `category_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: Active, 2: Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `kone_categories` (`category_id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1,	'Frutas',	'Descripcion de frutas',	1,	'2022-12-06 02:19:37',	'2022-12-06 02:19:37'),
(2,	'Bebidas',	'Descripcion de bebidas',	1,	'2022-12-06 02:19:50',	'2022-12-06 02:19:50'),
(3,	'Lacteos',	'Descripcion de lacteos',	1,	'2022-12-06 02:20:05',	'2022-12-06 02:20:05');

DROP TABLE IF EXISTS `kone_products`;
CREATE TABLE `kone_products` (
  `product_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `stock` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: Active, 2: Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `kone_products_category_id_foreign` (`category_id`),
  CONSTRAINT `kone_products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `kone_categories` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `kone_products` (`product_id`, `name`, `reference`, `price`, `weight`, `category_id`, `stock`, `status`, `created_at`, `updated_at`) VALUES
(1,	'Yogutrh',	'yg-123',	1000,	100,	3,	15,	1,	'2022-12-06 02:20:32',	'2022-12-06 02:44:18'),
(2,	'Manzana',	'mz-123',	500,	20,	1,	12,	1,	'2022-12-06 02:20:51',	'2022-12-06 02:55:20'),
(3,	'Banano',	'Bn-123',	300,	20,	1,	17,	1,	'2022-12-06 02:21:13',	'2022-12-06 02:30:04'),
(4,	'Cocacolapet',	'co-12',	2000,	200,	3,	98,	1,	'2022-12-06 03:06:55',	'2022-12-06 04:23:57');

DROP TABLE IF EXISTS `kone_sales`;
CREATE TABLE `kone_sales` (
  `sale_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `amount` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sale_id`),
  KEY `kone_sales_product_id_foreign` (`product_id`),
  CONSTRAINT `kone_sales_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `kone_products` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `kone_sales` (`sale_id`, `product_id`, `amount`, `created_at`, `updated_at`) VALUES
(1,	2,	99,	'2022-12-06 02:31:23',	'2022-12-06 02:31:23'),
(2,	2,	5,	'2022-12-06 02:32:59',	'2022-12-06 02:32:59'),
(3,	1,	2,	'2022-12-06 02:41:49',	'2022-12-06 02:41:49'),
(4,	1,	20,	'2022-12-06 02:44:18',	'2022-12-06 02:44:18'),
(5,	2,	2,	'2022-12-06 02:45:17',	'2022-12-06 02:45:17'),
(6,	2,	1,	'2022-12-06 02:46:44',	'2022-12-06 02:46:44'),
(7,	2,	1,	'2022-12-06 02:47:03',	'2022-12-06 02:47:03'),
(8,	2,	1,	'2022-12-06 02:47:11',	'2022-12-06 02:47:11'),
(9,	2,	3,	'2022-12-06 02:55:20',	'2022-12-06 02:55:20'),
(10,	4,	2,	'2022-12-06 03:07:28',	'2022-12-06 03:07:28');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(5,	'2022_12_05_150518_create_categories_table',	1),
(6,	'2022_12_05_150955_create_products_table',	1),
(7,	'2022_12_05_211148_create_sales_table',	1);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2022-12-05 23:45:44
