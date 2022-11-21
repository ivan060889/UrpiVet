-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2022 a las 16:24:22
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id_actividad` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `fecha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `id_caja` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_inventario` int(11) NOT NULL,
  `precio` varchar(50) NOT NULL,
  `cantidad` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `fecha_registro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE `calendario` (
  `id` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `id_cita` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `color` varchar(20) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `fecha_cita` varchar(50) NOT NULL,
  `hora_cita` varchar(50) NOT NULL,
  `doctor` int(11) NOT NULL,
  `motivo` text NOT NULL,
  `fecha_registro` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id_configuracion` int(11) NOT NULL,
  `marca` varchar(200) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `favicon` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `color` varchar(200) NOT NULL,
  `color_manager` varchar(50) NOT NULL,
  `color_user` varchar(50) NOT NULL,
  `pie_pagina` text NOT NULL,
  `telefono` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id_configuracion`, `marca`, `titulo`, `favicon`, `logo`, `color`, `color_manager`, `color_user`, `pie_pagina`, `telefono`) VALUES
(1, 'System Pets', 'System Pets - Tu veterinaria online', 'Favicon_14aeb66d406e00059c59091ee21029dc.png', 'Logo_5665e4e73a8f847b7427c790f7a3bc00.png', 'bg-theme2', 'bg-theme6', 'bg-theme4', '©Copyright 2022 ECONOMIC Todos los derechos reservados.', '573004055563');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `id_doctor` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `internamientos`
--

CREATE TABLE `internamientos` (
  `id_internamiento` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `fecha_entrada` varchar(50) NOT NULL,
  `fecha_salida` varchar(50) NOT NULL,
  `medicinas_aplicadas` text NOT NULL,
  `motivo` text NOT NULL,
  `antecedentes` text NOT NULL,
  `tratamiento` text NOT NULL,
  `fecha_registro` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `internamientos`
--

INSERT INTO `internamientos` (`id_internamiento`, `id_mascota`, `fecha_entrada`, `fecha_salida`, `medicinas_aplicadas`, `motivo`, `antecedentes`, `tratamiento`, `fecha_registro`, `estado`) VALUES
(1, 12, '2022-03-10', '2022-03-14', '...', '....', '...', 'jjjj', '2022-03-14', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_inventario` int(11) NOT NULL,
  `nombre_articulo` varchar(200) NOT NULL,
  `detalle_articulo` text NOT NULL,
  `numero_factura` varchar(100) NOT NULL,
  `fecha_ingreso` varchar(50) NOT NULL,
  `proveedor` varchar(200) NOT NULL,
  `cantidad_sugerida` varchar(50) NOT NULL,
  `stock` varchar(50) NOT NULL,
  `precio_unitario` varchar(50) NOT NULL,
  `precio_sugerido` varchar(50) NOT NULL,
  `fecha_vencimiento` varchar(50) NOT NULL,
  `codigo_barras` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_img`
--

CREATE TABLE `inventario_img` (
  `id_imagen` int(11) NOT NULL,
  `id_inventario` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `id_mascota` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `fecha_nacimiento` varchar(50) NOT NULL,
  `edad` varchar(50) NOT NULL,
  `raza` varchar(150) NOT NULL,
  `especie` varchar(150) NOT NULL,
  `color` varchar(150) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `peso` varchar(50) NOT NULL,
  `tipo_peso` varchar(50) NOT NULL,
  `fecha_registro` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas_img`
--

CREATE TABLE `mascotas_img` (
  `id_imagen` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitoreo`
--

CREATE TABLE `monitoreo` (
  `id_monitoreo` int(11) NOT NULL,
  `dominio` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `monitoreo`
--

INSERT INTO `monitoreo` (`id_monitoreo`, `dominio`) VALUES
(1, 'http://localhost/veterinaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `ciudad` varchar(150) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `clave` varchar(150) NOT NULL,
  `ultima_conexion` varchar(50) NOT NULL,
  `fecha_registro` varchar(50) NOT NULL,
  `ip` varchar(150) NOT NULL,
  `estado` int(11) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `ciudad`, `correo`, `telefono`, `clave`, `ultima_conexion`, `fecha_registro`, `ip`, `estado`, `rol`) VALUES
(1, 'admin', 'admins', 'Canada', 'admin@gmail.com', '+1 234 78 90 00', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-03-24 10:19:26', '2022-03-20 00:00:00', '::1', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total` varchar(50) NOT NULL,
  `fecha_registro` varchar(50) NOT NULL,
  `cod` varchar(200) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_usuario`, `total`, `fecha_registro`, `cod`, `estado`) VALUES
(1, 0, '0', '0', '0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalle`
--

CREATE TABLE `ventas_detalle` (
  `id_venta_detalle` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_inventario` int(11) NOT NULL,
  `precio` varchar(50) NOT NULL,
  `cantidad` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `fecha_registro` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `id_visita` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `motivo` text NOT NULL,
  `peso` varchar(50) NOT NULL,
  `tipo_peso` varchar(50) NOT NULL,
  `temperatura` varchar(50) NOT NULL,
  `sintomas` text NOT NULL,
  `diagnostico` text NOT NULL,
  `medicinas_aplicadas` text NOT NULL,
  `visita_proxima` varchar(50) NOT NULL,
  `motivo_proximo` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas_img`
--

CREATE TABLE `visitas_img` (
  `id_imagen` int(11) NOT NULL,
  `id_visita` int(11) NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `tipo_archivo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id_actividad`);

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`id_caja`);

--
-- Indices de la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id_configuracion`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id_doctor`);

--
-- Indices de la tabla `internamientos`
--
ALTER TABLE `internamientos`
  ADD PRIMARY KEY (`id_internamiento`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_inventario`);

--
-- Indices de la tabla `inventario_img`
--
ALTER TABLE `inventario_img`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id_mascota`);

--
-- Indices de la tabla `mascotas_img`
--
ALTER TABLE `mascotas_img`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `monitoreo`
--
ALTER TABLE `monitoreo`
  ADD PRIMARY KEY (`id_monitoreo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- Indices de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD PRIMARY KEY (`id_venta_detalle`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id_visita`);

--
-- Indices de la tabla `visitas_img`
--
ALTER TABLE `visitas_img`
  ADD PRIMARY KEY (`id_imagen`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `id_caja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calendario`
--
ALTER TABLE `calendario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id_configuracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id_doctor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `internamientos`
--
ALTER TABLE `internamientos`
  MODIFY `id_internamiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_img`
--
ALTER TABLE `inventario_img`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascotas_img`
--
ALTER TABLE `mascotas_img`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `monitoreo`
--
ALTER TABLE `monitoreo`
  MODIFY `id_monitoreo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  MODIFY `id_venta_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id_visita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `visitas_img`
--
ALTER TABLE `visitas_img`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
