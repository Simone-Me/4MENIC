-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 16, 2024 alle 13:51
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4menic`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `isAdmin` int(11) DEFAULT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `cinema`
--

CREATE TABLE `cinema` (
  `idCinema` int(11) NOT NULL,
  `nomCine` varchar(30) DEFAULT NULL,
  `adresseCine` varchar(50) DEFAULT NULL,
  `villeCine` varchar(30) DEFAULT NULL,
  `CPCine` int(11) DEFAULT NULL,
  `salleTot` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `cinema`
--

INSERT INTO `cinema` (`idCinema`, `nomCine`, `adresseCine`, `villeCine`, `CPCine`, `salleTot`) VALUES
(2, 'LUXEMBOURG', '67 69 RUE MONSIEUR LE PRINCE', 'Paris 6e Arrondissement', 75106, 3),
(3, 'UGC ROTONDE', '103 BD DU MONTPARNASSE', 'Paris 6e Arrondissement', 75106, 3),
(4, 'CAUMARTIN', '101 RUE ST LAZARE', 'Paris 9e Arrondissement', 75109, 5),
(5, 'LE CINEMA DES CINEASTES', '7 AVENUE DE CLICHY', 'Paris 17e Arrondissement', 75117, 3),
(6, 'PATHE WEPLER', '132 -140 BOULEVARD DE CLICHY', 'Paris 18e Arrondissement', 75118, 11),
(7, 'UGC CINE CITE BERCY', '2 COUR SAINT-EMILION', 'Paris 12e Arrondissement', 75112, 18),
(8, 'GAUMONT AQUABOULEVARD', '8/16 RUE DU COLONEL PIERRE AVIA', 'Paris 15e Arrondissement', 75115, 14),
(9, 'GAUMONT MONTPARNOS', '16 18 RUE D ODESSA', 'Paris 14e Arrondissement', 75114, 4),
(10, 'STUDIO DES URSULINES', '10 RUE DES URSULINES', 'Paris 5e Arrondissement', 75105, 1),
(11, 'REFLET MEDICIS 2', '7 RUE CHAMPOLLION', 'Paris 5e Arrondissement', 75105, 3),
(12, 'UGC  GOBELINS', '66 BIS AV DES GOBELINS', 'Paris 13e Arrondissement', 75113, 11),
(13, 'MK2 QUAI DE LOIRE', '5/19 QUAI DE LA LOIRE', 'Paris 19e Arrondissement', 75119, 6),
(14, '! POC ! SCENE ARTISTIQUE ALFOR', '82 RUE MARCEL BOURDARIAS', 'Alfortville', 94002, 1),
(15, 'L ALCAZAR', '1 RUE DE LA STATION', 'Asnières-sur-Seine', 92004, 4),
(16, 'THEATRE VICTOR HUGO', '14 AV VICTOR HUGO', 'Bagneux', 92007, 1),
(17, 'PATHE', '26 RUE LE CORBUSIER', 'Boulogne-Billancourt', 92012, 7),
(18, '! POC ! SCENE ARTISTIQUE ALFOR', '82 RUE MARCEL BOURDARIAS', 'Alfortville', 94002, 1),
(19, 'BUXY', 'CENTRE COMMERCIAL VAL D\'YERRES 2', 'Boussy-Saint-Antoine', 91097, 5),
(20, 'JEAN COCTEAU', '3 RUE ANATOLE FRANCE', 'Brétigny-sur-Orge', 91103, 2),
(21, 'LA PLEIADE', '12 AVENUE COUSIN DE MERICOURT', 'Cachan', 94016, 3),
(22, 'UGC CINE CITE', '8 PLACE DES 3 GARES', 'Cergy', 95127, 14),
(23, 'JEAN GABIN', 'RUE PIERRE DE COUBERTIN', 'Champagne-sur-Seine', 77079, 1),
(24, 'CINEMA', '7BIS RUE DE LA MAIRIE', 'Châtillon', 92020, 1),
(25, 'ATRIUM', '3 PARVIS ROBERT SCHUMAN', 'Chaville', 92022, 1),
(26, 'GAUMONT DISNEY VILLAGE', '1 ESPLANADE FRANCOIS TRUFFAUT', 'Chessy', 77111, 15),
(27, 'M J C THEATRE DE COLOMBES', '96, 98 RUE ST DENIS', 'Colombes', 92025, 1),
(28, 'HEMISPHERE THEATER', '23 RUE MARCEL CLAVIER', 'Coulommiers', 77131, 4),
(29, 'CAMILLE ST SAENS', '15 BOULEVARD ARISTIDE BRIAND', 'Courbevoie', 92026, 1),
(30, 'PATHE DAMMARIE', '824 AVENUE DU LYS', 'Dammarie-les-Lys', 77152, 10),
(31, 'PARTERRE', 'SQUARE DE LAC MEGANTIC', 'Dourdan', 91200, 2),
(32, 'MEGA CGR', '5 AVENUE DU MARECHAL  JOFFRE', 'Épinay-sur-Seine', 93031, 12),
(33, 'LA ROTONDE A', '102 RUE SAINT JACQUES', 'Étampes', 91223, 3),
(34, 'CINEMA DE L YSIEUX', 'PLACE JEAN MOULIN', 'Fosses', 95250, 1),
(35, 'UGC ISSY LES MOULINEAUX', '24 AVENUE CHARLES DE GAULLE', 'Issy-les-Moulineaux', 92040, 7),
(36, 'CENTRE CULTUREL', '96 AVENUE DES BRUZACQUES', 'Jouy-le-Moutier', 95323, 1),
(37, 'THEATRE DE LONGJUMEAU', '20 AVENUE DU GENERAL DE GAULLE', 'Longjumeau', 91345, 1),
(38, 'L\'ATALANTE', '48 RUE DU PRIEURE', 'Maisons-Laffitte', 78358, 1),
(39, 'CINEMASSY', 'PLACE DE FRANCE', 'Massy', 91377, 3),
(40, 'MELIES', 'PLACE JEAN JAURES', 'Montreuil', 93048, 6),
(41, 'FREDERIC DARD CLUB A', '77 RUE PAUL DOUMER', 'Les Mureaux', 78440, 2),
(42, 'LE VILLAGE I', '4 RUE DE CHEZY', 'Neuilly-sur-Seine', 92051, 2),
(43, 'THEATRE ET CINEMA GEORGES SIME', 'PLACE CARNOT', 'Rosny-sous-Bois', 93064, 1),
(44, 'ARIEL', '99 AVENUE PAUL DOUMER', 'Rueil-Malmaison', 92063, 3),
(45, 'ESPACE PREVERT', 'QUARTIER DU PLESSIS LE ROI', 'Savigny-le-Temple', 77445, 1),
(46, 'LE CRATERE', 'RUE JEAN MOULIN', 'Saint-Arnoult-en-Yvelines', 78537, 1),
(47, 'PATHE BELLE EPINE', 'CENTRE COMMERCIAL BELLE EPINE', 'Thiais', 94073, 16),
(48, 'L\'ANTARES', '1, PLACE DU COEUR BATTANT', 'Vauréal', 95637, 2),
(49, 'LA GRANGE', 'RUE AMBROISE PRO', 'Vaux-le-Pénil', 77487, 1),
(50, 'UGC CYRANO', '7 RUE RAMEAU', 'Versailles', 78646, 8),
(51, 'UGC ROXANE', '6 RUE ST SIMON', 'Versailles', 78646, 4),
(52, 'CINEMA JEAN MARAIS', '59 BD CARNOT', 'Le Vésinet', 78650, 1),
(53, 'ANDRE MALRAUX', '28 AVENUE DE VERDUN', 'Villeneuve-la-Garenne', 92078, 1),
(54, 'LE VINCENNES', '30 AV DE PARIS', 'Vincennes', 94080, 4),
(55, 'ELYSEES LINCOLN', '14 RUE LINCOLN', 'Paris 8e Arrondissement', 75108, 3),
(56, 'GRAND REX', '5 BD POISSONNIERE', 'Paris 2e Arrondissement', 75102, 7),
(57, 'UGC MONTPARNASSE', '83 BD DU MONTPARNASSE', 'Paris 6e Arrondissement', 75106, 7),
(58, 'MK2 BEAUBOURG', '50 RUE RAMBUTEAU', 'Paris 3e Arrondissement', 75103, 6),
(59, 'MK2 ODEON COTE SAINT-MICHEL', '7 RUE HAUTEFEUILLE', 'Paris 6e Arrondissement', 75106, 4),
(60, 'MK2 ODEON COTE SAINT-GERMAIN', '113 BD ST GERMAIN', 'Paris 6e Arrondissement', 75106, 5),
(61, 'MAC MAHON', '5/7 AV MAC MAHON', 'Paris 17e Arrondissement', 75117, 1),
(62, 'LUMINOR HOTEL DE VILLE', '20 RUE DU TEMPLE', 'Paris 4e Arrondissement', 75104, 2),
(63, 'BORIS VIAN GRANDE HALLE', '211 AV JEAN JAURES', 'Paris 19e Arrondissement', 75119, 1),
(64, 'MK2 BASTILLE COTE FAUBOURG SAI', '5 RUE DU FAUBOURG ST ANTOINE', 'Paris 11e Arrondissement', 75111, 3),
(65, 'MAJESTIC BASTILLE', '4 BD RICHARD LENOIR', 'Paris 11e Arrondissement', 75111, 2),
(66, 'ECOLES CINEMA CLUB', '23 RUE DES ECOLES', 'Paris 5e Arrondissement', 75105, 2),
(67, 'CHAPLIN SAINT LAMBERT', '6 RUE PECLET', 'Paris 15e Arrondissement', 75115, 3),
(68, 'CHAPLIN DENFERT', '24 PLACE DENFERT ROCHEREAU', 'Paris 14e Arrondissement', 75114, 1),
(69, 'NOUVEL ODEON', '6 RUE DE L ECOLE DE MEDECINE', 'Paris 6e Arrondissement', 75106, 1),
(70, 'LE CHAMPO', '51 RUE DES ECOLES', 'Paris 5e Arrondissement', 75105, 2),
(71, 'MK2 BIBLIOTHEQUE', '128 A 162 AVENUE DE FRANCE', 'Paris 13e Arrondissement', 75113, 16),
(72, 'CGR PARIS LILAS', 'PLACE DU MAQUIS DU VERCORS', 'Paris 20e Arrondissement', 75120, 7),
(73, 'JEAN VILAR', '1 RUE PAUL SIGNAC', 'Arcueil', 94003, 2),
(74, 'CINEMA VENTURA', 'RUE SAMUEL DESBORDES', 'Athis-Mons', 91027, 1),
(75, 'LA BARBACANE', 'PLACE DU 8 MAI 1945', 'Beynes', 78062, 1),
(76, 'LE CINEMA', '10 AVENUE FRANCIS DE PRESSENSE', 'Le Bourget', 93013, 1),
(77, 'LOUIS JOUVET', '3 PLACE MAURICE BERTEAUX', 'Chatou', 78146, 2),
(78, 'COSMOS', '22 AV DE LA RESISTANCE', 'Chelles', 77108, 2),
(79, 'SALLE ANDRE MALRAUX', '102 AV DU GENERAL DE GAULLE', 'Chevilly-Larue', 94021, 1),
(80, 'SALLE PAUL ELUARD', '4 AV DE VILLENEUVE ST GEORGES', 'Choisy-le-Roi', 94022, 1),
(81, 'L\'HELIOS', '27 A 39 RUE DU BOURNARD', 'Colombes', 92025, 4),
(82, 'ESPACE ERMITAGE', 'ALLEE STE THERESE', 'Domont', 95199, 1),
(83, 'ESPACE CULTUREL DU PARC', 'PLACE MAURICE NILES', 'Drancy', 93029, 1),
(84, 'ABEL GANCE', '184 BD ST DENIS', 'Courbevoie', 92026, 1),
(85, 'FRANCAIS', '38 RUE DU GENERAL DE GAULLE', 'Enghien-les-Bains', 95210, 5),
(86, 'PIERRE FRESNAY', '3 RUE SAINT FLAIVE', 'Ermont', 95219, 1),
(87, 'THEATRE ANDRE MALRAUX', '1 BIS RUE GUILLEMETEAU', 'Gagny', 93032, 1),
(88, 'LE SCARRON', '8 AV. JEANNE ET MAURICE DOLIVET', 'Fontenay-aux-Roses', 92032, 1),
(89, 'CINE D ISSY', 'MAIL RAYMOND MENAND', 'Issy-les-Moulineaux', 92040, 1),
(90, 'LE LUXY', '77 AV GEORGES GOSNAT', 'Ivry-sur-Seine', 94041, 2),
(91, 'THEATRE DU GARDE CHASSE', '2 AVENUE WALDECK ROUSSEAU', 'Les Lilas', 93045, 1),
(92, 'MARCEL PAGNOL', '17 RUE BERANGER', 'Malakoff', 92046, 1),
(93, 'ATMOSPHERE', 'PARC DES CELESTINS', 'Marcoussis', 91363, 1),
(94, 'LA LUCIOLE', '1 ROUTE DE PONTOISE', 'Méry-sur-Oise', 95394, 1),
(95, 'CONCORDE', '4 AV DES BOSQUETS', 'Mitry-Mory', 77294, 1),
(96, 'JACQUES BREL', 'RUE DE LA MARE AUX CARATS', 'Montigny-le-Bretonneux', 78423, 1),
(97, 'CINE MONTROUGE', '88 RUE RACINE', 'Montrouge', 92049, 1),
(98, 'LES LUMIERES', '49 RUE MAURICE THOREZ', 'Nanterre', 92050, 4),
(99, 'LA FERME DU BUISSON', 'ALLEE DE LA FERME', 'Noisiel', 77337, 2),
(100, 'CENTRE CULTUREL  ORMESSON', '22 AV WLADIMIR D ORMESSON', 'Ormesson-sur-Marne', 94055, 1),
(101, '! POC ! SCENE ARTISTIQUE ALFOR', '82 RUE MARCEL BOURDARIAS', 'Alfortville', 94002, 1),
(102, 'THEATRE ET CINEMA GEORGES SIME', 'PLACE CARNOT', 'Rosny-sous-Bois', 93064, 1),
(103, 'GAUMONT ALESIA', '73 AVENUE DU GENERAL LECLERC', 'Paris 14e Arrondissement', 75114, 8),
(104, 'MK2 BASTILLE COTE FAUBOURG SAI', '5 RUE DU FAUBOURG ST ANTOINE', 'Paris 11e Arrondissement', 75111, 3),
(105, 'UGC LYON BASTILLE', '12 RUE DE LYON', 'Paris 12e Arrondissement', 75112, 7),
(106, 'LE FORUM', 'PLACE DU FORUM', 'Boissy-Saint-Léger', 94004, 1),
(107, 'THEATRE PAUL ELUARD', '162 RUE MAURICE BERTEAUX', 'Bezons', 95063, 2),
(108, 'GERARD PHILIPE', '2 RUE PABLO NERUDA', 'Bonneuil-sur-Marne', 94011, 1),
(109, 'ARCEL', '15 PLACE LEON CASSE', 'Corbeil-Essonnes', 91174, 3),
(110, 'ERMITAGE', '6 RUE DE FRANCE', 'Fontainebleau', 77186, 5),
(111, 'CINETAMPES', 'PLACE GEOFFROY ST HILAIRE', 'Étampes', 91223, 1),
(112, '0SALLE GEORGES BRASSENS', 'SALLE GEORGES BRASSENS', 'Itteville', 91315, 1),
(113, 'THEATRE CLAUDE DEBUSSY', '116 AVENUE DU GENERAL DE GAULLE', 'Maisons-Alfort', 94046, 1),
(114, 'VARIETES', '20 BD CHAMBLAIN', 'Melun', 77288, 3),
(115, 'SALLE ARAGON', '1 PLACE DU FER A CHEVAL', 'Orly', 94054, 1),
(116, 'CINEMA GERARD PHILIPE', '1 PLACE JANE RHODES', 'Le Plessis-Robinson', 92060, 2),
(117, 'ROYAL UTOPIA', '14 RUE ALEXANDRE PRACHAY', 'Pontoise', 95500, 1),
(118, 'LE TRIANON', 'PL CARNOT ET 1 RUE ETIENNE DOLET', 'Romainville', 93063, 1),
(119, 'UGC CINE CITE ROSNY', '16 RUE CONRAD ADENAUER', 'Rosny-sous-Bois', 93064, 15),
(120, 'ECRAN', '14 PASSAGE DE L ACQUEDUC', 'Saint-Denis', 93066, 2),
(121, 'C 2 L', '25/27/29 RUE DU VIEUX MARCHE', 'Saint-Germain-en-Laye', 78551, 5),
(122, 'ESPACE 1789', '7/9 RUE DES ROSIERS', 'Saint-Ouen', 93070, 2),
(123, 'UTOPIA', '1 PLACE MENDES-FRANCE', 'Saint-Ouen-l\'Aumône', 95572, 5),
(124, 'LE VANVES', '12 RUE SADI CARNOT', 'Vanves', 92075, 1),
(125, 'UGC CINE CITE SQY OUEST', '1 AV. DE LA SOURCE DE LA BIEVRE', 'Montigny-le-Bretonneux', 78423, 16),
(126, 'MEGARAMA', '82 BOULEVARD VICTOR BORDIER', 'Montigny-lès-Cormeilles', 95424, 8),
(127, 'UGC CINE CITE VELIZY', '2 AVENUE DE L\'EUROPE', 'Vélizy-Villacoublay', 78640, 18),
(128, 'LA TOILE FILANTE CIRCUIT ITINE', 'CENTRE CULTUREL DE L\'ORANGERIE', 'Roissy-en-France', 95527, 1),
(129, 'GAUMONT CHAMPS ELYSEES MARIGNA', '27/33 AVENUE DES CHAMPS ELYSEES', 'Paris 8e Arrondissement', 75108, 6),
(130, 'GAUMONT PARNASSE', '3 RUE D\'ODESSA', 'Paris 14e Arrondissement', 75114, 15),
(131, 'BRETAGNE', '73 BD DU MONTPARNASSE', 'Paris 6e Arrondissement', 75106, 2),
(132, 'LUCERNAIRE FORUM', '53 RUE NOTRE DAME DES CHAMPS', 'Paris 6e Arrondissement', 75106, 3),
(133, 'UGC CINE CITE LES HALLES', '101 RUE BERGER', 'Paris 1er Arrondissement', 75101, 27),
(134, 'GAUMONT CONVENTION', '27 RUE ALAIN CHARTIER', 'Paris 15e Arrondissement', 75115, 9),
(135, 'L\'ARCHIPEL', '17 BD DE STRASBOURG', 'Paris 10e Arrondissement', 75110, 2),
(136, 'ESPACE SAINT MICHEL', '7 PLACE ST MICHEL', 'Paris 5e Arrondissement', 75105, 2),
(137, 'QUARTIER LATIN I', '9 RUE CHAMPOLLION', 'Paris 5e Arrondissement', 75105, 2),
(138, 'ESCURIAL', '11 BD PORT ROYAL', 'Paris 13e Arrondissement', 75113, 2),
(139, 'MK2 A&E', '15/43 QUAI FRANCOIS MAURIAC', 'Paris 13e Arrondissement', 75113, 4),
(140, 'PATHE BEAUGRENELLE', '7 RUE LINOIS', 'Paris 15e Arrondissement', 75115, 10),
(141, 'UGC CINE CITE PARIS 19', '166 BOULEVARD MAC DONALD', 'Paris 19e Arrondissement', 75119, 14),
(142, 'SALLE CHARLES CHAPLIN', 'ESPACE CULTUREL ALAIN POHER 7 AVENUE AUGUSTE DURU', 'Ablon-sur-Seine', 94001, 1),
(143, 'CINEMA LOUIS DAQUIN', '76 RUE VICTOR HUGO', 'Le Blanc-Mesnil', 93007, 3),
(144, 'AUDITORIUM BOURSE TRAVAIL', '11 RUE DU 8 MAI 1945', 'Bobigny', 93008, 1),
(145, 'JEAN RENOIR', 'RUE DU GENERAL LECLERC', 'Bois-Colombes', 92009, 1),
(146, 'LA GRANGE DE LA TREMBLAYE', 'RUE DU PARC', 'Bois-d\'Arcy', 78073, 1),
(147, 'STUDIO 66', '66 RUE JEAN JAURES', 'Champigny-sur-Marne', 94017, 5),
(148, 'L\'ORANGE BLEUE', '7 RUE JEAN MERMOZ', 'Eaubonne', 95203, 1),
(149, 'LE CONTI', 'PLACE DU PATIS', 'L\' Isle-Adam', 95313, 5),
(150, 'CINEMA AGNES VARDA', '37-39 GRANDE RUE', 'Juvisy-sur-Orge', 91326, 1),
(151, 'FONTENELLE', '10 RUE CARNOT', 'Marly-le-Roi', 78372, 2),
(152, 'CENTRE D ART ET DE CULTURE', '15 BOULEVARD DES NATIONS-UNIES', 'Meudon', 92048, 1),
(153, 'LA BERGERIE', 'COUR EMILE ZOLA', 'Nangis', 77327, 1),
(154, 'CAP CINEMA NANTERRE', '200 ALLEE DE CORSE', 'Nanterre', 92050, 10),
(155, 'LE PIERRE BRASSEUR', '103 AV DU GENERAL DE GAULLE', 'Ozoir-la-Ferrière', 77350, 1),
(156, 'CINE 104', '104 AV JEAN LOLIVE', 'Pantin', 93055, 3),
(157, 'APOLLO', '62 AVENUE DE LA REPUBLIQUE', 'Pontault-Combault', 77373, 2),
(158, 'LE REXY', 'QUARTIER DELORT', 'Provins', 77379, 4),
(159, 'ARIEL HAUTS DE RUEIL', '59 AVENUE DE FOUILLEUSE', 'Rueil-Malmaison', 92063, 3),
(160, 'LES YEUX D ELSA', '11 BIS AVE JEAN JAURES', 'Saint-Cyr-l\'École', 78545, 1),
(161, 'LE NORMANDY', '72 BOULEVARD DE LA REPUBLIQUE', 'Vaucresson', 92076, 2),
(162, 'LE COLOMBIER', 'PLACE CHARLES DE GAULLE', 'Ville-d\'Avray', 92077, 1),
(163, 'LE CASINO', '13 RUE GUILLAUME BUDE', 'Villiers-sur-Marne', 94079, 1),
(164, 'CALYPSO A', '38 RUE VICTOR BASCH', 'Viry-Châtillon', 91687, 3),
(165, '3 CINES ROBESPIERRE', '19 AVENUE MAXIMILIEN ROBESPIERRE', 'Vitry-sur-Seine', 94081, 3),
(166, 'KINEPOLIS SERVON', 'ZAC DE NOYER AUX PERDRIX', 'SERVON', 77450, 9),
(167, 'UGC NORMANDIE', '116 AVENUE DES CHAMPS ELYSEES', 'Paris 8e Arrondissement', 75108, 4),
(168, 'UGC OPERA', '32 BD DES ITALIENS', 'Paris 9e Arrondissement', 75109, 4),
(169, 'STUDIO GALANDE', '42 RUE GALANDE', 'Paris 5e Arrondissement', 75105, 1),
(170, 'PARNASSIEN', '98 BD DU MONTPARNASSE', 'Paris 14e Arrondissement', 75114, 7),
(171, 'PUBLICIS ELYSEES', '133 AV DES CHAMPS ELYSEES', 'Paris 8e Arrondissement', 75108, 2),
(172, 'LE BRADY', '39 BOULEVARD DE STRASBOURG', 'Paris 10e Arrondissement', 75110, 2),
(173, 'MAJESTIC PASSY', '18 - 20 RUE DE PASSY', 'Paris 16e Arrondissement', 75116, 3),
(174, 'MK2 BASTILLE COTE BEAUMARCHAIS', '3 BD R LENOIR 4/6 BD BEAUMARCHAI', 'Paris 11e Arrondissement', 75111, 4),
(175, 'MK2 NATION', '133 BOULEVARD DIDEROT', 'Paris 12e Arrondissement', 75112, 8),
(176, 'LE CINEMA DU PANTHEON', '13 RUE VICTOR COUSIN', 'Paris 5e Arrondissement', 75105, 1),
(177, 'EPEE DE BOIS', '100 RUE MOUFFETARD', 'Paris 5e Arrondissement', 75105, 2),
(178, 'LE GRAND ACTION', '5 RUE DES ECOLES', 'Paris 5e Arrondissement', 75105, 3),
(179, 'LE LOUXOR', '170 BOULEVARD DE MAGENTA', 'Paris 10e Arrondissement', 75110, 3),
(180, 'CLUB DE L ETOILE', '14 RUE TROYON', 'Paris 17e Arrondissement', 75117, 1),
(181, 'LE SELECT', '10 AV DIVISION LECLERC', 'Antony', 92002, 4),
(182, 'UGC CINE CITE O\'PARINOR', 'LE HAUT DE GALY', 'Aulnay-sous-Bois', 93005, 14),
(183, 'BEAUMONT PALACE', '6 AV ANATOLE FRANCE', 'Beaumont-sur-Oise', 95052, 1),
(184, 'LE RENAISSANCE', '16 RUE DE L EGLISE', 'Bray-sur-Seine', 77051, 1),
(185, 'CINEMA DU THEATRE', '8 AVENUE CHARLES DE GAULLE', 'La Celle-Saint-Cloud', 78126, 1),
(186, 'MY CINE', 'SHOPPING PROMENADE 3 RUE ROBERT SCHUMAN', 'Claye-Souilly', 77118, 3),
(187, 'L ETOILE', '1 ALLEE DU PROGRES', 'La Courneuve', 93027, 1),
(188, 'LA LUCARNE MJC', '100 RUE JULIETTE SAVAR', 'Créteil', 94028, 1),
(189, 'CINEPARADIS', '10 AVENUE MARECHAL DE VILLARS', 'Fontainebleau', 77186, 6),
(190, 'THEATRE DE FONTENAY', 'PLACE DU 8 MAI 1945', 'Fontenay-le-Fleury', 78242, 1),
(191, 'CINE GARCHES', '86 GRANDE RUE', 'Garches', 92033, 2),
(192, 'CINEMA JEAN VIGO', '1 RUE PIERRE ET MARIE CURIE', 'Gennevilliers', 92036, 2),
(193, 'LE LAVOIR NUMERIQUE', '10 RUE VICTOR MARQUIGNY', 'Gentilly', 94037, 1),
(194, 'LE CENTRAL', 'SQUARE DE LA MAIRIE', 'Gif-sur-Yvette', 91272, 1),
(195, 'THEATRE SARAH BERNHARDT', '82 BD PAUL VAILLANT COUTURIER', 'Goussainville', 95280, 1),
(196, 'LA TOURNELLE', '14 RUE DISPAN', 'L\' Haÿ-les-Roses', 94038, 1),
(197, 'CINEMA LE CINQ', '5 RUE DELAMBRE', 'Lagny-sur-Marne', 77243, 3),
(198, 'ATELIER BARBARA', '22-24 RUE ALSACE LORRAINE', 'Limeil-Brévannes', 94044, 1),
(199, 'CINE MUNICIPAL YVES MONTAND', '36 RUE EUGENE MASSE', 'Livry-Gargan', 93046, 1),
(200, 'LA ROTONDE', 'PLACE DU 14 JUILLET', 'Moissy-Cramayel', 77296, 1),
(201, 'CENTRE PICASSO', 'RUE GUY DE MAUPASSANT', 'Montigny-lès-Cormeilles', 95424, 1),
(202, 'L\'EDEN', '5 RUE DE PONTOISE', 'Montmorency', 95428, 2),
(203, 'LA FAUVETTE', '21 AV DANIEL PERDRIGE', 'Neuilly-Plaisance', 93049, 1),
(204, 'ROYAL PALACE', '165 GRANDE RUE CHARLES DE GAULLE', 'Nogent-sur-Marne', 94052, 6),
(205, 'CINEMA JACQUES TATI', '14 AVENUE SAINT LAURENT', 'Orsay', 91471, 3),
(206, 'ESPACE DES ARTS', 'PLACE CHARLES DE GAULLE', 'Les Pavillons-sous-Bois', 93057, 1),
(207, 'CENTRE DES BORDS DE MARNE', '2 RUE DE LA PRAIRIE', 'Le Perreux-sur-Marne', 94058, 1),
(208, 'UGC CINE CITE LA DEFENSE', 'LE DOME', 'Puteaux', 92062, 16),
(209, 'C2L CIN\'HOCHE', '6 RUE HOCHE', 'Sartrouville', 78586, 5),
(210, 'CINE SEL', '47 GRANDE RUE', 'Sèvres', 92072, 1),
(211, 'LE CAPITOLE', '3 RUE LEDRU ROLLIN', 'Suresnes', 92073, 4),
(212, 'GAUMONT', '8 RUE DU MONDIAL 1998', 'Saint-Denis', 93066, 9),
(213, 'LES TOILES OLYMPIC', 'PLACE FRANCOIS TRUFFAUT', 'Saint-Gratien', 95555, 3),
(214, 'LE LIDO', '70 AV DE LA REPUBLIQUE', 'Saint-Maur-des-Fossés', 94068, 1),
(215, 'STUDIO CINE', '207 RUE DE PARIS', 'Taverny', 95607, 2),
(216, 'CINEMA LE GRENIER A SEL', 'PLACE DU 8 MAI 1945', 'Trappes', 78621, 1),
(217, 'UGC LES ULIS', 'CENTRE COMMERCIAL LES ULIS 2', 'Les Ulis', 91692, 4),
(218, 'LES VARIETES', '72 RUE DE CHELLES', 'Vaires-sur-Marne', 77479, 1),
(219, 'ESPACE MAURICE BEJART', '3 BLVD ANDRE MALRAUX', 'Verneuil-sur-Seine', 78642, 1),
(220, 'CINEMA D ART ROMAIN ROLLAND', '18 RUE EUGENE VARLIN', 'Villejuif', 94076, 1),
(221, 'ESPACE CULTUREL', '56BIS AVENUE CARNOT', 'Villeneuve-le-Roi', 94077, 1),
(222, 'CINEMA PARADISO', '2 RUE MARC SANGNIER', 'Yerres', 91691, 1),
(223, 'CGR MY PLACE SARCELLES', '2 ALLEE HENRI DUNANT', 'Sarcelles', 95585, 10),
(224, 'STARS - PREMIERE CINEMAS', '13 AVENUE CHARLES DE GAULLE', 'Arpajon', 91021, 5),
(225, 'BALZAC', '1 RUE BALZAC', 'Paris 8e Arrondissement', 75108, 3),
(226, 'MAX LINDER', '24 BD POISSONNIERE', 'Paris 9e Arrondissement', 75109, 1),
(227, 'ENTREPOT', '7 ET 9 RUE FRANCIS DE PRESSENSE', 'Paris 14e Arrondissement', 75114, 3),
(228, 'UGC CINE CITE MAILLOT', 'PALAIS CONGRES PL PORTE MAILLOT', 'Paris 17e Arrondissement', 75117, 12),
(229, 'ST ANDRE DES ARTS', '30 RUE ST ANDRE DES ARTS', 'Paris 6e Arrondissement', 75106, 3),
(230, 'MK2 PARNASSE', '11 RUE JULES CHAPLAIN', 'Paris 6e Arrondissement', 75106, 3),
(231, 'CHRISTINE CINEMA CLUB', '4 RUE CHRISTINE', 'Paris 6e Arrondissement', 75106, 2),
(232, 'LE SILENCIO DES PRES', '22 RUE GUILLAUME APOLLINAIRE', 'Paris 6e Arrondissement', 75106, 1),
(233, 'STUDIO 28', '10 RUE THOLOZE', 'Paris 18e Arrondissement', 75118, 1),
(234, 'MK2 QUAI DE SEINE', '14 QUAI DE LA SEINE', 'Paris 19e Arrondissement', 75119, 6),
(235, 'MK2 GAMBETTA', '6 RUE BELGRAND', 'Paris 20e Arrondissement', 75120, 6),
(236, 'UGC DANTON', '99 BD ST GERMAIN', 'Paris 6e Arrondissement', 75106, 4),
(237, 'UGC ODEON', '124 BD ST GERMAIN', 'Paris 6e Arrondissement', 75106, 5),
(238, 'LES FAUVETTES', '58 AVENUE DES GOBELINS', 'Paris 13e Arrondissement', 75113, 5),
(239, 'LES 7 BATIGNOLLES CINEMOVIDA', 'ALLEE COLETTE HEILBRONNER', 'Paris 17e Arrondissement', 75117, 7),
(240, 'PANDORA', '6 ALLEE SIMONE SIGNORET', 'Achères', 78005, 3),
(241, 'STUDIO', '2 RUE EDOUARD POISSON', 'Aubervilliers', 93001, 1),
(242, 'THEATRE ET CINEMA JACQUES PREV', '134 RUE ANATOLE FRANCE', 'Aulnay-sous-Bois', 93005, 2),
(243, 'LE CIN\'HOCHE', '6 RUE HOCHE', 'Bagnolet', 93006, 2),
(244, 'CINE TOILE', '2 RUE DES COLOMBES', 'Ballancourt-sur-Essonne', 91045, 1),
(245, 'AUDITORIUM DU CONSERVATOIRE', '11 BD CARNOT', 'Bourg-la-Reine', 92014, 1),
(246, 'LES 4 VENTS', '80 RUE DU GENERAL LECLERC', 'Brie-Comte-Robert', 77053, 1),
(247, 'REX', '364 AVE DE LA DIVISION LECLERC', 'Châtenay-Malabry', 92019, 2),
(248, 'STUDIO 31', '31 PLACE D\'ARIANE', 'Chessy', 77111, 2),
(249, 'FRANCOIS TRUFFAUT', '2 RUE DE L ECOLE', 'Chilly-Mazarin', 91161, 2),
(250, 'CINEMA JEANNE MOREAU', '22 RUE PAUL VAILLANT COUTURIER', 'Clamart', 92023, 1),
(251, 'ESPACE PHILIPPE NOIRET', 'PLACE CHARLES DE GAULLE', 'Les Clayes-sous-Bois', 78165, 2),
(252, 'CINEMA RUTEBEUF', '16-18  ALLEES LEON-GAMBETTA', 'Clichy', 92024, 1),
(253, 'LA COUPOLE', 'RUE JEAN FRANCOIS MILLET', 'Combs-la-Ville', 77122, 1),
(254, 'THEATRE DU CORMIER', '123 RUE DE SAINT-GERMAIN', 'Cormeilles-en-Parisis', 95176, 1),
(255, 'CINEMA DU PALAIS', '40 ALLEE PARMENTIER', 'Créteil', 94028, 3),
(256, 'CENTRE DES ARTS', '12-16, RUE DE LA LIBERATION', 'Enghien-les-Bains', 95210, 1),
(257, 'SALLE SERGE GAINSBOURG', 'RUE DU GENERAL JULIEN', 'Épinay-sur-Seine', 93031, 1),
(258, 'LE KOSMOS', '243TER AVENUE DE LA REPUBLIQUE', 'Fontenay-sous-Bois', 94033, 1),
(259, 'CINE HENRI LANGLOIS', '32 BIS RUE DE LA STATION', 'Franconville', 95252, 2),
(260, 'M J C', '2 AV DU PARC DES SPORTS', 'Fresnes', 94034, 1),
(261, 'JACQUES BREL A', 'PLACE DE L\'HOTEL DE VILLE', 'Garges-lès-Gonesse', 95268, 1),
(262, 'CINE THEATRE JACQUES PREVERT', 'PLACE AIME-CESAIRE', 'Gonesse', 95277, 1),
(263, 'SALLE PIERRE ET JACQUES PREVER', 'RUE DE PARIS', 'Joinville-le-Pont', 94042, 1),
(264, 'LE CHAPLIN', 'PLACE MENDES FRANCE', 'Mantes-la-Jolie', 78361, 1),
(265, 'LES 2 SCENES', 'PLACE HENRI DUNANT', 'Maule', 78380, 1),
(266, 'CINEMA CONFLUENCES MENNECY', 'ZAC MONTVRAIN II', 'Mennecy', 91386, 3),
(267, 'ESPACE CULTUREL ROBERT-DOISNEA', '16 AV DE LATTRE DE TASSIGNY', 'Meudon', 92048, 1),
(268, 'CINEMA  11X20 14', '21 RUE DE LA CROIX-ROUGE', 'Mons-en-Montois', 77298, 1),
(269, 'LE CYRANO', '114 AVENUE DE LA REPUBLIQUE', 'Montgeron', 91421, 1),
(270, 'LE BIJOU', 'PLACE DE LA LIBERATION', 'Noisy-le-Grand', 93051, 3),
(271, 'CINEPAL', 'AVENUE DU 8 MAI 1945', 'Palaiseau', 91477, 4),
(272, 'CINEMA L\'AVANT-SCENE', '1, RUE ALSACE-LORRAINE', 'Paray-Vieille-Poste', 91479, 1),
(273, 'UGC PLAISIR', '1170 AVENUE DE SAINT GERMAIN', 'PLAISIR', 78490, 9),
(274, 'ESPACE PAUL VALERY', '72 ET 74 AVENUE ARDOUIN', 'Le Plessis-Trévise', 94059, 1),
(275, 'C2L POISSY', '18 RUE CHARLES DE GAULLE', 'Poissy', 78498, 5),
(276, 'CINOCHE', 'ALLEE JEAN WIENER', 'Ris-Orangis', 91521, 3),
(277, 'TRIANON', '3 BIS RUE MARGUERITE RENAUDIN', 'Sceaux', 92071, 1),
(278, 'ESPACE JEAN-MARIE POIRIER', 'ESPLANADE DU 18 JUIN 1940', 'Sucy-en-Brie', 94071, 1),
(279, 'LES TROIS PIERROTS', '6-8 RUE DU MONT VALERIEN', 'Saint-Cloud', 92064, 2),
(280, 'LES 4 PERRAY', '44-46 AVENUE GABRIEL PERI', 'Sainte-Geneviève-des-Bois', 91549, 4),
(281, 'CINES CARNE', 'PLACE MARCEL CARNE', 'Saint-Michel-sur-Orge', 91570, 3),
(282, 'STUDIO DES CHAMPS LASNIERS', 'AVENUE DU BERRY', 'Les Ulis', 91692, 1),
(283, 'CINEMA CONFLUENCES VARENNES', 'PETIT FOSSARD', 'Varennes-sur-Seine', 77482, 9),
(284, 'CINEMA SORANO', '1 RUE CHARLES PATHE', 'Vincennes', 94080, 1),
(285, 'KINEPOLIS BRETIGNY', '5 RUE MICHELE MORGAN', 'Brétigny-sur-Orge', 91103, 10),
(286, 'CINE PINCE VENT', 'CENTRE COMMERCIAL PINCE VENT 85 ROUTE DE PROVINS', 'Chennevières-sur-Marne', 94019, 8),
(287, 'UGC CINE CITE PARLY', '2 AVENUE CHARLES DE GAULLE', 'Le Chesnay', 78158, 12);

-- --------------------------------------------------------

--
-- Struttura della tabella `commentaire`
--

CREATE TABLE `commentaire` (
  `idCom` int(11) NOT NULL,
  `texteCom` varchar(50) DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `idFilm` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `favorite`
--

CREATE TABLE `favorite` (
  `idUser` int(11) NOT NULL,
  `idCinema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `film`
