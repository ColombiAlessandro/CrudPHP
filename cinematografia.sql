-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2024 at 09:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinematografia`
--

-- --------------------------------------------------------

--
-- Table structure for table `attori`
--

CREATE TABLE `attori` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `data_di_nascita` date NOT NULL,
  `data_di_morte` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attori`
--

INSERT INTO `attori` (`id`, `nome`, `cognome`, `data_di_nascita`, `data_di_morte`) VALUES
(1, 'Cillian', 'Murphy', '1976-05-25', NULL),
(2, 'Samuel Leroy', 'Jackson', '1948-12-21', NULL),
(3, 'Ryan', 'Gosling', '1980-11-12', NULL),
(4, 'Olivia', 'Cooke', '1993-12-27', NULL),
(5, 'Edoardo', 'Mario', '2004-12-18', '0000-00-00'),
(6, 'prova', '1', '2024-02-07', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `durata` float NOT NULL,
  `genere` varchar(50) NOT NULL,
  `data_uscita` date NOT NULL,
  `id_regista` int(11) NOT NULL,
  `id_recensione` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `nome`, `durata`, `genere`, `data_uscita`, `id_regista`, `id_recensione`) VALUES
(1, 'Oppenheimer', 3, 'Storico', '2023-08-23', 1, 1),
(2, 'Pulp Fiction', 2.34, 'Thriller', '1994-10-28', 2, NULL),
(3, 'Ready Player One', 2.2, 'Sci-fi', '2018-03-28', 3, 1),
(10, 'Prova 1', 2, 'horror', '2024-02-15', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_utente` int(11) NOT NULL,
  `nome_utente` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_utente`, `nome_utente`, `password`) VALUES
(1, '0', '0'),
(2, '0', '0'),
(3, 'Alessandro', 'Colombi');

-- --------------------------------------------------------

--
-- Table structure for table `partecipazioni`
--

CREATE TABLE `partecipazioni` (
  `id_attore` int(11) NOT NULL,
  `id_film` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partecipazioni`
--

INSERT INTO `partecipazioni` (`id_attore`, `id_film`) VALUES
(1, 1),
(1, 2),
(2, 2),
(2, 3),
(4, 3),
(6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `recensione`
--

CREATE TABLE `recensione` (
  `id` int(11) NOT NULL,
  `valutazione` float NOT NULL,
  `descrizione` varchar(100) NOT NULL,
  `id_film` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recensione`
--

INSERT INTO `recensione` (`id`, `valutazione`, `descrizione`, `id_film`) VALUES
(1, 10, 'Film avvincente e molto accurato', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registi`
--

CREATE TABLE `registi` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `data_di_nascita` date NOT NULL,
  `data_di_morte` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registi`
--

INSERT INTO `registi` (`id`, `nome`, `cognome`, `data_di_nascita`, `data_di_morte`) VALUES
(1, 'Christopher', 'Nolan', '1970-07-30', NULL),
(2, 'Quentin', 'Tarantino', '1963-03-27', NULL),
(3, 'Steven', 'Spielberg', '1946-12-18', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attori`
--
ALTER TABLE `attori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rif_regista` (`id_regista`),
  ADD KEY `rif_recensione` (`id_recensione`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_utente`);

--
-- Indexes for table `partecipazioni`
--
ALTER TABLE `partecipazioni`
  ADD PRIMARY KEY (`id_attore`,`id_film`),
  ADD KEY `rif_film` (`id_film`);

--
-- Indexes for table `recensione`
--
ALTER TABLE `recensione`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rif_film1` (`id_film`);

--
-- Indexes for table `registi`
--
ALTER TABLE `registi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attori`
--
ALTER TABLE `attori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recensione`
--
ALTER TABLE `recensione`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registi`
--
ALTER TABLE `registi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `rif_recensione` FOREIGN KEY (`id_recensione`) REFERENCES `recensione` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rif_regista` FOREIGN KEY (`id_regista`) REFERENCES `registi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `partecipazioni`
--
ALTER TABLE `partecipazioni`
  ADD CONSTRAINT `rif_attore` FOREIGN KEY (`id_attore`) REFERENCES `attori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rif_film` FOREIGN KEY (`id_film`) REFERENCES `film` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recensione`
--
ALTER TABLE `recensione`
  ADD CONSTRAINT `rif_film1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
