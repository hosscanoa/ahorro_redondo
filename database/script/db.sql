-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema AhorroRedondoDB
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema AhorroRedondoDB
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `AhorroRedondoDB` DEFAULT CHARACTER SET utf8 ;
USE `AhorroRedondoDB` ;

-- -----------------------------------------------------
-- Table `AhorroRedondoDB`.`estados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AhorroRedondoDB`.`estados` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AhorroRedondoDB`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AhorroRedondoDB`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(70) NOT NULL,
  `fechaRegistro` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `token` VARCHAR(70) NULL,
  `nombres` VARCHAR(45) NOT NULL,
  `apellidos` VARCHAR(45) NOT NULL,
  `estado_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_usuarios_estados1_idx` (`estado_id` ASC),
  CONSTRAINT `fk_usuarios_estados1`
    FOREIGN KEY (`estado_id`)
    REFERENCES `AhorroRedondoDB`.`estados` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AhorroRedondoDB`.`tipos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AhorroRedondoDB`.`tipos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NOT NULL,
  `valor` INT NULL,
  `id_tercero` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AhorroRedondoDB`.`bancos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AhorroRedondoDB`.`bancos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AhorroRedondoDB`.`cuentas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AhorroRedondoDB`.`cuentas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `numero` VARCHAR(45) NOT NULL,
  `banco_id` INT NOT NULL,
  `estado_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cuentas_bancos1_idx` (`banco_id` ASC),
  INDEX `fk_cuentas_estados1_idx` (`estado_id` ASC),
  CONSTRAINT `fk_cuentas_bancos1`
    FOREIGN KEY (`banco_id`)
    REFERENCES `AhorroRedondoDB`.`bancos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cuentas_estados1`
    FOREIGN KEY (`estado_id`)
    REFERENCES `AhorroRedondoDB`.`estados` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AhorroRedondoDB`.`usuarios_cuentas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AhorroRedondoDB`.`usuarios_cuentas` (
  `usuario_id` INT NOT NULL,
  `cuenta_id` INT NOT NULL,
  PRIMARY KEY (`usuario_id`, `cuenta_id`),
  INDEX `fk_usuarios_has_cuentas_cuentas1_idx` (`cuenta_id` ASC),
  INDEX `fk_usuarios_has_cuentas_usuarios1_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_usuarios_has_cuentas_usuarios1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `AhorroRedondoDB`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_has_cuentas_cuentas1`
    FOREIGN KEY (`cuenta_id`)
    REFERENCES `AhorroRedondoDB`.`cuentas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AhorroRedondoDB`.`servicios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AhorroRedondoDB`.`servicios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NOT NULL,
  `tipo_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_servicios_tipos1_idx` (`tipo_id` ASC),
  CONSTRAINT `fk_servicios_tipos1`
    FOREIGN KEY (`tipo_id`)
    REFERENCES `AhorroRedondoDB`.`tipos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AhorroRedondoDB`.`pagos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AhorroRedondoDB`.`pagos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `servicio_id` INT NOT NULL,
  `codigoPago` VARCHAR(45) NULL,
  `monto` DECIMAL(7,2) NULL,
  `tipo_id` INT NOT NULL,
  `fecha` DATETIME NULL,
  `cuenta_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pagos_servicios1_idx` (`servicio_id` ASC),
  INDEX `fk_pagos_tipos1_idx` (`tipo_id` ASC),
  INDEX `fk_pagos_cuentas1_idx` (`cuenta_id` ASC),
  CONSTRAINT `fk_pagos_servicios1`
    FOREIGN KEY (`servicio_id`)
    REFERENCES `AhorroRedondoDB`.`servicios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagos_tipos1`
    FOREIGN KEY (`tipo_id`)
    REFERENCES `AhorroRedondoDB`.`tipos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagos_cuentas1`
    FOREIGN KEY (`cuenta_id`)
    REFERENCES `AhorroRedondoDB`.`cuentas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AhorroRedondoDB`.`bancos_servicios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AhorroRedondoDB`.`bancos_servicios` (
  `banco_id` INT NOT NULL,
  `servicio_id` INT NOT NULL,
  PRIMARY KEY (`banco_id`, `servicio_id`),
  INDEX `fk_bancos_has_servicios_servicios1_idx` (`servicio_id` ASC),
  INDEX `fk_bancos_has_servicios_bancos1_idx` (`banco_id` ASC),
  CONSTRAINT `fk_bancos_has_servicios_bancos1`
    FOREIGN KEY (`banco_id`)
    REFERENCES `AhorroRedondoDB`.`bancos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bancos_has_servicios_servicios1`
    FOREIGN KEY (`servicio_id`)
    REFERENCES `AhorroRedondoDB`.`servicios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AhorroRedondoDB`.`deseos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AhorroRedondoDB`.`deseos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NULL,
  `monto` DECIMAL(7,2) NULL,
  `estado_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_deseos_estados1_idx` (`estado_id` ASC),
  CONSTRAINT `fk_deseos_estados1`
    FOREIGN KEY (`estado_id`)
    REFERENCES `AhorroRedondoDB`.`estados` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AhorroRedondoDB`.`tablas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AhorroRedondoDB`.`tablas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AhorroRedondoDB`.`tablas_estados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AhorroRedondoDB`.`tablas_estados` (
  `tabla_id` INT NOT NULL,
  `estado_id` INT NOT NULL,
  PRIMARY KEY (`tabla_id`, `estado_id`),
  INDEX `fk_tablas_has_estados_estados1_idx` (`estado_id` ASC),
  INDEX `fk_tablas_has_estados_tablas1_idx` (`tabla_id` ASC),
  CONSTRAINT `fk_tablas_has_estados_tablas1`
    FOREIGN KEY (`tabla_id`)
    REFERENCES `AhorroRedondoDB`.`tablas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tablas_has_estados_estados1`
    FOREIGN KEY (`estado_id`)
    REFERENCES `AhorroRedondoDB`.`estados` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AhorroRedondoDB`.`tablas_tipos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AhorroRedondoDB`.`tablas_tipos` (
  `tabla_id` INT NOT NULL,
  `tipo_id` INT NOT NULL,
  PRIMARY KEY (`tabla_id`, `tipo_id`),
  INDEX `fk_tablas_has_tipos_tipos1_idx` (`tipo_id` ASC),
  INDEX `fk_tablas_has_tipos_tablas1_idx` (`tabla_id` ASC),
  CONSTRAINT `fk_tablas_has_tipos_tablas1`
    FOREIGN KEY (`tabla_id`)
    REFERENCES `AhorroRedondoDB`.`tablas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tablas_has_tipos_tipos1`
    FOREIGN KEY (`tipo_id`)
    REFERENCES `AhorroRedondoDB`.`tipos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `AhorroRedondoDB`.`estados`
-- -----------------------------------------------------
START TRANSACTION;
USE `AhorroRedondoDB`;
INSERT INTO `AhorroRedondoDB`.`estados` (`id`, `descripcion`) VALUES (1, 'activo');
INSERT INTO `AhorroRedondoDB`.`estados` (`id`, `descripcion`) VALUES (2, 'inactivo');
INSERT INTO `AhorroRedondoDB`.`estados` (`id`, `descripcion`) VALUES (3, 'cumplido');
INSERT INTO `AhorroRedondoDB`.`estados` (`id`, `descripcion`) VALUES (4, 'no cumplido');

COMMIT;


-- -----------------------------------------------------
-- Data for table `AhorroRedondoDB`.`usuarios`
-- -----------------------------------------------------
START TRANSACTION;
USE `AhorroRedondoDB`;
INSERT INTO `AhorroRedondoDB`.`usuarios` (`id`, `email`, `password`, `fechaRegistro`, `token`, `nombres`, `apellidos`, `estado_id`) VALUES (1, 'hoscanoa@gmail.com', '$2y$10$9bgq5tBoSTmJozbXev3RGuJwzbM6g7IOsXE2TWCViQ6ejQ9zjrrpu', '2018-05-26 10:39:54', NULL, 'Hernán', 'Oscanoa Ventocilla', 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `AhorroRedondoDB`.`tipos`
-- -----------------------------------------------------
START TRANSACTION;
USE `AhorroRedondoDB`;
INSERT INTO `AhorroRedondoDB`.`tipos` (`id`, `descripcion`, `valor`, `id_tercero`) VALUES (1, 'Redondeo de a S/1', 1, NULL);
INSERT INTO `AhorroRedondoDB`.`tipos` (`id`, `descripcion`, `valor`, `id_tercero`) VALUES (2, 'Redondeo de a S/5', 5, NULL);
INSERT INTO `AhorroRedondoDB`.`tipos` (`id`, `descripcion`, `valor`, `id_tercero`) VALUES (3, 'Redondeo de a S/10', 10, NULL);
INSERT INTO `AhorroRedondoDB`.`tipos` (`id`, `descripcion`, `valor`, `id_tercero`) VALUES (4, 'Redondeo de a S/100', 100, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `AhorroRedondoDB`.`bancos`
-- -----------------------------------------------------
START TRANSACTION;
USE `AhorroRedondoDB`;
INSERT INTO `AhorroRedondoDB`.`bancos` (`id`, `descripcion`) VALUES (1, 'BCP');

COMMIT;


-- -----------------------------------------------------
-- Data for table `AhorroRedondoDB`.`tablas`
-- -----------------------------------------------------
START TRANSACTION;
USE `AhorroRedondoDB`;
INSERT INTO `AhorroRedondoDB`.`tablas` (`id`, `descripcion`) VALUES (1, 'bancos');
INSERT INTO `AhorroRedondoDB`.`tablas` (`id`, `descripcion`) VALUES (2, 'cuentas');
INSERT INTO `AhorroRedondoDB`.`tablas` (`id`, `descripcion`) VALUES (3, 'deseos');
INSERT INTO `AhorroRedondoDB`.`tablas` (`id`, `descripcion`) VALUES (4, 'estados');
INSERT INTO `AhorroRedondoDB`.`tablas` (`id`, `descripcion`) VALUES (5, 'pagos');
INSERT INTO `AhorroRedondoDB`.`tablas` (`id`, `descripcion`) VALUES (6, 'tipos');
INSERT INTO `AhorroRedondoDB`.`tablas` (`id`, `descripcion`) VALUES (7, 'usuarios');

COMMIT;


-- -----------------------------------------------------
-- Data for table `AhorroRedondoDB`.`tablas_estados`
-- -----------------------------------------------------
START TRANSACTION;
USE `AhorroRedondoDB`;
INSERT INTO `AhorroRedondoDB`.`tablas_estados` (`tabla_id`, `estado_id`) VALUES (7, 1);
INSERT INTO `AhorroRedondoDB`.`tablas_estados` (`tabla_id`, `estado_id`) VALUES (7, 2);
INSERT INTO `AhorroRedondoDB`.`tablas_estados` (`tabla_id`, `estado_id`) VALUES (3, 3);
INSERT INTO `AhorroRedondoDB`.`tablas_estados` (`tabla_id`, `estado_id`) VALUES (3, 4);

COMMIT;


-- -----------------------------------------------------
-- Data for table `AhorroRedondoDB`.`tablas_tipos`
-- -----------------------------------------------------
START TRANSACTION;
USE `AhorroRedondoDB`;
INSERT INTO `AhorroRedondoDB`.`tablas_tipos` (`tabla_id`, `tipo_id`) VALUES (5, 1);
INSERT INTO `AhorroRedondoDB`.`tablas_tipos` (`tabla_id`, `tipo_id`) VALUES (5, 2);
INSERT INTO `AhorroRedondoDB`.`tablas_tipos` (`tabla_id`, `tipo_id`) VALUES (5, 3);
INSERT INTO `AhorroRedondoDB`.`tablas_tipos` (`tabla_id`, `tipo_id`) VALUES (5, 4);

COMMIT;

