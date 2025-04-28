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

-- Listage de la structure de la table projet_airid_africa_db. videos
CREATE TABLE IF NOT EXISTS `videos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_video` text COLLATE utf8mb4_unicode_ci,
  `lien_youtube_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_local_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_video` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table projet_airid_africa_db.videos : ~0 rows (environ)
INSERT INTO `videos` (`id`, `title_video`, `description_video`, `lien_youtube_video`, `nom_local_video`, `date_video`, `created_at`, `updated_at`) VALUES
	(15, 'World Malaria Day 2025', '25 April - World Malaria Day | Theme 2025 : Malaria Ends With Us: Reinvest, Reimagine, Reignite\n                \n                Every year, malaria costs more than 600,000 lives. Yet it is preventable, treatable and eliminable.\n                In 2025, the call is loud:\n                \n                🔁 Reinvest in research, access to care and prevention\n                💡 Reimagine our approaches to adapt to today\'s challenges\n                🤝 Rekindling international collaboration to sustainably eliminate malaria\n                \n                On this World Malaria Day, we are reimagining our capacity to contribute to the development of novel vector control tools for effective malaria control. We are reinvesting in new technologies in our GLP certified facility in Benin and reigniting our partnerships and collaborations to ensure that malaria ends with us.\n                \n                Let’s Reinvest, Reimagine, and Reignite so that Malaria Ends with Us.', 'https://www.youtube.com/embed/t7rgHTOxBHk', '', '2025-04-25', '2025-04-28 09:55:22', '2025-04-28 09:55:22'),
	(16, 'VRBM VCWG members visited our GLP-certified vector control product testing facility at CREC, Cotonou', 'On March 2nd 2025, we received members of the RBM Vector Control Working Group at our GLP-certified Facility in Cotonou, Benin. It was a pleasure to interact with you and to give you a guided tour of our facility and the various types of studies we perform to contribute towards the development of novel vector control products. We have captured this memorable visit in this video. Hope you like it', 'https://www.youtube.com/embed/tgUygE8QfFQ', '', '2025-03-21', '2025-04-28 09:55:22', '2025-04-28 09:55:22'),
	(17, 'Break the Bias, Women and Girls In Science Day : Unpacking the STEM careers : Her voices in Science', 'International Day of Women and Girls in Science | On this International Day of Women and Girls in Science, under the theme “Unpacking STEM Careers: Her Voice in Science”, we celebrate the careers of the incredible women in our team. These are medical entomologists, insectary technicians, laboratory technologists, quality assurance specialists etc committed to fighting vector-borne diseases.', 'https://www.youtube.com/embed/DrPDiILiH4g', '', '2025-02-11', '2025-04-28 09:55:22', '2025-04-28 09:55:22'),
	(18, 'INTERNATIONAL WOMEN\'S DAY 2024 II CREC-LSHTM CELEBRATES WOMEN\'S LEADERSHIP', '#IWD2024: Invest in Women: Accelarate progress. As we celebrate this year’s #InternationalWomenDay, we celebrate the achievements of the #women in our facility and acknowledge the accelerated #progress we have experienced. Thanks to their hard work, professionalism and leadership. We commit ourselves to continue #investing in these very talented professional #women. Happy International Women’s Day!', 'https://www.youtube.com/embed/4INUPiRpKu0', '', '2024-03-08', '2025-04-28 09:55:22', '2025-04-28 09:55:22'),
	(19, 'CREC/LSHTM Year 2023 Recap Video', 'Many thanks to our staff and partners for contributing to our successful year. This video presents highlights of our activities in the past year as we look forward to a 2024 full of achievements and growth. Happy New Year 2024!', 'https://www.youtube.com/embed/PD9xs6hBKJ4', '', '2024-01-23', '2025-04-28 09:55:22', '2025-04-28 09:55:22'),
	(20, 'IVCC Stakeholder Forum 2023 - Presentation of CREC-LSHTM Facility Manager II Dr Corine NGUFOR', 'This is a snapshot of the presentation of our Facility Manager at IVCC Stakeholder Forum 2023 on African Leadership in vector control product evaluation by the GLP-certified CREC/LSHTM facility. To #endmalaria, we must continue to invest in the development of safe and effective vector control products', 'https://www.youtube.com/embed/0CSlA1h982o', '', '2023-10-12', '2025-04-28 09:55:22', '2025-04-28 09:55:22'),
	(21, 'CREC/LSHTM a leader in vector control product testing in Africa', 'We need innovative vector control products to achieve malaria elimination targets. Capacity in vector control product development and evaluation is essential. The CREC/LSHTM Facility has over the years, developed itself as a leader in vector control product testing in Africa. In this video we showcase the infrastructure, services and research skills available at our GLP-certified Facility.', 'https://www.youtube.com/embed/LTrJCQxt2Ls', '', '2022-06-01', '2025-04-28 09:55:22', '2025-04-28 09:55:22'),
	(22, 'CREC/LSHTM Staff Fitness Exercise | Edition 2 | April 2022', 'Ensuring the health and wellness of our staff is essential to the proper functioning of our Facility. Management and staff of CREC/LSHTM embarked on another staff fitness bootcamp which took place recently.', 'https://www.youtube.com/embed/X2LvEXt7Bcw', '', '2022-05-12', '2025-04-28 09:55:22', '2025-04-28 09:55:22'),
	(23, 'Women scientists at CREC/LSHTM | #InternationalWomensDay #breakthebias', 'Women scientists at CREC/LSHTM. Experts in vector control product testing.', 'https://www.youtube.com/embed/I4SW1Jy9MeA', '', '2022-03-08', '2025-04-28 09:55:22', '2025-04-28 09:55:22'),
	(24, 'The Impact of GLP certification on vector control products evaluation - Dr Corine Ngufor', 'This was presented by our lead scientist and facility manager, Dr Corine Ngufor, at the  1st virtual PAMCA Conference & Exhibition, 20-22 September 2021.', 'https://www.youtube.com/embed/bAAgjBttv1s', '', '2021-09-28', '2025-04-28 09:55:22', '2025-04-28 09:55:22'),
	(25, 'World Mosquito Day 2021', 'New vectors control products should also demonstrated efficacy at community level. We perform community trials of new insecticides treated nets and IRS products.', 'https://www.youtube.com/embed/T0HO6rjBWns', '', '2021-08-20', '2025-04-28 09:55:22', '2025-04-28 09:55:22'),
	(26, 'CREC/LSHTM Staff Fitness Bootcamp E01 | April 3, 2021', 'The health and welfare of our staff are essential to the proper functioning of our Facility. Here are photos from the first CREC/LSHTM staff fitness bootcamp which took place on 3 April 2021. Visit www.crec-lshtm.org to learn about our works on #vectorcontrol.', 'https://www.youtube.com/embed/KAWGgdZG0RI', '', '2021-04-07', '2025-04-28 09:55:22', '2025-04-28 09:55:22'),
	(27, 'CREC/LSHTM CAPACITY BUILDING: NET CUTTING', 'Today we share through this short video, the process of cutting net samples for WHO/PQ Phase I laboratory evaluation of LLINs.', 'https://www.youtube.com/embed/tWp_cIwpRVg', '', '2021-03-18', '2025-04-28 09:55:22', '2025-04-28 09:55:22'),
	(28, 'CREC/LSHTM International Women\'s Day: Dr Corine NGUFOR-KALU was interviewed by a Local NGO(Via-me)', 'Our Facility manager @corinengufor was interviewed by a Local NGO (Via-me) about her leadership during this period of COVID-19. Inspiring .', 'https://www.youtube.com/embed/C9_8F541eg4', '', '2021-03-12', '2025-04-28 09:55:22', '2025-04-28 09:55:22');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
