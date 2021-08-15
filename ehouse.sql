-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2021 at 05:35 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ehouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `idKorisnik` int(11) NOT NULL,
  `userCookie` varchar(20) DEFAULT NULL,
  `ime` varchar(20) DEFAULT NULL,
  `prezime` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `sifra` varchar(40) DEFAULT NULL,
  `aktivan` tinyint(1) DEFAULT 1,
  `admin` tinyint(1) DEFAULT 0,
  `slika` varchar(100) DEFAULT NULL,
  `datumRegistracije` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idKorisnik`, `userCookie`, `ime`, `prezime`, `username`, `sifra`, `aktivan`, `admin`, `slika`, `datumRegistracije`) VALUES
(22, 'oAHxF3IWWIOAbYUPlfq4', 'Amar', 'Selimbegovic', 'amko', '123', 1, 0, 'XHhXW3tNTl/user.png', '2021-08-15 14:57:26'),
(23, '9nnnfyA1AEtsIbiMHA81', 'Adnan', 'Dugalic', 'ado', '123', 1, 0, 'cMn47ueTN8/defuser.png', '2021-08-15 14:33:40'),
(24, 'jG2dxRDMmuMsmTiurSzO', 'Admin', 'Admin', 'admin', 'admin', 1, 1, 'ddOwil4GPW/user.png', '2021-08-15 14:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `nekretnina`
--

CREATE TABLE `nekretnina` (
  `idNekretnina` int(11) NOT NULL,
  `naslov` varchar(20) DEFAULT NULL,
  `slika` varchar(100) DEFAULT NULL,
  `cijena` int(11) DEFAULT NULL,
  `idKorisnikaKupio` int(11) NOT NULL DEFAULT 0,
  `idKorisnikaPostavio` int(11) NOT NULL,
  `opis` varchar(500) DEFAULT NULL,
  `dostupno` tinyint(1) DEFAULT 1,
  `datumObjave` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nekretnina`
--

INSERT INTO `nekretnina` (`idNekretnina`, `naslov`, `slika`, `cijena`, `idKorisnikaKupio`, `idKorisnikaPostavio`, `opis`, `dostupno`, `datumObjave`) VALUES
(18, 'Kuca', '7vFkTsB66s/slika0.jpg', 80000, 22, 22, 'Kuca u Bihacu', 1, '2021-08-15 14:30:47'),
(19, 'Kuca', 'f0E7ZiBCdC/slika0.jpg', 100000, 23, 22, 'Kuca u Cazinu', 0, '2021-08-15 14:42:46'),
(20, 'Stan', 'CXbIEsoQBU/slika1.jpg', 75000, 23, 23, 'Odlican stan u centru Bihaca, 80m2 3 sobe.. za detalje pozovite broj 123-123-123', 1, '2021-08-15 14:35:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`idKorisnik`);

--
-- Indexes for table `nekretnina`
--
ALTER TABLE `nekretnina`
  ADD PRIMARY KEY (`idNekretnina`),
  ADD KEY `idKorisnikaPostavio` (`idKorisnikaPostavio`),
  ADD KEY `idKorisnikaKupio` (`idKorisnikaKupio`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `idKorisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `nekretnina`
--
ALTER TABLE `nekretnina`
  MODIFY `idNekretnina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nekretnina`
--
ALTER TABLE `nekretnina`
  ADD CONSTRAINT `nekretnina_ibfk_1` FOREIGN KEY (`idKorisnikaPostavio`) REFERENCES `korisnik` (`idKorisnik`),
  ADD CONSTRAINT `nekretnina_ibfk_2` FOREIGN KEY (`idKorisnikaKupio`) REFERENCES `korisnik` (`idKorisnik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
