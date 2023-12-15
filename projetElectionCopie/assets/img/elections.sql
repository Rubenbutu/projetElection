-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 25 oct. 2023 à 10:43
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `elections`
--

-- --------------------------------------------------------

--
-- Structure de la table `bureau`
--

DROP TABLE IF EXISTS `bureau`;
CREATE TABLE IF NOT EXISTS `bureau` (
  `id_bureau` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_bureau` varchar(50) NOT NULL,
  `id_centre` int(11) NOT NULL,
  PRIMARY KEY (`id_bureau`),
  KEY `fk` (`id_centre`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bureau`
--

INSERT INTO `bureau` (`id_bureau`, `libelle_bureau`, `id_centre`) VALUES
(3, 'bureau1', 3),
(4, 'bureau2', 4),
(5, 'bureau3', 4),
(6, 'bureau4', 4);

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

DROP TABLE IF EXISTS `candidat`;
CREATE TABLE IF NOT EXISTS `candidat` (
  `numero` int(11) NOT NULL,
  `nom_cand` varchar(50) NOT NULL,
  `postnom_cand` varchar(50) NOT NULL,
  `prenom_cand` varchar(50) NOT NULL,
  `sexe_cand` enum('F','M') NOT NULL,
  `adresse_cand` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `id_circ` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`numero`),
  KEY `fkcir` (`id_circ`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`numero`, `nom_cand`, `postnom_cand`, `prenom_cand`, `sexe_cand`, `adresse_cand`, `mail`, `telephone`, `id_circ`, `id_cat`) VALUES
(10, 'TSHILOMBO', 'TSHISEKEDI', 'FELIX', 'M', 'KINSHASA', 'felix@gmail.com', '0977413180', 3, 0),
(11, 'KALALA', 'KITOKO', 'PRINCE', 'M', 'KINSHASA', 'kila@gmail.com', '0977413180', 3, 1),
(12, 'KALOLO', 'KITIOKO', 'PRINCE', 'M', 'KINSHASA', 'kila@gmail.com', '0977413180', 3, 1),
(13, 'KALOLO', 'KITIOKO', 'PRINCE', 'M', 'KINSHASA', 'kila@gmail.com', '0977413180', 3, 0),
(14, 'KONDO', 'KITIOKO', 'JEFF', 'M', 'KINSHASA', 'kila@gmail.com', '0977413180', 3, 0),
(20, 'tTt', 't', 't', 'F', 't', 't', 't', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `centre`
--

DROP TABLE IF EXISTS `centre`;
CREATE TABLE IF NOT EXISTS `centre` (
  `id_centre` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_centre` varchar(50) NOT NULL,
  `id_circ` int(11) NOT NULL,
  PRIMARY KEY (`id_centre`),
  KEY `fkcirc1` (`id_circ`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `centre`
--

INSERT INTO `centre` (`id_centre`, `libelle_centre`, `id_circ`) VALUES
(3, 'BOPETO', 3),
(4, 'KIMIA', 4);

-- --------------------------------------------------------

--
-- Structure de la table `circonscription`
--

DROP TABLE IF EXISTS `circonscription`;
CREATE TABLE IF NOT EXISTS `circonscription` (
  `id_circ` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `territoire` varchar(50) NOT NULL,
  `secteur` varchar(50) NOT NULL,
  PRIMARY KEY (`id_circ`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `circonscription`
--

INSERT INTO `circonscription` (`id_circ`, `libelle`, `province`, `territoire`, `secteur`) VALUES
(3, 'KINSHASAI', 'KINSHASA', 'KIN', 'KIN'),
(4, 'KINSHASAII', 'KINSHASA', 'KINSHASA', 'KINSHASA');

-- --------------------------------------------------------

--
-- Structure de la table `resultat`
--

DROP TABLE IF EXISTS `resultat`;
CREATE TABLE IF NOT EXISTS `resultat` (
  `id_res` int(11) NOT NULL AUTO_INCREMENT,
  `nbre_voix` int(11) NOT NULL,
  `id_bureau` int(11) NOT NULL,
  `num_cand` int(11) NOT NULL,
  `fichier` varchar(100) NOT NULL,
  PRIMARY KEY (`id_res`),
  KEY `fkr` (`id_bureau`),
  KEY `fkca` (`num_cand`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `resultat`
--

INSERT INTO `resultat` (`id_res`, `nbre_voix`, `id_bureau`, `num_cand`, `fichier`) VALUES
(15, 500, 3, 10, ''),
(16, 1000, 3, 13, '653837b71c4ef.jpg'),
(17, 1000, 3, 13, '6538380ab9881.jpg'),
(18, 1000, 3, 13, '65383b7fa577b.jpg'),
(19, 2000, 4, 13, '65383cb045b73.png'),
(20, 1200, 3, 14, '65383ccd1ca59.png'),
(24, 2000, 3, 11, '6538454771d7f.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(30) NOT NULL,
  `postnom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `sexe` enum('F','M') NOT NULL,
  `adresse_user` varchar(50) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `passeword` varchar(20) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `id_centre` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `fkcen` (`id_centre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `nom_user`, `postnom`, `prenom`, `sexe`, `adresse_user`, `telephone`, `mail`, `passeword`, `type`, `id_centre`) VALUES
(1, 'MOSEPINZA', 'BUTU', 'RUBEN', 'M', 'KINSHASA', '0977413180', 'ruben@gmail.com', '1111', 1, 3),
(2, 'KASIME', 'TENDELE', 'MOHAMED', 'M', 'KINSHASA', '0977413180', 'kasime@gmail.com', '2222', 0, 3);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bureau`
--
ALTER TABLE `bureau`
  ADD CONSTRAINT `fk` FOREIGN KEY (`id_centre`) REFERENCES `centre` (`id_centre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD CONSTRAINT `fkcir` FOREIGN KEY (`id_circ`) REFERENCES `circonscription` (`id_circ`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `centre`
--
ALTER TABLE `centre`
  ADD CONSTRAINT `fkcirc1` FOREIGN KEY (`id_circ`) REFERENCES `circonscription` (`id_circ`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `resultat`
--
ALTER TABLE `resultat`
  ADD CONSTRAINT `fkca` FOREIGN KEY (`num_cand`) REFERENCES `candidat` (`numero`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkr` FOREIGN KEY (`id_bureau`) REFERENCES `bureau` (`id_bureau`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fkcen` FOREIGN KEY (`id_centre`) REFERENCES `centre` (`id_centre`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
