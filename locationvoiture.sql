-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 09 nov. 2023 à 16:22
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `locationvoiture`
--

-- --------------------------------------------------------

--
-- Structure de la table `agences`
--

DROP TABLE IF EXISTS `agences`;
CREATE TABLE IF NOT EXISTS `agences` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addresse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fix` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chiffreAffaire` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `agences`
--

INSERT INTO `agences` (`id`, `nom`, `addresse`, `tel`, `fix`, `chiffreAffaire`) VALUES
(1, 'Maroc Cars', 'BD Al quds, Casablanca', '06555555', '052222', 250000);

-- --------------------------------------------------------

--
-- Structure de la table `calendriers`
--

DROP TABLE IF EXISTS `calendriers`;
CREATE TABLE IF NOT EXISTS `calendriers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mois` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `calendriers`
--

INSERT INTO `calendriers` (`id`, `mois`, `year`) VALUES
(1, 'janvier', 2023),
(2, 'fevrier', 2023),
(3, 'mars', 2023),
(4, 'avril', 2023),
(5, 'mai', 2023),
(6, 'juin', 2023),
(7, 'juillet', 2023),
(8, 'janvier', 2021);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `clients_id_user_foreign` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `tel`, `permis`, `id_user`) VALUES
(2, '0666666', '/storage/img/1.jpg', 9),
(5, '0682265185', '/storage/img/permis1699459199.webp', 12);

-- --------------------------------------------------------

--
-- Structure de la table `etat_reservations`
--

