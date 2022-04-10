-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.14-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para cafeteria
CREATE DATABASE IF NOT EXISTS `cafeteria` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci */;
USE `cafeteria`;

-- Volcando estructura para tabla cafeteria.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` smallint(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla cafeteria.categorias: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `nombre`, `estado`, `fecha_reg`, `fecha_edit`) VALUES
	(1, 'Bebidas Clientes', 1, '2022-04-09 18:44:50', '2022-04-09 18:44:50'),
	(2, 'Pan', 1, '2022-04-09 18:43:18', '2022-04-09 18:43:18'),
	(3, 'Embutidos', 1, '2022-04-09 18:43:46', '2022-04-09 18:43:46'),
	(4, 'Postres', 1, '2022-04-09 18:44:05', '2022-04-09 18:44:05'),
	(5, 'Tortas', 1, '2022-04-09 18:44:14', '2022-04-09 18:44:14'),
	(6, 'Refrescos', 1, '2022-04-09 18:44:41', '2022-04-09 18:44:41'),
	(7, 'Bebidas personalizadas', 1, '2022-04-09 18:45:07', '2022-04-09 18:45:07');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla cafeteria.compras
CREATE TABLE IF NOT EXISTS `compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folio` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla cafeteria.compras: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` (`id`, `folio`, `total`, `estado`, `fecha_reg`) VALUES
	(1, '6253195f2d66a', 20.00, 1, '2022-04-09 12:52:50'),
	(2, '6253195f2d66a', 20.00, 1, '2022-04-10 12:52:50'),
	(3, '6253195f2d66a', 20.00, 1, '2022-04-10 12:55:04'),
	(4, '6253195f2d66a', 20.00, 1, '2022-04-10 12:55:04'),
	(5, '625319fad8f0f', 10.00, 1, '2022-04-10 12:55:19'),
	(6, '625319fad8f0f', 10.00, 1, '2022-04-10 12:55:19'),
	(7, '625319fad8f0f', 10.00, 1, '2022-04-10 12:58:09'),
	(8, '625319fad8f0f', 10.00, 1, '2022-04-10 12:58:09');
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;

-- Volcando estructura para tabla cafeteria.detalle_compra
CREATE TABLE IF NOT EXISTS `detalle_compra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(280) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_detalle_compra` (`id_compra`),
  KEY `fk_detalle_prod` (`id_producto`),
  CONSTRAINT `fk_detalle_compra` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id`),
  CONSTRAINT `fk_detalle_prod` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla cafeteria.detalle_compra: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_compra` DISABLE KEYS */;
INSERT INTO `detalle_compra` (`id`, `id_compra`, `id_producto`, `nombre`, `cantidad`, `precio`, `fecha_reg`) VALUES
	(1, 2, 1, 'Café Americano', 2, 5000.00, '2022-04-10 12:52:50'),
	(2, 4, 1, 'Café Americano', 2, 5000.00, '2022-04-10 12:55:04'),
	(3, 6, 1, 'Café Americano', 1, 5000.00, '2022-04-10 12:55:19'),
	(4, 8, 1, 'Café Americano', 1, 5000.00, '2022-04-10 12:58:09'),
	(5, 8, 3, 'Té Helado', 1, 5000.00, '2022-04-10 12:58:09');
/*!40000 ALTER TABLE `detalle_compra` ENABLE KEYS */;

-- Volcando estructura para tabla cafeteria.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_producto` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `peso` decimal(10,0) NOT NULL,
  `id_categoria` smallint(6) NOT NULL,
  `stock_min` int(11) NOT NULL DEFAULT 0,
  `inventariable` tinyint(4) NOT NULL,
  `cantidad_sold` int(11) NOT NULL,
  `id_unidad` smallint(6) unsigned NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_producto_unidad` (`id_unidad`),
  KEY `fk_producto_categoria` (`id_categoria`),
  CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`),
  CONSTRAINT `fk_producto_unidad` FOREIGN KEY (`id_unidad`) REFERENCES `unidades` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla cafeteria.productos: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id`, `referencia`, `nombre_producto`, `precio`, `peso`, `id_categoria`, `stock_min`, `inventariable`, `cantidad_sold`, `id_unidad`, `estado`, `fecha_reg`, `fecha_edit`) VALUES
	(1, '123', 'Café Americano', 5000, 500, 1, 100, 1, 1, 4, 1, '2022-04-10 12:58:09', '2022-04-10 09:38:06'),
	(2, '23344554675', 'Mocca', 1200, 200, 1, 400, 1, 10, 4, 1, '2022-04-09 17:54:22', '2022-04-09 08:26:16'),
	(3, '45678', 'Té Helado', 5000, 500, 1, 40, 1, 1, 4, 1, '2022-04-10 12:58:09', '2022-04-09 08:36:07'),
	(4, '12345678', 'te', 5900, 500, 1, 700, 1, 0, 4, 1, '2022-04-09 08:42:58', '2022-04-09 08:42:58'),
	(5, '123455', 'cafe', 2345, 400, 1, 56, 1, 0, 4, 1, '2022-04-09 09:14:13', '2022-04-09 09:14:13');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla cafeteria.temporal_compra
CREATE TABLE IF NOT EXISTS `temporal_compra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folio` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `id_producto` int(11) NOT NULL,
  `codigo` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(280) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla cafeteria.temporal_compra: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `temporal_compra` DISABLE KEYS */;
INSERT INTO `temporal_compra` (`id`, `folio`, `id_producto`, `codigo`, `nombre`, `cantidad`, `precio`, `subtotal`) VALUES
	(1, '6253195f2d66a', 1, '123', 'Café Americano', 2, 5000.00, 10000.00),
	(2, '6253195f2d66a', 3, '45678', 'Té Helado', 2, 5000.00, 10000.00);
/*!40000 ALTER TABLE `temporal_compra` ENABLE KEYS */;

-- Volcando estructura para tabla cafeteria.unidades
CREATE TABLE IF NOT EXISTS `unidades` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_corto` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fecha_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla cafeteria.unidades: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `unidades` DISABLE KEYS */;
INSERT INTO `unidades` (`id`, `nombre`, `nombre_corto`, `estado`, `fecha_reg`, `fecha_edit`) VALUES
	(1, 'kilogramos', 'kl', 1, '2022-04-09 09:22:37', '2022-04-09 09:22:37'),
	(2, 'Litros', 'Lt', 1, '2022-04-09 07:47:10', '2022-04-09 07:47:10'),
	(3, 'Gramos', 'Gr', 1, '2022-04-09 09:16:17', '2022-04-09 09:16:17'),
	(4, 'Mililitros', 'ml', 1, '2022-04-09 09:22:42', '2022-04-09 09:22:42'),
	(5, 'Libras', 'Lb', 1, '2022-04-09 18:45:26', '2022-04-09 18:45:26');
/*!40000 ALTER TABLE `unidades` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
