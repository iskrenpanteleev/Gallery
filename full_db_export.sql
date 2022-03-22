-- -------------------------------------------------------------
-- TablePlus 4.5.2(402)
--
-- https://tableplus.com/
--
-- Database: icard
-- Generation Time: 2022-03-22 21:48:05.2960
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `photo_id` bigint unsigned NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_photo_id_foreign` (`photo_id`),
  CONSTRAINT `comments_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  KEY `media_order_column_index` (`order_column`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `photos`;
CREATE TABLE `photos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `photos_user_id_foreign` (`user_id`),
  CONSTRAINT `photos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE `ratings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `photo_id` bigint unsigned NOT NULL,
  `type` tinyint NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ratings_photo_id_foreign` (`photo_id`),
  CONSTRAINT `ratings_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `comments` (`id`, `photo_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 6, 'Nice pic', '2022-03-22 19:40:15', '2022-03-22 19:40:15'),
(2, 5, 'Summer', '2022-03-22 19:41:00', '2022-03-22 19:41:00'),
(3, 5, 'Nice jeans', '2022-03-22 19:41:04', '2022-03-22 19:41:04'),
(4, 4, 'Skiing pic', '2022-03-22 19:41:14', '2022-03-22 19:41:14'),
(5, 4, 'winter', '2022-03-22 19:41:29', '2022-03-22 19:41:29');

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(13, 'App\\Models\\Photo', 1, 'b70dec9f-8af1-440c-8576-5aaf1152e0a2', 'photos', 'photo-1516362494095-89c6e27d4428', 'photo-1516362494095-89c6e27d4428.jpeg', 'image/jpeg', 'public', 'public', 96605, '[]', '[]', '[]', '[]', 1, '2022-03-22 19:15:11', '2022-03-22 19:15:11'),
(14, 'App\\Models\\Photo', 1, 'a98c907c-e374-4011-b6f9-681eb56bf75d', 'photos', 'photo-1516362494095-89c6e27d4428', 'photo-1516362494095-89c6e27d4428.jpeg', 'image/jpeg', 'public', 'public', 96605, '[]', '[]', '[]', '[]', 2, '2022-03-22 19:38:34', '2022-03-22 19:38:34'),
(15, 'App\\Models\\Photo', 2, '7105721e-8f90-426b-b32f-b5a0f547e5b0', 'photos', 'photo-1516706443377-10e1c05a3346', 'photo-1516706443377-10e1c05a3346.jpeg', 'image/jpeg', 'public', 'public', 135244, '[]', '[]', '[]', '[]', 1, '2022-03-22 19:38:37', '2022-03-22 19:38:37'),
(16, 'App\\Models\\Photo', 3, '58c88948-e433-4cee-a06d-be3d67cc3927', 'photos', 'photo-1528465424850-54d22f092f9d', 'photo-1528465424850-54d22f092f9d.jpeg', 'image/jpeg', 'public', 'public', 67921, '[]', '[]', '[]', '[]', 1, '2022-03-22 19:38:40', '2022-03-22 19:38:40'),
(17, 'App\\Models\\Photo', 4, '7885f2c3-4e7b-4514-8535-4c4f9f0b2bb1', 'photos', 'photo-1569398967318-7935e1a3a358', 'photo-1569398967318-7935e1a3a358.jpeg', 'image/jpeg', 'public', 'public', 169853, '[]', '[]', '[]', '[]', 1, '2022-03-22 19:38:42', '2022-03-22 19:38:42'),
(18, 'App\\Models\\Photo', 5, '0139ddc3-a169-4bed-a36e-dd280cb7e814', 'photos', 'photo-1623944891788-8c21703462d4', 'photo-1623944891788-8c21703462d4.jpeg', 'image/jpeg', 'public', 'public', 182039, '[]', '[]', '[]', '[]', 1, '2022-03-22 19:38:45', '2022-03-22 19:38:45'),
(19, 'App\\Models\\Photo', 6, '76a6b3a2-03ae-4a55-a38c-a5013b5641a0', 'photos', 'photo-1628607292260-9195108b03b7', 'photo-1628607292260-9195108b03b7.jpeg', 'image/jpeg', 'public', 'public', 212232, '[]', '[]', '[]', '[]', 1, '2022-03-22 19:38:48', '2022-03-22 19:38:48');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_21_193214_create_photos_table', 1),
(6, '2022_03_21_194239_create_comments_table', 1),
(7, '2022_03_21_194254_create_ratings_table', 1),
(8, '2022_03_21_194817_create_media_table', 1);

INSERT INTO `photos` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-03-22 19:38:34', '2022-03-22 19:38:34'),
(2, 1, '2022-03-22 19:38:37', '2022-03-22 19:38:37'),
(3, 1, '2022-03-22 19:38:40', '2022-03-22 19:38:40'),
(4, 1, '2022-03-22 19:38:42', '2022-03-22 19:38:42'),
(5, 1, '2022-03-22 19:38:45', '2022-03-22 19:38:45'),
(6, 1, '2022-03-22 19:38:48', '2022-03-22 19:38:48');

INSERT INTO `ratings` (`id`, `photo_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(1, 6, 1, '127.0.0.1', '2022-03-22 19:39:11', '2022-03-22 19:39:11'),
(2, 2, 0, '127.0.0.1', '2022-03-22 19:39:13', '2022-03-22 19:39:13'),
(3, 4, 1, '127.0.0.1', '2022-03-22 19:39:16', '2022-03-22 19:39:16');

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$TxEOHp.2NbVoSEM4XUHcc.Sh6JDpgv8KInmAjWF8O8yyMUemV2fvm', NULL, '2022-03-22 19:45:44', '2022-03-22 19:45:44');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;