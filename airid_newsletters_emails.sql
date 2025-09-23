-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.31 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage de la structure de la table projet_airid_africa_db. airid_newsletters_emails
CREATE TABLE IF NOT EXISTS `airid_newsletters_emails` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email_subscribe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_start_subscribe` date NOT NULL,
  `date_end_subscribe` date DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table projet_airid_africa_db.airid_newsletters_emails : ~5 rows (environ)
INSERT INTO `airid_newsletters_emails` (`id`, `email_subscribe`, `date_start_subscribe`, `date_end_subscribe`, `active`, `created_at`, `updated_at`) VALUES
	(1, 'fhoueha@gmail.com', '2025-09-23', NULL, 1, '2025-09-23 11:43:50', '2025-09-23 11:43:50'),
	(2, 'fhouehaZ@gmail.com', '2025-09-23', NULL, 1, '2025-09-23 11:52:19', '2025-09-23 11:52:19'),
	(3, 'fhoueha23@gmail.com', '2025-09-23', NULL, 1, '2025-09-23 11:52:42', '2025-09-23 11:52:42'),
	(4, 'dd@gmail.com', '2025-09-23', NULL, 1, '2025-09-23 11:53:01', '2025-09-23 11:53:01'),
	(5, 'fh@gmail.com', '2025-09-23', NULL, 1, '2025-09-23 11:55:43', '2025-09-23 11:55:43');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
