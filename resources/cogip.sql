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

INSERT INTO `typeEntreprise` (`id`, `nom`) VALUES
(1, 'client'),
(2, 'fournisseur');


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

INSERT INTO `societes` (`id`, `nom`, `adresse`, `pays`, `numTva`, `numTel`, `typeEntreprise_id`) VALUES
(1, 'Barry', 'impasse Bastin 42\r\n 0444 Châtelet', 'Belgique', 'BE0411905847', '+32(0)100 984926', 1),
(2, 'De Backer ASBL', 'boulevard Masson 84\n 0795 Thuin', 'Belgique', 'BE0414445663', '+32(0)310 247473', 2),
(3, 'Parmentier', 'chaussée Jacquet 33\r\n 2857 Izegem', 'Belgique', 'BE0419052173', '069 699790', 1),
(4, 'De Smedt', 'chemin Parmentier 9\n 5916 Antoing', 'Belgique', 'BE0424473582', '030 793048', 2),
(5, 'Guillaume SNC', 'place Messaoudi 800\n 8479 Couvin', 'Belgique', 'BE0424748350', '0198 51 21 66', 1),
(6, 'Verstraeten SNC', 'rue Lefèvre 65\r\n 7573 Herve', 'Belgique', 'BE0438789495', '+32(0)91317319', 2),
(7, 'Saidi SNC', 'chaussée Peeters 83\r\n 5380 Eeklo', 'Belgique', 'BE0440966354', '+32(0)0 6454950', 1),
(8, 'Goffin SNC', 'avenue Jacobs 67\n 6195 Alost', 'Belgique', 'BE0446991440', '09 907 43 94', 2),
(9, 'André GEIE', 'avenue Dethier 41\n 7217 Eeklo', 'Belgique', 'BE0464819842', '08 190 34 47', 1),
(10, 'Thiry', 'chemin Masson 63\n 3063 Virton', 'Belgique', 'BE0471727232', '04 849 72 24', 2),
(11, 'Vercammen SCRL', 'rue Bernard 44\n 7837 Braine-le-Comte', 'Belgique', 'BE0475899519', '099 49 75 97', 1);


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

INSERT INTO `personnes` (`id`, `nom`, `prenom`, `numTel`, `mail`, `societes_id`) VALUES
(2, 'Wuyts', 'Margaux', '0129877858', 'clemence.andre@gmail.com', 11),
(3, 'Jansen', 'Nicolas', '+32(0)06536991', 'niels15@gmail.com', 9),
(4, 'Stevens', 'Eline', '0995 946552', 'thomas.petit@hotmail.com', 9),
(6, 'Baert', 'Lowie', '+32(0)7 9494847', 'nkaya@advalvas.be', 2),
(7, 'Lecomte', 'Lilou', '03 661 33 09', 'lheylen@advalvas.be', 3),
(9, 'Delhaye', 'Emma', '0853 706 568', 'ethan.noel@advalvas.be', 1),
(10, 'Borremans', 'Lucas', '09 1808678', 'alice.gillet@advalvas.be', 8),
(11, 'Mathieu', 'Samuel', '0170 535691', 'daan.verbruggen@hotmail.com', 1),
(13, 'Rousseau', 'Lander', '+32(0)67252256', 'decoster.clement@gmail.com', 4),
(14, 'Louis', 'Milan', '0136450707', 'jules.pierre@yahoo.com', 4),
(15, 'Dubois', 'Amber', '0547 574013', 'milan.bogaerts@yahoo.com', 2);


CREATE TABLE IF NOT EXISTS `cogip`.`factures` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `numero` VARCHAR(45) NOT NULL,
  `dateFact` DATE NOT NULL,
  `objet` VARCHAR(255) NULL,
  `societes_id` INT NOT NULL,
  `personnes_id` INT NOT NULL,
  INDEX `fk_factures_societes_idx` (`societes_id` ASC),
  INDEX `fk_factures_personnes_idx` (`personnes_id` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `uk_numero`
    UNIQUE KEY (`numero`),
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

INSERT INTO `factures` (`id`, `numero`, `dateFact`, `objet`, `societes_id`, `personnes_id`) VALUES
(1, '2018-0001', '2018-06-28', 'Un stock de flamand rose gonflable', 2, 15),
(2, '2018-00002', '2018-02-20', 'Un pot de nutella', 9, 4),
(3, '2018-00003', '2018-02-19', 'Des sacs de Lego', 11, 2),
(4, '2018-0004', '2018-06-12', 'une balançoire x2', 2, 6),
(5, '2018-00005', '2018-04-07', 'Une paire de chaussettes', 11, 2),
(6, '2018-00006', '2018-01-11', 'Une boite de vieux disques.', 1, 11),
(7, '2018-00007', '2018-05-22', 'des pommes et pas des poires', 2, 6),
(8, '2018-00008', '2018-06-12', 'Un set de terasse', 1, 9),
(9, '2018-00009', '2018-06-10', 'Une porte blindée', 8, 10),
(10, '2018-00010', '2018-05-21', 'Le T-shirt de Claudiu', 3, 7);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
