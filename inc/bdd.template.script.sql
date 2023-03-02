-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 17 nov. 2022 à 10:58
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tp_centre_equestre`
--

-- --------------------------------------------------------

--
-- Structure de la table `cheval`
--

CREATE TABLE `cheval` (
  `id_cheval` int(11) NOT NULL,
  `SIRE` varchar(9) NOT NULL,
  `nom_cheval` varchar(65) NOT NULL,
  `id_robe` int(7) NOT NULL,
  `id_cav` int,
  `photo_cheval` VARCHAR(255) NULL,
  `valid` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_cheval`),
  CONSTRAINT fk_id_rob FOREIGN KEY(`id_robe`) REFERENCES `robe`(`id_robe`),
  CONSTRAINT fk_id_cav FOREIGN KEY(`id_cav`) REFERENCES `personne`(`id_personne`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cheval`
--

INSERT INTO `cheval` (`id_cheval`,`SIRE`,`nom_cheval`,`id_robe`,`id_cav`,`photo_cheval`) VALUES
(1,'000000001','Flamme des tenebres',1,5,'default.jpg'),
(2,'000000002','Aurore pure',2,2,'default.jpg'),
(3,'000000003','Horizon fluiviale',3,"",'default.jpg'),
(4,'000000004','Rosee printaniere',4,"",'default.jpg'),
(5,'000000005','Liberte matinal',5,4,'default.jpg'),
(6,'000000006','Chemin pourpre',6,5,'default.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `est_pensionnaire`
--

CREATE TABLE `est_pensionnaire` (
  `id_pension` int(11) NOT NULL,
  `id_personne` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `est_pensionnaire`
--

INSERT INTO `est_pensionnaire` (`id_pension`, `id_personne`) VALUES
(1, 3),
(4, 10),
(7, 5),
(7, 9),
(14, 10);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id_inscription` int(7) NOT NULL,
  `montant_cotisation` int(4) NOT NULL,
  `montant_ffe` int(3) NOT NULL,
  `annee` VARCHAR(255) NOT NULL,
  `id_cav` int(3) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pension`
--

CREATE TABLE `pension` (
  `id_pension` int(11) NOT NULL,
  `libelle_pension` varchar(65) NOT NULL,
  `tarif` int(4) NOT NULL,
  `date_de_debut` date NOT NULL,
  `duree` int(2) NOT NULL,
  `id_cheval` int(11) NOT NULL,
  `actif` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pension`
--

INSERT INTO `pension` (`id_pension`, `libelle_pension`, `tarif`, `date_de_debut`, `duree`, `id_cheval`, `actif`) VALUES
(1, 'sa', 1200, '2022-10-11', 0, 1, 1),
(2, 'azef', 10, '2022-10-20', 0, 4, 1),
(3, 'rxr', 17, '1997-05-31', 4, 2, 0),
(4, 'azofin', 31, '2022-08-05', 15, 5, 1),
(6, 'aaaaaaaaaa', 15, '2022-07-08', 7, 2, 1),
(7, 'aaaaaaaaaa', 15, '2022-07-08', 7, 6, 0),
(8, 'aaaaaaaaaa', 15, '2022-07-08', 7, 3, 1),
(10, 'simnon', 9, '2022-10-08', 3, 4, 1),
(11, '', 0, '0000-00-00', 0, 5, 1),
(12, 'simnon', 9, '2022-10-08', 3, 1, 0),
(13, 'a', 1, '2022-10-01', 1, 6, 1),
(14, '', 0, '0000-00-00', 0, 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id_personne` int(11) NOT NULL,
  `nom_personne` varchar(255) NOT NULL,
  `prenom_personne` varchar(255) NOT NULL,
  `date_de_naissance` varchar(10) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `photo` varchar(20) DEFAULT NULL,
  `actif` tinyint(4) NOT NULL,
  `num_licence` varchar(9) DEFAULT NULL,
  `galop` int(11) DEFAULT NULL,
  `rue` varchar(85) DEFAULT NULL,
  `complement` varchar(85) DEFAULT NULL,
  `code_postal` int(11) DEFAULT NULL,
  `ville` varchar(85) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id_personne`, `nom_personne`, `prenom_personne`, `date_de_naissance`, `mail`, `tel`, `photo`, `actif`, `num_licence`, `galop`, `rue`, `complement`, `code_postal`, `ville`) VALUES
(1, 'Legrand', 'Robert', '02/05/1986', 'robert.legrand@mail.com', '07xxxxxxxx', 'default.jpg', 0, '000000001', 2, '', '', NULL, ''),
(2, 'Legrand', 'Colette', '25/01/1991', 'colette.legrand@mail.com', '07xxxxxxxx', 'default.jpg', 1, '000000001', 2, '', '', NULL, ''),
(3, 'Bernard', 'Michel', '09/09/1979', 'bernard.michel@mail.com', '07.xxxxxxxx', 'default.jpg', 1, '', 0, 'Avenue Saint Honoré', '53 bis', 19053, 'Saint Astier'),
(4, 'Richard', 'Tom', '10/05/2001', 'richard.tom@mail.com', '07xxxxxxxx', 'default.jpg', 1, '000000001', 2, '', '', NULL, ''),
(5, 'Durand', 'Axel', '23/04/1982', 'durand.axel@mail.com', '07xxxxxxxx', 'default.jpg', 1, '', 0, 'Rue Malbec', '05', 33800, 'Bordeaux'),
(6, 'Agel', 'Tom', '05/12/2000', 'agel.tom@mail.com', '07xxxxxxxx', 'default.jpg', 0, '000000001', 2, '', '', NULL, ''),
(7, 'Petit', 'Pierre', '03/04/1992', 'petit.pierre@mail.com', '07xxxxxxxx', 'default.jpg', 1, '000000001', 2, '', '', NULL, ''),
(8, 'André', 'René', '07/06/1996', 'andre.rene@mail.com', '07xxxxxxxx', 'default.jpg', 1, '', 0, 'Place de la liverte', '1', 25600, 'Libourne'),
(9, 'Charles', 'Renault', '14/02/1972', 'charles.renault@mail.com', '07xxxxxxxx', 'default.jpg', 1, '000000001', 2, '', '', NULL, ''),
(10, 'Francois', 'Chevalier', '10/11/1982', 'chevalier.francois@mail.com', '07xxxxxxxx', 'default.jpg', 1, '', 0, 'Chemin du Pouget', '8', 19100, 'Brive-la-Gaillarde');

-- --------------------------------------------------------

--
-- Structure de la table `robe`
--

CREATE TABLE `robe` (
  `id_robe` int(11) NOT NULL,
  `libelle_robe` varchar(65) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `robe`
--

INSERT INTO `robe` (`id_robe`, `libelle_robe`) VALUES
(1, 'Alezan'),
(2, 'Café au lait'),
(3, 'Noir'),
(4, 'Blanc'),
(5, 'Bai'),
(6, 'Isabelle'),
(7, 'Souris'),
(8, 'Aubère'),
(9, 'Grise'),
(10, 'Louvet'),
(11, 'Rouan'),
(12, 'Pie');

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

CREATE TABLE `tarif` (
  `id_tarif` int(11) NOT NULL,
  `libelle_tarif` varchar(65) NOT NULL,
  `pap_mois` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `participation`
--

CREATE TABLE `participation` (
  `id_cour` INT NOT NULL,
  `id_week_cour` INT NOT NULL,
  `id_cav` INT NOT NULL,
  `actif` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_cour`, `id_cav`),
  INDEX `fk_id_cav_idx` (`id_cav` ASC) VISIBLE,
  CONSTRAINT `fk_id_cav_cours`
    FOREIGN KEY (`id_cav`)
    REFERENCES `tp_centre_equestre`.`personne` (`id_personne`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_cours`
    FOREIGN KEY (`id_cour`)
    REFERENCES `tp_centre_equestre`.`cours` (`id_cours`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_week_cour`
    FOREIGN KEY (`id_week_cour`)
    REFERENCES `cours` (`id_week_cours`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    );


CREATE TABLE `cours`(
  `id_cours`INT NOT NULL,
  `id_week_cours` INT NOT NULL ,
  `title` VARCHAR(45) NOT NULL ,
  `actif` TINYINT NOT NULL DEFAULT 1 ,
  `end_event` DATETIME NOT NULL ,
  `start_event` DATETIME NOT NULL ,
  PRIMARY KEY (`id_cours`, `id_week_cours`)
);

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `nom_utilisateur` varchar(35) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `type` varchar(35) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_utilisateur`, `mdp`, `type`) VALUES
(1, 'robert.legrand@mail.com', '21232f297a57a5a743894a0e4a801fc3', 'u'),
(2, 'catherineL.compta', '81dc9bdb52d04dc20036dbd8313ed055', 'a'),
(3, 'testcompte', '81dc9bdb52d04dc20036dbd8313ed055', 'u'),
(4, 's', '7b774effe4a349c6dd82ad4f4f21d34c', 'u'),
(5, 'valid', '8277e0910d750195b448797616e091ad', 'u'),
(6, 'cav@mail.fr', 'yMtMrzC0JOz5Ox', 'u'),
(7, 'cav@mail.fr', 'ztEnYAJYXUyjDl', 'u'),
(8, '', '17cdeb32624223be1ca96fffeeadb035', 'u'),
(9, 'rep@mail.fr', 'e4f94c7038e88ce826e0b6cca8d34ce8', 'u'),
(10, '', '3dbff4f8b8364f38fdf8f604d94d9995', 'u'),
(11, 'rep@mail.fr', 'c5d5ab497c849f70d77a0e28ac3b36e8', 'u'),
(12, '', '4bfaf5afbfcb51faf462041da2c1287a', 'u'),
(13, 'rep@mail.fr', 'da6fe1e28af6c2e26551e41e40fa74e6', 'u'),
(14, '', '3648f0a67c4310df71f8cb295c00a8aa', 'u'),
(15, '', 'a3b4851085e4eef5ee52098ba291cc9d', 'u'),
(16, '', '8344d2da7381702349c33d444d2b6f74', 'u'),
(17, '', 'd59bc2486e5ae1b46c5d02accedccaf4', 'u'),
(18, '', 'a9464978bb4693fa6fbb012bc681b1e3', 'u'),
(19, 'rep@mail.fr', 'd12276cc191a4a924660381828642369', 'u'),
(20, 'cav@mail.fr', '3b037394d2125125dad6ff7b9b13d6f0', 'u'),
(21, 'rep@mail.fr', 'bd362e75b25f04ec85cb58e62d5a4635', 'u'),
(22, 'cav@mail.fr', 'ca053a13bdd479a4ad7b0f8e7369e4ac', 'u'),
(23, 'cav@mail.fr', '88fd8471b31f5c099bc85128dac8b52e', 'u'),
(24, 'cav@mail.fr', 'b1344a93fd130fcc139be559c37c6c43', 'u');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cheval`
--
ALTER TABLE `cheval`
  ADD KEY `fk_id_rob` (`id_robe`),
  ADD KEY `fk_id_cav` (`id_cav`);

--
-- Index pour la table `est_pensionnaire`
--
ALTER TABLE `est_pensionnaire`
  ADD PRIMARY KEY (`id_pension`,`id_personne`),
  ADD KEY `fk_id_personne` (`id_personne`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD COLUMN `valid` TINYINT NOT NULL DEFAULT 1 AFTER `id_cav`,
  ADD PRIMARY KEY (`id_inscription`);

--
-- Index pour la table `pension`
--
ALTER TABLE `pension`
  ADD PRIMARY KEY (`id_pension`),
  ADD KEY `id_cheval` (`id_cheval`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_personne`);

--
-- Index pour la table `robe`
--
ALTER TABLE `robe`
  ADD PRIMARY KEY (`id_robe`);

--
-- Index pour la table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cheval`
--
ALTER TABLE `cheval`
  MODIFY `id_cheval` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id_inscription` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pension`
--
ALTER TABLE `pension`
  MODIFY `id_pension` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `robe`
--
ALTER TABLE `robe`
  MODIFY `id_robe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cheval`
--
ALTER TABLE `cheval`
  ADD CONSTRAINT `fk_id_cav` FOREIGN KEY (`id_cav`) REFERENCES `personne` (`id_personne`),
  ADD CONSTRAINT `fk_id_rob` FOREIGN KEY (`id_robe`) REFERENCES `robe` (`id_robe`);

--
-- Contraintes pour la table `est_pensionnaire`
--
ALTER TABLE `est_pensionnaire`
  ADD CONSTRAINT `fk_id_pension` FOREIGN KEY (`id_pension`) REFERENCES `pension` (`id_pension`),
  ADD CONSTRAINT `fk_id_personne` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);

--
-- Contraintes pour la table `pension`
--
ALTER TABLE `pension`
  ADD CONSTRAINT `fk_id_cheval` FOREIGN KEY (`id_cheval`) REFERENCES `cheval` (`id_cheval`);

--
-- Contraintes pour la table `pension`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `fk_id_cavalier` FOREIGN KEY (`id_cav`) REFERENCES `personne` (`id_personne`);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;