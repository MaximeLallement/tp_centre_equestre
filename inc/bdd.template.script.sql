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
  `photo` varchar(255),
  `actif` tinyint NOT NULL DEFAULT 1,
  `num_licence` varchar(9) DEFAULT NULL,
  `id_representant` int,
  `galop` int DEFAULT NULL,
  `rue` varchar(85),
  `complement` varchar(85),
  `code_postal` varchar(85) ,
  `ville` varchar(85),
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id_personne`, `nom_personne`, `prenom_personne`, `date_de_naissance`, `mail`, `tel`,`photo`, `actif`,
						`galop`,`num_licence`,`id_representant`,`rue`,`complement`,`code_postal`,`ville`) VALUES
                        
(1, 'Legrand', 'Robert', '1986/04/05', 'robert.legrand@mail.com', '0701020304','default.jpg', 1,'2','000000001',5,'','',null,''),
(2, 'Legrand', 'Colette', '1991-01-25', 'colette.legrand@mail.com', '0702030405','default.jpg', 1,'2','000000001',5,'','',null,''),
(4, 'Richard', 'Tom', '2001-05-10', 'richard.tom@mail.com', '0703040506','default.jpg', 1,'2','000000001',8,'','',null,''),
(6, 'Agel', 'Tom', '2000-05-10', 'agel.tom@mail.com', '0704050607','default.jpg', 1,'2','000000001',8,'','',null,''),
(7, 'Petit', 'Pierre', '1992-03-04', 'petit.pierre@mail.com', '0705060708','default.jpg', 1,'2','000000001',8,'','',null,''),
(9, 'Charles', 'Renault', '1972-06-07', 'charles.renault@mail.com', '0706070809','default.jpg', 1,'2','000000001',10,'','',null,''),
(3, 'Bernard', 'Michel', '1979-09-09', 'bernard.michel@mail.com', '0707080910','default.jpg', 1,'5','000000001','','Avenue Saint Honoré','53 bis','19053','Saint Astier'),
(5, 'Durand', 'Axel', '1982-05-07', 'durand.axel@mail.com', '0708091011','default.jpg', 1,'0','','','Rue Malbec','05','33800','Bordeaux'),
(8, 'André', 'René', '1996-05-03', 'andre.rene@mail.com', '0709101112','default.jpg', 1,'0','','','Place de la liverte','1','25600','Libourne'),
(10, 'Francois', 'Chevalier', '1982-10-12', 'chevalier.francois@mail.com', '0710111213','default.jpg', 1,'0','','','Chemin du Pouget','8','19100','Brive-la-Gaillarde');

-- --------------------------------------------------------

--
-- Structure de la table `robe`
--

DROP TABLE IF EXISTS `robe`;
CREATE TABLE IF NOT EXISTS `robe` (
  `id_robe` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_robe` varchar(65) NOT NULL,
  PRIMARY KEY (`id_robe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Structure de la table `cheval`
--

DROP TABLE IF EXISTS `cheval`;
CREATE TABLE IF NOT EXISTS `cheval` (
  `id_cheval` int NOT NULL AUTO_INCREMENT,
  `SIRE` varchar(9) NOT NULL,
  `nom_cheval` varchar(65) NOT NULL,
  `id_robe` int(7) NOT NULL,
  `id_cav` int,
  `photo_cheval` VARCHAR(255) NULL,
  `valid` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_cheval`),
  CONSTRAINT fk_id_rob FOREIGN KEY(`id_robe`) REFERENCES `robe`(`id_robe`),
  CONSTRAINT fk_id_cav FOREIGN KEY(`id_cav`) REFERENCES `personne`(`id_personne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement de la table `cheval`
--

INSERT INTO `cheval` (`id_cheval`,`SIRE`,`nom_cheval`,`id_robe`,`id_cav`,`photo_cheval`) VALUES
(1,'000000001','Flamme des tenebres',1,5,'default.jpg'),
(2,'000000002','Aurore pure',2,2,'default.jpg'),
(3,'000000003','Horizon fluiviale',3,,'default.jpg'),
(4,'000000004','Rosee printanière',4,,'default.jpg'),
(5,'000000005','Liberte matinal',5,4,'default.jpg'),
(6,'000000006','Chemin pourpre',6,5,'default.jpg');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

