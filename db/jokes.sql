-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 17 Septembre 2017 à 19:48
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
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `slug`) VALUES
(1, 'Non Classé', 'non-classe'),
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
(12, 'Comble', 'comble'),
(13, 'Sex', 'sex'),
(14, 'Raciste', 'raciste'),
(15, 'Différence', 'difference'),
(16, 'Thrash', 'thrash'),
(17, 'Pipi Caca', 'pipi-caca');

-- --------------------------------------------------------

--
-- Structure de la table `jokes`
--

CREATE TABLE `jokes` (
  `joke_id` int(11) NOT NULL,
  `author` int(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `status` varchar(32) NOT NULL DEFAULT 'draft',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `jokes`
--

INSERT INTO `jokes` (`joke_id`, `author`, `title`, `content`, `status`, `created`, `modified`, `category`) VALUES
(1, 2, 'Le roi des cons', '<p>Un gars dit à un autre dans un troquet :<br>- T\'es con toi ! T\'es vraiment con ! C\'est pas possible ce que t\'es con ! J\'ai jamais vu un con pareil ! Tiens, c\'est simple, s\'il existait un concours de cons, tu finirais deuxième !<br>- Pourquoi deuxième ?<br>- Parce que t\'es trop con pour finir premier !</p>', 'active', '2017-08-25 11:41:03', '2017-09-17 19:31:47', '4,6'),
(20, 18, 'Dieu dit à Casto', '<p>Un jour Dieu dit à Casto de ramer. Et depuis, castorama...</p>', 'active', '2017-08-26 12:40:29', '2017-09-17 18:25:42', '4,6'),
(22, 18, 'Un chien et un homme sur un bâteau', '<p>Un chien et un homme son sur un bateau. Le chien pète, l\'homme tombe à l\'eau et se noie. Quelle est la race du chien ?<br>Un pékinois. (un pet qui noie)</p>', 'active', '2017-08-26 13:46:04', '2017-09-17 19:31:21', '5,9'),
(23, 19, 'Le Picasso', '<p>Un monsieur visite un musée. Soudin il s\'arrête et dit au guide :  <br>- Ah, c\'est moche ! <br>- C\'est du Picasso, répond le guide. <br>Plus loin, il s\'écrie de nouveau : <br>- Ah, c\'est vraiment moche ! <br>- Ca Monsieur, c\'est un miroir !</p>', 'active', '2017-08-26 14:35:52', '2017-09-17 19:31:07', '4,6'),
(24, 19, 'Quand je te trouverai, je te posséderai', '<p>Quant je te trouverai, je te posséderai.Ce jour au plus tard le suivant, je te porterai au lit.Sans demander ta permission, je m’approcherai, je toucherai tout ton corps.Je te laisserai avec une énorme sensation de fatigue.Tu sentiras lentement des frissons parcourir ton corps et je te ferai transpirer.Je te laisserai sans respiration, sans air sans pouvoir reprendre tes esprits.Tant que je resterai avec toi, tu ne te sentiras pas capable de sortir du lit !Je partirai sans dire adieu avec la conviction qu’un jour je reviendrai …Signé... la grippe...</p>', 'active', '2017-08-26 14:36:00', '2017-09-17 18:26:19', '1'),
(32, 2, 'Une fraise sur un cheval', '<p>Qu\'est ce qu\'une fraise sur un cheval ?<br>Une fraise tagada.</p>', 'active', '2017-09-14 21:28:40', '2017-09-17 19:30:39', '4,5'),
(33, 2, 'Un noir au toilette', '<p>Un noir va au toilette, et il en ressort blanc, pourquoi ?<br>Parce qu\'il a chier sa race.</p>', 'active', '2017-09-14 21:30:11', '2017-09-17 19:30:27', '4,6,14'),
(34, 2, 'Manif d\'aveugles', '<p>Qu\'est ce qu\'une manifestation d\'aveugles ?<br>Un festival de cannes.</p>', 'active', '2017-09-14 21:33:30', '2017-09-17 19:30:17', '4,5'),
(35, 2, 'Un timbe et mes grosses couilles', '<p>Quelle est la différence entre un timbre et mes grosses couilles ?<br><br>Il n\'y a pas besoin de lécher mes grosses couilles pour qu\'elles collent.</p>', 'active', '2017-09-14 21:35:21', '2017-09-17 19:30:03', '4,13'),
(36, 2, 'Le boomerang qui ne revient pas', '<p>Qu\'est ce qu\'un boomerang qui ne revient pas ?<br>Un chat mort.</p>', 'active', '2017-09-14 21:36:46', '2017-09-17 18:28:30', '4,16'),
(37, 18, NULL, '<p>C\'est l\'histoire d\'une fleur qui court, pis qui se plante.</p>', 'draft', '2017-09-17 19:35:24', '2017-09-17 19:35:24', NULL),
(38, 2, NULL, '<p>Comment on appelle 10 prostitués qui s\'engueulent ?\r<br>Une dispute.</p>', 'draft', '2017-09-17 19:37:53', '2017-09-17 19:37:53', NULL),
(39, 2, NULL, '<p>Comment appelle-t-on un poil en dépression ?\r<br>Un poil pubien.</p>', 'draft', '2017-09-17 19:39:55', '2017-09-17 19:39:55', NULL),
(40, 2, NULL, '<p>Pourquoi les mexicains mangent-ils aux toilettes ?\r<br>Parce qu\'ils aiment manger et pisser.</p>', 'draft', '2017-09-17 19:40:41', '2017-09-17 19:40:41', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `joke` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(8, 24, 2, 4),
(9, 33, 2, 3),
(10, 32, 2, 4),
(11, 1, 2, 4);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `confirmcode`, `avatar`, `lastname`, `firstname`, `description`, `registered`, `wallpaper`) VALUES
(2, 'vain', 'vianney.ain.travail@gmail.com', 'ccea705e2342755da1ddcd8befbf42c1', 'admin', 'f93e87e63f238f735a658a8b7585e051', 'http://res.cloudinary.com/dzfbgwvgr/image/upload/v1505591409/efjuli3abn5g4ge7mmcq.jpg', 'Aïn', 'Vianney', 'Tout simplement l\'administrateur, et le créateur du site, rien que ça !', '2017-08-25 12:47:12', 'http://res.cloudinary.com/dzfbgwvgr/image/upload/v1505591378/h6toh13z6vfmnxvbsimw.png'),
(18, 'jb2000', 'jb2000@gmail.com', '322b3d941d3f04b90e1cbb3f9e294620', 'user', '8b7f7c327c7d5e0af71b158d84057ce1', 'http://res.cloudinary.com/dzfbgwvgr/image/upload/v1504084635/pd6bunduui2ry1nwhvdw.jpg', NULL, NULL, 'AH BAH SALUT', '2017-08-26 12:36:08', 'http://res.cloudinary.com/dzfbgwvgr/image/upload/v1504085059/s3krnhxm2cqstggzkzfd.jpg'),
(19, 'MiniRobi', 'MiniRobi@gmail.com', '78798818c97bc7b92f33ade9b46c97d3', 'user', '8b8bb502c7623ea0f4f4e0570930b2d1', 'https://www.mautic.org/media/images/default_avatar.png', NULL, NULL, NULL, '2017-08-26 14:35:14', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Index pour la table `jokes`
--
ALTER TABLE `jokes`
  ADD PRIMARY KEY (`joke_id`);

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
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `jokes`
--
ALTER TABLE `jokes`
  MODIFY `joke_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT pour la table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
