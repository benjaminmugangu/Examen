-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 09 déc. 2023 à 14:03
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `compact_tech`
--

-- --------------------------------------------------------

--
-- Structure de la table `amenagement`
--

CREATE TABLE `amenagement` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `construction`
--

CREATE TABLE `construction` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `construction`
--

INSERT INTO `construction` (`id`, `title`, `description`, `image_path`) VALUES
(1, 'armand', 'bonjout', 'images/IMG_20231022_020948_456.jpg'),
(2, 'ssssss', 'djjjd jsjsjsjs', 'images/IMG_20231022_020948_140.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `donnees_clients`
--

CREATE TABLE `donnees_clients` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `nom_postnom` varchar(100) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `temoignage` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `donnees_employers`
--

CREATE TABLE `donnees_employers` (
  `id` int(11) NOT NULL,
  `nom_postnom` varchar(100) DEFAULT NULL,
  `poste` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `donnees_employers`
--

INSERT INTO `donnees_employers` (`id`, `nom_postnom`, `poste`, `email`, `contact`) VALUES
(1, 'compact_tech', 'aaaaa', 'bakanganaarmand@gmail.com', 1231313),
(2, 'compact_tech', 'aaaaa', 'bakanganaarmand@gmail.com', 1231313),
(3, '', '', '', 0),
(4, '', '', '', 0),
(5, 'compact_tech', 'aaaaa', 'bakanganaarmand@gmail.com', 1231313),
(6, '', '', '', 0),
(7, 'compact_tech', 'aaaaa', 'bakanganaarmand@gmail.com', 1231313),
(8, 'compact_tech', 'aaaaa', 'bakanganaarmand@gmail.com', 1231313);

-- --------------------------------------------------------

--
-- Structure de la table `donnees_entreprises`
--

CREATE TABLE `donnees_entreprises` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `donnees_entreprises`
--

INSERT INTO `donnees_entreprises` (`id`, `nom`, `email`, `description`) VALUES
(1, 'compact_tech', 'bakanganaarmand@gmail.com', 'ff'),
(2, 'compact_tech', 'bakanganaarmand@gmail.com', 'aaa'),
(3, 'compact_tech', 'bakanganaarmand@gmail.com', 'vd'),
(4, '', '', ''),
(5, 'compact_tech', 'bakanganaarmand@gmail.com', 'tt'),
(6, 'compact_tech', 'bakanganaarmand@gmail.com', 'fr'),
(7, '', '', ''),
(8, 'compact_tech', 'bakanganaarmand@gmail.com', '\"\"\"qqq'),
(9, 'compact_tech', 'bakanganaarmand@gmail.com', 'q'),
(10, '', '', ''),
(11, '', '', ''),
(12, '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `donnees_projets`
--

CREATE TABLE `donnees_projets` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `sujet` varchar(255) DEFAULT NULL,
  `poste` varchar(50) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `donnees_services`
--

CREATE TABLE `donnees_services` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `donnees_temoignages`
--

CREATE TABLE `donnees_temoignages` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `note` varchar(50) DEFAULT NULL,
  `temoignage` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `electricite`
--

CREATE TABLE `electricite` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `elements`
--

CREATE TABLE `elements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `elements`
--

INSERT INTO `elements` (`id`, `title`, `description`, `image_path`) VALUES
(3, 'armand', 'bienvenue', 'images/IMG_20231022_020948_140.jpg'),
(4, 'jjjj', 'hhhh', 'images/IMG_20231022_020948_140.jpg'),
(5, 'a', 'a', 'images/IMG_20231022_020948_571.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `title_m` varchar(255) NOT NULL,
  `price` text NOT NULL,
  `image_path_m` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `material`
--

INSERT INTO `material` (`id`, `title_m`, `price`, `image_path_m`) VALUES
(1, 'armand', '123', 'images/IMG_20231022_020948_140.jpg'),
(2, 'armand', '123', 'images/IMG_20231022_021004_564.jpg'),
(3, 'jjjj', '930', 'images/IMG_20231022_020948_571.jpg'),
(4, 'iuzhj', '45', 'images/IMG_20231022_021004_819.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `plomberie`
--

CREATE TABLE `plomberie` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `plomberie`
--

INSERT INTO `plomberie` (`id`, `title`, `description`, `image_path`) VALUES
(1, 'mise d&#039;un tanc', 'mettre un tanc dans une maison a nyarubande', 'images/IMG_20231022_020948_149.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `temoignage`
--

CREATE TABLE `temoignage` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `temoignage`
--

INSERT INTO `temoignage` (`id`, `title`, `description`) VALUES
(1, 's', 'aaaa'),
(2, 'armand', 'aaa'),
(3, 'armand', 'aaa'),
(4, 'sss', 'sssss');

-- --------------------------------------------------------

--
-- Structure de la table `terassement`
--

CREATE TABLE `terassement` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `username`, `password`, `nom`) VALUES
(5, 'arm', '$2y$10$4w6PGUQXhAn.uAJ8z8yw9.yNE5il4VO4u8karkkDeGJJqkDZAeSJe', NULL),
(6, 'bakanganaarmand@gmail.com', '$2y$10$56X17cm3Pm9jeXIdwXa.qOzi5VlR2CzPJnz4DhG6cOK8bZU0yGl1K', NULL),
(7, 'bakangana@gmail.com', '$2y$10$VeZZ3PbgJq.wNHlb8/Iee.wdZDGEIIoIicFpyJlUhTY/.NCwJ8LXq', 'expert'),
(8, 'bak@gmail.com', '$2y$10$NZh/caR4gd0kyOGr3XU5pO64J0AYKinxvRuIYquuY5L7Z.lbOJwRO', 'hekima armand'),
(9, 'bakganaarm@gmail.com', '$2y$10$4YZGqx.6SNfsRj/vr9xyNOeOSH31Txh4YfBWUAe25sL7CY9vKvat.', 'compact_tech');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `amenagement`
--
ALTER TABLE `amenagement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `construction`
--
ALTER TABLE `construction`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `donnees_clients`
--
ALTER TABLE `donnees_clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `donnees_employers`
--
ALTER TABLE `donnees_employers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `donnees_entreprises`
--
ALTER TABLE `donnees_entreprises`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `donnees_projets`
--
ALTER TABLE `donnees_projets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `donnees_services`
--
ALTER TABLE `donnees_services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `donnees_temoignages`
--
ALTER TABLE `donnees_temoignages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `electricite`
--
ALTER TABLE `electricite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `elements`
--
ALTER TABLE `elements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plomberie`
--
ALTER TABLE `plomberie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `temoignage`
--
ALTER TABLE `temoignage`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `terassement`
--
ALTER TABLE `terassement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `amenagement`
--
ALTER TABLE `amenagement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `construction`
--
ALTER TABLE `construction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `donnees_clients`
--
ALTER TABLE `donnees_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `donnees_employers`
--
ALTER TABLE `donnees_employers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `donnees_entreprises`
--
ALTER TABLE `donnees_entreprises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `donnees_projets`
--
ALTER TABLE `donnees_projets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `donnees_services`
--
ALTER TABLE `donnees_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `donnees_temoignages`
--
ALTER TABLE `donnees_temoignages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `electricite`
--
ALTER TABLE `electricite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `elements`
--
ALTER TABLE `elements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `plomberie`
--
ALTER TABLE `plomberie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `temoignage`
--
ALTER TABLE `temoignage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `terassement`
--
ALTER TABLE `terassement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
