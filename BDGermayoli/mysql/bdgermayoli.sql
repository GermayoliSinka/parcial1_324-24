-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2024 a las 12:17:29
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdgermayoli`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `id_distrito` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`id_distrito`, `nombre`) VALUES
(1, 'Distrito 1'),
(2, 'Distrito 2'),
(3, 'Distrito 3'),
(4, 'La Paz'),
(5, 'El Alto'),
(6, 'Achocalla'),
(7, 'Laja'),
(8, 'Viacha'),
(9, 'La Paz'),
(10, 'El Alto'),
(11, 'Achocalla'),
(12, 'Laja'),
(13, 'Viacha');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad`
--

CREATE TABLE `propiedad` (
  `cod_catastro` int(11) NOT NULL,
  `id_zona` varchar(10) DEFAULT NULL,
  `x_inicial` decimal(10,6) NOT NULL,
  `y_inicial` decimal(10,6) NOT NULL,
  `x_final` decimal(10,6) NOT NULL,
  `y_final` decimal(10,6) NOT NULL,
  `superficie` decimal(10,3) NOT NULL,
  `ci_propietario` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `propiedad`
--

INSERT INTO `propiedad` (`cod_catastro`, `id_zona`, `x_inicial`, `y_inicial`, `x_final`, `y_final`, `superficie`, `ci_propietario`) VALUES
(0, 'z1', 33.000000, 4.000000, 4.000000, 5.000000, 5.000, '3456789'),
(1, 'z1', 576.000000, 9999.999999, 10.000000, 10.000000, 17868.000, '1234567'),
(2, 'z2', 20.000000, 20.000000, 65.000000, 65.000000, 677777.000, '2345678'),
(3, 'z3', 40.000000, 40.000000, 50.000000, 50.000000, 200.000, '3456789'),
(30090, 'z1', 32.000000, 34.000000, 34.000000, 34.000000, 34.000, '34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ci` varchar(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `paterno` varchar(50) NOT NULL,
  `materno` varchar(50) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(15) NOT NULL,
  `id_zona` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ci`, `nombre`, `paterno`, `materno`, `celular`, `email`, `password`, `rol`, `id_zona`) VALUES
('1234567', 'Juan', 'Perez', 'Garcia', '76543210', 'juan.perez@gmail.com', 'usuario1', 'usuario', 'z1'),
('12890007', 'Juan', 'Pérez', 'González', '123456789', 'juan.perez12@gmail.com', 'password1', 'administrador', 'Z01'),
('13009786', 'Juan', 'Perez', 'Garcia', '76543210', 'juan.perez23@gmail.com', 'funcionario1', 'funcionario', 'z2'),
('23045678', 'Ana', 'López', 'Martínez', '987654321', 'ana.lopez1@egmail.com', 'password2', 'usuario', 'Z02'),
('2345678', 'Maria', 'Lopez', 'Rodriguez', '76543211', 'maria.lopez@gmail.com', 'e6b78617985d7fb806699b4a966e46dd', 'funcionario', NULL),
('34', 'fff', 'f', 'ff', '434', 'sink@h', 'fffg', 'usuario', 'z1'),
('34567809', 'Luis', 'García', NULL, '4567891923', 'luis.garcia12@gmail.com', 'password3', 'usuario', 'Z01'),
('3456789', 'Carlos', 'Gomez', 'Fernandez', '76543212', 'carlos.gomez@gmail.com', '2fb6c8d2f3842a5ceaa9bf320e649ff0', 'usuario', NULL),
('45657', '333', '777', '333', '2323', '66@j', '123', 'usuario', 'z1'),
('45670890', 'María', 'Sánchez', 'Rivas', '3216584987', 'maria.sanchez12@gmail.com', 'password4', 'usuario', 'Z03'),
('5555', 'mn', 'fgre', 'mnm', '435', 'ff@pppp', '1234', 'usuario', 'z4'),
('56780901', 'Carlos', 'Fernández', 'Hernández', '6543201789', 'carlos.fernandez2@gmail.com', 'password5', 'usuario', 'Z04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `id_zona` varchar(10) NOT NULL,
  `nombre_zona` varchar(100) NOT NULL,
  `id_distrito` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`id_zona`, `nombre_zona`, `id_distrito`) VALUES
('Z01', 'Zona Central', 1),
('Z02', 'Zona Sur', 1),
('Z03', 'Zona Norte', 1),
('Z04', 'Zona 12 de Octubre', 2),
('Z05', 'Zona Villa Dolores', 2),
('Z06', 'Zona La Calancha', 3),
('z1', 'San Pedro', 1),
('z2', 'San Jorge', 2),
('z3', 'Villa Fátima', 1),
('z4', 'Sopocachi Alto', 3),
('z5', 'Achumani', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`id_distrito`);

--
-- Indices de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  ADD PRIMARY KEY (`cod_catastro`),
  ADD KEY `id_zona` (`id_zona`),
  ADD KEY `ci_propietario` (`ci_propietario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ci`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_zona` (`id_zona`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`id_zona`),
  ADD KEY `id_distrito` (`id_distrito`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `id_distrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `propiedad`
--
ALTER TABLE `propiedad`
  ADD CONSTRAINT `propiedad_ibfk_1` FOREIGN KEY (`id_zona`) REFERENCES `zona` (`id_zona`),
  ADD CONSTRAINT `propiedad_ibfk_2` FOREIGN KEY (`ci_propietario`) REFERENCES `usuario` (`ci`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_zona`) REFERENCES `zona` (`id_zona`);

--
-- Filtros para la tabla `zona`
--
ALTER TABLE `zona`
  ADD CONSTRAINT `zona_ibfk_1` FOREIGN KEY (`id_distrito`) REFERENCES `distrito` (`id_distrito`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
