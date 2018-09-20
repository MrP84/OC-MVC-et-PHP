-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 10 sep. 2018 à 12:10
-- Version du serveur :  5.7.21
-- Version de PHP :  7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `minichat`
--

DROP TABLE IF EXISTS `minichat`;
CREATE TABLE IF NOT EXISTS `minichat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date_envoi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `minichat`
--

INSERT INTO `minichat` (`id`, `pseudo`, `message`, `date_envoi`) VALUES
(1, 'MrP', 'Coucou', '2018-09-10 11:26:22'),
(2, 'marcgg', 'Salut !', '2018-09-10 11:26:22'),
(3, 'MrP', 'Ca marche !!', '2018-09-10 11:26:22'),
(4, 'mateo', 'Et oui ! Bien joué', '2018-09-10 11:26:22'),
(5, 'Fanatik', '+1', '2018-09-10 11:26:22'),
(6, 'MrP', 'Vous êtes trop gentils!', '2018-09-10 11:26:22'),
(7, 'mateo', 'tu as mis la date?', '2018-09-10 11:26:44'),
(8, 'MrP', 'oui ça y est !', '2018-09-10 11:29:12'),
(9, 'mateo', 'c\'est pas super propre comme ça...', '2018-09-10 11:30:23'),
(10, 'MrP', 'C\'est mieux non?', '2018-09-10 13:09:05'),
(11, 'MrP', 'Et avec de la mise en forme, ça rend bien?', '2018-09-10 13:39:27'),
(12, 'MrP', 'J\'essaie de récupérer le pseudo maintenant', '2018-09-10 14:07:42'),
(13, 'Mateo', 'apparemment, ça aussi ç afonctionne!', '2018-09-10 14:08:01'),
(14, 'Fanatik', 'Tu as fait comment ?', '2018-09-10 14:08:13'),
(15, 'MrP', 'J\'ai introduit une variable de session!', '2018-09-10 14:08:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
