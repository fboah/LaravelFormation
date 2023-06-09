-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 06 avr. 2023 à 14:40
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `laravel`
--

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Titre` varchar(255) NOT NULL,
  `IdCategorie` int(11) NOT NULL,
  `DateParution` datetime NOT NULL,
  `IdAuteur` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `Titre`, `IdCategorie`, `DateParution`, `IdAuteur`, `created_at`, `updated_at`) VALUES
(1, 'Manifeste du parti communiste', 8, '1906-07-21 00:00:00', 12, '2023-03-31 19:18:49', '2023-03-31 19:18:49'),
(2, 'Prince Aniaba', 3, '2023-03-28 00:00:00', 4, '2023-03-31 19:21:55', '2023-03-31 19:21:55'),
(3, 'Et si Dieu n\'aimait pas les noirs', 3, '2019-08-16 00:00:00', 4, '2023-03-31 19:22:42', '2023-03-31 19:22:42'),
(4, 'Natirel', 6, '1998-09-02 00:00:00', 7, '2023-03-31 19:23:37', '2023-03-31 19:23:37'),
(5, 'Ah les Hommes!!', 10, '1996-05-22 00:00:00', 11, '2023-03-31 19:25:41', '2023-03-31 19:25:41'),
(6, 'Ah les Femmes!!', 10, '2012-11-22 00:00:00', 11, '2023-03-31 19:26:13', '2023-03-31 19:26:13'),
(7, 'On jou', 6, '2000-05-14 00:00:00', 7, '2023-03-31 19:26:41', '2023-03-31 19:26:41'),
(8, 'Ma petite Lumière', 6, '2007-10-31 00:00:00', 6, '2023-03-31 19:27:17', '2023-03-31 19:27:17'),
(9, 'Cahier d\'un retour au pays natal', 10, '1956-04-11 00:00:00', 10, '2023-03-31 19:28:05', '2023-03-31 19:28:05'),
(10, 'Noirs dans les camps nazis', 3, '2009-03-05 00:00:00', 4, '2023-03-31 19:28:37', '2023-03-31 19:28:37'),
(11, 'Golgotha', 11, '1997-07-01 00:00:00', 8, '2023-03-31 19:30:11', '2023-03-31 19:30:11'),
(12, 'Love is a losing game', 9, '2013-07-04 00:00:00', 5, '2023-03-31 19:30:59', '2023-03-31 19:30:59'),
(13, 'J\'ai déposé les clés', 6, '2017-04-23 00:00:00', 6, '2023-03-31 19:31:27', '2023-03-31 19:31:27'),
(14, 'Allah n\'est pas obligé', 10, '2007-04-23 00:00:00', 1, '2023-03-31 19:32:23', '2023-03-31 19:32:23'),
(15, 'Les Misérables', 10, '1889-11-07 00:00:00', 2, '2023-03-31 19:32:55', '2023-03-31 19:32:55'),
(16, 'Sasuke', 3, '2022-01-30 00:00:00', 4, '2023-03-31 19:33:49', '2023-03-31 19:33:49'),
(17, 'Kimbe', 6, '2008-03-22 00:00:00', 7, '2023-03-31 19:35:59', '2023-03-31 19:35:59'),
(18, 'Les soleils des indépendances', 10, '1995-09-12 00:00:00', 1, '2023-03-31 19:36:45', '2023-03-31 19:36:45'),
(19, 'Tes vacances avec moi', 6, '2021-06-21 00:00:00', 7, '2023-03-31 19:42:50', '2023-03-31 19:42:50'),
(20, 'Appolo 95', 11, '1995-03-24 00:00:00', 8, '2023-03-31 19:44:03', '2023-03-31 19:44:03'),
(21, 'Brigadier Sabari', 12, '1988-04-12 00:00:00', 9, '2023-03-31 20:02:52', '2023-03-31 20:02:52'),
(22, 'Mes années Houphouet', 10, '2021-05-09 00:00:00', 4, '2023-04-01 15:48:11', '2023-04-01 15:49:58'),
(23, 'Just Friends', 9, '2009-04-13 00:00:00', 5, '2023-04-01 15:50:53', '2023-04-01 15:50:53'),
(24, 'Climbié', 10, '1987-07-23 00:00:00', 3, '2023-04-01 15:57:04', '2023-04-01 15:57:04'),
(25, 'Parce qu\'on vient de loin', 11, '2009-03-12 00:00:00', 13, '2023-04-03 10:08:01', '2023-04-03 10:08:01'),
(26, 'Le Bon Dieu est une femme', 11, '2005-04-13 00:00:00', 13, '2023-04-03 10:08:23', '2023-04-03 10:08:23'),
(27, 'Le ventre de l\'Atlantique', 10, '2007-07-31 00:00:00', 6, '2023-04-03 10:23:08', '2023-04-03 15:58:53'),
(28, 'Come Back Darling', 12, '1998-11-11 00:00:00', 15, '2023-04-03 10:40:21', '2023-04-03 10:40:21'),
(29, 'Kingston Town', 12, '1989-11-21 00:00:00', 15, '2023-04-03 10:40:49', '2023-04-03 10:40:49'),
(30, 'Red red wine', 12, '2009-01-23 00:00:00', 15, '2023-04-03 10:41:08', '2023-04-03 10:41:08'),
(31, 'Can\'t Help Falling in Love', 12, '1999-10-03 00:00:00', 15, '2023-04-03 10:42:33', '2023-04-03 10:42:33'),
(32, 'How can I keep it from singing', 13, '2009-12-12 00:00:00', 16, '2023-04-03 10:44:36', '2023-04-03 10:44:36'),
(33, 'Storms in Africa', 13, '2002-03-21 00:00:00', 16, '2023-04-03 10:45:24', '2023-04-03 10:45:24'),
(34, 'Song of Sandman', 13, '1997-02-11 00:00:00', 16, '2023-04-03 10:45:54', '2023-04-03 10:45:54'),
(35, 'Flora\'s Secret', 13, '1989-03-22 00:00:00', 16, '2023-04-03 10:46:26', '2023-04-03 10:46:26'),
(36, 'The Magic of the Night', 13, '2007-01-01 00:00:00', 16, '2023-04-03 10:46:49', '2023-04-03 10:46:49'),
(37, 'The First of Autumn', 13, '2007-09-07 00:00:00', 16, '2023-04-03 10:47:52', '2023-04-03 10:49:32'),
(38, 'One by One', 13, '1985-05-31 00:00:00', 16, '2023-04-03 10:48:22', '2023-04-03 10:48:22'),
(39, 'China Roses', 13, '2017-06-23 00:00:00', 16, '2023-04-03 10:48:52', '2023-04-03 10:48:52'),
(40, 'Eternity', 12, '1988-03-12 00:00:00', 9, '2023-04-03 11:17:21', '2023-04-03 11:17:21'),
(41, 'Mystic Power', 12, '2020-09-08 00:00:00', 9, '2023-04-03 11:17:47', '2023-04-03 11:17:47'),
(42, 'Human Race', 12, '1994-06-24 00:00:00', 9, '2023-04-03 11:38:31', '2023-04-03 11:38:31'),
(43, 'Pilgrim', 13, '2008-03-11 00:00:00', 16, '2023-04-03 11:40:33', '2023-04-03 11:40:33'),
(44, 'Once you had gold', 13, '2001-02-12 00:00:00', 16, '2023-04-03 11:40:54', '2023-04-03 11:40:54'),
(45, 'Positive Energy', 12, '2015-06-12 00:00:00', 9, '2023-04-03 11:51:22', '2023-04-03 11:51:22'),
(46, 'Un africain à Paris', 10, '1959-05-31 00:00:00', 3, '2023-04-03 11:52:39', '2023-04-03 11:52:39'),
(47, 'Le pagne noir', 10, '1955-06-12 00:00:00', 3, '2023-04-03 11:53:02', '2023-04-03 11:53:02'),
(48, 'La voix dans le vent', 1, '1970-12-22 00:00:00', 4, '2023-04-03 11:53:32', '2023-04-03 11:53:32'),
(49, 'Gbich', 14, '1999-03-22 00:00:00', 17, '2023-04-03 14:22:51', '2023-04-03 14:22:51'),
(50, 'Le Capital', 8, '1867-02-09 00:00:00', 12, '2023-04-03 14:34:52', '2023-04-03 14:34:52');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
