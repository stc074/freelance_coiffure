-- phpMyAdmin SQL Dump
-- version OVH
-- http://www.phpmyadmin.net
--
-- Client: mysql51-76.perso
-- Généré le : Mer 29 Mai 2013 à 15:27
-- Version du serveur: 5.1.66
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `freelanckbdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `table_carte_page`
--

CREATE TABLE IF NOT EXISTS `table_carte_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext NOT NULL,
  `title` varchar(200) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `tstp` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `table_carte_page`
--

INSERT INTO `table_carte_page` (`id`, `content`, `title`, `description`, `tstp`) VALUES
(1, '<h1>Page pr&eacute;sentation carte en construction</h1>\r\n', 'Page en construction(Carte)', 'Page en construction(Carte)', 1359733730);

-- --------------------------------------------------------

--
-- Structure de la table `table_footers`
--

CREATE TABLE IF NOT EXISTS `table_footers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `tstp` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `table_footers`
--

INSERT INTO `table_footers` (`id`, `title`, `tstp`) VALUES
(1, 'partenaires', 2),
(2, 'titre 2 test modif', 1),
(3, 'titre 3 test', 0);

-- --------------------------------------------------------

--
-- Structure de la table `table_galeries`
--

CREATE TABLE IF NOT EXISTS `table_galeries` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(200) NOT NULL DEFAULT '',
  `tstp` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `table_galeries`
--

INSERT INTO `table_galeries` (`id`, `libelle`, `tstp`) VALUES
(5, 'galerie NÂ°1', 1359628578),
(7, 'Galerie NÂ°2', 1359629921);

-- --------------------------------------------------------

--
-- Structure de la table `table_home_page`
--

CREATE TABLE IF NOT EXISTS `table_home_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext NOT NULL,
  `title` varchar(200) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `tstp` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `table_home_page`
--

INSERT INTO `table_home_page` (`id`, `content`, `title`, `description`, `tstp`) VALUES
(1, '<h1>Changez d&#39;HAIR EN GAGNANT DU TEMPS !</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Faites appel &agrave; la coiffure &agrave; domicile sur le bassin ann&eacute;cien.</p>\r\n\r\n<p>La coiffure &agrave; domicile vous permet de b&eacute;n&eacute;ficier de la prestation d&#39;un professionnel, &eacute;quip&eacute; de son mat&eacute;riel, chez soi dans un cadre convivial et agr&eacute;able.</p>\r\n\r\n<p>C&#39;est vous qui g&eacute;rez votre disponibilit&eacute; sans d&eacute;placement, ni gestion de parking.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Prestations de coiffure mixte visant &agrave; allier cr&eacute;ativit&eacute; et mise en valeur de votre personnalit&eacute;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lieux d&#39;intervention :</p>\r\n\r\n<ul>\r\n	<li><strong>Domicile,</strong></li>\r\n	<li><strong>Etablissement de sant&eacute;,</strong></li>\r\n	<li><strong>Entreprise</strong></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>La coiffure &agrave; domicile s&#39;adresse &agrave; tout le monde : enfants, femmes, hommes, seul(e), en famille ou entre amis.</p>\r\n\r\n<p><big><strong>Tarif Trio : -15% </strong></big><strong><em>sur le tarif de la prestation pour un rendez-vous group&eacute; de 3 personnes.</em></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Freelance Coiffure Annecy, Accueil', 'FREELANCE COIFFURE ANNECY / ACCUEIL', 1367507540);

-- --------------------------------------------------------

--
-- Structure de la table `table_images_galeries`
--

CREATE TABLE IF NOT EXISTS `table_images_galeries` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_galerie` bigint(20) NOT NULL DEFAULT '0',
  `extension` varchar(5) NOT NULL DEFAULT '',
  `comment` varchar(100) NOT NULL DEFAULT 'commentaire',
  `portrait` tinyint(1) NOT NULL DEFAULT '0',
  `tstp` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Contenu de la table `table_images_galeries`
--

INSERT INTO `table_images_galeries` (`id`, `id_galerie`, `extension`, `comment`, `portrait`, `tstp`) VALUES
(26, 5, '.jpg', 'commentaire', 0, 1359628007),
(24, 5, '.jpg', 'commentaire', 1, 1359628026),
(25, 5, '.jpg', 'commentaire', 0, 1359628053),
(38, 7, '.jpg', 'commentaire', 0, 1359629939),
(37, 7, '.jpg', 'commentaire', 0, 1359629944),
(36, 7, '.jpg', 'commentaire', 0, 1359629932),
(35, 7, '.jpg', 'commentaire', 0, 1359629949),
(23, 5, '.png', 'commentaire', 1, 1359628061);

-- --------------------------------------------------------

--
-- Structure de la table `table_links_footer`
--

CREATE TABLE IF NOT EXISTS `table_links_footer` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_footer` bigint(20) NOT NULL,
  `url` varchar(200) NOT NULL DEFAULT '',
  `libelle` varchar(100) NOT NULL DEFAULT '',
  `tstp` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `table_links_footer`
