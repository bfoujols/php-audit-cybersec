-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 18 nov. 2021 à 17:09
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gsbvisiteurs`
--

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE `materiel` (
  `id` int(11) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `dimensionLongueur` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

CREATE TABLE `visiteur` (
  `idVisiteur` int(11) NOT NULL,
  `VIS_MATRICULE` char(10) NOT NULL,
  `VIS_NOM` char(25) DEFAULT NULL,
  `VIS_PRENOM` char(50) DEFAULT NULL,
  `mail` varchar(255) NOT NULL,
  `VIS_ADRESSE` char(50) DEFAULT NULL,
  `VIS_CP` char(5) DEFAULT NULL,
  `VIS_VILLE` char(30) DEFAULT NULL,
  `VIS_DATEEMBAUCHE` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `SEC_CODE` char(1) DEFAULT NULL,
  `LAB_CODE` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `visiteur`
--

INSERT INTO `visiteur` (`idVisiteur`, `VIS_MATRICULE`, `VIS_NOM`, `VIS_PRENOM`, `mail`, `VIS_ADRESSE`, `VIS_CP`, `VIS_VILLE`, `VIS_DATEEMBAUCHE`, `SEC_CODE`, `LAB_CODE`) VALUES
(1, 'a131', 'Villechalane', 'Louis', 'louisvi@gmail.com', '8 cours Lafontaine', '29000', 'BREST', '2021-11-18 17:05:25', '', 'SW'),
(2, 'a17', 'Andre', 'David', 'andredavid@gmail.com', '1 r Aimon de Chiss', '38100', 'GRENOBLE', '2021-11-18 17:05:45', '', 'GY'),
(3, 'a55', 'Bedos', 'Christian', 'bedoschris@gmail.com', '1 r B', '65000', 'TARBES', '2021-11-18 17:06:00', '', 'GY'),
(4, 'a93', 'Tusseau', 'Louis', 'tusseaulouis@gmail.com', '22 r Renou', '86000', 'POITIERS', '2021-11-18 17:06:37', '', 'SW'),
(5, 'aaa', 'aaa', NULL, 'aaaa@gmail.com', NULL, NULL, NULL, '2021-11-18 17:06:57', NULL, NULL),
(6, 'b13', 'Bentot', 'Pascal', 'bentotpascal@gmail.com', '11 av 6 Juin', '67000', 'STRASBOURG', '2021-11-18 17:07:31', '', 'GY'),
(7, 'b16', 'Bioret', 'Luc', '', '1 r Linne', '35000', 'RENNES', '0000-00-00 00:00:00', '', 'SW'),
(8, 'b19', 'Bunisset', 'Francis', '', '10 r Nicolas Chorier', '85000', 'LA ROCHE SUR YON', '0000-00-00 00:00:00', '', 'GY'),
(9, 'b25', 'Bunisset', 'Denise', '', '1 r Lionne', '49100', 'ANGERS', '0000-00-00 00:00:00', '', 'SW'),
(10, 'b28', 'Cacheux', 'Bernard', '', '114 r Authie', '34000', 'MONTPELLIER', '0000-00-00 00:00:00', '', 'GY'),
(11, 'b34', 'Cadic', 'Eric', '', '123 r Caponi', '41000', 'BLOIS', '0000-00-00 00:00:00', 'P', 'SW'),
(12, 'b4', 'Charoze', 'Catherine', '', '100 pl G', '33000', 'BORDEAUX', '0000-00-00 00:00:00', '', 'SW'),
(13, 'b50', 'Clepkens', 'Christophe', '', '12 r F', '13000', 'MARSEILLE', '0000-00-00 00:00:00', '', 'SW'),
(14, 'b59', 'Cottin', 'Vincenne', '', '36 sq Capucins', '5000', 'GAP', '0000-00-00 00:00:00', '', 'GY'),
(15, 'c14', 'Daburon', 'Fran', '', '13 r Champs Elys', '6000', 'NICE', '0000-00-00 00:00:00', 'S', 'SW'),
(16, 'c3', 'De', 'Philippe', '', '13 r Charles Peguy', '10000', 'TROYES', '0000-00-00 00:00:00', '', 'SW'),
(17, 'c54', 'Debelle', 'Michel', '', '181 r Caponi', '88000', 'EPINAL', '0000-00-00 00:00:00', '', 'SW'),
(18, 'd13', 'Debelle', 'Jeanne', '', '134 r Stalingrad', '44000', 'NANTES', '0000-00-00 00:00:00', '', 'SW'),
(19, 'd51', 'Debroise', 'Michel', '', '2 av 6 Juin', '70000', 'VESOUL', '0000-00-00 00:00:00', 'E', 'GY'),
(20, 'e22', 'Desmarquest', 'Nathalie', '', '14 r F', '54000', 'NANCY', '0000-00-00 00:00:00', '', 'GY'),
(21, 'e24', 'Desnost', 'Pierre', '', '16 r Barral de Montferrat', '55000', 'VERDUN', '0000-00-00 00:00:00', 'E', 'SW'),
(22, 'e39', 'Dudouit', 'Fr', '', '18 quai Xavier Jouvin', '75000', 'PARIS', '0000-00-00 00:00:00', '', 'GY'),
(23, 'e49', 'Duncombe', 'Claude', '', '19 av Alsace Lorraine', '9000', 'FOIX', '0000-00-00 00:00:00', '', 'GY'),
(24, 'e5', 'Enault-Pascreau', 'C', '', '25B r Stalingrad', '40000', 'MONT DE MARSAN', '0000-00-00 00:00:00', 'S', 'GY'),
(25, 'e52', 'Eynde', 'Val', '', '3 r Henri Moissan', '76000', 'ROUEN', '0000-00-00 00:00:00', '', 'GY'),
(26, 'f21', 'Finck', 'Jacques', '', 'rte Montreuil Bellay', '74000', 'ANNECY', '0000-00-00 00:00:00', '', 'SW'),
(27, 'f39', 'Fr', 'Fernande', '', '4 r Jean Giono', '69000', 'LYON', '0000-00-00 00:00:00', '', 'GY'),
(28, 'f4', 'Gest', 'Alain', '', '30 r Authie', '46000', 'FIGEAC', '0000-00-00 00:00:00', '', 'GY'),
(29, 'g19', 'Gheysen', 'Galassus', '', '32 bd Mar Foch', '75000', 'PARIS', '0000-00-00 00:00:00', '', 'SW'),
(30, 'g30', 'Girard', 'Yvon', '', '31 av 6 Juin', '80000', 'AMIENS', '0000-00-00 00:00:00', 'N', 'GY'),
(31, 'g53', 'Gombert', 'Luc', '', '32 r Emile Gueymard', '56000', 'VANNES', '0000-00-00 00:00:00', '', 'GY'),
(32, 'g7', 'Guindon', 'Caroline', '', '40 r Mar Montgomery', '87000', 'LIMOGES', '0000-00-00 00:00:00', '', 'GY'),
(33, 'h13', 'Guindon', 'Fran', '', '44 r Picoti', '19000', 'TULLE', '0000-00-00 00:00:00', '', 'SW'),
(34, 'h30', 'Igigabel', 'Guy', '', '33 gal Arlequin', '94000', 'CRETEIL', '0000-00-00 00:00:00', '', 'SW'),
(35, 'h35', 'Jourdren', 'Pierre', '', '34 av Jean Perrot', '15000', 'AURRILLAC', '0000-00-00 00:00:00', '', 'GY'),
(36, 'h40', 'Juttard', 'Pierre-Raoul', '', '34 cours Jean Jaur', '8000', 'SEDAN', '0000-00-00 00:00:00', '', 'GY'),
(37, 'j45', 'Labour', 'Saout', '', '38 cours Berriat', '52000', 'CHAUMONT', '0000-00-00 00:00:00', 'N', 'SW'),
(38, 'j50', 'Landr', 'Philippe', '', '4 av G', '59000', 'LILLE', '0000-00-00 00:00:00', '', 'GY'),
(39, 'j8', 'Langeard', 'Hugues', '', '39 av Jean Perrot', '93000', 'BAGNOLET', '0000-00-00 00:00:00', 'P', 'GY'),
(40, 'k4', 'Lanne', 'Bernard', '', '4 r Bayeux', '30000', 'NIMES', '0000-00-00 00:00:00', '', 'SW'),
(41, 'k53', 'Le', 'No', '', '4 av Beauvert', '68000', 'MULHOUSE', '0000-00-00 00:00:00', '', 'SW'),
(42, 'l14', 'Le', 'Jean', '', '39 r Raspail', '53000', 'LAVAL', '0000-00-00 00:00:00', '', 'SW'),
(43, 'l23', 'Leclercq', 'Servane', '', '11 r Quinconce', '18000', 'BOURGES', '0000-00-00 00:00:00', '', 'SW'),
(44, 'l46', 'Lecornu', 'Jean-Bernard', '', '4 bd Mar Foch', '72000', 'LA FERTE BERNARD', '0000-00-00 00:00:00', '', 'GY'),
(45, 'l56', 'Lecornu', 'Ludovic', '', '4 r Abel Servien', '25000', 'BESANCON', '0000-00-00 00:00:00', '', 'SW'),
(46, 'm35', 'Lejard', 'Agn', '', '4 r Anthoard', '82000', 'MONTAUBAN', '0000-00-00 00:00:00', '', 'SW'),
(47, 'm45', 'Lesaulnier', 'Pascal', '', '47 r Thiers', '57000', 'METZ', '0000-00-00 00:00:00', '', 'SW'),
(48, 'n42', 'Letessier', 'St', '', '5 chem Capuche', '27000', 'EVREUX', '0000-00-00 00:00:00', '', 'GY'),
(49, 'n58', 'Loirat', 'Didier', '', 'Les P', '45000', 'ORLEANS', '0000-00-00 00:00:00', '', 'GY'),
(50, 'n59', 'Maffezzoli', 'Thibaud', '', '5 r Chateaubriand', '2000', 'LAON', '0000-00-00 00:00:00', '', 'SW'),
(51, 'o26', 'Mancini', 'Anne', '', '5 r D\'Agier', '48000', 'MENDE', '0000-00-00 00:00:00', '', 'GY'),
(52, 'p32', 'Marcouiller', 'G', '', '7 pl St Gilles', '91000', 'ISSY LES MOULINEAUX', '0000-00-00 00:00:00', '', 'GY'),
(53, 'p40', 'Michel', 'Jean-Claude', '', '5 r Gabriel P', '61000', 'FLERS', '0000-00-00 00:00:00', 'O', 'SW'),
(54, 'p41', 'Montecot', 'Fran', '', '6 r Paul Val', '17000', 'SAINTES', '0000-00-00 00:00:00', '', 'GY'),
(55, 'p42', 'Notini', 'Veronique', '', '5 r Lieut Chabal', '60000', 'BEAUVAIS', '0000-00-00 00:00:00', '', 'SW'),
(56, 'p49', 'Onfroy', 'Den', '', '5 r Sidonie Jacolin', '37000', 'TOURS', '0000-00-00 00:00:00', '', 'GY'),
(57, 'p6', 'Pascreau', 'Charles', '', '57 bd Mar Foch', '64000', 'PAU', '0000-00-00 00:00:00', '', 'SW'),
(58, 'p7', 'Pernot', 'Claude-No', '', '6 r Alexandre 1 de Yougoslavie', '11000', 'NARBONNE', '0000-00-00 00:00:00', '', 'SW'),
(59, 'p8', 'Perrier', 'Ma', '', '6 r Aubert Dubayet', '71000', 'CHALON SUR SAONE', '0000-00-00 00:00:00', '', 'GY'),
(60, 'q17', 'Petit', 'Jean-Louis', '', '7 r Ernest Renan', '50000', 'SAINT LO', '0000-00-00 00:00:00', '', 'GY'),
(61, 'r24', 'Piquery', 'Patrick', '', '9 r Vaucelles', '14000', 'CAEN', '0000-00-00 00:00:00', 'O', 'GY'),
(62, 'r58', 'Quiquandon', 'Jo', '', '7 r Ernest Renan', '29000', 'QUIMPER', '0000-00-00 00:00:00', '', 'GY'),
(63, 's10', 'Retailleau', 'Josselin', '', '88Bis r Saumuroise', '39000', 'DOLE', '0000-00-00 00:00:00', '', 'SW'),
(64, 's21', 'Retailleau', 'Pascal', '', '32 bd Ayrault', '23000', 'MONTLUCON', '0000-00-00 00:00:00', '', 'SW'),
(65, 't43', 'Souron', 'Maryse', '', '7B r Gay Lussac', '21000', 'DIJON', '0000-00-00 00:00:00', '', 'SW'),
(66, 't47', 'Tiphagne', 'Patrick', '', '7B r Gay Lussac', '62000', 'ARRAS', '0000-00-00 00:00:00', '', 'SW'),
(67, 't55', 'Tr', 'Alain', '', '7D chem Barral', '12000', 'RODEZ', '0000-00-00 00:00:00', '', 'SW'),
(68, 't60', 'Tusseau', 'Josselin', '', '63 r Bon Repos', '28000', 'CHARTRES', '0000-00-00 00:00:00', '', 'GY');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `visiteur`
--
ALTER TABLE `visiteur`
  ADD PRIMARY KEY (`idVisiteur`),
  ADD UNIQUE KEY `VIS_MATRICULE` (`VIS_MATRICULE`),
  ADD KEY `DEPENDRE_FK` (`LAB_CODE`),
  ADD KEY `SEC_CODE` (`SEC_CODE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `materiel`
--
ALTER TABLE `materiel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
