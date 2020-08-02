-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 17 déc. 2018 à 21:49
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Mon_Projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `Auteurs`
--

CREATE TABLE `Auteurs` (
  `ID_Auteur` int(11) NOT NULL,
  `Nom_auteur` varchar(256) NOT NULL,
  `Prenom_Auteur` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Auteurs`
--

INSERT INTO `Auteurs` (`ID_Auteur`, `Nom_auteur`, `Prenom_Auteur`) VALUES
(4, 'Chinua ', 'Achebe'),
(5, 'Hans Christian', 'Andersen'),
(6, 'Austen', 'Jane'),
(7, 'Balzac', 'Honoré'),
(8, ' Beckett', 'Samuel'),
(9, 'Boccace', 'Boccace'),
(10, 'Luis Borges', 'Jorge'),
(11, 'Brontë', 'Emily '),
(12, 'Camus', 'Albert '),
(13, 'Celan', 'Paul '),
(14, 'Louis-Ferdinand', 'Céline'),
(15, 'Cervantes', 'Miguel'),
(16, 'Chaucer', 'Geoffrey'),
(17, 'Conrad', 'Joseph'),
(18, 'Alighieri', 'Dante'),
(19, 'Dickens', 'Charles'),
(20, 'Diderot', 'Denis'),
(21, 'Döblin', 'Alfred'),
(22, 'Dostoïevski', 'Fiodor'),
(23, 'Eliot', 'George'),
(24, 'Ellison', 'Ralph'),
(25, 'Euripide', 'Euripide'),
(26, 'Faulkner', 'William'),
(27, 'Flaubert', 'Gustave'),
(28, 'García Lorca', 'Federico'),
(29, 'García Márquez', 'Gabriel '),
(30, 'Wolfgang von Goethe', 'Johann'),
(31, 'Gogol', 'Nicolas '),
(32, 'Grass', 'Günter'),
(33, 'Guimarães Rosa', 'João '),
(34, 'Hamsun', 'Knut'),
(35, 'Hemingway', 'Ernest'),
(36, 'Homère', 'Homère'),
(37, 'Ibsen', 'Henrik'),
(38, 'Joyce', 'James'),
(39, 'Kafka', 'Franz'),
(40, 'Kâlidâsa', 'Kâlidâsa'),
(41, 'Kawabata', 'Yasunari'),
(42, 'Kazantzákis', 'Níkos'),
(43, 'Lawrence', 'D. H.'),
(44, 'Laxness', 'Halldór'),
(45, 'Leopardi', 'Giacomo'),
(46, 'Lessing', 'Doris'),
(47, 'Lindgren', 'Astrid'),
(48, 'Xun', 'Lu'),
(49, 'Mahfouz', 'Naguib'),
(50, 'Mann', 'Thomas'),
(51, 'Melville', 'Herman'),
(52, 'Montaigne', 'Michel'),
(53, 'Morante', 'Elsa'),
(54, 'Morrison', 'Toni'),
(55, 'Shikibu', 'Murasaki'),
(56, 'Musil', 'Robert'),
(57, 'Nabokov', 'Vladimir'),
(58, 'Orwell', 'George'),
(59, 'Ovide', 'Ovide'),
(60, 'Pessoa', 'Fernando'),
(61, 'Allan Poe', 'Edgar'),
(62, 'Proust', 'Marcel'),
(63, 'Rabelais', 'François'),
(64, 'Rulfo', 'Juan'),
(65, 'ad-Dîn Rûmî', 'Djalâl'),
(66, 'Rushdie', 'Salman'),
(67, 'Saadi', 'Saadi'),
(68, 'Salih', 'Tayeb'),
(69, 'Saramago', 'José'),
(70, 'Shakespeare', 'William'),
(71, 'Sophocle', 'Sophocle'),
(72, 'Stendhal', 'Stendhal'),
(73, 'Sterne', 'Laurence'),
(74, 'Svevo', 'Italo'),
(75, 'Swift', 'Jonathan'),
(76, 'Tchekhov', 'Anton'),
(77, 'Tolstoï', 'Léon'),
(78, 'Twain', 'Mark'),
(79, 'Valmiki', 'Valmiki'),
(80, 'Virgile', 'Virgile'),
(81, 'Whitman', 'Walt'),
(82, 'Woolf', 'Virginia'),
(83, 'Yourcenar', 'Marguerite');

-- --------------------------------------------------------

--
-- Structure de la table `Categories`
--

CREATE TABLE `Categories` (
  `ID_Categorie` int(11) NOT NULL,
  `Nom_Categorie` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Categories`
--

INSERT INTO `Categories` (`ID_Categorie`, `Nom_Categorie`) VALUES
(3, 'Romanesque (recueil de nouvelles)'),
(4, 'Romanesque (roman)'),
(5, 'Poésie (œuvre poétique)'),
(6, 'Romanesque (trilogie romanesque)'),
(7, 'Poésie (épopée)'),
(8, 'Théâtre (tragédie)'),
(9, 'Poésie (recueil de poèmes)'),
(10, 'Théâtre (pièce de théâtre)'),
(11, 'Écrit religieux (poème en prose)'),
(12, 'Romanesque (nouvelles)'),
(13, 'Théâtre (drame)'),
(14, 'Romanesque (recueil de contes)'),
(15, 'Argumentation (essai philosophique)'),
(16, 'Romanesque (roman inachevé)'),
(17, 'Romanesque (saga islandaise)'),
(18, 'Poésie (poème épique)'),
(19, 'Poésie (recueil de poèmes en prose, de pensées, d aphorismes) '),
(20, 'Romanesque (nouvelles et contes)'),
(21, 'Poésie (recueil de poèmes mystiques) '),
(22, 'Romanesque (récits)'),
(23, 'Romanesque (roman picaresque)'),
(24, 'Histoire');

-- --------------------------------------------------------

--
-- Structure de la table `Clients`
--

CREATE TABLE `Clients` (
  `ID_Client` int(11) NOT NULL,
  `Nom_client` varchar(256) NOT NULL,
  `Prenom_Client` varchar(256) NOT NULL,
  `Adresse_Client` text NOT NULL,
  `CP_Client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Clients`
--

INSERT INTO `Clients` (`ID_Client`, `Nom_client`, `Prenom_Client`, `Adresse_Client`, `CP_Client`) VALUES
(67, 'biblotheque', 'bibliotheque', '8 ter rue des pépinières', 78000),
(68, 'seghir', 'said', '45 av des étates unis', 94400),
(69, 'said', 'mohammed', '78 av de gaulle', 78900);

-- --------------------------------------------------------

--
-- Structure de la table `Etat_Livre`
--

CREATE TABLE `Etat_Livre` (
  `ID_Etat` int(11) NOT NULL,
  `Etat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Etat_Livre`
--

INSERT INTO `Etat_Livre` (`ID_Etat`, `Etat`) VALUES
(1, 'Manque pages '),
(2, 'Bon état'),
(3, 'Taches de café');

-- --------------------------------------------------------

--
-- Structure de la table `Livres`
--

CREATE TABLE `Livres` (
  `ID_Livre` int(11) NOT NULL,
  `ID_Auteur` int(11) NOT NULL,
  `ID_Categorie` int(11) NOT NULL,
  `Titre_Livre` text NOT NULL,
  `Quantite_Stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Livres`
--

INSERT INTO `Livres` (`ID_Livre`, `ID_Auteur`, `ID_Categorie`, `Titre_Livre`, `Quantite_Stock`) VALUES
(1, 4, 4, 'Le monde s\'effondre', 10),
(2, 5, 14, 'Contes', 4),
(3, 6, 4, 'Orgueil et Préjugés', 7),
(4, 7, 4, 'Le Père Goriot', 27),
(5, 8, 4, 'Molloy', 12),
(6, 8, 6, 'Malone meurt', 30),
(7, 8, 6, 'L\'Innommable', 16),
(8, 9, 3, 'Décaméron', 16),
(9, 10, 3, 'Fictions', 2),
(10, 11, 4, 'Les Hauts de Hurlevent', 10),
(11, 12, 24, 'L\'Étranger', 10),
(12, 13, 5, 'Les poèmes de... ', 2),
(13, 14, 24, 'Voyage au bout de la nuit', 9),
(14, 15, 4, 'Don Quichotte', 7),
(15, 16, 24, 'Les Contes de Canterbury', 0),
(16, 16, 15, 'Les Contes de Canterbury', 18),
(17, 17, 15, 'Nostromo', 3),
(18, 18, 7, 'Divine Comédie', 17),
(19, 19, 15, 'Les Grandes Espérances', 14),
(20, 20, 24, 'Jacques le Fataliste et son maître', 6),
(21, 21, 4, 'Berlin Alexanderplatz', 9),
(22, 22, 4, 'Crime et Châtiment', 2),
(23, 22, 24, 'L\'Idiot', 0),
(24, 22, 4, 'L\'Idiot', 3),
(25, 22, 4, 'Les Démons', 10),
(26, 22, 4, 'Les Frères Karamazov', 3),
(27, 23, 4, 'Middlemarch', 2),
(28, 24, 4, 'Homme invisible, pour qui chantes-tu ?', 6),
(29, 25, 8, 'Médée', 2),
(30, 26, 4, 'Absalon, Absalon !', 10),
(31, 26, 4, 'Le Bruit et la Fureur', 7),
(32, 27, 4, 'Madame Bovary', 3),
(33, 27, 4, 'L\'Éducation sentimentale', 7),
(34, 28, 9, 'Romancero gitano', 1),
(35, 29, 4, 'Cent ans de solitude', -1),
(36, 29, 4, 'L\'Amour aux temps du choléra', 5),
(37, 30, 8, 'Faust', 7),
(38, 31, 4, 'Les Âmes mortes', 14),
(39, 32, 4, 'Le Tambour', 22),
(40, 33, 4, 'Diadorim ', 12),
(41, 34, 4, 'La Faim', 9),
(42, 35, 4, 'Le Vieil Homme et la Mer', 16),
(43, 36, 7, 'Iliade', 10),
(44, 36, 7, 'Odyssée', 15),
(45, 37, 10, 'Une maison de poupée', 3),
(46, 38, 12, 'Ulysse', 4),
(47, 39, 12, 'Les nouvelles de... ', 2),
(48, 39, 4, 'Le Procès', 17),
(49, 39, 4, 'Le Château', 1),
(50, 40, 13, 'La Reconnaissance de Shâkountalâ', 0),
(51, 41, 4, 'Le Grondement de la montagne', 7),
(52, 42, 4, 'Alexis Zorba', 4),
(53, 43, 4, 'Amants et Fils', 2),
(54, 44, 4, 'Gens indépendants', -11),
(55, 45, 5, 'Les poèmes de... ', 5),
(56, 46, 4, 'Le Carnet d\'or', 7),
(57, 47, 4, 'Fifi Brindacier', 4),
(58, 48, 12, 'Le Journal d\'un fou', 8),
(59, 49, 4, 'Les Fils de la Médina', 2),
(60, 50, 4, 'Les Buddenbrook', 9),
(61, 50, 4, 'La Montagne magique', 1),
(62, 51, 4, 'Moby Dick', 0),
(63, 52, 15, 'Essais', 18),
(64, 53, 4, 'La storia', 6),
(65, 54, 4, 'Beloved', 7),
(66, 55, 4, 'Le Dit du Genji', 4),
(67, 56, 16, 'L\'Homme sans qualités', 4),
(68, 57, 4, 'Lolita', 3),
(69, 58, 4, '1984', 0),
(70, 59, 18, 'Les Métamorphoses', 15),
(71, 60, 19, 'Le Livre de l\'intranquillité', 5),
(72, 61, 20, 'Les Contes d\'... ', 2),
(73, 62, 4, 'À la recherche du temps perdu', 8),
(74, 63, 4, 'Gargantua et Pantagruel', 3),
(75, 64, 4, 'Pedro Páramo', 0),
(76, 65, 21, 'Masnavî', 0),
(77, 66, 4, 'Les Enfants de minuit', 1),
(78, 67, 9, 'Le Jardin des fruits', 6),
(79, 68, 4, 'Saison de la migration vers le nord', 12),
(80, 69, 4, 'L\'Aveuglement', 13),
(81, 70, 8, 'Hamlet', 2),
(82, 70, 8, 'Le Roi Lear', 3),
(83, 70, 8, 'Othello ou le Maure de Venise', 8),
(84, 71, 8, 'Œdipe roi', 4),
(85, 72, 4, 'Le Rouge et le Noir', 2),
(86, 73, 4, 'Vie et opinions de Tristram Shandy, gentilhomme', 11),
(87, 74, 4, 'La Conscience de Zeno', 10),
(88, 75, 4, 'Les Voyages de Gulliver', 4),
(89, 76, 22, 'Récits divers', 1),
(90, 77, 4, 'Guerre et Paix', 25),
(91, 77, 4, 'Anna Karénine', 4),
(92, 77, 4, 'La Mort d\'Ivan Ilitch', 15),
(93, 78, 23, 'Les Aventures de Huckleberry Finn', 4),
(94, 79, 7, 'Remeyana', 1),
(95, 80, 7, 'Énéide', -1),
(96, 81, 9, 'Feuilles d\'herbe', 8),
(97, 82, 4, 'Mrs Dalloway', 0),
(98, 82, 4, 'La Promenade au phare', 7),
(99, 83, 4, 'Mémoires d\'Hadrien', 2),
(100, 65, 11, 'Livre de Job', 4);

-- --------------------------------------------------------

--
-- Structure de la table `Remises_Lignes`
--

CREATE TABLE `Remises_Lignes` (
  `ID_Remise` int(11) NOT NULL,
  `ID_Ligne` int(11) NOT NULL,
  `ID_Resevation_Ligne` int(11) NOT NULL,
  `Quantite` int(11) NOT NULL,
  `Etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Remises_Lignes`
--

INSERT INTO `Remises_Lignes` (`ID_Remise`, `ID_Ligne`, `ID_Resevation_Ligne`, `Quantite`, `Etat`) VALUES
(77, 64, 122, 1, 2),
(78, 65, 123, 1, 2),
(79, 66, 125, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Remise_Entete`
--

CREATE TABLE `Remise_Entete` (
  `ID_Remise` int(11) NOT NULL,
  `ID_Reservation` int(11) NOT NULL,
  `Date_Remise` date NOT NULL,
  `MAJ_Stock` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Remise_Entete`
--

INSERT INTO `Remise_Entete` (`ID_Remise`, `ID_Reservation`, `Date_Remise`, `MAJ_Stock`) VALUES
(77, 116, '2018-12-17', 1),
(78, 117, '2018-12-17', 1),
(79, 119, '2018-12-17', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Reservations_Entete`
--

CREATE TABLE `Reservations_Entete` (
  `ID_Reservation` int(11) NOT NULL,
  `ID_Client` int(11) NOT NULL,
  `Date_Reservation` date NOT NULL,
  `MAJ_Stock` tinyint(1) NOT NULL,
  `Cloturee` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Reservations_Entete`
--

INSERT INTO `Reservations_Entete` (`ID_Reservation`, `ID_Client`, `Date_Reservation`, `MAJ_Stock`, `Cloturee`) VALUES
(115, 68, '2018-12-17', 1, 0),
(116, 68, '2018-12-17', 1, 1),
(117, 68, '2018-12-17', 1, 1),
(118, 68, '2018-12-17', 1, 0),
(119, 69, '2018-12-17', 1, 1),
(120, 69, '2018-12-17', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `Reservations_Lignes`
--

CREATE TABLE `Reservations_Lignes` (
  `ID_Reservation` int(11) NOT NULL,
  `ID_Livre` int(11) NOT NULL,
  `Quantite_Reservee` int(11) NOT NULL,
  `ID_Ligne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Reservations_Lignes`
--

INSERT INTO `Reservations_Lignes` (`ID_Reservation`, `ID_Livre`, `Quantite_Reservee`, `ID_Ligne`) VALUES
(115, 52, 1, 121),
(116, 91, 1, 122),
(117, 21, 1, 123),
(118, 22, 1, 124),
(119, 73, 1, 125),
(120, 18, 1, 126);

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateurs`
--

CREATE TABLE `Utilisateurs` (
  `ID_utilisateur` int(11) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `mot_pass` varchar(255) NOT NULL,
  `Date_inscription` date NOT NULL,
  `ID_Client` int(11) NOT NULL,
  `Previlege` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Utilisateurs`
--

INSERT INTO `Utilisateurs` (`ID_utilisateur`, `e_mail`, `mot_pass`, `Date_inscription`, `ID_Client`, `Previlege`) VALUES
(42, 'bibliotheque@uvsq.fr', '87882ab2b13074e88b4e3778b668e0e980df4e4c', '2018-12-17', 67, 1),
(43, 'said.seghir@outlook.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2018-12-17', 68, 0),
(44, 'said@live.fr', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2018-12-17', 69, 0);

-- --------------------------------------------------------

--
-- Structure de la table `Villes`
--

CREATE TABLE `Villes` (
  `Code_Postal` int(5) NOT NULL,
  `Ville` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Villes`
--

INSERT INTO `Villes` (`Code_Postal`, `Ville`) VALUES
(75000, 'Paris'),
(77000, 'Melun'),
(78000, 'Versailles'),
(78150, 'Le Chesney'),
(78190, 'Trappes'),
(91120, 'Palaiseau'),
(92110, 'Clichy'),
(92120, 'Montrouge'),
(92160, 'Antony'),
(92210, 'Saint-Cloud'),
(92240, 'Malakoff'),
(92700, 'Colombes'),
(93140, 'Bondy'),
(93300, 'Aubervilliers'),
(93500, 'Chapigny-sur-Marne'),
(94400, 'Vitry-sur-Seine'),
(94402, 'Colombes'),
(94800, 'Villejuif');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Auteurs`
--
ALTER TABLE `Auteurs`
  ADD PRIMARY KEY (`ID_Auteur`);

--
-- Index pour la table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`ID_Categorie`);

--
-- Index pour la table `Clients`
--
ALTER TABLE `Clients`
  ADD PRIMARY KEY (`ID_Client`),
  ADD KEY `CP_Client` (`CP_Client`);

--
-- Index pour la table `Etat_Livre`
--
ALTER TABLE `Etat_Livre`
  ADD PRIMARY KEY (`ID_Etat`);

--
-- Index pour la table `Livres`
--
ALTER TABLE `Livres`
  ADD PRIMARY KEY (`ID_Livre`),
  ADD KEY `ID_Auteur` (`ID_Auteur`),
  ADD KEY `ID_Categorie` (`ID_Categorie`);

--
-- Index pour la table `Remises_Lignes`
--
ALTER TABLE `Remises_Lignes`
  ADD PRIMARY KEY (`ID_Ligne`),
  ADD KEY `ID_Remise` (`ID_Remise`),
  ADD KEY `ID_Resevation_Ligne` (`ID_Resevation_Ligne`),
  ADD KEY `Etat` (`Etat`);

--
-- Index pour la table `Remise_Entete`
--
ALTER TABLE `Remise_Entete`
  ADD PRIMARY KEY (`ID_Remise`),
  ADD KEY `ID_Reservation` (`ID_Reservation`);

--
-- Index pour la table `Reservations_Entete`
--
ALTER TABLE `Reservations_Entete`
  ADD PRIMARY KEY (`ID_Reservation`),
  ADD KEY `ID_Client` (`ID_Client`);

--
-- Index pour la table `Reservations_Lignes`
--
ALTER TABLE `Reservations_Lignes`
  ADD PRIMARY KEY (`ID_Ligne`),
  ADD KEY `ID_Reservation` (`ID_Reservation`),
  ADD KEY `ID_Livre` (`ID_Livre`);

--
-- Index pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD PRIMARY KEY (`ID_utilisateur`),
  ADD KEY `ID_Client` (`ID_Client`);

--
-- Index pour la table `Villes`
--
ALTER TABLE `Villes`
  ADD PRIMARY KEY (`Code_Postal`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Auteurs`
--
ALTER TABLE `Auteurs`
  MODIFY `ID_Auteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT pour la table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `ID_Categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `Clients`
--
ALTER TABLE `Clients`
  MODIFY `ID_Client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT pour la table `Etat_Livre`
--
ALTER TABLE `Etat_Livre`
  MODIFY `ID_Etat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Livres`
--
ALTER TABLE `Livres`
  MODIFY `ID_Livre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT pour la table `Remises_Lignes`
--
ALTER TABLE `Remises_Lignes`
  MODIFY `ID_Ligne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `Remise_Entete`
--
ALTER TABLE `Remise_Entete`
  MODIFY `ID_Remise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT pour la table `Reservations_Entete`
--
ALTER TABLE `Reservations_Entete`
  MODIFY `ID_Reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT pour la table `Reservations_Lignes`
--
ALTER TABLE `Reservations_Lignes`
  MODIFY `ID_Ligne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  MODIFY `ID_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Livres`
--
ALTER TABLE `Livres`
  ADD CONSTRAINT `Livres_ibfk_1` FOREIGN KEY (`ID_Auteur`) REFERENCES `Auteurs` (`ID_Auteur`),
  ADD CONSTRAINT `Livres_ibfk_2` FOREIGN KEY (`ID_Categorie`) REFERENCES `Categories` (`ID_Categorie`);

--
-- Contraintes pour la table `Remises_Lignes`
--
ALTER TABLE `Remises_Lignes`
  ADD CONSTRAINT `Remises_Lignes_ibfk_2` FOREIGN KEY (`ID_Resevation_Ligne`) REFERENCES `Reservations_Lignes` (`ID_Ligne`),
  ADD CONSTRAINT `Remises_Lignes_ibfk_3` FOREIGN KEY (`ID_Remise`) REFERENCES `Remise_Entete` (`ID_Remise`),
  ADD CONSTRAINT `Remises_Lignes_ibfk_4` FOREIGN KEY (`Etat`) REFERENCES `Etat_Livre` (`ID_Etat`);

--
-- Contraintes pour la table `Remise_Entete`
--
ALTER TABLE `Remise_Entete`
  ADD CONSTRAINT `Remise_Entete_ibfk_1` FOREIGN KEY (`ID_Reservation`) REFERENCES `Reservations_Entete` (`ID_Reservation`);

--
-- Contraintes pour la table `Reservations_Entete`
--
ALTER TABLE `Reservations_Entete`
  ADD CONSTRAINT `Reservations_Entete_ibfk_1` FOREIGN KEY (`ID_Client`) REFERENCES `Clients` (`ID_Client`);

--
-- Contraintes pour la table `Reservations_Lignes`
--
ALTER TABLE `Reservations_Lignes`
  ADD CONSTRAINT `Reservations_Lignes_ibfk_1` FOREIGN KEY (`ID_Reservation`) REFERENCES `Reservations_Entete` (`ID_Reservation`),
  ADD CONSTRAINT `Reservations_Lignes_ibfk_2` FOREIGN KEY (`ID_Livre`) REFERENCES `Livres` (`ID_Livre`);

--
-- Contraintes pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD CONSTRAINT `Utilisateurs_ibfk_1` FOREIGN KEY (`ID_Client`) REFERENCES `Clients` (`ID_Client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
