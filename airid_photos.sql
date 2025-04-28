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

-- Listage de la structure de la table projet_airid_africa_db. airid_photos
CREATE TABLE IF NOT EXISTS `airid_photos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titre_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `statut_photo` enum('principal','secondaire') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie_photo` enum('Project','News','Visits','Team Building','Capacity Building') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_event` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table projet_airid_africa_db.airid_photos : ~32 rows (environ)
INSERT INTO `airid_photos` (`id`, `titre_photo`, `description`, `statut_photo`, `nom_photo`, `categorie_photo`, `tag`, `date_event`, `created_at`, `updated_at`) VALUES
	(14, 'Visit Gate Foundation', 'Mr David Malone visited our GLP-compliant facility', 'principal', 'gates/IMG_0933.jpg', 'Visits', 'gates', '2025-03-06', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(15, 'Visit Gate Foundation', 'Mr David Malone visited our GLP-compliant facility', 'secondaire', 'gates/IMG_0857.jpg', 'Visits', 'gates', '2025-03-06', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(16, 'Visit Gate Foundation', 'Mr David Malone visited our GLP-compliant facility', 'secondaire', 'gates/IMG_0865.jpg', 'Visits', 'gates', '2025-03-06', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(17, 'Visit IVCC', 'IVCC visited our GLP-compliant facility', 'principal', 'ivcc/IMG_0770.jpg', 'Visits', 'ivcc', '2025-03-06', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(18, 'Visit IVCC', 'IVCC visited our GLP-compliant facility', 'secondaire', 'ivcc/IMG_0426.jpg', 'Visits', 'ivcc', '2025-03-06', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(19, 'Visit IVCC', 'IVCC visited our GLP-compliant facility', 'secondaire', 'ivcc/IMG_0468.jpg', 'Visits', 'ivcc', '2025-03-06', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(20, 'Visit IVCC', 'IVCC visited our GLP-compliant facility', 'secondaire', 'ivcc/IMG_0480.jpg', 'Visits', 'ivcc', '2025-03-06', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(21, 'Visit IVCC', 'IVCC visited our GLP-compliant facility', 'secondaire', 'ivcc/IMG_0524.jpg', 'Visits', 'ivcc', '2025-03-06', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(22, 'Visit IVCC', 'IVCC visited our GLP-compliant facility', 'secondaire', 'ivcc/IMG_0538.jpg', 'Visits', 'ivcc', '2025-03-06', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(23, 'Visit IVCC', 'IVCC visited our GLP-compliant facility', 'secondaire', 'ivcc/IMG_0553.jpg', 'Visits', 'ivcc', '2025-03-06', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(24, 'Visit IVCC', 'IVCC visited our GLP-compliant facility', 'secondaire', 'ivcc/IMG_0598.jpg', 'Visits', 'ivcc', '2025-03-06', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(25, 'Visit IVCC', 'IVCC visited our GLP-compliant facility', 'secondaire', 'ivcc/IMG_0766.jpg', 'Visits', 'ivcc', '2025-03-06', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(26, 'Visit IVCC', 'IVCC visited our GLP-compliant facility', 'secondaire', 'ivcc/IMG_0831.jpg', 'Visits', 'ivcc', '2025-03-06', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(27, 'PLUS Project Process Evaluation Workshop', 'The Process Evaluation Team Was in our facility to hold a Workshop', 'principal', 'process_evaluation/IMG_0938.jpg', 'Project', 'process_evaluation', '2025-03-11', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(28, 'PLUS Project Process Evaluation Workshop', 'The Process Evaluation Team Was in our facility to hold a Workshop', 'secondaire', 'process_evaluation/IMG_0945.jpg', 'Project', 'process_evaluation', '2025-03-11', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(29, 'PLUS Project Process Evaluation Workshop', 'The Process Evaluation Team Was in our facility to hold a Workshop', 'secondaire', 'process_evaluation/IMG_0974.jpg', 'Project', 'process_evaluation', '2025-03-11', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(30, 'PLUS Project Process Evaluation Workshop', 'The Process Evaluation Team Was in our facility to hold a Workshop', 'secondaire', 'process_evaluation/IMG_0977.jpg', 'Project', 'process_evaluation', '2025-03-11', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(31, 'PLUS Project Process Evaluation Workshop', 'The Process Evaluation Team Was in our facility to hold a Workshop', 'secondaire', 'process_evaluation/IMG_0978.jpg', 'Project', 'process_evaluation', '2025-03-11', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(32, 'Visit of RBM Vector Control Working Group (VCWG)', 'The RBM Vector Control Working Group visited our Facility', 'secondaire', 'rbm_vcwg/IMG_1430.jpg', 'Visits', 'rbm_vcwg', '2025-03-02', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(33, 'Visit of RBM Vector Control Working Group (VCWG)', 'The RBM Vector Control Working Group visited our Facility', 'secondaire', 'rbm_vcwg/IMG_1450.jpg', 'Visits', 'rbm_vcwg', '2025-03-02', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(34, 'Visit of RBM Vector Control Working Group (VCWG)', 'The RBM Vector Control Working Group visited our Facility', 'secondaire', 'rbm_vcwg/IMG_1460.jpg', 'Visits', 'rbm_vcwg', '2025-03-02', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(35, 'Visit of RBM Vector Control Working Group (VCWG)', 'The RBM Vector Control Working Group visited our Facility', 'secondaire', 'rbm_vcwg/IMG_1501.jpg', 'Visits', 'rbm_vcwg', '2025-03-02', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(36, 'Visit of RBM Vector Control Working Group (VCWG)', 'The RBM Vector Control Working Group visited our Facility', 'secondaire', 'rbm_vcwg/IMG_1502.jpg', 'Visits', 'rbm_vcwg', '2025-03-02', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(37, 'Visit of RBM Vector Control Working Group (VCWG)', 'The RBM Vector Control Working Group visited our Facility', 'principal', 'rbm_vcwg/IMG_1593.jpg', 'Visits', 'rbm_vcwg', '2025-03-02', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(38, 'Visit of RBM Vector Control Working Group (VCWG)', 'The RBM Vector Control Working Group visited our Facility', 'secondaire', 'rbm_vcwg/IMG_1601.jpg', 'Visits', 'rbm_vcwg', '2025-03-02', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(39, 'Visit of RBM Vector Control Working Group (VCWG)', 'The RBM Vector Control Working Group visited our Facility', 'secondaire', 'rbm_vcwg/IMG_1603.jpg', 'Visits', 'rbm_vcwg', '2025-03-02', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(40, 'Visit of RBM Vector Control Working Group (VCWG)', 'The RBM Vector Control Working Group visited our Facility', 'secondaire', 'rbm_vcwg/IMG_1606.jpg', 'Visits', 'rbm_vcwg', '2025-03-02', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(41, 'Visit of RBM Vector Control Working Group (VCWG)', 'The RBM Vector Control Working Group visited our Facility', 'secondaire', 'rbm_vcwg/principal.jpg', 'Visits', 'rbm_vcwg', '2025-03-02', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(42, 'Visit PLUS Project PE Team', 'The PLUS Project Process Evaluation Team visited our Facility', 'principal', 'visit_projet_plus/IMG_1165.jpg', 'Visits', 'visit_projet_plus', '2025-03-13', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(43, 'Visit PLUS Project PE Team', 'The PLUS Project Process Evaluation Team visited our Facility', 'secondaire', 'visit_projet_plus/IMG_1121.jpg', 'Visits', 'visit_projet_plus', '2025-03-13', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(44, 'Visit PLUS Project PE Team', 'The PLUS Project Process Evaluation Team visited our Facility', 'secondaire', 'visit_projet_plus/IMG_1130.jpg', 'Visits', 'visit_projet_plus', '2025-03-13', '2025-04-28 11:25:37', '2025-04-28 11:25:37'),
	(45, 'Visit PLUS Project PE Team', 'The PLUS Project Process Evaluation Team visited our Facility', 'secondaire', 'visit_projet_plus/IMG_1165.jpg', 'Visits', 'visit_projet_plus', '2025-03-13', '2025-04-28 11:25:37', '2025-04-28 11:25:37');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
