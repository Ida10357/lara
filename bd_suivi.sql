-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 05:16 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_suivi`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `auditeur`
-- (See below for the actual view)
--
CREATE TABLE `auditeur` (
`id` bigint(20) unsigned
,`nom` varchar(30)
,`prenom` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `auditeurs`
--

CREATE TABLE `auditeurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auditeurs`
--

INSERT INTO `auditeurs` (`id`, `nom`, `prenom`, `type`, `institution_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'AKAKPO', 'Koffi', 'interne', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auditeur_missions`
--

CREATE TABLE `auditeur_missions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auditeur_id` bigint(20) UNSIGNED NOT NULL,
  `mission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `directions`
--

CREATE TABLE `directions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `directions`
--

INSERT INTO `directions` (`id`, `code`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'DSI', 'Direction des Systèmes d\'informations', NULL, NULL),
(2, 'DRH', 'Direction des Ressources Humaines', NULL, NULL),
(4, 'DJ', 'Département juridique', '2021-07-06 16:29:07', '2021-07-06 16:29:07');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fonctionnalites`
--

CREATE TABLE `fonctionnalites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `intitule` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fonctionnalites`
--

INSERT INTO `fonctionnalites` (`id`, `intitule`) VALUES
(1, 'ajout utilisateur'),
(2, 'modification utilisateur'),
(3, 'suppression utilisateur'),
(4, 'ajout mission'),
(5, 'modification mission'),
(6, 'suppression mission'),
(7, 'ajout recommandation'),
(8, 'modification recommandation'),
(9, 'suppression recommandation');

-- --------------------------------------------------------

--
-- Table structure for table `groupes`
--

CREATE TABLE `groupes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groupes`
--

