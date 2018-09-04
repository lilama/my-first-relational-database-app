SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `cogip` DEFAULT CHARACTER SET utf8 ;
USE `cogip` ;

CREATE TABLE IF NOT EXISTS `cogip`.`typeEntreprise` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `cogip`.`societes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NOT NULL,
  `adresse` VARCHAR(255) NOT NULL,
  `pays` VARCHAR(255) NOT NULL,
  `numTva` VARCHAR(50) NOT NULL,
  `numTel` VARCHAR(20) NOT NULL,
  `typeEntreprise_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_societes_typeEntreprise_idx` (`typeEntreprise_id` ASC),
  CONSTRAINT `fk_societes_typeEntreprise1`
    FOREIGN KEY (`typeEntreprise_id`)
    REFERENCES `cogip`.`typeEntreprise` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `cogip`.`personnes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NOT NULL,
  `prenom` VARCHAR(255) NOT NULL,
  `numTel` VARCHAR(20) NOT NULL,
  `mail` VARCHAR(45) NOT NULL,
  `societes_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_personnes_societes_idx` (`societes_id` ASC),
  CONSTRAINT `fk_personnes_societes`
    FOREIGN KEY (`societes_id`)
    REFERENCES `cogip`.`societes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `cogip`.`factures` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `numero` VARCHAR(45) NOT NULL,
  `dateFact` DATE NOT NULL,
  `numCommande` VARCHAR(255) NULL,
  `objet` VARCHAR(255) NULL,
  `societes_id` INT NOT NULL,
  `personnes_id` INT NOT NULL,
  INDEX `fk_factures_societes_idx` (`societes_id` ASC),
  INDEX `fk_factures_personnes_idx` (`personnes_id` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_factures_societes`
    FOREIGN KEY (`societes_id`)
    REFERENCES `cogip`.`societes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_factures_personnes`
    FOREIGN KEY (`personnes_id`)
    REFERENCES `cogip`.`personnes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
