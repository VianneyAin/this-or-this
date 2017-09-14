-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 14 Septembre 2017 à 06:17
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jokes`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`) VALUES
(1, 'Raciste', 'raciste'),
(2, 'Blonde', 'blonde'),
(3, 'Toto', 'toto'),
(4, 'Courte', 'courte'),
(5, 'Devinette', 'devinette'),
(6, 'Homme', 'homme'),
(7, 'Femme', 'femme'),
(8, 'Religion', 'religion'),
(9, 'Animaux', 'animaux'),
(10, 'Cochonnes', 'cochonnes'),
(11, 'Belle Mère', 'belle-mere'),
(12, 'Comble', 'comble');

-- --------------------------------------------------------

--
-- Structure de la table `jokes`
--

CREATE TABLE `jokes` (
  `id` int(11) NOT NULL,
  `author` int(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `status` varchar(32) NOT NULL DEFAULT 'draft',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `jokes`
--

INSERT INTO `jokes` (`id`, `author`, `title`, `content`, `status`, `created`, `modified`, `category`) VALUES
(1, 2, 'Le roi des cons', '<p>Un gars dit à un autre dans un troquet :</p>\r\n<p>- T\'es con toi ! T\'es vraiment con ! C\'est pas possible ce que t\'es con ! J\'ai jamais vu un con pareil ! Tiens, c\'est simple, s\'il existait un concours de cons, tu finirais deuxième !</p>\r\n<p>- Pourquoi deuxième ?</p>\r\n<p>- Parce que t\'es trop con pour finir premier !</p>', 'draft', '2017-08-25 11:41:03', '2017-08-31 09:02:48', NULL),
(20, 18, 'Dieu dit à Casto', '<p>Un jour Dieu dit à Casto de ramer. Et depuis, castorama...</p>', 'active', '2017-08-26 12:40:29', '2017-08-26 14:34:14', NULL),
(23, 19, 'Le Picasso', '<p>Un monsieur visite un musée. Soudin il s\'arrête et dit au guide :  <br>- Ah, c\'est moche ! <br>- C\'est du Picasso, répond le guide. <br>Plus loin, il s\'écrie de nouveau : <br>- Ah, c\'est vraiment moche ! <br>- Ca Monsieur, c\'est un miroir !</p>', 'active', '2017-08-26 14:35:52', '2017-08-26 14:39:07', NULL),
(22, 18, 'Un chien et un homme sur un bâteau', '<p>Un chien et un homme son sur un bateau. Le chien pète, l\'homme tombe à l\'eau et se noie. Quelle est la race du chien ?Un pékinois. (un pet qui noie)</p>', 'active', '2017-08-26 13:46:04', '2017-08-26 14:34:15', NULL),
(24, 19, 'Quand je te trouverai, je te posséderai', '<p>Quant je te trouverai, je te posséderai.<br>Ce jour au plus tard le suivant, je te porterai au lit.<br>Sans demander ta permission, je m’approcherai, je toucherai tout ton corps.<br>Je te laisserai avec une énorme sensation de fatigue.<br>Tu sentiras lentement des frissons parcourir ton corps et je te ferai transpirer.<br>Je te laisserai sans respiration, sans air sans pouvoir reprendre tes esprits.<br>Tant que je resterai avec toi, tu ne te sentiras pas capable de sortir du lit !<br>Je partirai sans dire adieu avec la conviction qu’un jour je reviendrai …<br>Signé... la grippe...</p>', 'active', '2017-08-26 14:36:00', '2017-08-26 14:40:50', NULL),
(31, 18, NULL, '<p>Quelle est la différence entre une échelle et un pistolet ?\r<br>L\'échelle sert à monter, le pistolet sert à descendre.</p>', 'draft', '2017-08-31 09:03:58', '2017-08-31 09:03:58', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `joke` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `rates`
--

INSERT INTO `rates` (`id`, `joke`, `user`, `value`) VALUES
(1, 20, 18, 4),
(2, 24, 18, 5),
(3, 23, 18, 2),
(4, 22, 18, 4),
(5, 20, 2, 4),
(6, 22, 2, 2),
(7, 23, 2, 5),
(8, 24, 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` varchar(32) NOT NULL DEFAULT 'user',
  `confirmcode` varchar(150) NOT NULL,
  `avatar` char(150) DEFAULT 'https://www.mautic.org/media/images/default_avatar.png',
  `lastname` varchar(150) DEFAULT NULL,
  `firstname` varchar(150) DEFAULT NULL,
  `description` text,
  `registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `wallpaper` varchar(300) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `confirmcode`, `avatar`, `lastname`, `firstname`, `description`, `registered`, `wallpaper`) VALUES
(2, 'vain', 'vianney.ain.travail@gmail.com', 'ccea705e2342755da1ddcd8befbf42c1', 'admin', 'f93e87e63f238f735a658a8b7585e051', 'http://lorempixel.com/500/500/people/2/', 'Aïn', 'Vianney', 'Tout simplement l\'administrateur, et le créateur du site, rien que ça !', '2017-08-25 12:47:12', NULL),
(18, 'jb2000', 'jb2000@gmail.com', '322b3d941d3f04b90e1cbb3f9e294620', 'user', '8b7f7c327c7d5e0af71b158d84057ce1', 'http://res.cloudinary.com/dzfbgwvgr/image/upload/v1504084635/pd6bunduui2ry1nwhvdw.jpg', NULL, NULL, 'AH BAH SALUT', '2017-08-26 12:36:08', 'http://res.cloudinary.com/dzfbgwvgr/image/upload/v1504085059/s3krnhxm2cqstggzkzfd.jpg'),
(19, 'MiniRobi', 'MiniRobi@gmail.com', '78798818c97bc7b92f33ade9b46c97d3', 'user', '8b8bb502c7623ea0f4f4e0570930b2d1', 'https://www.mautic.org/media/images/default_avatar.png', NULL, NULL, NULL, '2017-08-26 14:35:14', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jokes`
--
ALTER TABLE `jokes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `jokes`
--
ALTER TABLE `jokes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
