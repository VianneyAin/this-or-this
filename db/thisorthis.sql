-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 03 Octobre 2017 à 16:52
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `thisorthis`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(9) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `choice_1` varchar(150) NOT NULL,
  `choice_2` varchar(150) NOT NULL,
  `nsfl` tinyint(1) NOT NULL DEFAULT '0',
  `thumbnail` varchar(300) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `title`, `description`, `choice_1`, `choice_2`, `nsfl`, `thumbnail`, `created`) VALUES
(1, 'deadorsleeping', 'Dead or Sleeping', '', 'dead', 'sleeping', 1, 'https://img11.hostingpics.net/pics/855749deadoralive.jpg', '2017-10-03 15:56:38'),
(2, 'manorwoman', 'Man or Woman', '', 'man', 'woman', 0, 'https://i.imgur.com/SjwD3u0.jpg', '2017-10-03 16:56:38');

-- --------------------------------------------------------

--
-- Structure de la table `elements`
--

CREATE TABLE `elements` (
  `id` int(9) NOT NULL,
  `hidden_image` varchar(300) NOT NULL,
  `reveal_image` varchar(300) NOT NULL,
  `category` int(11) NOT NULL,
  `choice` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `elements`
--

INSERT INTO `elements` (`id`, `hidden_image`, `reveal_image`, `category`, `choice`) VALUES
(1, 'https://img11.hostingpics.net/pics/9588381024pxZarqawideadusgovtphoto2.jpg', 'https://img11.hostingpics.net/pics/4222501024pxZarqawideadusgovtphoto.jpg', 1, 'dead'),
(2, 'https://img11.hostingpics.net/pics/430444112854321751dc82a6573b2.jpg', 'https://img11.hostingpics.net/pics/479464112854321751dc82a6573b.jpg', 1, 'sleeping'),
(3, 'https://img11.hostingpics.net/pics/8317686ff89e534a02cb542.jpg', 'https://img11.hostingpics.net/pics/2410526ff89e534a02cb54.jpg', 1, 'dead'),
(4, 'https://img11.hostingpics.net/pics/89806070d229d2a660c7632.jpg', 'https://img11.hostingpics.net/pics/75658070d229d2a660c763.jpg', 1, 'dead'),
(5, 'https://img11.hostingpics.net/pics/480735160729FHC9950242A2.jpg', 'https://img11.hostingpics.net/pics/160438160729FHC9950242A.jpg', 1, 'sleeping'),
(6, 'https://img11.hostingpics.net/pics/820335b8e02134a31d496e2.jpg', 'https://img11.hostingpics.net/pics/216806b8e02134a31d496e.jpg', 1, 'dead'),
(7, 'https://img11.hostingpics.net/pics/561432HomelessmanTokyo20082.jpg', 'https://img11.hostingpics.net/pics/210690HomelessmanTokyo2008.jpg', 1, 'sleeping'),
(8, 'https://img11.hostingpics.net/pics/970508HumanandMountainFacesTheGiantissleeping2.jpg', 'https://img11.hostingpics.net/pics/909378HumanandMountainFacesTheGiantissleeping.jpg', 1, 'sleeping'),
(9, 'https://img11.hostingpics.net/pics/323025pexelsphoto137202.jpg', 'https://img11.hostingpics.net/pics/656525pexelsphoto13720.jpg', 1, 'sleeping'),
(10, 'https://img11.hostingpics.net/pics/535922Mexicanwomansleepingonherside2.jpg', 'https://img11.hostingpics.net/pics/934197Mexicanwomansleepingonherside.jpg', 1, 'sleeping'),
(11, 'https://img11.hostingpics.net/pics/2083232572348038382e0c0747b2.jpg', 'https://img11.hostingpics.net/pics/6802202572348038382e0c0747b.jpg', 1, 'sleeping'),
(12, 'https://img11.hostingpics.net/pics/354768shutterstock637596222.jpg', 'https://img11.hostingpics.net/pics/863850shutterstock63759622.jpg', 1, 'dead'),
(13, 'https://img11.hostingpics.net/pics/565505SleepingPositionsfeature2.jpg', 'https://img11.hostingpics.net/pics/232437SleepingPositionsfeature.jpg', 1, 'sleeping'),
(14, 'https://img11.hostingpics.net/pics/459866mansleepinguncomfortably2.jpg', 'https://img11.hostingpics.net/pics/339758mansleepinguncomfortably.jpg', 1, 'sleeping'),
(15, 'https://img11.hostingpics.net/pics/6760196e8g4z6g1z35gz62.jpg', 'https://img11.hostingpics.net/pics/8466156e8g4z6g1z35gz6.jpg', 1, 'sleeping'),
(16, 'https://img11.hostingpics.net/pics/690250maxresdefault2.jpg', 'https://img11.hostingpics.net/pics/673996maxresdefault.jpg', 1, 'sleeping'),
(17, 'https://img11.hostingpics.net/pics/904178travesti2.jpg', 'https://img11.hostingpics.net/pics/527107travesti.jpg', 2, 'man'),
(18, 'https://img11.hostingpics.net/pics/5019316355728987291539be167d33dcae220deaffe56565962b21000x6252.jpg', 'https://img11.hostingpics.net/pics/1209766355728987291539be167d33dcae220deaffe56565962b21000x625.jpg', 2, 'man'),
(19, 'https://img11.hostingpics.net/pics/662758Awomanwhosspentover3d591ae3e5fdec5e6c7c6d5e6c5e8d932.jpg', 'https://img11.hostingpics.net/pics/419607Awomanwhosspentover3d591ae3e5fdec5e6c7c6d5e6c5e8d93.jpg', 2, 'woman');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Index pour la table `elements`
--
ALTER TABLE `elements`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `elements`
--
ALTER TABLE `elements`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
