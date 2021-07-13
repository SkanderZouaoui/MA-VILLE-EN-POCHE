-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 13 juil. 2021 à 22:38
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mvep`
--

-- --------------------------------------------------------

--
-- Structure de la table `bricolage`
--

CREATE TABLE `bricolage` (
  `id` int(11) NOT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `localisation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bricolage`
--

INSERT INTO `bricolage` (`id`, `categorie`, `nom`, `image`, `description`, `localisation`, `latitude`, `longitude`) VALUES
(1, 'Plambier', 'Moetez Doghman', 'bricolage-60edf0be9ee34.jpg', 'Un jeune plombier motivé', 'corniche bizerte rue assia kandara, Bizerte, Tunisie', 37.295824411072, 9.8642904100647);

-- --------------------------------------------------------

--
-- Structure de la table `cafe`
--

CREATE TABLE `cafe` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `localisation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cafe`
--

INSERT INTO `cafe` (`id`, `nom`, `image`, `description`, `localisation`, `latitude`, `longitude`) VALUES
(10, 'Vanilla Coffe shop', '107709266-104637821323236-5205493706190693474-n-60ecb4144c089.png', 'Ouverte 9h -> 20h', 'Rue Khalil Fouchali، Banzart, Tunisie', 37.296018581579, '9.864761808299075'),
(11, 'Vague Bleu', '116212695-2654175741491720-3241375585818357741-n-60ecb4c933a6d.png', 'Ouverte 7h -> 20h', 'Route Corniche bizerte, Tunisie', 37.311183669928, '9.868155473255168');

-- --------------------------------------------------------

--
-- Structure de la table `culture`
--

CREATE TABLE `culture` (
  `id` int(11) NOT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `localisation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `culture`
--

INSERT INTO `culture` (`id`, `categorie`, `nom`, `image`, `description`, `localisation`, `latitude`, `longitude`) VALUES
(3, 'CoWorkingSpace', 'CBC', '14890587-1678962142393712-1584586146015033705-o-60ecb64a09d20.jpg', 'ouverte de 9h -> 22h', 'P8, Zarzouna, Tunisie', 37.265111425893, 9.8787341056099),
(4, 'Lycées', 'Farhat Hached', '23659202-1991524187728390-7746479393493721418-n-60ecb6c670ca6.jpg', 'Grand lycee', '100 Bd. Hédi Chaker, Bizerte, Tunisie', 37.272110504755, 9.8670705197086);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210706112350', '2021-07-06 19:36:20', 57),
('DoctrineMigrations\\Version20210706125348', '2021-07-06 19:36:20', 21);

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `id` int(11) NOT NULL,
  `idresto_id` int(11) DEFAULT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`id`, `idresto_id`, `categorie`, `nom`, `image`, `description`, `prix`) VALUES
(13, 2, 'Plat', 'Makrouna', 'makrouna-60edf6e886fbf.jpg', 'Makrouna', '15DT'),
(14, 2, 'Entrées', 'Salade Cesar', 'salade-60edf7c08757f.jpg', 'Salade Cesar Poulet', '12DT'),
(15, 2, 'FastFood', 'Pizza Peperoni', 'pizza-60edf7f8a845b.jpg', 'Peperoni au feu de bois', '25DT'),
(16, 2, 'Dessert', 'Cheese Cake au Fromboises', 'cheesecake-60edf8331baa3.jpg', 'Cheese Cake au Fromboises', '10DT');

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `localisation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nommenu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `restaurant`
--

INSERT INTO `restaurant` (`id`, `nom`, `image`, `description`, `localisation`, `nommenu`, `latitude`, `longitude`) VALUES
(2, 'Piccolino', '100704684-275390373844709-2630329592312758272-n-60ecb8d1eced4.jpg', 'Piccolino', 'Route de la Corniche، Banzart, Tunisie', 'Menu Piccolino', 37.296844334072, 9.8666132030716);

-- --------------------------------------------------------

--
-- Structure de la table `sante`
--

CREATE TABLE `sante` (
  `id` int(11) NOT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `localisation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sante`
--

INSERT INTO `sante` (`id`, `categorie`, `nom`, `image`, `description`, `localisation`, `latitude`, `longitude`) VALUES
(5, 'Hopitale', 'Clinique el Raouebi', '17620233-1351440464878251-6919893315020729287-o-60ecb5d5d23c4.jpg', 'clinique', 'Boulevard 15 Octobre, Bizerte، Banzart 7000, Tunisie', 37.282391289713, 9.8706284699669);

-- --------------------------------------------------------

--
-- Structure de la table `sport`
--

CREATE TABLE `sport` (
  `id` int(11) NOT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `localisation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sport`
--

INSERT INTO `sport` (`id`, `categorie`, `nom`, `image`, `description`, `localisation`, `latitude`, `longitude`) VALUES
(1, 'TERRAIN FOOTBALL', '15 Octobre', '1376577-10200862439590930-1412847149-n-60ecb5063f672.jpg', '15 octobre', 'Unnamed Road, Bizerte, Tunisie', 37.279196435924, 9.8659480152359),
(2, 'TERRAIN FOOTBALL', 'Terrain Dalleli', '17991941-1346764428750909-785361360889342472-n-60ecb57deb1c1.jpg', 'num', 'Route de la Corniche، Banzart, Tunisie', 37.298455272144, 9.8667553601494);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `nom`, `prenom`) VALUES
(1, 'moetaz', '[]', '$2y$13$tnB0F1PZw.lXIoBOzGBMOe7OQrMxjqH05m9/NcCoXDb4eRcsO6Q4u', '', ''),
(3, 'moetaz.doghman@eprit.tn', '[]', '$2y$13$esAHXwKZwrnoNx/i7cV9Vugr4ndQT8QITkD59ILDkjXXDSfBhI.aO', '', ''),
(4, 'ahmed@gmail.com', '[]', '$2y$13$zv7bIOSOSohqnazbjxgb0u0rf1Z38cULbNn6S2hkX/NqTiD02Sx/W', 'ahmed', 'doghman'),
(5, 'skaner@gmail.com', '[]', '$2y$13$h.5wnEOi7TLcnT4CWsONhu9M4v.IlJhOXV1OqWABuM/2JhwJPeCwK', 'skander', 'skander'),
(6, 'mohamedskander.zouaoui@esprit.tn', '[]', '$2y$13$D4ZcACesvX7jZbiCUzoY1.MS2NAAqr9nuEoPZHutEGOQA37eYS53q', 'Zouaoui', 'Skander');

-- --------------------------------------------------------

--
-- Structure de la table `vacance`
--

CREATE TABLE `vacance` (
  `id` int(11) NOT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vacance`
