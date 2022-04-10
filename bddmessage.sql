-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 10 avr. 2022 à 17:24
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bddmessage`
--

-- --------------------------------------------------------

--
-- Structure de la table `lesmessages`
--

DROP TABLE IF EXISTS `lesmessages`;
CREATE TABLE IF NOT EXISTS `lesmessages` (
  `numMessage` int(11) NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8_bin NOT NULL,
  `heureDateCreation` datetime NOT NULL,
  `loginRedacteur` varchar(50) COLLATE utf8_bin NOT NULL,
  `loginDestinataire` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`numMessage`),
  KEY `index1` (`loginRedacteur`),
  KEY `index2` (`loginDestinataire`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `lesmessages`
--

INSERT INTO `lesmessages` (`numMessage`, `message`, `heureDateCreation`, `loginRedacteur`, `loginDestinataire`) VALUES
(2, 'Bonjour comment allez vous Mr. TITI ?', '2021-01-15 00:00:00', 'toto', 'titi'),
(42, 'Bonjour je suis TITI ', '2021-01-18 14:13:41', 'titi', 'toto');

-- --------------------------------------------------------

--
-- Structure de la table `lessagepublic`
--

DROP TABLE IF EXISTS `lessagepublic`;
CREATE TABLE IF NOT EXISTS `lessagepublic` (
  `numMessage` int(11) NOT NULL AUTO_INCREMENT,
  `dateHeure` datetime NOT NULL,
  `message` text COLLATE utf8_bin NOT NULL,
  `loginRedacteur` varchar(32) COLLATE utf8_bin NOT NULL,
  `sujet` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`numMessage`)
) ENGINE=MyISAM AUTO_INCREMENT=237 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `lessagepublic`
--

INSERT INTO `lessagepublic` (`numMessage`, `dateHeure`, `message`, `loginRedacteur`, `sujet`) VALUES
(236, '2021-04-07 18:48:34', 'ca va et vous ?', 'toto', 'biologique'),
(235, '2021-04-07 00:00:00', 'Bonjour, comment allez vous ?', 'toto', 'biologique ');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `passWord` varchar(32) COLLATE utf8_bin NOT NULL,
  `heureDateConnexion` datetime NOT NULL,
  `topAdmin` tinyint(1) NOT NULL,
  `nbmessage` int(11) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`login`, `passWord`, `heureDateConnexion`, `topAdmin`, `nbmessage`) VALUES
('bivash', 'ab4f63f9ac65152575886860dde480a1', '2021-01-18 14:19:46', 1, 1),
('titi', '5d933eef19aee7da192608de61b6c23d', '2021-01-14 10:40:06', 1, 0),
('toto', 'f71dbe52628a3f83a77ab494817525c6', '2021-01-14 10:40:06', 0, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `lesmessages`
--
ALTER TABLE `lesmessages`
  ADD CONSTRAINT `lesmessages_ibfk_1` FOREIGN KEY (`loginRedacteur`) REFERENCES `utilisateur` (`login`),
  ADD CONSTRAINT `lesmessages_ibfk_2` FOREIGN KEY (`loginDestinataire`) REFERENCES `utilisateur` (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
