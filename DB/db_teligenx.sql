-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 06 jan. 2024 à 21:16
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_teligenx`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `categorie_id` int NOT NULL,
  `categorie_nom` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `categorie_description` text COLLATE utf8mb4_general_ci,
  `categorie_date_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  `categorie_statut` enum('BROUILLON','VALIDE','SUPPRIME') COLLATE utf8mb4_general_ci DEFAULT 'VALIDE',
  PRIMARY KEY (`categorie_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`categorie_id`, `categorie_nom`, `categorie_description`, `categorie_date_creation`, `categorie_statut`) VALUES
(1, 'Marketing', 'Strategies to promote products or services', '2024-01-06 16:04:37', 'VALIDE'),
(2, 'Web Development', 'Building websites and web applications', '2024-01-06 16:04:37', 'VALIDE'),
(3, 'Data Science', 'Analysis and interpretation of complex data sets', '2024-01-06 16:04:37', 'VALIDE');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `etudiant_id` int NOT NULL AUTO_INCREMENT,
  `etudiant_nom` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `etudiant_prenom` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `etudiant_telephone` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `etudiant_email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `etudiant_date_naissance` date DEFAULT NULL,
  `etudiant_date_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  `etudiant_statut` enum('BROUILLON','VALIDE','SUPPRIME') COLLATE utf8mb4_general_ci DEFAULT 'VALIDE',
  PRIMARY KEY (`etudiant_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`etudiant_id`, `etudiant_nom`, `etudiant_prenom`, `etudiant_telephone`, `etudiant_email`, `etudiant_date_naissance`, `etudiant_date_creation`, `etudiant_statut`) VALUES
(1, 'Achi Jean Joël', 'Tamon', '0748758162', 'jeanjoel272@gmail.com', NULL, '2024-01-06 20:26:56', 'VALIDE'),
(2, 'Achi Jean Joël', 'Tamon', '0748758162', 'jeanjoel272@gmail.com', NULL, '2024-01-06 20:28:09', 'VALIDE');

-- --------------------------------------------------------

--
-- Structure de la table `formateur`
--

