-- Borrar la base de datos si ya existe
DROP DATABASE IF EXISTS `IU2018`;
-- Crear la base de datos
CREATE DATABASE `IU2018` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
-- Seleccionamos la base de datos que vamos a usar
USE `IU2018`;
-- Damos permisos de uso y borramos el usuario que queremos crear
GRANT USAGE ON * . * TO `iu2018`@`localhost`;
    DROP USER `iu2018`@`localhost`;
-- Creamos el usuario y le damos permisos
CREATE USER IF NOT EXISTS `iu2018`@`localhost` IDENTIFIED BY 'pass2018';
RANT USAGE ON *.* TO `iu2018`@`localhost` REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON `IU2018`.* TO `iu2018`@`localhost` WITH GRANT OPTION;
-- Creamos la estructura de la tabla USUARIOS
DROP TABLE IF EXISTS `USUARIOS`;
CREATE TABLE `USUARIOS` (
    `login` VARCHAR(15) NOT NULL,
    `password` VARCHAR(128) NOT NULL,
    `nombre` VARCHAR(30) NOT NULL,
    `apellidos` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `telefono` VARCHAR(60) NOT NULL,

    PRIMARY KEY (`login`),
    UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;