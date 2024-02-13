-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 13 fév. 2024 à 08:37
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `orange_sba`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `email`, `mdp`) VALUES
(1, 'admin', 'admin@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `déscriptions` text NOT NULL,
  `createur` varchar(25) NOT NULL,
  `date_creation` date DEFAULT NULL,
  `date_modification` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `déscriptions`, `createur`, `date_creation`, `date_modification`) VALUES
(19, 'HeadPhones', 'kit /casque/...', '1', '0000-00-00', '0000-00-00'),
(20, 'speakers', 'tous les speakers', '1', '0000-00-00', NULL),
(18, 'Accessoires Téléphone', 'les cages de telephone,....', '1', '0000-00-00', NULL),
(17, 'Téléphones', 'tous les catégories de télephones (Smartphones/simples)', '1', '0000-00-00', NULL),
(21, 'pilles', 'tous les types de pilles', '1', '0000-00-00', NULL),
(22, 'Modem', 'tous les modem de orange', '1', '0000-00-00', NULL),
(23, 'Informatique', 'souris/clavier/...', '1', '0000-00-00', NULL),
(24, 'Play-station', 'les manettes', '1', '0000-00-00', NULL),
(25, 'Pour voiture', 'accessoire de voiture simple', '1', '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `produit` int NOT NULL,
  `quantité` int NOT NULL,
  `total` float NOT NULL,
  `panier` int NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `produit`, `quantité`, `total`, `panier`, `date_creation`, `date_modification`) VALUES
(18, 7, 3, 3000, 12, '2024-01-25', '2024-01-25'),
(16, 7, 2, 2000, 11, '2024-01-22', '2024-01-22'),
(17, 4, 2, 1100, 11, '2024-01-22', '2024-01-22');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `visiteur` int NOT NULL,
  `total` float NOT NULL,
  `etat` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'en cours',
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `visiteur`, `total`, `etat`, `date_creation`, `date_modification`) VALUES
(12, 10, 3000, 'livraison terminer', '2024-01-25', '0000-00-00'),
(11, 9, 3100, 'en livraison', '2024-01-22', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prix` int NOT NULL,
  `images` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `categorie` int NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `details`, `prix`, `images`, `categorie`, `date_creation`, `date_modification`) VALUES
(11, 'Samsung', 'Samsung A13', 899, 'a13.jpg', 17, '2024-02-12', '0000-00-00'),
(10, 'Samsung', 'Samsung A04e', 519, 'a04e.jpg', 17, '2024-02-12', '0000-00-00'),
(9, 'Samsung ', 'Samsung A04', 479, 'portable-samsung-galaxy-a04-464go (1).jpg', 17, '2024-02-12', '2024-02-12'),
(12, 'Samsung', 'Samsung A14', 689, 'a14.jpg', 17, '2024-02-12', '0000-00-00'),
(13, 'Samsung', 'Samsung A03', 659, 'a03.jpg', 17, '2024-02-12', '0000-00-00'),
(14, 'OPPO', 'Oppo A17k', 519, 'a17k.jpg', 17, '2024-02-12', '0000-00-00'),
(15, 'Xiaomi', 'Redmi A2 plus', 299, 'a2plus.jpg', 17, '2024-02-12', '0000-00-00'),
(16, 'Xiaomi', 'Redmi A1 plus', 289, 'a1plus.jpg', 17, '2024-02-12', '0000-00-00'),
(17, 'Xiaomi', 'Redmi 12', 549, '12.jpg', 17, '2024-02-12', '0000-00-00'),
(18, 'Xiaomi', 'Remi 12C', 499, '12c.jpg', 17, '2024-02-12', '0000-00-00'),
(19, 'Xiaomi', 'Realme C25Y', 489, 'c25.jpg', 17, '2024-02-12', '0000-00-00'),
(20, 'Tecno', 'Spark 8', 449, 'spark8.jpg', 17, '2024-02-12', '0000-00-00'),
(21, 'Tecno', 'Pop 7', 299, 'pop7.jpg', 17, '2024-02-12', '0000-00-00'),
(22, 'Evertek', 'M20s Mini', 219, 'm20s.jpg', 17, '2024-02-12', '0000-00-00'),
(23, 'Evertek', 'M20 Pro', 279, 'm20pro.png', 17, '2024-02-12', '0000-00-00'),
(24, 'FIGI', 'Note 1 ', 299, 'figi.jpg', 17, '2024-02-12', '0000-00-00'),
(25, 'INFINIX', 'SMART 7 HD', 399, 'smart7hd.jpg', 17, '2024-02-12', '0000-00-00'),
(26, 'INFINIX', 'SMART 7', 279, 'infinix-smart7-tunisie.jpg', 17, '2024-02-12', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `stocks`
--

DROP TABLE IF EXISTS `stocks`;
CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `produit` int NOT NULL,
  `quantité` int NOT NULL,
  `createur` varchar(255) NOT NULL,
  `Date_creation` date NOT NULL,
  `date_modification` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `stocks`
--

INSERT INTO `stocks` (`id`, `produit`, `quantité`, `createur`, `Date_creation`, `date_modification`) VALUES
(1, 6, 3, '1', '2024-01-01', '0000-00-00'),
(2, 7, 5, '1', '2024-01-13', '0000-00-00'),
(3, 8, 0, '1', '2024-02-12', '0000-00-00'),
(4, 9, 2, '1', '2024-02-12', '0000-00-00'),
(5, 10, 5, '1', '2024-02-12', '0000-00-00'),
(6, 11, 4, '1', '2024-02-12', '0000-00-00'),
(7, 12, 6, '1', '2024-02-12', '0000-00-00'),
(8, 13, 10, '1', '2024-02-12', '0000-00-00'),
(9, 14, 3, '1', '2024-02-12', '0000-00-00'),
(10, 15, 2, '1', '2024-02-12', '0000-00-00'),
(11, 16, 2, '1', '2024-02-12', '0000-00-00'),
(12, 17, 5, '1', '2024-02-12', '0000-00-00'),
(13, 18, 5, '1', '2024-02-12', '0000-00-00'),
(14, 19, 3, '1', '2024-02-12', '0000-00-00'),
(15, 20, 5, '1', '2024-02-12', '0000-00-00'),
(16, 21, 4, '1', '2024-02-12', '0000-00-00'),
(17, 22, 1, '1', '2024-02-12', '0000-00-00'),
(18, 23, 2, '1', '2024-02-12', '0000-00-00'),
(19, 24, 3, '1', '2024-02-12', '0000-00-00'),
(20, 25, 2, '1', '2024-02-12', '0000-00-00'),
(21, 26, 2, '1', '2024-02-12', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

DROP TABLE IF EXISTS `visiteur`;
CREATE TABLE IF NOT EXISTS `visiteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prénom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `numero` int NOT NULL,
  `mdp` varchar(25) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `date_creation` date DEFAULT NULL,
  `date_modification` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `visiteur`
--

INSERT INTO `visiteur` (`id`, `nom`, `prénom`, `email`, `numero`, `mdp`, `etat`, `date_creation`, `date_modification`) VALUES
(9, 'mohamed', 'toumi', 'medmimo12@gmail.com', 21364021, '123456', 1, NULL, NULL),
(10, 'adem', 'toumi', 'ad@gmail.com', 53645789, '123456', 1, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
