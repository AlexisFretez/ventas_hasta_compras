-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.17-log - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para ventas_ci
DROP DATABASE IF EXISTS `ventas_ci`;
CREATE DATABASE IF NOT EXISTS `ventas_ci` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ventas_ci`;

-- Volcando estructura para tabla ventas_ci.categorias
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ventas_ci.categorias: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT IGNORE INTO `categorias` (`id`, `nombre`, `descripcion`, `estado`) VALUES
	(1, 'Leches', 'todas bebidas', 1),
	(2, 'conservas', 'Todo las leches', 1);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla ventas_ci.clientes
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `tipo_cliente_id` int(11) DEFAULT NULL,
  `tipo_documento_id` int(11) DEFAULT NULL,
  `num_documento` varchar(45) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tipo_cliente_idx` (`tipo_cliente_id`),
  KEY `fk_tipo_documento_idx` (`tipo_documento_id`),
  CONSTRAINT `fk_tipo_cliente` FOREIGN KEY (`tipo_cliente_id`) REFERENCES `tipo_cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tipo_documento` FOREIGN KEY (`tipo_documento_id`) REFERENCES `tipo_documento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ventas_ci.clientes: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT IGNORE INTO `clientes` (`id`, `nombre`, `telefono`, `direccion`, `tipo_cliente_id`, `tipo_documento_id`, `num_documento`, `estado`) VALUES
	(1, 'jerksi manuel', '053484848', 'Calle Moquegua 430', 1, 2, '45454545', 1),
	(3, 'juan benitez', '', '', 1, 1, '45454546', 1),
	(4, 'juan martinez', '', '', 1, 1, '45434343', 1),
	(5, 'miguel casas', '564554', 'Mi calle 430', 2, 1, '46464646', 1),
	(6, 'los rodrigues S.A', '043434343', 'Calle abtao 350', 2, 2, '45454545', 1),
	(8, 'luis galdoz', '967767680', 'Calle Moquegua 310', 1, 1, '48484848', 1),
	(9, 'los pieros S.A', '484848', 'Calle Pichincha 350', 2, 2, '20444444409', 1),
	(10, 'gean carlo fuentes', '454647', 'Mi casa', 1, 1, '46477687', 1),
	(11, 'carlos alberto', '053545454', 'Mi casa verde', 1, 1, '04545456', 1),
	(12, 'ALEXIS', '0971516217', 'Itaugua', 1, 1, '4987545', 1);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando estructura para tabla ventas_ci.compras
DROP TABLE IF EXISTS `compras`;
CREATE TABLE IF NOT EXISTS `compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `subtotal` varchar(50) DEFAULT NULL,
  `igv` varchar(50) DEFAULT NULL,
  `descuento` varchar(50) DEFAULT NULL,
  `total` varchar(50) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `tipo_comprobante_id` int(11) DEFAULT NULL,
  `proveedor_id` int(11) DEFAULT NULL,
  `num_documento` varchar(50) DEFAULT NULL,
  `serie` varchar(50) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ventas_ci.compras: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT IGNORE INTO `compras` (`id`, `fecha`, `subtotal`, `igv`, `descuento`, `total`, `producto_id`, `tipo_comprobante_id`, `proveedor_id`, `num_documento`, `serie`, `estado`) VALUES
	(1, '2019-04-28', '0.00', '0.00', '0.00', '0.00', NULL, 1, 6, NULL, NULL, NULL);
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;

-- Volcando estructura para tabla ventas_ci.detalle_compra
DROP TABLE IF EXISTS `detalle_compra`;
CREATE TABLE IF NOT EXISTS `detalle_compra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) DEFAULT NULL,
  `venta_id` int(11) DEFAULT NULL,
  `precio` varchar(50) DEFAULT NULL,
  `cantidad` varchar(50) DEFAULT NULL,
  `importe` varchar(50) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ventas_ci.detalle_compra: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_compra` DISABLE KEYS */;
INSERT IGNORE INTO `detalle_compra` (`id`, `producto_id`, `venta_id`, `precio`, `cantidad`, `importe`, `estado`) VALUES
	(1, 22, 1, '2000', '10', '2000', NULL);
/*!40000 ALTER TABLE `detalle_compra` ENABLE KEYS */;

