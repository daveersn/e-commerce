-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 13, 2021 alle 10:17
-- Versione del server: 10.4.17-MariaDB
-- Versione PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `accounts`
--

CREATE TABLE `accounts` (
  `id_account` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `prod_name` varchar(255) DEFAULT NULL,
  `prod_desc` varchar(255) DEFAULT NULL,
  `prod_price` double DEFAULT NULL,
  `prod_img` varchar(500) DEFAULT NULL,
  `prod_qta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `products`
--

INSERT INTO `products` (`id_product`, `prod_name`, `prod_desc`, `prod_price`, `prod_img`, `prod_qta`) VALUES
(17, 'SHINOBI ICE', 'La leggenda è tornata , con una punta di ghiaccio! Papaya, fico d\'india e ghiaccio', 6, 'img/img_SHINOBI_ICE.jpg', 100),
(18, 'FIRST LAB N.3', 'Mirtillo, ribes, fragole di bosco, amarena si uniscono delicatamente in un mix di menta e aromi glaciali per rendere il sapore dolce dei frutti rossi ancora più vivo e fresco! ', 6, 'img/img_FIRST_LAB_N.3.jpg', 100),
(19, 'SHINOBI KILLER', 'l killer è arrivato, un liquido fatale, le sue armi? Un dolcissimo melone accompagnato da note di frutti di bosco.', 6, 'img/img_SHINOBI_KILLER.jpg', 70),
(20, 'STRA PANNA', 'Panna & Fragole', 6, 'img/img_STRA_PANNA.jpg', 50),
(21, 'GRAPE O’CLOCK', 'Un dolce mix di uva americana e rinfrescante limonata, tutto ghiacciato.', 6, 'img/img_GRAPE_O’CLOCK.jpg', 100);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id_account`);

--
-- Indici per le tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
