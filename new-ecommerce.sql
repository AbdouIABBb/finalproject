-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 03 juin 2022 à 15:05
-- Version du serveur : 5.7.24
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `new-ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `email`, `mp`) VALUES
(2, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `auteur` text NOT NULL,
  `resume` text CHARACTER SET latin1 NOT NULL,
  `prix` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id`, `nom`, `auteur`, `resume`, `prix`, `image`, `quantite`, `category`) VALUES
(28, 'Roger et ses humains', 'Cyprien', 'hugo jeune chomeur accro Ã  Internet mÃ¨ne une vie ordinaire avec sa copine Florence Mais un jour il dÃ©couvre dans son salon un colis qui referme un robot avec une intelligence artificielle quil nomme Roger', 3000, '6294e3a05ad660.12466392.jpg', 26, 13),
(31, 'la fille de papier', 'Guillaume Musso', 'Tom Boyd, un &eacute;crivain c&eacute;l&egrave;bre en panne d&#039;inspiration, voit surgir dans sa vie l&#039;h&eacute;ro&iuml;ne de ses romans. Elle est jolie, elle est d&eacute;sesp&eacute;r&eacute;e, elle va mourir s&#039;il s&#039;arr&ecirc;te d&#039;&eacute;crire.', 2500, '6299e0fd4e7092.32634180.jpg', 4, 17);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `nom`, `description`) VALUES
(13, 'LittÃ©rature ', ''),
(14, 'Policier', ''),
(15, 'Horreur', ''),
(16, 'BD', ''),
(17, 'Roman contemporain ', '');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `total` float NOT NULL,
  `panier` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `quantite`, `total`, `panier`, `date_creation`, `produit`) VALUES
(31, 1, 3000, 26, '2022-06-03', 28);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `user` int(255) NOT NULL,
  `total` float NOT NULL,
  `etat` varchar(255) DEFAULT NULL,
  `date_creation` date NOT NULL,
  `rue` varchar(250) NOT NULL,
  `ville` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `user`, `total`, `etat`, `date_creation`, `rue`, `ville`) VALUES
(26, 44, 3000, ' livraison en cours', '2022-06-03', 'ath yenni', 'tizi-ouzou');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`id`, `produit`, `quantite`) VALUES
(1, 5, 23),
(2, 8, 20),
(3, 9, 20),
(4, 10, 20),
(5, 11, 22),
(6, 12, 10),
(7, 13, 10),
(8, 14, 15),
(9, 15, 10),
(10, 16, 10),
(11, 17, 15),
(12, 18, 5),
(13, 19, 2),
(14, 20, 2),
(15, 21, 2),
(16, 22, 7);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT '0',
  `telephone` varchar(10) NOT NULL,
  `code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `nom`, `prenom`, `etat`, `telephone`, `code`) VALUES
(44, 'user@gmail.com', '2002518acba64ad3e9b937d548e0f3d1', 'user', 'user', 0, '0201030405', NULL),
(46, 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'abdou', 'abdou', 0, '9999999988', NULL),
(47, 'omarkhelifi233@gmail.com', '05a671c66aefea124cc08b76ea6d30bb', '', '', 0, '', 283440);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `user` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
