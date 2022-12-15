-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 15 déc. 2022 à 16:19
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
(30, 'train_one', 37, '2022-12-15 14:04:40'),
(32, 'train_twoeee', 37, '2022-12-15 15:59:47');

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
(37, 'casablanka', 3, '2022-12-15 14:03:54'),
(38, 'rabat', 2, '2022-12-15 14:04:03'),
(42, 'eeeeeeeetttt', 6, '2022-12-15 15:50:35');

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
(3, 'zyzyzyzddllllkkkddeeess', 'uploads/1670256381kjkkj.png', 'zoroeezzSS@gmail.com', '1d5434993ac8a24ecb1a40f7486e88e40cc97ff9', 'admin', '2022-12-04 12:49:11', 0),
(4, 'ffffffffffffffddddge', 'uploads/167092288401.jpg', 'zoroejed@gmail.com', '1d5434993ac8a24ecb1a40f7486e88e40cc97ff9', 'admin', '2022-12-04 12:51:16', 0),
(7, 'mustaphaS', 'uploads/167110937502.jpg', 'zoromustapha@gmail.com', '1d5434993ac8a24ecb1a40f7486e88e40cc97ff9', 'admin', '2022-12-14 10:30:07', 0),
(8, 'mustaphaar', 'uploads/167103869501.jpg', 'mustaphaa@gmail.com', '1d5434993ac8a24ecb1a40f7486e88e40cc97ff9', 'admin', '2022-12-14 14:22:17', 0),
(9, 'mustapharfdddd', 'uploads/167111479801.jpg', 'zoroaaa@gmail.com', 'c11cb543aef4bdffdf5ea13a4bf9025eb6e58420', 'customer', '2022-12-14 14:58:00', 1);

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
(22, 38, 37, '17:53', '15:56', 30, 122, 1, '2022-12-15 15:53:48', '2022-12-16', 1000);

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
  ADD KEY `orders_ibfk_1` (`voyage_id`),
  ADD KEY `orders_ibfk_2` (`user_id`);

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
  ADD KEY `voyagess_ibfk_1` (`depart`),
  ADD KEY `voyagess_ibfk_2` (`arrivee`),
  ADD KEY `voyagess_ibfk_3` (`train_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `all_trains`
--
ALTER TABLE `all_trains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `gare`
--
ALTER TABLE `gare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `all_trains`
--
ALTER TABLE `all_trains`
  ADD CONSTRAINT `kr_train` FOREIGN KEY (`gare_id`) REFERENCES `gare` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `gare`
--
ALTER TABLE `gare`
  ADD CONSTRAINT `gare_ville` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`voyage_id`) REFERENCES `voyagess` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `voyagess`
--
ALTER TABLE `voyagess`
  ADD CONSTRAINT `voyagess_ibfk_1` FOREIGN KEY (`depart`) REFERENCES `gare` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `voyagess_ibfk_2` FOREIGN KEY (`arrivee`) REFERENCES `gare` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `voyagess_ibfk_3` FOREIGN KEY (`train_id`) REFERENCES `all_trains` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
