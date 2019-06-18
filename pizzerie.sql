-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2019 at 02:34 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzerie`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `idh` int(11) NOT NULL,
  `idu` int(11) NOT NULL,
  `totalprice` double NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`idh`, `idu`, `totalprice`, `date`) VALUES
(54, 1, 89.7, '2019-06-04'),
(55, 1, 163.5, '2019-06-04'),
(56, 1, 98.7, '2019-06-04'),
(57, 1, 498, '2019-06-05'),
(58, 1, 2697.4, '2019-06-05'),
(59, 3, 269.1, '2019-06-06'),
(60, 3, 3049.8, '2019-06-06'),
(61, 3, 289.2, '2019-06-06'),
(62, 3, 104.7, '2019-06-09'),
(63, 1, 23.9, '2019-06-18'),
(64, 1, 32.9, '2019-06-18'),
(65, 1, 3, '2019-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `history_products`
--

CREATE TABLE `history_products` (
  `id` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `idh` int(11) NOT NULL,
  `ids` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_products`
--

INSERT INTO `history_products` (`id`, `idp`, `idh`, `ids`, `quantity`) VALUES
(1, 1, 58, 0, 1),
(2, 1, 58, 0, 100),
(3, 3, 58, 0, 1),
(4, 4, 58, 0, 4),
(5, 7, 59, 0, 9),
(6, 7, 60, 0, 102),
(7, 3, 61, 0, 3),
(8, 4, 61, 0, 5),
(9, 3, 62, 0, 3),
(10, 1, 63, 0, 1),
(11, 0, 63, 2, 1),
(12, 2, 64, 0, 1),
(13, 0, 64, 1, 1),
(14, 0, 65, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `idp` int(11) NOT NULL,
  `titlep` varchar(100) NOT NULL,
  `describep` varchar(1000) NOT NULL,
  `imagep` varchar(256) NOT NULL,
  `pricep` float NOT NULL,
  `type` varchar(20) NOT NULL,
  `size` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pizza`
--

INSERT INTO `pizza` (`idp`, `titlep`, `describep`, `imagep`, `pricep`, `type`, `size`) VALUES
(1, 'Margherita', 'Sos de rosii, mozzarella', '/images/margerita.jpg', 20.9, 'Fara Carne', 'Mica'),
(2, 'Prosciutto cotto', 'Sos de rosii, sunca, mozzarella', '/images/proscitto cotto.jpg', 29.9, 'Cu Carne', 'Medie'),
(3, 'Prosciutto funghi', 'Sos de rosii, sunca, ciuperci, mozzarella', '/images/prosciutto funghi.jpeg', 34.9, 'Cu Carne', 'Medie'),
(4, 'Cannibale', 'Sos de rosii, salam, sunca, cremvursti, cabanos, mozzarella', '/images/Canibale.png', 36.9, 'Cu Carne', 'Mare'),
(5, 'Salame', 'Sos de rosii, salam, mozzarella', '/images/salami.jpg', 29.9, 'Cu Carne', 'Mica'),
(6, 'Quattro stagioni', 'Sos de rosii, salam, sunca, ciuperci, ardei, mozzarella', '/images/quatro stagioni.jpg', 35.9, 'Cu Carne', 'Mare'),
(7, 'Pepperoni', 'Sos de rosii, salam picant, ardei iute, mozzarella', '/images/pepperoni.jpg', 29.9, 'Cu Carne', 'Mica'),
(8, 'Mexicana', 'Sos de rosii, sunca, fasole, ardei iute, porumb, mozzarella', '/images/mexicana.jpg', 34.9, 'Cu Carne', 'Mare'),
(9, 'Tonno e cipolla', 'Sos de rosii, ceapa, ton, rosii, masline, mozzarella', '/images/tonno.jpg', 28.9, 'Cu Peste', 'Medie'),
(10, 'Diavolo', 'Sos de rosii, salam, salam picant, ardei iute, mozzarella', '/images/diavolo.jpg', 32.9, 'Cu Carne', 'Medie'),
(11, 'Americana', 'Sos de rosii, cremvursti, cartofi prajiti, mozzarella', '/images/americana.jpg', 29.9, 'Cu Carne', 'Mica'),
(12, 'Hawaii', 'Sos de rosii, sunca, ananas, mozzarella', '/images/hawaii.jpg', 31.9, 'Cu Carne', 'Medie'),
(13, 'Safari', 'Sos de rosii, ciuperci, sunca de pui, ardei, mozzarella', '/images/safari.jpg', 31.9, 'Cu Carne', 'Medie'),
(14, 'Al pollo', 'Sos de rosii, piept de pui, ardei, masline, mozzarella', '/images/polo.jpg', 31.9, 'Cu Carne', 'Medie'),
(15, 'Funghi', 'Sos de rosii, ciuperci, mozzarella', '/images/funghi.jpg', 27.9, 'Fara Carne', 'Mica'),
(16, 'Bismark', 'Sos de rosii, ceapa, sunca, ou, mozzarella', '/images/bismark.png', 31.9, 'Cu Carne', 'Medie'),
(17, 'Quatro formaggi', 'Sos de rosii, cascaval, gorgonzola, cas afumat, mozzarella', '/images/formagi.jpg', 32.9, 'Fara Carne', 'Medie'),
(18, 'Vegetariana', 'Sos de rosii, ciuperci, ceapa, ardei, mazare, porumb, rosii, masline, mozzarella', '/images/vegetariana.jpg', 31.9, 'Fara Carne', 'Medie'),
(19, 'Prociutto crudo', 'Sos de rosii, prosciutto, mozzarella', '/images/crudo.jpg', 33.9, 'Cu Carne', 'Mare'),
(20, 'Pizza de post', 'Sos de rosii, ciuperci, ceapa, ardei, mazare, porumb, rosii, masline', '/images/post.jpg', 26.9, 'Fara Carne', 'Mica'),
(21, 'Carbonara', 'Smantana cu usturoi, sunca, bancon, ciuperci, parmesan, mozzarella', '/images/carbonara.jpg', 35.9, 'Cu Carne', 'Mare'),
(22, 'Callzone', 'Sos de rosii, sunca, ciuperci, cabanos, mozzarella', '/images/calzone.jpg', 32.9, 'Cu Carne', 'Medie'),
(23, 'Capriciosa', 'Sos de rosii, ciuperci, sunca, porumb, masline, mozzarella', '/images/capriciosa.jpg', 34.9, 'Cu Carne', 'Mare'),
(24, 'Romana', 'Sos de rosii, salam picant, ciuperci, masline, mozzarella', '/images/romana.jpg', 33.9, 'Cu Carne', 'Medie'),
(25, 'Siciliana', 'Sos de rosii, bacon, ciuperci, masline, mozzarella', '/images/siciliana.jpg', 32.9, 'Cu Carne', 'Medie'),
(26, 'Acapulco', 'Sos de rosii, sunca, ciuperci, bacon, carnati taranesti, ardei, rosii, mozzarella', '/images/acapulco.jpg', 37.9, 'Cu Carne', 'Mare'),
(27, 'Napoli', 'Sos, file anchois, ceapa, capere, masline, mozzarella', '/images/napoli.jpg', 33.9, 'Cu Peste', 'Medie'),
(28, 'Sole mio', 'Sos de rosii, sunca, salam, carnati taranesti, ciuperci, masline, ou, mozzarella', '/images/sole.jpg', 36.9, 'Cu Carne', 'Mare'),
(29, 'Crudo e gorgonzola', 'Sos de rosii, gorgonzola, prosciutto crudo, rosii, mozzarella', '/images/crudog.jpg', 36.9, 'Cu Carne', 'Mare'),
(30, 'Mare e monti', 'Sos de rosii, fructe de mare, masline, mozzarella', '/images/mare.jpg', 36.9, 'Cu Peste', 'Mare'),
(31, 'Bresaola', 'Sos de rosii, pastrama de vita, rucola, parmesan, mozzarella', '/images/bresaola.jpg', 35.9, 'Cu Carne', 'Medie'),
(32, 'Carnivora', 'Sos de rosii, salam, sunca, bacon, carnati taranesti, ardei, masline, mozzarella', '/images/carnivora.jpg', 38.9, 'Cu Carne', 'Mare'),
(33, 'Paesana', 'Sos de rosii, bacon, carnati taranesti, ceapa, mozzarella', '/images/paesana.jpg', 34.9, 'Cu Carne', 'Medie'),
(34, 'Rustica', 'Sos de rosii, bacon, porumb, ciuperci, mozzarella', '/images/rustica.jpg', 33.9, 'Cu Carne', 'Medie'),
(35, 'Ginos', 'Sos de rosii, salam, sunca, cabanos, bacon, spanac, broccoli, masline, mozzarella', '/images/ginos.jpg', 40.9, 'Cu Carne', 'Mare'),
(36, 'Verdure', 'Sos de rosii, anghinare, dovlecel, ciuperci, rosii, spanac, broccoli, masline, mozzarella', '/images/verdure.jpg', 32.9, 'Fara Carne', 'Mica'),
(37, 'Spinaci', 'Sos de rosii, bancon, spanac, ou, mozzarella', '/images/spinaci.jpg', 34.9, 'Cu Carne', 'Medie'),
(38, 'Calabrese', 'Sos de rosii, bacon, anghinare, gorgonzola, masline, mozzarella', '/images/calabrese.jpg', 34.9, 'Cu Carne', 'Medie'),
(39, 'Ortolana', 'Sos de rosii, sunca, bancon, anghinare, dovlecel, broccoli, masline, mozzarella', '/images/ortolana.jpg', 36.9, 'Cu Carne', 'Mare');

-- --------------------------------------------------------

--
-- Table structure for table `sauce`
--

CREATE TABLE `sauce` (
  `ids` int(11) NOT NULL,
  `names` varchar(100) NOT NULL,
  `describes` varchar(100) NOT NULL,
  `images` varchar(1000) NOT NULL,
  `prices` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sauce`
--

INSERT INTO `sauce` (`ids`, `names`, `describes`, `images`, `prices`) VALUES
(1, 'Sos de rosii dulce', 'Sos de rosii, zahar, sare', '/images/margerita.jpg', 3),
(2, 'Sos de rosii picant', 'Sos de rosii, sare, ardei iute', '/images/margerita.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idu` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `points` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idu`, `email`, `password`, `address`, `phone`, `points`) VALUES
(1, 'dianapetrus13081997@gmail.com', 'df4a6da2e566d941e65a2652d7ec7752', 'str. Corneliu Coposu nr. 36A', '0741936484', ''),
(2, 'dya_rock97@yahoo.com', '38eb03c69a2b6fd2cb73673799c92680', 'lala', '0788999333', ''),
(3, 'asd@asd.com', '05a671c66aefea124cc08b76ea6d30bb', 'Maramuresului 35', '0799126455', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`idh`);

--
-- Indexes for table `history_products`
--
ALTER TABLE `history_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`idp`);

--
-- Indexes for table `sauce`
--
ALTER TABLE `sauce`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `idh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `history_products`
--
ALTER TABLE `history_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sauce`
--
ALTER TABLE `sauce`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
