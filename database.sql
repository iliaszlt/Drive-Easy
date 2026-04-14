-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 07 avr. 2026 à 16:11
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `drive-easy`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `Email` varchar(50) NOT NULL,
  `Prenom` varchar(25) NOT NULL,
  `Nom` varchar(25) NOT NULL,
  `Tel` int(10) NOT NULL,
  `Age` int(2) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `NumEnt` int(11) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `SIRET` int(9) NOT NULL,
  `employes` varchar(15) NOT NULL,
  `id_employes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `libelle` varchar(50) NOT NULL,
  `prix` float NOT NULL,
  `date_location` date NOT NULL,
  `prix_km_supplementaire` float NOT NULL,
  `disponibilite` tinyint(1) NOT NULL,
  `type` varchar(50) NOT NULL,
  `option` varchar(1) NOT NULL,
  `portes` int(1) NOT NULL,
  `marque` varchar(15) NOT NULL,
  `places` int(1) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`libelle`, `prix`, `date_location`, `prix_km_supplementaire`, `disponibilite`, `type`, `option`, `portes`, `marque`, `places`, `id`) VALUES
('Renault Clio 5', 47.5, '0000-00-00', 0.41, 0, 'Citadine', '', 5, 'Renault', 5, 1),
('Peugeot 308', 44.5, '0000-00-00', 0.39, 0, 'Berline', '', 5, 'Peugeot', 5, 2),
('Audi Q3', 54.5, '0000-00-00', 0.67, 0, 'SUV', '', 5, 'Audi', 5, 3),
('BMW Serie 2 gran coupé', 72.5, '0000-00-00', 0.67, 0, 'Berline', '', 5, 'BMW', 5, 4),
('Mercedes-Benz classe C', 82.5, '0000-00-00', 0.84, 0, 'Berline', '', 5, 'Mercedes-Benz', 5, 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Tel` (`Tel`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`NumEnt`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `libelle` (`libelle`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
