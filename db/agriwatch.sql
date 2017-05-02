-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 02 Mai 2017 à 16:56
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `agriwatch`
--
CREATE DATABASE IF NOT EXISTS `agriwatch` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `agriwatch`;

-- --------------------------------------------------------

--
-- Structure de la table `cooltainer`
--

CREATE TABLE `cooltainer` (
  `id` int(11) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `temperature` float NOT NULL,
  `humidity` float NOT NULL,
  `bees_box_open` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cooltainer`
--
ALTER TABLE `cooltainer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cooltainer`
--
ALTER TABLE `cooltainer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