--

INSERT INTO `vacance` (`id`, `categorie`, `nom`, `image`, `description`, `location`, `latitude`, `longitude`) VALUES
(2, 'Hotel', 'Hôtel Nour', 'hotelnour-60edf17444b40.jpg', 'Hotel Nour', 'Unnamed Road, Bizerte, Tunisie', 37.286956045864, 9.8730558691254),
(3, 'Hotel', 'Hotel Andalucia', '81018131-2785410664835375-1355947288748359680-n-60ecb870b06ff.jpg', 'Andalucia', 'Unnamed Road, Bizerte, Tunisie', 37.287999562732, 9.8725878236523);

-- --------------------------------------------------------

--
-- Structure de la table `vetement`
--

CREATE TABLE `vetement` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `localisation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vetement`
--

INSERT INTO `vetement` (`id`, `nom`, `image`, `description`, `localisation`, `latitude`, `longitude`) VALUES
(2, 'Hamadi Abid', '15800609-560445440819081-417753644341191518-o-60ecb70fdd136.png', 'Hamadi Abid', '5 Ave Hassen Nouri, Bizerte, Tunisie', 37.27230153484, 9.8706157294741),
(3, 'LC WAIKIKI', '13087851-473686382822939-7499999229471545679-n-60ecb80f4b5c8.png', 'LC WAIKIKI', '21 Ave Hassen Nouri, Bizerte, Tunisie', 37.272780441932, 9.8701362846127);

-- --------------------------------------------------------

--
-- Structure de la table `vie_pratique`
--

CREATE TABLE `vie_pratique` (
  `id` int(11) NOT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `localisation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vie_pratique`
--

INSERT INTO `vie_pratique` (`id`, `categorie`, `nom`, `image`, `description`, `localisation`, `latitude`, `longitude`) VALUES
(2, 'Banque', 'Amen First Bank', 'amenbanque-60edf2ce40364.jpg', 'Amen Banque', '88 Rue Bourguiba, Bizerte, Tunisie', 37.271333572934, 9.8694724378815);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bricolage`
--
ALTER TABLE `bricolage`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cafe`
--
ALTER TABLE `cafe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `culture`
--
ALTER TABLE `culture`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2038A20783ADA0DC` (`idresto_id`);

--
-- Index pour la table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sante`
--
ALTER TABLE `sante`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- Index pour la table `vacance`
--
ALTER TABLE `vacance`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vetement`
--
ALTER TABLE `vetement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vie_pratique`
--
ALTER TABLE `vie_pratique`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bricolage`
--
ALTER TABLE `bricolage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `cafe`
--
ALTER TABLE `cafe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `culture`
--
ALTER TABLE `culture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `sante`
--
ALTER TABLE `sante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `sport`
--
ALTER TABLE `sport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `vacance`
--
ALTER TABLE `vacance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `vetement`
--
ALTER TABLE `vetement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `vie_pratique`
--
ALTER TABLE `vie_pratique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `plat`
--
ALTER TABLE `plat`
  ADD CONSTRAINT `FK_2038A20783ADA0DC` FOREIGN KEY (`idresto_id`) REFERENCES `restaurant` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
