-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : db5000593621.hosting-data.io
-- Généré le : mer. 08 juil. 2020 à 18:52
-- Version du serveur :  5.7.30-log
-- Version de PHP : 7.0.33-0+deb9u8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbs572592`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `marque_assoc` text NOT NULL,
  `msg_avis` text,
  `nomprenom_avis` varchar(255) NOT NULL DEFAULT 'Anonyme',
  `note_avis` float NOT NULL,
  `status` set('OK','NOK') NOT NULL DEFAULT 'OK',
  `date_poste` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `id` int(11) NOT NULL,
  `nom_marque` varchar(255) NOT NULL,
  `secteur` set('Vêtements','SDB','Maison','Animaux','Enfants') NOT NULL,
  `site_internet` text NOT NULL,
  `logo` text NOT NULL,
  `MIF` tinyint(1) NOT NULL,
  `petite_desc` text NOT NULL,
  `0dechet` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`id`, `nom_marque`, `secteur`, `site_internet`, `logo`, `MIF`, `petite_desc`, `0dechet`) VALUES
(1, 'WeDressFair', 'Vêtements', 'https://www.wedressfair.fr', 'global/images/logos_marques/logoWeDressFair.png', 1, 'Découvrez des marques de mode éthique, qui placent le respect des travailleurs et de l’environnement au centre de leurs préoccupations. Trouvez des vêtements éthiques en matières biologiques, naturelles ou recyclées, fabriqués en France, en Europe, ou dans des usines certifiées. \r\nLeur mission ? Vous aider à trouver des vêtements qui correspondent à votre style et à vos valeurs. Le rêve de l’équipe ? Que vous n’ayez plus jamais à choisir entre l’un ou l’autre.', 0),
(2, 'Picture Organic Clothing', 'Vêtements', 'https://www.picture-organic-clothing.com/', 'global/images/logos_marques/logoPicture.png', 1, 'Vêtements de sport en polyester recyclé, doublures de vestes uniques en tissus récupérés, (un petit peu) Made in France, sac qui se découpe pour l\'utiliser autrement quand vous n\'en n\'aurez plus besoin ... bref une marque engagée depuis sa création et qui ne cesse d\'innover en faveur de l\'environnement ! Prochain objectif : créer un tissu textile partiellement issu d’une plante : la canne à sucre ou l’huile de la graine de ricin par exemple.', 0),
(3, 'oth', 'Vêtements', 'https://oth-paris.com', 'global/images/logos_marques/logoOth.png', 0, 'Les sneakers à la semelle en pneu recyclé\r\n\r\nPlus de 6 pneus arrivent en fin de vie toutes les secondes en Europe. OTH est né de l’idée qu’il est possible d’utiliser ces déchets afin d’en faire un produit désirable.\r\nLa semelle est conçue à base de pneus recyclés qui ont déjà parcouru le globe.\r\n3 paires produites = 1 pneu recyclé.', 1),
(4, 'Last Swab', 'SDB', 'https://www.lastswab.fr', 'global/images/logos_marques/logolastswab.png', 0, 'Le coton-tige réutilisable. ', 1),
(5, 'Lamazuna', 'SDB,Animaux', 'https://www.lamazuna.com', 'global/images/logos_marques/logoLamazuna.png', 1, 'Les produits Lamazuna sont « écolonomiques ».\r\nLeur objectif : réduire au maximum les déchets de la salle de bain et permettre de faire de belles économies ! Que ce soit en utilisant l’Oriculi, ce drôle d’instrument qui remplace les cotons-tiges à vie, le shampoing solide pour éviter des flacons en plastique plein la poubelle ou bien la Cup féminine, qui permet de laisser au placard les tampons et serviettes hygiéniques, le quotidien est simplifié tout en réduisant considérablement les déchets de la salle de bain. Les produits sont imaginés et désignés à Marches dans leurs bureaux, avec l’aide de leur graphiste basée à Paris. Les produits solides sont ensuite élaborés dans le sud de la France et Lamazuna fait appel à des fournisseurs Français chaque fois que cela est possible.', 1),
(6, 'respire', 'SDB', 'https://www.respire.co/', 'global/images/logos_marques/logoRespire.jpg', 0, 'Respire, c\'est un déodorant, mais également des produits solaires, des savons, du dentifrice, bref : tout plein de produits clean.', 1),
(7, '24 Bottles', 'Maison', 'https://www.24bottles.com', 'global/images/logos_marques/logo24Bottles.png', 0, '24Bottles a pour but de réduire les déchets plastiques en proposant des bouteilles réutilisables design.', 1),
(8, 'Lékué', 'Maison', 'https://www.lekue.com', 'global/images/logos_marques/logoLekue.png', 0, 'Livres de recettes, produits naturels, ustensiles éco-responsables ... Tout ce qu\'il vous faut pour mieux manger, facilement !', 1),
(11, 'COUTUME', 'SDB,Maison', 'https://www.coutumestore.com/', 'global/images/logos_marques/logoCoutume.png', 0, 'Chez Coutume, on retrouve une sélection d’objets cultes ou innovants, qualitatifs et intemporels!\r\nArts culinaires, arts ménagers, bricolage, droguerie, jardinage, papeterie, jeux et soins soigneusement sourcés, ainsi que de nombreuses solutions zéro déchet et respectueuse de l’environnement. ', 1),
(12, 'Les Tendances d\'Emma', 'SDB,Enfants', 'https://www.tendances-emma.fr', 'global/images/logos_marques/logoTendancedemma.png', 0, 'Remplacer 6 ans de produits jetables par un kit prêt à l’emploi, c’est la promesse tenue depuis bientôt 10 ans par les Tendances d’Emma. Cotons démaquillants, lingettes bébé et essuie-tout… 3 gammes, un seul principe : la praticité au service de l’écologie ! Une jolie boîte en bois pour ranger les produits, un filet pour les stocker et les laver… et hop, le tour est joué !', 1),
(13, 'Squiz', 'Enfants', 'https://www.squiz.co/fr/', 'global/images/logos_marques/logoSquiz.png', 1, 'Aussi pratiques que les gourdes de compote jetables mais bien plus économiques, ludiques et écologiques, les Squiz réutilisables permettent aux familles de concilier encas nomades et consommation responsable. Destinées à tous les âges (bébés, enfants, ados, adultes), elles se remplissent de recettes faites maison ou achetées en grand format et s’emportent partout. Réutilisables en moyenne 50 fois, elles permettent de varier goûts et saveurs, tout en réduisant ses déchets considérablement. Squiz est la seule marque de gourdes alimentaires réutilisables 100% Européenne.', 1),
(14, 'Altermundi', 'Vêtements,SDB,Maison', 'https://www.altermundi.com/fr/', 'global/images/logos_marques/logoAltermundi.png', 1, 'Depuis 16 ans, Altermundi et ses équipes défendent un commerce mondial éthique, humain et respectueux de la planète. Ils référencent aujourd’hui une centaine de fournisseurs ayant des exigences environnementales et sociales élevées. Altermundi porte des valeurs différentes, bien ancrées dans le réel, pour vous permettre de consommer autrement !', 1),
(15, 'Patagonia', 'Vêtements', 'https://eu.patagonia.com/fr/fr/home/', 'global/images/logos_marques/logoPatagonia.jpg', 0, 'Marque de vêtement outdoor créée il y a 40 ans, Patagonia est un des pionnier des marques de sport écoresponsables. Recyclage, matériaux respectueux de l\'environnement, activisme, dons ... Patagonia est engagé à tous les niveaux ', 0),
(16, 'Ecolaf', 'Vêtements', 'https://ecoalf.com/en/', 'global/images/logos_marques/logoEcoalf.png', 0, 'Tous les produits sont fait avec des matériaux écoresponsables ou recyclés.', 0),
(17, 'La Gentle Factory', 'Vêtements', 'https://www.lagentlefactory.com', 'global/images/logos_marques/logoLaGentleFactory.png', 1, 'Créée sous l’impulsion de Christèle Merter, ingénieure textile passionnée, La Gentle Factory est empreinte de l’esprit d’artisans que l’on retrouve dans les start-ups modernes.\r\n\r\nPropulsée en 2013, la marque est formée d’une équipe engagée et passionnée et amoureuse absolue de la mode. Leur promesse ? Offrir une mode innovante, durable et chaleureuse, fil après fil, sourire après sourire.', 0),
(18, 'Le Flageolet', 'Vêtements', 'https://www.leflageolet.fr/fr/', 'global/images/logos_marques/logoLeFlageolet.png', 1, '', 0),
(19, 'Lefrik', 'Vêtements', 'https://www.lefrik.com', 'global/images/logos_marques/logoLefrik.png', 0, 'Sacs à dos et accessoires de voyages faits avec des matériaux éco-responsables ou bouteilles recyclées.', 0),
(20, 'Parafina', 'Vêtements', 'https://parafina.eco/en/home/', 'global/images/logos_marques/logoParafina.png', 0, 'Lunettes de soleil venues d\'Espagne, fabriquées 100% avec des produits recyclés. En plus, elles sont flexibles et donc presque incassables.', 0),
(21, 'Ninety Percent', 'Vêtements', 'https://ninetypercent.com', 'global/images/logos_marques/logo90percent.png', 0, 'Ninety percent nous vient de Londres et reverse 90% de ses bénéfices. Bien-sûr, tous les matériaux sont éco-responsables. ', 0),
(22, 'Waio', 'Vêtements,SDB,Maison,Animaux,Enfants', 'https://waio.co/?view=fr', 'global/images/logos_marques/logoWaio.png', 1, 'Vous facilite la transition vers une économie circulaire et durable avec le catalogue de produits éco-responsables, durables et éthiques en ligne le plus large possible, accessibles à toute heure et livrés chez vous.', 1),
(23, 'La boutique du zéro déchet', 'Vêtements,SDB,Maison,Animaux,Enfants', 'https://www.boutiquezerodechet.com', 'global/images/logos_marques/logoBoutique0Dechet.png', 1, 'Hakuna Taka est un e-shop et une marque française de produits et accessoires pour un mode de vie zero dechet et zero plastique. Le défi était de regrouper sur une unique plateforme en ligne des produits pour la maison, les courses, les sorties, le bien-être et les enfants et permettre à tous de s’équiper en un clic en produits durables, réutilisables, compostables pour faciliter le mode de vie zéro déchet et lever les freins qui subsistent.', 1),
(24, 'Avril', 'SDB', 'https://www.avril-beaute.fr', 'global/images/logos_marques/logoAvril.png', 0, 'Avril est une marque de cosmétiques certifiés bio, approuvés par des organismes indépendants qui garantissent que leurs formules respectent le strict cahier des charges de la cosmétique bio, des matières premières aux produits finis.\r\nLeur mission est de rendre la cosmétique bio accessible à tous. Pour y arriver, Avril réduit tous ses coûts marketing : pas d’égérie, pas de publicité… Ils proposent ainsi des prix justes. Tous les jours, sans condition, à tout le monde. ', 0),
(25, 'A Slice Of Green', 'SDB,Maison,Enfants', 'https://www.asliceofgreen.co.uk', 'global/images/logos_marques/logoASliceOfGreen.png', 0, 'A Slice Of Green propose toute sorte de produits 0 déchet pour la cuisine, la salle de bain et les enfants, mais aussi des livres pour vous aider dans votre démarche !', 1),
(26, 'Cookut', 'SDB,Maison', 'https://www.cookut.com/fr/', 'global/images/logos_marques/logoCookut.png', 0, 'La mission de Cookut est d’inciter le plus grand nombre à retrouver le plaisir de «cuisiner maison » en créant des ustensiles efficaces, écologiques et joyeux. Ils fournissent aussi des kit 0 déchet avec pleins d\'ustensiles pour la maison et le bain.', 1),
(27, 'Les Petits Prödiges', 'SDB', 'https://lespetitsprodiges.com', 'global/images/logos_marques/logoLesPetitsProdiges.png ', 1, 'Les Petits Prodiges,proposent une marque de\r\ncosmétiques 100% naturelle, made in France et faite avec amour !', 0),
(28, 'Malou et Marius', 'SDB', 'https://malouetmarius.com', 'global/images/logos_marques/logoMalouMarius.png', 1, 'Malou & Marius proposent une gamme de soin pour hommes et pour femmes, fabriqués en France', 1),
(29, 'Pachamamaï', 'SDB', 'https://pachamamai.com', 'global/images/logos_marques/logoPachamamai.png', 1, 'En six ans à peine, Pachamamaï\r\na développé une cinquantaine de produits.\r\nShampoings, démaquillants, dentifrices, déodorants, savons à froid, soins visage, pains de rasage, etc.\r\nA la fois bienveillant pour votre peau ET pour la planète.\r\nLes soins Pachamamaï sont très riches en actifs d’origine naturelle., formulés avec des compositions douces pour nettoyer sans irriter la peau.\r\nFabriqués en France, de manière artisanale.\r\nSans suremballage pour préserver les ressources et viser le zéro déchet.', 1),
(30, 'The bam and boo', 'SDB,Maison', 'https://fr.thebamandboo.com', 'global/images/logos_marques/logoTheBamAndBoo.png', 0, 'The Bam & Boo produit toute sorte de produits de bain en bambou, mais aussi des pailles. ', 1),
(31, 'The Humble Co.', 'SDB', 'https://www.thehumble.co', 'global/images/logos_marques/logoTheHumbleCo.png', 0, 'Cette marque scandinave produit des produits pour la salle de bain en bambou. ', 0),
(32, 'Slow Cosmétique', 'SDB,Maison,Enfants', 'https://www.slow-cosmetique.com', 'global/images/logos_marques/logoSlowCosmetique.png', 1, 'Le principe de ce site est que chaque marque qui reçoit la Mention Slow Cosmétique peut ouvrir sa boutique sur la plateforme Slow-cosmetique.com. Elle y vend ses produits en direct, en gérant elle-même ses articles (photos, textes, ...). Pratique, la boutique collaborative permet à l\'internaute d\'acheter en direct au même endroit ! Un autre avantage est de recevoir un seul colis grâce à une logistique groupée.\r\n\r\nLe shopping sur Slow-cosmetique.com est à la fois sensé et engagé car les produits sont \"clean\" (ils ont été pré-examinés par l\'Association pour la Mention), et on soutient l\'artisan en direct ce qui soutient toute la fillière alternative. On y trouve des produits cosmétiques bien sur mais aussi pour la maison et le puériculture.', 1),
(33, 'Marius Fabre', 'SDB,Maison', 'https://www.marius-fabre.com/fr/', 'global/images/logos_marques/logoMariusFabre.png', 1, 'La vrai savon de Marseille ! Ne pollue pas lorsqu\'il est rejeté dans la nature et vous sera utile pour fabriquer vos produits maison. ', 1),
(34, 'Savonnerie Fer à Cheval', 'SDB,Maison', 'https://www.savon-de-marseille.com/fr/', 'global/images/logos_marques/logoFerACheval.png', 1, 'La vrai savon de Marseille ! Ne pollue pas lorsqu\'il est rejeté dans la nature et vous sera utile pour fabriquer vos produits maison.', 1),
(35, 'Anotherway', 'Maison', 'https://www.another-way.com', 'global/images/logos_marques/logoAnotherway.png', 1, 'Emballages alimentaires à base de cire d’abeille remplaçant parfaitement le film plastique, 100% naturel, réutilisable et lavable. Ce site propose aussi kit lessive.', 1),
(36, 'Abeego', 'Maison', 'https://abeego.com', 'global/images/logos_marques/logoAbeego.png', 0, 'Emballages alimentaires à base de cire d’abeille remplaçant parfaitement le film plastique, 100% naturel, réutilisable et lavable.', 1),
(37, 'EcoCoconut', 'SDB,Maison,Animaux', 'https://ecococonut.com', 'global/images/logos_marques/logoEcoCoconut.png', 0, 'EcoCoconut vous propose de remplacer vos ustensiles à base de plastique par des ustensiles à base de noix de coco ! Vous trouverez des produits pour votre cuisine, salle de bain et même les animaux. ', 1),
(38, 'Fariboles', 'Maison', 'https://www.fariboles.com/fr/', 'global/images/logos_marques/logoFariboles.png', 1, 'Fariboles est une marque de bougies végétales et respectueuses de l\'environnement, faites en France.', 0),
(39, 'Klean Kanteen', 'Maison,Enfants', 'https://www.kleankanteen.com', 'global/images/logos_marques/logoKleanKanteen.png', 0, 'Klean Kanteen vous permet d\'acheter de nombreux accessoires pour la cuisine respectueux de votre santé et 0 déchet.', 1),
(40, 'Nuts Innovations', 'Maison', 'http://www.nuts-innovations.com/en/', 'global/images/logos_marques/logoNuts.png', 0, 'Nuts, c\'est toutes les solutions 0 déchet qu\'il vous faut pour emballer vos aliments, tupperware etc et les conserver. ', 1),
(41, 'Greenweez', 'SDB,Maison,Animaux,Enfants', 'https://www.greenweez.com', 'global/images/logos_marques/logoGreenweez.png', 1, 'Greenweez vous permet de faire vos courses parmi plus de 13 000 produits bio et écologiques, soigneusement sélectionnés par leurs experts. À la recherche de nouveaux produits, bons, exigeants, respectueux de l’environnement, à des prix justes pour tous : justes pour vous les clients, mais aussi les producteurs et fournisseurs, et tous ceux qui travaillent le long de cette chaîne : les préparateurs de commande, les livreurs…', 1),
(42, 'Biofan', 'Animaux', 'https://www.biofan.com', 'global/images/logos_marques/logoBiofan.png', 0, 'Biofan - « bio for animals » - est un site de vente en ligne proposant une large gamme de nourriture bio et naturelle mais aussi d’accessoires écologiques destinés aux animaux domestiques. Pour les fondateurs de l’entreprise, l’objectif est double : donner aux animaux une alimentation bénéfique pour leur santé et leur longévité, en proposant des produits élaborés dans le respect des normes environnementales et sociales.', 0),
(43, 'Beco', 'Animaux', 'https://www.becopets.com', 'global/images/logos_marques/logoBeco.png', 0, 'Avec la quasi-totalité de ses produits provenant d\'Europe, cette marque anglaise ainsi que ses fournisseurs respectent la planète en minimisant leur impact carbone dans tout ce qu\'ils font !  ', 0),
(44, 'Nestor Bio', 'Animaux', 'https://www.nestorbio.fr', 'global/images/logos_marques/logoNestorbio.png', 1, 'Nestor Bio ce sont les premières croquettes bio françaises avec et sans céréales ainsi que des bonnes fricassées sans céréales et de bonnes friandises!', 0),
(45, 'Tomojo', 'Animaux', 'https://tomojo.co', 'global/images/logos_marques/logoTomojo.png', 1, 'Les croquettes aux insectes pour chiens et chats, naturellement sans compromis.', 1),
(46, 'Bébé au naturel', 'Enfants', 'https://www.bebe-au-naturel.com/', 'global/images/logos_marques/logoBebeAuNaturel.png', 1, 'Ce site vous propose toute une sélection de produits zéro déchet et/ou écologiques et de marques soigneusement sélectionnées selon des critères privilégiants des fabricants, producteurs ou revendeurs français ou européens, ancrés socialement dans leurs territoires pour la préservation de l\'emploi et des ressources naturelles.', 1),
(47, 'Perpète', 'Vêtements,Enfants', 'https://www.perpete.co', 'global/images/logos_marques/logoPerpete.png', 0, 'L\'objectif étant de limiter notre impact sur la planète en évitant la surproduction et l’épuisement des ressources naturelles, Perpètre conçoit des vêtements pour enfant résistants et durables afin qu’ils soient portés et aimés encore et encore. Une fois les vêtements devenus trop petits, vous pouvez les renvoyez à la marque pour réparation/recyclage et ainsi obtenir entre 15% et 40% du prix d’origine en bons d’achat. Une page de vente de vêtement d\'occasion ouvrira bientôt !', 1),
(48, 'Marcel et Fifi', 'Vêtements,Enfants', 'https://www.marceletfifi.be', 'global/images/logos_marques/logoMarcelFifi.png', 0, 'Marcel & Fifi est un site de vente en ligne de vêtements et de jouets de seconde de main de qualité pour les enfants de 0 à 8 ans.', 1),
(49, 'Little Woude', 'Vêtements,Enfants', 'https://www.little-woude.com/fr/', 'global/images/logos_marques/logoLittleWoude.png', 1, 'Depuis 2010 Little Woude propose un concept de vêtements eco-responsables qui grandissent avec l\'enfant. Fabriqués en France avec des tissus bio, en partie tissé teint en France. Pour des enfants de 0 à 6 ans (et plus sur commande).', 1),
(50, 'Cocon Fair', 'Vêtements,Enfants', 'https://coconfair.com', 'global/images/logos_marques/logoCoconFair.png', 1, 'Cocon fair est une marque de vêtements et accessoires pour bébés et femmes fabriqués en France et éco responsable. Dressing élégant et bohème en coton oeko-tex avec finitions et broderies délicates. Certains de leurs textiles sont issus du recyclage et le packaging est 100% compostable, recyclé et recyclable.', 0),
(51, 'Les P’tits louent', 'Vêtements,Enfants', 'https://www.lesptitslouent.ch', 'global/images/logos_marques/logoLesPtitsLouent.png', 0, 'Les P\'tits louent est une bibliothèque de vêtements pour enfant à Genève. Louez des vêtements de qualité pour vos bout\'-choux afin de consommer de manière durable et responsable. Echangez-les lorsqu\'ils sont trop petits!', 1),
(52, 'Wild Dressing', 'Vêtements,Enfants', 'https://www.wildressing.com', 'global/images/logos_marques/logoWildDressing.png', 1, 'wildressing.com c\'est votre outlet de marques éthiques pour les enfants de 0 à 10 ans.', 0),
(53, 'Love & Green', 'SDB,Enfants', 'https://www.loveandgreen.fr', 'global/images/logos_marques/logoLoveAndGreen.png', 0, 'Pionnier sur le marché des couches écologiques, Love & Green propose des couches certifiées Ecolabel avec un contact peau 100% d\'origine naturelle. La qualité Love & Green pour le bien-être de votre bébé. Cette marque propose aussi une gamme hygiène féminine.', 0),
(54, 'énamour', 'SDB,Enfants', 'https://fr.enamour.ca', 'global/images/logos_marques/logoEnamour.png', 0, 'Énamour crée du beau, du bon et du 100 % naturel de source végétale, avec sa première gamme de produits de soins pour la famille.', 0),
(55, 'Tidoo', 'Enfants', 'https://www.tidoo.com', 'global/images/logos_marques/logoTidoo.png', 1, 'Tidoo ce sont des couches écologiques made in France par des parents engagés pour bébé et la planète', 0),
(56, 'Cattier', 'SDB,Enfants', 'https://www.cattier-paris.com/fr/', 'global/images/logos_marques/logoCattier.png', 1, 'Depuis sa création, Cattier s’est engagé aux côtés de la Nature et des Hommes. Précurseur de l’aventure bio en cosmétique, la marque a toujours attaché une importance particulière à sa responsabilité environnementale mais aussi sociale. Au-delà du respect des cahiers des charges Ecocert, Cosmebio et même Cosmos, Cattier va plus loin pour améliorer de façon continue son impact sur la planète et la société.', 0),
(57, 'Weleda', 'SDB,Enfants', 'https://www.weleda.fr', 'global/images/logos_marques/logoWeleda.png', 0, 'Weleda est une marque pionnière de la cosmétique naturelle et bio depuis 1921, proposant des soins et produits de beauté 100 % d\'origine naturelle.', 0),
(58, 'Charlotte baby bio', 'SDB,Enfants', 'http://www.charlottebabyfamily.com', 'global/images/logos_marques/logoCBB.png', 1, 'CBB propose des produits pour le bain pour toute la famille contenant au minimum 98% d’ingrédients d’origine naturelle mais\r\n0 perturbateurs endocriniens.', 0),
(59, 'PaPate', 'Enfants', 'https://www.papate.fr', 'global/images/logos_marques/logoPapate.png', 1, 'La puériculture bio et fabriquée en France.', 0),
(60, 'Ekobutiks', 'Enfants', 'https://www.ekobutiks.com', 'global/images/logos_marques/logoEkobutiks.png', 0, 'Jouets en bois, jouets écologiques, jouets bio et naturels, doudous bio et écolos pour éveiller les bébés.', 0),
(61, 'Piwapee', 'Enfants', 'https://www.piwapee.com', 'global/images/logos_marques/logoPiwapee.png', 0, 'Fondée en 2007,Piwapee est une société familiale française qui crée et distribue des articles innovants, durables et réutilisables autour du change de bébé : Maillots couches, couches lavables, couches d\'apprentissage, vêtements anti UV bébé etc...', 1),
(62, 'Hamac', 'Enfants', 'https://www.hamac-paris.fr/#ae5', 'global/images/logos_marques/logoHamac.png', 1, 'Hamac, ce sont des couche lavable, des maillot-couches et accessoires pour bébé respectueux de l\'environnement et de leur bien-être.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `marques_fav`
--

CREATE TABLE `marques_fav` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `marque_fav` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `marques_fav`
--

INSERT INTO `marques_fav` (`id`, `email`, `marque_fav`) VALUES
(35, 'email@email.com', 'Patagonia'),
(36, 'email@email.com', '24 Bottles'),
(40, 'email@email.com', 'Altermundi'),
(41, 'email@email.com', 'A Slice Of Green'),
(42, 'email@email.com', 'Marcel '),
(47, 'email@email.com', 'Marcel et Fifi');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` text NOT NULL,
  `user_ok` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `email`, `mdp`, `user_ok`) VALUES
(53, 'email@email.com', '***', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `marques_fav`
--
ALTER TABLE `marques_fav`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT pour la table `marques_fav`
--
ALTER TABLE `marques_fav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
