-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-03-2017 a las 16:42:53
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `holigames`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE `aulas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `temario` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`id`, `nombre`, `descripcion`, `temario`) VALUES
(1, 'informatica', 'en este aula se aprenderan los conceptos fundamentales para controlar un ordenador', 'windows'),
(2, 'primero d', 'en este aula se aprenderan los diferentes conceptos sobre matematicas', 'matematicas'),
(3, 'tercero g', 'en este aula se aprenderan sobre los diferentes conceptos de lengua', 'lengua'),
(4, 'ingles', 'en este aula se aprendera una introduccion al vocabulario en ingles', 'ingles'),
(5, 'historia', 'se aprendera la introduccion a la historia de españa', 'historia'),
(6, 'geografia', 'se aprendera una introduccion a la geografia de españa', 'geografia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas_usuarios_juegos`
--

CREATE TABLE `aulas_usuarios_juegos` (
  `id` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_juego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `aulas_usuarios_juegos`
--

INSERT INTO `aulas_usuarios_juegos` (`id`, `id_aula`, `id_usuario`, `id_juego`) VALUES
(1, 1, 2, 1),
(2, 1, 2, 2),
(3, 1, 5, 1),
(4, 1, 6, 2),
(5, 2, 7, 1),
(6, 2, 8, 2),
(7, 2, 9, 1),
(8, 2, 10, 2),
(9, 3, 3, 1),
(10, 3, 4, 2),
(11, 3, 5, 1),
(12, 3, 6, 2),
(13, 4, 7, 1),
(14, 4, 8, 2),
(15, 4, 9, 1),
(16, 4, 10, 2),
(17, 5, 3, 1),
(18, 5, 4, 2),
(19, 5, 5, 1),
(20, 5, 6, 2),
(21, 6, 7, 1),
(22, 6, 8, 2),
(23, 6, 9, 1),
(24, 6, 10, 2),
(25, 1, 1, 1),
(26, 2, 1, 0),
(27, 3, 1, 0),
(28, 4, 2, 0),
(29, 5, 2, 0),
(30, 6, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `id_tipo_juego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `titulo`, `descripcion`, `id_tipo_juego`) VALUES
(1, 'ingles', 'sopa de letras destinada a encontrar vocabulario en ingles', 1),
(2, 'historia', 'serie de preguntas sobre la historia de españa destinado a que los niños puedan aprender mejor en tema impartido en clase', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sopadeletras`
--

CREATE TABLE `sopadeletras` (
  `id` int(11) NOT NULL,
  `palabras` text NOT NULL,
  `filas` int(11) NOT NULL,
  `columnas` int(11) NOT NULL,
  `id_juego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_juego`
--

CREATE TABLE `tipo_juego` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_juego`
--

INSERT INTO `tipo_juego` (`id`, `nombre`) VALUES
(1, 'sopa de letras'),
(2, 'Quizz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `nombre`) VALUES
(1, 'administrador'),
(2, 'maestro'),
(3, 'alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_usuario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` int(11) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `nombre_usuario`, `contrasena`, `email`, `id_tipo_usuario`) VALUES
(1, 'pedro', 'mendez', 'kiko', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 2),
(2, 'juan diego', 'menacho', 'jdmg', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 2),
(3, 'alberto', 'gonzalez', 'alberto', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 3),
(4, 'davod', 'mendez', 'david', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 3),
(5, 'jose', 'jimenez', 'jose', '1234', 0, 3),
(6, 'pipon', 'casillas', 'kiko', '1234', 0, 3),
(7, 'lucas', 'modric', 'modric', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 3),
(8, 'zidane', 'zidane', 'zidane', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 3),
(9, 'sergio', 'ramos', 'ramos', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 3),
(10, 'sergio', 'carvajal', 'carvajal', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aulas_usuarios_juegos`
--
ALTER TABLE `aulas_usuarios_juegos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sopadeletras`
--
ALTER TABLE `sopadeletras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_juego`
--
ALTER TABLE `tipo_juego`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `aulas_usuarios_juegos`
--
ALTER TABLE `aulas_usuarios_juegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sopadeletras`
--
ALTER TABLE `sopadeletras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_juego`
--
ALTER TABLE `tipo_juego`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