--

CREATE TABLE `film` (
  `idFilm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `reservationsalle`
--

CREATE TABLE `reservationsalle` (
  `idReservation` int(11) NOT NULL,
  `dateResa` datetime DEFAULT NULL,
  `nbPax` int(11) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `idSalle` int(11) NOT NULL,
  `idAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `salle`
--

CREATE TABLE `salle` (
  `idSalle` int(11) NOT NULL,
  `nomSalle` varchar(20) DEFAULT NULL,
  `capacite` int(11) DEFAULT NULL,
  `idCinema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `seance`
--

CREATE TABLE `seance` (
  `idSeance` int(11) NOT NULL,
  `horaire` datetime DEFAULT NULL,
  `idFilm` int(11) NOT NULL,
  `idSalle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `ticket`
--

CREATE TABLE `ticket` (
  `idTicket` int(11) NOT NULL,
  `prix` int(11) DEFAULT NULL,
  `dateAchat` date DEFAULT NULL,
  `idSeance` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUser` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telephone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `username`, `nom`, `prenom`, `password`, `email`, `telephone`) VALUES
(1, '', 'Melotti', 'Simone', '0', 'simone.melotti96@gmail.com', '0781802619'),
(2, 'admin', 'admin', 'admin', '0', 'admin@gmail.com', ''),
(3, 'kenbail', 'LeGrosBengala', 'Enzo', 'Enzo)$', 'enzo.marques@efrei.net', '0668152098');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`),
  ADD UNIQUE KEY `idUser` (`idUser`);

--
-- Indici per le tabelle `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`idCinema`);

--
-- Indici per le tabelle `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idCom`),
  ADD KEY `idFilm` (`idFilm`),
  ADD KEY `idUser` (`idUser`);

--
-- Indici per le tabelle `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`idUser`,`idCinema`),
  ADD KEY `idCinema` (`idCinema`);

--
-- Indici per le tabelle `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`idFilm`);

--
-- Indici per le tabelle `reservationsalle`
--
ALTER TABLE `reservationsalle`
  ADD PRIMARY KEY (`idReservation`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idSalle` (`idSalle`),
  ADD KEY `idAdmin` (`idAdmin`);

--
-- Indici per le tabelle `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`idSalle`),
  ADD KEY `idCinema` (`idCinema`);

--
-- Indici per le tabelle `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`idSeance`),
  ADD KEY `idFilm` (`idFilm`),
  ADD KEY `idSalle` (`idSalle`);

