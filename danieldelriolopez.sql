-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-02-2020 a las 20:34:29
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `DDR_danieldelriolopez`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id_enunciado` int(11) NOT NULL,
  `enunciado` text NOT NULL,
  `respuesta_a` varchar(100) NOT NULL,
  `respuesta_b` varchar(100) NOT NULL,
  `respuesta_c` varchar(100) NOT NULL,
  `respuesta_d` varchar(100) NOT NULL,
  `valida` int(11) NOT NULL,
  `correctas` int(11) NOT NULL,
  `incorrectas` int(11) NOT NULL,
  `etiquetas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id_enunciado`, `enunciado`, `respuesta_a`, `respuesta_b`, `respuesta_c`, `respuesta_d`, `valida`, `correctas`, `incorrectas`, `etiquetas`) VALUES
(2, 'En el ciclo de vida normal de los datos la evaluación PRECEDE a', 'La generación de datos', 'La síntesis de datos', 'Todas las demás operaciones salvo la introducción, generación o captura de datos', 'Cualquier otra operación', 3, 0, 1, ''),
(3, 'Una clave primaria corresponde a una columna de una tabla donde es seguro que no se repite ningún valor y por lo tanto, el valor de la columna en cada una de las filas identifica sin ambigüedad a esa fila', 'Verdadero', 'Falso', '', '', 1, 0, 0, ''),
(4, 'En una base de datos relacional, un registro corresponde a', 'Una tabla de la base de datos', 'Una celda en una tabla', 'Una columna en una tabla', 'Una fila en una tabla', 4, 0, 0, ''),
(6, 'Si queremos modificar el valor de una celda o más de una fila de una tabla, necesitamos usar el operador del estándar SQL', 'CELL', 'UPDATE', 'MODIFY', 'CHANGE', 2, 0, 2, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id_enunciado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id_enunciado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
