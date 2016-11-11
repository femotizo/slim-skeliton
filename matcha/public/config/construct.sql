-- -----------------------------------------------------
-- Schema/database Matcha
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `Matcha` ;
CREATE SCHEMA IF NOT EXISTS `Matcha` DEFAULT CHARACTER SET utf8 ;
USE `Matcha` ;
-- -----------------------------------------------------
-- Table `Matcha`.`users`
-- -----------------------------------------------------
CREATE TABLE `users` (
  `Name` text NOT NULL,
  `Surname` text NOT NULL,
  `Password` text NOT NULL,
  `Email` text NOT NULL,
  `Verify` tinyint(1) NOT NULL,
  PRIMARY KEY (`email`(128)))
  ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Users';