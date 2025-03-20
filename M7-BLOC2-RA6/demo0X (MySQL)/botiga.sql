-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 17-03-2025 a les 08:11:29
-- Versió del servidor: 10.4.27-MariaDB
-- Versió de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `botiga`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `categoria`
--

CREATE TABLE `categoria` (
  `cat_id` int(3) NOT NULL,
  `cat_nom` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Bolcament de dades per a la taula `categoria`
--

INSERT INTO `categoria` (`cat_id`, `cat_nom`) VALUES
(1, 'samarretes'),
(2, 'pantalons'),
(3, 'sabates'),
(4, 'mitjons');

-- --------------------------------------------------------

--
-- Estructura de la taula `producte`
--

CREATE TABLE `producte` (
  `pro_id` int(3) NOT NULL,
  `pro_nom` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `pro_preu` double NOT NULL,
  `pro_imatge` varchar(25) NOT NULL,
  `cat_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Bolcament de dades per a la taula `producte`
--

INSERT INTO `producte` (`pro_id`, `pro_nom`, `pro_preu`, `pro_imatge`, `cat_id`) VALUES
(1, 'Bàsica negra', 13.99, '', 1),
(2, 'Jordan 93', 43.95, '', 1),
(3, 'New Balance', 89.95, '', 3),
(4, 'New Balance 415', 93.55, '', 3),
(5, 'Munich C3 Jeans', 72.95, '', 3),
(6, 'Carhart Industrial', 69.99, '', 2),
(7, 'Asics Nimbus GT100', 55.21, '', 3),
(8, 'Jordan', 10.95, '', 4),
(9, 'Curry', 45.00, '', 1);

-- --------------------------------------------------------

--
-- Estructura de la taula `usuari`
--

CREATE TABLE `usuari` (
  `usu_mail` varchar(25) NOT NULL,
  `usu_contra` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Bolcament de dades per a la taula `usuari`
--

INSERT INTO `usuari` (`usu_mail`, `usu_contra`) VALUES
('david.marin@itb.cat', ''),
('raimon.izard@itb.cat', '');

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`cat_id`);

--
-- Índexs per a la taula `producte`
--
ALTER TABLE `producte`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `FOREIGN` (`cat_id`);

--
-- Índexs per a la taula `usuari`
--
ALTER TABLE `usuari`
  ADD PRIMARY KEY (`usu_mail`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `categoria`
--
ALTER TABLE `categoria`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT per la taula `producte`
--
ALTER TABLE `producte`
  MODIFY `pro_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `producte`
--
ALTER TABLE `producte`
  ADD CONSTRAINT `producte_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categoria` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
