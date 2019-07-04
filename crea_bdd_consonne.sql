-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 28 Juin 2019 à 13:39
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
CREATE DATABASE IF NOT EXISTS consonne;
USE consonne;

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
(3, 'test', 'je test mon formulaire');

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
(4, 2),
(5, 2),
(6, 2),
(7, 2);

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
(7, '2019-06-28', '14:00:00', '01:00:00', 'Switch');

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
  `fin_inscription` date NOT NULL COMMENT 'formule date inscription + 365'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `date_naissance`, `date_inscription`, `pseudo`, `carte`, `pass`, `pegi`, `statut`, `fin_inscription`) VALUES
(1, 'Lilian', 'Stoklosa', '1992-09-11', '2019-06-25', 'Faarged', '1', '$2y$10$/PeYrKXWAP5TKZuzlGDtbu1aC3CFCsuew3l4lkiL5rp6/IZR7oBru', '18', 'administrateur', '2019-08-25'),
(2, 'Petite', 'Personne', '2013-01-06', '2019-06-26', 'pepette', '12', '$2y$10$qEzQXaZcmbeLEAgdNWI8puv1HXIACvj6JNVQjNwXW8wzprVghS3W2', '6', 'adherent', '2020-06-26'),
(4, 'admin', 'admin', '1992-01-08', '2019-06-28', 'admin', '2', '$2y$10$5StkyTONxDnTqmc6PXDswOzJreFKgO8Og344Js9grUCzTjgA0Ccwi', '18', 'administrateur', '2020-01-01');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `breves`
--
ALTER TABLE `breves`
  ADD PRIMARY KEY (`id_breves`);

--
-- Index pour la table `fait`
--
ALTER TABLE `fait`
  ADD PRIMARY KEY (`id_resa`,`id_user`),
  ADD KEY `fait_users0_FK` (`id_user`);

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
  MODIFY `id_breves` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `materiel`
--
ALTER TABLE `materiel`
  MODIFY `id_materiel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_resa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `fait`
--
ALTER TABLE `fait`
  ADD CONSTRAINT `fait_reservation_FK` FOREIGN KEY (`id_resa`) REFERENCES `reservation` (`id_resa`),
  ADD CONSTRAINT `fait_users0_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;