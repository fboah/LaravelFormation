-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 06 avr. 2023 à 14:39
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
-- Structure de la table `auteurs`
--

CREATE TABLE `auteurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `DateNaissance` datetime NOT NULL,
  `Telephone` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Genre` int(11) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `auteurs`
--

INSERT INTO `auteurs` (`id`, `Nom`, `Prenom`, `DateNaissance`, `Telephone`, `Email`, `Genre`, `Image`, `created_at`, `updated_at`) VALUES
(1, 'KOUROUMA', 'Ahmadou', '1945-02-12 00:00:00', '111', 'serge@yahoo.fr', 0, '1680289662.jpg', '2023-03-31 19:07:42', '2023-03-31 19:07:42'),
(2, 'HUGO', 'Victor', '1845-04-23 00:00:00', '3456789', 'k.ahmadou@yahoo.fr', 0, '1680289703.jpg', '2023-03-31 19:08:23', '2023-03-31 19:08:23'),
(3, 'DADIE', 'Bernard', '1924-03-02 00:00:00', '111', 'k.ahmadou@yahoo.fr', 0, '1680289740.jpg', '2023-03-31 19:09:01', '2023-03-31 19:09:01'),
(4, 'BILE', 'Serge', '1962-04-27 00:00:00', '123456', 'k.ahmadou@yahoo.fr', 0, '1680781713.jpg', '2023-03-31 19:09:38', '2023-04-06 11:48:33'),
(5, 'WINEHOUSE', 'Amy', '1992-03-01 00:00:00', '46467547984', 'jrhd@rdeyer.fr', 1, '1680289833.jpg', '2023-03-31 19:10:33', '2023-03-31 19:10:33'),
(6, 'LABYLLE', 'Jocelyne', '1983-07-07 00:00:00', 'aaaa', 'k.ahmadou@yahoo.fr', 1, '1680289869.jpg', '2023-03-31 19:11:09', '2023-03-31 19:11:09'),
(7, 'DERSION', 'Sonia', '1975-09-08 00:00:00', '111', 'aaaa@iut.fr', 1, '1680289906.jpg', '2023-03-31 19:11:46', '2023-03-31 19:11:46'),
(8, 'MEIWAY', 'MEIWAY', '1965-09-23 00:00:00', '12345677', 'jrhd@rruyyer.fr', 0, '1680289941.jpg', '2023-03-31 19:12:21', '2023-03-31 19:12:21'),
(9, 'BLONDY', 'Alpha', '1958-01-01 00:00:00', '111', 'serge@yahoo.fr', 0, '1680289971.jpg', '2023-03-31 19:12:51', '2023-03-31 19:12:51'),
(10, 'CESAIRE', 'Aimé', '1913-06-04 00:00:00', '222222', 'jrhd@rruyyer.fr', 0, '1680290002.jpg', '2023-03-31 19:13:22', '2023-04-06 12:14:52'),
(11, 'BITON KOULIBALY', 'Isaie', '1967-08-04 00:00:00', '33333', 'jrhd@rdeyer.fr', 0, '1680290040.jpg', '2023-03-31 19:14:00', '2023-04-06 12:09:32'),
(12, 'MARX', 'Karl', '1875-11-03 00:00:00', '111', 'jrhd@rdeyer.fr', 0, '1680290066.jpg', '2023-03-31 19:14:26', '2023-03-31 19:14:26'),
(13, 'Corneille', 'Corneille', '1982-04-30 00:00:00', '12345677', 'k.ahmadou@yahoo.fr', 0, '1680516444.jpg', '2023-04-03 10:07:24', '2023-04-03 10:07:24'),
(15, 'UB40', 'UB40', '1980-07-03 00:00:00', '12345677', 'serge@yahoo.fr', 0, '1680518353.jpg', '2023-04-03 10:39:13', '2023-04-03 10:39:13'),
(16, 'ENYA', 'ENYA', '1978-01-21 00:00:00', '111', 'jrhd@rruyyer.fr', 1, '1680518635.jpg', '2023-04-03 10:43:55', '2023-04-03 10:43:55'),
(17, 'ZOHORE', 'Lassane', '1980-06-10 00:00:00', '12345677', 'lasszoh@yahoo.fr', 0, '1680531681.jpg', '2023-04-03 14:21:21', '2023-04-03 14:21:21'),
(19, 'DIOME', 'Fatou', '1978-03-12 00:00:00', '444444', 'jrhd@rruyyer.fr', 1, '1680782402.jpg', '2023-04-06 09:29:01', '2023-04-06 12:15:13');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `auteurs`
--
ALTER TABLE `auteurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `auteurs`
--
ALTER TABLE `auteurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
