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
