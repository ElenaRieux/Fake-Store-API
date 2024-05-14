CREATE DATABASE IF NOT EXISTS fake_fashion ;

USE fake_fashion;

CREATE TABLE `fake_fashion`.`utente` (
  `IDutente` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(70) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(200) NOT NULL,
  `ruolo` VARCHAR(30) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`IDutente`),
  UNIQUE INDEX `IDutente_UNIQUE` (`IDutente` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) );

CREATE TABLE `fake_fashion`.`prodotto` (
  `IDprodotto` INT NOT NULL,
  `titolo` VARCHAR(255) NOT NULL,
  `prezzo` DECIMAL(10,2) NOT NULL,
  `descrizione` TEXT NULL,
  `categoria` VARCHAR(255) NOT NULL,
  `immagine` VARCHAR(255) NOT NULL,
  `rating_rate` DECIMAL(3,1) NULL,
  `rating_count` INT NULL,

  PRIMARY KEY (`IDprodotti`),
  UNIQUE INDEX `IDprodotti_UNIQUE` (`IDprodotti` ASC) );


CREATE TABLE `fake_fashion`.`carrello` (
  `IDcarrello` INT NOT NULL AUTO_INCREMENT,
  `IDutente` INT NOT NULL,
  `IDprodotto` INT NOT NULL,
  `quantita` INT NOT NULL,
  PRIMARY KEY (`IDcarrello`),
  UNIQUE INDEX `IDcarrello_UNIQUE` (`IDcarrello` ASC));