-- Volcando estructura para tabla ventas_ci.detalle_venta
DROP TABLE IF EXISTS `detalle_venta`;
CREATE TABLE IF NOT EXISTS `detalle_venta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) DEFAULT NULL,
  `venta_id` int(11) DEFAULT NULL,
  `precio` varchar(45) DEFAULT NULL,
  `cantidad` varchar(45) DEFAULT NULL,
  `importe` varchar(45) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_venta_detalle_idx` (`venta_id`),
  KEY `fk_producto_detalle_idx` (`producto_id`),
  CONSTRAINT `fk_producto_detalle` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_venta_detalle` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ventas_ci.detalle_venta: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_venta` DISABLE KEYS */;
INSERT IGNORE INTO `detalle_venta` (`id`, `producto_id`, `venta_id`, `precio`, `cantidad`, `importe`, `estado`) VALUES
	(5, 2, 5, '3000', '1', '3000', NULL);
/*!40000 ALTER TABLE `detalle_venta` ENABLE KEYS */;

-- Volcando estructura para tabla ventas_ci.menus
DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ventas_ci.menus: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT IGNORE INTO `menus` (`id`, `nombre`, `link`) VALUES
	(1, 'Inicio', 'dashboard'),
	(2, 'Categorias', 'mantenimiento/categorias'),
	(3, 'Clientes', 'mantenimiento/clientes'),
	(4, 'Productos', 'mantenimiento/productos'),
	(5, 'Ventas', 'movimientos/ventas'),
	(6, 'Reporte Ventas', 'reportes/ventas'),
	(7, 'Usuarios', 'administrador/usuarios'),
	(8, 'Permisos', 'administrador/permisos');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;

-- Volcando estructura para tabla ventas_ci.permisos
DROP TABLE IF EXISTS `permisos`;
CREATE TABLE IF NOT EXISTS `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `read` int(11) DEFAULT NULL,
  `insert` int(11) DEFAULT NULL,
  `update` int(11) DEFAULT NULL,
  `delete` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_menus_idx` (`menu_id`),
  KEY `fk_rol_idx` (`rol_id`),
  CONSTRAINT `fk_menus` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_rol` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ventas_ci.permisos: ~16 rows (aproximadamente)
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT IGNORE INTO `permisos` (`id`, `menu_id`, `rol_id`, `read`, `insert`, `update`, `delete`) VALUES
	(1, 1, 2, 1, 1, 1, 1),
	(2, 2, 2, 1, 1, 1, 1),
	(3, 3, 2, 1, 1, 1, 1),
	(4, 4, 2, 1, 1, 1, 1),
	(5, 5, 2, 1, 1, 1, 1),
	(7, 6, 2, 1, 1, 1, 1),
	(8, 7, 2, 1, 1, 1, 1),
	(9, 8, 2, 1, 1, 1, 1),
	(10, 1, 1, 1, 1, 1, 1),
	(11, 2, 1, 1, 1, 1, 1),
	(12, 4, 1, 1, 1, 1, 1),
	(13, 5, 1, 1, 1, 1, 1),
	(14, 6, 1, 1, 1, 1, 1),
	(15, 7, 1, 1, 1, 1, 1),
	(16, 3, 1, 1, 1, 1, 1),
	(17, 8, 1, 1, 1, 1, 1);
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;

-- Volcando estructura para tabla ventas_ci.productos
DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `precio_compra` varchar(100) DEFAULT NULL,
  `precio` varchar(45) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `utilidad` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`),
  KEY `fk_categoria_producto_idx` (`categoria_id`),
  CONSTRAINT `fk_categoria_producto` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ventas_ci.productos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT IGNORE INTO `productos` (`id`, `codigo`, `nombre`, `descripcion`, `precio_compra`, `precio`, `stock`, `utilidad`, `categoria_id`, `estado`) VALUES
	(38, '1', 'conservas', 'todas bebidas', '200000', '20000', 50, 0, 1, 1),
	(40, '20', 'conservas2', 'Todos los Jugos', '500000', '700000', 56, 200000, 1, 1);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla ventas_ci.proveedores
DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `num_documento` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ventas_ci.proveedores: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT IGNORE INTO `proveedores` (`id`, `nombre`, `num_documento`, `direccion`, `telefono`, `producto_id`, `estado`) VALUES
	(1, 'Alexis', '555', 'itaugua', '666', 1, 1),
	(2, 'Lechesdasdad', '4445dadada', 'ybyratydadadad', '0971516217dadada', 1, 1),
	(3, 'conservasffffffffff', '444ffffffffffffff', 'ybyratyffffffffffffff', '0971516217fffffffffffffff', 1, 1),
	(4, 'conservas', '455522', 'Itaugua', '0971516217', 2, 1),
	(5, 'Toyota', '444', 'ybyraty', '0971516217', 2, 1),
	(6, 'alexis Fretez', '455555', 'Itaugua', '0971516217', 25, 1);
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;

-- Volcando estructura para tabla ventas_ci.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ventas_ci.roles: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT IGNORE INTO `roles` (`id`, `nombre`, `descripcion`) VALUES
	(1, 'superadmin', NULL),
	(2, 'admin', NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla ventas_ci.tipo_cliente
DROP TABLE IF EXISTS `tipo_cliente`;
CREATE TABLE IF NOT EXISTS `tipo_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ventas_ci.tipo_cliente: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_cliente` DISABLE KEYS */;
INSERT IGNORE INTO `tipo_cliente` (`id`, `nombre`, `descripcion`) VALUES
	(1, 'Publico General', NULL),
	(2, 'Empresa', NULL);
/*!40000 ALTER TABLE `tipo_cliente` ENABLE KEYS */;

-- Volcando estructura para tabla ventas_ci.tipo_comprobante
DROP TABLE IF EXISTS `tipo_comprobante`;
CREATE TABLE IF NOT EXISTS `tipo_comprobante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `igv` int(11) DEFAULT NULL,
  `serie` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ventas_ci.tipo_comprobante: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_comprobante` DISABLE KEYS */;
INSERT IGNORE INTO `tipo_comprobante` (`id`, `nombre`, `cantidad`, `igv`, `serie`) VALUES
	(1, 'Factura', 8, 10, 1),
	(2, 'Boleta', 9, 0, 1);
/*!40000 ALTER TABLE `tipo_comprobante` ENABLE KEYS */;

-- Volcando estructura para tabla ventas_ci.tipo_documento
DROP TABLE IF EXISTS `tipo_documento`;
CREATE TABLE IF NOT EXISTS `tipo_documento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ventas_ci.tipo_documento: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_documento` DISABLE KEYS */;
INSERT IGNORE INTO `tipo_documento` (`id`, `nombre`, `cantidad`) VALUES
	(1, 'CI', 1),
	(2, 'RUC', NULL);
/*!40000 ALTER TABLE `tipo_documento` ENABLE KEYS */;

-- Volcando estructura para tabla ventas_ci.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_rol_usuarios_idx` (`rol_id`),
  CONSTRAINT `fk_rol_usuarios` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ventas_ci.usuarios: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT IGNORE INTO `usuarios` (`id`, `nombres`, `apellidos`, `telefono`, `email`, `username`, `password`, `rol_id`, `estado`) VALUES
	(1, 'yony brony', 'mamani fuentes', '454545', 'yony@gmail.com', 'yonilo', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2, 1),
	(2, 'Juan Carlos ', 'Perez Maldonado', '454545', 'juancarlos@gmail.com', 'juancito17', NULL, 1, 0),
	(3, 'Alexis', 'Fretez', '0971516217', 'sdsds@gmail.com', 'alex', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla ventas_ci.ventas
DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `subtotal` varchar(45) DEFAULT NULL,
  `igv` varchar(45) DEFAULT NULL,
  `descuento` varchar(45) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  `tipo_comprobante_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `num_documento` varchar(45) DEFAULT NULL,
  `serie` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_venta_idx` (`usuario_id`),
  KEY `fk_cliente_venta_idx` (`cliente_id`),
  KEY `fk_tipo_comprobante_venta_idx` (`tipo_comprobante_id`),
  CONSTRAINT `fk_cliente_venta` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tipo_comprobante_venta` FOREIGN KEY (`tipo_comprobante_id`) REFERENCES `tipo_comprobante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_venta` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ventas_ci.ventas: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT IGNORE INTO `ventas` (`id`, `fecha`, `subtotal`, `igv`, `descuento`, `total`, `tipo_comprobante_id`, `cliente_id`, `usuario_id`, `num_documento`, `serie`) VALUES
	(5, '2019-04-27', '3000.00', '0.00', '0.00', '3000.00', 2, 12, 3, '000009', '1');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
