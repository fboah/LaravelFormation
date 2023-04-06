-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 06 avr. 2023 à 17:08
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
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `id` int(11) NOT NULL,
  `Ville` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`id`, `Ville`) VALUES
(1, 'Abobo'),
(2, 'Adjamé'),
(3, 'Anyama'),
(4, 'Koumassi'),
(5, 'Marcory'),
(6, 'Port Bouet'),
(7, 'Treichville'),
(8, 'Yopougon'),
(9, 'Cocody'),
(10, 'Plateaux'),
(11, 'Bingerville'),
(12, 'Bassam'),
(13, 'Bouaké'),
(14, 'San Pedro'),
(15, 'Korogho'),
(16, 'Bouaké'),
(17, 'Man'),
(18, 'Yamoussoukro'),
(19, 'Bondoukou'),
(20, 'Abengourou');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD UNIQUE KEY `idville` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
