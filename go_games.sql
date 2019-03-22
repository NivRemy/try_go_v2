-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 04 fév. 2019 à 20:20
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `go_games`
--

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `json` json NOT NULL,
  `id_player1` int(11) NOT NULL,
  `id_player2` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_player1` (`id_player1`),
  KEY `id_player2` (`id_player2`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`id`, `json`, `id_player1`, `id_player2`, `date`) VALUES
(1, '{\"0\": {\"0\": null, \"1\": true, \"2\": null, \"3\": true}, \"1\": {\"0\": false, \"1\": null, \"2\": null, \"3\": true}, \"2\": {\"0\": false, \"1\": true, \"2\": null, \"3\": true}, \"3\": {\"0\": false, \"1\": null, \"2\": null, \"3\": true}}', 1, 2, '2019-01-01'),
(2, '{\"0\": {\"0\": true, \"1\": false, \"2\": false, \"3\": null}, \"1\": {\"0\": true, \"1\": null, \"2\": false, \"3\": true}, \"2\": {\"0\": false, \"1\": true, \"2\": null, \"3\": true}, \"3\": {\"0\": false, \"1\": null, \"2\": true, \"3\": true}}', 1, 2, '2019-01-02'),
(3, '{\"0\": {\"0\": null, \"1\": true, \"2\": null, \"3\": false}, \"1\": {\"0\": false, \"1\": true, \"2\": true, \"3\": false}, \"2\": {\"0\": false, \"1\": true, \"2\": null, \"3\": null}, \"3\": {\"0\": false, \"1\": null, \"2\": true, \"3\": null}}', 1, 4, '2019-01-03'),
(4, '{\"0\": {\"0\": null, \"1\": false, \"2\": null, \"3\": false}, \"1\": {\"0\": true, \"1\": true, \"2\": true, \"3\": null}, \"2\": {\"0\": false, \"1\": false, \"2\": null, \"3\": false}, \"3\": {\"0\": true, \"1\": null, \"2\": true, \"3\": null}}', 2, 4, '2019-01-04');

-- --------------------------------------------------------

--
-- Structure de la table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mail` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `players`
--

INSERT INTO `players` (`id`, `mail`, `password`, `name`, `surname`, `rank`) VALUES
(1, 'honinbo.shusaku@gmail.com', '$2y$10$ZMo7/KaBO03v6g9uIiay3upv/CNHL8vWEoTYz3uXyLAsRageQP.uS', 'Hon\'inbo', 'Shusaku', 1),
(2, 'go.seigen@gmail.com', '$2y$10$JdP4CmB0xEUf4X7GKBsWNurTCzRYwJdZtBmRfWECMzITDE6J08GR6', 'Go', 'Seigen', 1),
(4, 'kitani.minoru@gmail.com', '$2y$10$kB2MP4.fzXxw.oJZDqweDOnPtcXmr5yc2wKag88GpbtmoFb8L5MFq', 'Kitani', 'Minoru', 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `foreign_player1` FOREIGN KEY (`id_player1`) REFERENCES `players` (`id`),
  ADD CONSTRAINT `foreign_player2` FOREIGN KEY (`id_player2`) REFERENCES `players` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
