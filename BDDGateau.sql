

Create DATABASE IF NOT EXISTS `PalaisDesGateaux`;

CREATE TABLE IF NOT EXISTS `Gateau` (
  `idGateau` INT NOT NULL,
  `Nom` VARCHAR(20) NOT NULL,
  `Goût` VARCHAR(15) NULL,
  PRIMARY KEY (`idGateau`)
 )

CREATE TABLE IF NOT EXISTS `Allergènes` (
  `NomAllegène` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`NomAllegène`))


CREATE TABLE IF NOT EXISTS `Client` (
  `idClient` INT NOT NULL AUTO_INCREMENT,
  `Nom` VARCHAR(20) NOT NULL,
  `Prénom` VARCHAR(20) NOT NULL,
  `Numéro rue` INT NOT NULL,
  `Nom rue` VARCHAR(45) NOT NULL,
  `Nom ville` VARCHAR(45) NOT NULL,
  `Code postal` INT NOT NULL,
  `mot de passe encrypté` VARCHAR(45) NOT NULL,
  `email` VARCHAR(50) NULL,
  PRIMARY KEY (`idClient`))

CREATE TABLE IF NOT EXISTS `Commande` (
  `NuméroCommande` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`NuméroCommande`)



