-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Client :  holoboxflvroot.mysql.db
-- Généré le :  Ven 30 Octobre 2015 à 19:11
-- Version du serveur :  5.1.73-2+squeeze+build1+1-log
-- Version de PHP :  5.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `holoboxflvroot`
--

-- --------------------------------------------------------

--
-- Structure de la table `amis`
--

CREATE TABLE IF NOT EXISTS `amis` (
  `iduser1` int(11) NOT NULL,
  `iduser2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `amis`
--

INSERT INTO `amis` (`iduser1`, `iduser2`) VALUES
(1, 2),
(3, 2),
(2, 3),
(3, 1),
(2, 1),
(1, 3),
(4, 2),
(1, 4),
(1, 8),
(2, 4),
(4, 8),
(3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nom`) VALUES
(8, 'Nos Jeux');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `idcommentaire` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `texte` longtext,
  `iduser` int(11) NOT NULL,
  `idnews` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `idevent` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `desc` longtext,
  `image` longtext,
  `localisation` longtext,
  `date` datetime DEFAULT NULL,
  `idorganisateur` int(11) NOT NULL,
  `idjeux` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `event`
--

INSERT INTO `event` (`idevent`, `nom`, `type`, `desc`, `image`, `localisation`, `date`, `idorganisateur`, `idjeux`) VALUES
(8, 'Test', 'test', 'Ceci est un [font=Impact]TEST [font=Arial]!!! [i][color=#ff3333]Biatch[/color][/i][/font][/font] <3 !', 'http://hdw.datawallpaper.com/anime/saber-323565.jpg', 'Aix', '2015-11-22 16:32:00', 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `idForum` int(11) NOT NULL,
  `nom` varchar(60) DEFAULT NULL,
  `description` longtext,
  `idpere` int(11) DEFAULT NULL,
  `idcategorie` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `forum`
--

INSERT INTO `forum` (`idForum`, `nom`, `description`, `idpere`, `idcategorie`) VALUES
(20, 'GuildWars2', '<p>Forum de <em>GW2</em></p>', NULL, 8),
(21, 'The Crew', '<p>Le forum de <em>The Crew</em></p>', NULL, 8),
(22, 'FFXV', '<p>Forum sur <em>FFXV</em></p>', NULL, 8);

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE IF NOT EXISTS `joueur` (
  `idjeux` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `joueur`
--

INSERT INTO `joueur` (`idjeux`, `iduser`) VALUES
(1, 1),
(2, 1),
(2, 2),
(1, 2),
(4, 2),
(4, 3),
(1, 3),
(3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `idmessage` int(11) NOT NULL,
  `message` longtext,
  `timestamp` int(16) DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  `idtopic` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`idmessage`, `message`, `timestamp`, `iduser`, `idtopic`) VALUES
(12, 'yop\r\n', 1423156410, 2, 11);

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE IF NOT EXISTS `messagerie` (
  `idmessage` int(11) NOT NULL,
  `link` int(18) NOT NULL,
  `idauteur` int(11) NOT NULL,
  `iddestinataire` int(11) NOT NULL,
  `luAuteur` int(1) NOT NULL DEFAULT '1',
  `luDestinataire` int(1) NOT NULL DEFAULT '1',
  `timestamp` int(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `idnews` int(11) NOT NULL,
  `titre` varchar(45) DEFAULT NULL,
  `text` longtext,
  `image` longtext,
  `date` datetime DEFAULT NULL,
  `idauteur` int(11) NOT NULL,
  `idjeux` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`idnews`, `titre`, `text`, `image`, `date`, `idauteur`, `idjeux`) VALUES
(11, 'Un grand jour !', 'C''est un grand jour pour l''histoire de l''humanité !!! :)\n[youtube]VqMJZzHQ7GI[/youtube]', 'http://www.ps4france.com/wp-content/uploads/2013/12/Final-Fantasy-XIV-A-Realm-Reborn-Wallpaper.jpg', '2015-02-04 22:28:50', 2, 1),
(12, 'Pourquoi jouer à The Crew ?', 'Le jeu The Crew, il parait qu''il est bien ! Alors il faut y jouer  !', 'http://i.ytimg.com/vi/vUXwfbQsm04/maxresdefault.jpg', '2015-02-05 22:34:15', 9, 1);

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

CREATE TABLE IF NOT EXISTS `participant` (
  `idevent` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `idjeux` int(11) NOT NULL,
  `nom` varchar(60) DEFAULT NULL,
  `description` longtext,
  `couleur` varchar(45) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `section`
--

INSERT INTO `section` (`idjeux`, `nom`, `description`, `couleur`, `image`) VALUES
(1, 'The Crew', '<p><span id="docs-internal-guid-f80dfc13-2280-c72a-8dc0-eca2cbbee765"><span style="font-size: 15px; font-family: ''Times New Roman''; color: #252525; vertical-align: baseline; white-space: pre-wrap; background-color: #f8f8f8;">The Crew, c''est quoi ?</span></span></p>\r\n<p>&nbsp;</p>\r\n<p><span id="docs-internal-guid-f80dfc13-2280-c72a-8dc0-eca2cbbee765"><span style="font-size: 15px; font-family: ''Times New Roman''; color: #252525; vertical-align: baseline; white-space: pre-wrap; background-color: #f8f8f8;">The Crew est un jeu de course multi-joueurs open world sortie le 2 d&eacute;cembre 2014 sur quasiment toutes les consoles de salon connues &agrave; ce jour.</span></span></p>', 'blue2', 'http://www.gamersyde.com/news_the_crew_livestream_replay-16031.jpg'),
(2, 'Guild Wars 2', '<p dir="ltr" style="line-height: 1.15; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 15px; font-family: ''Times New Roman''; color: #252525; background-color: #f8f8f8; font-weight: normal; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Guild Wars 2 est un jeu de r&ocirc;le en ligne massivement multijoueur (MMORPG) sorti le 28 ao&ucirc;t 2012. Son d&eacute;veloppement a &eacute;t&eacute; r&eacute;v&eacute;l&eacute; en mars 2007.</span></p>\r\n<p dir="ltr" style="line-height: 1.15; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>\r\n<p dir="ltr" style="line-height: 1.15; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 15px; font-family: ''Times New Roman''; color: #252525; background-color: #f8f8f8; font-weight: normal; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Le jeu se d&eacute;roule en Tyrie, 250 ans apr&egrave;s les &eacute;v&eacute;nements de Guild Wars, suite &agrave; plusieurs cataclysmes caus&eacute;s par le r&eacute;veil des dragons ancestraux, des cr&eacute;atures qui peuvent rivaliser avec les Dieux.</span></p>\r\n<p dir="ltr" style="line-height: 1.15; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>\r\n<p><span id="docs-internal-guid-a8c140b4-2279-afb1-0b56-2a7e7e0ee7ea"><span style="font-size: 15px; font-family: ''Times New Roman''; color: #252525; vertical-align: baseline; white-space: pre-wrap; background-color: #f8f8f8;">Par rapport &agrave; Guild Wars 1, ce nouvel opus b&eacute;n&eacute;ficie d''un nouveau gameplay. L''essentiel du jeu ne se d&eacute;roule plus dans des zones instanci&eacute;es mais dans un vaste monde persistant.</span></span></p>', 'blue2', 'https://d3b4yo2b5lbfy.cloudfront.net/wp-content/uploads/2013/01/93b49Guild-Wars-2-590x375.jpg'),
(3, 'Final Fantasy XV', 'Final Fantasy XV (annoncé originellement sous le titre Final Fantasy Versus XIII) est un jeu vidéo en cours de développement de la société japonaise Square-Enix, prévu pour les plateformes PlayStation 4 et Xbox One.', 'cyan2', 'http://assets.vg247.com/current//2014/09/final_fantasy_15_TGS.jpg'),
(4, 'La Terre du Milieu : L''Ombre du Mordor', '<p dir="ltr" style="line-height: 1.15; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 15px; font-family: Arial; color: #252525; background-color: #f8f8f8; font-weight: normal; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">La Terre du Milieu : L''Ombre du Mordor est un jeu d''action-aventure sur PS4, PS3 et PC.</span></p>\r\n<p dir="ltr" style="line-height: 1.15; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 15px; font-family: Arial; color: #252525; background-color: #f8f8f8; font-weight: normal; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Il vous met dans la peau de Talion, un R&ocirc;deur surveillant la Porte Noire du Mordor, fief de Sauron, le Seigneur des Anneaux.</span></p>\r\n<p dir="ltr" style="line-height: 1.15; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>\r\n<p><span id="docs-internal-guid-0f6e406a-227e-794e-f3cb-eba0b0eb993a"><span style="font-size: 15px; font-family: Arial; color: #252525; vertical-align: baseline; white-space: pre-wrap; background-color: #f8f8f8;">Abattu par un groupe d''orques, il revient &agrave; la vie li&eacute; au fant&ocirc;me d''un elfe qui lui procure de nombreux pouvoirs. Le joueur explore un monde ouvert et hostile, dans lequel il aura &agrave; traquer et assassiner des capitaines orques afin de perturber l''ordre hi&eacute;rarchique jusqu''&agrave; atteindre les plus grands ennemis.</span></span></p>', 'blue2', 'http://media.funradio.fr/online/image/2014/0923/7774454439_ombre-du-mordor.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `tchat`
--

CREATE TABLE IF NOT EXISTS `tchat` (
  `id` int(11) NOT NULL,
  `auteur` varchar(60) NOT NULL,
  `message` text NOT NULL,
  `timestamp` int(16) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=343 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tchat`
--

INSERT INTO `tchat` (`id`, `auteur`, `message`, `timestamp`) VALUES
(42, 'sebspas', 'hey', 1423161855),
(43, 'sebspas', 'Hey', 1423161986),
(44, 'user', 'Yop', 1423162021),
(45, 'user', 'Yop', 1423162436),
(46, 'sebspas', 'gitn', 1423163799),
(47, 'sebspas', 'gitn:)', 1423163803),
(48, 'sebspas', 'yop', 1423163960),
(49, 'sebspas', 'yop', 1423163964),
(50, 'sebspas', 'hey', 1423163988),
(51, 'sebspas', ':)', 1423163994),
(52, 'sebspas', 't', 1423164027),
(53, 'sebspas', 'gitan', 1423164360),
(54, 'sebspas', ':)', 1423164364),
(55, 'sebspas', 'g', 1423164450),
(56, 'sebspas', 'g$', 1423164457),
(57, 'sebspas', 't', 1423164874),
(58, 'Korkulen', 'TAIS TOI', 1423172457),
(59, 'Korkulen', 'GITAN', 1423172459),
(60, 'TartineMaster', 'Bouh !', 1423172463),
(61, 'Korkulen', 'SUCEUR DE CHEVRE', 1423172467),
(62, 'sebspas', 'Hey', 1423172481),
(63, 'Korkulen', 'TOURISTE', 1423172485),
(64, 'sebspas', 'Caravanne :)', 1423172494),
(65, 'sebspas', 'Caravanne :)', 1423172504),
(66, 'TartineMaster', 'Oh les vilains', 1423172505),
(67, 'Korkulen', 'TOURISTE', 1423172506),
(68, 'Korkulen', 'TOURISTE', 1423172506),
(69, 'Korkulen', 'TOURISTE', 1423172506),
(70, 'Korkulen', 'TOURISTE', 1423172506),
(71, 'john', 'ok', 1423172547),
(72, 'sebspas', 'gitan', 1423172588),
(73, 'john', '<script>alert(''gitan'');</script>', 1423172608),
(74, 'john', '<script>alert(''gitan'');</script>', 1423172612),
(75, 'john', '<script>alert(''gitan'');</script>', 1423172614),
(76, 'john', 'h', 1423172632),
(77, 'john', 'h', 1423172636),
(78, 'Korkulen', 'PD', 1423172723),
(79, 'Korkulen', 'PD', 1423172729),
(80, 'Korkulen', 'a besoin de vous pour débloquer une enquête.', 1423173416),
(81, 'sebspas', 'Hey', 1423173417),
(82, 'TartineMaster', 'pouet', 1423173419),
(83, 'sebspas', 'Hey !', 1423173420),
(84, 'john', 'hh', 1423173422),
(85, 'sebspas', 'coucou', 1423173438),
(86, 'Korkulen', '321321321', 1423173448),
(87, 'john', 'lhiu', 1423173468),
(88, 'sebspas', 'hey', 1423173475),
(89, 'TartineMaster', 'c pa tre joli', 1423173477),
(90, 'john', 'thftfhh', 1423173482),
(91, 'john', 'gghhj', 1423173484),
(92, 'john', 'jh', 1423173484),
(93, 'john', 'jh', 1423173484),
(94, 'john', 'g', 1423173485),
(95, 'john', 'jh', 1423173485),
(96, 'john', 'jghhg', 1423173485),
(97, 'john', 'g', 1423173486),
(98, 'john', 'ghjh', 1423173486),
(99, 'john', 'jh', 1423173486),
(100, 'Korkulen', 'a', 1423173487),
(101, 'Korkulen', 'b', 1423173487),
(102, 'Korkulen', 'c', 1423173489),
(103, 'Korkulen', 'd', 1423173489),
(104, 'Korkulen', 'e', 1423173490),
(105, 'Korkulen', 'f', 1423173490),
(106, 'Korkulen', 'g', 1423173492),
(107, 'Korkulen', 'h', 1423173493),
(108, 'Korkulen', 'i', 1423173494),
(109, 'Korkulen', 'j', 1423173495),
(110, 'TartineMaster', 'seb le pas bo', 1423173495),
(111, 'Korkulen', 'k', 1423173495),
(112, 'Korkulen', 'l', 1423173496),
(113, 'Korkulen', 'm', 1423173497),
(114, 'TartineMaster', 'seb le pas bo', 1423173498),
(115, 'Korkulen', 'n', 1423173498),
(116, 'Korkulen', 'o', 1423173499),
(117, 'TartineMaster', 'seb le pas bo', 1423173499),
(118, 'Korkulen', 'p', 1423173499),
(119, 'Korkulen', 'q', 1423173500),
(120, 'TartineMaster', 'seb le pas bo', 1423173500),
(121, 'Korkulen', 'r', 1423173501),
(122, 'TartineMaster', 'seb le pas bo', 1423173501),
(123, 'Korkulen', 's', 1423173501),
(124, 'Korkulen', 't', 1423173502),
(125, 'TartineMaster', 'seb le pas bo', 1423173502),
(126, 'TartineMaster', 'seb le pas bo', 1423173503),
(127, 'TartineMaster', 'seb le pas bo', 1423173504),
(128, 'Korkulen', 'u', 1423173504),
(129, 'Korkulen', 'v', 1423173505),
(130, 'sebspas', 'a', 1423173505),
(131, 'TartineMaster', 'seb le pas bo', 1423173506),
(132, 'Korkulen', 'w', 1423173506),
(133, 'Korkulen', 'x', 1423173507),
(134, 'Korkulen', 'y', 1423173508),
(135, 'Korkulen', 'z', 1423173508),
(136, 'TartineMaster', 'seb le pa bo', 1423173514),
(137, 'TartineMaster', 'seb le pas bo', 1423173515),
(138, 'TartineMaster', 'seb le pas bo', 1423173516),
(139, 'TartineMaster', 'seb le pas bo', 1423173518),
(140, 'sebspas', 'a', 1423173566),
(141, 'TartineMaster', 'seb le pa bo', 1423173566),
(142, 'Korkulen', 'hijglj', 1423173568),
(143, 'Korkulen', 'htgjdujtyc', 1423173571),
(144, 'Korkulen', 'rea', 1423173572),
(145, 'Korkulen', 'aeryhg', 1423173572),
(146, 'Korkulen', 'yh', 1423173572),
(147, 'Korkulen', 'h', 1423173573),
(148, 'Korkulen', 'hr', 1423173573),
(149, 'Korkulen', 'ah', 1423173573),
(150, 'Korkulen', 'r', 1423173573),
(151, 'Korkulen', 'a', 1423173573),
(152, 'Korkulen', 'hae', 1423173574),
(153, 'Korkulen', 'h', 1423173574),
(154, 'Korkulen', 'haerh', 1423173574),
(155, 'Korkulen', 'er', 1423173574),
(156, 'Korkulen', 'are', 1423173574),
(157, 'Korkulen', 'he', 1423173575),
(158, 'Korkulen', 'erh', 1423173575),
(159, 'Korkulen', 'er', 1423173575),
(160, 'Korkulen', 'reh', 1423173575),
(161, 'Korkulen', 'reher', 1423173576),
(162, 'Korkulen', 're', 1423173576),
(163, 'Korkulen', 'ae', 1423173576),
(164, 'Korkulen', 'e', 1423173576),
(165, 'Korkulen', 'eh', 1423173577),
(166, 'Korkulen', 're', 1423173577),
(167, 'Korkulen', 'h', 1423173577),
(168, 'Korkulen', 'h', 1423173577),
(169, 'Korkulen', 'are', 1423173577),
(170, 'Korkulen', 'ae', 1423173578),
(171, 'Korkulen', 're', 1423173578),
(172, 'Korkulen', 'h', 1423173578),
(173, 'john', 'hgghhg', 1423173578),
(174, 'Korkulen', 'e', 1423173578),
(175, 'Korkulen', 'ae', 1423173578),
(176, 'Korkulen', 'eh', 1423173579),
(177, 'Korkulen', 'rhhhhhhhhhhh', 1423173580),
(178, 'Korkulen', 'r', 1423173580),
(179, 'Korkulen', 'r', 1423173580),
(180, 'Korkulen', 'rr', 1423173581),
(181, 'Korkulen', 'r', 1423173581),
(182, 'Korkulen', 'r', 1423173581),
(183, 'Korkulen', 'rrr', 1423173582),
(184, 'Korkulen', 'r', 1423173582),
(185, 'Korkulen', 'r', 1423173582),
(186, 'Korkulen', 'rrr', 1423173583),
(187, 'sebspas', 'a', 1423173583),
(188, 'Korkulen', 'rr', 1423173584),
(189, 'Korkulen', 'rrr', 1423173584),
(190, 'Korkulen', 'rr', 1423173585),
(191, 'Korkulen', 'rrrr', 1423173586),
(192, 'Korkulen', 'r', 1423173586),
(193, 'Korkulen', 'r', 1423173587),
(194, 'Korkulen', 'r', 1423173587),
(195, 'Korkulen', 'r', 1423173587),
(196, 'Korkulen', 'rr', 1423173588),
(197, 'john', 'l', 1423173588),
(198, 'Korkulen', 'r', 1423173589),
(199, 'Korkulen', 'rr', 1423173589),
(200, 'Korkulen', 'rrrrr', 1423173590),
(201, 'Korkulen', 'rrrr', 1423173591),
(202, 'Korkulen', 'r', 1423173591),
(203, 'Korkulen', 'touriste', 1423173598),
(204, 'TartineMaster', 'seb le pa bo', 1423173601),
(205, 'Korkulen', 'seb le touriste', 1423173606),
(206, 'TartineMaster', 'seb le pa bo', 1423173609),
(207, 'Korkulen', 'seb le touriste', 1423173610),
(208, 'TartineMaster', 'seb le pa bo', 1423173611),
(209, 'Korkulen', 'seb le touriste', 1423173611),
(210, 'Korkulen', 'seb le touriste', 1423173613),
(211, 'Korkulen', 'seb le touriste', 1423173614),
(212, 'Korkulen', 'seb le touriste', 1423173614),
(213, 'Korkulen', 'seb le touristeseb le touriste', 1423173616),
(214, 'TartineMaster', 'seb le pa bo', 1423173616),
(215, 'Korkulen', 'seb le touriste', 1423173617),
(216, 'Korkulen', 'seb le touriste', 1423173618),
(217, 'TartineMaster', 'seb le pa bo', 1423173619),
(218, 'Korkulen', 'seb le touriste', 1423173620),
(219, 'TartineMaster', 'seb le pa bo', 1423173620),
(220, 'Korkulen', 'seb le touriste', 1423173621),
(221, 'Korkulen', 'seb le touriste', 1423173621),
(222, 'TartineMaster', 'seb le pa bo', 1423173622),
(223, 'TartineMaster', 'seb le pa bo', 1423173622),
(224, 'TartineMaster', 'seb le pa bo', 1423173623),
(225, 'Korkulen', 'seb le touristeseb le touristeseb le touriste', 1423173624),
(226, 'TartineMaster', 'seb le pa bo', 1423173624),
(227, 'TartineMaster', 'seb le pa bo', 1423173625),
(228, 'Korkulen', 'seb le touriste', 1423173625),
(229, 'Korkulen', 'seb le touriste', 1423173626),
(230, 'john', 'glkgfnrdps^dpoffgpofdsphrtfds', 1423173626),
(231, 'john', 'glkgfnrdps^dpoffgpofdsphrtfdsrgd', 1423173626),
(232, 'sebspas', 'u', 1423173626),
(233, 'Korkulen', 'seb le touriste', 1423173626),
(234, 'Korkulen', 'seb le touriste', 1423173627),
(235, 'john', 'gfgdjiohfgioghiofhpogjfhgg', 1423173627),
(236, 'TartineMaster', 'seb le pa boseb le pa bo', 1423173627),
(237, 'john', 'hd', 1423173627),
(238, 'Korkulen', 'seb le touriste', 1423173628),
(239, 'john', 'gfgjk', 1423173628),
(240, 'Korkulen', 'seb le touriste', 1423173628),
(241, 'john', 'fgogjoifkhj', 1423173629),
(242, 'john', 'fgogjoifkhjfh', 1423173629),
(243, 'TartineMaster', 'seb le pa bovseb le pa boseb le pa bov', 1423173629),
(244, 'Korkulen', 'seb le touriste', 1423173629),
(245, 'john', 'fghojfrkjy', 1423173629),
(246, 'john', 'thg', 1423173629),
(247, 'Korkulen', 'seb le touriste', 1423173630),
(248, 'john', 'fdo$opfdofdhjhtr', 1423173630),
(249, 'TartineMaster', 'seb le pa boseb le pa boseb le pa bo', 1423173630),
(250, 'john', 'ofb', 1423173630),
(251, 'Korkulen', 'seb le touriste', 1423173630),
(252, 'Korkulen', 'seb le touriste', 1423173631),
(253, 'TartineMaster', 'seb le pa boseb le pa bo', 1423173632),
(254, 'TartineMaster', 'seb le pa bo', 1423173632),
(255, 'TartineMaster', 'seb le pa boseb le pa boseb le pa bo', 1423173633),
(256, 'Korkulen', 'seb le touristeseb le touristeseb le touristeseb le touristeseb le touriste', 1423173633),
(257, 'TartineMaster', 'seb le pa bo', 1423173634),
(258, 'Korkulen', 'seb le touristeseb le touristeseb le touristeseb le touriste', 1423173634),
(259, 'TartineMaster', 'seb le pa bo', 1423173635),
(260, 'TartineMaster', 'seb le pa bo', 1423173636),
(261, 'TartineMaster', 'seb le pa bo', 1423173636),
(262, 'TartineMaster', 'seb le pa bo', 1423173637),
(263, 'Korkulen', 'seb le touristeseb le touristeseb le touristeseb le touristeseb le touristeseb le touristeseb le touristeseb le touristeseb le touristeseb le touristeseb le touristeseb le touristeseb le touristeseb le touristeseb le touriste', 1423173637),
(264, 'john', ' ', 1423173638),
(265, 'Korkulen', 'seb le touriste', 1423173638),
(266, 'Korkulen', 'seb le touriste', 1423173639),
(267, 'Korkulen', 'seb le touriste', 1423173639),
(268, 'TartineMaster', 'seb le pa boseb le pa boseb le pa bo', 1423173640),
(269, 'Korkulen', 'v', 1423173640),
(270, 'Korkulen', 'seb le touriste', 1423173641),
(271, 'Korkulen', 'seb le touriste', 1423173642),
(272, 'Korkulen', 'seb le touriste', 1423173642),
(273, 'Korkulen', 'seb le touriste', 1423173643),
(274, 'Korkulen', 'seb le touriste', 1423173644),
(275, 'TartineMaster', 'seb le pa boseb le pa boseb le pa boseb le pa bo', 1423173645),
(276, 'Korkulen', 'seb le touristev', 1423173645),
(277, 'Korkulen', 'seb le touriste', 1423173646),
(278, 'TartineMaster', 'seb le pa bo', 1423173646),
(279, 'Korkulen', 'seb le touriste', 1423173647),
(280, 'TartineMaster', 'seb le pa bo', 1423173647),
(281, 'Korkulen', 'seb le touriste', 1423173647),
(282, 'TartineMaster', 'seb le pa bo', 1423173647),
(283, 'TartineMaster', 'seb le pa bo', 1423173648),
(284, 'Korkulen', 'seb le touriste', 1423173649),
(285, 'TartineMaster', 'seb le pa bo', 1423173649),
(286, 'Korkulen', 'seb le touriste', 1423173649),
(287, 'TartineMaster', 'seb le pa bo', 1423173650),
(288, 'Korkulen', 'seb le touriste', 1423173650),
(289, 'TartineMaster', 'seb le pa bo', 1423173650),
(290, 'Korkulen', 'seb le touriste', 1423173651),
(291, 'TartineMaster', 'seb le pa bo', 1423173651),
(292, 'Korkulen', 'seb le touriste', 1423173651),
(293, 'TartineMaster', 'seb le pa bo', 1423173652),
(294, 'Korkulen', 'seb le touriste', 1423173652),
(295, 'TartineMaster', 'seb le pa bo', 1423173653),
(296, 'Korkulen', 'seb le touriste', 1423173653),
(297, 'Korkulen', 'seb le touriste', 1423173653),
(298, 'TartineMaster', 'seb le pa bo', 1423173653),
(299, 'Korkulen', 'seb le touriste', 1423173654),
(300, 'TartineMaster', 'seb le pa bo', 1423173654),
(301, 'Korkulen', 'seb le touriste', 1423173655),
(302, 'TartineMaster', 'seb le pa bo', 1423173655),
(303, 'Korkulen', 'seb le touriste', 1423173655),
(304, 'TartineMaster', 'seb le pa bo', 1423173656),
(305, 'Korkulen', 'seb le touriste', 1423173656),
(306, 'Korkulen', 'seb le touriste', 1423173656),
(307, 'TartineMaster', 'seb le pa bo', 1423173656),
(308, 'Korkulen', 'seb le touriste', 1423173657),
(309, 'TartineMaster', 'seb le pa bo', 1423173657),
(310, 'Korkulen', 'seb le touriste', 1423173657),
(311, 'Korkulen', 'seb le touriste', 1423173658),
(312, 'TartineMaster', 'seb le pa bo', 1423173658),
(313, 'Korkulen', 'seb le touriste', 1423173658),
(314, 'TartineMaster', 'seb le pa bo', 1423173659),
(315, 'Korkulen', 'seb le touriste', 1423173659),
(316, 'Korkulen', 'seb le touriste', 1423173659),
(317, 'TartineMaster', 'seb le pa bo', 1423173659),
(318, 'Korkulen', 'seb le touriste', 1423173660),
(319, 'Korkulen', 'seb le touriste', 1423173660),
(320, 'TartineMaster', 'seb le pa bo', 1423173660),
(321, 'TartineMaster', 'seb le pa bo', 1423173661),
(322, 'TartineMaster', 'seb le pa bo', 1423173662),
(323, 'Korkulen', 'seb le touristeseb le touristeseb le touriste', 1423173662),
(324, 'TartineMaster', 'seb le pa boseb le pa bo', 1423173663),
(325, 'TartineMaster', 'seb le pa bo', 1423173664),
(326, 'TartineMaster', 'seb le pa bo', 1423173665),
(327, 'Korkulen', 'vseb le touristeseb le touristeseb le touristeseb le touriste', 1423173665),
(328, 'TartineMaster', 'seb le pa bo', 1423173665),
(329, 'TartineMaster', 'seb le pa bo', 1423173666),
(330, 'TartineMaster', 'seb le pa bo', 1423173667),
(331, 'TartineMaster', 'seb le pa bo', 1423173669),
(332, 'Korkulen', 'seb le touriste', 1423173670),
(333, 'Korkulen', 'seb le touriste', 1423173680),
(334, 'john', 'kk', 1423173681),
(335, 'Korkulen', 'kjb', 1423173695),
(336, 'sebspas', 'a', 1423173746),
(337, 'sebspas', 't', 1423173865),
(338, 'TartineMaster', '1', 1423173880),
(339, 'TartineMaster', 'gre-nouille', 1423173957),
(340, 'TartineMaster', 'gre-nadine', 1423173987),
(341, 'sebspas', 'un', 1423174539),
(342, 'sebspas', 'deux', 1423174600);

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `idtopic` int(11) NOT NULL,
  `nom` varchar(60) DEFAULT NULL,
  `message` longtext,
  `timestamp` int(16) DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  `forum_idForum` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `topic`
--

INSERT INTO `topic` (`idtopic`, `nom`, `message`, `timestamp`, `iduser`, `forum_idForum`) VALUES
(11, 'Coucou', '[color=#cc6666]:) Coucou les petits loups;) ![/color]', 1423085858, 2, 20);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL,
  `pseudo` varchar(45) DEFAULT NULL,
  `nom` varchar(60) DEFAULT NULL,
  `prenom` varchar(60) DEFAULT NULL,
  `sexe` varchar(15) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT 'http://s3.amazonaws.com/37assets/svn/765-default-avatar.png',
  `online` int(11) DEFAULT '0',
  `rang` int(11) DEFAULT '0',
  `token` varchar(255) DEFAULT NULL,
  `lastactivity` int(16) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`iduser`, `pseudo`, `nom`, `prenom`, `sexe`, `mail`, `pass`, `avatar`, `online`, `rang`, `token`, `lastactivity`) VALUES
(1, 'john', 'lejardinnier', 'john', 'Homme', 'john1313@yopmail.com', 'cb60fd97408f218f69a00a84a7d8807dd9952aa9', 'http://www.allodocteurs.fr/upload/article/8307-chaton.jpg', 0, 3, 'a499619c8daffc7c8576f431dac16252fb5556ff', 1423173681),
(2, 'sebspas', 'Corfa', 'Sebastien', 'Homme', 'sebspas@gmail.com', '1c1b7543ac378fd5b72045f16553bf5f56b89587', 'http://upload.wikimedia.org/wikipedia/en/7/75/Saber.jpg', 1, 3, '80f2dc55262c4aea66479c9697ba02312ab28a2a', 1423174600),
(3, 'KenAdBlock', 'Coadalen', 'Kenny', 'Homme', 'kennycg13@hotmail.fr', '75cf32fa434b375eef7ef97f26f21e43c868bfaa', 'http://assets.vg247.com/current//2014/09/ff15.jpg', 0, 3, '9bcdf2d4927f0a34a1ec6ab25c5e3e5bcbcdcefb', NULL),
(4, 'Xawirses', 'azerty', 'ytreza', 'Homme', 'xawirses@gmail.com', '704b3b569ef07a48ef03138aa87a13d4746333f9', 'https://dl.dropboxusercontent.com/u/55281030/Xawirses.png', 0, 3, '3407f13bd88996c4ac08e763b05b5838ccfc84fa', NULL),
(7, 'User', 'User', 'User', 'Homme', 'user@yopmail.com', 'd7316a3074d562269cf4302e4eed46369b523687', 'http://s3.amazonaws.com/37assets/svn/765-default-avatar.png', 0, 1, '9e6336b06edd389a65d7492350f8607c5e8d3210', 1423162436),
(8, 'Admin', 'Admin', 'Admin', 'Homme', 'admin2@yopmail.com', '7b902e6ff1db9f560443f2048974fd7d386975b0', 'http://s3.amazonaws.com/37assets/svn/765-default-avatar.png', 1, 3, 'e4d6f88bb5b44d6d2f85226708f4dd6a3dc52f1c', NULL),
(9, 'TartineMaster', 'Banane', 'Arthur', 'Homme', 'arthurroi54@hotmail.fr', '25ab0b0e4f93ce18512c5ec7ef62b2d572c11212', 'http://s3.amazonaws.com/37assets/svn/765-default-avatar.png', 1, 3, '17ba413a796ae9c5694454b51642602dd410323c', 1423173987),
(10, 'Korkulen', 'Deltoro', 'Hubert', 'Homme', 'hubertdeltoro@gmail.com', '5aca3d3a0d593a8c55ec6bfacd163a6171777cbd', 'http://s3.amazonaws.com/37assets/svn/765-default-avatar.png', 1, 3, '7c26821f796124acb1aa6fb0f42053c2485f246d', 1423173696);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `amis`
--
ALTER TABLE `amis`
  ADD KEY `fk_user_has_user_user1_idx` (`iduser2`),
  ADD KEY `fk_user_has_user_user_idx` (`iduser1`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idcommentaire`),
  ADD KEY `fk_commentaire_user1_idx` (`iduser`),
  ADD KEY `fk_commentaire_news1_idx` (`idnews`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`idevent`),
  ADD KEY `fk_event_user1_idx` (`idorganisateur`),
  ADD KEY `fk_event_jeux1_idx` (`idjeux`);

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`idForum`),
  ADD KEY `fk_forum_forum1_idx` (`idpere`),
  ADD KEY `fk_forum_categorie1_idx` (`idcategorie`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD KEY `fk_jeux_has_user_user1_idx` (`iduser`),
  ADD KEY `fk_jeux_has_user_jeux1_idx` (`idjeux`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`idmessage`),
  ADD KEY `fk_message_user3_idx` (`iduser`),
  ADD KEY `fk_message_topic1_idx` (`idtopic`);

--
-- Index pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD PRIMARY KEY (`idmessage`),
  ADD KEY `fk_message_user1_idx` (`idauteur`),
  ADD KEY `fk_message_user2_idx` (`iddestinataire`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`idnews`),
  ADD KEY `fk_news_user1_idx` (`idauteur`),
  ADD KEY `fk_news_jeux1_idx` (`idjeux`);

--
-- Index pour la table `participant`
--
ALTER TABLE `participant`
  ADD KEY `fk_event_has_user_user1_idx` (`iduser`),
  ADD KEY `fk_event_has_user_event1_idx` (`idevent`);

--
-- Index pour la table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`idjeux`);

--
-- Index pour la table `tchat`
--
ALTER TABLE `tchat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`idtopic`),
  ADD KEY `fk_topic_forum1_idx` (`forum_idForum`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idcommentaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `idevent` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `idForum` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `idmessage` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `messagerie`
--
ALTER TABLE `messagerie`
  MODIFY `idmessage` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `idnews` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `section`
--
ALTER TABLE `section`
  MODIFY `idjeux` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `tchat`
--
ALTER TABLE `tchat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=343;
--
-- AUTO_INCREMENT pour la table `topic`
--
ALTER TABLE `topic`
  MODIFY `idtopic` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `amis`
--
ALTER TABLE `amis`
  ADD CONSTRAINT `fk_user_has_user_user` FOREIGN KEY (`iduser1`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_user_user1` FOREIGN KEY (`iduser2`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_commentaire_news1` FOREIGN KEY (`idnews`) REFERENCES `news` (`idnews`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_commentaire_user1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_event_jeux1` FOREIGN KEY (`idjeux`) REFERENCES `section` (`idjeux`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_event_user1` FOREIGN KEY (`idorganisateur`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `fk_forum_categorie1` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_forum_forum1` FOREIGN KEY (`idpere`) REFERENCES `forum` (`idForum`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD CONSTRAINT `fk_jeux_has_user_jeux1` FOREIGN KEY (`idjeux`) REFERENCES `section` (`idjeux`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jeux_has_user_user1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_topic1` FOREIGN KEY (`idtopic`) REFERENCES `topic` (`idtopic`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_message_user3` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD CONSTRAINT `fk_message_user1` FOREIGN KEY (`idauteur`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_message_user2` FOREIGN KEY (`iddestinataire`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_news_jeux1` FOREIGN KEY (`idjeux`) REFERENCES `section` (`idjeux`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_news_user1` FOREIGN KEY (`idauteur`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `fk_event_has_user_event1` FOREIGN KEY (`idevent`) REFERENCES `event` (`idevent`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_event_has_user_user1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `fk_topic_forum1` FOREIGN KEY (`forum_idForum`) REFERENCES `forum` (`idForum`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
