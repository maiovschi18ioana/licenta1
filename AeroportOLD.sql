
CREATE SCHEMA IF NOT EXISTS `aeroport`;
USE `aeroport` ;


CREATE TABLE IF NOT EXISTS `aeroport`.`rute` (
  `idRuta` INT NOT NULL AUTO_INCREMENT,
  `aeroport_plecare` VARCHAR(45) NULL,
  `aeroport_sosire` VARCHAR(45) NULL,
  PRIMARY KEY (`idRuta`));




CREATE TABLE IF NOT EXISTS `aeroport`.`avioane` (
  `idAvion` INT NOT NULL AUTO_INCREMENT,
  `model` VARCHAR(45) NULL,
  `marca` VARCHAR(45) NULL,
  `nume` VARCHAR(45) NULL,
  `data_fabricatie` DATE NULL,
  `cale` VARCHAR(64) NULL,
  PRIMARY KEY (`idAvion`));




CREATE TABLE IF NOT EXISTS `aeroport`.`angajati` (
  `idAngajat` INT NOT NULL AUTO_INCREMENT,
  `nume` VARCHAR(45) NULL,
  `prenume` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL UNIQUE,
  `cnp` VARCHAR(45) NULL UNIQUE,
  `data_angajare` DATE NULL,
  `salariu` INT NULL,
  `tip_angajat` VARCHAR(50) NULL,
  `calificari` VARCHAR(45) NULL,
  `username` VARCHAR(45) NULL UNIQUE,
  `parola` VARCHAR(45) NULL,
  PRIMARY KEY (`idAngajat`));


CREATE TABLE IF NOT EXISTS `aeroport`.`zboruri` (
  `idZbor` INT NOT NULL AUTO_INCREMENT,
  `idRuta` INT NULL,
  `idAvion` INT NULL,
  `nrZbor` VARCHAR(45) NULL,
  `data_ora_plecare` DATETIME NULL,
  `data_ora_sosire` DATETIME NULL,
  `Observatii` VARCHAR(45) NULL,
  `stareZbor` VARCHAR(45) NULL,
  PRIMARY KEY (`idZbor`),
  INDEX `avion_fk_idx` (`idAvion`),
  INDEX `ruta_fk_idx` (`idRuta`),
  UNIQUE INDEX `nr_zbor_UNIQUE` (`nrZbor`),
  CONSTRAINT `avion_fk`
    FOREIGN KEY (`idAvion`)
    REFERENCES `aeroport`.`avioane` (`idAvion`)
    ON DELETE SET NULL
    ON UPDATE NO ACTION,
  CONSTRAINT `ruta_fk`
    FOREIGN KEY (`idRuta`)
    REFERENCES `aeroport`.`rute` (`idRuta`)
    ON DELETE SET NULL
    ON UPDATE NO ACTION);




CREATE TABLE IF NOT EXISTS `aeroport`.`program` (
  `idProgram` INT NOT NULL AUTO_INCREMENT,
  `tip_activitate` VARCHAR(64) NOT NULL,
  `idZbor` INT NULL,
  `idAngajat` INT NULL,
  PRIMARY KEY (`idProgram`),
  INDEX `fk_Program_1_idx` (`idZbor`),
  INDEX `fk_ang_idx` (`idAngajat`),
  CONSTRAINT `fk_zbor`
    FOREIGN KEY (`idZbor`)
    REFERENCES `aeroport`.`zboruri` (`idZbor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ang`
    FOREIGN KEY (`idAngajat`)
    REFERENCES `aeroport`.`angajati` (`idAngajat`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION);



CREATE TABLE IF NOT EXISTS `aeroport`.`documente` (
  `idDocument` INT NOT NULL,
  `idAngajat` INT NULL,
  `cale` VARCHAR(45) NULL,
  `nume` VARCHAR(45) NULL,
  PRIMARY KEY (`idDocument`),
  INDEX `fk_ang_doc_idx` (`idAngajat`),
  CONSTRAINT `fk_ang_doc`
    FOREIGN KEY (`idAngajat`)
    REFERENCES `aeroport`.`angajati` (`idAngajat`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


