-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 10 oct. 2023 à 11:47
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pendu`
--

-- --------------------------------------------------------

--
-- Structure de la table `accounts`
--

CREATE TABLE `accounts` (
  `id_account` int NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `accounts`
--

INSERT INTO `accounts` (`id_account`, `username`, `password`) VALUES
(1, 'quoicoubeh', '050acc593fa5a1cd4944beaa0ff8c9bb002024df9bf17b807f7ce486c4c96961'),
(2, 'charles', '937e092e49a09116e1c3d92a76b755796b6d5e6b3a6ffe49d029b57178e92233'),
(3, 'yo', 'c278ec5a69c34aace42773e41b1163e6ce40c906f2a14f807d39d1b2a1c2dff5'),
(4, 'anis', 'bdcc3a21f98c49b4b7fbe9066b855f6d0a205f144a4dd4ec525ca742fa320553'),
(5, 'jasser', '26429a356b1d25b7d57c0f9a6d5fed8a290cb42374185887dcd2874548df0779'),
(7, 'quoicoubeh2', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9');

-- --------------------------------------------------------

--
-- Structure de la table `mots`
--

CREATE TABLE `mots` (
  `id_mot` int NOT NULL,
  `valeur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mots`
--

INSERT INTO `mots` (`id_mot`, `valeur`) VALUES
(79057, 'Chat'),
(79058, 'Chien'),
(79059, 'Maison'),
(79060, 'Voiture'),
(79061, 'Avion'),
(79062, 'Montagne'),
(79063, 'Plage'),
(79064, 'Soleil'),
(79065, 'Lune'),
(79066, 'Etoile'),
(79067, 'Livre'),
(79068, 'Stylo'),
(79069, 'Table'),
(79070, 'Chaise'),
(79071, 'Porte'),
(79072, 'Fenetre'),
(79073, 'Telephone'),
(79074, 'Ordinateur'),
(79075, 'Musique'),
(79076, 'Film'),
(79077, 'Theatre'),
(79078, 'Amour'),
(79079, 'Amitie'),
(79080, 'Bonheur'),
(79081, 'Tristesse'),
(79082, 'Joie'),
(79083, 'Peur'),
(79084, 'Colere'),
(79085, 'Sourire'),
(79086, 'Rire'),
(79087, 'Pleurer'),
(79088, 'Danser'),
(79089, 'Chanter'),
(79090, 'Manger'),
(79091, 'Boire'),
(79092, 'Dormir'),
(79093, 'Rever'),
(79094, 'Voyager'),
(79095, 'Explorer'),
(79096, 'Decouvrir'),
(79097, 'Aventure'),
(79098, 'Nature'),
(79099, 'Foret'),
(79100, 'Riviere'),
(79101, 'Ocean'),
(79102, 'Montre'),
(79103, 'Temps'),
(79104, 'Annee'),
(79105, 'Jour'),
(79106, 'Nuit'),
(79107, 'Matin'),
(79108, 'Apres-midi'),
(79109, 'Soiree'),
(79110, 'Ecole'),
(79111, 'Professeur'),
(79112, 'Etudiant'),
(79113, 'Savoir'),
(79114, 'Apprendre'),
(79115, 'Science'),
(79116, 'Histoire'),
(79117, 'Geographie'),
(79118, 'Mathematiques'),
(79119, 'Art'),
(79120, 'Peinture'),
(79121, 'Sculpture'),
(79122, 'Musee'),
(79123, 'Couleur'),
(79124, 'Rouge'),
(79125, 'Bleu'),
(79126, 'Vert'),
(79127, 'Jaune'),
(79128, 'Noir'),
(79129, 'Blanc'),
(79130, 'Cuisine'),
(79131, 'Restaurant'),
(79132, 'Nourriture'),
(79133, 'Boisson'),
(79134, 'Cafe'),
(79135, 'The'),
(79136, 'Gateau'),
(79137, 'Bonjour'),
(79138, 'Bonsoir'),
(79139, 'Sil vous plait'),
(79140, 'Merci'),
(79141, 'Excusez-moi'),
(79142, 'Ville'),
(79143, 'Campagne'),
(79144, 'Vacances'),
(79145, 'Famille'),
(79146, 'Enfant'),
(79147, 'Parent'),
(79148, 'Frere'),
(79149, 'Soeur'),
(79150, 'Pere'),
(79151, 'Mere'),
(79152, 'Grand-pere'),
(79153, 'Grand-mere'),
(79154, 'Maison'),
(79155, 'Rue'),
(79156, 'Jardin');

-- --------------------------------------------------------

--
-- Structure de la table `parties`
--

CREATE TABLE `parties` (
  `id_partie` int NOT NULL,
  `erreurs` int DEFAULT NULL,
  `mots` varchar(255) DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  `username1` varchar(255) NOT NULL,
  `username2` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Déchargement des données de la table `parties`
--

INSERT INTO `parties` (`id_partie`, `erreurs`, `mots`, `result`, `username1`, `username2`) VALUES
(1, 12, 'enfant', 'loose', '', ''),
(2, 0, 'annee', 'win', '', ''),
(3, 0, 'Professeur', 'win', 'quoicoubeh', NULL),
(4, 0, 'Stylo', 'win', 'quoicoubeh', NULL),
(5, 0, 'Rever', 'win', 'quoicoubeh', NULL),
(6, 0, 'Danser', 'win', 'quoicoubeh', NULL),
(7, 1, 'Enfant', 'win', 'quoicoubeh', NULL),
(8, 12, 'Parent', 'loose', 'quoicoubeh', NULL),
(9, 1, 'Colere', 'win', 'charles', NULL),
(10, 12, 'Chaise', 'loose', 'yo', NULL),
(11, 0, 'Apprendre', 'win', 'yo', NULL),
(12, 6, 'Montagne', 'win', 'anis', NULL),
(13, 6, 'Frere', 'win', 'jasser', NULL),
(14, 2, 'Telephone', 'win', 'quoicoubeh2', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id_account`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Index pour la table `mots`
--
ALTER TABLE `mots`
  ADD PRIMARY KEY (`id_mot`);

--
-- Index pour la table `parties`
--
ALTER TABLE `parties`
  ADD PRIMARY KEY (`id_partie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id_account` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `mots`
--
ALTER TABLE `mots`
  MODIFY `id_mot` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79157;

--
-- AUTO_INCREMENT pour la table `parties`
--
ALTER TABLE `parties`
  MODIFY `id_partie` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