DROP TABLE IF EXISTS `formateur`;
CREATE TABLE IF NOT EXISTS `formateur` (
  `formateur_id` int NOT NULL AUTO_INCREMENT,
  `formateur_nom` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `formateur_prenoms` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `formateur_telephone` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `formateur_email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `formateur_specialite` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `formateur_experience` int DEFAULT NULL,
  `formateur_photo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `formateur_presentation` longtext COLLATE utf8mb4_general_ci,
  `formateur_date_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  `formateur_statut` enum('BROUILLON','VALIDE','SUPPRIME') COLLATE utf8mb4_general_ci DEFAULT 'VALIDE',
  PRIMARY KEY (`formateur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formateur`
--

INSERT INTO `formateur` (`formateur_id`, `formateur_nom`, `formateur_prenoms`, `formateur_telephone`, `formateur_email`, `formateur_specialite`, `formateur_experience`, `formateur_photo`, `formateur_presentation`, `formateur_date_creation`, `formateur_statut`) VALUES
(1, 'Dupont', 'Jean', '123456789', 'jean.dupont@email.com', 'Marketing Expert', 2, NULL, 'Présentation de Jean Dupont, expert en marketing avec une expérience de plus de 10 ans. Passionné par lmonde dynamique du marketing digital.', '2024-01-06 16:04:37', 'VALIDE'),
(2, 'Martin', 'Sophie', '987654321', 'sophie.martin@email.com', 'Web Development Guru', 5, NULL, 'Découvrez Sophie Martin, spécialiste du développement web, amoureuse du design et des expériences utilisateur exceptionnelles. Avec une expertise approfondie dans HTML, CSS et JavaScript, je suis là pour vous guider dans le monde passionnant du développement web.', '2024-01-06 16:04:37', 'VALIDE'),
(3, 'Lefevre', 'Luc', '555111000', 'luc.lefevre@email.com', 'Data Scientist Pro', 7, NULL, 'Bienvenue dans le monde de l\'intelligence artificielle avec Luc Lefevre. Chercheur chevronné et praticien de l\'IA, je vous accompagnerai dans l\'apprentissage des concepts fondamentaux du machine learning et des réseaux neuronaux.', '2024-01-06 16:04:37', 'VALIDE');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `formation_id` int NOT NULL AUTO_INCREMENT,
  `formation_titre` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `formation_description` text COLLATE utf8mb4_general_ci,
  `formation_prix` int NOT NULL,
  `formation_date_debut` date DEFAULT NULL,
  `formation_date_fin` date DEFAULT NULL,
  `formateur_id` int DEFAULT NULL,
  `categorie_id` int DEFAULT NULL,
  `formation_date_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  `formation_statut` enum('BROUILLON','VALIDE','SUPPRIME') COLLATE utf8mb4_general_ci DEFAULT 'VALIDE',
  PRIMARY KEY (`formation_id`),
  KEY `formateur_id` (`formateur_id`),
  KEY `categorie_id` (`categorie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`formation_id`, `formation_titre`, `formation_description`, `formation_prix`, `formation_date_debut`, `formation_date_fin`, `formateur_id`, `categorie_id`, `formation_date_creation`, `formation_statut`) VALUES
(1, 'Marketing Digital', 'Découvrez les fondamentaux du marketing digital et apprenez à élaborer des stratégies efficaces pour maximiser la visibilité en ligne. Cette formation vous guidera à travers les dernières tendances du marketing numérique.', 150000, '2024-01-06', '2024-01-13', 1, 1, '2024-01-06 18:25:18', 'VALIDE'),
(2, 'Développement Web avancé', 'Plongez dans le développement web avancé en explorant des concepts tels que les frameworks front-end et back-end. Acquérez des compétences pratiques pour créer des applications web robustes.', 150000, '2024-02-01', '2024-02-28', 2, 2, '2024-01-06 18:25:18', 'VALIDE'),
(3, 'Intelligence Artificielle pour Débutants', 'Explorez le monde fascinant de l\'intelligence artificielle, des bases du machine learning aux applications concrètes. Cette formation vous permettra de comprendre les principes fondamentaux de l\'IA.', 150000, '2024-03-15', '2024-04-15', 3, 3, '2024-01-06 18:25:18', 'VALIDE'),
(4, 'Stratégies de Marketing sur les Médias Sociaux', 'Découvrez des stratégies efficaces pour utiliser les médias sociaux à des fins de marketing. Cette formation approfondie vous guidera à travers les meilleures pratiques pour tirer parti de la puissance des médias sociaux dans', 150000, '2024-03-15', '2024-04-15', 3, 3, '2024-01-06 18:25:18', 'VALIDE'),
(8, 'Masterclass sur les Frameworks JavaScript', 'Explorez en profondeur les frameworks JavaScript les plus populaires avec notre masterclass. Acquérez des compétences avancées dans l\'utilisation de frameworks tels que React, Angular et Vue pour développer des applications web modernes.', 150000, '2024-07-20', '2024-08-20', 2, 2, '2024-01-06 18:27:02', 'VALIDE'),
(9, 'Atelier sur l\'Analyse de Données Massives', 'Plongez dans le monde de l\'analyse de données volumineuses avec notre atelier sur l\'analyse de données massives. Apprenez à manipuler et analyser des ensembles de données complexes pour en extraire des informations significatives.', 150000, '2024-09-01', '2024-09-30', 3, 3, '2024-01-06 18:27:02', 'VALIDE'),
(10, 'Stratégies d\'Email Marketing', 'Découvrez des stratégies efficaces pour utiliser l\'email comme un puissant outil de marketing. Cette formation vous guidera à travers les meilleures pratiques pour concevoir et exécuter des campagnes d\'email marketing réussies.', 150000, '2024-10-10', '2024-10-31', 1, 1, '2024-01-06 18:27:02', 'VALIDE'),
(11, 'Principes de Design UX/UI', 'Maîtrisez les principes du design UX/UI avec notre formation spécialisée. Apprenez à créer des interfaces utilisateur attrayantes et conviviales pour offrir une expérience exceptionnelle à vos utilisateurs.', 150000, '2024-11-05', '2024-11-25', 2, 2, '2024-01-06 18:27:02', 'VALIDE'),
(12, 'Applications Pratiques de l\'Intelligence Artificielle', 'Explorez des applications réelles de l\'intelligence artificielle avec notre formation avancée. Découvrez comment l\'IA peut être mise en œuvre dans divers domaines pour résoudre des problèmes concrets.', 150000, '2024-12-01', '2025-01-01', 3, 3, '2024-01-06 18:27:02', 'VALIDE'),
(13, 'Bases de l\'Optimisation pour les Moteurs de Recherche', 'Apprenez les bases de l\'optimisation pour les moteurs de recherche (SEO) avec notre atelier spécialisé. Découvrez les meilleures pratiques pour améliorer la visibilité de votre site web dans les résultats de recherche.', 150000, '2025-01-10', '2025-02-10', 1, 1, '2024-01-06 18:27:02', 'VALIDE'),
(14, 'Bootcamp de Développement d\'Applications Mobiles', 'Participez à notre bootcamp intensif pour le développement d\'applications mobiles. Apprenez à créer des applications pour les plateformes iOS et Android avec les dernières technologies.', 150000, '2025-02-15', '2025-04-15', 2, 2, '2024-01-06 18:27:02', 'VALIDE'),
(15, 'Analyse Statistique avec Python', 'Utilisez Python pour l\'analyse statistique des données avec notre formation avancée. Acquérez des compétences pratiques pour explorer, analyser et interpréter les données à l\'aide de Python.', 150000, '2025-04-20', '2025-05-20', 3, 3, '2024-01-06 18:27:02', 'VALIDE'),
(16, 'Stratégies de Marketing pour le Commerce Électronique', 'Découvrez des stratégies de marketing efficaces pour les entreprises de commerce électronique. Apprenez à attirer et fidéliser les clients dans le monde compétitif du commerce en ligne.', 150000, '2025-06-01', '2025-06-30', 1, 1, '2024-01-06 18:27:02', 'VALIDE'),
(17, 'Fondamentaux de la Cybersécurité', 'Explorez les fondamentaux de la cybersécurité avec notre atelier spécialisé. Apprenez les meilleures pratiques pour protéger vos données et infrastructures contre les menaces en ligne.', 150000, '2025-07-10', '2025-07-31', 2, 2, '2024-01-06 18:27:02', 'VALIDE'),
(18, 'Atelier sur la Technologie Blockchain', 'Comprenez et mettez en œuvre la technologie blockchain avec notre atelier avancé. Découvrez comment la blockchain peut révolutionner divers secteurs.', 150000, '2025-08-05', '2025-08-25', 3, 3, '2024-01-06 18:27:02', 'VALIDE'),
(19, 'Fondamentaux du Cloud Computing', 'Obtenez une introduction aux concepts fondamentaux du cloud computing avec notre formation spécialisée. Apprenez comment utiliser et tirer parti des services cloud pour vos applications et données.', 150000, '2025-09-01', '2025-09-30', 1, 1, '2024-01-06 18:27:02', 'VALIDE'),
(20, 'Analyse de Données pour le Marketing Digital', 'Plongez dans l\'analyse de données appliquée au marketing digital avec notre atelier spécialisé. Apprenez à analyser et interpréter les données pour optimiser vos campagnes marketing en ligne.', 150000, '2025-10-10', '2025-10-31', 2, 2, '2024-01-06 18:27:02', 'VALIDE');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `inscription_id` int NOT NULL AUTO_INCREMENT,
  `etudiant_id` int DEFAULT NULL,
  `formation_id` int DEFAULT NULL,
  `inscription_date_inscription` date DEFAULT NULL,
  `inscription_date_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  `inscription_statut` enum('BROUILLON','VALIDE','SUPPRIME') COLLATE utf8mb4_general_ci DEFAULT 'VALIDE',
  PRIMARY KEY (`inscription_id`),
  KEY `etudiant_id` (`etudiant_id`),
  KEY `formation_id` (`formation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`inscription_id`, `etudiant_id`, `formation_id`, `inscription_date_inscription`, `inscription_date_creation`, `inscription_statut`) VALUES
(1, 1, 10, '2024-01-06', '2024-01-06 20:26:56', 'VALIDE'),
(2, 2, 10, '2024-01-06', '2024-01-06 20:28:09', 'VALIDE');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