--
-- Indici per le tabelle `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`idTicket`),
  ADD KEY `idSeance` (`idSeance`),
  ADD KEY `idUser` (`idUser`);

--
-- Indici per le tabelle `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `cinema`
--
ALTER TABLE `cinema`
  MODIFY `idCinema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- AUTO_INCREMENT per la tabella `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `utilisateur` (`idUser`);

--
-- Limiti per la tabella `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`idFilm`) REFERENCES `film` (`idFilm`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `utilisateur` (`idUser`);

--
-- Limiti per la tabella `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `utilisateur` (`idUser`),
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`idCinema`) REFERENCES `cinema` (`idCinema`);

--
-- Limiti per la tabella `reservationsalle`
--
ALTER TABLE `reservationsalle`
  ADD CONSTRAINT `reservationsalle_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `utilisateur` (`idUser`),
  ADD CONSTRAINT `reservationsalle_ibfk_2` FOREIGN KEY (`idSalle`) REFERENCES `salle` (`idSalle`),
  ADD CONSTRAINT `reservationsalle_ibfk_3` FOREIGN KEY (`idAdmin`) REFERENCES `admin` (`idAdmin`);

--
-- Limiti per la tabella `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `salle_ibfk_1` FOREIGN KEY (`idCinema`) REFERENCES `cinema` (`idCinema`);

--
-- Limiti per la tabella `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `seance_ibfk_1` FOREIGN KEY (`idFilm`) REFERENCES `film` (`idFilm`),
  ADD CONSTRAINT `seance_ibfk_2` FOREIGN KEY (`idSalle`) REFERENCES `salle` (`idSalle`);

--
-- Limiti per la tabella `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`idSeance`) REFERENCES `seance` (`idSeance`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `utilisateur` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
