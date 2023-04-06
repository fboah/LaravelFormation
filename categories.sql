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
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Libelle` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `Libelle`, `Description`, `created_at`, `updated_at`) VALUES
(1, 'Annimations', 'Animations pour enfant', '2023-03-31 19:16:31', '2023-03-31 19:16:31'),
(2, 'Horreur', 'Films d\'épouvante', '2023-03-31 19:16:38', '2023-03-31 19:16:38'),
(3, 'Historique', 'Relatif à des faits réels', '2023-03-31 19:16:47', '2023-03-31 19:16:47'),
(4, 'Biopic', 'Basé sur la vie du personnage', '2023-03-31 19:17:06', '2023-03-31 19:17:06'),
(5, 'Dessins annimés', 'Animations pour enfant', '2023-03-31 19:17:21', '2023-03-31 19:17:21'),
(6, 'Zouk', 'Zouk', '2023-03-31 19:17:29', '2023-03-31 19:17:29'),
(7, 'Philosophie', 'Philosophie', '2023-03-31 19:17:50', '2023-03-31 19:17:50'),
(8, 'Politique', 'Politique', '2023-03-31 19:18:01', '2023-03-31 19:18:01'),
(9, 'Soul', 'Soul', '2023-03-31 19:24:49', '2023-03-31 19:24:49'),
(10, 'Roman', 'Roman', '2023-03-31 19:24:58', '2023-03-31 19:24:58'),
(11, 'Variété', 'Variété', '2023-03-31 19:29:28', '2023-03-31 19:29:28'),
(12, 'Reggae', 'Reggae', '2023-03-31 19:29:42', '2023-03-31 19:29:42'),
(13, 'New Age', 'New Age', '2023-04-03 10:44:14', '2023-04-03 10:44:14'),
(14, 'Humour', 'Gags,Humour', '2023-04-03 14:22:28', '2023-04-03 14:22:28');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
