-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26 Mar 2017 la 17:20
-- Versiune server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `carte`
--

CREATE TABLE `carte` (
  `nr_inv` int(11) NOT NULL,
  `titlu` varchar(50) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `pret` varchar(5) NOT NULL,
  `volum` int(11) NOT NULL,
  `disponabilitate` int(11) NOT NULL,
  `editura` int(11) NOT NULL,
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `editura`
--

CREATE TABLE `editura` (
  `id` int(11) NOT NULL,
  `nume` varchar(20) NOT NULL,
  `oras` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `elev`
--

CREATE TABLE `elev` (
  `nr_matricol` varchar(10) NOT NULL,
  `nume` varchar(20) NOT NULL,
  `prenume` varchar(20) NOT NULL,
  `clasa` varchar(20) NOT NULL,
  `telefon` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `imprumut`
--

CREATE TABLE `imprumut` (
  `id` int(11) NOT NULL,
  `id_elev` varchar(11) NOT NULL,
  `id_carte` int(11) NOT NULL,
  `data_imp` date NOT NULL,
  `data_res` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carte`
--
ALTER TABLE `carte`
  ADD PRIMARY KEY (`nr_inv`);

--
-- Indexes for table `editura`
--
ALTER TABLE `editura`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elev`
--
ALTER TABLE `elev`
  ADD PRIMARY KEY (`nr_matricol`),
  ADD UNIQUE KEY `nr_matricol` (`nr_matricol`);

--
-- Indexes for table `imprumut`
--
ALTER TABLE `imprumut`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carte`
--
ALTER TABLE `carte`
  MODIFY `nr_inv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `editura`
--
ALTER TABLE `editura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `imprumut`
--
ALTER TABLE `imprumut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
