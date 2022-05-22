-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 11:06 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jarno_boothuur`
--

-- --------------------------------------------------------

--
-- Table structure for table `bestelling`
--

CREATE TABLE `bestelling` (
  `Welke_Boot` varchar(100) NOT NULL,
  `Personen` int(100) NOT NULL,
  `datum` date NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Nummer` varchar(100) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `id` int(50) NOT NULL,
  `dagdeel` varchar(50) NOT NULL,
  `opties` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bestelling`
--

INSERT INTO `bestelling` (`Welke_Boot`, `Personen`, `datum`, `Name`, `Nummer`, `Mail`,`id`,`dagdeel`,`opties`) VALUES
(1, 'Sloep', 2, 2022-05-23, 'Jarno', '06-7464789', 'jarnogombert@gmail.com', 1, 'Middag', 'Lunch-box'),
(2, 'Gibbs Quadski', 1, 2022-05-24, 'Henk', '06-7464783', 'henk@outlook.com', 2, 'Ochtend', 'Niks');

-- --------------------------------------------------------

--
-- Table structure for table `boten`
--

CREATE TABLE `boten` (
  `id` int(50) NOT NULL,
  `bootNaam` varchar(50) NOT NULL,
  `bootImage` varchar(50) NOT NULL,
  `tekst` text NOT NULL,
  `Info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boten`
--

INSERT INTO `boten` (`id`, `bootNaam`, `bootImage`, `tekst`, `Info`) VALUES
(1, 'Open Zeilboot', 'openzeilboot.jpg', 'Open zeilboten zijn geschikt voor ervaren zeilers, maar ook voor mensen die niet of nauwelijks met een zeilboot gevaren hebben. Net als bij motorboten, motorjachten en andere zeiljachten heeft iedere open zeilboot zijn eigen karakteristieke vaareigenschappen.', '2 tot 4 personen max. € 150 euro per dagdeel'),
(2, 'Sloep', 'sloep.jpg', 'Een sloep is een klein scheepstype dat op het dek van een groter schip wordt meegevoerd en in uitvoeringen als de vissloep ook als onafhankelijk zeilvaartuig in gebruik.', '1 tot 4 personen max. € 200 euro per dagdeel'),
(3, 'Peddelsurfen', 'sup.jpg', 'Peddelsurfen is een watersport ontstaan uit het surfen. Peddelsurfers staan op een SUP-board, een soort surfplank, en bewegen zich voort door gebruik te maken van een peddel. De sport wordt gezien als een full-body workout, maar kan ook erg ontspannen worden beoefend.', '1 persoon per sup max. € 50 euro per dagdeel'),
(4, 'Jetski', 'jetski.jpg', 'Een jetski is een soort scooter voor op het water, die aangedreven wordt door een waterjetmotor. Op een jetski kan één persoon plaatsnemen. Een waterscooter is een soortgelijke boot voor twee of drie personen en wordt zittend bestuurd.', '2 personen max. € 100 euro per dagdeel'),
(5, 'Gibbs Quadski', 'gibbsquad.jpg', 'De Quadski is een 4-takt amfiquad die kan worden omgebouwd tot een waterscooter. Het heeft een topsnelheid van 72 km / u op zowel land als water, een eigen voortstuwingssysteem voor scheepsstraal en wielintrekking.', '1 persoon max. € 75 euro per dagdeel'),
(6, 'Kajuitboot', 'motorjacht.jpg', 'Mooi model Kajuitboot de sterke DAF 575 en boegschroef zorgen voor heerlijke vaareigenschappen, en door het prachtige model heb je veel bekijks. Verder is hij compleet uitgevoerd, wel heeft hij iets of wat werk van buiten.', '1 tot 12 personen max. € 300 euro per dagdeel'),
(7, 'Speedboot', 'speedboot.jpg', 'Huur nu deze prachtige kwaliteit speedboot. hij is redelijk nieuw voor onze collectie want hij was eerst van de eigenaar van bol.com maar nu hebben wij hem voor huur. met een mooie V8 dus ik zeg geniet.', '2 tot 6 personen max. € 400 euro per dagdeel'),
(8, 'Waterfiets', 'yeet.png', 'Een waterfiets is een vaartuig voor voornamelijk recreatief gebruik. Een inzittende zorgt voor de aandrijving door middel van het trappen op pedalen, net zoals dat op fietsen wordt gedaan. De trapbeweging wordt op zijn beurt mechanisch omgezet in een voortstuwende beweging.', '1 persoon max. € 45 euro per dagdeel');

-- --------------------------------------------------------

--
-- Table structure for table `dagdeel`
--

CREATE TABLE `dagdeel` (
  `dagdeel` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dagdeel`
--

INSERT INTO `dagdeel` (`dagdeel`, `id`) VALUES
('Ochtend', 1),
('Middag', 2),
('Avond', 3);

-- --------------------------------------------------------

--
-- Table structure for table `eigenaar`
--

CREATE TABLE `eigenaar` (
  `VoorNaam` varchar(100) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `Wachtwoord` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eigenaar`
--

INSERT INTO `eigenaar` (`VoorNaam`, `Mail`, `Wachtwoord`, `id`) VALUES
('Jarno', 'jarnogombert@gmail.com', 'wachtwoord', 1);

-- --------------------------------------------------------

--
-- Table structure for table `extra_opties`
--

CREATE TABLE `extra_opties` (
  `opties` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `extra_opties`
--

INSERT INTO `extra_opties` (`opties`) VALUES
('Begeleider'),
('Lunch-box'),
('Vishengel en spullen'),
('Zeil/Parasol'),
('Niks');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bestelling`
--
ALTER TABLE `bestelling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boten`
--
ALTER TABLE `boten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dagdeel`
--
ALTER TABLE `dagdeel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eigenaar`
--
ALTER TABLE `eigenaar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bestelling`
--
ALTER TABLE `bestelling`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `boten`
--
ALTER TABLE `boten`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dagdeel`
--
ALTER TABLE `dagdeel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eigenaar`
--
ALTER TABLE `eigenaar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
