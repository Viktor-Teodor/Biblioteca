-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26 Apr 2017 la 15:00
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

--
-- Salvarea datelor din tabel `carte`
--

INSERT INTO `carte` (`nr_inv`, `titlu`, `autor`, `pret`, `volum`, `disponabilitate`, `editura`, `categoria`) VALUES
(1, 'Poezii', 'Mihai Eminescu', '11.5', 1, 1, 2, 'Poezii'),
(2, 'Comedii', 'I. L. Caragiale', '26.4', 1, 1, 3, 'Comedie');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `editura`
--

CREATE TABLE `editura` (
  `id` int(11) NOT NULL,
  `nume` varchar(20) NOT NULL,
  `oras` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `editura`
--

INSERT INTO `editura` (`id`, `nume`, `oras`) VALUES
(1, 'Taida', 'Bucuresti'),
(2, 'Art', 'Bucuresti'),
(3, 'Humanitas', 'Bucuresti'),
(4, 'Dacia', 'Iasi');

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

--
-- Salvarea datelor din tabel `elev`
--

INSERT INTO `elev` (`nr_matricol`, `nume`, `prenume`, `clasa`, `telefon`, `email`) VALUES
('148/11', 'Grosu', 'Alexandra', 'XII A', '0787859253', 'grosu@gmail.com'),
('148/12', 'Hapenciuc', 'George', 'XII A', '0787859251', 'mailgeorgeh@gmail.com'),
('149/1', 'Popescu', 'Diana', 'V A', '0787859254', 'popescu@gmail.com'),
('149/2', 'Turcu', 'Rebeca', 'V A', '0787859256', 'turcu@gmail.com'),
('149/3', 'Vasilescu', 'Ion', 'V A', '0787859112', 'vasilescu@gmail.com'),
('2002', 'Admin', 'Bibiloteca', 'prof', '', '');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `elev_sters`
--

CREATE TABLE `elev_sters` (
  `nr_matricol` varchar(10) NOT NULL,
  `nume` varchar(20) NOT NULL,
  `prenume` varchar(20) NOT NULL,
  `clasa` varchar(20) NOT NULL,
  `telefon` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Salvarea datelor din tabel `elev_sters`
--

INSERT INTO `elev_sters` (`nr_matricol`, `nume`, `prenume`, `clasa`, `telefon`, `email`) VALUES
('148/33', 'Plesca', 'Vasile', 'XII A', '0787859278', 'plesca.vasile@gmail.com');

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
-- Salvarea datelor din tabel `imprumut`
--

INSERT INTO `imprumut` (`id`, `id_elev`, `id_carte`, `data_imp`, `data_res`) VALUES
(36, '148/12', 1, '2017-03-01', '2017-03-03'),
(37, '148/12', 2, '2017-03-01', '2017-03-21'),
(38, '148/12', 3, '2017-03-02', NULL),
(39, '148/12', 4, '2017-03-02', '2017-03-16'),
(40, '148/11', 10, '2017-03-02', NULL),
(41, '148/11', 12, '2017-03-03', '2017-03-24'),
(42, '148/12', 1, '2017-04-26', '2017-04-26'),
(44, '148/12', 2, '2017-04-26', NULL),
(45, '148/12', 1587, '2017-04-26', NULL),
(46, '148/12', 5, '2017-04-26', NULL);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `rezervat`
--

CREATE TABLE `rezervat` (
  `id` int(11) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `nr_inv` varchar(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `raspuns` varchar(20) NOT NULL DEFAULT 'In asteptare'
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
-- Indexes for table `elev_sters`
--
ALTER TABLE `elev_sters`
  ADD PRIMARY KEY (`nr_matricol`),
  ADD UNIQUE KEY `nr_matricol` (`nr_matricol`);

--
-- Indexes for table `imprumut`
--
ALTER TABLE `imprumut`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rezervat`
--
ALTER TABLE `rezervat`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `rezervat`
--
ALTER TABLE `rezervat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
