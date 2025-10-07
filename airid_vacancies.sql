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

-- Listage de la structure de la table projet_airid_africa_db. airid_vacancies
CREATE TABLE IF NOT EXISTS `airid_vacancies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `job_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `application_deadline` date DEFAULT NULL,
  `application_lunch_date` date DEFAULT NULL,
  `url_page` text COLLATE utf8mb4_unicode_ci,
  `email_apply` text COLLATE utf8mb4_unicode_ci,
  `subject` text COLLATE utf8mb4_unicode_ci,
  `application_file_fr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `application_file_en` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table projet_airid_africa_db.airid_vacancies : ~2 rows (environ)
INSERT INTO `airid_vacancies` (`id`, `job_title`, `contract_type`, `location`, `application_deadline`, `application_lunch_date`, `url_page`, `email_apply`, `subject`, `application_file_fr`, `application_file_en`, `created_at`, `updated_at`) VALUES
	(1, 'AVIS DE RECRUTEMENT DE CHIMISTE ANALYTIQUE', 'Temps plein, 12 mois initialement (renouvelable selon la performance et le financement)', 'Cotonou (Benin)', '2025-10-15', '2025-09-29', '/vacancies-chimiste-analytique', 'admin@airid-africa.com', 'Candidature – Chimiste analytique', 'Job_Advertisement_laboratory_scientist_FR.pdf', 'Job_Advertisement_laboratory scientist_en.pdf', NULL, NULL),
	(2, 'AVIS DE RECRUTEMENT D’AGENTS ENQUÊTEURS', '5 à 6 semaines à compter du 27 octobre 2025', 'Zones sanitaires de Tchaourou et de Dassa-Glazoué', '2025-10-10', '2025-09-30', '/vacancies-agents-terrain-gavi', 'recrutementgavisiri@gmail.com', 'GAVI-SIRI_ENQUETEUR', 'AVIS DE RECRUTEMENT DES AGENTS ENQUETEURS pour le Projet GAVI.pdf', 'AVIS DE RECRUTEMENT DES AGENTS ENQUETEURS pour le Projet GAVI.pdf', NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
