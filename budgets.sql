-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : gaetan.store:4226
-- Généré le : sam. 07 août 2021 à 13:56
-- Version du serveur : 8.0.26-0ubuntu0.21.04.3
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `budgets`
--

-- --------------------------------------------------------

--
-- Structure de la table `annee`
--

CREATE TABLE `annee` (
  `id` int NOT NULL,
  `value` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `annee`
--

INSERT INTO `annee` (`id`, `value`) VALUES
(1, 2021),
(2, 2022);

-- --------------------------------------------------------

--
-- Structure de la table `budgets`
--

CREATE TABLE `budgets` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `sommes` decimal(10,2) DEFAULT NULL,
  `sommes_due` int DEFAULT '1',
  `montant_due` decimal(10,2) DEFAULT '0.00',
  `status` varchar(10) DEFAULT '1',
  `month` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `year` year DEFAULT NULL,
  `active` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `budgets`
--

INSERT INTO `budgets` (`id`, `user_id`, `name`, `sommes`, `sommes_due`, `montant_due`, `status`, `month`, `year`, `active`) VALUES
(1, 1, 'Loyer', '460.68', 1, '0.00', '1', 'juillet', 2021, 1),
(2, 1, 'Moto', '78.70', 1, '0.00', '1', 'juillet', 2021, 1),
(3, 1, 'Électricité', '57.70', 1, '0.00', '1', 'juillet', 2021, 1),
(4, 1, 'Café', '58.00', 1, '0.00', '1', 'juillet', 2021, 1),
(5, 1, 'Ovh', '48.62', 1, '0.00', '1', 'juillet', 2021, 1),
(6, 1, 'Bouygues Télécom (Mobile)', '75.41', 1, '0.00', '1', 'juillet', 2021, 1),
(7, 1, 'Sfr (Fixe)', '51.41', 1, '0.00', '1', 'juillet', 2021, 1),
(8, 1, 'Garage', '47.78', 1, '0.00', '1', 'juillet', 2021, 1),
(9, 1, 'Cetelem', '98.00', 1, '0.00', '1', 'juillet', 2021, 1),
(10, 1, 'Écran paiement x3', '43.62', 1, '0.00', '1', 'juillet', 2021, 1),
(11, 1, 'Loyer', '461.24', 1, '0.00', '2', 'aout', 2021, 1),
(12, 1, 'Moto', '78.70', 1, '0.00', '1', 'aout', 2021, 1),
(13, 1, 'Électricité', '51.62', 1, '0.00', '1', 'aout', 2021, 1),
(14, 1, 'Nespresso', '79.50', 1, '0.00', '1', 'aout', 2021, 1),
(15, 1, 'Bouygues Télécom (Mobile)', '83.23', 1, '0.00', '1', 'aout', 2021, 1),
(17, 1, 'Sfr', '112.91', 1, '0.00', '1', 'aout', 2021, 1),
(18, 1, 'Garage', '50.00', 1, '0.00', '1', 'aout', 2021, 1),
(19, 1, '1and1', '192.00', 1, '0.00', '1', 'aout', 2021, 1),
(20, 1, 'Cetelem', '86.00', 1, '0.00', '1', 'aout', 2021, 1),
(21, 1, 'Écran paiement x3', '43.62', 1, '0.00', '1', 'aout', 2021, 1),
(22, 1, 'Nihel', '150.00', 1, '0.00', '1', 'aout', 2021, 1),
(26, 1, 'Atol Lunette', '45.00', 1, '0.00', '1', 'aout', 2021, 1),
(27, 2, 'Macif aprt ', '11.36', 1, '0.00', '2', 'aout', 2021, 1),
(28, 2, 'Adl partener ', '4.45', 1, '0.00', '2', 'aout', 2021, 1),
(29, 2, 'Assurance tele ', '12.90', 1, '0.00', '1', 'aout', 2021, 1),
(30, 2, 'Bouygues fix ', '39.99', 1, '0.00', '2', 'aout', 2021, 1),
(32, 2, 'Bouygues tele ', '92.60', 1, '0.00', '2', 'aout', 2021, 1),
(33, 3, 'clopes', '300.00', 1, '0.00', '1', 'juillet', 2021, 1),
(34, 1, 'Loyer', '461.24', 1, '0.00', '2', 'septembre', 2021, 1),
(35, 1, 'Moto', '78.70', 1, '0.00', '2', 'septembre', 2021, 1),
(36, 1, 'Bouygues Télécom (Fixe)', '50.98', 1, '0.00', '2', 'septembre', 2021, 1),
(37, 1, 'Bouygues Télécom (Mobile)', '45.85', 1, '0.00', '2', 'septembre', 2021, 1),
(38, 1, 'Nespresso', '58.00', 1, '0.00', '2', 'septembre', 2021, 1),
(39, 1, 'Cetelem', '88.00', 1, '0.00', '2', 'septembre', 2021, 1),
(40, 1, 'Électricité', '56.00', 1, '0.00', '2', 'septembre', 2021, 1),
(41, 1, 'Nihel', '180.00', 1, '0.00', '2', 'septembre', 2021, 1),
(42, 1, 'Pôle emploi', '138.32', 1, '0.00', '2', 'septembre', 2021, 1),
(43, 1, 'Frais carte bancaire', '3.00', 1, '0.00', '2', 'septembre', 2021, 1),
(44, 1, 'Frais carte bancaire', '3.00', 1, '0.00', '2', 'aout', 2021, 1),
(45, 1, 'Frais carte bancaire', '3.00', 1, '0.00', '1', 'juillet', 2021, 1),
(46, 1, 'Découvert', '7.74', 1, '0.00', '1', 'aout', 2021, 1),
(47, 1, 'Figurine', '21.47', 1, '0.00', '1', 'aout', 2021, 1),
(48, 1, 'Boulangerie', '19.00', 1, '0.00', '1', 'aout', 2021, 1),
(49, 1, 'NIhel', '30.00', 1, '0.00', '2', 'octobre', 2021, 1),
(51, 1, 'Gâteau anniversaire (Papa)', '15.00', 1, '0.00', '1', 'aout', 2021, 1),
(53, 1, 'Course', '44.22', 1, '0.00', '1', 'aout', 2021, 1),
(54, 1, 'Setram ticket', '4.50', 1, '0.00', '1', 'aout', 2021, 1),
(55, 1, 'Piment rouge', '14.00', 1, '0.00', '1', 'juillet', 2021, 1),
(56, 1, 'Carrefour', '38.94', 1, '0.00', '1', 'juillet', 2021, 1),
(57, 1, 'Retrait', '70.00', 1, '0.00', '1', 'juillet', 2021, 1),
(58, 1, 'Carrefour orien', '39.45', 1, '0.00', '1', 'juillet', 2021, 1),
(59, 1, 'Foot locker', '9.99', 1, '0.00', '1', 'juillet', 2021, 1),
(60, 1, 'Aldi', '15.08', 1, '0.00', '1', 'juillet', 2021, 1),
(61, 1, 'Poissonerie', '7.60', 1, '0.00', '1', 'juillet', 2021, 1),
(62, 1, 'Le Maryland Tabac', '14.00', 1, '0.00', '1', 'juillet', 2021, 1),
(63, 1, 'Retrait', '50.00', 1, '0.00', '1', 'juillet', 2021, 1),
(64, 1, 'Pl Loisirs', '7.00', 1, '0.00', '1', 'juillet', 2021, 1),
(65, 1, 'Retrait', '20.00', 1, '0.00', '1', 'juillet', 2021, 1),
(66, 1, 'Boulangerie', '9.70', 1, '0.00', '1', 'juillet', 2021, 1),
(67, 1, 'Ubisoft', '59.99', 1, '0.00', '1', 'juillet', 2021, 1),
(68, 1, 'Aldi', '2.56', 1, '0.00', '1', 'juillet', 2021, 1),
(69, 1, 'Péage', '6.00', 1, '0.00', '1', 'juillet', 2021, 1),
(70, 1, 'Figurine', '25.98', 1, '0.00', '2', 'septembre', 2021, 1),
(71, 1, 'Ovh', '42.00', 1, '0.00', '2', 'septembre', 2021, 1),
(72, 1, 'Course', '200.00', 1, '0.00', '2', 'septembre', 2021, 1),
(74, 1, 'Loyer', '461.24', 1, '0.00', '2', 'octobre', 2021, 1),
(75, 1, 'Moto', '78.70', 1, '0.00', '2', 'octobre', 2021, 1),
(76, 1, 'Bouygues Télécom (Fixe)', '38.99', 1, '0.00', '2', 'octobre', 2021, 1),
(77, 1, 'Bouygues Télécom (Mobile)', '34.76', 1, '0.00', '2', 'octobre', 2021, 1),
(78, 1, 'Nespresso', '58.00', 1, '0.00', '2', 'octobre', 2021, 1),
(79, 1, 'Cetelem', '88.00', 1, '0.00', '2', 'octobre', 2021, 1),
(80, 1, 'Électricité', '56.00', 1, '0.00', '2', 'octobre', 2021, 1),
(81, 1, 'Frais carte bancaire', '3.00', 1, '0.00', '2', 'octobre', 2021, 1),
(82, 1, 'Figurine', '25.98', 1, '0.00', '2', 'octobre', 2021, 1),
(83, 1, 'Ovh', '10.28', 1, '0.00', '2', 'octobre', 2021, 1),
(85, 1, 'Cadeaux nihel', '170.00', 1, '0.00', '2', 'octobre', 2021, 1),
(86, 1, 'Loyer', '461.24', 1, '0.00', '2', 'novembre', 2021, 1),
(87, 1, 'Moto', '78.70', 1, '0.00', '2', 'novembre', 2021, 1),
(88, 1, 'Bouygues Télécom (Fixe)', '38.99', 1, '0.00', '2', 'novembre', 2021, 1),
(89, 1, 'Bouygues Télécom (Mobile)', '34.76', 1, '0.00', '2', 'novembre', 2021, 1),
(90, 1, 'Nespresso', '58.00', 1, '0.00', '2', 'novembre', 2021, 1),
(91, 1, 'Cetelem', '88.00', 1, '0.00', '2', 'novembre', 2021, 1),
(92, 1, 'Électricité', '56.00', 1, '0.00', '2', 'novembre', 2021, 1),
(93, 1, 'Frais carte bancaire', '3.00', 1, '0.00', '2', 'novembre', 2021, 1),
(94, 1, 'Figurine', '25.98', 1, '0.00', '2', 'novembre', 2021, 1),
(95, 1, 'Ovh', '10.28', 1, '0.00', '2', 'novembre', 2021, 1),
(96, 1, 'Epargne salariale', '100.00', 1, '0.00', '2', 'novembre', 2021, 1),
(97, 1, 'Cadeaux nihel', '170.00', 1, '0.00', '2', 'novembre', 2021, 1),
(98, 1, 'Fromager', '6.62', 1, '0.00', '1', 'aout', 2021, 1),
(99, 2, 'Macif mutuelle ', '39.44', 1, '0.00', '2', 'aout', 2021, 1),
(100, 2, 'Course', '150.00', 1, '0.00', '2', 'aout', 2021, 1),
(101, 2, 'Decouvert ', '416.00', 1, '0.00', '1', 'aout', 2021, 1),
(102, 2, 'Carte de bus ', '45.60', 1, '0.00', '2', 'aout', 2021, 1),
(103, 2, 'Permis ', '150.00', 1, '0.00', '2', 'aout', 2021, 1),
(104, 1, 'Marché', '20.00', 1, '0.00', '1', 'aout', 2021, 1),
(105, 1, 'Nespresso', '29.00', 1, '0.00', '1', 'aout', 2021, 1),
(106, 2, 'Crourois de destruction ', '125.00', 1, '0.00', '2', 'septembre', 2021, 1),
(107, 2, 'Commission  de cotisations ', '8.55', 1, '0.00', '1', 'aout', 2021, 1),
(109, 1, 'Course', '10.39', 1, '0.00', '1', 'aout', 2021, 1),
(110, 1, 'Nihel', '0.00', 2, '40.00', '1', 'aout', 2021, 1),
(111, 1, 'Bouygues Télécom (Mobile)', '38.99', 1, '0.00', '1', 'aout', 2021, 1),
(112, 1, 'Carte identité', '25.00', 1, '0.00', '1', 'aout', 2021, 1),
(113, 1, 'Mutuel', '157.50', 1, '0.00', '2', 'septembre', 2021, 1),
(114, 1, 'Mutuel', '52.50', 1, '0.00', '2', 'octobre', 2021, 1),
(115, 1, 'Course', '200.00', 1, '0.00', '2', 'octobre', 2021, 1);

-- --------------------------------------------------------

--
-- Structure de la table `changelogs`
--

CREATE TABLE `changelogs` (
  `id` int NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `changelogs`
--

INSERT INTO `changelogs` (`id`, `title`, `value`, `status`, `created_at`) VALUES
(1, 'Création du site internet Budgets', 'Mise en ligne du site internet et lancement des différentes fonctions.', 1, '2021-07-19 17:35:06'),
(2, 'Mise à jour majeur', 'Mise en ligne de différentes fonctions et correction de nombreux bug qui pourraient apparaître suite à un salaire non inscrit ou une dépense non inscrite.', 1, '2021-07-31 09:35:06'),
(3, 'Mise à jour majeur', 'Ajout de deux chiffres après la virgule, ajout d\'une seconde barre de progression pour déterminer quel budget avoir si on change le statut payer.', 1, '2021-08-01 10:35:06'),
(4, 'Mise à jour', 'Ajout d\'un changelog pour suivre à la trace les différents problèmes rencontrés par les utilisateurs.', 2, '2021-08-02 17:20:06'),
(5, 'Mise à jour', 'Résolution d\'un bug lors de l\'ajout d\'un montant due qui ne s\'additionner pas, suppression de la barre qui me gênait.', 1, '2021-08-04 18:31:43');

-- --------------------------------------------------------

--
-- Structure de la table `config`
--

CREATE TABLE `config` (
  `id` int NOT NULL,
  `tag` varchar(100) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `config`
--

INSERT INTO `config` (`id`, `tag`, `value`) VALUES
(1, 'mail_Host', 'mail51.lwspanel.com'),
(2, 'mail_Username', 'support@app-budgets.store'),
(3, 'mail_Password', '@Zyfnnake7280'),
(4, 'mail_SMTPSecure', 'PHPMailer::ENCRYPTION_SMTPS'),
(5, 'mail_Port', '587'),
(6, 'mail_error', 'dev@app-budgets.store');

-- --------------------------------------------------------

--
-- Structure de la table `month`
--

CREATE TABLE `month` (
  `id` int NOT NULL,
  `value` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `month`
--

INSERT INTO `month` (`id`, `value`, `url`, `color`) VALUES
(1, 'Janvier', 'janvier', '800080'),
(2, 'Février', 'fevrier', 'FF00FF'),
(3, 'Mars', 'mars', '000080'),
(4, 'Avril', 'avril', '008080'),
(5, 'Mai', 'mai', '00FFFF'),
(6, 'Juin', 'juin', '008000'),
(7, 'Juillet', 'juillet', '808000'),
(8, 'Août', 'aout', '800000'),
(9, 'Septembre', 'septembre', 'FF0000'),
(10, 'Octobre', 'octobre', '808080'),
(11, 'Novembre', 'novembre', 'E67E22'),
(12, 'Décembre', 'décembre', '85C1E9');

-- --------------------------------------------------------

--
-- Structure de la table `salaires`
--

CREATE TABLE `salaires` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `montant` decimal(10,2) DEFAULT NULL,
  `pole_emplois` decimal(10,2) DEFAULT NULL,
  `month` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `year` year DEFAULT NULL,
  `status` int DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `salaires`
--

INSERT INTO `salaires` (`id`, `user_id`, `montant`, `pole_emplois`, `month`, `year`, `status`) VALUES
(1, 1, '959.59', '423.46', 'juillet', 2021, 1),
(2, 1, '1617.58', '0.00', 'aout', 2021, 2),
(3, 1, '0.00', '1012.00', 'mai', 2021, 2),
(4, 1, '0.00', '1079.00', 'juin', 2021, 2),
(5, 3, '2700.00', '0.00', 'juillet', 2021, 2),
(6, 1, '1617.58', '0.00', 'septembre', 2021, 2),
(7, 1, '1617.58', '0.00', 'octobre', 2021, 2),
(8, 1, '1617.58', '0.00', 'novembre', 2021, 2),
(9, 2, '857.35', '0.00', 'aout', 2021, 2),
(10, 2, '857.00', '0.00', 'septembre', 2021, 2),
(11, 2, '857.00', '0.00', 'septembre', 2021, 2);

-- --------------------------------------------------------

--
-- Structure de la table `sliders`
--

CREATE TABLE `sliders` (
  `id` int NOT NULL,
  `image` varchar(100) NOT NULL,
  `month` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `month`) VALUES
(1, '10414.jpg', 1),
(2, '75027.jpg', 2),
(3, '97548.jpg', 3),
(4, '381455.jpg', 4),
(5, '423348.jpg', 5),
(6, '751911.jpg', 6),
(7, '788878.jpg', 7),
(8, '1043977.jpg', 8);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `status` int DEFAULT '0',
  `token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `status`, `token`) VALUES
(1, 'gaetan72', 'd6d33a8cc7d69ad9eac5f44cef96ad2b', 'zineddinehamel@gmail.com', 1, 'NULL'),
(2, 'Zaillel', '490c58e56e637e2be10e2da86672d3ad', 'zaillelnina93@gmail.com', 1, NULL),
(3, '1984', '16d7a4fca7442dda3ad93c9a726597e4', '', 1, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annee`
--
ALTER TABLE `annee`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `changelogs`
--
ALTER TABLE `changelogs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `salaires`
--
ALTER TABLE `salaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annee`
--
ALTER TABLE `annee`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `budgets`
--
ALTER TABLE `budgets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT pour la table `changelogs`
--
ALTER TABLE `changelogs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `config`
--
ALTER TABLE `config`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `salaires`
--
ALTER TABLE `salaires`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
