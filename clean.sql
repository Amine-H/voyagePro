-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 21 Novembre 2014 à 22:28
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
-- Structure de la table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `cities_voyages`
--

CREATE TABLE IF NOT EXISTS `cities_voyages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idVoyage` int(11) NOT NULL,
  `idCity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=1 ;

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
('fbpage', 'facebook.com/theAMH'),
('isLive', '1'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=1 ;

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

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `tel`) VALUES
(1, 'hakkou', 'amine', 'q4g@hotmail.fr', '6c8349cc7260ae62e3b1396831a8398f', '');

-- --------------------------------------------------------

--
-- Structure de la table `voyages`
--

CREATE TABLE IF NOT EXISTS `voyages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `description` text COLLATE utf32_unicode_ci NOT NULL,
  `cities` int(11) NOT NULL,
  `dateDepart` date NOT NULL,
  `dateRetour` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
