-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-12-2024 a las 00:08:50
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ptxy_xavi_gallego`
--
CREATE DATABASE IF NOT EXISTS `ptxy_xavi_gallego` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ptxy_xavi_gallego`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titol` varchar(45) NOT NULL,
  `cos` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`id`, `titol`, `cos`) VALUES
(1, 'PROVA1', 'dawd'),
(2, 'PROVA2', 'PROVA'),
(3, 'PROVA', 'PROVA3'),
(4, 'holaº', 'qweqw'),
(5, 'HOla MUndo', 'wadwa'),
(6, 'Alfonso ', 'MMMMDA'),
(7, 'Alfonso ', 'MMMMDA'),
(8, 'Alfonso 3', 'MMMMDA'),
(9, 'Alfonso 5', 'MMMMDA'),
(10, 'qeu', 'pasa'),
(12, 'prova3', 'be'),
(13, 'prova4', 'be'),
(14, 'prova 5', 'bona bona'),
(15, 'w', 'ww');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

DROP TABLE IF EXISTS `usuaris`;
CREATE TABLE `usuaris` (
  `id` int(11) NOT NULL,
  `dni` char(9) NOT NULL,
  `nickname` varchar(45) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `cognom` varchar(45) NOT NULL,
  `email` varchar(35) NOT NULL,
  `contrasenya` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuaris`
--

INSERT INTO `usuaris` (`id`, `dni`, `nickname`, `nom`, `cognom`, `email`, `contrasenya`, `admin`) VALUES
(1, '45654312R', 'xgallego', 'Xavi', 'Gallego', 'xavigallegopalau@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1),
(2, '45962292N', 'adelgado', 'Alfonso', 'Delgado', 'adelgado@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 0),
(3, '54810442Q', 'bgandullo', 'Bryan', 'Gandullo', 'bgandullo@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
