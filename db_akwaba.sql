-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 31 jan. 2018 à 09:23
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_akwaba`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `libelle` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `libelle`, `description`) VALUES
(1, 'PLAGE', 'Espace en bordure d\'eau accessible avec possibilitÃ© de baignade, assistance maitre nageur, aire de repos et aire de jeu'),
(2, 'MUSEE', 'centre de loisir'),
(3, 'HEBERGEMENT ', 'HOTELS- MAISON D\'HÃ”TES, RESIDENCE:\r\nLieu d\'hÃ©bergement avec service restauration, connexion WI-FI');

-- --------------------------------------------------------

--
-- Structure de la table `professionnels`
--

CREATE TABLE `professionnels` (
  `id_pro` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `image` varchar(400) NOT NULL,
  `description` text NOT NULL,
  `id_ville` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `professionnels`
--

INSERT INTO `professionnels` (`id_pro`, `nom`, `email`, `adresse`, `image`, `description`, `id_ville`, `id_categorie`) VALUES
(8, 'les voyageurs du bout du monde', 'lesvoyageurs@gmail.com', '12 bp le bout du monde Bassam 12', 'salon1.jpg', 'Espace de convivialitÃ© composÃ©e d\'une maison d\'hÃ´te  05 Ã©toiles avec petit dÃ©jeuner au lit , WI-FI, piscine naturelle( source d\'eau), spa et centre commerciale.\r\n', 0, 3),
(9, 'les voyageurs du bout du monde', 'lesvoyageurs@gmail.com', '12 bp le bout du monde Bassam 12', 'salon1.jpg', 'maison d\'hÃ´tes 05 Ã©toiles', 0, 3),
(10, 'les voyageurs du bout du monde', 'lesvoyageurs@gmail.com', '12 bp le bout du monde Bassam 12', 'salon1.jpg', ' Maison d\'hÃ´tes 05 Ã©toiles\r\n', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `id_ville` int(11) NOT NULL,
  `nom_ville` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`id_ville`, `nom_ville`, `description`) VALUES
(1, 'ABIDJAN', 'ville du sud\r\n'),
(2, 'BASSAM', 'Patrimoine mondial de l\'UNESCO, Region des lagunes\r\nville cÃ´tiÃ¨re du sud de la CÃ´te d\'Ivoire,\r\nPLAGES, HÃ”TELS, RESTAURANTS,MUSES, CENTRES ARTISANAUX');

-- --------------------------------------------------------

--
-- Structure de la table `visiteurs`
--

CREATE TABLE `visiteurs` (
  `id_visiteur` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_ville` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`) USING BTREE;

--
-- Index pour la table `professionnels`
--
ALTER TABLE `professionnels`
  ADD PRIMARY KEY (`id_pro`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id_ville`);

--
-- Index pour la table `visiteurs`
--
ALTER TABLE `visiteurs`
  ADD PRIMARY KEY (`id_visiteur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `professionnels`
--
ALTER TABLE `professionnels`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `id_ville` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `visiteurs`
--
ALTER TABLE `visiteurs`
  MODIFY `id_visiteur` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
