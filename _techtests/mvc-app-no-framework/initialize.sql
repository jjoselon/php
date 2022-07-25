-- MySQL Script generated by MySQL Workbench
-- Sat Apr 27 21:42:48 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE DATABASE IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Position`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Position` (
  `idPosition` INT NOT NULL AUTO_INCREMENT,
  `PositionName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPosition`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`User` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `UserNick` VARCHAR(45) NOT NULL,
  `UserPassword` VARCHAR(45) NOT NULL,
  `UserEmail` VARCHAR(100) NOT NULL,
  `Position_idPosition` INT NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE INDEX `UsuarioNick_UNIQUE` (`UserNick` ASC),
  INDEX `fk_User_Position1_idx` (`Position_idPosition` ASC),
  CONSTRAINT `fk_User_Position1`
    FOREIGN KEY (`Position_idPosition`)
    REFERENCES `mydb`.`Position` (`idPosition`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Good`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Good` (
  `idGood` INT NOT NULL AUTO_INCREMENT,
  `GoodName` VARCHAR(45) NOT NULL,
  `GoodDescription` LONGTEXT NOT NULL,
  `GoodValue` INT NOT NULL,
  `Usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`idGood`),
  INDEX `fk_Good_Usuario_idx` (`Usuario_idUsuario` ASC),
  CONSTRAINT `fk_Good_Usuario`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `mydb`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- Crear los roles admin y user
INSERT INTO Position (PositionName) VALUES ('admin');
INSERT INTO Position (PositionName) VALUES ('user');

-- Crear un usuario con el rol de admin (1)
INSERT INTO User (UserNick, UserPassword, UserEmail, Position_idPosition) VALUES ('admin', '123', 'admin@admin.com', 1);