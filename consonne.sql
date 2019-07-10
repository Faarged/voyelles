-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 10 Juillet 2019 à 10:16
-- Version du serveur :  5.7.26-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `consonne`
--

-- --------------------------------------------------------

--
-- Structure de la table `breves`
--

CREATE TABLE `breves` (
  `id_breves` int(11) NOT NULL,
  `titre_breves` varchar(50) NOT NULL,
  `contenu_breves` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `breves`
--

INSERT INTO `breves` (`id_breves`, `titre_breves`, `contenu_breves`) VALUES
(10, 'Stats', 'Réfléchir à comment faire la page des stats'),
(11, 'stats pegi', 'Faire fonction sql qui compte le nb de chaq pegi inscrit et le mettre sous forme de barres');

-- --------------------------------------------------------

--
-- Structure de la table `configuration`
--

CREATE TABLE `configuration` (
  `id_config` int(11) NOT NULL,
  `jour` varchar(50) NOT NULL,
  `ouverture` time DEFAULT NULL,
  `fermeture` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `configuration`
--

INSERT INTO `configuration` (`id_config`, `jour`, `ouverture`, `fermeture`) VALUES
(1, 'Lundi', NULL, NULL),
(2, 'Mardi', '13:00:00', '18:00:00'),
(3, 'Mercredi', '10:00:00', '18:00:00'),
(4, 'Jeudi', '13:00:00', '18:00:00'),
(5, 'Vendredi', '13:00:00', '18:00:00'),
(6, 'Samedi', '10:00:00', '18:00:00'),
(7, 'Dimanche', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `disponible`
--

CREATE TABLE `disponible` (
  `id_jeu` int(11) NOT NULL,
  `id_materiel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fait`
--

CREATE TABLE `fait` (
  `id_resa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fait`
--

INSERT INTO `fait` (`id_resa`, `id_user`) VALUES
(5, 2),
(6, 2),
(7, 2),
(11, 2),
(12, 2),
(13, 2),
(20, 2),
(21, 2),
(22, 2),
(24, 2),
(27, 2),
(14, 6),
(15, 6),
(16, 6),
(23, 6),
(26, 6),
(17, 7),
(18, 7),
(19, 7),
(25, 7),
(28, 7),
(29, 7);

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE `jeux` (
  `id_jeu` int(11) NOT NULL,
  `titre` varchar(70) NOT NULL,
  `pegi_jeu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE `materiel` (
  `id_materiel` int(11) NOT NULL,
  `nom_materiel` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `materiel`
--

INSERT INTO `materiel` (`id_materiel`, `nom_materiel`, `type`) VALUES
(1, 'Switch', 'console'),
(2, 'Switch', 'accessoire'),
(3, 'PS4', 'console'),
(4, 'PS4', 'accessoire'),
(5, 'Xbox One', 'console'),
(6, 'Xbox One', 'accessoire'),
(7, 'Wii U', 'console'),
(8, 'Wii U', 'accessoire');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_resa` int(11) NOT NULL,
  `date_resa` date NOT NULL COMMENT 'format AAAA-JJ-MM',
  `debut_resa` time NOT NULL,
  `duree` time NOT NULL,
  `materiel_res` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`id_resa`, `date_resa`, `debut_resa`, `duree`, `materiel_res`) VALUES
(4, '2019-12-05', '05:35:00', '01:00:00', 'Xbox one'),
(5, '2019-06-30', '13:00:00', '00:30:00', 'Switch'),
(6, '2019-06-28', '13:00:00', '01:00:00', 'Switch'),
(7, '2019-06-28', '14:00:00', '01:00:00', 'Switch'),
(11, '2019-07-03', '11:00:00', '01:00:00', 'Switch'),
(12, '2019-07-03', '13:00:00', '01:30:00', 'Xbox one'),
(13, '2019-07-03', '10:15:00', '00:30:00', 'Xbox one'),
(14, '2019-07-03', '14:15:00', '01:00:00', 'Switch'),
(15, '2019-07-03', '17:15:00', '00:30:00', 'ps4'),
(16, '2019-07-03', '11:00:00', '00:15:00', 'ps4'),
(17, '2019-07-03', '14:15:00', '00:15:00', 'Switch'),
(18, '2019-07-03', '13:00:00', '00:30:00', 'Xbox one'),
(19, '2019-07-03', '11:30:00', '00:30:00', 'Xbox one'),
(20, '2019-07-05', '10:45:00', '00:15:00', 'Xbox one'),
(21, '2019-07-05', '13:30:00', '00:30:00', 'ps4'),
(22, '2019-07-06', '11:45:00', '00:15:00', 'Xbox one'),
(23, '2019-07-06', '12:55:00', '00:30:00', 'Switch'),
(24, '2019-07-06', '15:37:00', '00:30:00', 'Switch'),
(25, '2019-07-06', '15:38:00', '01:00:00', 'Switch'),
(26, '2019-07-06', '15:38:00', '00:30:00', 'Xbox one'),
(27, '2019-07-06', '16:46:00', '00:20:00', 'Switch'),
(28, '2019-07-09', '10:00:00', '00:30:00', 'Switch'),
(29, '2019-07-09', '15:41:00', '01:00:00', 'Xbox one');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL COMMENT 'format AAAA-JJ-MM',
  `date_inscription` date NOT NULL COMMENT 'format AAAA-JJ-MM',
  `pseudo` varchar(50) NOT NULL,
  `carte` varchar(50) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `pegi` varchar(50) NOT NULL,
  `statut` varchar(50) NOT NULL,
  `fin_inscription` date NOT NULL COMMENT 'formule date inscription + 365',
  `temps` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `date_naissance`, `date_inscription`, `pseudo`, `carte`, `pass`, `pegi`, `statut`, `fin_inscription`, `temps`) VALUES
(1, 'Stoklosa', 'Lilian', '1992-09-11', '2019-06-25', 'Faarged', '1', '$2y$10$/PeYrKXWAP5TKZuzlGDtbu1aC3CFCsuew3l4lkiL5rp6/IZR7oBru', '18', 'administrateur', '2019-08-25', NULL),
(2, 'Petite', 'Personne', '2013-01-06', '2019-06-26', 'pepette', '12', '$2y$10$qEzQXaZcmbeLEAgdNWI8puv1HXIACvj6JNVQjNwXW8wzprVghS3W2', '6', 'adherent', '2020-06-26', '01:00:00'),
(4, 'admin', 'admin', '1992-01-08', '2019-06-28', 'admin', '2', '$2y$10$5StkyTONxDnTqmc6PXDswOzJreFKgO8Og344Js9grUCzTjgA0Ccwi', '18', 'administrateur', '2020-01-01', NULL),
(5, 'guillaume', 'guillaume', '1990-01-01', '2019-07-02', 'guillaume', '3', '$2y$10$K7jDQZWtsJOTwZPlSdxaNupzS8WwIkyULKPZepG4HtocZjYjqLI8S', '18', 'administrateur', '2031-01-01', NULL),
(6, 'Faarged', 'Dogrof', '1992-09-11', '2019-07-03', 'Degraaf', '7', '$2y$10$WUWC0sp9JaRP/Vhp5X0cwO032.REClCKKTP5PHSqTHJXowLDLJGh6', '18', 'adherent', '2020-06-30', '02:00:00'),
(7, 'Faa', 'Fee', '1999-02-19', '2019-07-03', 'Faergya', '5', '$2y$10$Wn6k426us4avOs37iUj3BO2Q9BTy01kv1bjzV0TNtsQH8dPfNd//y', '18', 'adherent', '2020-07-01', '02:00:00'),
(8, 'Catalogage', 'catalogage', '2000-01-01', '2019-07-03', 'catalogage', '10', '$2y$10$dR1kNLldRu706KUbVJCPf.oFDQDcxQx7NQE4pdiyHGHOcYQ0UVjgS', '18', 'adherent', '2020-07-31', '01:00:00'),
(9, 'Aiken', 'Evahn', '2000-06-08', '2019-07-09', 'Evahn', '0000', '$2y$10$m9.aDPN4rG95JpJF.WCuLu/bv/q6h503lBX6hgNIu72OPRcZ0zNY2', '18', 'adherent', '2020-06-17', '02:00:00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `breves`
--
ALTER TABLE `breves`
  ADD PRIMARY KEY (`id_breves`);

--
-- Index pour la table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id_config`);

--
-- Index pour la table `disponible`
--
ALTER TABLE `disponible`
  ADD PRIMARY KEY (`id_jeu`,`id_materiel`),
  ADD KEY `disponible_materiel0_FK` (`id_materiel`);

--
-- Index pour la table `fait`
--
ALTER TABLE `fait`
  ADD PRIMARY KEY (`id_resa`,`id_user`),
  ADD KEY `fait_users0_FK` (`id_user`);

--
-- Index pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`id_jeu`);

--
-- Index pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD PRIMARY KEY (`id_materiel`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_resa`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `breves`
--
ALTER TABLE `breves`
  MODIFY `id_breves` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `id_jeu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `materiel`
--
ALTER TABLE `materiel`
  MODIFY `id_materiel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_resa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `disponible`
--
ALTER TABLE `disponible`
  ADD CONSTRAINT `disponible_jeux_FK` FOREIGN KEY (`id_jeu`) REFERENCES `jeux` (`id_jeu`),
  ADD CONSTRAINT `disponible_materiel0_FK` FOREIGN KEY (`id_materiel`) REFERENCES `materiel` (`id_materiel`);

--
-- Contraintes pour la table `fait`
--
ALTER TABLE `fait`
  ADD CONSTRAINT `fait_reservation_FK` FOREIGN KEY (`id_resa`) REFERENCES `reservation` (`id_resa`),
  ADD CONSTRAINT `fait_users0_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
