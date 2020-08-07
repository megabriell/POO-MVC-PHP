-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 07-08-2020 a las 04:47:48
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `punto_venta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pv_cargo`
--

CREATE TABLE `pv_cargo` (
  `Id_Cargo` int(10) NOT NULL COMMENT 'Codigo de Cargo Para Empledos',
  `Descripcion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del cargo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pv_cargo`
--

INSERT INTO `pv_cargo` (`Id_Cargo`, `Descripcion`) VALUES
(1, 'Desarrollador'),
(2, 'Vendedor'),
(3, 'Logística ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pv_config_usuario`
--

CREATE TABLE `pv_config_usuario` (
  `Id_Config_Usuario` int(5) NOT NULL COMMENT 'Codigo de Configuracion',
  `Id_Usuario` int(5) NOT NULL,
  `Img_Perfil` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la imagen de perfil',
  `Img_Portada` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la imagen de portada',
  `Estado` tinyint(2) NOT NULL COMMENT 'Estado de chat'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pv_config_usuario`
--

INSERT INTO `pv_config_usuario` (`Id_Config_Usuario`, `Id_Usuario`, `Img_Perfil`, `Img_Portada`, `Estado`) VALUES
(1, 1, '4_20181211_103452_14', '4_20181211_103202_14', 0),
(2, 2, '2_20180502_112844_2', '', 0),
(3, 3, '5_20181107_145119_3', '5_20181107_145039_3', 1),
(4, 4, '3_20180502_113544_4 	', '', 0),
(5, 5, '', '', 0),
(6, 6, '', '', 0),
(7, 7, '', '', 0),
(8, 8, '', '', 0),
(9, 9, '', '', 0),
(10, 10, '', '', 0),
(11, 11, '', '', 0),
(12, 12, '', '', 0),
(13, 13, '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pv_documento`
--

CREATE TABLE `pv_documento` (
  `Id_Documento` int(10) NOT NULL COMMENT 'Id del banco',
  `Descripcion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de banco'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pv_documento`
--

INSERT INTO `pv_documento` (`Id_Documento`, `Descripcion`) VALUES
(1, 'N/A'),
(2, 'RETENCION'),
(3, 'NOTA DE CREDITO'),
(4, 'BAM'),
(5, 'INTERBANCO'),
(6, 'NOTA DE DEBITO'),
(7, 'NOTA DE CREDITO CONTABILIDAD'),
(8, 'DESCUENTO'),
(9, 'TRANSFERENCIA - BAM'),
(10, 'TRANSFERENCIA - INTER'),
(11, 'VISACUOTA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pv_empleado`
--

CREATE TABLE `pv_empleado` (
  `Id_Empleado` int(10) NOT NULL COMMENT 'Codigo de Empleado',
  `Nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del Empleado',
  `Apellido` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Apellido del Empleado',
  `Telefono` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Telefono de Contacto',
  `Correo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Correo de Contacto',
  `Id_Cargo` int(10) NOT NULL COMMENT 'Id del Cargo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pv_empleado`
--

INSERT INTO `pv_empleado` (`Id_Empleado`, `Nombre`, `Apellido`, `Telefono`, `Correo`, `Id_Cargo`) VALUES
(1, 'Melinda', 'Santana', '(502) 0000-0000', 'info@gmail.com', 2),
(2, 'Fritz', 'Thomas', '(502) 0000-0000', 'fritz@gmail.com', 2),
(3, 'Violet', 'Wright', '(502) 0000-0000', 'violet@agmail.com', 2),
(4, 'Manuel', 'Gabriel', '(502) 0000-0000', 'gabriel@hotmail.com', 1),
(5, 'Beverly', 'Stevenson', '(502) 0000-0000', 'beverly@gmail.com', 1),
(6, 'Philip', 'Wooten', '(502) 0000-0000', 'wooten@gmail.com', 1),
(7, 'Jelani', 'Richard', '(502) 0000-0000', 'richard@gmail.com', 2),
(8, 'Ebony', 'Gates', '(502) 0000-0000', 'gates@gmail.com', 2),
(9, 'Ignatius', 'Houston', '(502) 0000-0000', 'houston@gmail.com', 3),
(10, 'Ryan', 'Kemp', '(502) 0000-0000', 'ryan@gmail.com', 2),
(11, 'Lucas', 'Summers', '(502) 0000-0000', 'summers@gmail.com', 2),
(12, 'Colorado', 'Stafford', '(502) 3215-5555', 'stafford@gmail.com', 2),
(13, 'Lucas', 'Sánchez', '(502) 0000-0000', 'lucas@gmail.com', 2),
(38, 'Elias', 'Lopez', '(502) 0000-0000', 'manuel@gmail.com', 1),
(40, 'Sdfsdfsdf', 'Sdfsdfsd', '(502) 1234-5678', 'sdfds@asdas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pv_empresa`
--

CREATE TABLE `pv_empresa` (
  `Id_Empresa` int(4) NOT NULL COMMENT 'Id del perfil de la empresa',
  `Nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la empresa',
  `Direccion` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Direccion de la empresa',
  `NIT` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Numero de Identificacion Tributaria',
  `Logo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre y ruta de imagen del logo',
  `Logo2` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL COMMENT 'Logo para responsive y dispositivos',
  `Activo` tinyint(1) NOT NULL COMMENT 'Id de empresa predeterminado',
  `Id_Numeracion` int(2) NOT NULL COMMENT 'Numeracion de Factura extendida'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pv_empresa`
--

INSERT INTO `pv_empresa` (`Id_Empresa`, `Nombre`, `Direccion`, `NIT`, `Logo`, `Logo2`, `Activo`, `Id_Numeracion`) VALUES
(1, 'WELMASTER', '40calle 6-12 Zona 10', '1020304-0', '2.png', '1.png', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pv_menu_sitio`
--

CREATE TABLE `pv_menu_sitio` (
  `Id_Menu_Sitio` int(10) NOT NULL COMMENT 'Codigo de menu del sitio web',
  `Descripcion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de Menu del Sitio Web',
  `Icono` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Icono de menu',
  `Posicion` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pv_menu_sitio`
--

INSERT INTO `pv_menu_sitio` (`Id_Menu_Sitio`, `Descripcion`, `Icono`, `Posicion`) VALUES
(1, 'Acceso', 'fa-users', 2),
(3, 'Factura', 'fa-clone', 3),
(5, 'Sistema', ' fa-cog', 15),
(6, 'Productos', 'fa-tag', 5),
(7, 'Pagos', 'fa-money', 4),
(8, 'Clientes', 'fa-suitcase', 3),
(12, 'Reportes', 'fa-line-chart', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pv_notificacion`
--

CREATE TABLE `pv_notificacion` (
  `Id_Notificacion` int(11) NOT NULL,
  `Id_Destino` int(4) NOT NULL COMMENT 'Id Empleado',
  `Id_Autor` int(4) NOT NULL COMMENT 'Id Usuario',
  `Mensaje` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` datetime NOT NULL,
  `Estado` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pv_notificacion`
--

INSERT INTO `pv_notificacion` (`Id_Notificacion`, `Id_Destino`, `Id_Autor`, `Mensaje`, `Fecha`, `Estado`) VALUES
(1, 10, 4, 'Ha agregado un nuevo dato', '2018-03-23 10:42:57', 2),
(2, 4, 4, 'Ha agregado un nuevo dato', '2018-03-23 10:42:57', 2),
(3, 10, 4, 'Ha agregado un nuevo dato', '2018-03-23 10:50:55', 2),
(4, 4, 4, 'Ha agregado un nuevo dato', '2018-03-23 10:50:55', 2),
(5, 10, 4, 'Ha agregado un nuevo dato', '2018-03-23 10:54:51', 2),
(6, 4, 4, 'Ha agregado un nuevo dato', '2018-03-23 10:54:51', 2),
(7, 10, 4, 'Ha agregado un nuevo dato', '2018-03-23 11:03:15', 2),
(8, 4, 4, 'Ha agregado un nuevo dato', '2018-03-23 11:03:15', 2),
(9, 10, 2, 'Ha agregado un nuevo dato', '2018-03-23 11:36:54', 2),
(10, 4, 2, 'Ha agregado un nuevo dato', '2018-03-23 11:36:54', 2),
(11, 10, 2, 'Ha agregado un nuevo dato', '2018-03-23 12:25:50', 2),
(12, 4, 2, 'Ha agregado un nuevo dato', '2018-03-23 12:25:50', 2),
(13, 10, 2, 'Ha agregado un nuevo dato', '2018-03-23 12:37:14', 2),
(14, 4, 2, 'Ha agregado un nuevo dato', '2018-03-23 12:37:14', 2),
(15, 10, 2, 'Ha agregado un nuevo dato', '2018-03-23 13:17:42', 2),
(16, 4, 2, 'Ha agregado un nuevo dato', '2018-03-23 13:17:42', 2),
(17, 10, 2, 'Ha agregado un nuevo dato', '2018-03-26 11:57:54', 2),
(18, 4, 2, 'Ha agregado un nuevo dato', '2018-03-26 11:57:54', 2),
(19, 10, 2, 'Ha agregado un nuevo dato', '2018-03-26 12:15:38', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pv_pagina`
--

CREATE TABLE `pv_pagina` (
  `Id_Pagina` int(10) NOT NULL COMMENT 'Id de pagina del sitio',
  `Id_Menu_Sitio` int(10) NOT NULL COMMENT 'Id del menu a que pertenece',
  `Descripcion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la pagina',
  `Contenido` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripción de la pagina',
  `href` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Ruta del archivo',
  `Nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del archivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pv_pagina`
--

INSERT INTO `pv_pagina` (`Id_Pagina`, `Id_Menu_Sitio`, `Descripcion`, `Contenido`, `href`, `Nombre`) VALUES
(1, 1, 'Usuarios', 'Registro y mantenimiento de usuarios', '../../', 'user'),
(2, 1, 'Historial', '', '../../', 'historial'),
(3, 1, 'Cargos', '', '../../', 'cargo'),
(5, 3, 'Nueva', '', '../../', 'nueva'),
(6, 5, 'Configuraciones', '', '../../', 'sistema'),
(9, 6, 'Modelos', '', '../../', 'lista'),
(10, 6, 'Marcas', '', '../../', 'marca'),
(11, 6, 'Tipos', '', '../../', 'tipo'),
(13, 7, 'Por Cuenta', '', '../../', 'pago'),
(14, 7, 'Documentos', '', '../../', 'documento'),
(15, 8, 'Cuenta', '', '../../', 'cuenta'),
(17, 8, 'Registro', '', '../../', 'cliente'),
(24, 12, 'Productos', '', '../../', 'generar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pv_permiso`
--

CREATE TABLE `pv_permiso` (
  `Id_Permiso` int(10) NOT NULL COMMENT 'Id del Permiso',
  `Id_Pagina` int(10) NOT NULL COMMENT 'Id de la pagina permitida',
  `Id_Usuario` int(10) NOT NULL COMMENT 'Id de usuario',
  `permisos` int(4) NOT NULL DEFAULT '0' COMMENT 'Ninguno/Ver/Editar/Eliminar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pv_permiso`
--

INSERT INTO `pv_permiso` (`Id_Permiso`, `Id_Pagina`, `Id_Usuario`, `permisos`) VALUES
(1, 1, 1, 0),
(2, 1, 2, 0),
(3, 1, 3, 0),
(4, 1, 4, 0),
(5, 1, 5, 0),
(7, 1, 7, 0),
(8, 1, 8, 0),
(9, 1, 9, 0),
(10, 1, 10, 0),
(11, 1, 11, 0),
(12, 1, 12, 0),
(13, 1, 13, 0),
(14, 1, 36, 0),
(19, 1, 6, 0),
(20, 24, 6, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pv_producto`
--

CREATE TABLE `pv_producto` (
  `Id_Producto` int(10) NOT NULL COMMENT 'Id del modelo de producto',
  `Id_Categoria` int(10) NOT NULL COMMENT 'Tipo de producto al que pertenece',
  `Id_Marca` int(10) NOT NULL COMMENT 'Marca de producto',
  `Descripcion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripcion del Modelo del Producto',
  `Precio` double NOT NULL COMMENT 'Precio del Producto',
  `Forma_Salida` int(2) NOT NULL COMMENT 'Forma de salida en venta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pv_producto_categoria`
--

CREATE TABLE `pv_producto_categoria` (
  `Id_Categoria` int(10) NOT NULL COMMENT 'Id del tipo de producto',
  `Descripcion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de tipo de producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pv_producto_marca`
--

CREATE TABLE `pv_producto_marca` (
  `Id_Marca` int(10) NOT NULL COMMENT 'ID de marca de producto',
  `Descripcion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la marca de producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pv_usuario`
--

CREATE TABLE `pv_usuario` (
  `Id_Usuario` int(10) NOT NULL COMMENT 'Codigo de Usuario',
  `Id_Empleado` int(10) NOT NULL COMMENT 'Codigo de Empleado',
  `Usuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de Usuario',
  `Correo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Correo de acceso (Unico)',
  `Contrasena` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pv_usuario`
--

INSERT INTO `pv_usuario` (`Id_Usuario`, `Id_Empleado`, `Usuario`, `Correo`, `Contrasena`) VALUES
(1, 4, 'MGABRIEL', 'manuel@dominio.com.gt', '$2y$10$4aIT.BLjAFekcGb4ulKWiedmPKQMl4eRZ6gvKEI2ZhUQRXkQppjzO'),
(2, 2, 'HECTOR', 'mattis.velit@asahi.com.gt', '$2y$10$4aIT.BLjAFekcGb4ulKWiedmPKQMl4eRZ6gvKEI2ZhUQRXkQppjzO'),
(3, 5, 'GEMMA', 'pellentesque.Sed@dominio.com.gt', '$2y$10$4aIT.BLjAFekcGb4ulKWiedmPKQMl4eRZ6gvKEI2ZhUQRXkQppjzO'),
(4, 3, 'ALANA', 'vel.est@dominio.com.gt', '$2y$10$4aIT.BLjAFekcGb4ulKWiedmPKQMl4eRZ6gvKEI2ZhUQRXkQppjzO'),
(5, 1, 'LUCIUS', 'posuere.cubilia@dominio.com.gt', '$2y$10$ZuKOG0uQYYycmulS53pNHeY4k7Ll.UzI9VBlDHYe1HNJ1gXUeon.C'),
(6, 10, 'ELIANA', 'arcu.Nunc@dominio.com.gt', '$2y$10$IpDGNg8L5kKE1832dLhjBOZGx5zrRrlB4ud5hOBAL7itFmwF1Y5kW'),
(7, 6, 'BAKER', 'nascetur.ridiculus@dominio.com.gt', '$2y$10$qMGU2FYstl0LincvXGZFBOZv14UQkZ38J3dAVxEV9mp8M0jAaaPE2'),
(8, 7, 'BRIELLE', 'habitant.@dominio.com.gt', '$2y$10$3MB3Qh2Wj1uLVLFzSnnrHeB8225PALfqhI72315IzsKJ/KB4/w9Na'),
(9, 9, 'MERCEDES', 'id.sapien.Cras@dominio.com.gt', '$2y$10$VthopgXBHwHSKPeAO/Hh8uuWFXc67B10rmvfAeWXc/Pq2Kmx39j.e'),
(10, 8, 'KIRBY', 'ante.dictum@dominio.com.gt', '$2y$10$.dRZevGVfXCYGT1dqrgNZei0dVs7yk1xGfgUCHwKsQPsfaaRQEvjK'),
(11, 11, 'KERMIT', 'tristique@dominio.com.gt', '$2y$10$uYl4kra4VnNujhWlwPEOxeiWydzXGg/U7XXXBq7GLW1B0izn6FV1i'),
(12, 12, 'JAMES', 'tristique1223@dominio.com.gt', '$2y$10$wYpLvYNNmqUn7VDq47FmqOIFqERSAwKuau/cc.LKIboV38JLuwZgK'),
(13, 13, 'ALLEN', 'diam@dominio.com.gt', '$2y$10$fegbXAwygMnAQc0ebe6vC.fa5GIEytZr8aDj/IyRkh72i0AqUe0fO'),
(36, 38, 'ELIAS', 'elias@dominio.com.gt', '$2y$10$3yhSWvogve98Mv5j0PjZMO54kYOLRgR3mOOdB12.wCid8s61mHYPC');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pv_cargo`
--
ALTER TABLE `pv_cargo`
  ADD PRIMARY KEY (`Id_Cargo`);

--
-- Indices de la tabla `pv_config_usuario`
--
ALTER TABLE `pv_config_usuario`
  ADD PRIMARY KEY (`Id_Config_Usuario`),
  ADD KEY `Id_Usuario` (`Id_Usuario`);

--
-- Indices de la tabla `pv_documento`
--
ALTER TABLE `pv_documento`
  ADD PRIMARY KEY (`Id_Documento`);

--
-- Indices de la tabla `pv_empleado`
--
ALTER TABLE `pv_empleado`
  ADD PRIMARY KEY (`Id_Empleado`),
  ADD KEY `Id_Cargo` (`Id_Cargo`);

--
-- Indices de la tabla `pv_empresa`
--
ALTER TABLE `pv_empresa`
  ADD PRIMARY KEY (`Id_Empresa`);

--
-- Indices de la tabla `pv_menu_sitio`
--
ALTER TABLE `pv_menu_sitio`
  ADD PRIMARY KEY (`Id_Menu_Sitio`);

--
-- Indices de la tabla `pv_notificacion`
--
ALTER TABLE `pv_notificacion`
  ADD PRIMARY KEY (`Id_Notificacion`);

--
-- Indices de la tabla `pv_pagina`
--
ALTER TABLE `pv_pagina`
  ADD PRIMARY KEY (`Id_Pagina`),
  ADD KEY `Id_Menu_Sitio` (`Id_Menu_Sitio`);

--
-- Indices de la tabla `pv_permiso`
--
ALTER TABLE `pv_permiso`
  ADD PRIMARY KEY (`Id_Permiso`),
  ADD KEY `Id_Pagina` (`Id_Pagina`),
  ADD KEY `Id_Privilegio` (`Id_Usuario`);

--
-- Indices de la tabla `pv_producto`
--
ALTER TABLE `pv_producto`
  ADD PRIMARY KEY (`Id_Producto`),
  ADD KEY `Id_Tipo` (`Id_Categoria`),
  ADD KEY `Id_Marca` (`Id_Marca`);

--
-- Indices de la tabla `pv_producto_categoria`
--
ALTER TABLE `pv_producto_categoria`
  ADD PRIMARY KEY (`Id_Categoria`);

--
-- Indices de la tabla `pv_producto_marca`
--
ALTER TABLE `pv_producto_marca`
  ADD PRIMARY KEY (`Id_Marca`);

--
-- Indices de la tabla `pv_usuario`
--
ALTER TABLE `pv_usuario`
  ADD PRIMARY KEY (`Id_Usuario`),
  ADD UNIQUE KEY `Correo` (`Correo`),
  ADD UNIQUE KEY `Id_Empleado_2` (`Id_Empleado`),
  ADD UNIQUE KEY `Usuario` (`Usuario`),
  ADD KEY `Id_Empleado` (`Id_Empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pv_cargo`
--
ALTER TABLE `pv_cargo`
  MODIFY `Id_Cargo` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de Cargo Para Empledos', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pv_config_usuario`
--
ALTER TABLE `pv_config_usuario`
  MODIFY `Id_Config_Usuario` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de Configuracion', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `pv_documento`
--
ALTER TABLE `pv_documento`
  MODIFY `Id_Documento` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Id del banco', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pv_empleado`
--
ALTER TABLE `pv_empleado`
  MODIFY `Id_Empleado` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de Empleado', AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `pv_empresa`
--
ALTER TABLE `pv_empresa`
  MODIFY `Id_Empresa` int(4) NOT NULL AUTO_INCREMENT COMMENT 'Id del perfil de la empresa', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pv_menu_sitio`
--
ALTER TABLE `pv_menu_sitio`
  MODIFY `Id_Menu_Sitio` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de menu del sitio web', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `pv_notificacion`
--
ALTER TABLE `pv_notificacion`
  MODIFY `Id_Notificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13424;

--
-- AUTO_INCREMENT de la tabla `pv_pagina`
--
ALTER TABLE `pv_pagina`
  MODIFY `Id_Pagina` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Id de pagina del sitio', AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `pv_permiso`
--
ALTER TABLE `pv_permiso`
  MODIFY `Id_Permiso` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Id del Permiso', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `pv_producto_categoria`
--
ALTER TABLE `pv_producto_categoria`
  MODIFY `Id_Categoria` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Id del tipo de producto';

--
-- AUTO_INCREMENT de la tabla `pv_producto_marca`
--
ALTER TABLE `pv_producto_marca`
  MODIFY `Id_Marca` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID de marca de producto', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `pv_usuario`
--
ALTER TABLE `pv_usuario`
  MODIFY `Id_Usuario` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de Usuario', AUTO_INCREMENT=39;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pv_config_usuario`
--
ALTER TABLE `pv_config_usuario`
  ADD CONSTRAINT `FK_config_usuario_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `pv_usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pv_empleado`
--
ALTER TABLE `pv_empleado`
  ADD CONSTRAINT `FK_empleado_1` FOREIGN KEY (`Id_Cargo`) REFERENCES `pv_cargo` (`Id_Cargo`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `pv_pagina`
--
ALTER TABLE `pv_pagina`
  ADD CONSTRAINT `FK_pagina_1` FOREIGN KEY (`Id_Menu_Sitio`) REFERENCES `pv_menu_sitio` (`Id_Menu_Sitio`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `pv_permiso`
--
ALTER TABLE `pv_permiso`
  ADD CONSTRAINT `FK_permiso_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `pv_usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_permiso_2` FOREIGN KEY (`Id_Pagina`) REFERENCES `pv_pagina` (`Id_Pagina`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pv_producto`
--
ALTER TABLE `pv_producto`
  ADD CONSTRAINT `FK_Producto_1` FOREIGN KEY (`Id_Marca`) REFERENCES `pv_producto_marca` (`Id_Marca`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_Producto_2` FOREIGN KEY (`Id_Categoria`) REFERENCES `pv_producto_categoria` (`Id_Categoria`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `pv_usuario`
--
ALTER TABLE `pv_usuario`
  ADD CONSTRAINT `FK_usuario_1` FOREIGN KEY (`Id_Empleado`) REFERENCES `pv_empleado` (`Id_Empleado`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
