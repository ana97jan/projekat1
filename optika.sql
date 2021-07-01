-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2020 at 02:44 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `optika`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id_korisnika` int(10) NOT NULL,
  `ime` varchar(15) COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  `email` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  `telefon` varchar(15) COLLATE utf8_croatian_ci NOT NULL,
  `username` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `status` varchar(25) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id_korisnika`, `ime`, `prezime`, `email`, `telefon`, `username`, `password`, `status`) VALUES
(1, 'Sanja', 'Milovanovic', 'sanja.milovanovic@gmail.c', '023212315', 'sanja', '674033583816e73167b0ca098ca0c65a', 'Korisnik'),
(2, 'Milica', 'Dokic', 'milica@gmail.com', '03213154654', 'milica', '932e512d0da2821efe2b81539f0b82c5', 'Admin'),
(3, 'andjela', 'djurovic', 'andjela@gmail.com', '0655555', 'andjela', 'andjela', 'Korisnik'),
(4, 'Danilo', 'Djurovic', 'danilo@gmail.com', '065656565', 'djuro', 'e7a4293b64e0b9c82d97be1d4d25c34c', 'Korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `kupovina`
--

CREATE TABLE `kupovina` (
  `kupovinaID` int(10) NOT NULL,
  `naocareID` int(10) NOT NULL,
  `kolicina` int(10) NOT NULL,
  `korisnik` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `kupovina`
--

INSERT INTO `kupovina` (`kupovinaID`, `naocareID`, `kolicina`, `korisnik`, `datum`) VALUES
(1, 36, 1, 'milica', '2018-12-23'),
(2, 59, 2, 'milica', '2018-12-23'),
(3, 11, 1, 'milica', '2018-12-23'),
(4, 5, 3, 'milica', '2017-12-23'),
(5, 12, 0, 'djuro', '2020-02-04'),
(6, 18, 0, 'djuro', '2020-02-04'),
(7, 9, 0, 'djuro', '2020-02-04'),
(8, 25, 0, 'djuro', '2020-02-04'),
(11, 48, 0, 'djuro', '2020-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `naocare`
--

CREATE TABLE `naocare` (
  `naocareID` int(11) NOT NULL,
  `naocareNaziv` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `naocareGod` int(11) NOT NULL,
  `naocareStanje` int(11) NOT NULL,
  `naocareCena` int(11) NOT NULL,
  `proizvodjacID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `naocare`
--

INSERT INTO `naocare` (`naocareID`, `naocareNaziv`, `naocareGod`, `naocareStanje`, `naocareCena`, `proizvodjacID`) VALUES
(1, 'CLUBMASTER OPTICS', 2016, 100, 183, 1),
(2, 'ROUND METAL OPTICS', 2017, 150, 173, 1),
(3, 'RB5228', 2012, 50, 183, 1),
(4, 'HEXAGONAL OPTICS', 2010, 88, 173, 1),
(5, 'ERIKA OPTICS', 2015, 77, 143, 1),
(6, 'AVIATOR GAZE', 2019, 45, 173, 1),
(7, 'AVIATOR OPTICS', 2014, 90, 172, 1),
(8, 'Lillian Sunglasses', 2018, 80, 160, 2),
(9, 'Jodie Readers', 2018, 64, 68, 2),
(10, 'Alijah Sunglasses', 2015, 88, 140, 2),
(11, 'Olive Readers', 2020, 100, 68, 2),
(12, 'Wren Sunglasses', 2016, 50, 160, 2),
(13, 'Norah Sunglasses', 2016, 44, 140, 2),
(14, 'Tinlee Readers', 2011, 20, 68, 2),
(15, 'GU2749', 2011, 80, 95, 3),
(16, 'GU2538', 2015, 80, 95, 3),
(17, 'GU1770', 2018, 25, 92, 3),
(18, 'NW627S', 2018, 60, 149, 4),
(19, 'NW625S', 2017, 80, 119, 4),
(20, 'NW5150', 2019, 45, 159, 4),
(21, 'NW8003', 2015, 53, 179, 4),
(22, 'NW5132', 2016, 94, 174, 4),
(23, 'Loreto', 2018, 120, 209, 5),
(24, 'Fernandina', 2016, 40, 209, 5),
(25, 'Panga', 2011, 80, 179, 5),
(26, 'May', 2019, 30, 249, 5),
(27, 'Isla', 2016, 60, 200, 5),
(28, 'Cheeca', 2015, 60, 179, 5),
(29, 'Anaa', 2012, 68, 159, 5),
(30, 'Caballito', 2014, 88, 159, 5),
(31, 'F-3629', 2010, 70, 120, 6),
(32, 'F-3628', 2015, 90, 89, 6),
(33, 'F-3627', 2018, 64, 100, 6),
(34, 'F-3626', 2018, 44, 50, 6),
(35, 'F-3625', 2013, 90, 103, 6),
(36, 'F-3624', 2015, 87, 165, 6),
(37, 'F-3623', 2017, 90, 135, 6),
(38, 'F-3622', 2019, 30, 200, 6),
(39, 'F-3621', 2017, 110, 112, 6),
(40, 'F-3618', 2015, 60, 65, 6),
(41, 'CK18108', 2017, 50, 180, 7),
(42, 'CK18122', 2018, 63, 175, 7),
(43, 'CK18516', 2015, 83, 200, 7),
(44, 'CK19104', 2020, 60, 173, 7),
(45, 'CK18722', 2015, 30, 120, 7),
(46, 'CK19104', 2016, 60, 146, 7),
(47, 'CK19105', 2016, 50, 146, 7),
(48, 'CK19113', 2017, 80, 160, 7);

-- --------------------------------------------------------

--
-- Table structure for table `proizvodjac`
--

CREATE TABLE `proizvodjac` (
  `proizvodjacID` int(11) NOT NULL,
  `proizvodjacNaziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `proizvodjacDrzava` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvodjac`
--

INSERT INTO `proizvodjac` (`proizvodjacID`, `proizvodjacNaziv`, `proizvodjacDrzava`) VALUES
(1, 'Ray Ban', 'Italija'),
(2, 'Kate Spade', 'Amerika'),
(3, 'Guess', 'Amerika'),
(4, 'Nine West', 'Amerika'),
(5, 'Costa Del Mar', 'Florida'),
(6, 'Fysh', 'Kanada'),
(7, 'Calvin Klein', 'Amerika');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id_korisnika`);

--
-- Indexes for table `kupovina`
--
ALTER TABLE `kupovina`
  ADD PRIMARY KEY (`kupovinaID`);

--
-- Indexes for table `naocare`
--
ALTER TABLE `naocare`
  ADD PRIMARY KEY (`naocareID`);

--
-- Indexes for table `proizvodjac`
--
ALTER TABLE `proizvodjac`
  ADD PRIMARY KEY (`proizvodjacID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id_korisnika` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kupovina`
--
ALTER TABLE `kupovina`
  MODIFY `kupovinaID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `naocare`
--
ALTER TABLE `naocare`
  MODIFY `naocareID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `proizvodjac`
--
ALTER TABLE `proizvodjac`
  MODIFY `proizvodjacID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