INSERT INTO `groupes` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'auditeur', NULL, NULL),
(2, 'administrateur', NULL, NULL),
(3, 'directeur', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groupe_fonctionnalites`
--

CREATE TABLE `groupe_fonctionnalites` (
  `id_groupe` bigint(20) UNSIGNED NOT NULL,
  `id_fonctionnalites` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groupe_fonctionnalites`
--

INSERT INTO `groupe_fonctionnalites` (`id_groupe`, `id_fonctionnalites`, `created_at`, `updated_at`, `id`) VALUES
(2, 4, '2021-07-02 10:21:00', '2021-07-02 10:21:00', 308),
(1, 4, '2021-07-02 16:22:15', '2021-07-02 16:22:15', 320),
(1, 5, '2021-07-02 16:22:17', '2021-07-02 16:22:17', 321),
(1, 6, '2021-07-02 16:22:19', '2021-07-02 16:22:19', 322),
(2, 1, '2021-07-02 16:22:52', '2021-07-02 16:22:52', 327),
(2, 2, '2021-07-02 16:22:56', '2021-07-02 16:22:56', 328),
(2, 3, '2021-07-02 16:23:02', '2021-07-02 16:23:02', 329),
(2, 6, '2021-07-02 16:23:09', '2021-07-02 16:23:09', 330),
(3, 8, '2021-07-02 16:24:31', '2021-07-02 16:24:31', 331),
(31, 0, '2021-07-05 09:06:53', '2021-07-05 09:06:53', 347),
(2, 5, '2021-07-05 10:21:24', '2021-07-05 10:21:24', 350),
(1, 7, '2021-07-05 10:34:31', '2021-07-05 10:34:31', 352),
(1, 8, '2021-07-12 08:52:22', '2021-07-12 08:52:22', 354),
(1, 9, '2021-07-12 08:52:27', '2021-07-12 08:52:27', 355),
(2, 7, '2021-07-12 10:28:48', '2021-07-12 10:28:48', 356),
(2, 9, '2021-07-12 14:44:40', '2021-07-12 14:44:40', 357),
(2, 8, '2021-07-19 08:46:38', '2021-07-19 08:46:38', 358);

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

CREATE TABLE `institutions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_18_160209_create_groupes_table', 1),
(5, '2021_05_18_161448_create_institutions_table', 1),
(6, '2021_05_18_161622_create_auditeurs_table', 1),
(7, '2021_05_18_161728_create_utilisateurs_table', 1),
(8, '2021_05_18_161806_create_directions_table', 1),
(9, '2021_05_18_161849_create_missions_table', 1),
(10, '2021_05_18_161920_create_recommandations_table', 1),
(11, '2021_05_19_084431_create_auditeur_missions_table', 1),
(12, '2021_05_19_112742_create_user_foreigns_table', 1),
(13, '2021_05_19_112943_create_auditeur_foreigns_table', 1),
(14, '2021_05_19_113125_create_mission_foreigns_table', 1),
(15, '2021_05_19_113230_create_recommandation_foreigns_table', 1),
(16, '2021_05_19_113323_create_auditeur_mission_foreigns_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `missions`
--

CREATE TABLE `missions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `intitule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `direction_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `missions`
--

INSERT INTO `missions` (`id`, `intitule`, `debut`, `fin`, `direction_id`, `created_at`, `updated_at`) VALUES
(1, 'Mission audit 2021 sur la DSI', '2021-03-18', '2021-06-30', 1, NULL, '2021-07-12 14:50:52'),
(8, 'Mission audit 2021 DRH', '2021-07-19', '2021-07-30', 2, '2021-07-19 11:05:24', '2021-07-19 11:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('idatoki444@gmail.com', '$2y$10$3vHQw9bxn6w2b8/EhSuwMOS0Hpxor1uewUtI46bvx6tAV1OsLsLqC', '2021-06-10 16:34:35');

-- --------------------------------------------------------

--
-- Table structure for table `recommandations`
--

CREATE TABLE `recommandations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `echeance` date NOT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `auditeur_id` bigint(20) UNSIGNED NOT NULL,
  `Causes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recommandations`
--

INSERT INTO `recommandations` (`id`, `libelle`, `echeance`, `statut`, `mission_id`, `created_at`, `updated_at`, `auditeur_id`, `Causes`) VALUES
(3, 'Achat de nouveaux materiels informatiques', '2021-06-09', 'ok', 1, NULL, '2021-06-09 17:25:23', 8, NULL),
(11, 'pré-installation de tous les nouveaux machines', '2021-06-25', 'ok', 1, '2021-06-10 11:01:04', '2021-07-08 15:11:52', 8, NULL),
(17, 'mise à jours des outils informatiques', '2021-07-21', 'non', 1, '2021-07-05 08:19:15', '2021-07-13 08:14:33', 8, NULL),
(47, 'Les serveurs backup et production de l\'application SWIFT FTP sont hébergés sur le même site.', '2021-07-14', 'non', 1, '2021-07-12 15:05:16', '2021-07-12 15:05:16', 1, 'A envisager sur le site backup'),
(48, 'sdddddddddd', '2021-07-14', 'ok', 1, NULL, NULL, 0, 'rrrrr'),
(49, 'reeeeeee', '2021-07-13', 'ok', 1, NULL, NULL, 4, 'eeeeeeee'),
(50, 'Effectif du personnel inssuffisant', '2021-07-22', 'ok', 8, '2021-07-19 11:06:36', '2021-07-19 11:08:47', 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `groupe_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direction_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `groupe_id`, `remember_token`, `created_at`, `updated_at`, `nom`, `prenom`, `direction_id`) VALUES
(1, 'Idat', 'idatoki444@gmail.com', NULL, '$2y$10$P9gOHsPnweY2dBCSRgRBPOozqBRp010F3o7Ffj/fE7edkJIbhY7rS', 2, NULL, '2021-05-19 15:40:40', '2021-05-19 18:05:11', 'TOKI', 'Ida', NULL),
(6, NULL, 'liph@gmail.com', NULL, '$2y$10$vf1BPtdTVxWBsTtUJRq6xO9uMqM7dauqbp/XXxLwsYmwNgGQJ6Oxy', 3, NULL, '2021-06-07 17:36:06', '2021-06-07 17:36:06', 'FOLY', 'Jacques Philippe', 1),
(8, NULL, 'bakoubolo@gmail.com', NULL, '$2y$10$vHO/2vi7k1GXqJygbCgW5ObpLMXK1FDMpPPGWqVP7p0kdvyyy/0wG', 1, NULL, '2021-06-11 15:53:58', '2021-06-11 15:53:58', 'BAKOUBOLO', 'Brinda', NULL),
(9, NULL, 'awa@gmail.com', NULL, '$2y$10$TbQ5F2Z7Vd71lS62OUJ2juc0fMWmtH5ZXGnaIShjqC.RPpjVI7KCG', 3, NULL, '2021-07-02 14:59:55', '2021-07-02 14:59:55', 'DRABO', 'Awa', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_fonctionnalites`
--

CREATE TABLE `user_fonctionnalites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `mission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_fonctionnalites`
--

INSERT INTO `user_fonctionnalites` (`id`, `user_id`, `mission_id`, `created_at`, `updated_at`) VALUES
(1, 8, 1, '2021-07-02 16:15:07', '2021-07-02 16:15:07'),
(7, 8, 8, '2021-07-19 11:05:24', '2021-07-19 11:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure for view `auditeur`
--
DROP TABLE IF EXISTS `auditeur`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `auditeur`  AS SELECT `users`.`id` AS `id`, `users`.`nom` AS `nom`, `users`.`prenom` AS `prenom` FROM `users` WHERE `users`.`groupe_id` = 1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auditeurs`
--
ALTER TABLE `auditeurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auditeurs_institution_id_foreign` (`institution_id`),
  ADD KEY `auditeurs_user_id_foreign` (`user_id`);

--
-- Indexes for table `auditeur_missions`
--
ALTER TABLE `auditeur_missions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auditeur_missions_mission_id_foreign` (`mission_id`),
  ADD KEY `auditeur_missions_auditeur_id_foreign` (`auditeur_id`);

--
-- Indexes for table `directions`
--
ALTER TABLE `directions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fonctionnalites`
--
ALTER TABLE `fonctionnalites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupes`
--
ALTER TABLE `groupes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupe_fonctionnalites`
--
ALTER TABLE `groupe_fonctionnalites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_groupe` (`id_groupe`,`id_fonctionnalites`);

--
-- Indexes for table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `missions_direction_id_foreign` (`direction_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `recommandations`
--
ALTER TABLE `recommandations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recommandations_mission_id_foreign` (`mission_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_groupe_id_foreign` (`groupe_id`),
  ADD KEY `users_direction_id_foreign` (`direction_id`);

--
-- Indexes for table `user_fonctionnalites`
--
ALTER TABLE `user_fonctionnalites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`mission_id`),
  ADD KEY `contraint_mission` (`mission_id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auditeurs`
--
ALTER TABLE `auditeurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auditeur_missions`
--
ALTER TABLE `auditeur_missions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `directions`
--
ALTER TABLE `directions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fonctionnalites`
--
ALTER TABLE `fonctionnalites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `groupe_fonctionnalites`
--
ALTER TABLE `groupe_fonctionnalites`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=359;

--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `missions`
--
ALTER TABLE `missions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `recommandations`
--
ALTER TABLE `recommandations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_fonctionnalites`
--
ALTER TABLE `user_fonctionnalites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auditeurs`
--
ALTER TABLE `auditeurs`
  ADD CONSTRAINT `auditeurs_institution_id_foreign` FOREIGN KEY (`institution_id`) REFERENCES `institutions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auditeurs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auditeur_missions`
--
ALTER TABLE `auditeur_missions`
  ADD CONSTRAINT `auditeur_missions_auditeur_id_foreign` FOREIGN KEY (`auditeur_id`) REFERENCES `auditeurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auditeur_missions_mission_id_foreign` FOREIGN KEY (`mission_id`) REFERENCES `missions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `missions`
--
ALTER TABLE `missions`
  ADD CONSTRAINT `missions_direction_id_foreign` FOREIGN KEY (`direction_id`) REFERENCES `directions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recommandations`
--
ALTER TABLE `recommandations`
  ADD CONSTRAINT `recommandations_mission_id_foreign` FOREIGN KEY (`mission_id`) REFERENCES `missions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_direction_id_foreign` FOREIGN KEY (`direction_id`) REFERENCES `directions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_groupe_id_foreign` FOREIGN KEY (`groupe_id`) REFERENCES `groupes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_fonctionnalites`
--
ALTER TABLE `user_fonctionnalites`
  ADD CONSTRAINT `contraint_mission` FOREIGN KEY (`mission_id`) REFERENCES `missions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contraint_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
