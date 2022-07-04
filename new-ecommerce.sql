-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 04 juil. 2022 à 09:55
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.11

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
  `category` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id`, `nom`, `auteur`, `resume`, `prix`, `image`, `quantite`, `category`) VALUES
(31, 'la fille de papier', 'Guillaume Musso', 'Tom Boyd, un &eacute;crivain c&eacute;l&egrave;bre en panne d&#039;inspiration, voit surgir dans sa vie l&#039;h&eacute;ro&iuml;ne de ses romans. Elle est jolie, elle est d&eacute;sesp&eacute;r&eacute;e, elle va mourir s&#039;il s&#039;arr&ecirc;te d&#039;&eacute;crire.', 2500, '6299e0fd4e7092.32634180.jpg', 4, 17),
(32, 'Tu verras, les &acirc;mes se retrouvent toujours quelque part', 'Sabrina Philippe', 'Elle est encore jeune et d&eacute;j&agrave; lasse. Elle parle d&#039;amour &agrave; la t&eacute;l&eacute;vision mais peine &agrave; trouver du sens &agrave; sa propre histoire. Dans un caf&eacute; de l&#039;&icirc;le Saint-Louis, elle croise la route d&#039;une &eacute;l&eacute;gante femme m&ucirc;re.\r\n\r\nElle a les cheveux blancs et les yeux clairs. Elle a cherch&eacute; l&#039;amour dans les bras d&#039;hommes qui l&#039;ont plus ou moins aim&eacute;e, jusqu&#039;&agrave; ce que l&#039;&eacute;vidence d&#039;une rencontre &eacute;clipse toutes les autres. Au fil de leurs &eacute;changes, elle transmet &agrave; travers son histoire ce qu&#039;elle a d&eacute;couvert de l&#039;amour, le vrai.\r\n\r\nSabrina Philippe est psychologue. Chroniqueuse dans l&#039;&eacute;mission &quot; Toute une histoire &quot;, elle collabore avec divers magazines et radios.', 400, '62bcca29582062.35262502.jpg', 30, 15),
(33, 'TON DERNIER REGARD: Et si le jour de ta mort devenait le plus beau jour de ta vie ?', 'Oumeyma Amjid', 'Deux merveilleux &eacute;v&eacute;nements ont profond&eacute;ment &eacute;branl&eacute; l&rsquo;existence d&rsquo;Oumeyma. Tous deux ont eu lieu en 2017. Le premier a &eacute;t&eacute; la naissance de son premier enfant. Le second, la mort de sa m&egrave;re, Najia. Cela semble inconcevable, pourtant le jour de sa mort a &eacute;t&eacute; le plus beau de toute la vie d&rsquo;Oumeyma. Alors qu&rsquo;elle s&rsquo;attendait &agrave; assister &agrave; une douloureuse trag&eacute;die, cette nuit a &eacute;t&eacute; merveilleuse. Elle a vu l&rsquo;&acirc;me de celle qui l&rsquo;a mise au monde quitter son corps. Elle a assist&eacute; &agrave; des miracles. Elle a ressenti un bonheur et une Rahma auxquels elle n&rsquo;avait jamais go&ucirc;t&eacute; jusqu&rsquo;&agrave; cette nuit m&eacute;morable.Cet &eacute;v&eacute;nement a boulevers&eacute; son quotidien de maman, d&rsquo;&eacute;pouse, de femme, pour l&rsquo;amener &agrave; se remettre en question, se reconnecter &agrave; l&rsquo;essentiel et reprendre sa vie en main. &Agrave; travers son r&eacute;cit, Oumeyma porte un regard nouveau, diff&eacute;rent, sur la mort, mais surtout sur la vie. Plein d&rsquo;espoir, de bienveillance et de courage, ce livre vous fera vibrer en profondeur et vous fera cheminer&hellip; &agrave; l&rsquo;int&eacute;rieur de vous-m&ecirc;me. Ce livre d&eacute;peint &agrave; la fois la vie inspirante de Najia, une femme d&eacute;vou&eacute;e &agrave; Allah, et celle d&rsquo;Oumeyma, qui a utilis&eacute; l&rsquo;h&eacute;ritage spirituel de sa m&egrave;re, pour laisser sa propre trace.', 650, '62bcca7d5cebb7.83248167.jpg', 21, 17),
(34, 'Les possibles', 'Virginie Grimaldi', 'Livraison GRATUITE (0,01&euro; pour les livres) en point retrait (selon &eacute;ligibilit&eacute; des articles). D&eacute;tails\r\nJuliane n&#039;aime pas les surprises. Quand son p&egrave;re fantasque vient s&#039;installer chez elle, &agrave; la suite de l&#039;incendie de sa maison, son quotidien parfaitement huil&eacute; conna&icirc;t quelques turbulences.\r\nJean d&eacute;pense sa retraite au t&eacute;l&eacute;achat, &eacute;coute du rock, tapisse les murs de posters d&#039;Indiens, &eacute;gare ses affaires, cherche son chemin.\r\nJuliane veut croire que l&#039;originalit&eacute; de Jean s&#039;est &eacute;panouie avec l&#039;&acirc;ge, mais elle doit se rendre &agrave; l&#039;&eacute;vidence : il d&eacute;raille.\r\nFace aux lendemains qui s&#039;&eacute;vaporent, elle va apprendre &agrave; d&eacute;couvrir l&#039;homme sous le costume de p&egrave;re, ses valeurs, ses failles, et surtout ses r&ecirc;ves.\r\nTant que la partie n&#039;est pas finie, il est encore l&#039;heure de tous les possibles.\r\n\r\nEntrer dans l&rsquo;univers de Virginie Grimaldi, c&rsquo;est accepter d&rsquo;&ecirc;tre saisi d&rsquo;&eacute;motions, de rire, de pleurer et d&rsquo;&ecirc;tre touch&eacute; par toute la sensibilit&eacute; que d&eacute;gage son duo p&egrave;re-fille. 20 Minutes Livres.\r\n\r\nUn livre tr&egrave;s &eacute;mouvant qui va vous emporter. Femme actuelle.', 5000, '62c0337f771e82.99258730.jpg', 21, 17),
(35, 'Tout le bleu du ciel', 'Mélissa Da Costa ', 'Petitesannonces.fr : Jeune homme de 26 ans, condamné à une espérance de vie de deux ans par un Alzheimer précoce, souhaite prendre le large pour un ultime voyage. Recherche compagnon(ne) pour partager avec moi ce dernier périple.\r\nÉmile a décidé de fuir l’hôpital, la compassion de sa famille et de ses amis. À son propre étonnement, il reçoit une réponse à cette annonce. Trois jours plus tard, devant le camping-car acheté secrètement, il retrouve Joanne, une jeune femme coiffée d’un grand chapeau noir qui a pour seul bagage un sac à dos, et qui ne donne aucune explication sur sa présence.\r\nAinsi commence un voyage stupéfiant de beauté. À chaque détour de ce périple naissent, à travers la rencontre avec les autres et la découverte de soi, la joie, la peur, l’amitié, l’amour qui peu à peu percent la carapace de douleurs d’Émile.\r\n\r\nUn livre aux dialogues impeccables et aux personnages touchants d’humanité. Psychologies magazine.\r\n\r\nBouleversant. Version femina.\r\n\r\nPRIX ALAIN-FOURNIER 2020', 2300, '62c0391a713db1.56772975.jpg', 8, 18),
(36, 'On se reverra Poche &ndash; 14 novembre 2018', 'Lisa Jewell', 'Qui est cet homme assis sur la plage en pleine temp&ecirc;te, sur le lieu d&rsquo;un crime commis vingt ans plus t&ocirc;t ? Il n&rsquo;a pas de nom, pas de manteau, et a perdu la m&eacute;moire. Alice prend l&rsquo;inconnu sous son aile et d&eacute;cide de l&rsquo;h&eacute;berger, sans savoir qu&rsquo;il va bouleverser sa vie &agrave; jamais.\r\nAu m&ecirc;me moment, dans la banlieue de Londres, Lily attend en vain le retour de l&rsquo;homme qu&rsquo;elle vient d&rsquo;&eacute;pouser et dont la police tarde &agrave; signaler la disparition. Parviendra-t-elle &agrave; retrouver celui pour qui elle a tout abandonn&eacute; ?\r\n\r\nUn roman haletant au suspense ma&icirc;tris&eacute;.\r\n\r\n&laquo; J&rsquo;adore les livres de Lisa Jewell, mais On se reverra m&rsquo;a compl&egrave;tement happ&eacute;e. Je l&rsquo;ai d&eacute;vor&eacute; en une journ&eacute;e. &Ccedil;a m&rsquo;a transport&eacute;e. &raquo; Jojo Moyes\r\n\r\n&laquo; Les lecteurs de Liane Moriarty, Paula Hawkins et Ruth Ware vont adorer. &raquo; Library Journal\r\n\r\n&laquo; Une intrigue men&eacute;e de main de ma&icirc;tre ! On retient son souffle jusqu&rsquo;&agrave; la derni&egrave;re page. &raquo; New York Times\r\n\r\n&laquo; Un suspense haletant. &raquo; Sunday Express\r\n\r\n&laquo; Une histoire tr&egrave;s efficace, un suspense &agrave; couper le souffle, une grande humanit&eacute;. &raquo; Herald\r\n\r\n&laquo; Une histoire d&eacute;chirante et impr&eacute;visible. &raquo; Metro', 1340, '62c039dbf2daf2.34479810.jpg', 23, 19),
(37, 'Comme toi', 'Lisa Jewell ', 'Ellie a disparu &agrave; l&#039;&acirc;ge de quinze ans. Sa m&egrave;re n&#039;a jamais r&eacute;ussi &agrave; faire son deuil, d&#039;autant plus que la police n&#039;a retrouv&eacute; ni le coupable ni le corps. Dix ans plus tard, cette femme bris&eacute;e doit pourtant se r&eacute;soudre &agrave; tourner la page. C&#039;est alors qu&#039;elle fait la connaissance de Floyd, un homme charmant, p&egrave;re c&eacute;libataire, auquel elle se lie peu &agrave; peu. Mais lorsqu&#039;elle rencontre la fille de celui-ci, Poppy, &acirc;g&eacute;e de neuf ans, le pass&eacute; la rattrape brutalement : cette fillette est le portrait crach&eacute; de sa fille disparue...\r\n\r\n&laquo; Si vous &eacute;tiez le premier de vos amis &agrave; lire La Fille du train et si vous avez lu et relu Les Apparences, vous adorerez ce thriller. &raquo; - The Sun\r\n&laquo; L&#039;intrigue de ce nouveau roman est vertigineuse. Comme toi est un livre sombre, sans &eacute;chappatoire, mais profond&eacute;ment &eacute;mouvant et sinc&egrave;re. &Agrave; couper le souffle. &raquo; - C. L. Taylor\r\n&laquo; Captivant et bien men&eacute;. &raquo; - The Sunday Mirror\r\n&laquo; Un thriller psychologique noir, passionnant et exaltant. &raquo; - Rachel Rhys\r\n&laquo; Un roman noir aussi intelligent qu&#039;&eacute;mouvant. &raquo; - Mail Online', 3800, '62c03a38e3bf35.55374006.jpg', 4, 19),
(38, 'Am&eacute;lie Mal&eacute;fice, le livre des formules magiques - Premi&egrave;res Lectures CP Niveau 2 - D&egrave;s 6 ans', 'Arnaud Alméras ', 'Laissez-vous ensorceler par Am&eacute;lie Mal&eacute;fice, la nouvelle s&eacute;rie des Premi&egrave;res Lectures !\r\nUn roman &agrave; lire &agrave; deux pour les premiers pas en lecture !\r\nL&#039;histoire : Cet apr&egrave;s-midi, Am&eacute;lie et Odilon s&#039;ennuient. Et s&#039;ils volaient le Grand Livre des Formules magiques, pour s&#039;amuser un peu ? Seulement, ils ne sont pas tr&egrave;s dou&eacute;s : la grande s&oelig;ur d&#039;Odilon est transform&eacute;e en chat !\r\n\r\nLa collection Premi&egrave;res Lectures accompagne les enfants qui apprennent &agrave; lire.\r\nChaque roman peut-&ecirc;tre lu &agrave; deux voix : un lecteur confirm&eacute; lit l&#039;histoire et l&#039;enfant lit les bulles, faciles &agrave; d&eacute;chiffrer, gr&acirc;ce aux 3 niveaux adapt&eacute;s &agrave; ses progr&egrave;s.\r\nNiveau 2 - &quot; je commence &agrave; lire &quot; : les bulles peuvent &ecirc;tre lues par l&#039;enfant qui sait lire des mots simples.\r\nQuand l&#039;enfant sait lire seul, il peut lire les romans en entier comme un grand !\r\nUn livre test&eacute; par des enseignants de CP et CE1 pour les enfants d&egrave;s 6 ans.', 1400, '62c03b9b277a94.97304746.jpg', 5, 20);

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
(18, 'Romans et litt&eacute;rature', ''),
(19, 'Romans policiers et polars', ''),
(20, 'Livres pour enfants', ''),
(21, 'Famille et bien-&ecirc;tre', ''),
(22, 'Sant&eacute;, Forme et Di&eacute;t&eacute;tique', ''),
(23, 'Actu, Politique et Soci&eacute;t&eacute;', '');

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
(31, 1, 3000, 26, '2022-06-03', 28),
(32, 1, 3000, 27, '2022-06-26', 28),
(33, 1, 3000, 28, '2022-06-26', 28),
(34, 1, 2500, 29, '2022-06-26', 31),
(35, 2, 5000, 29, '2022-06-26', 31),
(36, 2, 4600, 33, '2022-07-03', 35),
(37, 2, 2680, 34, '2022-07-03', 36),
(38, 5, 7000, 34, '2022-07-03', 38),
(39, 5, 7000, 35, '2022-07-03', 38),
(40, 2, 1300, 36, '2022-07-03', 33);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `user` int(255) NOT NULL,
  `total` float NOT NULL,
  `etat` varchar(255) NOT NULL DEFAULT 'En cours',
  `date_creation` date NOT NULL,
  `rue` varchar(250) NOT NULL,
  `ville` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `user`, `total`, `etat`, `date_creation`, `rue`, `ville`) VALUES
(26, 44, 3000, ' annuler', '2022-06-03', 'ath yenni', 'tizi-ouzou'),
(27, 44, 3000, ' annuler', '2022-06-26', 'kdshjlgk', 'jhsdgjk'),
(28, 44, 3000, ' annuler', '2022-06-26', 'dvdlv', 'cdvd'),
(29, 44, 7500, ' annuler', '2022-06-26', 'Rue Tizi ouzou', 'Draa el mizan'),
(33, 44, 4600, ' annuler', '2022-07-03', 'Rue Tizi ouzou', 'larbaa'),
(34, 44, 9680, ' annuler', '2022-07-03', 'Rue Tizi ouzou', 'Draa el mizan'),
(35, 44, 7000, ' annuler', '2022-07-03', 'Rue Tizi ouzou', 'Draa el mizan'),
(36, 44, 1300, 'En cours', '2022-07-03', 'Rue Tizi ouzou', 'Draa el mizan');

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
  `etat` int(11) NOT NULL DEFAULT 0,
  `telephone` varchar(10) NOT NULL,
  `code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `nom`, `prenom`, `etat`, `telephone`, `code`) VALUES
(44, 'user@gmail.com', '2002518acba64ad3e9b937d548e0f3d1', 'user', 'user', 0, '0201030405', 897207),
(46, 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'abdou', 'abdou', 0, '9999999988', NULL),
(48, 'abdouiabbadene@gmail.com', '13085a63a2b3e4beb7ab10ee395aefe4', 'Mameri', 'Mouloud', 0, '0999975444', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

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
