-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 14 déc. 2022 à 19:27
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `train`
--

-- --------------------------------------------------------

--
-- Structure de la table `all_trains`
--

CREATE TABLE `all_trains` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gare_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `all_trains`
--

INSERT INTO `all_trains` (`id`, `name`, `gare_id`, `date_created`) VALUES
(14, 'Train1ded', 34, '2022-12-13 11:21:55'),
(16, 'train3', 33, '2022-12-13 11:22:17'),
(17, 'train4', 32, '2022-12-13 11:22:24'),
(19, 'train6', 30, '2022-12-13 11:22:40'),
(21, 'train8', 27, '2022-12-13 11:22:57'),
(24, 'train12', 23, '2022-12-13 11:23:18'),
(26, 'trian20', 31, '2022-12-13 11:24:33'),
(29, 'kkkkkkkkk', 26, '2022-12-14 19:12:06');

-- --------------------------------------------------------

--
-- Structure de la table `gare`
--

CREATE TABLE `gare` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ville_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `gare`
--

INSERT INTO `gare` (`id`, `name`, `ville_id`, `date_created`) VALUES
(22, 'gare1', 7, '2022-12-13 11:19:43'),
(23, 'gare2', 6, '2022-12-13 11:19:51'),
(24, 'gare100', 2, '2022-12-13 11:20:00'),
(25, 'gare4', 1, '2022-12-13 11:20:08'),
(26, 'gare5', 3, '2022-12-13 11:20:15'),
(27, 'gare6', 7, '2022-12-13 11:20:23'),
(28, 'gare7', 2, '2022-12-13 11:20:31'),
(29, 'gare8', 2, '2022-12-13 11:20:39'),
(30, 'gare9', 7, '2022-12-13 11:20:50'),
(31, 'gare10', 5, '2022-12-13 11:21:08'),
(32, 'gare11', 3, '2022-12-13 11:21:16'),
(33, 'gare12', 2, '2022-12-13 11:21:23'),
(34, 'gare16', 1, '2022-12-13 11:21:32');

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `resirvation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `voyage_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `qty_ticket` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `date_reserved` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `voyage_id`, `user_id`, `qty_ticket`, `total`, `date_reserved`) VALUES
(1, 7, 4, 12, 1200, '2022-12-13 21:24:53'),
(4, 7, 4, 12, 1200, '2022-12-13 21:27:55'),
(5, 7, 4, 12, 1200, '2022-12-13 23:23:31'),
(6, 7, 4, 12, 1200, '2022-12-13 23:24:32'),
(7, 7, 4, 12, 1200, '2022-12-13 23:25:18'),
(10, 7, 3, 3, 300, '2022-12-13 23:38:53'),
(11, 7, 3, 4, 400, '2022-12-13 23:50:06'),
(12, 12, 4, 4, 400, '2022-12-14 08:04:56'),
(13, 8, 4, 3, 3000, '2022-12-14 08:36:24'),
(14, 7, 7, 12, 1200, '2022-12-14 11:16:31'),
(15, 7, 8, 12, 1200, '2022-12-14 14:23:36'),
(16, 7, 9, 4, 400, '2022-12-14 14:58:45'),
(17, 7, 8, 3, 300, '2022-12-14 17:40:28'),
(18, 7, 8, 3, 300, '2022-12-14 17:40:42'),
(19, 7, 8, 3, 300, '2022-12-14 17:56:24'),
(20, 7, 8, 4, 400, '2022-12-14 18:01:25'),
(21, 7, 8, 5, 500, '2022-12-14 18:14:22'),
(22, 7, 8, -12, -1200, '2022-12-14 18:16:05'),
(23, 7, 7, 3, 300, '2022-12-14 19:06:08'),
(24, 7, 7, 3, 300, '2022-12-14 19:06:32');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `disabled` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `photo`, `email`, `password`, `status`, `created_date`, `disabled`) VALUES
(3, 'zyzyzyzdd', 'uploads/1670256381kjkkj.png', 'zoroeezzSS@gmail.com', '1d5434993ac8a24ecb1a40f7486e88e40cc97ff9', 'admin', '2022-12-04 12:49:11', 0),
(4, 'ffffffffffffffddddge', 'uploads/167092288401.jpg', 'zoroejed@gmail.com', '1d5434993ac8a24ecb1a40f7486e88e40cc97ff9', 'admin', '2022-12-04 12:51:16', 0),
(7, 'mustapha', 'images.png', 'zoromustapha@gmail.com', '1d5434993ac8a24ecb1a40f7486e88e40cc97ff9', 'admin', '2022-12-14 10:30:07', 0),
(8, 'mustaphaar', 'uploads/167103869501.jpg', 'mustaphaa@gmail.com', '1d5434993ac8a24ecb1a40f7486e88e40cc97ff9', 'admin', '2022-12-14 14:22:17', 0),
(9, 'mustapha', 'images.png', 'zoroaaa@gmail.com', 'c11cb543aef4bdffdf5ea13a4bf9025eb6e58420', 'customer', '2022-12-14 14:58:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`id`, `name`) VALUES
(1, 'marrakech'),
(2, 'agadir'),
(3, 'casablanca'),
(4, 'tetouan'),
(5, 'tanger'),
(6, 'knitra'),
(7, 'bengrir');

-- --------------------------------------------------------

--
-- Structure de la table `voyagess`
--

CREATE TABLE `voyagess` (
  `id` int(11) NOT NULL,
  `depart` int(11) DEFAULT NULL,
  `arrivee` int(11) DEFAULT NULL,
  `time_start` varchar(255) DEFAULT NULL,
  `time_end` varchar(255) DEFAULT NULL,
  `train_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `disponible` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_voyege` date DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `voyagess`
--

INSERT INTO `voyagess` (`id`, `depart`, `arrivee`, `time_start`, `time_end`, `train_id`, `price`, `disponible`, `date_created`, `date_voyege`, `qty`) VALUES
(7, 34, 33, '12:25', '13:25', 26, 100, 1, '2022-12-13 11:25:38', '2022-12-15', 97),
(8, 29, 30, '15:25', '17:25', 19, 1000, 1, '2022-12-13 11:26:08', '2022-12-15', 10000),
(9, 24, 32, '13:26', '14:26', 16, 300, 1, '2022-12-13 11:26:36', '2022-12-17', 300),
(12, 34, 33, '19:00', '21:00', 14, 100, 1, '2022-12-11 14:52:22', '2022-12-15', 196),
(17, 30, 29, '21:26', '18:29', 21, 3, 1, '2022-12-14 18:26:38', '2022-12-15', 12);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `all_trains`
--
ALTER TABLE `all_trains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kr_train` (`gare_id`);

--
-- Index pour la table `gare`
--
ALTER TABLE `gare`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gare_ville` (`ville_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voyage_id` (`voyage_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `voyagess`
--
ALTER TABLE `voyagess`
  ADD PRIMARY KEY (`id`),
  ADD KEY `depart` (`depart`),
  ADD KEY `arrivee` (`arrivee`),
  ADD KEY `train_id` (`train_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `all_trains`
--
ALTER TABLE `all_trains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `gare`
--
ALTER TABLE `gare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `voyagess`
--
ALTER TABLE `voyagess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `all_trains`
--
ALTER TABLE `all_trains`
  ADD CONSTRAINT `kr_train` FOREIGN KEY (`gare_id`) REFERENCES `gare` (`id`);

--
-- Contraintes pour la table `gare`
--
ALTER TABLE `gare`
  ADD CONSTRAINT `gare_ville` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`id`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`voyage_id`) REFERENCES `voyagess` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `voyagess`
--
ALTER TABLE `voyagess`
  ADD CONSTRAINT `voyagess_ibfk_1` FOREIGN KEY (`depart`) REFERENCES `gare` (`id`),
  ADD CONSTRAINT `voyagess_ibfk_2` FOREIGN KEY (`arrivee`) REFERENCES `gare` (`id`),
  ADD CONSTRAINT `voyagess_ibfk_3` FOREIGN KEY (`train_id`) REFERENCES `all_trains` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
