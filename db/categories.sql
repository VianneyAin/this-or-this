-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 21 nov. 2017 à 06:58
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `slug` varchar(150) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `choice_1` varchar(150) NOT NULL,
  `choice_2` varchar(150) NOT NULL,
  `nsfl` tinyint(1) NOT NULL DEFAULT '0',
  `thumbnail` varchar(300) NOT NULL,
  `thumbnail_fr` varchar(250) DEFAULT NULL,
  `thumbnail_de` varchar(250) DEFAULT NULL,
  `thumbnail_es` varchar(250) DEFAULT NULL,
  `thumbnail_pt` varchar(250) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `thumbnail_name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `title`, `description`, `choice_1`, `choice_2`, `nsfl`, `thumbnail`, `thumbnail_fr`, `thumbnail_de`, `thumbnail_es`, `thumbnail_pt`, `created`, `visible`, `thumbnail_name`) VALUES
(1, 'deadorsleeping', 'Dead or Sleeping', '', 'dead', 'sleeping', 1, 'https://img11.hostingpics.net/pics/855749deadoralive.jpg', '', '', '', NULL, '2017-10-03 15:56:38', 0, ''),
(2, 'man-or-woman', 'Man or Woman', '', 'man', 'woman', 0, 'man_or_woman_thumbnail.jpg', 'man_or_woman_thumbnail_fr.jpg', 'man_or_woman_thumbnail_de.jpg', 'man_or_woman_thumbnail_es.jpg', 'man_or_woman_thumbnail_pt.jpg', '2017-10-03 16:56:38', 1, 'man_or_woman_thumbnail.jpg'),
(3, 'beardorpubichair', 'Beard or Pubic Hair', '', 'beard', 'pubic hair', 0, '', '', '', '', NULL, '2017-10-04 08:20:05', 0, ''),
(5, 'beer-or-pee', 'Beer or Pee', '', 'beer', 'pee', 0, 'beer_or_pee_thumbnail.jpg', 'beer_or_pee_thumbnail_fr.jpg', 'beer_or_pee_thumbnail_de.jpg', 'beer_or_pee_thumbnail_es.jpg', 'beer_or_pee_thumbnail_pt.jpg', '2017-10-05 07:18:51', 1, 'beer_or_pee_thumbnail.jpg'),
(6, 'muslim-or-jewish', 'Muslim or Jewish', '', 'muslim', 'jewish', 0, 'muslim_or_jewish_thumbnail.jpg', 'muslim_or_jewish_thumbnail_fr.jpg', 'muslim_or_jewish_thumbnail_de.jpg', 'muslim_or_jewish_thumbnail_es.jpg', 'muslim_or_jewish_thumbnail_pt.jpg', '2017-10-05 08:42:30', 1, 'muslim_or_jewish_thumbnail.jpg'),
(7, 'nazi-or-not-nazi', 'Nazi or Not Nazi', '', 'nazi', 'not nazi', 0, 'nazi_or_not_thumbnail.jpg', 'nazi_or_not_thumbnail_fr.jpg', 'nazi_or_not_thumbnail_de.jpg', 'nazi_or_not_thumbnail_es.jpg', 'nazi_or_not_thumbnail_pt.jpg', '2017-10-05 12:55:01', 1, 'nazi_or_not_thumbnail.jpg'),
(8, 'michael-jackson-or-not', 'Michael Jackson or Not', '', 'michael jackson', 'not michael jackson', 0, 'michael_jackson_or_not_thumbnail.jpg', 'michael_jackson_or_not_thumbnail_fr.jpg', 'michael_jackson_or_not_thumbnail_de.jpg', 'michael_jackson_or_not_thumbnail_es.jpg', 'michael_jackson_or_not_thumbnail_pt.jpg', '2017-10-19 07:13:04', 1, 'michael_jackson_or_not_thumbnail.jpg'),
(9, 'doggo-or-marshmallow', 'Doggo or Marshmallow', '', 'doggo', 'marshmallow', 0, 'doggo_or_marshmallow_thumbnail.jpg', 'doggo_or_marshmallow_thumbnail_fr.jpg', 'doggo_or_marshmallow_thumbnail_de.jpg', 'doggo_or_marshmallow_thumbnail_es.jpg', 'doggo_or_marshmallow_thumbnail_pt.jpg', '2017-10-27 18:55:38', 1, 'doggo_or_marshmallow_thumbnail.jpg'),
(10, 'doggo-or-mop', 'Doggo or Mop', '', 'doggo', 'mop', 0, 'doggo_or_mop_thumbnail.jpg', 'doggo_or_mop_thumbnail_fr.jpg', 'doggo_or_mop_thumbnail_de.jpg', 'doggo_or_mop_thumbnail_es.jpg', 'doggo_or_mop_thumbnail_pt.jpg', '2017-10-27 20:10:06', 1, 'doggo_or_mop_thumbnail.jpg'),
(11, 'far-or-pregnant', 'Fat or Pregnant', '', 'fat', 'pregnant', 0, 'fat_or_pregnant_thumbnail.jpg', 'fat_or_pregnant_thumbnail_fr.jpg', 'fat_or_pregnant_thumbnail_de.jpg', 'fat_or_pregnant_thumbnail_es.jpg', 'fat_or_pregnant_thumbnail_pt.jpg', '2017-10-30 17:24:13', 1, ''),
(12, 'bald-or-knee', 'Bald or Knee', '', 'bald', 'knee', 0, 'bald_or_knee_thumbnail.jpg', 'bald_or_knee_thumbnail_fr.jpg', 'bald_or_knee_thumbnail_de.jpg', 'bald_or_knee_thumbnail_es.jpg', 'bald_or_knee_thumbnail_pt.jpg', '2017-10-30 18:33:42', 1, 'bald_or_knee_thumbnail.jpg'),
(13, 'doggo-or-joystick', 'Doggo or Joystick', '', 'doggo', 'joystick', 0, 'doggo_or_joystick_thumbnail.jpg', 'doggo_or_joystick_thumbnail_fr.jpg', 'doggo_or_joystick_thumbnail_de.jpg', 'doggo_or_joystick_thumbnail_es.jpg', 'doggo_or_joystick_thumbnail_pt.jpg', '2017-10-31 16:04:23', 1, 'doggo_or_joystick_thumbnail.jpg'),
(14, 'pokemon-or-digimon', 'Pokemon or Digimon', '', 'pokemon', 'digimon', 0, 'pokemon_or_digimon_thumbnail.jpg', 'pokemon_or_digimon_thumbnail_fr.jpg', 'pokemon_or_digimon_thumbnail_de.jpg', 'pokemon_or_digimon_thumbnail_es.jpg', 'pokemon_or_digimon_thumbnail_pt.jpg', '2017-11-01 21:57:59', 1, 'pokemon_or_digimon_thumbnail.jpg'),
(15, 'teat-or-condom', 'Teat or Condom', '', 'teat', 'condom', 0, 'teat_or_condom_thumbnail.jpg', 'teat_or_condom_thumbnail_fr.jpg', 'teat_or_condom_thumbnail_de.jpg', 'teat_or_condom_thumbnail_es.jpg', 'teat_or_condom_thumbnail_pt.jpg', '2017-11-02 22:08:22', 1, 'teat_or_condom_thumbnail.jpg'),
(16, 'santa-or-hobo', 'Santa or Hobo', '', 'santa', 'hobo', 0, 'santa_or_hobo_thumbnail.jpg', 'santa_or_hobo_thumbnail_fr.jpg', 'santa_or_hobo_thumbnail_de.jpg', 'santa_or_hobo_thumbnail_es.jpg', 'santa_or_hobo_thumbnail_pt.jpg', '2017-11-03 09:40:24', 1, 'santa_or_hobo_thumbnail.jpg'),
(17, 'arm-or-tits', 'Arm or Tits', '', 'arm', 'tits', 0, 'arm_or_tits_thumbnail.jpg', 'arm_or_tits_thumbnail_fr.jpg', 'arm_or_tits_thumbnail_de.jpg', 'arm_or_tits_thumbnail_es.jpg', 'arm_or_tits_thumbnail_pt.jpg', '2017-11-20 22:13:39', 1, 'arm_or_tits_thumbnail.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
