-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema associative
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema associative
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `associative` DEFAULT CHARACTER SET utf8 ;
USE `associative` ;

-- -----------------------------------------------------
-- Table `associative`.`Producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `associative`.`Producto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `detalle` VARCHAR(255) NOT NULL,
  `cantidad` INT UNSIGNED NOT NULL,
  `precio` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `associative`.`Rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `associative`.`Rol` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `associative`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `associative`.`Usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nickname` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `activo` TINYINT NOT NULL,
  `Rol_id` INT NOT NULL,
  PRIMARY KEY (`id`, `Rol_id`),
  INDEX `rol_id` (`Rol_id` ASC),
  CONSTRAINT `rol_id`
    FOREIGN KEY (`Rol_id`)
    REFERENCES `associative`.`Rol` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `associative`.`Sucursal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `associative`.`Sucursal` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ciudad` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `associative`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `associative`.`Cliente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `correo` VARCHAR(255) NOT NULL,
  `activo` TINYINT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `associative`.`Venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `associative`.`Venta` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATETIME NOT NULL,
  `Usuario_id` INT NOT NULL,
  `Sucursal_id` INT NOT NULL,
  `Cliente_id` INT NOT NULL,
  PRIMARY KEY (`id`, `Usuario_id`, `Sucursal_id`, `Cliente_id`),
  INDEX `vendedor_id` (`Usuario_id` ASC),
  INDEX `sucursal_id` (`Sucursal_id` ASC),
  INDEX `cliente_id` (`Cliente_id` ASC),
  CONSTRAINT `vendedor_id`
    FOREIGN KEY (`Usuario_id`)
    REFERENCES `associative`.`Usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `sucursal_id`
    FOREIGN KEY (`Sucursal_id`)
    REFERENCES `associative`.`Sucursal` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cliente_id`
    FOREIGN KEY (`Cliente_id`)
    REFERENCES `associative`.`Cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `associative`.`Producto_Venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `associative`.`Producto_Venta` (
  `Producto_id` INT NOT NULL,
  `Venta_id` INT NOT NULL,
  `cantidad` INT NULL,
  PRIMARY KEY (`Producto_id`, `Venta_id`),
  INDEX `fk_Producto_has_Venta_Venta1_idx` (`Venta_id` ASC) ,
  INDEX `fk_Producto_has_Venta_Producto_idx` (`Producto_id` ASC) ,
  CONSTRAINT `fk_Producto_has_Venta_Producto`
    FOREIGN KEY (`Producto_id`)
    REFERENCES `associative`.`Producto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Producto_has_Venta_Venta1`
    FOREIGN KEY (`Venta_id`)
    REFERENCES `associative`.`Venta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
