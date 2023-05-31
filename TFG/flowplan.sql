-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2023 a las 16:23:52
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `flowplan`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `task`
--

CREATE TABLE `task` (
  `id_task` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `fecha_inicio` date NOT NULL DEFAULT current_timestamp(),
  `fecha_fin` date NOT NULL,
  `completado` tinyint(1) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `task`
--

INSERT INTO `task` (`id_task`, `id_user`, `nombre`, `descripcion`, `fecha_inicio`, `fecha_fin`, `completado`, `tipo`) VALUES
(38, 1, 'coche', 'Lavar el coche.', '2023-05-30', '2023-05-31', 1, 'otro'),
(39, 1, 'huevos', 'comprar', '2023-05-31', '2023-05-31', 1, 'cocina'),
(40, 1, 'test', 'Realizar un examen para evaluar conocimientos o habilidades.', '2023-06-03', '2023-06-04', 1, 'otro'),
(41, 1, '31', 'Realizar una tarea en el día 31 del mes.', '2023-05-31', '2023-05-31', 1, 'otro'),
(42, 1, 'activa', 'Realiza la tarea de forma inmediata y con energía.', '2023-05-31', '2023-06-02', 1, 'otro'),
(46, 1, '&gt;:(', 'Tarea frustrante.', '2023-05-31', '2023-06-02', 1, 'otro'),
(49, 1, 'borrar', 'Eliminar o suprimir información, archivos o elementos de un documento o dispositivo.', '2023-05-31', '2023-06-02', 1, 'otro'),
(50, 1, 'ghfghfgh', 'Lo siento, no puedo crear una descripción para una tarea que no tiene sentido o información. Por favor, proporcione más detalles.', '2023-05-31', '2023-05-31', 1, 'otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nickname` varchar(25) NOT NULL,
  `name` varchar(30) NOT NULL,
  `subname` varchar(60) NOT NULL,
  `passwd` varchar(200) NOT NULL,
  `mail` varchar(500) NOT NULL,
  `plan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `nickname`, `name`, `subname`, `passwd`, `mail`, `plan`) VALUES
(1, 'root', 'joaquín', 'erenas', 'root1234', 'joaquinerenas23@gmail.com', NULL),
(2, 'joakin123', 'joakin', 'erenas', 'joakin123', 'joakin@gmail.com', NULL),
(3, 'joakin123', 'joakin', 'erenas', 'joakin123', 'joakin@gmail.com', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id_task`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `task`
--
ALTER TABLE `task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