--

INSERT INTO `table_links_footer` (`id`, `id_footer`, `url`, `libelle`, `tstp`) VALUES
(1, 3, 'carte.html', 'carte', 1359706852),
(4, 2, 'galeries2.html', 'galeries modif', 1359714740),
(5, 1, 'http://www.hardibopj.com', 'hardibopj', 1359706979),
(6, 1, 'http://www.siteduzero.com', 'Site du zero', 1359714721),
(7, 1, 'http://www.developpez.com', 'DÃ©veloppez', 1359714756);

-- --------------------------------------------------------

--
-- Structure de la table `table_menu`
--

CREATE TABLE IF NOT EXISTS `table_menu` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(40) NOT NULL DEFAULT '',
  `url` varchar(300) NOT NULL DEFAULT '',
  `tstp` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `table_prestation_page`
--

CREATE TABLE IF NOT EXISTS `table_prestation_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `tstp` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `table_prestation_page`
--

INSERT INTO `table_prestation_page` (`id`, `content`, `title`, `description`, `tstp`) VALUES
(1, '<h1>Page prestations en construction</h1>\r\n', 'Page en construction (Prestations)', 'Page en construction (prestations)', 1359733700);

-- --------------------------------------------------------

--
-- Structure de la table `table_sub_menu`
--

CREATE TABLE IF NOT EXISTS `table_sub_menu` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_menu` bigint(20) NOT NULL,
  `libelle` varchar(40) NOT NULL DEFAULT '',
  `url` varchar(300) NOT NULL,
  `tstp` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `table_tarifs_page`
--

CREATE TABLE IF NOT EXISTS `table_tarifs_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext NOT NULL,
  `title` varchar(200) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `tstp` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `table_tarifs_page`
--

INSERT INTO `table_tarifs_page` (`id`, `content`, `title`, `description`, `tstp`) VALUES
(1, '<h1>TARIFS&nbsp;TTC &nbsp;2013</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><big><span style=\\\\\\"background-color: yellow\\\\\\"><ins><strong>KIDS</strong></ins></span></big></p>\r\n\r\n<p>.&nbsp;&nbsp; B&eacute;b&eacute; (- 2 ans)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;6 &euro;</p>\r\n\r\n<p>.&nbsp;&nbsp; - 5 ans (fille et gar&ccedil;on)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 9 &euro;</p>\r\n\r\n<p>.&nbsp;&nbsp; Fille - 10 ans&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 16 &euro;</p>\r\n\r\n<p>.&nbsp;&nbsp; Gar&ccedil;on - 10 ans&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 13 &euro;</p>\r\n\r\n<p>.&nbsp;&nbsp; Fille -&nbsp;20 ans&nbsp;(courts, mi-longs)&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 20 &euro;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 24 &euro; (longs)</p>\r\n\r\n<p>.&nbsp;&nbsp; Gar&ccedil;on - 20 ans&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;16 &euro;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><ins><big><span style=\\\\\\"background-color: yellow\\\\\\"><strong>HOMMES</strong></span></big></ins></p>\r\n\r\n<p>.&nbsp;&nbsp; Barbe&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7 &euro;</p>\r\n\r\n<p>.&nbsp;&nbsp;&nbsp;Couronne&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;17 &euro;</p>\r\n\r\n<p>.&nbsp;&nbsp; Sh, coupe, s&eacute;chage&nbsp;(courts)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;19 &euro;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 21 &euro; (mi longs, longs)</p>\r\n\r\n<p>.&nbsp;&nbsp; Coloration,&nbsp; chvx courts/ longs&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 22 &euro;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 27 &euro;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><ins><big><span style=\\\\\\"background-color: yellow\\\\\\"><strong>FEMMES</strong></span></big></ins></p>\r\n\r\n<p>.&nbsp;&nbsp; Shampooing, brushing&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'TARIFS TTC  2013', 'Coiffures enfants, filles et garÃ§ons de bÃ©bÃ© Ã  20 ans\r\nCoiffures mixtes', 1363258784);

-- --------------------------------------------------------

--
-- Structure de la table `table_title`
--

CREATE TABLE IF NOT EXISTS `table_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `tstp` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `table_title`
--

INSERT INTO `table_title` (`id`, `title`, `tstp`) VALUES
(1, 'FREELANCE COIFFURE', 1361003270);

-- --------------------------------------------------------

--
-- Structure de la table `table_zoom_carte`
--

CREATE TABLE IF NOT EXISTS `table_zoom_carte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zoom` mediumint(9) NOT NULL DEFAULT '17',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `table_zoom_carte`
--

INSERT INTO `table_zoom_carte` (`id`, `zoom`) VALUES
(1, 12);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
