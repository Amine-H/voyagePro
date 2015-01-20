-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 20 Janvier 2015 à 15:11
-- Version du serveur :  5.6.16
-- Version de PHP :  5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `voyagepro`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) COLLATE utf32_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `password` varchar(35) COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@email.com', '318d2f5038f16c06f8f397186eb60940');

-- --------------------------------------------------------

--
-- Structure de la table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(3, 'Casa'),
(2, 'Oujda'),
(1, 'Settat');

-- --------------------------------------------------------

--
-- Structure de la table `cities_voyages`
--

CREATE TABLE IF NOT EXISTS `cities_voyages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idVoyage` int(11) NOT NULL,
  `idCity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Structure de la table `gallerie`
--

CREATE TABLE IF NOT EXISTS `gallerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `voyage` int(11) NOT NULL,
  `image` varchar(15) COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `params`
--

CREATE TABLE IF NOT EXISTS `params` (
  `param` varchar(10) COLLATE utf32_unicode_ci NOT NULL,
  `value` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  UNIQUE KEY `param` (`param`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Contenu de la table `params`
--

INSERT INTO `params` (`param`, `value`) VALUES
('adresse', 'default adress'),
('email', 'emaislfsdf@dfs.fr'),
('fbpage', 'facebook.com/theAMH'),
('isLive', '1'),
('tel', 'tel'),
('twitter', 'twitter.com/Dijawker');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idVoyage` int(11) NOT NULL,
  `attended` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf32_unicode_ci NOT NULL,
  `password` varchar(35) COLLATE utf32_unicode_ci NOT NULL,
  `tel` varchar(13) COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`tel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `voyages`
--

CREATE TABLE IF NOT EXISTS `voyages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `description` text COLLATE utf32_unicode_ci NOT NULL,
  `dateDepart` date NOT NULL,
  `dateRetour` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
