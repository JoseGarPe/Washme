
DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` longtext COLLATE utf8_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `correo` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pass` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_tipo_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`);

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` longtext COLLATE utf8_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

DROP TABLE IF EXISTS `servicio`;
CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `precio` decimal(11,2) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `direccion` longtext COLLATE utf8_spanish2_ci DEFAULT NULL,
  `dui` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `correo` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

  DROP TABLE IF EXISTS `coches`;
CREATE TABLE `coches` (
  `id_coches` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `marca` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `modelo` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
ALTER TABLE `coches`
  ADD CONSTRAINT `coches_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`)
  ALTER TABLE `coches`
  ADD CONSTRAINT `coches_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

DROP TABLE IF EXISTS `historial_servicio`;
CREATE TABLE `historial_servicio` (
  `id_historial_servicio` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,  
  `id_coches` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `comentario` varchar(350) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_realizado` date COLLATE utf8_spanish2_ci DEFAULT NULL,
  `n_factura` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

ALTER TABLE `historial_servicio`
  ADD CONSTRAINT `historial_servicio_ibfk_1` FOREIGN KEY (`id_coches`) REFERENCES `coches` (`id_coches`);
ALTER TABLE `historial_servicio`
  ADD CONSTRAINT `historial_servicio_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`);

  DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `precio` decimal(11,2) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;