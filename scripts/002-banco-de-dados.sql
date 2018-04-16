-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema safe_this_dev
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema safe_this_dev
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `safe_this_dev` DEFAULT CHARACTER SET utf8 ;
USE `safe_this_dev` ;

-- -----------------------------------------------------
-- Table `safe_this_dev`.`TB_SECTORS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `safe_this_dev`.`TB_SECTORS` (
  `Sector_Id` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Sector_Id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `safe_this_dev`.`TB_OCURRENCE_PRIORITIES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `safe_this_dev`.`TB_OCURRENCE_PRIORITIES` (
  `Ocurrence_Priority_Id` INT NOT NULL AUTO_INCREMENT,
  `Description` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Ocurrence_Priority_Id`),
  UNIQUE INDEX `Description_UNIQUE` (`Description` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `safe_this_dev`.`TB_OCURRENCES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `safe_this_dev`.`TB_OCURRENCES` (
  `Ocurrence_Id` INT NOT NULL AUTO_INCREMENT,
  `Sector_Id` INT NOT NULL,
  `Description` VARCHAR(200) NULL,
  `Reporter_Email` VARCHAR(80) NULL,
  `Reporter_CPF` VARCHAR(11) NULL,
  `Ocurrence_Priority_Id` INT NOT NULL,
  PRIMARY KEY (`Ocurrence_Id`),
  INDEX `FK_TB_OCURRENCES_TB_SECTORS_idx` (`Sector_Id` ASC),
  INDEX `FK_TB_OCURRENCES_TB_OCURRENCE_PRIORITIES_idx` (`Ocurrence_Priority_Id` ASC),
  CONSTRAINT `FK_TB_OCURRENCES_TB_SECTORS`
    FOREIGN KEY (`Sector_Id`)
    REFERENCES `safe_this_dev`.`TB_SECTORS` (`Sector_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_TB_OCURRENCES_TB_OCURRENCE_PRIORITIES`
    FOREIGN KEY (`Ocurrence_Priority_Id`)
    REFERENCES `safe_this_dev`.`TB_OCURRENCE_PRIORITIES` (`Ocurrence_Priority_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `safe_this_dev`.`TB_PROFILES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `safe_this_dev`.`TB_PROFILES` (
  `Profile_Id` INT NOT NULL AUTO_INCREMENT,
  `Description` VARCHAR(45) NOT NULL,
  `FullAccess` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`Profile_Id`),
  UNIQUE INDEX `Description_UNIQUE` (`Description` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `safe_this_dev`.`TB_USERS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `safe_this_dev`.`TB_USERS` (
  `User_Id` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(80) NOT NULL,
  `Password` VARCHAR(255) NOT NULL,
  `Profile_Id` INT NOT NULL,
  `Last_Activity` DATETIME NULL,
  PRIMARY KEY (`User_Id`),
  INDEX `FK_TB_USERS_TB_PROFILES_idx` (`Profile_Id` ASC),
  CONSTRAINT `FK_TB_USERS_TB_PROFILES`
    FOREIGN KEY (`Profile_Id`)
    REFERENCES `safe_this_dev`.`TB_PROFILES` (`Profile_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `safe_this_dev`.`TB_OCURRENCE_STATUSES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `safe_this_dev`.`TB_OCURRENCE_STATUSES` (
  `Ocurrence_Status_Id` INT NOT NULL AUTO_INCREMENT,
  `Description` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Ocurrence_Status_Id`),
  UNIQUE INDEX `Description_UNIQUE` (`Description` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `safe_this_dev`.`TB_OCURRENCE_UPDATES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `safe_this_dev`.`TB_OCURRENCE_UPDATES` (
  `Ocurrence_Update_Id` INT NOT NULL AUTO_INCREMENT,
  `Ocurrence_Id` INT NOT NULL,
  `Responsible` INT NOT NULL,
  `Status_Feedback` VARCHAR(200) NULL,
  `Ocurrence_Status_Id` INT NOT NULL,
  PRIMARY KEY (`Ocurrence_Update_Id`),
  INDEX `FK_TB_OCURRENCES_idx` (`Ocurrence_Id` ASC),
  INDEX `FK_TB_OCURRENCE_UPDATES_TB_USERS_idx` (`Responsible` ASC),
  INDEX `FK_TB_OCURRENCE_UPDATES_TB_OCURRENCE_STATUSES_idx` (`Ocurrence_Status_Id` ASC),
  CONSTRAINT `FK_TB_OCURRENCE_UPDATES_TB_OCURRENCES`
    FOREIGN KEY (`Ocurrence_Id`)
    REFERENCES `safe_this_dev`.`TB_OCURRENCES` (`Ocurrence_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_TB_OCURRENCE_UPDATES_TB_USERS`
    FOREIGN KEY (`Responsible`)
    REFERENCES `safe_this_dev`.`TB_USERS` (`User_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_TB_OCURRENCE_UPDATES_TB_OCURRENCE_STATUSES`
    FOREIGN KEY (`Ocurrence_Status_Id`)
    REFERENCES `safe_this_dev`.`TB_OCURRENCE_STATUSES` (`Ocurrence_Status_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `safe_this_dev`.`TB_OCURRENCE_FILES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `safe_this_dev`.`TB_OCURRENCE_FILES` (
  `Ocurrence_File_Id` INT NOT NULL AUTO_INCREMENT,
  `Ocurrence_Status_Id` INT NOT NULL,
  `Title` VARCHAR(45) NOT NULL,
  `FileName` VARCHAR(200) NOT NULL,
  `Ocurrence_Update_Id` INT NOT NULL,
  PRIMARY KEY (`Ocurrence_File_Id`),
  INDEX `FK_TB_OCURRENCE_FILE_TB_OCURRENCE_UPDATE_idx` (`Ocurrence_Update_Id` ASC),
  CONSTRAINT `FK_TB_OCURRENCE_FILE_TB_OCURRENCE_UPDATE`
    FOREIGN KEY (`Ocurrence_Update_Id`)
    REFERENCES `safe_this_dev`.`TB_OCURRENCE_UPDATES` (`Ocurrence_Update_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `safe_this_dev`.`TB_SECTOR_FILES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `safe_this_dev`.`TB_SECTOR_FILES` (
  `Sector_File_Id` INT NOT NULL AUTO_INCREMENT,
  `Title` VARCHAR(45) NOT NULL,
  `FileName` VARCHAR(200) NOT NULL,
  `Sector_Id` INT NOT NULL,
  PRIMARY KEY (`Sector_File_Id`),
  INDEX `FK_TB_SECTOR_FILES_TB_SECTORS_idx` (`Sector_Id` ASC),
  CONSTRAINT `FK_TB_SECTOR_FILES_TB_SECTORS`
    FOREIGN KEY (`Sector_Id`)
    REFERENCES `safe_this_dev`.`TB_SECTORS` (`Sector_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `safe_this_dev`.`TB_PERMISSIONS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `safe_this_dev`.`TB_PERMISSIONS` (
  `Permission_Id` INT NOT NULL AUTO_INCREMENT,
  `Controller` VARCHAR(45) NULL,
  `Action` VARCHAR(45) NULL,
  `Description` VARCHAR(45) NULL,
  PRIMARY KEY (`Permission_Id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `safe_this_dev`.`TB_PROFILE_PERMISSIONS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `safe_this_dev`.`TB_PROFILE_PERMISSIONS` (
  `User_Permission_Id` INT NOT NULL AUTO_INCREMENT,
  `Permission_Id` INT NOT NULL,
  `Granted` TINYINT NOT NULL DEFAULT 0,
  `Profile_Id` INT NULL,
  PRIMARY KEY (`User_Permission_Id`),
  INDEX `FK_TB_USER_PERMISSIONS_TB_PERMISSIONS_idx` (`Permission_Id` ASC),
  INDEX `FK_TB_USER_PERMISSION_TB_PROFILES_idx` (`Profile_Id` ASC),
  CONSTRAINT `FK_TB_USER_PERMISSIONS_TB_PERMISSIONS`
    FOREIGN KEY (`Permission_Id`)
    REFERENCES `safe_this_dev`.`TB_PERMISSIONS` (`Permission_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_TB_USER_PERMISSION_TB_PROFILES`
    FOREIGN KEY (`Profile_Id`)
    REFERENCES `safe_this_dev`.`TB_PROFILES` (`Profile_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `safe_this_dev` ;

-- -----------------------------------------------------
-- Placeholder table for view `safe_this_dev`.`VW_USER_PERMISSION`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `safe_this_dev`.`VW_USER_PERMISSION` (`User_Id` INT, `Controller` INT, `Action` INT, `Description` INT);

-- -----------------------------------------------------
-- View `safe_this_dev`.`VW_USER_PERMISSION`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `safe_this_dev`.`VW_USER_PERMISSION`;
USE `safe_this_dev`;
CREATE  OR REPLACE VIEW `VW_USER_PERMISSION` AS
SELECT Users.User_Id, Permissions.Controller, Permissions.Action, Permissions.Description
FROM TB_USERS Users
INNER JOIN TB_PROFILES Profiles ON (Profiles.Profile_Id = Users.Profile_Id)
INNER JOIN TB_PROFILE_PERMISSIONS ProfilePermissions ON (ProfilePermissions.Profile_Id =  Profiles.Profile_Id)
INNER JOIN TB_PERMISSIONS Permissions ON (Permissions.Permission_Id = ProfilePermissions.Permission_Id);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
