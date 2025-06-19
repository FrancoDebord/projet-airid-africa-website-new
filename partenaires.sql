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

-- Listage de la structure de la table projet_airid_africa_db. airid_partenaires
CREATE TABLE IF NOT EXISTS `airid_partenaires` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom_partenaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_long_partenaire` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_partenaire` text COLLATE utf8mb4_unicode_ci,
  `logo_partenaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_web` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_partenaire` enum('funding_partner','industry_partner','accreditation_partner','Work partner') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'industry_partner',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table projet_airid_africa_db.airid_partenaires : ~23 rows (environ)
INSERT INTO `airid_partenaires` (`id`, `nom_partenaire`, `nom_long_partenaire`, `description_partenaire`, `logo_partenaire`, `site_web`, `linkedin`, `type_partenaire`, `created_at`, `updated_at`) VALUES
	(5, 'BASF', 'BASF', '', 'BASF.png', NULL, NULL, 'industry_partner', '2023-12-26 12:10:58', '2023-12-26 12:10:58'),
	(6, 'BAYER', '', '', 'BAYER.png', NULL, NULL, 'industry_partner', '2023-12-26 12:10:58', '2023-12-26 12:10:58'),
	(7, 'SYNGENTA', '', '', 'SYNGENTA.png', NULL, NULL, 'industry_partner', '2023-12-26 12:10:58', '2023-12-26 12:10:58'),
	(8, 'WHO', '', '', 'WHO.png', NULL, NULL, 'funding_partner', '2023-12-26 12:10:58', '2023-12-26 12:10:58'),
	(9, 'SANAS', '', '', 'sanas4.png', NULL, NULL, 'accreditation_partner', '2023-12-26 12:10:58', '2023-12-26 12:10:58'),
	(10, 'DCT', '', 'Diseases Control Technologies', 'DCT.png', NULL, NULL, 'industry_partner', '2023-12-26 12:10:58', '2023-12-26 12:10:58'),
	(11, 'IVCC', '', 'Combatting Insect Borne Diseases', 'ivcc.png', NULL, NULL, 'funding_partner', '2023-12-26 12:10:58', '2023-12-26 12:10:58'),
	(12, 'MITSUI', 'MITSUI Chemicals', '', 'MITSUI.png', NULL, NULL, 'industry_partner', '2023-12-26 12:10:58', '2023-12-26 12:10:58'),
	(13, 'New Nets', '', '', 'new_nets_logo.png', NULL, NULL, 'industry_partner', '2023-12-26 12:10:58', '2023-12-26 12:10:58'),
	(14, 'PAM', '', '', 'pam.png', NULL, NULL, 'industry_partner', '2023-12-26 12:10:58', '2023-12-26 12:10:58'),
	(15, 'LSHTM', '', '', 'lshtm.png', NULL, NULL, 'funding_partner', '2023-12-26 12:10:58', '2023-12-26 12:10:58'),
	(16, 'IVCC', '', 'Innovative Vector Control Consortium', 'ivcc.png', 'https://www.ivcc.com/', 'https://www.linkedin.com/company/ivcc-innovative-vector-control-/posts/?feedView=all', 'funding_partner', NULL, NULL),
	(17, 'CREC', 'Centre de Recherche Entomologique de Cotonou)', NULL, 'crec_logo.png', 'https://crec.bj/', NULL, 'Work partner', NULL, NULL),
	(18, 'PAMVERC-BENIN', NULL, NULL, 'PAMVERC-LOGO.png', 'https://www.crec-lshtm.org/index.php/about/description_pamverc', 'https://www.linkedin.com/company/pamverc/posts/?feedView=all', 'Work partner', NULL, NULL),
	(19, 'SANAS', NULL, NULL, 'sanas4.png', 'https://www.sanas.co.za/Pages/index.aspx', 'https://www.linkedin.com/company/south-african-national-accreditation-system-sanas-/', 'industry_partner', NULL, NULL),
	(20, 'SUMITOMO', NULL, NULL, 'SUMITO.png', 'https://www.sumitomo-chem.co.jp/english/', 'https://www.linkedin.com/company/sumitomo-chemical/', 'industry_partner', NULL, NULL),
	(21, 'VESTERGAARD', NULL, NULL, 'vestergaard_logo.jpeg', 'https://vestergaardcompany.com/', 'https://www.linkedin.com/company/vestergaard/', 'industry_partner', NULL, NULL),
	(22, 'GAVI', 'GAVI, The Caccine Alliance', NULL, 'gavi_logo.jpeg', 'https://www.gavi.org/fr', 'https://www.linkedin.com/company/gavi/', 'industry_partner', NULL, NULL),
	(23, 'EVI', 'European Vaccine Initiative', NULL, 'evi.jpeg', 'https://www.euvaccine.eu/', 'https://www.linkedin.com/company/european-vaccine-initiative/posts/?feedView=all', 'industry_partner', NULL, NULL),
	(24, 'Global Fund', 'Global Fund', NULL, 'the_global_fund_logo.jpeg', 'https://www.theglobalfund.org/en/', 'https://www.linkedin.com/company/the-global-fund/', 'industry_partner', NULL, NULL),
	(25, 'Gates Foundation', 'Gates Foundation', NULL, 'bill__melinda_gates_foundation_logo.jpeg', 'https://www.gatesfoundation.org/', 'https://www.linkedin.com/company/gates-foundation/', 'industry_partner', NULL, NULL),
	(26, 'UNITAID', NULL, NULL, 'unitaid_logo.jpeg', 'https://unitaid.org/fr/', 'https://www.linkedin.com/company/unitaid/', 'industry_partner', NULL, NULL),
	(27, 'Swiss TPH', 'Swiss Tropical and Public Health Institute', NULL, 'swiss_tph.jpeg', 'https://www.swisstph.ch/en/', 'https://www.linkedin.com/school/swiss-tropical-and-public-health-institute/', 'industry_partner', NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
