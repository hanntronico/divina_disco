-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-05-2025 a las 11:15:40
-- Versión del servidor: 5.7.23-23
-- Versión de PHP: 8.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `allsopor_divinna`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Tragos'),
(2, 'Cervezas'),
(3, 'Bebidas Energéticas'),
(4, 'Bebidas sin alcohol'),
(5, 'Snacks'),
(6, 'Comidas'),
(8, 'Bebidas Carbonatadas'),
(9, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_promociones`
--

CREATE TABLE `categoria_promociones` (
  `id` int(11) NOT NULL,
  `codigo_categoria` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_categoria` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categoria_promociones`
--

INSERT INTO `categoria_promociones` (`id`, `codigo_categoria`, `nombre_categoria`) VALUES
(1, '0001', '1'),
(2, '0002', '2'),
(3, '0003', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia_semana`
--

CREATE TABLE `dia_semana` (
  `id` int(11) NOT NULL,
  `codigo_dia` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_dia` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `dia_semana`
--

INSERT INTO `dia_semana` (`id`, `codigo_dia`, `nombre_dia`) VALUES
(1, '001 ', 'Lunes'),
(4, '002', 'Martes'),
(5, '004', 'Miercoles'),
(6, '008', 'Miercoles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id_ingrediente` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_ingrediente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stock` decimal(10,2) DEFAULT '0.00',
  `medida_uso` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uso_ingrediente` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`id_ingrediente`, `nombre_ingrediente`, `stock`, `medida_uso`, `uso_ingrediente`) VALUES
('001', 'Agua Carbonatada', 15.00, 'Lts', ''),
('002', 'Azucar', 100.00, 'Kg', ''),
('003', 'Vino', 10.00, 'ml', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingrediente_producto`
--

CREATE TABLE `ingrediente_producto` (
  `id` int(11) NOT NULL,
  `codigo_producto` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_ingrediente` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ingrediente_producto`
--

INSERT INTO `ingrediente_producto` (`id`, `codigo_producto`, `codigo_ingrediente`, `cantidad`) VALUES
(6, 'P008', '002', '12'),
(7, 'P003', '001', '10'),
(10, 'P010', '002', '10'),
(11, 'P002', '001', '200'),
(12, 'P006', '002', '20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo_promocion`
--

CREATE TABLE `periodo_promocion` (
  `id` int(11) NOT NULL,
  `codigo_periodo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_periodo` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `periodo_promocion`
--

INSERT INTO `periodo_promocion` (`id`, `codigo_periodo`, `nombre_periodo`) VALUES
(1, '002', 'perid 1'),
(2, '003', 'perid 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `codigo_producto` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_producto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_producto` text COLLATE utf8_unicode_ci,
  `precio` decimal(10,2) NOT NULL,
  `imagen_producto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `codigo_producto`, `nombre_producto`, `descripcion_producto`, `precio`, `imagen_producto`, `id_categoria`) VALUES
(8, 'P001', 'Whisky Jack Daniel\'s', 'Whisky americano de Tennessee, 750ml.', 25000.00, 'jackdaniels.jpg', 1),
(9, 'P002', 'Ron Havana Club', 'Ron añejo cubano, botella de 700ml.', 18000.00, 'havana.jpg', 1),
(10, 'P003', 'Vodka Absolut', 'Vodka sueco, 750ml, sabor suave.', 22000.00, 'absolut.jpg', 1),
(11, 'P004', 'Cerveza Corona', 'Botella de cerveza importada 355ml.', 3500.00, 'corona.jpg', 2),
(12, 'P005', 'Cerveza Heineken', 'Botella de cerveza europea 330ml.', 3600.00, 'heineken.jpg', 2),
(13, 'P006', 'Tequila José Cuervo', 'Tequila reposado 750ml, origen México.', 23000.00, 'cuervo.jpg', 1),
(14, 'P007', 'Red Bull', 'Lata de bebida energética 250ml.', 2500.00, 'redbull.jpg', 3),
(15, 'P008', 'Agua Mineral', 'Botella de agua sin gas 500ml.', 1500.00, 'agua.jpg', 4),
(16, 'P009', 'Jugo Natural Naranja', 'Jugo exprimido de naranja 300ml.', 2000.00, 'jugo.jpg', 4),
(17, 'P010', 'Papas Fritas', 'Porción de papas fritas con salsa.', 2500.00, 'papas.jpg', 5),
(18, 'P011', 'Maní Salado', 'Bolsa de maní tostado y salado.', 1800.00, 'mani.jpg', 5),
(19, 'P012', 'Gin Bombay', 'Ginebra premium, botella de 750ml.', 27000.00, 'bombay.jpg', 1),
(20, 'P013', 'Ron Bacardí Blanco', 'Ron blanco caribeño, 700ml.', 19000.00, 'bacardi.jpg', 1),
(21, 'P014', 'Coca-Cola', 'Botella de Coca-Cola 500ml.', 1800.00, 'cocacola.jpg', 4),
(22, 'P015', 'Pizza Individual', 'Pizza personal de jamón y queso.', 5500.00, 'pizza.jpg', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `id` int(11) NOT NULL,
  `codigo_promocion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_promocion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci,
  `tipo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  `categoria` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descuento` decimal(5,2) DEFAULT NULL,
  `sexo_promocion` enum('Masculino','Femenino','Todos') COLLATE utf8_unicode_ci DEFAULT 'Todos',
  `pre_compra` enum('Sí','No') COLLATE utf8_unicode_ci DEFAULT 'No',
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`id`, `codigo_promocion`, `nombre_promocion`, `descripcion`, `tipo`, `fecha_inicio`, `fecha_final`, `categoria`, `estado`, `descuento`, `sexo_promocion`, `pre_compra`, `creado_en`) VALUES
(1, '001', 'aa', 'aa', 'aa', '2025-05-15', '2025-05-29', 'aa', 'aa', 10.00, 'Todos', 'Sí', '2025-05-30 02:52:54'),
(2, '001', 'aa', 'aa', 'aa', '2025-05-15', '2025-05-29', 'aa', 'aa', 10.00, 'Todos', 'Sí', '2025-05-30 02:54:48'),
(3, '005', 'xx', 'xxx', 'xxx', '2025-05-02', '2025-05-15', '0002', 'xxx', 15.00, 'Masculino', 'No', '2025-05-30 03:47:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_promocion`
--

CREATE TABLE `tipo_promocion` (
  `id` int(11) NOT NULL,
  `codigo_tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_tipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_promocion`
--

INSERT INTO `tipo_promocion` (`id`, `codigo_tipo`, `nombre_tipo`) VALUES
(1, '001', 'aaaa'),
(3, '0013', 'aaaa55'),
(4, '002', 'bbbb'),
(5, '003', 'xxx');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `categoria_promociones`
--
ALTER TABLE `categoria_promociones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_categoria` (`codigo_categoria`);

--
-- Indices de la tabla `dia_semana`
--
ALTER TABLE `dia_semana`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_dia` (`codigo_dia`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id_ingrediente`);

--
-- Indices de la tabla `ingrediente_producto`
--
ALTER TABLE `ingrediente_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingrediente_producto_ibfk_1` (`codigo_producto`),
  ADD KEY `ingrediente_producto_ibfk_2` (`codigo_ingrediente`);

--
-- Indices de la tabla `periodo_promocion`
--
ALTER TABLE `periodo_promocion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `codigo_producto` (`codigo_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_promocion`
--
ALTER TABLE `tipo_promocion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_tipo` (`codigo_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34324325;

--
-- AUTO_INCREMENT de la tabla `categoria_promociones`
--
ALTER TABLE `categoria_promociones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `dia_semana`
--
ALTER TABLE `dia_semana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ingrediente_producto`
--
ALTER TABLE `ingrediente_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `periodo_promocion`
--
ALTER TABLE `periodo_promocion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_promocion`
--
ALTER TABLE `tipo_promocion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ingrediente_producto`
--
ALTER TABLE `ingrediente_producto`
  ADD CONSTRAINT `ingrediente_producto_ibfk_1` FOREIGN KEY (`codigo_producto`) REFERENCES `productos` (`codigo_producto`),
  ADD CONSTRAINT `ingrediente_producto_ibfk_2` FOREIGN KEY (`codigo_ingrediente`) REFERENCES `ingredientes` (`id_ingrediente`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