DROP TABLE IF EXISTS `etat_reservations`;
CREATE TABLE IF NOT EXISTS `etat_reservations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `etat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `etatreservations_etat_unique` (`etat`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etat_reservations`
--

INSERT INTO `etat_reservations` (`id`, `etat`) VALUES
(1, 'En cours'),
(2, 'Annulees'),
(3, 'En attente');

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

DROP TABLE IF EXISTS `marques`;
CREATE TABLE IF NOT EXISTS `marques` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `marque` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `marques_marque_unique` (`marque`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`id`, `marque`) VALUES
(1, 'Renault'),
(2, 'Dacia');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2023_11_04_130151_agence_migration', 1),
(3, '2023_11_04_130311_voiture_migration', 1),
(4, '2023_11_04_130420_client_migration', 1),
(5, '2023_11_04_130449_reservation_migration', 1),
(6, '2023_11_04_130513_calendrier_migration', 1),
(7, '2023_11_04_130908_marque_migration', 1),
(8, '2023_11_04_131005_model_voiture_migration', 1),
(9, '2023_11_04_132945_etat_migration', 1),
(10, '2023_11_04_195126_create_roles_table', 1),
(11, '2023_11_06_221951_id_user_to_client', 2),
(12, '2023_11_06_223930_remove_columns_from_clients_table', 3),
(13, '2023_11_07_230515_add_year_column_to_calendriers', 4),
(15, '2023_11_08_142109_add_client_id', 5);

-- --------------------------------------------------------

--
-- Structure de la table `model_voitures`
--

DROP TABLE IF EXISTS `model_voitures`;
CREATE TABLE IF NOT EXISTS `model_voitures` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `model_voiture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marque` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `model_voitures_model_voiture_unique` (`model_voiture`),
  KEY `model_voitures_marque_foreign` (`marque`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_voitures`
--

INSERT INTO `model_voitures` (`id`, `model_voiture`, `marque`) VALUES
(1, 'Clio4', 1),
(2, 'Logan', 2),
(3, 'Megane', 1),
(4, 'Sandero', 2),
(5, 'Duster', 2);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date_de_creation` datetime NOT NULL,
  `date_debut` datetime DEFAULT NULL,
  `date_fin` datetime DEFAULT NULL,
  `id_etat` int(11) NOT NULL,
  `cin` int(11) NOT NULL,
  `voiture` int(11) NOT NULL,
  `idCalendrier` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reservations_cin_foreign` (`cin`),
  KEY `reservations_voiture_foreign` (`voiture`),
  KEY `reservations_idetat_foreign` (`id_etat`),
  KEY `reservations_idcalendrier_foreign` (`idCalendrier`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `date_de_creation`, `date_debut`, `date_fin`, `id_etat`, `cin`, `voiture`, `idCalendrier`) VALUES
(17, '2023-11-09 16:00:16', '2023-11-08 00:00:00', '2023-11-18 00:00:00', 1, 5, 20, 8),
(16, '2023-11-09 15:32:09', NULL, NULL, 3, 5, 1, 8),
(15, '2023-11-09 15:26:02', NULL, NULL, 3, 5, 1, 8),
(14, '2023-11-09 15:10:22', NULL, NULL, 2, 5, 1, 8),
(13, '2023-11-09 14:47:05', '2023-11-03 15:47:18', NULL, 2, 5, 3, 8),
(11, '2023-11-09 14:43:02', '2023-11-08 00:00:00', '2023-11-10 15:43:30', 1, 2, 2, 8),
(12, '2023-11-09 14:46:17', NULL, NULL, 2, 5, 1, 8);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'normal_client', NULL, NULL),
(3, 'commercial', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_foreign` (`role`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `client_id`) VALUES
(1, 'Youness AIT HADDOU', 'youness.aithaddou@usms.ac.ma', '$2y$10$48nvCd86XzubBhBiuCQkJeDJEhQguBQfS7HK/w7kYJv2aElvySmPa', 1, 'ighKJxmXCoVceoCJh9EGKotG3bsunJtlVsIPEg8sfVv9ERNJQQORbiUenrSn', '2023-11-05 14:52:26', '2023-11-07 21:03:13', NULL),
(9, 'jawad saih', 'nessyou.aithaddou@gmail.comp', '$2y$10$4/dm9EHNCtMsXLgsYDLCt.axZjDAHRjtDw5f62xqxbOd4znVB4SPK', 2, 'XZCIXrapkrjh4HM9cX2JRK0kTWMCeglSfXLwfI8ptIhW52ZtD15KidtuPZYC', '2023-11-07 14:22:20', '2023-11-07 15:00:52', 2),
(5, 'Ibrahim Majdoub', 'yougi09@hotmail.com', '$2y$10$G.GXVQBIcd9pXjPmI69JL.DrEW0VRViuhG5Gpn19ZvFuP.ggdvrvS', 1, 'xwPaQrSE8VZin8hmLIRSXKoDsTnouRquLpv0zVPIRw3PUFKBUv7Ybjs9OKl7', '2023-11-07 13:51:05', '2023-11-08 12:45:04', NULL),
(10, 'Comercial', 'hh1@hh.com', '$2y$10$2bIVK66DnaC92AIJShgX2.UY8iMUCR4dbA8ZPjHcbPiLDPL/qzIPi', 3, 'bD0r8AT8DA4ZhcKOuIjA3rOf5l9tz0KIeOp4NDmkCyICPBQfnCRPZTBzdM2i', '2023-11-08 13:29:25', '2023-11-08 13:29:25', NULL),
(12, 'cda heroc', 'nessyou.aithaddou@gmail.com4', '$2y$10$HKzD.z3AAv4aKVc5T3E37.u1KbtIi3KPuKj7n9K0.acQnIIbf1eq2', 2, 'mZZJEB2MO5vx5tAeJeH5BlMp9zEZ4RERpWLOWySe56wv5NLJVv5rD7M6QO2Y', '2023-11-08 15:00:00', '2023-11-08 15:00:00', 5);

-- --------------------------------------------------------

--
-- Structure de la table `voitures`
--

DROP TABLE IF EXISTS `voitures`;
CREATE TABLE IF NOT EXISTS `voitures` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date_mise_en_service` datetime NOT NULL,
  `prix` double NOT NULL,
  `model` int(11) NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_agence` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `voitures_model_foreign` (`model`),
  KEY `voitures_id_agence_foreign` (`id_agence`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `voitures`
--

INSERT INTO `voitures` (`id`, `date_mise_en_service`, `prix`, `model`, `images`, `main_image`, `id_agence`) VALUES
(1, '2023-11-05 15:54:34', 256, 1, '/storage/img/1.png,/storage/img/2.png,/storage/img/3.png', '/storage/img/1.png', 1),
(2, '2023-11-05 16:00:40', 300, 2, '/storage/img/4.png', '/storage/img/4.png', 1),
(3, '2023-11-05 16:13:14', 256, 3, '/storage/img/5.png', '/storage/img/5.png', 1),
(4, '2023-11-05 16:15:17', 250, 4, '/storage/img/6.png', '/storage/img/6.png', 1),
(20, '2023-11-07 00:00:00', 240, 5, '/storage/img/main_image_1699307917.webp', '/storage/img/main_image_1699307917.webp', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
