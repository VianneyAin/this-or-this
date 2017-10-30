-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 30 Octobre 2017 à 13:42
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `thisorthis`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `slug` varchar(150) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `choice_1` varchar(150) NOT NULL,
  `choice_2` varchar(150) NOT NULL,
  `nsfl` tinyint(1) NOT NULL DEFAULT '0',
  `thumbnail` varchar(300) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `thumbnail_name` varchar(250) NOT NULL,
  `local` tinyint(1) NOT NULL DEFAULT '1',
  `played` int(250) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `title`, `description`, `choice_1`, `choice_2`, `nsfl`, `thumbnail`, `created`, `visible`, `thumbnail_name`, `local`, `played`) VALUES
(1, 'deadorsleeping', 'Dead or Sleeping', '', 'dead', 'sleeping', 1, 'https://img11.hostingpics.net/pics/855749deadoralive.jpg', '2017-10-03 15:56:38', 0, '', 0, 1),
(2, 'manorwoman', 'Man or Woman', '', 'man', 'woman', 0, 'man_or_woman_thumbnail.jpg', '2017-10-03 16:56:38', 1, 'man_or_woman_thumbnail.jpg', 0, 4),
(3, 'beardorpubichair', 'Beard or Pubic Hair', '', 'beard', 'pubic hair', 0, '', '2017-10-04 08:20:05', 0, '', 1, 1),
(4, 'pokemonordigimon', 'Pokemon or Digimmon', '', 'pokemon', 'digimon', 0, '', '2017-10-04 08:36:44', 0, '', 1, 1),
(5, 'beerorpee', 'Beer or Pee', '', 'beer', 'pee', 0, 'beer_or_pee_thumbnail.jpg', '2017-10-05 07:18:51', 1, 'beer_or_pee_thumbnail.jpg', 0, 1),
(6, 'muslimorjewish', 'Muslim or Jewish', '', 'muslim', 'jewish', 0, 'muslim_or_jewish_thumbnail.jpg', '2017-10-05 08:42:30', 1, 'muslim_or_jewish_thumbnail.jpg', 0, 1),
(7, 'naziornotnazi', 'Nazi or Not Nazi', '', 'nazi', 'not nazi', 0, 'nazi_or_not_thumbnail.jpg', '2017-10-05 12:55:01', 1, 'nazi_or_not_thumbnail.jpg', 0, 1),
(8, 'michael-jackson-or-not', 'Michael Jackson or Not', '', 'michael jackson', 'not michael jackson', 0, 'mj_or_not_thumbnail.jpg', '2017-10-19 07:13:04', 1, 'mj_or_not_thumbnail.jpg', 0, 1),
(9, 'doggo-or-marshmallow', 'Doggo or Marshmallow', '', 'doggo', 'marshmallow', 0, 'doggo_or_marshmallow_thumbnail.jpg', '2017-10-27 18:55:38', 0, 'doggo_or_marshmallow_thumbnail.jpg', 1, 2),
(10, 'doggo-or-mop', 'Doggo or Mop', '', 'doggo', 'mop', 0, 'doggo_or_mop_thumbnail.jpg', '2017-10-27 20:10:06', 0, 'doggo_or_mop_thumbnail.jpg', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `elements`
--

CREATE TABLE IF NOT EXISTS `elements` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `hidden_image` varchar(300) NOT NULL,
  `reveal_image` varchar(300) NOT NULL,
  `category` int(11) NOT NULL,
  `choice` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=174 ;

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
(19, 'https://img11.hostingpics.net/pics/662758Awomanwhosspentover3d591ae3e5fdec5e6c7c6d5e6c5e8d932.jpg', 'https://img11.hostingpics.net/pics/419607Awomanwhosspentover3d591ae3e5fdec5e6c7c6d5e6c5e8d93.jpg', 2, 'woman'),
(20, 'https://img11.hostingpics.net/pics/746857travesti22.png', 'https://img11.hostingpics.net/pics/965555travesti2.jpg', 2, 'man'),
(21, 'https://img11.hostingpics.net/pics/899626fotograforegistratravestisdalapanoriodejaneiro312262.png', 'https://img11.hostingpics.net/pics/294655fotograforegistratravestisdalapanoriodejaneiro31226.jpg', 2, 'man'),
(22, 'https://img11.hostingpics.net/pics/99407163397579420c769531d3b2.png', 'https://img11.hostingpics.net/pics/51269463397579420c769531d3b.jpg', 2, 'man'),
(23, 'https://img11.hostingpics.net/pics/8972512045854nonatosilveropereiravairevelarav950x022.png', 'https://img11.hostingpics.net/pics/6296542045854nonatosilveropereiravairevelarav950x02.jpg', 2, 'man'),
(24, 'https://img11.hostingpics.net/pics/951657DecesdeNicoleBricqEmmanuelMacronrendhommageaunefemmelibreaugrandsensdelEtat2.png', 'https://img11.hostingpics.net/pics/489632DecesdeNicoleBricqEmmanuelMacronrendhommageaunefemmelibreaugrandsensdelEtat.jpg', 2, 'woman'),
(25, 'https://img11.hostingpics.net/pics/273775travesti12.png', 'https://img11.hostingpics.net/pics/310595travesti1.jpg', 2, 'man'),
(26, 'https://img11.hostingpics.net/pics/224819kimwall02.png', 'https://img11.hostingpics.net/pics/786333kimwall0.png', 2, 'woman'),
(27, 'https://img11.hostingpics.net/pics/362655femmecranerasetendance2.png', 'https://img11.hostingpics.net/pics/516118femmecranerasetendance.jpg', 2, 'woman'),
(28, 'https://img11.hostingpics.net/pics/531088DecouvrezlametamorphosedeCelineDionenfemmefatale2.png', 'https://img11.hostingpics.net/pics/354815DecouvrezlametamorphosedeCelineDionenfemmefatale.jpg', 2, 'woman'),
(29, 'https://img11.hostingpics.net/pics/992453Coupedecheveuxcourtefemmeete20162.png', 'https://img11.hostingpics.net/pics/291984Coupedecheveuxcourtefemmeete2016.jpg', 2, 'woman'),
(30, 'https://img11.hostingpics.net/pics/8879365114022.png', 'https://img11.hostingpics.net/pics/182677511402.jpg', 2, 'woman'),
(31, 'https://img11.hostingpics.net/pics/924648Coiffurepourhommeraseprintempsete20172.png', 'https://img11.hostingpics.net/pics/936347Coiffurepourhommeraseprintempsete2017.jpg', 2, 'man'),
(32, 'https://img11.hostingpics.net/pics/361989coiffurehommefashionweekparis2016172.png', 'https://img11.hostingpics.net/pics/297364coiffurehommefashionweekparis201617.jpg', 2, 'man'),
(33, 'https://img11.hostingpics.net/pics/490704LanouvelleegerieMaybellineestunhomme2.png', 'https://img11.hostingpics.net/pics/465041LanouvelleegerieMaybellineestunhomme.jpg', 2, 'man'),
(34, 'https://img11.hostingpics.net/pics/4295344db903dcc623ccde5e671fdd18989718hairstylemenlemale2.png', 'https://img11.hostingpics.net/pics/4934804db903dcc623ccde5e671fdd18989718hairstylemenlemale.jpg', 2, 'man'),
(35, 'https://img11.hostingpics.net/pics/757324Coupedecheveuxhommemodehiver20162.png', 'https://img11.hostingpics.net/pics/285116Coupedecheveuxhommemodehiver2016.jpg', 2, 'man'),
(36, 'https://img11.hostingpics.net/pics/554914coiffurehommetendance20152.png', 'https://img11.hostingpics.net/pics/194858coiffurehommetendance2015.jpg', 2, 'man'),
(37, 'https://img11.hostingpics.net/pics/5706341584579inline2.jpg', 'https://img11.hostingpics.net/pics/2364961584579inline.jpg', 5, 'pee'),
(38, 'https://img11.hostingpics.net/pics/267999mousseurine2.png', 'https://img11.hostingpics.net/pics/529059mousseurine.jpg', 5, 'pee'),
(39, 'https://img11.hostingpics.net/pics/483263urine2.png', 'https://img11.hostingpics.net/pics/970924urine.png', 5, 'pee'),
(40, 'https://img11.hostingpics.net/pics/804225urine684612.png', 'https://img11.hostingpics.net/pics/385491urine68461.jpg', 5, 'pee'),
(41, 'https://img11.hostingpics.net/pics/883301UrineTest750x6412.png', 'https://img11.hostingpics.net/pics/149880UrineTest750x641.jpg', 5, 'pee'),
(42, 'https://img11.hostingpics.net/pics/84210720110521153016HomebrewingAmericanWheatroundupthumb625xauto3075632.png', 'https://img11.hostingpics.net/pics/99492320110521153016HomebrewingAmericanWheatroundupthumb625xauto307563.jpg', 5, 'beer'),
(43, 'https://img11.hostingpics.net/pics/333209article2681639079BACAB00000514732306x5482.png', 'https://img11.hostingpics.net/pics/122318article2681639079BACAB00000514732306x548.jpg', 5, 'beer'),
(44, 'https://img11.hostingpics.net/pics/550206beeralebitterfermented529942.png', 'https://img11.hostingpics.net/pics/456602beeralebitterfermented52994.jpg', 5, 'beer'),
(45, 'https://img11.hostingpics.net/pics/960212BeerBrewpubCrowd1200900x6002.png', 'https://img11.hostingpics.net/pics/818087BeerBrewpubCrowd1200900x600.jpg', 5, 'beer'),
(46, 'https://img11.hostingpics.net/pics/160452BeerGlass2.png', 'https://img11.hostingpics.net/pics/614072BeerGlass.jpg', 5, 'beer'),
(47, 'https://img11.hostingpics.net/pics/487777beermug2.png', 'https://img11.hostingpics.net/pics/249781beermug.jpg', 5, 'beer'),
(48, 'https://img11.hostingpics.net/pics/546706BeerPaleWeizenLOW2.png', 'https://img11.hostingpics.net/pics/573525BeerPaleWeizenLOW.jpg', 5, 'beer'),
(49, 'https://img11.hostingpics.net/pics/985077boobiesbeerglassa2.png', 'https://img11.hostingpics.net/pics/144621boobiesbeerglassa.jpg', 5, 'beer'),
(50, 'https://img11.hostingpics.net/pics/860663bostonbeertoursglass2.png', 'https://img11.hostingpics.net/pics/368852bostonbeertoursglass.jpg', 5, 'beer'),
(51, 'https://img11.hostingpics.net/pics/685311CanGlass16ozSHS162.png', 'https://img11.hostingpics.net/pics/203475CanGlass16ozSHS16.jpg', 5, 'beer'),
(52, 'https://img11.hostingpics.net/pics/237713craftbeercox2.png', 'https://img11.hostingpics.net/pics/366821craftbeercox.jpg', 5, 'beer'),
(53, 'https://img11.hostingpics.net/pics/859829globalbrewingcompanyismakingbeerwithcassavainsteadofbarleyfindoutwhy2.png', 'https://img11.hostingpics.net/pics/819274globalbrewingcompanyismakingbeerwithcassavainsteadofbarleyfindoutwhy.jpg', 5, 'beer'),
(54, 'https://img11.hostingpics.net/pics/870674Jupiter12.png', 'https://img11.hostingpics.net/pics/245760Jupiter1.jpg', 5, 'beer'),
(55, 'https://img11.hostingpics.net/pics/570951oAMERICANBEERfacebook2.png', 'https://img11.hostingpics.net/pics/141177oAMERICANBEERfacebook.jpg', 5, 'beer'),
(56, 'https://img11.hostingpics.net/pics/289560summerbeershutterstock2620606102.png', 'https://img11.hostingpics.net/pics/706053summerbeershutterstock262060610.jpg', 5, 'beer'),
(59, 'https://img11.hostingpics.net/pics/9388810898294B000005140imagem1414464657189432.png', 'https://img11.hostingpics.net/pics/8569020898294B000005140imagem141446465718943.jpg', 6, 'muslim'),
(60, 'https://img11.hostingpics.net/pics/143691hashimamlaapl702x3362.png', 'https://img11.hostingpics.net/pics/298904hashimamlaapl702x336.jpg', 6, 'muslim'),
(61, 'https://img11.hostingpics.net/pics/845982MuslimStudentAssociationcm02AnwaralAwlaki2.png', 'https://img11.hostingpics.net/pics/945633MuslimStudentAssociationcm02AnwaralAwlaki.jpg', 6, 'muslim'),
(62, 'https://img11.hostingpics.net/pics/771542muslimcouple2.png', 'https://img11.hostingpics.net/pics/691098muslimcouple.jpg', 6, 'muslim'),
(63, 'https://img11.hostingpics.net/pics/699065muslime14605031964022.png', 'https://img11.hostingpics.net/pics/933857muslime1460503196402.jpg', 6, 'muslim'),
(64, 'https://img11.hostingpics.net/pics/311123muslimonplane2.png', 'https://img11.hostingpics.net/pics/226469muslimonplane.jpg', 6, 'muslim'),
(65, 'https://img11.hostingpics.net/pics/752270nintchdbpict0003059294762.png', 'https://img11.hostingpics.net/pics/956590nintchdbpict000305929476.jpg', 6, 'muslim'),
(66, 'https://img11.hostingpics.net/pics/387643Takbirofprayer2.png', 'https://img11.hostingpics.net/pics/447766Takbirofprayer.jpg', 6, 'muslim'),
(67, 'https://img11.hostingpics.net/pics/951305web3muslimmanfaceyoungbeardheadshutterstock122151928shutterstock2.png', 'https://img11.hostingpics.net/pics/383346web3muslimmanfaceyoungbeardheadshutterstock122151928shutterstock.jpg', 6, 'muslim'),
(68, 'https://img11.hostingpics.net/pics/21211711cb065cd87b8fda019688a3b0c01be80fca75e1af1e0fab40cb6c22e50caa312.png', 'https://img11.hostingpics.net/pics/17483111cb065cd87b8fda019688a3b0c01be80fca75e1af1e0fab40cb6c22e50caa31.jpg', 6, 'muslim'),
(69, 'https://img11.hostingpics.net/pics/836632201403291834492.png', 'https://img11.hostingpics.net/pics/28554520140329183449.jpg', 6, 'jewish'),
(70, 'https://img11.hostingpics.net/pics/75850915090713173701jewishextremistettingersuper1692.png', 'https://img11.hostingpics.net/pics/68294515090713173701jewishextremistettingersuper169.jpg', 6, 'jewish'),
(71, 'https://img11.hostingpics.net/pics/35285520147181120648649782.png', 'https://img11.hostingpics.net/pics/4342582014718112064864978.jpg', 6, 'jewish'),
(72, 'https://img11.hostingpics.net/pics/503537cc7cd62094edfc182694c7089adda1cejewishhistoryjewishart2.png', 'https://img11.hostingpics.net/pics/894413cc7cd62094edfc182694c7089adda1cejewishhistoryjewishart.jpg', 6, 'jewish'),
(73, 'https://img11.hostingpics.net/pics/641958d0d69ae2f94e5ca7823dd5e7c1b8c7e0romancatholiccurls2.png', 'https://img11.hostingpics.net/pics/989944d0d69ae2f94e5ca7823dd5e7c1b8c7e0romancatholiccurls.jpg', 6, 'jewish'),
(74, 'https://img11.hostingpics.net/pics/494752juif2.png', 'https://img11.hostingpics.net/pics/562850juif.gif', 6, 'jewish'),
(75, 'https://img11.hostingpics.net/pics/909267mainqimg9646e8bf54535cdfe86e29609edca4402.png', 'https://img11.hostingpics.net/pics/529565mainqimg9646e8bf54535cdfe86e29609edca440.png', 6, 'jewish'),
(76, 'https://img11.hostingpics.net/pics/316763maxresdefault12.png', 'https://img11.hostingpics.net/pics/283359maxresdefault1.jpg', 6, 'jewish'),
(77, 'https://img11.hostingpics.net/pics/999774maxresdefault2.png', 'https://img11.hostingpics.net/pics/417368maxresdefault.jpg', 6, 'jewish'),
(78, 'https://img11.hostingpics.net/pics/591615ShowImage2.png', 'https://img11.hostingpics.net/pics/661816ShowImage.jpg', 6, 'jewish'),
(79, 'https://img11.hostingpics.net/pics/485200femmeabarbe2.png', 'https://img11.hostingpics.net/pics/648246femmeabarbe.jpg', 2, 'woman'),
(80, 'https://img11.hostingpics.net/pics/973192Caa2YN9VIAASPdf2.png', 'https://img11.hostingpics.net/pics/781943Caa2YN9VIAASPdf.jpg', 2, 'man'),
(81, 'https://img11.hostingpics.net/pics/831952104175242.png', 'https://img11.hostingpics.net/pics/60999110417524.jpg', 2, 'man'),
(82, 'https://img11.hostingpics.net/pics/6524286002.png', 'https://img11.hostingpics.net/pics/703745600.jpg', 2, 'man'),
(83, 'https://img11.hostingpics.net/pics/245963titletransgendertcm71887852.jpg', 'https://img11.hostingpics.net/pics/425779titletransgendertcm7188785.jpg', 2, 'woman'),
(84, 'https://img11.hostingpics.net/pics/205260636248149496617539124517122is150904transgender800x6002.png', 'https://img11.hostingpics.net/pics/606132636248149496617539124517122is150904transgender800x600.jpg', 2, 'man'),
(85, 'https://img11.hostingpics.net/pics/603912mikaagrenoble2.png', 'https://img11.hostingpics.net/pics/482511mikaagrenoble.jpg', 2, 'man'),
(86, 'https://img11.hostingpics.net/pics/499371femmemusclee32290ed62.png', 'https://img11.hostingpics.net/pics/634667femmemusclee32290ed6.jpg', 2, 'woman'),
(87, 'https://img11.hostingpics.net/pics/973803man2.png', 'https://img11.hostingpics.net/pics/316041man.jpg', 2, 'man'),
(88, 'https://img11.hostingpics.net/pics/305448image2.jpg', 'https://img11.hostingpics.net/pics/293700image646.jpg', 2, 'woman'),
(89, 'https://img11.hostingpics.net/pics/389686AP230819108332.png', 'https://img11.hostingpics.net/pics/571944AP23081910833.jpg', 7, 'not nazi'),
(90, 'https://img11.hostingpics.net/pics/8741771988807hollandesalut2.png', 'https://img11.hostingpics.net/pics/2241971988807hollandesalut.jpg', 7, 'not nazi'),
(91, 'https://img11.hostingpics.net/pics/240110ob5e4fb2gandhisalutdelamainfenetre2.png', 'https://img11.hostingpics.net/pics/297453ob5e4fb2gandhisalutdelamainfenetre.jpg', 7, 'not nazi'),
(92, 'https://img11.hostingpics.net/pics/576286melenchonsalutgauche2.png', 'https://img11.hostingpics.net/pics/232591melenchonsalutgauche.jpg', 7, 'not nazi'),
(93, 'https://img11.hostingpics.net/pics/783619PierredeVilliersdtail2.png', 'https://img11.hostingpics.net/pics/294466PierredeVilliersdtail.jpg', 7, 'not nazi'),
(94, 'https://img11.hostingpics.net/pics/134789Femaleofficersaluting2.png', 'https://img11.hostingpics.net/pics/431841Femaleofficersaluting.jpg', 7, 'not nazi'),
(95, 'https://img11.hostingpics.net/pics/551998PrideTheSevenDeadlySins2.png', 'https://img11.hostingpics.net/pics/666059PrideTheSevenDeadlySins.jpg', 7, 'nazi'),
(96, 'https://img11.hostingpics.net/pics/485768heil54452.png', 'https://img11.hostingpics.net/pics/239245heil5445.jpg', 7, 'nazi'),
(97, 'https://img11.hostingpics.net/pics/572619635639123210167360APGermanyNaziGrave2.png', 'https://img11.hostingpics.net/pics/488254635639123210167360APGermanyNaziGrave.jpg', 7, 'nazi'),
(98, 'https://img11.hostingpics.net/pics/855198neonazi2.png', 'https://img11.hostingpics.net/pics/649281neonazi.jpg', 7, 'nazi'),
(99, 'https://img11.hostingpics.net/pics/716444MongolianneoNazigroup0062.png', 'https://img11.hostingpics.net/pics/184172MongolianneoNazigroup006.jpg', 7, 'nazi'),
(100, 'https://img11.hostingpics.net/pics/629110danielradcliffeimperium7592.png', 'https://img11.hostingpics.net/pics/236640danielradcliffeimperium759.jpg', 7, 'nazi'),
(101, 'https://img11.hostingpics.net/pics/659806166676853032.png', 'https://img11.hostingpics.net/pics/19062516667685303.jpg', 7, 'nazi'),
(102, 'https://img11.hostingpics.net/pics/985456hitlerandmussolininaziandfascist2.png', 'https://img11.hostingpics.net/pics/254080hitlerandmussolininaziandfascist.jpg', 7, 'nazi'),
(103, 'https://img11.hostingpics.net/pics/899095hihihitler2.png', 'https://img11.hostingpics.net/pics/621154hihihitler.jpg', 7, 'nazi'),
(104, 'https://img11.hostingpics.net/pics/326122060420F6699G0212.png', 'https://img11.hostingpics.net/pics/396733060420F6699G021.jpg', 7, 'not nazi'),
(105, 'https://img11.hostingpics.net/pics/306828size02.png', 'https://img11.hostingpics.net/pics/783342size0.jpg', 7, 'not nazi'),
(110, 'https://img11.hostingpics.net/pics/827452usnavy2.png', 'https://img11.hostingpics.net/pics/413069usnavy.jpg', 7, 'not nazi'),
(111, 'https://img11.hostingpics.net/pics/369635150915FWE7736202.png', 'https://img11.hostingpics.net/pics/501509150915FWE773620.jpg', 7, 'not nazi'),
(112, 'https://img11.hostingpics.net/pics/520301SpaceballjumpoverSkydive352.png', 'https://img11.hostingpics.net/pics/526504SpaceballjumpoverSkydive35.jpg', 7, 'not nazi'),
(113, 'https://img4.hostingpics.net/pics/12407805aeae64033e6bf77a6459f06f2e9bc8youngpeoplemichaeljackson1.png', 'https://img4.hostingpics.net/pics/50085005aeae64033e6bf77a6459f06f2e9bc8youngpeoplemichaeljackson.jpg', 8, 'michael jackson'),
(114, 'https://img4.hostingpics.net/pics/80355064e2bdd4061.png', 'https://img4.hostingpics.net/pics/31918264e2bdd406.jpg', 8, 'michael jackson'),
(115, 'https://img4.hostingpics.net/pics/445754michaeljacksonunalbumineditmisauxencheres1.png', 'https://img4.hostingpics.net/pics/189861michaeljacksonunalbumineditmisauxencheres.jpg', 8, 'michael jackson'),
(116, 'https://img4.hostingpics.net/pics/416156michaeljackson11.png', 'https://img4.hostingpics.net/pics/139119michaeljackson1.jpg', 8, 'michael jackson'),
(117, 'https://img4.hostingpics.net/pics/598060MichaelJackson1.png', 'https://img4.hostingpics.net/pics/953921MichaelJackson.jpg', 8, 'michael jackson'),
(118, 'https://img4.hostingpics.net/pics/309483michaeljackson1.png', 'https://img4.hostingpics.net/pics/192842michaeljackson.jpg', 8, 'michael jackson'),
(119, 'https://img4.hostingpics.net/pics/955353MichaelJackson5472471.png', 'https://img4.hostingpics.net/pics/920033MichaelJackson547247.jpg', 8, 'michael jackson'),
(120, 'https://img4.hostingpics.net/pics/888679MichaelJackson11.png', 'https://img4.hostingpics.net/pics/968977MichaelJackson1.jpg', 8, 'michael jackson'),
(121, 'https://img4.hostingpics.net/pics/141505MichaelJacksonazfubaefv1.png', 'https://img4.hostingpics.net/pics/241119MichaelJacksonazfubaefv.jpg', 8, 'michael jackson'),
(122, 'https://img4.hostingpics.net/pics/335772p01bqlx82.png', 'https://img4.hostingpics.net/pics/413807p01bqlx8.jpg', 8, 'michael jackson'),
(123, 'https://img4.hostingpics.net/pics/809181rsz74277504jpg274north626xwhite1.png', 'https://img4.hostingpics.net/pics/470662rsz74277504jpg274north626xwhite.jpg', 8, 'michael jackson'),
(124, 'https://img4.hostingpics.net/pics/1866896402.png', 'https://img4.hostingpics.net/pics/182764640.jpg', 8, 'not michael jackson'),
(125, 'https://img4.hostingpics.net/pics/631772983116244550592.png', 'https://img4.hostingpics.net/pics/30751598311624455059.jpg', 8, 'not michael jackson'),
(127, 'https://img4.hostingpics.net/pics/905439brunomarsaccusedeplagiermichaeljackson2.png', 'https://img4.hostingpics.net/pics/737135brunomarsaccusedeplagiermichaeljackson.jpg', 8, 'not michael jackson'),
(128, 'https://img4.hostingpics.net/pics/756598gabrieldesbiens288x22.png', 'https://img4.hostingpics.net/pics/476592gabrieldesbiens288x.jpg', 8, 'not michael jackson'),
(129, 'https://img4.hostingpics.net/pics/176746insolitelesosiedemichaeljacksonlorientdimanche29septembre2.png', 'https://img4.hostingpics.net/pics/732751insolitelesosiedemichaeljacksonlorientdimanche29septembre.jpg', 8, 'not michael jackson'),
(130, 'https://img4.hostingpics.net/pics/870412janetjackson2.png', 'https://img4.hostingpics.net/pics/542677janetjackson.jpg', 8, 'not michael jackson'),
(131, 'https://img4.hostingpics.net/pics/769808perruquedemichaeljackson2.png', 'https://img4.hostingpics.net/pics/443769perruquedemichaeljackson.jpg', 8, 'not michael jackson'),
(132, 'https://img4.hostingpics.net/pics/336615sosiemichaeljacksonbooking2png.png', 'https://img4.hostingpics.net/pics/653895sosiemichaeljacksonbooking.jpg', 8, 'not michael jackson'),
(133, 'https://img4.hostingpics.net/pics/143124ValerieBelinMichaelJackson200311.png', 'https://img4.hostingpics.net/pics/921472ValerieBelinMichaelJackson20031.jpg', 8, 'not michael jackson'),
(134, '/img/tot_images/doggo_or_marshmallow/doggo/doggo_1_2.png', '/img/tot_images/doggo_or_marshmallow/doggo/doggo_1.jpg', 9, 'doggo'),
(135, '/img/tot_images/doggo_or_marshmallow/doggo/doggo_2_2.png', '/img/tot_images/doggo_or_marshmallow/doggo/doggo_2.jpg', 9, 'doggo'),
(136, '/img/tot_images/doggo_or_marshmallow/doggo/doggo_3_2.png', '/img/tot_images/doggo_or_marshmallow/doggo/doggo_3.jpg', 9, 'doggo'),
(137, '/img/tot_images/doggo_or_marshmallow/doggo/doggo_4_2.png', '/img/tot_images/doggo_or_marshmallow/doggo/doggo_4.jpg', 9, 'doggo'),
(138, '/img/tot_images/doggo_or_marshmallow/doggo/doggo_5_2.png', '/img/tot_images/doggo_or_marshmallow/doggo/doggo_5.jpg', 9, 'doggo'),
(139, '/img/tot_images/doggo_or_marshmallow/doggo/doggo_6_2.png', '/img/tot_images/doggo_or_marshmallow/doggo/doggo_6.jpg', 9, 'doggo'),
(140, '/img/tot_images/doggo_or_marshmallow/doggo/doggo_7_2.png', '/img/tot_images/doggo_or_marshmallow/doggo/doggo_7.jpg', 9, 'doggo'),
(141, '/img/tot_images/doggo_or_marshmallow/doggo/doggo_8_2.png', '/img/tot_images/doggo_or_marshmallow/doggo/doggo_8.jpg', 9, 'doggo'),
(142, '/img/tot_images/doggo_or_marshmallow/doggo/doggo_9_2.png', '/img/tot_images/doggo_or_marshmallow/doggo/doggo_9.jpg', 9, 'doggo'),
(143, '/img/tot_images/doggo_or_marshmallow/doggo/doggo_10_2.png', '/img/tot_images/doggo_or_marshmallow/doggo/doggo_10.jpg', 9, 'doggo'),
(144, '/img/tot_images/doggo_or_marshmallow/doggo/doggo_11_2.png', '/img/tot_images/doggo_or_marshmallow/doggo/doggo_11.jpg', 9, 'doggo'),
(145, '/img/tot_images/doggo_or_marshmallow/doggo/doggo_12_2.png', '/img/tot_images/doggo_or_marshmallow/doggo/doggo_12.jpg', 9, 'doggo'),
(146, '/img/tot_images/doggo_or_marshmallow/marshmallow/marsh_1_2.png', '/img/tot_images/doggo_or_marshmallow/marshmallow/marsh_1.jpg', 9, 'marshmallow'),
(147, '/img/tot_images/doggo_or_marshmallow/marshmallow/marsh_2_2.png', '/img/tot_images/doggo_or_marshmallow/marshmallow/marsh_2.jpg', 9, 'marshmallow'),
(148, '/img/tot_images/doggo_or_marshmallow/marshmallow/marsh_3_2.png', '/img/tot_images/doggo_or_marshmallow/marshmallow/marsh_3.jpg', 9, 'marshmallow'),
(149, '/img/tot_images/doggo_or_marshmallow/marshmallow/marsh_4_2.png', '/img/tot_images/doggo_or_marshmallow/marshmallow/marsh_4.jpg', 9, 'marshmallow'),
(150, '/img/tot_images/doggo_or_marshmallow/marshmallow/marsh_5_2.png', '/img/tot_images/doggo_or_marshmallow/marshmallow/marsh_5.jpg', 9, 'marshmallow'),
(151, '/img/tot_images/doggo_or_marshmallow/marshmallow/marsh_6_2.png', '/img/tot_images/doggo_or_marshmallow/marshmallow/marsh_6.jpg', 9, 'marshmallow'),
(152, '/img/tot_images/doggo_or_marshmallow/marshmallow/marsh_7_2.png', '/img/tot_images/doggo_or_marshmallow/marshmallow/marsh_7.jpg', 9, 'marshmallow'),
(153, '/img/tot_images/doggo_or_marshmallow/marshmallow/marsh_8_2.png', '/img/tot_images/doggo_or_marshmallow/marshmallow/marsh_8.jpg', 9, 'marshmallow'),
(154, '/img/tot_images/doggo_or_mop/mop/mop_1_2.png', '/img/tot_images/doggo_or_mop/mop/mop_1.jpg', 10, 'mop'),
(155, '/img/tot_images/doggo_or_mop/mop/mop_2_2.png', '/img/tot_images/doggo_or_mop/mop/mop_2.jpg', 10, 'mop'),
(156, '/img/tot_images/doggo_or_mop/mop/mop_3_2.png', '/img/tot_images/doggo_or_mop/mop/mop_3.jpg', 10, 'mop'),
(157, '/img/tot_images/doggo_or_mop/mop/mop_4_2.png', '/img/tot_images/doggo_or_mop/mop/mop_4.jpg', 10, 'mop'),
(158, '/img/tot_images/doggo_or_mop/mop/mop_5_2.png', '/img/tot_images/doggo_or_mop/mop/mop_5.jpg', 10, 'mop'),
(159, '/img/tot_images/doggo_or_mop/mop/mop_6_2.png', '/img/tot_images/doggo_or_mop/mop/mop_6.jpg', 10, 'mop'),
(160, '/img/tot_images/doggo_or_mop/mop/mop_7_2.png', '/img/tot_images/doggo_or_mop/mop/mop_7.jpg', 10, 'mop'),
(161, '/img/tot_images/doggo_or_mop/mop/mop_8_2.png', '/img/tot_images/doggo_or_mop/mop/mop_8.jpg', 10, 'mop'),
(162, '/img/tot_images/doggo_or_mop/mop/mop_9_2.png', '/img/tot_images/doggo_or_mop/mop/mop_9.jpg', 10, 'mop'),
(163, '/img/tot_images/doggo_or_mop/mop/mop_10_2.png', '/img/tot_images/doggo_or_mop/mop/mop_10.jpg', 10, 'mop'),
(164, '/img/tot_images/doggo_or_mop/doggo/doggo_1_2.png', '/img/tot_images/doggo_or_mop/doggo/doggo_1.jpg', 10, 'doggo'),
(165, '/img/tot_images/doggo_or_mop/doggo/doggo_2_2.png', '/img/tot_images/doggo_or_mop/doggo/doggo_2.jpg', 10, 'doggo'),
(166, '/img/tot_images/doggo_or_mop/doggo/doggo_3_2.png', '/img/tot_images/doggo_or_mop/doggo/doggo_3.jpg', 10, 'doggo'),
(167, '/img/tot_images/doggo_or_mop/doggo/doggo_4_2.png', '/img/tot_images/doggo_or_mop/doggo/doggo_4.jpg', 10, 'doggo'),
(168, '/img/tot_images/doggo_or_mop/doggo/doggo_5_2.png', '/img/tot_images/doggo_or_mop/doggo/doggo_5.jpg', 10, 'doggo'),
(169, '/img/tot_images/doggo_or_mop/doggo/doggo_6_2.png', '/img/tot_images/doggo_or_mop/doggo/doggo_6.jpg', 10, 'doggo'),
(170, '/img/tot_images/doggo_or_mop/doggo/doggo_7_2.png', '/img/tot_images/doggo_or_mop/doggo/doggo_7.jpg', 10, 'doggo'),
(171, '/img/tot_images/doggo_or_mop/doggo/doggo_8_2.png', '/img/tot_images/doggo_or_mop/doggo/doggo_8.jpg', 10, 'doggo'),
(172, '/img/tot_images/doggo_or_mop/doggo/doggo_9_2.png', '/img/tot_images/doggo_or_mop/doggo/doggo_9.jpg', 10, 'doggo'),
(173, '/img/tot_images/doggo_or_mop/doggo/doggo_10_2.png', '/img/tot_images/doggo_or_mop/doggo/doggo_10.jpg', 10, 'doggo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;