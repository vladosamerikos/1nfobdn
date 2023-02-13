-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-02-2023 a las 12:24:50
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `infobdn`
--
CREATE DATABASE IF NOT EXISTS `infobdn` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `infobdn`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `email` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`email`, `password`) VALUES
('vladadmin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnes`
--

CREATE TABLE `alumnes` (
  `dni` varchar(12) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `cognoms` varchar(20) NOT NULL,
  `edat` int(3) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `email` varchar(55) NOT NULL,
  `actiu` varchar(2) NOT NULL DEFAULT 'si',
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnes`
--

INSERT INTO `alumnes` (`dni`, `nom`, `cognoms`, `edat`, `foto`, `email`, `actiu`, `password`) VALUES
('A11111111', 'Daniel', 'Garcia', 18, 'img/D11111111.png', 'daniel@gmail.com', 'si', '827ccb0eea8a706c4c34a16891f84e7b'),
('B11111111', 'Marc', 'Garcia', 21, 'img/D11111111.png', 'marc@gmail.com', 'si', '827ccb0eea8a706c4c34a16891f84e7b'),
('C11111111', 'Pau', 'Garcia', 25, 'img/D11111111.png', 'pau@gmail.com', 'si', '827ccb0eea8a706c4c34a16891f84e7b'),
('D11111111', 'Vladyslav', 'Pasichnyk', 19, 'img/D11111111.png', 'vlad@gmail.com', 'si', '827ccb0eea8a706c4c34a16891f84e7b'),
('X11111111', 'Pep', 'Garcia', 20, 'img/D11111111.png', 'pep@gmail.com', 'si', '827ccb0eea8a706c4c34a16891f84e7b'),
('Y1234567O', 'Prova', 'Prova', 44, 'img/Y1234567O.png', 'prova@gmail.com', 'si', '827ccb0eea8a706c4c34a16891f84e7b'),
('Y1234567Y', 'Vladyslav', 'Prova', 6, 'img/Y1234567Y.jpg', 'vladprova@gmail.com', 'si', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `codi` int(3) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `descripcio` varchar(800) NOT NULL,
  `horresDurara` int(3) NOT NULL,
  `dataInici` date NOT NULL,
  `dataFinal` date NOT NULL,
  `dniProf` varchar(12) NOT NULL,
  `actiu` varchar(2) NOT NULL DEFAULT 'si',
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`codi`, `nom`, `descripcio`, `horresDurara`, `dataInici`, `dataFinal`, `dniProf`, `actiu`, `foto`) VALUES
(1, 'DAW2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id arcu fringilla, pretium libero ac, fringilla est. Vestibulum ante ipsum primis in faucibus orci luctus.', 1000, '2023-04-13', '2022-09-14', '12345678x', 'si', 'img/1.png'),
(2, 'DAW', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id arcu fringilla, pretium libero ac, fringilla est. Vestibulum ante ipsum primis in faucibus orci luctus. ', 2000, '2023-03-03', '2023-01-28', '12345678x', 'si', 'img/2.svg'),
(3, 'SMX', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id arcu fringilla, pretium libero ac, fringilla est. Vestibulum ante ipsum primis in faucibus orci luctus.', 2000, '2023-02-24', '2023-12-01', '12345678x', 'si', 'img/3.svg'),
(4, 'SMX2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id arcu fringilla, pretium libero ac, fringilla est. Vestibulum ante ipsum primis in faucibus orci luctus.', 2000, '2023-03-10', '2024-03-31', '88888888C', 'si', 'img/4.svg'),
(5, 'SO', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id arcu fringilla, pretium libero ac, fringilla est. Vestibulum ante ipsum primis in faucibus orci luctus.', 500, '2023-02-16', '2023-06-22', '12345678x', 'si', 'img/5.png'),
(6, 'Java', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id arcu fringilla, pretium libero ac, fringilla est. Vestibulum ante ipsum primis in faucibus orci luctus.', 200, '2023-03-07', '2023-03-30', '44444444f', 'si', 'img/6.svg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `dniAlum` varchar(12) NOT NULL,
  `codiCurs` int(3) NOT NULL,
  `nota` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`dniAlum`, `codiCurs`, `nota`) VALUES
('A11111111', 1, 8),
('A11111111', 3, 4),
('B11111111', 1, 5),
('B11111111', 3, 3),
('C11111111', 1, 2),
('C11111111', 3, 0),
('D11111111', 1, 0),
('D11111111', 2, 0),
('D11111111', 3, 0),
('D11111111', 6, 0),
('X11111111', 1, 5),
('X11111111', 3, 0),
('Y1234567O', 1, 0),
('Y1234567O', 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `professor`
--

CREATE TABLE `professor` (
  `dni` varchar(12) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `cognoms` varchar(20) NOT NULL,
  `edat` int(2) NOT NULL DEFAULT 30,
  `titolAcademic` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `email` varchar(55) NOT NULL,
  `actiu` varchar(2) NOT NULL DEFAULT 'si',
  `password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `professor`
--

INSERT INTO `professor` (`dni`, `nom`, `cognoms`, `edat`, `titolAcademic`, `foto`, `email`, `actiu`, `password`) VALUES
('12345678x', 'Pep', 'Garcia', 22, 'DAW', 'img/12345678x.jpg', 'pepi@gmail.com', 'si', '827ccb0eea8a706c4c34a16891f84e7b'),
('44444444f', 'Marcos', 'Cobos', 25, 'DAW', 'img/44444444f.jpg', 'marcoscobos@gmail.com', 'si', '827ccb0eea8a706c4c34a16891f84e7b'),
('88888888C', 'Noah', 'Carmona', 22, 'DAW', 'img/88888888C.jpeg', 'noahcarmona@gmail.com', 'no', '827ccb0eea8a706c4c34a16891f84e7b'),
('X1234567X', 'Manuel', 'Cordoba', 25, 'DAW', 'img/X1234567X.webp', 'manuelcardoba@gmail.com', 'si', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD UNIQUE KEY `Mail` (`email`);

--
-- Indices de la tabla `alumnes`
--
ALTER TABLE `alumnes`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `Mail` (`email`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`codi`),
  ADD KEY `DNI_prof` (`dniProf`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`dniAlum`,`codiCurs`),
  ADD KEY `Codi_curs` (`codiCurs`);

--
-- Indices de la tabla `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `mail` (`email`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`dniProf`) REFERENCES `professor` (`DNI`) ON DELETE CASCADE;

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`codiCurs`) REFERENCES `cursos` (`Codi`) ON DELETE CASCADE,
  ADD CONSTRAINT `matricula_ibfk_3` FOREIGN KEY (`dniAlum`) REFERENCES `alumnes` (`DNI`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
