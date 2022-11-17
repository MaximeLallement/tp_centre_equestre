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
  `id_cav` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cheval`
--

INSERT INTO `cheval` (`id_cheval`, `SIRE`, `nom_cheval`, `id_robe`, `id_cav`) VALUES
(1, '000000001', 'Flamme des tenebres', 1, NULL),
(2, '000000002', 'Aurore pure', 2, NULL),
(3, '000000003', 'Horizon fluiviale', 3, NULL),
(4, '000000004', 'Rosee printanière', 4, NULL),
(5, '000000005', 'Liberte matinal', 5, NULL),
(6, '000000006', 'Chemin pourpre', 6, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `est_pensionnaire`
--

CREATE TABLE `est_pensionnaire` (
  `id_pension` int(11) NOT NULL,
  `id_personne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `montant_ffe` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cheval`
--
ALTER TABLE `cheval`
  ADD PRIMARY KEY (`id_cheval`),
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
