-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 26 sep. 2022 à 12:09
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `tp_centre_equestre`
--

-- --------------------------------------------------------

--
-- Structure de la table `cheval`
--

DROP TABLE IF EXISTS `cheval`;
CREATE TABLE IF NOT EXISTS `cheval` (
  `id_cheval` int(7) NOT NULL AUTO_INCREMENT,
  `SIRE` varchar(9) NOT NULL,
  `nom_cheval` varchar(65) NOT NULL,
  `id_robe` int(7) NOT NULL,
  PRIMARY KEY (`id_cheval`),
  KEY `id_robe` (`id_robe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement de la table `cheval`
--

INSERT INTO `cheval` (`id_cheval`,`SIRE`,`nom_cheval`,`id_robe`) VALUES
(1,'000000001','Flamme des tenebres',1),
(2,'000000002','Aurore pure',2),
(3,'000000003','Horizon fluiviale',3),
(4,'000000004','Rosee printanière',4),
(5,'000000005','Liberte matinal',5),
(6,'000000006','Chemin pourpre',6);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `id_cours` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_cours` varchar(85) NOT NULL,
  `date_cours` date NOT NULL,
  `duree_cours` int(2) NOT NULL,
  PRIMARY KEY (`id_cours`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `id_inscription` int(7) NOT NULL AUTO_INCREMENT,
  `montant_cotisation` int(4) NOT NULL,
  `montant_ffe` int(3) NOT NULL,
  PRIMARY KEY (`id_inscription`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pension`
--

DROP TABLE IF EXISTS `pension`;
CREATE TABLE IF NOT EXISTS `pension` (
  `id_pension` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_pension` varchar(65) NOT NULL,
  `tarif` int(4) NOT NULL,
  `date_de_debut` date NOT NULL,
  `duree` int(2) NOT NULL,
  PRIMARY KEY (`id_pension`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int NOT NULL AUTO_INCREMENT,
  `nom_personne` varchar(255) NOT NULL,
  `prenom_personne` varchar(255) NOT NULL,
  `date_de_naissance` varchar(10) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `photo` varchar(20),
  `actif` tinyint NOT NULL,
  `num_licence` varchar(9) DEFAULT NULL,
  `galop` int DEFAULT NULL,
  `rue` varchar(85),
  `complement` varchar(85),
  `code_postal` int ,
  `ville` varchar(85),
  PRIMARY KEY (`id_personne`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id_personne`, `nom_personne`, `prenom_personne`, `date_de_naissance`, `mail`, `tel`,`photo`, `actif`,
						`galop`,`num_licence`,`rue`,`complement`,`code_postal`,`ville`) VALUES
                        
(1, 'Legrand', 'Robert', '02/05/1986', 'robert.legrand@mail.com', '07xxxxxxxx','default.jpg', 1,'2','000000001','','',null,''),
(2, 'Legrand', 'Colette', '25/01/1991', 'colette.legrand@mail.com', '07xxxxxxxx','default.jpg', 1,'2','000000001','','',null,''),
(3, 'Bernard', 'Michel', '09/09/1979', 'bernard.michel@mail.com', '07.xxxxxxxx','default.jpg', 1,'','','Avenue Saint Honoré','53 bis','19053','Saint Astier'),
(4, 'Richard', 'Tom', '10/05/2001', 'richard.tom@mail.com', '07xxxxxxxx','default.jpg', 1,'2','000000001','','',null,''),
(5, 'Durand', 'Axel', '23/04/1982', 'durand.axel@mail.com', '07xxxxxxxx','default.jpg', 1,'','','Rue Malbec','05','33800','Bordeaux'),
(6, 'Agel', 'Tom', '05/12/2000', 'agel.tom@mail.com', '07xxxxxxxx','default.jpg', 1,'2','000000001','','',null,''),
(7, 'Petit', 'Pierre', '03/04/1992', 'petit.pierre@mail.com', '07xxxxxxxx','default.jpg', 1,'2','000000001','','',null,''),
(8, 'André', 'René', '07/06/1996', 'andre.rene@mail.com', '07xxxxxxxx','default.jpg', 1,'','','Place de la liverte','1','25600','Libourne'),
(9, 'Charles', 'Renault', '14/02/1972', 'charles.renault@mail.com', '07xxxxxxxx','default.jpg', 1,'2','000000001','','',null,''),
(10, 'Francois', 'Chevalier', '10/11/1982', 'chevalier.francois@mail.com', '07xxxxxxxx','default.jpg', 1,'','','Chemin du Pouget','8','19100','Brive-la-Gaillarde');

-- --------------------------------------------------------

--
-- Structure de la table `robe`
--

DROP TABLE IF EXISTS `robe`;
CREATE TABLE IF NOT EXISTS `robe` (
  `id_robe` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_robe` varchar(65) NOT NULL,
  PRIMARY KEY (`id_robe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargements table `robe`
--
INSERT INTO `robe` (`id_robe`,`libelle_robe`) VALUES
(1,'Alezan'),
(2,'Café au lait'),
(3,'Noir'),
(4,'Blanc'),
(5,'Bai'),
(6,'Isabelle'),
(7,'Souris'),
(8,'Aubère'),
(9,'Grise'),
(10,'Louvet'),
(11,'Rouan'),
(12,'Pie');
-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

DROP TABLE IF EXISTS `tarif`;
CREATE TABLE IF NOT EXISTS `tarif` (
  `id_tarif` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_tarif` varchar(65) NOT NULL,
  `pap_mois` int(4) NOT NULL,
  PRIMARY KEY (`id_tarif`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
COMMIT;

